<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\UserTemp;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Support\Facades\Mail;
use App\Mail\Registration;
use Carbon\Carbon;

class RegistrationUser implements CreatesNewUsers
{
    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\UserTemp
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
        ])->validate();

        $user = UserTemp::firstOrCreate(['email' => $input['email']], [
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Str::random(8),
            'created_at' => Carbon::now()
        ]);

        if (Mail::to($user)->send(new Registration($user))) {
            $message = 'Мы постараемся отправить письмо с паролем на указанный тобой адрес элекронной почты.
                        Будем весьма удивлены если письмо будет доставлено и окажется во входящих, а не в куче другого спама.';
        } else {
            $message = 'Не получилось отправить письмо! В принципе, ничего другого и не следовало ожидать.';
        }

        session(['registration' => $message]);

        return new User();
    }
}
