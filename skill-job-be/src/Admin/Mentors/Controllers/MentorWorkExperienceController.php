<?php

namespace Admin\Mentors\Controllers;

use Admin\Courses\Requests\CourseRequest;
use Admin\Courses\Resources\CourseResource;
use Admin\Mentors\Requests\MentorRequest;
use Admin\Mentors\Requests\WorkExperienceRequest;
use Admin\Mentors\Resources\MentorResource;
use Admin\News\Resources\NewsResource;
use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Mentor;
use App\Models\MentorEducations;
use App\Models\MentorWorkExperiences;
use App\Models\Session;
use App\Models\SessionType;
use App\Models\News;
use App\Models\NewsCategoryType;
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
     * Store a newly created resource in storage.
     *
     * @param WorkExperienceRequest $request
     * @return Model|Mentor
     * @throws Throwable
     */
    public function store(WorkExperienceRequest $request): Model|Mentor
    {
        return MentorWorkExperiences::create(collect($request->validated())
            ->put('created_by', Auth::id())
            ->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return MentorResource
     */
    public function show(int $id): MentorResource
    {
        $mentor = MentorWorkExperiences::with('mentor')->findOrFail($id);
        return new MentorResource($mentor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param WorkExperienceRequest $request
     * @param int $id
     * @return MentorResource
     */
    public function update(WorkExperienceRequest $request, int $id): MentorResource
    {
        $mentor = MentorWorkExperiences::findOrFail($id);
        $mentor->update($request->validated());
        return new MentorResource($mentor->refresh());
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $record = MentorWorkExperiences::find($id);
        if (!$record) {
            return response()->json(['error' => 'Record not found'], 404);
        }
        $record->delete();
        return response()->json(['message' => 'Record deleted successfully']);
    }
}
