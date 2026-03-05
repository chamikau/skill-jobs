<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\AdminOrganizationRole
 *
 * @property int $id
 * @property int $admin_organization_id
 * @property int $role_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\AdminOrganization $adminOrganization
 * @property-read \App\Models\Role $role
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOrganizationRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOrganizationRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOrganizationRole query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOrganizationRole whereAdminOrganizationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOrganizationRole whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOrganizationRole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOrganizationRole whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOrganizationRole whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AdminOrganizationRole extends Model
{
    use HasFactory;

    protected $fillable = ['admin_organization_id', 'role_id'];

    /**
     * @return BelongsTo
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function adminOrganization(): BelongsTo
    {
        return $this->belongsTo(AdminOrganization::class,'admin_organization_id','id');
    }

}
