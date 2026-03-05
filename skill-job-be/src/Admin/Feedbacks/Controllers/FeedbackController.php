<?php

namespace Admin\Feedbacks\Controllers;

use App\Models\CourseType;
use App\Models\Feedback;
use Admin\Feedbacks\Resources\FeedbackResource;
use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Auth;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class FeedbackController extends Controller
{

    /**
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return QueryBuilder::for(Feedback::with('student'))
            ->allowedFilters(['number_of_rating','message',
                AllowedFilter::custom(
                    'search',
                    new FuzzyFilter(
                        'number_of_rating',
                        'message',
                    ))])
            ->allowedSorts('number_of_rating', 'message','student.first_name', 'student.last_name',  'student.email')
            ->orderByDesc('id')
            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return FeedbackResource
     */
    public function show(int $id): FeedbackResource
    {
        $course = Feedback::with('student')->findOrFail($id);
        return new FeedbackResource($course);
    }


}
