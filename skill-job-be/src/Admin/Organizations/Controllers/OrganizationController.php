<?php

namespace Admin\Organizations\Controllers;

use Admin\Jobs\Resources\JobResource;
use Admin\Organizations\Requests\OrganizationRequest;
use Admin\Organizations\Resources\OrganizationResource;
use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminOrganization;
use App\Models\AdminOrganizationRole;
use App\Models\Job;
use Admin\Organizations\States\Organization\Active;
use Admin\Organizations\States\Organization\Inactive;
use App\Models\Organization;
use App\Models\Permission;
use Auth;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Throwable;

class OrganizationController extends Controller
{

    /**
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return QueryBuilder::for(Organization::adminOrganizations(Auth::id()))
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
     * Display a listing of the resource.
     *
     * @return LengthAwarePaginator
     */
    public function getCompanyLists(): LengthAwarePaginator
    {
        return QueryBuilder::for(Organization::with( 'owner','industryTypes'))
            ->allowedFilters(['name',
                AllowedFilter::exact('name'),
                AllowedFilter::custom(
                    'search',
                    new FuzzyFilter(
                        'name',
                    ))])
            ->allowedSorts( 'name', 'industry_type_id', 'state')
            ->orderByDesc('id')
            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);
    }

    /**
     * Display a listing of the resource.
     *
     * @return OrganizationResource
     */
    public function getCompany($id): OrganizationResource
    {
        $organization = Organization::with('owner','industryTypes')->findOrFail($id);
        return new OrganizationResource($organization);
    }
    /**
     * @param OrganizationRequest $request
     * @return OrganizationResource
     * @throws Throwable
     */
    public function store(OrganizationRequest $request): OrganizationResource
    {
        return DB::transaction(function () use ($request) {

            $organization = Organization::create(
                collect($request->validated())
                    ->put('admin_id', Auth::id())->toArray()
            );

            $new_organization = Organization::where('uuid', $organization->uuid)->first();
            $admin_organization = AdminOrganization::updateOrCreate(['admin_id' => Auth::id(), 'organization_id' => $new_organization->id]);

            $role = $new_organization->roles()->create(['name' => 'Admin', 'is_super' => true]);
            $role->permissions()->sync(Permission::where('portal', 'admin')->get());

            AdminOrganizationRole::create(['admin_organization_id' => $admin_organization->id, 'role_id' => $role->id]);

            return new OrganizationResource($new_organization);

        });
    }

    /**
     * @param $id
     * @return OrganizationResource
     */
    public function show($id): OrganizationResource
    {
        $organization = Organization::adminOrganizations(Auth::id())->findOrFail($id);
        $admin_organization_roles = Auth::user()->adminOrganizationRoles()->where('organization_id', $organization->id)
            ->with('role', 'role.permissions')->get();
        return new OrganizationResource(collect($organization)->put('admin_organization_roles', $admin_organization_roles));
    }

    /**
     * @param OrganizationRequest $request
     * @param $id
     * @return OrganizationResource
     */
    public function update(OrganizationRequest $request, $id): OrganizationResource
    {
        $organization = Organization::adminOrganizations(Auth::id())->findOrFail($id);
        $organization->update($request->validated());
        return new OrganizationResource($organization->refresh());
    }

    /**
     * @param $id
     * @return OrganizationResource
     */
    public function active($id): OrganizationResource
    {
        $company = Organization::findOrFail($id);
        $company->state->transitionTo(Active::class);
        return new OrganizationResource($company->refresh());
    }

    /**
     * @param $id
     * @return OrganizationResource
     */
    public function inactive($id): OrganizationResource
    {
        $company = Organization::findOrFail($id);
        $company->state->transitionTo(Inactive::class);
        return new OrganizationResource($company->refresh());
    }
}
