<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\MentorEducations
 * @property int $created_by
 * @property int $mentor_id
 * @property int $city_id
 * @property int $field_of_study_id
 * @property string $university_name
 * @property string $course_name
 * @property string $start_year
 * @property string $end_year
 * @mixin Eloquent
 */
class MentorEducations extends Model
{
    use HasFactory;

    protected $fillable = ['created_by' , 'mentor_id' , 'city_id' , 'field_of_study_id' , 'university_name' , 'course_name' , 'start_year' , 'end_year'];

    /**
     * @return BelongsTo
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class,'created_by','id');
    }

    /**
     * @return BelongsTo
     */
    public function mentor(): BelongsTo
    {
        return $this->belongsTo(Mentor::class,'mentor_id','id');
    }

    /**
     * @return BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class,'city_id','id');
    }

    /**
     * @return belongsTo
     */
    public function fieldOfStudyTypes(): belongsTo
    {
        return $this->belongsTo(FieldOfStudyType::class, 'field_of_study_id', 'id');
    }

}
