<?php

namespace Student\Educations\Controllers;

use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\Education;
use DB;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Student\Educations\Requests\EducationsRequest;
use Student\Educations\Requests\RegisterHobbyStepsRequest;
use Student\Educations\Requests\RegisterHobbyUpdateStepsRequest;
use Student\Educations\Requests\RegisterStepsRequest;
use Student\Educations\Resources\EducationResource;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return QueryBuilder::for(Education::with('certifications','student','projects','city','fieldOfStudyTypes'))
            ->allowedFilters(['university_name',
                AllowedFilter::custom('search',
                    new FuzzyFilter('name',))
            ])->allowedSorts('id')
            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EducationsRequest $request
     * @return
     */
    public function store(EducationsRequest $request)
    {
        return Education::create(collect($request->validated())->put('student_id',Auth::id())->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response|EducationResource
     */
    public function show($id): Response|EducationResource
    {
        $education = Education::with('certifications','student','projects','city','fieldOfStudyTypes')->findOrFail($id);
        return new EducationResource($education);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param EducationsRequest $request
     * @param int $id
     * @return EducationResource
     */
    public function update(EducationsRequest $request, $id): EducationResource
    {
        $education = Education::findOrFail($id);
        $education->update($request->validated());
        return new EducationResource($education->refresh());
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $record = Education::find($id);
        if (!$record) {
            return response()->json(['error' => 'Record not found'], 404);
        }
        $record->delete();

        return response()->json(['message' => 'Record deleted successfully']);
    }
}
