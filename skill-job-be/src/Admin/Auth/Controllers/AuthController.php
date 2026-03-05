<?php

namespace Admin\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminOrganization;
use App\Models\AdminOrganizationRole;
use App\Models\Organization;
use App\Models\Permission;
use App\Models\SuperAdmin;
use Auth;
use DB;
use Hash;
use Illuminate\Http\JsonResponse;
use Admin\Auth\Requests\RegisterRequest;
use Throwable;

class AuthController extends Controller
{
    /**
     * @param RegisterRequest $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        return DB::transaction(function () use ($request) {
            $password = Hash::make($request->validated()['password']);
            $admin = SuperAdmin::create(collect($request->validated())->put('password', $password)->toArray());
            if (count($request->validated()['company']) > 0 ) {
                $organization = Organization::create(collect($request->validated()['company'])->put('admin_id',$admin->id)->toArray());

                $new_organization = Organization::where('uuid', $organization->uuid)->first();
                $admin_organization = AdminOrganization::updateOrCreate(['admin_id' => $admin->id, 'organization_id' => $new_organization->id]);

                $role = $new_organization->roles()->create(['name' => 'Admin', 'is_super' => true]);
                $role->permissions()->sync(Permission::where('portal', 'admin')->get());

                AdminOrganizationRole::create(['admin_organization_id' => $admin_organization->id, 'role_id' => $role->id]);
            }
            $admin->sendEmailVerificationNotification();
            return response()->json(['message' => 'success'], 200);
        });
    }
}
