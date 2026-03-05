<?php

namespace App\Models;


use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


/**
 * App\Models\News
 * @property int $id
 * @property int $student_id
 * @property string $student_goal
 * @mixin Eloquent
 */
class StudentGoal extends Model
{
    use HasFactory;

    protected $fillable = ['student_id' , 'student_goal' ];


    /**
     * @return BelongsTo
     */
    public function students(): BelongsTo
    {
        return $this->belongsTo(Student::class,'student_id','id');
    }

}
