<?php

namespace Student\Users\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class StudentDetailsProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array|Builder|Builder[]|Collection|Model
     */
    public function index(): array|Builder|Collection|Model
    {
        $students = Student::with('skills','industryTypeStudents','hobbies','jobTypes','projects','certifications','educations','workExperience')
            ->findOrFail(Auth::id());
        $instagram_link = 0;
        $github_link = 0;
        $linkedin_link = 0;
        $facebook_link = 0;
        $skills_progress = 0;
        $industry_types_progress = 0;
        $hobbies_progress = 0;
        $job_types_progress = 0;
        $projects = 0;
        $certifications = 0;
        $educations = 0;
        $work_experience = 0;

        if (($students->instagram_link) != null){
            $instagram_link=20/4;
        }
        if (($students->github_link) != null){
            $github_link=20/4;
        }
        if (($students->linkedin_link) != null){
            $linkedin_link=20/4;
        }
        if (($students->facebook_link) != null){
            $facebook_link=20/4;
        }
        if (($students->skills)->count() > 0){
            $skills_progress=20/4;
        }
        if (($students->industryTypeStudents)->count() > 0){
            $industry_types_progress=20/4;
        }
        if (($students->hobbies)->count() > 0){
            $hobbies_progress=20/4;
        }
        if (($students->jobTypes)->count() > 0){
            $job_types_progress=20/4;
        }
        if (($students->projects)->count() > 0){
            $projects=15;
        }
        if (($students->certifications)->count() > 0){
            $certifications=15;
        }
        if (($students->educations)->count() > 0){
            $educations=15;
        }
        if (($students->workExperience)->count() > 0){
            $work_experience=15;
        }
        $students['total_progress'] = (
            $skills_progress
            + $industry_types_progress
            + $hobbies_progress
            + $job_types_progress
            + $projects
            + $certifications
            + $educations
            + $instagram_link
            + $github_link
            + $linkedin_link
            + $facebook_link
            + $work_experience
        );
        return $students;
    }

}
