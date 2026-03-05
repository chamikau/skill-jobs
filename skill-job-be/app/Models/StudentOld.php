<?php

namespace App\Models;

use Eloquent;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\StudentOld
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone_1
 * @property string|null $phone_2
 * @property string $date_of_birth
 * @property string $email
 * @mixin Eloquent
 *
 */
class StudentOld extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = ['first_name','last_name','phone_1','phone_2','date_of_birth','email','password'
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


    /**
     * @return HasMany
     */
    public function studentEducationDetails(): HasMany
    {
        return $this->hasMany(StudentEducationDetail::class);
    }


    /**
     * @return HasMany
     */
    public function studentJobPreferences(): HasMany
    {
        return $this->hasMany(StudentJobPreference::class);
    }

    /**
     * @return MorphMany
     */
    public function addresses(): MorphMany
    {
        return $this->morphMany(Address::class,'model');
    }

    /**
     * @return HasMany
     */
    public function jobApplications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }

}
