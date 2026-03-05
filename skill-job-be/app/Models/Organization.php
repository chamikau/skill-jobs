<?php

namespace App\Models;

use Admin\Jobs\States\Job\JobState;
use Company\Organizations\States\Organization\OrganizationState;
use App\Traits\Uuids;
use Database\Factories\OrganizationFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Carbon;
use Spatie\ModelStates\HasStates;

/**
 * App\Models\Organization
 *
 * @property int $id
 * @property string $name
 * @property int $admin_id
 * @property string $industry_type_id
 * @property string $city_id
 * @property string $about_the_company
 * @property JsonData $social_links
 * @property string $state
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Role[] $roles
 * @property-read int|null $roles_count
 * @method static OrganizationFactory factory(...$parameters)
 * @method static Builder|Organization newModelQuery()
 * @method static Builder|Organization newQuery()
 * @method static Builder|Organization query()
 * @method static Builder|Organization whereCreatedAt($value)
 * @method static Builder|Organization whereId($value)
 * @method static Builder|Organization whereName($value)
 * @method static Builder|Organization whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read Collection|Admin[] $admins
 * @property-read int|null $admins_count
 * @method static Builder|Organization adminOrganizations($admin_id)
 * @property-read Admin $owner
 * @method static Builder|Organization whereAdminId($value)
 * @method static \PhpParser\Builder organizationFilter($id)
 */
class Organization extends Model
{
    use HasFactory, Uuids,HasStates;

    protected $fillable = ['id', 'uuid', 'admin_id','industry_type_id','city_id','name','about_the_company','social_links','state'];


    protected $casts = [
        'state' => OrganizationState::class,
    ];

    /**
     * @return BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    /**
     * @return MorphMany
     */
    public function roles(): MorphMany
    {
        return $this->morphMany(Role::class, 'temable');
    }

    /**
     * @return BelongsToMany
     */
    public function admins(): BelongsToMany
    {
        return $this->belongsToMany(Admin::class, 'admin_organizations',
            'organization_id', 'admin_id');
    }

    /**
     * @param $query
     * @param $admin_id
     * @return mixed
     */
    protected function scopeAdminOrganizations($query, $admin_id): mixed
    {
        return $query->whereHas('admins', function ($query) use ($admin_id) {
            $query->where('admins.id', $admin_id);
        });
    }

    /**
     * @return BelongsTo
     */
    public function industryTypes(): BelongsTo
    {
        return $this->belongsTo(IndustryType::class, 'industry_type_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function cities(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    /**
     * @return belongsTo
     */
    public function adminOrganization(): belongsTo
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
}
