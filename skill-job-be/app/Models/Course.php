<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Course
 * @property int $id
 * @property int $created_by
 * @property int $course_type_id
 * @property string $name
 * @property string $instructor_name
 * @property string $instructor_description
 * @property string $description
 * @mixin Eloquent
 */
class Course extends Model
{
    use HasFactory;

    protected $fillable = ['created_by', 'course_type_id', 'name', 'instructor_name' , 'instructor_description' , 'description'];


    /**
     * @return belongsTo
     */
    public function courseType(): belongsTo
    {
        return $this->belongsTo(CourseType::class,'course_type_id','id');
    }

    /**
     * @return HasMany
     */
    public function contents(): HasMany
    {
        return $this->hasMany(Content::class);
    }

    /**
     * @return belongsToMany
     */
    public function students(): belongsToMany
    {
        return $this->belongsToMany(Student::class,'student_course_applies')
            ->withPivot('state');
    }

    /**
     * @return hasMany
     */
    public function studentCourseApplied(): hasMany
    {
        return $this->hasMany(StudentCourseApply::class);
    }
}
