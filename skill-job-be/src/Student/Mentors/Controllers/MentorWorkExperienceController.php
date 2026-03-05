<?php

namespace Student\Mentors\Controllers;

use Student\Mentors\Requests\WorkExperienceRequest;
use Student\Mentors\Resources\MentorResource;
use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\Mentor;
use App\Models\MentorWorkExperiences;
use App\Models\WorkExperienceJobRole;
use Auth;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Throwable;

class MentorWorkExperienceController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return QueryBuilder::for(MentorWorkExperiences::with('mentor','workExperienceJobType'))
            ->allowedFilters(['mentor_id' , 'work_experience_job_role_id' , 'name' , 'duration' , 'description',
                AllowedFilter::exact('name'),
                AllowedFilter::custom(
                    'search',
                    new FuzzyFilter(
                        'name'
                    ))])
            ->allowedSorts( 'mentor_id' , 'work_experience_job_role_id' , 'name' , 'duration' , 'description')
            ->orderByDesc('id')
            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return MentorResource
     */
    public function show(int $id): MentorResource
    {
        $mentor = MentorWorkExperiences::with('mentor','workExperienceJobType')
            ->where('mentor_id' , $id)->get();
        return new MentorResource($mentor);
    }

}
