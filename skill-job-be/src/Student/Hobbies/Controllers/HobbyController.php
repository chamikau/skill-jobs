<?php

namespace Student\Hobbies\Controllers;

use App\Models\StudentGoal;
use DB;
use Student\Hobbies\Requests\RegisterHobbyStepsRequest;
use Student\Hobbies\Requests\RegisterHobbyUpdateStepsRequest;
use Student\Hobbies\Resources\HobbyResource;
use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\Hobby;
use App\Models\Student;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class HobbyController extends Controller
{

    /**
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return QueryBuilder::for(Hobby::class)
            ->allowedFilters(['name',
                AllowedFilter::custom(
                    'search',
                    new FuzzyFilter(
                        'name',
                    ))])
            ->allowedSorts('name')
            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param RegisterHobbyStepsRequest $request
     */
    public function store(RegisterHobbyStepsRequest $request)
    {
        return DB::transaction(function () use ($request) {

            StudentGoal::create(collect($request->validated())
                ->put('student_id',Auth::id())->toArray());

            foreach($request->validated()['hobby_ids'] as $hobby_ids)
            {
                Auth::user()->hobbies()->syncWithoutDetaching($hobby_ids);
            }
            foreach($request->validated()['skill_ids'] as $skill_ids)
            {
                Auth::user()->skills()->syncWithoutDetaching($skill_ids);
            }
//            foreach($request->validated()['industry_type_ids'] as $industry_type_ids)
//            {
//                Auth::user()->industryTypeStudents()->syncWithoutDetaching($industry_type_ids);
//            }
//            foreach($request->validated()['job_type_ids'] as $job_type_ids)
//            {
//                Auth::user()->jobTypes()->syncWithoutDetaching($job_type_ids);
//            }
        });
    }

    /**
     * Store a newly created resource in storage.
     * @param RegisterHobbyUpdateStepsRequest $request
     */
    public function update(RegisterHobbyUpdateStepsRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $studentGoal = StudentGoal::where('student_id', Auth::id())->first();
            $studentGoal->update($request->validated());
            Auth::user()->hobbies()->sync($request->validated()['hobby_ids']);
            Auth::user()->skills()->sync($request->validated()['skill_ids']);
//            Auth::user()->industryTypeStudents()->sync($request->validated()['industry_type_ids']);
//            Auth::user()->jobTypes()->sync($request->validated()['job_type_ids']);

        });
    }

    /**
     * Display the specified resource.
     * @param int $id
     * @return HobbyResource
     */
    public function show(int $id): HobbyResource
    {
        $student = Student::with('skills','industryTypeStudents','hobbies','jobTypes','studentGoals')
            ->findOrFail($id);
        foreach ($student->studentGoals as $studentGoals){
            $student_goal = $studentGoals->student_goal;
            $student['student_goal'] = $student_goal;
        }
        return new HobbyResource($student);

    }

}
