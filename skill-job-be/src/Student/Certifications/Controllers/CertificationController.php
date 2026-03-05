<?php

namespace Student\Certifications\Controllers;

use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\Certification;
use App\Models\Project;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Student\Certifications\Requests\CertificationRequest;
use Student\Certifications\Resources\CertificationResource;

class CertificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return QueryBuilder::for(Certification::with('student'))
            ->allowedFilters(['title',
                AllowedFilter::custom('search',
                    new FuzzyFilter('title',))
            ])->allowedSorts('id')
            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CertificationRequest $request
     */
    public function store(CertificationRequest $request)
    {
        return Certification::create(collect($request->validated())->put('student_id',Auth::id())->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response|CertificationResource
     */
    public function show($id): Response|CertificationResource
    {
        $certification = Certification::findOrFail($id);
        return new CertificationResource($certification);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param CertificationRequest $request
     * @param int $id
     * @return CertificationResource
     */
    public function update(CertificationRequest $request, $id): CertificationResource
    {
        $certification = Certification::findOrFail($id);
        $certification->update($request->validated());
        return new CertificationResource($certification->refresh());
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $record = Certification::find($id);
        if (!$record) {
            return response()->json(['error' => 'Record not found'], 404);
        }
        $record->delete();

        return response()->json(['message' => 'Record deleted successfully']);
    }
}
