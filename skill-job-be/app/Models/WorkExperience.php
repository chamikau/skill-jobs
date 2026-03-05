<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\WorkExperience
 * @property int $id
 * @property int $student_id
 * @property int $work_experience_job_role_id
 * @property string $name
 * @property string $company_name
 * @property int $duration
 * @property string $description
 * @mixin Eloquent
 */
class WorkExperience extends Model
{
    use HasFactory;

    protected $fillable = [ 'student_id','company_name','work_experience_job_role_id','name','duration','description'];

    /**
     * @return BelongsTo
     */
    public function workExperienceJobRoles(): BelongsTo
    {
        return $this->belongsTo(WorkExperienceJobRole::class, 'work_experience_job_role_id', 'id');
    }


    /**
     * @return BelongsTo
     */
    public function students(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

}
