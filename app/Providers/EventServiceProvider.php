<?php

namespace App\Providers;

use App\Events;
use App\Listeners;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        //Registered::class => [
        //    SendEmailVerificationNotification::class,
        //],

        // Уведомления по зарегистрированным доменам
        Events\Domain\Created::class => [
            Listeners\Domain\SendTelegramCreatedNotification::class,
        ],
        Events\Domain\Updated::class => [
            Listeners\Domain\SendTelegramUpdatedNotification::class,
        ],
        Events\Domain\Deleted::class => [
            Listeners\Domain\SendTelegramDeletedNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
