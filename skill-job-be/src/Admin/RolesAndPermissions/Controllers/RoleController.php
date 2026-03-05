<?php

namespace Admin\RolesAndPermissions\Controllers;

use Admin\RolesAndPermissions\Requests\RoleRequest;
use Admin\RolesAndPermissions\Resources\RoleResource;
use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\Role;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('organization-permission-checker:list-role')->only('index');
        $this->middleware('organization-permission-checker:create-role')->only('store');
        $this->middleware('organization-permission-checker:show-role')->only('show');
        $this->middleware('organization-permission-checker:update-role')->only('update');
    }

    /**
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return QueryBuilder::for(Role::organizationFilter(request('organization_id')))
            ->allowedFilters(['name',
                AllowedFilter::custom(
                    'search',
                    new FuzzyFilter(
                        'name',
                    ))])
            ->allowedSorts('name')
            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);
    }

    /**
     * @param RoleRequest $request
     * @return RoleResource
     */
    public function store(RoleRequest $request): RoleResource
    {
        $role = Organization::findOrFail(request('organization_id'))->roles()->create($request->validated());
        $role->permissions()->sync($request->validated()['permissions']);
        return new RoleResource($role);
    }

    /**
     * @param $id
     * @return RoleResource
     */
    public function show($id): RoleResource
    {
        $role = Role::organizationFilter(request('organization_id'))->with('permissions')->findOrFail($id);
        return new RoleResource($role);
    }

    /**
     * @param RoleRequest $request
     * @param $id
     * @return RoleRequest|JsonResponse
     */
    public function update(RoleRequest $request, $id): RoleResource|JsonResponse
    {
        $role = Role::organizationFilter(request('organization_id'))->findOrFail($id);
        if ($role->is_super) return response()->json(['message' => 'Admin role can\'t be edited.'], 422);
        $role->update($request->validated());
        $role->permissions()->sync($request->validated()['permissions']);
        return new RoleResource($role->refresh());
    }
}
