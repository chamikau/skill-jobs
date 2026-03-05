<?php

namespace Student\Courses\Controllers;

use App\Models\CourseType;
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

class CourseTypeController extends Controller
{

    /**
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return QueryBuilder::for(CourseType::class)
            ->allowedFilters(['name',
                AllowedFilter::custom(
                    'search',
                    new FuzzyFilter(
                        'name',
                    ))])
            ->allowedSorts('name')
            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);
    }

}
