<?php

use Admin\News\Controllers\NewsController;
use Admin\News\Controllers\NewsTypesController;
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


Route::apiResource('/news', NewsController::class);
Route::put('/update-news/{id}',[NewsController::class,'update']);
Route::put('/update-news-description/{id}',[NewsController::class,'updateNewsDescription']);
Route::apiResource('/news-types',NewsTypesController::class);


