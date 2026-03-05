<?php

namespace Company\Jobs\Controllers;

use Company\Jobs\Requests\JobDescriptionRequest;
use Company\Jobs\Requests\JobRequest;
use Company\Jobs\Resources\JobResource;
use Company\Jobs\States\Job\Active;
use Company\Jobs\States\Job\Inactive;
use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\Job;
use Auth;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Throwable;

class JobController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('organization-permission-checker:list-job')->only('index');
//        $this->middleware('organization-permission-checker:create-job')->only('store');
//        $this->middleware('organization-permission-checker:show-job')->only('show');
//        $this->middleware('organization-permission-checker:update-job')->only('update');
//        $this->middleware('organization-permission-checker:state-update-job')->only('active,inactive');
//    }

    /**
     * Display a listing of the resource.
     *
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return QueryBuilder::for(Job::organizationFilter(request('organization_id'))->with('organization', 'admin', 'city'))
            ->allowedFilters(['title',
                AllowedFilter::exact('state'),
                AllowedFilter::custom(
                    'search',
                    new FuzzyFilter(
                        'title'
                    ))])
            ->allowedSorts( 'title', 'number_of_openings','probation_duration','work_hours','work_hour_rate','application','description','state')
            ->orderByDesc('id')
            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param JobRequest $request
     * @return Model|Job
     * @throws Throwable
     */
    public function store(JobRequest $request): Model|Job
    {
        return Job::create(collect($request->validated())
            ->put('created_by', Auth::id())
            ->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JobResource
     */
    public function show(int $id): JobResource
    {
        $job = Job::organizationFilter(request('organization_id'))->with('organization', 'admin', 'city')->findOrFail($id);
        return new JobResource($job);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param JobRequest $request
     * @param int $id
     * @return JobResource
     */
    public function update(JobRequest $request, int $id): JobResource
    {
        $job = Job::organizationFilter(request('organization_id'))->findOrFail($id);
        $job->update($request->validated());
        return new JobResource($job->refresh());
    }

    public function getJobCount(): int
    {
        return QueryBuilder::for(Job::organizationFilter(request('organization_id')))
            ->allowedFilters([
                AllowedFilter::exact('state')
            ])
            ->count();
    }

    /**
     * @param $id
     * @return JobResource
     */
    public function active($id): JobResource
    {
        $job = Job::organizationFilter(request('organization_id'))->findOrFail($id);
        $job->state->transitionTo(Active::class);
        return new JobResource($job->refresh());
    }

    /**
     * @param $id
     * @return JobResource
     */
    public function inactive($id): JobResource
    {
        $job = Job::organizationFilter(request('organization_id'))->findOrFail($id);
        $job->state->transitionTo(Inactive::class);
        return new JobResource($job->refresh());
    }

}
