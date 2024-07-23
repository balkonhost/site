<?php

namespace App\Listeners\Domain;

use App\Events\Domain\Created;
use Telegram;

class SendTelegramCreatedNotification
{
    /**
     * Handle the event.
     *
     * @param Created $event
     * @return void
     */
    public function handle(Created $event)
    {
        $model = $event->model;

        $text = join("\r\n", [
            "Добавлен домен — {$model->domain}"
        ]);

        Telegram::bot(env('TELEGRAM_BOT_NAME'))->sendMessage([
            'chat_id' => env('TELEGRAM_GROUP_ID'),
            'text' => $text,
            'parse_mode' => 'Markdown'
        ]);
    }
}
