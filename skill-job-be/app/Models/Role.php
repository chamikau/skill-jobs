<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Role
 *
 * @property int $id
 * @property string|null $temable_type
 * @property int|null $temable_id
 * @property string $name
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read Model|Eloquent $temable
 * @method static Builder|Role newModelQuery()
 * @method static Builder|Role newQuery()
 * @method static Builder|Role query()
 * @method static Builder|Role whereCreatedAt($value)
 * @method static Builder|Role whereDescription($value)
 * @method static Builder|Role whereId($value)
 * @method static Builder|Role whereName($value)
 * @method static Builder|Role whereTemableId($value)
 * @method static Builder|Role whereTemableType($value)
 * @method static Builder|Role whereUpdatedAt($value)
 * @mixin Eloquent
 * @property int $is_super
 * @method static Builder|Role team($team_id)
 * @method static Builder|Role whereIsSuper($value)
 * @method static Builder|Role organizationFilter($team_id)
 */
class Role extends Model
{
    use HasFactory;

    protected $fillable = ['temable_type', 'temable_id', 'name', 'description', 'is_super'];

    /**
     * @return BelongsToMany
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'role_has_permissions',
            'role_id', 'permission_id');
    }

    /**
     * @return MorphTo
     */
    public function temable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @param $query
     * @param $organization_id
     * @return Builder|Role
     */
    public function scopeOrganizationFilter($query, $team_id): Builder|Role
    {
        return $this->whereHasMorph('temable', [Organization::class], function ($query, $type)
        use ($team_id){
            $query->where('temable_id', $team_id);
        });
    }

}
