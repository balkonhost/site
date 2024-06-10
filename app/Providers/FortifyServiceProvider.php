<?php

namespace App\Providers;

use App\Actions\Fortify\RegistrationUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\User;
use App\Models\UserTemp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
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
        Fortify::resetPasswordView(function ($request) {
            return view('auth.reset-password', ['request' => $request]);
        });

        Fortify::authenticateUsing(function (Request $request) {
            if (!$user = User::where('email', $request->email)->first()) {
                if ($temp = UserTemp::where('email', $request->email)->first()) {
                    $user = User::firstOrNew($temp->toArray());
                    $user->password = Hash::make($temp->password);
                }
            }

            if ($user && Hash::check($request->password, $user->password)) {
                if ($user->isDirty()) {
                    $user->email_verified_at = Carbon::now();
                    if ($user->save() && isset($temp)) {
                        $temp->delete();
                    }
                }

                return $user;
            }
        });
    }
}
