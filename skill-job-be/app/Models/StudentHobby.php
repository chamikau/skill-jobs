<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\StudentHobby
 * @property int $id
 * @property int $student_id
 * @property int $hobby_id
 * @mixin Eloquent
 */
class StudentHobby extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'hobby_id'];


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
    public function hobby(): belongsTo
    {
        return $this->belongsTo(Hobby::class,'hobby_id','id');
    }

}
