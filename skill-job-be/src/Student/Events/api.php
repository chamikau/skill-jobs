<?php

use Student\Events\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use Student\Events\Controllers\EventTypeController;
use Student\Events\Controllers\StudentAppliedEventController;

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


Route::apiResource('/events', EventController::class);
Route::apiResource('/event-types',EventTypeController::class);



Route::apiResource('/student-applied-events',StudentAppliedEventController::class);
Route::put('/cancel-enrolled-events/{id}',[StudentAppliedEventController::class,'update']);

