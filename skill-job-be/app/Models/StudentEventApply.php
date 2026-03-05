<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\StudentEventApply
 * @property int $id
 * @property int $student_id
 * @property int $event_id
 * @property string $state
 * @mixin Eloquent
 */
class StudentEventApply extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'event_id','state'];


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
    public function events(): belongsTo
    {
        return $this->belongsTo(Event::class,'event_id','id');
    }

}
