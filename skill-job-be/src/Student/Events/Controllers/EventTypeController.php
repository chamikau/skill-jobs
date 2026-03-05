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

class EventTypeController extends Controller
{

    /**
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return QueryBuilder::for(EventType::class)
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
