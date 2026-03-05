<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\MentorWorkExperiences
 * @property int $created_by
 * @property int $mentor_id
 * @property int $work_experience_job_role_id
 * @property string $name
 * @property string $start_date
 * @property string $end_date
 * @property string $description
 * @mixin Eloquent
 */
class MentorWorkExperiences extends Model
{
    use HasFactory;

    protected $fillable = ['created_by' , 'mentor_id' , 'work_experience_job_role_id' , 'name' , 'start_date' , 'end_date' , 'description'];

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
    public function workExperienceJobType(): BelongsTo
    {
        return $this->belongsTo(WorkExperienceJobRole::class,'work_experience_job_role_id','id');
    }

}
