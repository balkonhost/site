<?php

namespace App\Listeners\Domain;

use App\Events\Domain\Created;

class SendTelegramCreatedNotification
{
    /**
     * Handle the event.
     *
     * @param Created $event
     * @return void
     */
    public function handle(Created $event)
    {}
}
