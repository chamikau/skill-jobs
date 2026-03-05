<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\StudentSkill
 * @property int $id
 * @property int $student_id
 * @property int $skill_id
 * @mixin Eloquent
 */
class StudentSkill extends Model
{
    use HasFactory;

    protected $fillable = [ 'student_id','skill_id'];

    /**
     * @return BelongsTo
     */
    public function students(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function skill(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_id', 'id');
    }
}
