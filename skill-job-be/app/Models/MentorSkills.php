<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\MentorSkills
 * @property int $id
 * @property int $student_id
 * @property int $skill_id
 * @mixin Eloquent
 */
class MentorSkills extends Model
{
    use HasFactory;

    protected $fillable = [ 'mentor_id','skill_id'];

    /**
     * @return BelongsTo
     */
    public function mentors(): BelongsTo
    {
        return $this->belongsTo(Mentor::class, 'mentor_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function skill(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_id', 'id');
    }
}
