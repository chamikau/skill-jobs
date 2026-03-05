<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\StudentJobApply
 * @property int $id
 * @property int $student_id
 * @property int $hobby_id
 * @mixin Eloquent
 */
class StudentJobApply extends Model
{
    use HasFactory;

    protected $fillable = ['job_id', 'student_id'];


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
    public function jobs(): belongsTo
    {
        return $this->belongsTo(Job::class,'job_id','id');
    }

}
