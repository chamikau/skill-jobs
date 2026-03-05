<?php

use Admin\Auth\Controllers\AuthController;
use Admin\Cities\Controllers\CityController;
use Admin\IndustryTypes\Controllers\IndustryTypeController;
use Admin\Jobs\Controllers\JobController;
use Admin\Organizations\Controllers\OrganizationController;
use Admin\Profile\Controllers\ProfileController;
use Admin\Profile\Controllers\ProfileInvitationController;
use Admin\RolesAndPermissions\Controllers\PermissionGroupController;
use Admin\RolesAndPermissions\Controllers\RoleController;
use Admin\Students\Controllers\StudentController;
use Admin\Users\Controllers\UserController;
use Admin\Users\Controllers\UserInviteController;
use App\Events\NewThingAvailable;
use App\Notifications\CustomVerifyEmail;
use Carbon\Carbon;
use Domain\Admin\Controllers\SignedStorageUrlController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\VerifyEmailController;

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
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::get('/get-job-count', [JobController::class, 'getJobCount']);
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/profile', ProfileController::class)->only(['index', 'store']);
    Route::apiResource('/profile/invitations', ProfileInvitationController::class)->only(['index', 'show']);
    Route::post('/profile/invitations/{id}/accept', [ProfileInvitationController::class, 'accept']);

    Route::apiResource('/permission-groups', PermissionGroupController::class)->only(['index', 'show']);
    Route::apiResource('/organizations', OrganizationController::class);
    Route::get('/get-company-lists', [OrganizationController::class,'getCompanyLists']);
    Route::get('/get-company-lists/{id}', [OrganizationController::class,'getCompany']);
//    Route::post('organizations/{id}/active',[OrganizationController::class,'active']);
//    Route::post('organizations/{id}/inactive',[OrganizationController::class,'inactive']);

    include 'FieldOfStudyType/api.php';
    include 'Events/api.php';
    include 'Courses/api.php';
    include 'Students/api.php';
    include 'Cities/api.php';
    include 'IndustryTypes/api.php';
    include 'Hobbies/api.php';
    include 'Jobs/api.php';
    include 'News/api.php';
    include 'Mentors/api.php';
    include 'Feedbacks/api.php';
//    Route::middleware('organization-checker')->group(function () {
        Route::get('/profile/roles', [ProfileController::class, 'getProfileRoles']);
        Route::apiResource('/users', UserController::class);
        Route::apiResource('/user-invitations', UserInviteController::class);

        Route::apiResource('/roles', RoleController::class);
//    });


});

Route::middleware(['auth:sanctum', 'password.confirm'])
    ->post('/test-password-confirm', function (Request $request) {
        response();
    });

Route::get('/broadcast', function () {
    NewThingAvailable::dispatch('works');
});

Route::post('/signed-storage-url ', [SignedStorageUrlController::class, 'store']);
Route::middleware(['auth:admin'])->post('/test-upload', function () {
    return response()->json(['message' => 'upload successful']);
});


//Route::get('/email/verify/{id}/{hash}', function ($id, $hash) {
//})->name('verification.verify');


