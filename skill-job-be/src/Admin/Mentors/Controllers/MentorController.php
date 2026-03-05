<?php

namespace Admin\Mentors\Controllers;

use Admin\Courses\Requests\CourseRequest;
use Admin\Courses\Resources\CourseResource;
use Admin\Mentors\Requests\MentorRequest;
use Admin\Mentors\Resources\MentorResource;
use Admin\News\Resources\NewsResource;
use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Mentor;
use App\Models\SessionType;
use App\Models\News;
use App\Models\NewsCategoryType;
use Auth;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Throwable;

class MentorController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('organization-permission-checker:list-Mentor')->only('index');
//        $this->middleware('organization-permission-checker:create-Mentor')->only('store');
//        $this->middleware('organization-permission-checker:show-Mentor')->only('show');
//        $this->middleware('organization-permission-checker:update-Mentor')->only('update');
//        $this->middleware('organization-permission-checker:state-update-Mentor')->only('active,inactive');
//    }

    /**
     * Display a listing of the resource.
     *
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return QueryBuilder::for(Mentor::with('admin','session','session.sessionTypes'))
            ->allowedFilters(['name' , 'position' , 'phone_number_1' , 'about_mentor',
                AllowedFilter::custom(
                    'search',
                    new FuzzyFilter(
                        'name'
                    ))])
            ->allowedSorts( 'name' , 'position' , 'phone_number_1' , 'about _mentor')
            ->orderByDesc('id')
            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MentorRequest $request
     * @return Model|Mentor
     * @throws Throwable
     */
    public function store(MentorRequest $request): Model|Mentor
    {
        return Mentor::create(collect($request->validated())
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
        $mentor = Mentor::with('session.sessionTypes','mentorEducation','mentorWorkExperience')->findOrFail($id);
        return new MentorResource($mentor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MentorRequest $request
     * @param int $id
     * @return MentorResource
     */
    public function update(MentorRequest $request, int $id): MentorResource
    {
        $mentor = Mentor::findOrFail($id);
        $mentor->update($request->validated());
        return new MentorResource($mentor->refresh());
    }

}
