<?php

namespace Student\WorkExperiences\Controllers;

use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\WorkExperience;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Student\WorkExperiences\Requests\WorkExperienceRequest;
use Student\WorkExperiences\Resources\WorkExperienceResource;

class WorkExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return QueryBuilder::for(WorkExperience::with('workExperienceJobRoles'))
            ->allowedFilters(['name','work_experience_job_role_id','duration','description',
                AllowedFilter::custom('search',
                    new FuzzyFilter('name'))
            ])->allowedSorts('id','name','work_experience_job_role_id','duration','description')
            ->orderByDesc('id')
            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param WorkExperienceRequest $request
     * @return Model|WorkExperience
     */
    public function store(WorkExperienceRequest $request): WorkExperience|Model
    {
        return WorkExperience::create(collect($request->validated())
            ->put('student_id', Auth::id())
            ->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response|WorkExperienceResource
     */
    public function show($id): Response|WorkExperienceResource
    {
        $workExperience = WorkExperience::findOrFail($id);
        return new WorkExperienceResource($workExperience);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param WorkExperienceRequest $request
     * @param int $id
     * @return WorkExperienceResource
     */
    public function update(WorkExperienceRequest $request, $id): WorkExperienceResource
    {
        $workExperience = WorkExperience::findOrFail($id);
        $workExperience->update($request->validated());
        return new WorkExperienceResource($workExperience->refresh());
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $record = WorkExperience::find($id);
        if (!$record) {
            return response()->json(['error' => 'Record not found'], 404);
        }
        $record->delete();

        return response()->json(['message' => 'Record deleted successfully']);
    }

}
