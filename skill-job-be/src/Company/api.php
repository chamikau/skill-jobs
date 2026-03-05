<?php


use Company\Jobs\Controllers\JobController;
use Company\Auth\Controllers\AuthController;
use App\Events\NewThingAvailable;
use Carbon\Carbon;
use Company\Organizations\Controllers\OrganizationController;
use Company\Profile\Controllers\ProfileController;
use Company\Profile\Controllers\ProfileInvitationController;
use Company\RolesAndPermissions\Controllers\PermissionGroupController;
use Company\RolesAndPermissions\Controllers\RoleController;
use Company\Users\Controllers\UserController;
use Company\Users\Controllers\UserInviteController;
use Domain\Admin\Controllers\SignedStorageUrlController;
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
include 'Cities/api.php';
include 'IndustryTypes/api.php';
Route::post('/login',[AuthController::class,'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
include 'Cities/api.php';
include 'IndustryTypes/api.php';
Route::get('/get-job-count', [JobController::class, 'getJobCount']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/profile', ProfileController::class)->only(['index', 'store']);
    Route::apiResource('/profile/invitations', ProfileInvitationController::class)->only(['index', 'show']);
    Route::post('/profile/invitations/{id}/accept', [ProfileInvitationController::class, 'accept']);

    Route::apiResource('/permission-groups', PermissionGroupController::class)->only(['index', 'show']);
    Route::apiResource('/organizations', OrganizationController::class);
    Route::post('organizations/{id}/active',[OrganizationController::class,'active']);
    Route::post('organizations/{id}/inactive',[OrganizationController::class,'inactive']);

    Route::middleware('organization-checker')->group(function () {
        Route::get('/profile/roles', [ProfileController::class, 'getProfileRoles']);
        include 'Jobs/api.php';
        Route::apiResource('/users', UserController::class);
        Route::apiResource('/user-invitations', UserInviteController::class);
        Route::apiResource('/roles', RoleController::class);
    });


});

Route::middleware(['auth:sanctum', 'password.confirm'])
    ->post('/test-password-confirm', function (Request $request) {
        response();
    });

Route::get('/broadcast', function () {
    NewThingAvailable::dispatch('works');
});

Route::post('/signed-storage-url ', [SignedStorageUrlController::class, 'store']);
Route::middleware(['auth:user'])->post('/test-upload', function () {
    return response()->json(['message' => 'upload successful']);
});




