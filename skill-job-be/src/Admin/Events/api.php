<?php

use Admin\Events\Controllers\EventController;
use Admin\Events\Controllers\EventTypeController;
use Admin\Events\Controllers\StudentAppliedEventController;
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


Route::apiResource('/events', EventController::class);
Route::put('/events/{id}',[EventController::class,'update']);

Route::apiResource('/event-types',EventTypeController::class);

Route::apiResource('/student-applied-events',StudentAppliedEventController::class);

