<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\RoleHasPermission
 *
 * @property int $id
 * @property int $role_id
 * @property int $permission_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission query()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission wherePermissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class RoleHasPermission extends Pivot
{
    use HasFactory;

    protected $fillable = ['role_id', 'permission_id'];
}
