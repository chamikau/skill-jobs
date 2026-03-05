<?php

namespace Student\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminOrganization;
use App\Models\AdminOrganizationRole;
use App\Models\Organization;
use App\Models\Permission;
use App\Models\Student;
use App\Models\StudentOld;
use DB;
use Student\Auth\Requests\LoginRequest;
use Hash;
use Auth;
use Student\Auth\Requests\StudentRegisterRequest;
use Throwable;

class AuthController extends Controller
{

    /**
     * @param StudentRegisterRequest $request
     * @return StudentRegisterRequest
     * @throws Throwable
     */
    public function register(StudentRegisterRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $password = Hash::make($request->validated()['password']);
//            $password = bcrypt($request['password']);
            $student = Student::create(collect($request->validated())->put('password', $password)->toArray());
            return response()->json(['message' => 'success'], 200);
        });

    }

    public function logout(StudentRegisterRequest $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
