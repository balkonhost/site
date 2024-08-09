<?php

namespace App\Commands;

use Illuminate\Support\Facades\Log;
use Telegram\Bot\Commands\Command;
use Bavix\Wallet\Models\Transaction;

/**
 * Class HelpCommand.
 */
class ConfirmedCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected string $name = 'confirmed';
    protected string $pattern = '{id: \d+} {amount: \d+}';
    /**
     * @var array Command Aliases
     */
    protected array $aliases = ['c'];

    /**
     * @var string Command Description
     */
    protected string $description = 'Подтверждение поступления';

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
        $id = $this->argument('id');
        $amount = $this->argument('amount');

        $text = "Транзакция {$id} не найдена.";

        if ($transaction = (new Transaction())->whereConfirmed(false)->find($id)) {

            if ($amount && $amount != $transaction->amount) {
                $transaction->meta = array_merge($transaction->meta, ['amount' => $transaction->amount]);
                $transaction->amount = $amount;
            }
            $transaction->confirmed = true;

            if ($transaction->save()) {
                $text = "Транзакция {$id} подтверждена.";
            } else {
                $text = "Не удалось подтвердить транзакцию {$id}.";
            }

            $transaction->wallet->refreshBalance();
        }

        $this->replyWithMessage(compact('text'));
    }
}
