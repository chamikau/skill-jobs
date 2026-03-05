<?php

use Admin\Hobbies\Controllers\StudentHobbyController;
use Illuminate\Support\Facades\Route;
use Admin\Hobbies\Controllers\HobbyController;

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


Route::apiResource('/hobbies',HobbyController::class);
Route::apiResource('/student-hobbies',StudentHobbyController::class);



