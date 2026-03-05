<?php

namespace Student\Cities\Controllers;

use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CityController extends Controller
{

    /**
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return QueryBuilder::for(City::with('country'))
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
