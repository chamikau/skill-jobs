<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\IndustryType
 * @property int $id
 * @property string $name
 * @property string $description
 * @mixin Eloquent
 */
class IndustryType extends Model
{
    use HasFactory;

    protected $fillable = ['name','description'];


    /**
     * @return HasMany
     */
    public function organizations(): HasMany
    {
        return $this->hasMany(Organization::class);
    }


    /**
     * @return belongsToMany
     */
    public function students(): belongsToMany
    {
        return $this->belongsToMany(Student::class,'industry_type_students');
    }

}
