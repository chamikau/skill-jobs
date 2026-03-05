<?php

namespace Admin\RolesAndPermissions\Controllers;

use Admin\RolesAndPermissions\Resources\PermissionGroupResource;
use Admin\RolesAndPermissions\Resources\RoleResource;
use App\Http\Controllers\Controller;
use App\Models\PermissionGroup;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PermissionGroupController extends Controller
{

    /**
     * @return LengthAwarePaginator|AnonymousResourceCollection
     */
    public function index(): LengthAwarePaginator|AnonymousResourceCollection
    {
        return PermissionGroupResource::collection(PermissionGroup::with('permissions')
            ->wherePortal('admin')->get());
    }

    /**
     * @param $id
     * @return PermissionGroupResource|RoleResource|PermissionGroup
     */
    public function show($id): PermissionGroup|RoleResource|PermissionGroupResource
    {
        $permission_group = PermissionGroup::with('permissions')->wherePortal('admin')->findOrFail($id);
        return new PermissionGroupResource($permission_group);
    }
}
