<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\AdminOrganization;
use App\Models\AdminOrganizationRole;
use App\Models\Organization;
use App\Models\Permission;
use App\Models\PermissionGroup;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // create all permissions and groups
        $permission_groups = [
            [
                'name' => 'User Management', 'portal' => 'admin', 'permissions' =>
                [
                    ['code' => 'create-user', 'name' => 'Create User'],
                    ['code' => 'update-user', 'name' => 'Update User'],
                    ['code' => 'show-user', 'name' => 'Show User'],
                    ['code' => 'list-user', 'name' => 'List User'],
                ],
            ],
            [
                'name' => 'Job Management', 'portal' => 'admin', 'permissions' =>
                [
                    ['code' => 'create-job', 'name' => 'Create job'],
                    ['code' => 'update-job', 'name' => 'Update job'],
                    ['code' => 'show-job', 'name' => 'Show job'],
                    ['code' => 'list-job', 'name' => 'List job'],
                    ['code' => 'state-update-job', 'name' => 'State Update Job'],
                ],
            ],
            [
                'name' => 'Role Management', 'portal' => 'admin', 'permissions' =>
                [
                    ['code' => 'create-role', 'name' => 'Create role'],
                    ['code' => 'update-role', 'name' => 'Update role'],
                    ['code' => 'show-role', 'name' => 'Show role'],
                    ['code' => 'list-role', 'name' => 'List role'],
                ],
            ],
            [
                'name' => 'User Invitation Management', 'portal' => 'admin', 'permissions' =>
                [
                    ['code' => 'create-user-invitation', 'name' => 'Create Student invitation'],
                    ['code' => 'update-user-invitation', 'name' => 'Update Student invitation'],
                    ['code' => 'destroy-user-invitation', 'name' => 'Destroy Student invitation'],
                    ['code' => 'show-user-invitation', 'name' => 'Show Student invitation'],
                    ['code' => 'list-user-invitation', 'name' => 'List Student invitation'],
                ],
            ],
        ];

        foreach ($permission_groups as $permission_group) {

            $new_permission_group = PermissionGroup::create([
                'name' => $permission_group['name'],
                'portal' => $permission_group['portal']
            ]);

            foreach ($permission_group['permissions'] as $permission) {
                $new_permission_group->permissions()->create([
                    'name' => $permission['name'], 'code' => $permission['code'],
                    'portal' => $permission_group['portal'],
                    'permission_group_id' => $new_permission_group->id
                ]);
            }
        }


        // create roles and map permissions
        foreach (Organization::all() as $organization) {
            $role = $organization->roles()->create(['name' => 'Admin', 'is_super' => true]);

            $role->permissions()->sync(Permission::wherePortal('admin')->get()->pluck('id'));

            // add permission and role to owner
            $admin_organization = AdminOrganization::firstOrCreate(['organization_id' => $organization->id,
                'admin_id' => $organization->admin_id]);
            AdminOrganizationRole::create([
                'admin_organization_id' => $admin_organization->id,
                'role_id' => $role->id
            ]);

            // add permission to all admins
            foreach (Admin::all() as $admin) {
                $admin->organizations()->syncWithoutDetaching($organization->id);

                $admin_organization = AdminOrganization::where('admin_id', $admin->id)
                    ->where('organization_id', $organization->id)->firstOrfail();

                AdminOrganizationRole::create([
                    'admin_organization_id' => $admin_organization->id,
                    'role_id' => $role->id
                ]);

            }

//            dd(Admin::firstOrFail()->adminOrganizationRoles()->with(['role', 'role.permissions'])->get());
        }


//        $roles = Role::whereHasMorph('temable', Organization::class, function ($query, $type) {
//            $query->where('temable_id', Organization::firstOrFail()->id);
//        })->get();
//        dd($roles);


    }
}
