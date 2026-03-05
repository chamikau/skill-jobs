<?php

namespace App\Models;

use Database\Factories\AdminFactory;
use Eloquent;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\PersonalAccessToken;

/**
 * App\Models\SuperAdmin
 *
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection|PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static AdminFactory factory(...$parameters)
 * @method static Builder|SuperAdmin newModelQuery()
 * @method static Builder|SuperAdmin newQuery()
 * @method static Builder|SuperAdmin query()
 * @mixin Eloquent
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $two_factor_confirmed_at
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|SuperAdmin whereCreatedAt($value)
 * @method static Builder|SuperAdmin whereEmail($value)
 * @method static Builder|SuperAdmin whereEmailVerifiedAt($value)
 * @method static Builder|SuperAdmin whereId($value)
 * @method static Builder|SuperAdmin whereName($value)
 * @method static Builder|SuperAdmin wherePassword($value)
 * @method static Builder|SuperAdmin whereRememberToken($value)
 * @method static Builder|SuperAdmin whereTwoFactorConfirmedAt($value)
 * @method static Builder|SuperAdmin whereTwoFactorRecoveryCodes($value)
 * @method static Builder|SuperAdmin whereTwoFactorSecret($value)
 * @method static Builder|SuperAdmin whereUpdatedAt($value)
 * @property-read Collection|AdminOrganizationRole[] $adminOrganizationRoles
 * @property-read int|null $admin_organization_roles_count
 * @property-read Collection|Organization[] $organizations
 * @property-read int|null $organizations_count
 * @method static Builder|SuperAdmin organization($organization_id)
 */
class SuperAdmin extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//    /**
//     * @return BelongsToMany
//     */
//    public function organizations(): BelongsToMany
//    {
//        return $this->belongsToMany(Organization::class, 'admin_organizations',
//            'admin_id', 'organization_id');
//    }

    /**
     * @return HasManyThrough
     */
    public function adminOrganizationRoles(): HasManyThrough
    {
        return $this->hasManyThrough(AdminOrganizationRole::class,
            AdminOrganization::class, 'admin_id', 'admin_organization_id',
            'id', 'id');
    }

    /**
     * @param $query
     * @param $organization_id
     * @return mixed
     */
    public function scopeOrganization($query, $organization_id): mixed
    {
        return $query->whereHas('organizations', function ($query) use ($organization_id) {
            return $query->where('organizations.id', $organization_id);
        });
    }

    /**
     * @return BelongsTo
     */
    public function adminOrganization(): BelongsTo
    {
        return $this->belongsTo(AdminOrganization::class);
    }

    /**
     * @return HasMany
     */
    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }

    /**
     * @return HasMany
     */
    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }
}
