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
     * Display the specified resource.
     *
     * @param int $id
     * @return EventResource
     */
    public function show(int $id): EventResource
    {
        $userId = Auth::id();
        $event = Event::with('eventType','students','studentEventApplied')->findOrFail($id);
        $userIdAndApplicantListMatch = false;
        foreach ($event->studentEventApplied as $eventAppliedList) {
            $appliedState = $eventAppliedList->state;
            $studentId = $eventAppliedList->student_id;
            if ($appliedState === 'applied' && $studentId === $userId) {
                $userIdAndApplicantListMatch = true;
                break;
            }
        }
        return new EventResource($event,$userIdAndApplicantListMatch);
    }

}
