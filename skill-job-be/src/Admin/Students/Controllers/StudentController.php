<?php

namespace Admin\Students\Controllers;

use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Student;
use App\Models\StudentHobby;
use App\Models\StudentSkill;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Response;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Student\Profile\Resources\ProfileResource;
use Student\Users\Requests\StudentRequest;
use Student\Users\Resources\StudentResource;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return LengthAwarePaginator
     */
    public function index()
    {
        return QueryBuilder::for(Student::with('educations'))
            ->allowedFilters(['first_name', 'last_name',
                AllowedFilter::custom(
                    'search',
                    new FuzzyFilter(
                        'name',
                    ))])
            ->allowedSorts('id')
            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Admin\Students\Resources\StudentResource
     */
    public function show(int $id)
    {
        $student = Student::with('educations.fieldOfStudyTypes','certifications','projects')
        ->findOrFail($id);
        return new \Admin\Students\Resources\StudentResource($student);
    }


}
