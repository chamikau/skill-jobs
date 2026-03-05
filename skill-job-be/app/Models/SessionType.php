<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\SessionType
 * @property int $id
 * @property string $name
 * @mixin Eloquent
 */
class SessionType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    /**
     * @return HasMany
     */
    public function session(): HasMany
    {
        return $this->hasMany(Session::class);
    }
}
