<?php

namespace App\Listeners\Domain;

use App\Events\Domain\Updated;

class SendTelegramUpdatedNotification
{
    /**
     * Handle the event.
     *
     * @param Updated $event
     * @return void
     */
    public function handle(Updated $event)
    {}
}
