<?php

namespace Admin\Jobs\Controllers;

use Admin\Jobs\Requests\JobRequest;
use Admin\Jobs\Resources\JobResource;
use Admin\Jobs\States\Job\Active;
use Admin\Jobs\States\Job\Inactive;
use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\StudentJobApply;
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
        return QueryBuilder::for(Job::with('organization', 'admin', 'city'))
            ->whereHas('organization', function ($query) {
                $query->where('state' ,'active');
            })
            ->allowedFilters(['title',
                AllowedFilter::exact('state'),
                AllowedFilter::custom(
                    'search',
                    new FuzzyFilter(
                        'title'
                    ))])
            ->allowedSorts( 'title', 'number_of_openings', 'location_type', 'probation_duration')
            ->orderByDesc('id')
            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JobResource
     */
    public function show(int $id): JobResource
    {
        $course = Job::with('city','organization','organization.industryTypes')->findOrFail($id);
        return new JobResource($course);
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


}
