<?php

namespace App\Listeners\Domain;

use App\Events\Domain\Deleted;

class SendTelegramDeletedNotification
{
    /**
     * Handle the event.
     *
     * @param Deleted $event
     * @return void
     */
    public function handle(Deleted $event)
    {}
}
