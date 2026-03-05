<?php

namespace Admin\Mentors\Controllers;

use Admin\Courses\Requests\CourseRequest;
use Admin\Courses\Resources\CourseResource;
use Admin\Mentors\Requests\EducationRequest;
use Admin\Mentors\Requests\MentorRequest;
use Admin\Mentors\Resources\MentorResource;
use Admin\News\Resources\NewsResource;
use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Mentor;
use App\Models\MentorEducations;
use App\Models\Session;
use App\Models\SessionType;
use App\Models\News;
use App\Models\NewsCategoryType;
use Auth;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Throwable;

class MentorEducationController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return QueryBuilder::for(MentorEducations::with('mentor'))
            ->allowedFilters(['mentor_id' , 'city_id' , 'field_of_study_id' , 'university_name' , 'course_name' , 'start_year' , 'end_year',
                AllowedFilter::exact('university_name'),
                AllowedFilter::custom(
                    'search',
                    new FuzzyFilter(
                        'university_name'
                    ))])
            ->allowedSorts( 'mentor_id' , 'city_id' , 'field_of_study_id' , 'university_name' , 'course_name' , 'start_year' , 'end_year')
            ->orderByDesc('id')
            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EducationRequest $request
     * @return Model|Mentor
     * @throws Throwable
     */
    public function store(EducationRequest $request): Model|Mentor
    {
        return MentorEducations::create(collect($request->validated())
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
        $mentor = MentorEducations::with('mentor')->findOrFail($id);
        return new MentorResource($mentor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EducationRequest $request
     * @param int $id
     * @return MentorResource
     */
    public function update(EducationRequest $request, int $id): MentorResource
    {
        $mentor = MentorEducations::findOrFail($id);
        $mentor->update($request->validated());
        return new MentorResource($mentor->refresh());
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $record = MentorEducations::find($id);
        if (!$record) {
            return response()->json(['error' => 'Record not found'], 404);
        }
        $record->delete();
        return response()->json(['message' => 'Record deleted successfully']);
    }

}
