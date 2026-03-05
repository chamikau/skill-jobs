<?php

namespace Admin\Courses\Controllers;

use Admin\Courses\Requests\CourseDescriptionRequest;
use Admin\Courses\Requests\CourseRequest;
use Admin\Courses\Resources\CourseResource;
use Admin\Events\Resources\EventResource;
use Admin\Jobs\Requests\JobRequest;
use Admin\Jobs\Resources\JobResource;
use Admin\Organizations\Resources\OrganizationResource;
use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\AdminOrganization;
use App\Models\AdminOrganizationRole;
use App\Models\Content;
use App\Models\Course;
use App\Models\CourseType;
use App\Models\Hobby;
use App\Models\Job;
use App\Models\Organization;
use App\Models\Permission;
use App\Models\StudentCourseApply;
use Auth;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CourseController extends Controller
{

    /**
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return QueryBuilder::for(Course::with('courseType'))
            ->allowedFilters(['name','course_type_id',
                AllowedFilter::custom(
                    'search',
                    new FuzzyFilter(
                        'name',
                    ))])
            ->allowedSorts('name','course_type_id', 'description')
            ->orderByDesc('id')
            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);
    }

    /**
     * @param CourseRequest $request
     * @return Model|Course
     */
    public function store(CourseRequest $request): Course|Model
    {
        return DB::transaction(function () use ($request) {

           $course = Course::create(
                collect($request->validated())
                    ->put('created_by', Auth::id())->toArray()
            );
            Course::with('courseType')->findOrFail($course->id);
            return $course;
        });
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return CourseResource
     */
    public function show(int $id): CourseResource
    {
        $course = Course::with('contents','courseType','students')->findOrFail($id);
        return new CourseResource($course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CourseRequest $request
     * @param int $id
     * @return CourseResource
     */
    public function update(CourseRequest $request, int $id): CourseResource
    {
        $course = Course::findOrFail($id);
        $course->update($request->validated());
        return new CourseResource($course->refresh());
    }

}
