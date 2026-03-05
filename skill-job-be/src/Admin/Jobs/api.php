<?php

use Admin\Jobs\Controllers\JobController;
use Admin\Jobs\Controllers\StudentAppliedJobController;
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

Route::apiResource('/jobs',JobController::class);
Route::put('/update-job/{id}',[JobController::class,'update']);
Route::apiResource('/student-applied-lists',StudentAppliedJobController::class);




