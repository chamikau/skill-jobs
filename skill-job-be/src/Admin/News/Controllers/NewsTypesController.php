<?php

namespace Admin\News\Controllers;

use Admin\News\Requests\NewsDescriptionRequest;
use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\NewsCategoryType;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class NewsTypesController extends Controller
{

    /**
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return QueryBuilder::for(NewsCategoryType::class)
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
