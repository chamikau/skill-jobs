<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\StudentCourseApply
 * @property int $id
 * @property int $student_id
 * @property int $course_id
 * @property string $state
 * @mixin Eloquent
 */
class StudentCourseApply extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'course_id','state'];


    /**
     * @return belongsTo
     */
    public function students(): belongsTo
    {
        return $this->belongsTo(Student::class,'student_id','id');
    }

    /**
     * @return belongsTo
     */
    public function courses(): belongsTo
    {
        return $this->belongsTo(Course::class,'course_id','id');
    }

}
