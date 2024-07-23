<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class ResetPassword extends Notifications\ResetPassword
{
    protected function buildMailMessage($url)
    {
        return (new MailMessage)
            ->subject(Lang::get('Запрос на смену шифра'))
            ->line(Lang::get('Ты получил эту электронную маляву, потому что был сформирован запрос на смену шифра от твоего сейфа у нас на Балконе.'))
            ->line(Lang::get('По доброте нашей сердешной, сменить шифр ты можешь в течение :count минут.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
            ->action(Lang::get('Сменить шифр'), $url)
            ->line(Lang::get('Если это не ты отправлял запрос, а какой-то чепушило, никаких дальнейших действий не требуется.'));
    }
}
