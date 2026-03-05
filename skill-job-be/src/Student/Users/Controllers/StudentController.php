<?php

namespace Student\Users\Controllers;

use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\Certification;
use App\Models\Education;
use App\Models\Project;
use App\Models\Student;
use App\Models\StudentHobby;
use App\Models\StudentSkill;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
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
     * Store a newly created resource in storage.
     *
     * @param StudentRequest $request
     * @return array
     */
    public function store(StudentRequest $request)
    {
        return Student::create($request->validated())->toArray();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response|StudentResource
     */
    public function show($id): Response|StudentResource
    {
        $student = Student::with('educations.fieldOfStudyTypes','certifications','projects','workExperience')
        ->findOrFail($id);
        return new StudentResource($student);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param StudentRequest $request
     * @param int $id
     * @return StudentResource
     */
    public function update(StudentRequest $request, $id): StudentResource
    {
        $student = Student::findOrFail($id);
        $student->update($request->validated());
        return new StudentResource($student->refresh());
    }

}
