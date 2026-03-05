<?php

namespace Admin\Users\Controllers;

use Admin\Users\Requests\UserInviteRequest;
use Admin\Users\Resources\UserResource;
use Admin\Users\States\UserInvitationState\Sent;
use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\AdminInvitation;
use App\Models\Organization;
use App\Models\Role;
use App\Notifications\SendUserInvitationNotification;
use Auth;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Notification;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class UserInviteController extends Controller
{

    public function __construct()
    {
        $this->middleware('organization-permission-checker:list-user-invitation')->only('index');
        $this->middleware('organization-permission-checker:create-user-invitation')->only('store');
        $this->middleware('organization-permission-checker:show-user-invitation')->only('show');
        $this->middleware('organization-permission-checker:update-user-invitation')->only('update');
        $this->middleware('organization-permission-checker:destroy-user-invitation')->only('destroy');
    }

    /**
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return QueryBuilder::for(AdminInvitation::organizationFilter(request('organization_id'))
            ->with(['organization', 'role', 'invitee']))
            ->allowedFilters(['email',
                AllowedFilter::custom(
                    'search',
                    new FuzzyFilter(
                        'email',
                    ))])
            ->allowedSorts('email')
            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);
    }

    /**
     * @param $id
     * @return UserResource
     */
    public function show($id): UserResource
    {
        $invitation = AdminInvitation::organizationFilter(request('organization_id'))->findOrFail($id);
        return new UserResource($invitation);
    }

    /**
     * @return UserResource|JsonResponse
     */
    public function store(UserInviteRequest $request)
    {
        $role = Role::organizationFilter(request('organization_id'))->findOrFail($request->validated()['role_id']);

        if (Organization::findOrFail(request('organization_id'))
            ->admins()->where('email', $request->validated()['email'])->first()) {
            return response()->json(['message' => 'Student already connected to the organization.'], 500);
        }

        $invitation = AdminInvitation::firstOrCreate(['email' => $request->validated()['email']], [
            'role_id' => $role->id,
            'invitee_id' => Auth::id(),
            'organization_id' => request('organization_id'),
        ]);
        Notification::send($invitation, new SendUserInvitationNotification($invitation));
        return new UserResource($invitation);
    }

    /**
     * @param UserInviteRequest $request
     * @param $id
     * @return UserResource
     */
    public function update(UserInviteRequest $request, $id): UserResource
    {
        $role = Role::organizationFilter(request('organization_id'))->findOrFail($request->validated()['role_id']);
        $invitation = AdminInvitation::where('organization_id', request('organization_id'))
            ->findOrFail($id);
        $invitation->update([
            'email' => $request->validated()['email'],
            'role_id' => $role->id,
        ]);
        return new UserResource($invitation->refresh());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id): mixed
    {
        $invitation = AdminInvitation::where('organization_id', request('organization_id'))
            ->whereState('state', Sent::class)
            ->findOrFail($id);
        return $invitation->delete();
    }
}
