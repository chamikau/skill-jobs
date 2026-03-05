<?php

use Admin\Mentors\Controllers\MentorController;
use Admin\Mentors\Controllers\MentorEducationController;
use Admin\Mentors\Controllers\MentorJobRoleTypeController;
use Admin\Mentors\Controllers\MentorSessionController;
use Admin\Mentors\Controllers\MentorSessionTypeController;
use Admin\Mentors\Controllers\MentorWorkExperienceController;
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

Route::apiResource('/mentors',MentorController::class);
Route::put('/update-mentors/{id}',[MentorController::class,'update']);


Route::apiResource('/sessions',MentorSessionController::class);
Route::apiResource('/session-types',MentorSessionTypeController::class);
Route::put('/update-session/{id}',[MentorSessionController::class,'update']);
Route::delete('/sessions-records/{id}', [MentorSessionController::class,'destroy']);

Route::apiResource('/mentor-educations', MentorEducationController::class);
Route::put('/update-mentor-educations/{id}',[MentorEducationController::class,'update']);
Route::delete('/educations-records/{id}', [MentorEducationController::class,'destroy']);

Route::apiResource('/mentor-work-experiences', MentorWorkExperienceController::class);
Route::put('/update-mentor-work-experiences/{id}',[MentorWorkExperienceController::class,'update']);
Route::delete('/work-experiences-records/{id}', [MentorWorkExperienceController::class,'destroy']);
Route::apiResource('/get-mentor-job-role-types',MentorJobRoleTypeController::class);



