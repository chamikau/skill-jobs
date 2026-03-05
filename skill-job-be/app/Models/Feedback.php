<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Feedback
 * @property int $id
 * @property int $student_id
 * @property string $number_of_rating
 * @property string $message
 * @mixin Eloquent
 */
class Feedback extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'number_of_rating', 'message'];
    protected $table = "feedbacks";

    /**
     * @return BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class,'student_id','id');
    }

}
