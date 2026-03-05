<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Course
 * @property int $id
 * @property int $created_by
 * @property int $event_type_id
 * @property string $name
 * @property string $event_organizer
 * @property string $date
 * @property string $location
 * @property string $description
 * @mixin Eloquent
 */
class Event extends Model
{
    use HasFactory;

    protected $fillable = ['created_by', 'event_type_id', 'name', 'event_organizer' , 'date', 'location',  'description'];


    /**
     * @return belongsTo
     */
    public function eventType(): belongsTo
    {
        return $this->belongsTo(EventType::class,'event_type_id','id');
    }

    /**
     * @return belongsToMany
     */
    public function students(): belongsToMany
    {
        return $this->belongsToMany(Student::class,'student_event_applies');
    }
    /**
     * @return hasMany
     */
    public function studentEventApplied(): hasMany
    {
        return $this->hasMany(StudentEventApply::class);
    }
}
