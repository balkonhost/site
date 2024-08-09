<?php

namespace App\Http\Controllers;

use App\Commands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\BotsManager;

class TelegramController extends Controller
{
    protected $bot;
    protected $update;

    public function webhook(): string
    {
        dispatch(function (BotsManager $botsManager, Request $request) {
            if (env('TELEGRAM_WEBHOOK_CODE') == $request->get('code')) {
                $this->bot = $botsManager->bot(env('TELEGRAM_BOT_NAME'));
                $this->update = $this->bot->getWebhookUpdate();

                if ($this->update->getChat()->get('id') == env('TELEGRAM_GROUP_ID')) {
                    if ($this->isCommand()) {
                        $this->bot->addCommands([
                            Commands\TransCommand::class,
                        ]);

                        $this->bot->processCommand($this->update);
                    }
                    Log::info($this->update);
                }
            }
        })->afterResponse();

        return 'ok';
    }

    protected function isCommand(): bool
    {
        if ($entities = $this->update->message->getEntities()) {
            if ($entity = $entities->first()) {
                return 'bot_command' == $entity->type;
            }
        }

        return false;
    }
}
