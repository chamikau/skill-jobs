<?php

use Student\Jobs\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use Student\Jobs\Controllers\JobTypeController;

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

Route::apiResource('/job-types',JobTypeController::class);


