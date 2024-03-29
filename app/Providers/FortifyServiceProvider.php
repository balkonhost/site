<?php

namespace App\Providers;

use App\Actions\Fortify\RegistrationUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use Carbon\Carbon;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(RegistrationUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        Fortify::loginView(function () {
            return view('auth.login');
        });
        Fortify::registerView(function () {
            return view('auth.register');
        });
        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.forgot-password');
        });
        Fortify::resetPasswordView(function () {
            return view('auth.reset-password');
        });

        Fortify::authenticateUsing(function (Request $request) {
            if (!$user = User::where('email', $request->email)->first()) {
                if ($user = Cache::pull($request->email)) {
                    $user->password = Hash::make($user->password);
                }
            }

            if ($user &&
                Hash::check($request->password, $user->password)) {
                if ($user->isDirty()) {
                    $user->email_verified_at = Carbon::now();
                    $user->save();
                }

                return $user;
            }
        });
    }
}
