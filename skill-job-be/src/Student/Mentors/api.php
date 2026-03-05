<?php

use Student\Mentors\Controllers\MentorController;
use Illuminate\Support\Facades\Route;
use Student\Mentors\Controllers\MentorEducationController;
use Student\Mentors\Controllers\MentorSessionController;
use Student\Mentors\Controllers\MentorWorkExperienceController;

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
Route::apiResource('/mentor-educations',MentorEducationController::class);
Route::apiResource('/mentor-sessions',MentorSessionController::class);
Route::apiResource('/mentor-work-experiences',MentorWorkExperienceController::class);



