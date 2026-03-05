<?php

use Admin\Courses\Controllers\ContentController;
use Admin\Courses\Controllers\CourseController;
use Admin\Courses\Controllers\CourseTypeController;
use Admin\Courses\Controllers\StudentAppliedCourseController;
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


Route::apiResource('/courses', CourseController::class);
Route::put('/courses/{id}',[CourseController::class,'update']);
Route::apiResource('/course-types',CourseTypeController::class);


Route::apiResource('/contents', ContentController::class);
Route::put('/contents/{id}',[ContentController::class,'update']);
Route::delete('/contents-records/{id}', [ContentController::class,'destroy']);


Route::apiResource('/student-applied-courses',StudentAppliedCourseController::class);

