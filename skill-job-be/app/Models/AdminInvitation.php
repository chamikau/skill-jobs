<?php

namespace App\Models;

use Admin\Trainers\States\Trainer\TrainerState;
use Admin\Users\States\UserInvitationState\UserInvitationState;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Spatie\ModelStates\HasStates;

/**
 * App\Models\AdminInvitation
 *
 * @property-read \App\Models\Admin|null $invitee
 * @property-read \App\Models\Organization|null $organization
 * @property-read \App\Models\Role|null $role
 * @method static \Illuminate\Database\Eloquent\Builder|AdminInvitation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminInvitation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminInvitation query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $invitee_id
 * @property int $organization_id
 * @property int $role_id
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AdminInvitation organizationFilter($organization_id)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminInvitation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminInvitation whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminInvitation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminInvitation whereInviteeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminInvitation whereOrganizationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminInvitation whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminInvitation whereUpdatedAt($value)
 * @property mixed $state
 * @method static \Illuminate\Database\Eloquent\Builder|AdminInvitation orWhereNotState(string $column, $states)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminInvitation orWhereState(string $column, $states)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminInvitation whereNotState(string $column, $states)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminInvitation whereState($value)
 */
class AdminInvitation extends Model
{
    use HasFactory, HasStates, Notifiable;

    protected $fillable = ['invitee_id', 'organization_id', 'role_id', 'email', 'state'];

    protected $casts = [
        'state' => UserInvitationState::class,
    ];

    /**
     * @return BelongsTo
     */
    public function invitee(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'invitee_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class, 'organization_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    /**
     * @param $query
     * @param $organization_id
     * @return mixed
     */
    public function scopeOrganizationFilter($query, $organization_id): mixed
    {
        return $query->whereHas('organization', function ($query) use ($organization_id) {
            return $query->where('id', $organization_id);
        });
    }
}
