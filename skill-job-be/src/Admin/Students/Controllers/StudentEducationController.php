<?php

namespace Admin\Students\Controllers;

use Admin\Students\Resources\StudentResource;
use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class StudentEducationController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @return StudentResource
     */
    public function show($id): StudentResource
    {
        $education = Education::with('certifications','student','projects','city','fieldOfStudyTypes')->findOrFail($id);
        return new StudentResource($education);
    }


}
