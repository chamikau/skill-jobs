<?php

use Admin\Students\Controllers\StudentCertificatoinController;
use Admin\Students\Controllers\StudentController;
use Admin\Students\Controllers\StudentEducationController;
use Admin\Students\Controllers\StudentProjectController;
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

Route::apiResource('/students', StudentController::class);

Route::apiResource('/educations', StudentEducationController::class);
Route::apiResource('/projects', StudentProjectController::class);
Route::apiResource('/certifications',StudentCertificatoinController::class);




