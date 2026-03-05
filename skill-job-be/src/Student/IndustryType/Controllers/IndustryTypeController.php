<?php

namespace Student\IndustryType\Controllers;

use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\IndustryType;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class IndustryTypeController extends Controller
{

    /**
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return QueryBuilder::for(IndustryType::class)
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
