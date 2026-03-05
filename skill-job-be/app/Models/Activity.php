<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Activity
 * @property int $id
 * @property int $student_id
 * @property string $name
 * @property string $description
 * @mixin Eloquent
 */
class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'name' , 'description'];

    /**
     * @return BelongsTo
     */
    public function students(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}
