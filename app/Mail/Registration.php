<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Registration extends Mailable
{
    use Queueable, SerializesModels;

    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->password = $user->password;
        $_ENV['MAIL_LOGO'] = env('APP_URL') .'/img/notification-logo-'. substr($user->password, 0, 2) . $user->id .'.png';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');
        return $this->markdown('emails.registration')
            ->subject("Регистрация на сайте ". config('app.name'))
            ->from(config('mail.from.address'), config('app.name'));
    }
}
