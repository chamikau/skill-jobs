<?php

use Company\Jobs\Controllers\JobController;
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

Route::resource('/jobs',JobController::class)->except(['destroy','edit','create']);
Route::put('/update-job/{id}',[JobController::class,'update']);
Route::put('/update-job/{id}',[JobController::class,'update']);
Route::put('update-job-description/{id}',[JobController::class,'updateJobDescription']);
Route::post('jobs/{id}/inactive',[JobController::class,'inactive']);
Route::post('jobs/{id}/active',[JobController::class,'active']);




