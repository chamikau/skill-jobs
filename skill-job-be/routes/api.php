<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    dd(Auth::guard('sanctum'));
    return Auth::user();
});


Route::post('/user/login', function (Request $request) {
    $token = \App\Models\Admin::firstOrFail()->createToken('t1');
    return ['token' => $token->plainTextToken];
});
