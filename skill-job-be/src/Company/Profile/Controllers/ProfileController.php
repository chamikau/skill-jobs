<?php

namespace Company\Profile\Controllers;

use Company\Locations\Resources\LocationResource;
use Company\Profile\Requests\ProfileRequest;
use Company\Profile\Resources\ProfileResource;
use App\Http\Controllers\Controller;
use App\Models\AdminOrganization;
use Auth;

class ProfileController extends Controller
{
    /**
     * @return ProfileResource
     */
    public function index(): ProfileResource
    {
        $user = Auth::user();
        return new ProfileResource($user);
    }

    /**
     * @param ProfileRequest $request
     * @param $id
     * @return LocationResource|ProfileResource
     */
    public function store(ProfileRequest $request): ProfileResource|LocationResource
    {
        $user = Auth::user();
        $user->update($request->validated());
        return new ProfileResource($user->refresh());
    }

    /**
     * @return ProfileResource
     */
    public function getProfileRoles(): ProfileResource
    {
        $adminOrganization = AdminOrganization::where('admin_id',Auth::id())
            ->where('organization_id',request('organization_id'))->firstOrFail();
        $role =  Auth::user()
            ->adminOrganizationRoles()
            ->where('admin_organization_id',$adminOrganization->id)->firstOrFail();
        return new ProfileResource($role->role);
    }
}
