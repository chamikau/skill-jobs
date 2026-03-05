<?php

use Student\Users\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use Student\Users\Controllers\StudentDetailsProgressController;


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

Route::apiResource('/users', StudentController::class)->except(['destroy','edit','create']);
Route::apiResource('/get-all-student-progress', StudentDetailsProgressController::class);




