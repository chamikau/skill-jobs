<?php

namespace Admin\Events\Controllers;

use Admin\Events\Requests\EventDescriptionRequest;
use Admin\Events\Requests\EventRequest;
use Admin\Events\Resources\EventResource;
use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventType;
use App\Models\StudentEventApply;
use App\Models\StudentJobApply;
use Auth;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class EventController extends Controller
{

    /**
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return QueryBuilder::for(Event::with('eventType'))
            ->allowedFilters(['event_type_id', 'name', 'date', 'location',  'description',
                AllowedFilter::custom(
                    'search',
                    new FuzzyFilter(
                        'name',
                    ))])
            ->allowedSorts('event_type_id', 'name', 'date', 'location',  'description')
            ->orderByDesc('id')
            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);
    }

    /**
     * @param EventRequest $request
     * @return Model|Event
     */
    public function store(EventRequest $request): Event|Model
    {
        return Event::create(collect($request->validated())
            ->put('created_by', Auth::id())
            ->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return EventResource
     */
    public function show(int $id): EventResource
    {
        $course = Event::with('eventType')->findOrFail($id);
        return new EventResource($course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EventRequest $request
     * @param int $id
     * @return EventResource
     */
    public function update(EventRequest $request, int $id): EventResource
    {
        $course = Event::findOrFail($id);
        $course->update($request->validated());
        return new EventResource($course->refresh());
    }


}
