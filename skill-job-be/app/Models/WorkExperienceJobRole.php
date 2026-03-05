<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\JobType
 * @property int $id
 * @property string $name
 * @mixin Eloquent
 */
class WorkExperienceJobRole extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    /**
     * @return hasMany
     */
    public function workExperiences(): hasMany
    {
        return $this->hasMany(WorkExperience::class);
    }

    /**
     * @return hasMany
     */
    public function mentorWorkExperience(): hasMany
    {
        return $this->hasMany(MentorWorkExperiences::class);
    }

}
