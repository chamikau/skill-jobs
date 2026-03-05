<?php

use Illuminate\Support\Facades\Route;
use Student\Profile\Controllers\StudentProfileController;

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

Route::apiResource('/profile',StudentProfileController::class);
Route::put('/update-profile',[StudentProfileController::class,'update']);





