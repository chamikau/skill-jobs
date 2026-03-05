<?php

use Student\Courses\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use Student\Courses\Controllers\CourseTypeController;
use Student\Courses\Controllers\StudentAppliedCourseController;

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


Route::apiResource('/courses', CourseController::class);

Route::apiResource('/course-types',CourseTypeController::class);

Route::apiResource('/student-applied-courses',StudentAppliedCourseController::class);
Route::put('/cancel-enrolled-course/{id}',[StudentAppliedCourseController::class,'update']);

