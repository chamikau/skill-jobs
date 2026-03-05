<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\AdminOrganization
 *
 * @property int $id
 * @property int $organization_id
 * @property int $admin_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOrganization newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOrganization newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOrganization query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOrganization whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOrganization whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOrganization whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOrganization whereOrganizationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminOrganization whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AdminOrganization extends Model
{
    use HasFactory;

    protected $fillable = ['admin_id', 'organization_id'];

    /**
     * @return BelongsTo
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }


    /**
     * @return BelongsTo
     */
    public function superAdmin(): BelongsTo
    {
        return $this->belongsTo(SuperAdmin::class, 'admin_id', 'id');
    }

    /**
     * @return belongsTo
     */
    public function organization(): belongsTo
    {
        return $this->belongsTo(Organization::class, 'organization_id', 'id');
    }

}
