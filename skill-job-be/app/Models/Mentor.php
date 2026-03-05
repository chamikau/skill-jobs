<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Mentor
 * @property int $created_by
 * @property string $name
 * @property string $position
 * @property string $phone_number_1
 * @property string $about_mentor
 * @mixin Eloquent
 */
class Mentor extends Model
{
    use HasFactory;

    protected $fillable = ['created_by' , 'name' , 'position' , 'phone_number_1' , 'about_mentor'];

    /**
     * @return BelongsTo
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class,'created_by','id');
    }

    /**
     * @return hasMany
     */
    public function session(): hasMany
    {
        return $this->hasMany(Session::class);
    }

    /**
     * @return BelongsToMany
     */
    public function mentorSkill(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class,'mentor_skills');
    }

    /**
     * @return hasMany
     */
    public function mentorEducation(): hasMany
    {
        return $this->hasMany(MentorEducations::class);
    }

    /**
     * @return hasMany
     */
    public function mentorWorkExperience(): hasMany
    {
        return $this->hasMany(MentorWorkExperiences::class);
    }
}
