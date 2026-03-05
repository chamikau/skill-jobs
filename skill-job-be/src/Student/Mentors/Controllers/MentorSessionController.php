<?php

namespace Student\Mentors\Controllers;

use Student\Mentors\Resources\SessionResource;
use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\Session;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class MentorSessionController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return QueryBuilder::for(Session::with('mentors','sessionTypes'))
            ->allowedFilters(['session_type_id' , 'mentor_id' , 'fees' , 'available_time' , 'description',
                AllowedFilter::exact('name'),
                AllowedFilter::custom(
                    'search',
                    new FuzzyFilter(
                        'name'
                    ))])
            ->allowedSorts( 'session_type_id' , 'mentor_id' , 'fees' , 'available_time' , 'description')
            ->orderByDesc('id')
            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return SessionResource
     */
    public function show(int $id): SessionResource
    {
        $session = Session::with('mentors','sessionTypes')
            ->where('mentor_id' , $id)->get();
        return new SessionResource($session);
    }

}
