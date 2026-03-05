<?php

namespace Student\Mentors\Controllers;

use Student\Mentors\Resources\MentorResource;
use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\MentorEducations;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class MentorEducationController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return QueryBuilder::for(MentorEducations::with('mentor'))
            ->allowedFilters(['mentor_id' , 'city_id' , 'field_of_study_id' , 'university_name' , 'course_name' , 'start_year' , 'end_year',
                AllowedFilter::exact('university_name'),
                AllowedFilter::custom(
                    'search',
                    new FuzzyFilter(
                        'university_name'
                    ))])
            ->allowedSorts( 'mentor_id' , 'city_id' , 'field_of_study_id' , 'university_name' , 'course_name' , 'start_year' , 'end_year')
            ->orderByDesc('id')
            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return MentorResource
     */
    public function show(int $id): MentorResource
    {
        $mentor = MentorEducations::with('mentor','fieldOfStudyTypes')
            ->where('mentor_id' , $id)->get();
        return new MentorResource($mentor);
    }


}
