<?php

namespace Company\Users\Controllers;

use Company\Locations\Requests\LocationRequest;
use Company\Users\Resources\UserResource;
use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('organization-permission-checker:list-user')->only('index');
        $this->middleware('organization-permission-checker:show-user')->only('show');
        $this->middleware('organization-permission-checker:update-user')->only('update');
    }

    /**
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return QueryBuilder::for(Admin::organization(request('organization_id')))
            ->allowedFilters(['name', 'email',
                AllowedFilter::custom(
                    'search',
                    new FuzzyFilter(
                        'name', 'email',
                    ))])
            ->allowedSorts('name', 'email')
            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);
    }

    /**
     * @param $id
     * @return UserResource
     */
    public function show($id): UserResource
    {
        $user = Admin::organization(request('organization_id'))->findOrFail($id);
        return new UserResource($user);
    }

    /**
     * @param LocationRequest $request
     * @param $id
     * @return UserResource
     */
    public function update(LocationRequest $request, $id): UserResource
    {
        $user = Admin::organization(request('organization_id'))->findOrFail($id);
        $user->update($request->validated());
        return new UserResource($user->refresh());
    }
}
