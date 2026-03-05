<?php

use Domain\Admin\Controllers\SignedStorageUrlController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

include 'Auth/api.php';


Route::middleware('auth:sanctum')->group(function () {

    include 'Profile/api.php';
    include 'Users/api.php';
    include 'Educations/api.php';
    include 'Certifications/api.php';
    include 'Projects/api.php';
    include 'Cities/api.php';
    include 'Skills/api.php';
    include 'Hobbies/api.php';
    include 'IndustryType/api.php';
    include 'Jobs/api.php';
    include 'Courses/api.php';
    include 'Events/api.php';
    include 'WorkExperienceJobRoles/api.php';
    include 'WorkExperiences/api.php';
    include 'Feedbacks/api.php';
    include 'News/api.php';
    include 'FieldOfStudyType/api.php';
    include 'Mentors/api.php';
});

Route::post('/signed-storage-url ', [SignedStorageUrlController::class, 'store']);
Route::middleware(['auth:user'])->post('/test-upload', function () {
    return response()->json(['message' => 'upload successful']);
});




