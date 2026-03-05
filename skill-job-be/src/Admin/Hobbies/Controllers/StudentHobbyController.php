<?php

namespace Admin\Hobbies\Controllers;

use Admin\Students\Resources\StudentResource;
use App\Http\Controllers\Controller;
use App\Models\Student;

class StudentHobbyController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return StudentResource
     */
    public function show($id): StudentResource
    {
        $student = Student::with('skills','industryTypeStudents','hobbies','jobTypes')->findOrFail($id);
        return new StudentResource($student);

    }

}
