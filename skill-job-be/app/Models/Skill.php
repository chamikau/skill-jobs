<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Skill
 * @property int $id
 * @property string $name
 * @property string $description
 * @mixin Eloquent
 */
class Skill extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];


    /**
     * @return HasMany
     */
    public function studentSkill(): HasMany
    {
        return $this->hasMany(StudentSkill::class);
    }

    /**
     * @return HasMany
     */
    public function mentorSkill(): HasMany
    {
        return $this->hasMany(MentorSkills::class);
    }
}
