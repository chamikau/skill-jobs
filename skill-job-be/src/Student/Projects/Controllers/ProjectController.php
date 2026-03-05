<?php

namespace Student\Projects\Controllers;

use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Project;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Student\Projects\Requests\ProjectRequest;
use Student\Projects\Resources\ProjectResource;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return QueryBuilder::for(Project::with('student','education'))
            ->allowedFilters(['title',
                AllowedFilter::custom('search',
                    new FuzzyFilter('title',))
            ])->allowedSorts('id')
            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProjectRequest $request
     */
    public function store(ProjectRequest $request)
    {
        return Project::create(collect($request->validated())->put('student_id',Auth::id())->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response|ProjectResource
     */
    public function show($id): Response|ProjectResource
    {
        $project = Project::findOrFail($id);
        return new ProjectResource($project);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProjectRequest $request
     * @param int $id
     * @return ProjectResource
     */
    public function update(ProjectRequest $request, $id): ProjectResource
    {
        $project = Project::findOrFail($id);
        $project->update($request->validated());
        return new ProjectResource($project->refresh());
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $record = Project::find($id);
        if (!$record) {
            return response()->json(['error' => 'Record not found'], 404);
        }
        $record->delete();

        return response()->json(['message' => 'Record deleted successfully']);
    }
}
