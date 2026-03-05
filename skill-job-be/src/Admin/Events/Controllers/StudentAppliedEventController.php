<?php

namespace Admin\Events\Controllers;

use Admin\Events\Requests\EventDescriptionRequest;
use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentEventApply;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class StudentAppliedEventController extends Controller
{

    /**
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        //it will change
        return QueryBuilder::for(StudentEventApply::with('events','students'))
            ->allowedFilters(['events.name',
                AllowedFilter::custom(
                    'search',
                    new FuzzyFilter(
                        'events.name'
                    ))])
            ->allowedSorts( 'events.name', 'events.event_organizer', 'students.first_name', 'students.last_name')
            ->orderByDesc('id')
            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);
    }
//
//    /**
//     * Display the specified resource.
//     *
//     * @param int $id
//     * @return LengthAwarePaginator
//     */
//    public function show(int $id): LengthAwarePaginator
//    {
//        return QueryBuilder::for(Student::with('events'))
//            ->whereHas('events', function ($query) use ($id) {
//                $query->where('events', $id);
//            })
//            ->allowedSorts('first_name')
//            ->orderByDesc('id')
//            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);
//    }



}
