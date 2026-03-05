<?php

namespace Admin\Jobs\Controllers;

use Admin\Jobs\States\Job\Active;
use Admin\Jobs\States\Job\Inactive;
use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\StudentJobApply;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class StudentAppliedJobController extends Controller
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
     * Display the specified resource.
     *
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        //it will change
        return QueryBuilder::for(StudentJobApply::with('jobs','students'))
            ->allowedFilters(['jobs.title', 'students.first_name', 'students.last_name', 'jobs.email',
                AllowedFilter::custom(
                    'search',
                    new FuzzyFilter(
                        'jobs.title'
                    ))])
            ->allowedSorts( 'jobs.title', 'students.first_name', 'students.last_name', 'jobs.email')
            ->orderByDesc('id')
            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);
    }

}
