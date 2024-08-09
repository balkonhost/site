<?php

namespace App\Commands;

use Telegram\Bot\Commands\Command;
use Bavix\Wallet\Models\Transaction;

/**
 * Class HelpCommand.
 */
class TransCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected string $name = 'trans';
    /**
     * @var array Command Aliases
     */
    protected array $aliases = ['t'];

    /**
     * @var string Command Description
     */
    protected string $description = 'Неподтвержденные транзакций пополнения';

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
        $transactions = (new Transaction())->whereConfirmed(false)->whereType('deposit')->get();

        $text = $this->description .":\r\n";
        foreach ($transactions as $transaction) {
            $text .= sprintf('%s. %s руб.' . PHP_EOL, $transaction->id, $transaction->amount);
        }

        $this->replyWithMessage(compact('text'));
    }
}
