<?php

namespace Student\Events\Controllers;

use App\Models\StudentEventApply;
use Student\Events\Requests\EventEnrollRequest;
use Student\Events\Requests\EventRequest;
use Student\Events\Resources\EventResource;
use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventType;
use Auth;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class StudentAppliedEventController extends Controller
{

    /**
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return QueryBuilder::for(StudentEventApply::with('events.eventType'))
            ->where('state','applied')
            ->where('student_id',Auth::id())
            ->allowedFilters(['events.name','events.event_type_id',
                AllowedFilter::custom(
                    'search',
                    new FuzzyFilter(
                        'events.name'
                    ))])
            ->allowedSorts( 'events.name')
            ->orderByDesc('id')
            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param EventEnrollRequest $request
     * @return Model|StudentEventApply
     */
    public function store(EventEnrollRequest $request): StudentEventApply|Model
    {
        $studentId = \Illuminate\Support\Facades\Auth::id();
        $existingEvent = StudentEventApply::where('student_id', $studentId)
            ->where('event_id', $request->event_id)
            ->whereIn('state', ['applied', 'canceled'])
            ->first();
        if ($existingEvent) {
            $existingEvent->update(['state' => 'applied']);

            return $existingEvent;
        }
        $newEvent = StudentEventApply::create(
            collect($request->validated())
                ->put('student_id', $studentId)
                ->put('state', 'applied')
                ->toArray()
        );

        return $newEvent;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EventEnrollRequest $request
     * @param int $id
     */
    public function update(EventEnrollRequest $request,$id)
    {
        StudentEventApply::where('student_id', Auth::id())
            ->where('event_id',$request->event_id)
            ->update(array_merge($request->validated(), ['state' => 'canceled']));
        return 'update success';
    }

}
