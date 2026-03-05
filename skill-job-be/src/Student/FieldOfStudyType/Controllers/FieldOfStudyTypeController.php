<?php

namespace Student\FieldOfStudyType\Controllers;

use Student\Users\Resources\StudentResource;
use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\Certification;
use App\Models\Education;
use App\Models\FieldOfStudyType;
use App\Models\Student;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Student\Educations\Resources\EducationResource;

class FieldOfStudyTypeController extends Controller
{

    /**
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return QueryBuilder::for(FieldOfStudyType::class)
            ->allowedFilters(['name',
                AllowedFilter::custom('search',
                    new FuzzyFilter('name',))])
            ->allowedSorts('name')
            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);
    }

}
