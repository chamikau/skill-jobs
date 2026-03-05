<?php

namespace Student\Courses\Controllers;

use App\Models\CourseType;
use App\Models\Event;
use App\Models\StudentCourseApply;
use App\Models\StudentJobApply;
use Student\Courses\Requests\CourseEnrollRequest;
use Student\Courses\Requests\CourseRequest;
use Student\Courses\Resources\CourseResource;
use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Auth;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Student\Jobs\Requests\JobApplyRequest;

class StudentAppliedCourseController extends Controller
{

    /**
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        //it will change
        return QueryBuilder::for(StudentCourseApply::with('courses.courseType'))
            ->where('state','applied')
            ->where('student_id',Auth::id())
            ->allowedFilters(['courses.name','courses.course_type_id','courses.name', 'courses.instructor_name',
                AllowedFilter::custom(
                    'search',
                    new FuzzyFilter(
                        'courses.name'
                    ))])
            ->allowedSorts( 'courses.name', 'courses.courseType.course_type_id','courses.instructor_name')
            ->orderByDesc('id')
            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CourseEnrollRequest $request
     * @return Model|StudentCourseApply
     */
    public function store(CourseEnrollRequest $request): StudentCourseApply|Model
    {
        $studentId = \Illuminate\Support\Facades\Auth::id();
        $existingCourse = StudentCourseApply::where('student_id', $studentId)
            ->where('course_id',$request->course_id)
            ->whereIn('state', ['applied', 'canceled'])
            ->first();
        if ($existingCourse) {
            $existingCourse->update(['state' => 'applied']);
            return $existingCourse;
        }
        $newCourse = StudentCourseApply::create(
            collect($request->validated())
                ->put('student_id', $studentId)
                ->put('state', 'applied')
                ->toArray()
        );
        return $newCourse;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CourseEnrollRequest $request
     * @param int $id
     */
    public function update(CourseEnrollRequest $request,$id)
    {
        StudentCourseApply::where('student_id', Auth::id())
            ->where('course_id',$id)
            ->update(array_merge($request->validated(), ['state' => 'canceled']));
        return 'update success';
    }
}
