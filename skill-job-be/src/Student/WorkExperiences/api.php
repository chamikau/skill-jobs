<?php

use Illuminate\Support\Facades\Route;
use Student\WorkExperiences\Controllers\WorkExperienceController;


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

Route::apiResource('/work-experiences', WorkExperienceController::class);
Route::put('/work-experiences/{id}',[WorkExperienceController::class,'update']);
Route::delete('/work-experiences-records/{id}', [WorkExperienceController::class,'destroy']);


