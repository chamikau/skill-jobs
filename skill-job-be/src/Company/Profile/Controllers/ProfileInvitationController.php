<?php

namespace Company\Profile\Controllers;

use Company\Profile\Resources\ProfileInvitationResource;
use Company\Users\States\UserInvitationState\Accepted;
use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminInvitation;
use App\Models\AdminOrganization;
use App\Models\AdminOrganizationRole;
use App\Models\Role;
use Auth;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ProfileInvitationController extends Controller
{
    /**
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return QueryBuilder::for(AdminInvitation::where('email', Auth::user()->email)
            ->with(['organization', 'role', 'invitee']))
            ->allowedFilters(['email', 'state',
                AllowedFilter::custom(
                    'search',
                    new FuzzyFilter(
                        'email', 'state',
                    ))])
            ->allowedSorts('email', 'state')
            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);
    }

    /**
     * @param $id
     * @return ProfileInvitationResource
     */
    public function show($id): ProfileInvitationResource
    {
        $invitation = AdminInvitation::where('email', Auth::user()->email)->findOrFail($id);
        return new ProfileInvitationResource($invitation);
    }

    /**
     * @param $id
     * @return JsonResponse
     * @throws \Throwable
     */
    public function accept($id): JsonResponse
    {
        return DB::transaction(function () use ($id){
            $invitation = AdminInvitation::where('email', Auth::user()->email)->findOrFail($id);
            $user = Admin::findOrFail(Auth::id());

            $admin_organization = AdminOrganization::firstOrCreate([
                'admin_id' => $user->id,
                'organization_id' => $invitation->organization_id
            ]);

            AdminOrganizationRole::firstOrCreate([
                'admin_organization_id' => $admin_organization->id,
                'role_id' => Role::organizationFilter($invitation->organization_id)
                    ->findOrFail($invitation->role_id)->id
            ]);

            $invitation->state->transitionTo(Accepted::class);

            return response()->json(['message' => 'Invitation Accepted']);
        });
    }
}
