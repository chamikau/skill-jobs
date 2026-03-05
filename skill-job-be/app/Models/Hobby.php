<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Hobby
 * @property int $id
 * @property string $name
 * @mixin Eloquent
 */
class Hobby extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    /**
     * @return belongsToMany
     */
    public function students(): belongsToMany
    {
        return $this->belongsToMany(Student::class,'student_hobbies');
    }

}
