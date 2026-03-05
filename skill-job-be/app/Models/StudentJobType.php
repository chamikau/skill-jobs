<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\StudentJobType
 * @property int $id
 * @property int $student_id
 * @property int $job_type_id
 * @mixin Eloquent
 */
class StudentJobType extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'job_type_id'];


    /**
     * @return belongsTo
     */
    public function student(): belongsTo
    {
        return $this->belongsTo(Student::class,'student_id','id');
    }

    /**
     * @return belongsTo
     */
    public function job(): belongsTo
    {
        return $this->belongsTo(Job::class,'job_type_id','id');
    }

}
