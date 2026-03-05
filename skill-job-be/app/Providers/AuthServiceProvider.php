<?php

namespace App\Providers;

use App\Notifications\CustomVerifyEmail;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

//        VerifyEmail::createUrlUsing(function ($notifiable) {
//            return (new CustomVerifyEmail())->verificationUrl($notifiable);
//        });


        if (\request('portal') === 'admin') {
            ResetPassword::createUrlUsing(function ($user, string $token) {
                return env('SPA_URL') . '/admin/auth/reset-password?token=' . $token . '&email=' . $user->email;
            });
        }
        elseif (\request('portal') === 'student') {
            ResetPassword::createUrlUsing(function ($user, string $token) {
                return env('SPA_STUDENT_URL') . '/user/auth/reset-password?token=' . $token . '&email=' . $user->email;
            });
        }
        elseif (\request('portal') === 'company') {
            ResetPassword::createUrlUsing(function ($user, string $token) {
                return env('SPA_COMPANY_URL') . '/admin/auth/reset-password?token=' . $token . '&email=' . $user->email;
            });
        }
    }
}
