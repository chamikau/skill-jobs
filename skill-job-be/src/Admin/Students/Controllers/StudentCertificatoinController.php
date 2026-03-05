<?php

namespace Admin\Students\Controllers;

use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\Certification;
use App\Models\Education;
use App\Models\Project;
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

class StudentCertificatoinController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return StudentResource
     */
    public function show($id): StudentResource
    {
        $certificaiton = Certification::with('education')->findOrFail($id);
        return new StudentResource($certificaiton);
    }

}
