<?php

use Student\Educations\Controllers\EducationController;
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

Route::apiResource('/educations', EducationController::class);
Route::delete('/educations-records/{id}', [EducationController::class,'destroy']);




