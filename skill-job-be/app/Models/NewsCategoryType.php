<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\NewsCategoryType
 * @property int $id
 * @property string $name
 * @mixin Eloquent
 */
class NewsCategoryType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    /**
     * @return hasMany
     */
    public function news(): hasMany
    {
        return $this->hasMany(News::class);
    }

}
