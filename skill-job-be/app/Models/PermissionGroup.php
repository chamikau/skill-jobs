<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\PermissionGroup
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|PermissionGroup newModelQuery()
 * @method static Builder|PermissionGroup newQuery()
 * @method static Builder|PermissionGroup query()
 * @method static Builder|PermissionGroup whereCreatedAt($value)
 * @method static Builder|PermissionGroup whereId($value)
 * @method static Builder|PermissionGroup whereName($value)
 * @method static Builder|PermissionGroup whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property string|null $portal
 * @method static Builder|PermissionGroup wherePortal($value)
 */
class PermissionGroup extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'portal'];

    /**
     * @return HasMany
     */
    public function permissions(): HasMany
    {
        return $this->hasMany(Permission::class, 'permission_group_id', 'id');
    }
}
