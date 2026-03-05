<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Projects
 * @property int $id
 * @property int $student_id
 * @property int $education_id
 * @property string $project_description
 * @property string $project_links
 * @property string $skills_used
 * @mixin Eloquent
 */
class Project extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'education_id' , 'project_title', 'project_description', 'project_links', 'skills_used'];

    /**
     * @return BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function education(): BelongsTo
    {
        return $this->belongsTo(Education::class, 'education_id', 'id');
    }
}
