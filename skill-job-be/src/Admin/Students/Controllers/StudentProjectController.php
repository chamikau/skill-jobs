<?php

namespace Admin\Students\Controllers;

use Admin\Students\Resources\StudentResource;
use App\Http\Controllers\Controller;
use App\Models\Project;

class StudentProjectController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @return StudentResource
     */
    public function show($id): StudentResource
    {
        $education = Project::with('education','student')->findOrFail($id);
        return new StudentResource($education);
    }

}
