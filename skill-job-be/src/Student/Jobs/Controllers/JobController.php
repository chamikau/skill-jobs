<?php

namespace Student\Jobs\Controllers;

use App\Models\Certification;
use App\Models\StudentJobApply;
use Student\Certifications\Requests\CertificationRequest;
use Student\Jobs\Requests\JobApplyRequest;
use Student\Jobs\Resources\JobResource;
use Student\Jobs\States\Job\Active;
use Student\Jobs\States\Job\Inactive;
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

    /**
     * Display a listing of the resource.
     *
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return QueryBuilder::for(Job::where('state' , Active::$name)
        ->with('organization', 'admin', 'city'))
            ->whereHas('organization', function ($query) {
                $query->where('state', Active::$name);
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
     * Store a newly created resource in storage.
     *
     * @param JobApplyRequest $request
     */
    public function store(JobApplyRequest $request)
    {
        return StudentJobApply::create(collect($request->validated())->put('student_id', \Illuminate\Support\Facades\Auth::id())->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JobResource
     */
    public function show(int $id): JobResource
    {
        $userId = Auth::id();
        $job = Job::with('organization', 'admin', 'city','organization.industryTypes' , 'students')
            ->findOrFail($id);
        $userIdMatch = false;
        foreach ($job->students as $student) {
            $studentId = $student->id;
            if ($studentId === $userId){
                $userIdMatch = true;
            }
        }
        return new JobResource($job,$userIdMatch);
    }

}
