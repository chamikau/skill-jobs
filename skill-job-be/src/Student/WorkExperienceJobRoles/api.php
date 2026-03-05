<?php

use Student\WorkExperienceJobRoles\Controllers\WorkExperienceJobRoleController;
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

Route::get('/work_experience_job_roles',[WorkExperienceJobRoleController::class,'index']);



