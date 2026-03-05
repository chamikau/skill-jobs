<?php

namespace Student\Feedbacks\Controllers;

use App\Models\CourseType;
use App\Models\Feedback;
use Student\Feedbacks\Requests\FeedbackRequest;
use Student\Feedbacks\Resources\FeedbackResource;
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
        return QueryBuilder::for(Feedback::class)
            ->allowedFilters(['number_of_rating','message',
                AllowedFilter::custom(
                    'search',
                    new FuzzyFilter(
                        'number_of_rating',
                        'message',
                    ))])
            ->allowedSorts('number_of_rating', 'message')
            ->orderByDesc('id')
            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FeedbackRequest $request
     */
    public function store(FeedbackRequest $request)
    {
        return Feedback::create(collect($request->validated())
            ->put('student_id', \Illuminate\Support\Facades\Auth::id())
            ->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return FeedbackResource
     */
    public function show(int $id): FeedbackResource
    {
        $course = Feedback::findOrFail($id);
        return new FeedbackResource($course);
    }


}
