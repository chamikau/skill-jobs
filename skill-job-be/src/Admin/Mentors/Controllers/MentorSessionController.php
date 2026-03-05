<?php

namespace Admin\Mentors\Controllers;

use Admin\Courses\Requests\CourseRequest;
use Admin\Courses\Resources\CourseResource;
use Admin\Mentors\Requests\MentorRequest;
use Admin\Mentors\Requests\SessionRequest;
use Admin\Mentors\Resources\MentorResource;
use Admin\Mentors\Resources\SessionResource;
use Admin\News\Resources\NewsResource;
use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Education;
use App\Models\Mentor;
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

class MentorSessionController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return QueryBuilder::for(Session::with('mentors','sessionTypes'))
            ->allowedFilters(['session_type_id' , 'mentor_id' , 'fees' , 'available_time' , 'description',
                AllowedFilter::exact('name'),
                AllowedFilter::custom(
                    'search',
                    new FuzzyFilter(
                        'name'
                    ))])
            ->allowedSorts( 'session_type_id' , 'mentor_id' , 'fees' , 'available_time' , 'description')
            ->orderByDesc('id')
            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SessionRequest $request
     * @return Model|Mentor
     * @throws Throwable
     */
    public function store(SessionRequest $request): Model|Mentor
    {
        return Session::create(collect($request->validated())
            ->put('created_by', Auth::id())
            ->toArray());
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return SessionResource
     */
    public function show(int $id): SessionResource
    {
        $session = Session::with('mentors','sessionTypes')->findOrFail($id);
        return new SessionResource($session);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SessionRequest $request
     * @param int $id
     * @return SessionResource
     */
    public function update(SessionRequest $request, int $id): SessionResource
    {
        $mentor = Session::findOrFail($id);
        $mentor->update($request->validated());
        return new SessionResource($mentor->refresh());
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $record = Session::find($id);
        if (!$record) {
            return response()->json(['error' => 'Record not found'], 404);
        }
        $record->delete();
        return response()->json(['message' => 'Record deleted successfully']);
    }

}
