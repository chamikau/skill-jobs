<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Aws\Api\Service;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (\request('portal') === 'admin') {

            config(['fortify.guard' => 'admin']);
            config(['fortify.passwords' => 'admins']);

            $this->app->bind(Service::class, function ($app) {
                $config = $app->make('config');
                config(['fortify.guard' => 'admin']);
                config(['fortify.passwords' => 'admins']);
                return new Service($config);
            });
        }
        else if (\request('portal') === 'student') {

            config(['fortify.guard' => 'student']);
            config(['fortify.passwords' => 'students']);

            $this->app->bind(Service::class, function ($app) {
                $config = $app->make('config');
                config(['fortify.guard' => 'student']);
                config(['fortify.passwords' => 'students']);
                return new Service($config);
            });
        }
        else if (\request('portal') === 'company') {

            config(['fortify.guard' => 'company']);
            config(['fortify.passwords' => 'companies']);

            $this->app->bind(Service::class, function ($app) {
                $config = $app->make('config');
                config(['fortify.guard' => 'company']);
                config(['fortify.passwords' => 'companies']);
                return new Service($config);
            });
        }


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
