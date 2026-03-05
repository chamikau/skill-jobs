<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Contents
 * @property int $id
 * @property int $created_by
 * @property int $course_id
 * @property string $content_name
 * @property int $number_of_lectures
 * @property int $lecture_hours
 * @property string $content_description
 * @mixin Eloquent
 */
class Content extends Model
{
    use HasFactory;

    protected $fillable = ['created_by' , 'course_id' , 'content_name', 'number_of_lectures' , 'lecture_hours' , 'content_description'];


    /**
     * @return BelongsTo
     */
    public function courses(): BelongsTo
    {
        return $this->belongsTo(Course::class,'course_id','id');
    }

}
