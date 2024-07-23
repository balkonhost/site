<?php

namespace App\Listeners\Domain;

use App\Events\Domain\Deleted;
use Telegram;

class SendTelegramDeletedNotification
{
    /**
     * Handle the event.
     *
     * @param Deleted $event
     * @return void
     */
    public function handle(Deleted $event)
    {
        $model = $event->model;

        $text = join("\r\n", [
            "Удален домен — {$model->domain}"
        ]);

        Telegram::bot(env('TELEGRAM_BOT_NAME'))->sendMessage([
            'chat_id' => env('TELEGRAM_GROUP_ID'),
            'text' => $text,
            'parse_mode' => 'Markdown'
        ]);
    }
}
