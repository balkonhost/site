<?php

namespace App\Listeners\Domain;

use App\Events\Domain\Updated;
use Telegram;

class SendTelegramUpdatedNotification
{
    /**
     * Handle the event.
     *
     * @param Updated $event
     * @return void
     */
    public function handle(Updated $event)
    {
        $model = $event->model;

        $text = join("\r\n", [
            "Изменен домен — {$model->domain}"
        ]);

        /*Telegram::bot(env('TELEGRAM_BOT_NAME'))->sendMessage([
            'chat_id' => env('TELEGRAM_GROUP_ID'),
            'text' => $text,
            'parse_mode' => 'Markdown'
        ]);*/
    }
}
