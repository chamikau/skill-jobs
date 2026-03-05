<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Education
 * @property int $id
 * @property int $student_id
 * @property int $city_id
 * @property string $university_name
 * @property string $field_of_study
 * @property string $grade
 * @property string $course_type
 * @property string $start_year
 * @property string $end_year
 * @mixin Eloquent
 */
class Education extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'city_id', 'university_name', 'course_name', 'field_of_study_id', 'grade', 'course_type', 'start_year', 'end_year'];
    protected $table = "educations";

    /**
     * @return BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function certifications(): HasMany
    {
        return $this->hasMany(Certification::class);
    }

    /**
     * @return HasMany
     */
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    /**
     * @return belongsTo
     */
    public function city(): belongsTo
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }


    /**
     * @return belongsTo
     */
    public function fieldOfStudyTypes(): belongsTo
    {
        return $this->belongsTo(FieldOfStudyType::class, 'field_of_study_id', 'id');
    }
}
