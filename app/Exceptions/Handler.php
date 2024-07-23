<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Telegram;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $e
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $e)
    {
        $this->reportErrorTelegram($e);

        parent::report($e);
    }

    protected function reportErrorTelegram($e): void
    {
        if (Cache::missing($crc = crc32($e))) {
            if (!is_a($e, NotFoundHttpException::class)) {
                $request = request();

                $parts = explode(DIRECTORY_SEPARATOR, $request->server('DOCUMENT_ROOT'));
                array_pop($parts);

                $parts = [
                    "<b>Балкошечки мои! Никогда такого не было, и вот опять!</b>", "",
                    "{$e->getMessage()}", "",
                    "Код ошибки {$e->getCode()}", "",
                    "{$e->getLine()} строка в файле ". str_replace(implode(DIRECTORY_SEPARATOR, $parts), "", $e->getFile()), "",
                    ($request->getScriptName() !== 'artisan' ? env('APP_URL') ."{$request->getPathInfo()}" : "")
                ];

                $message = Telegram::bot('balkosha_bot')->sendMessage([
                    'chat_id' => env('TELEGRAM_GROUP_ID'),
                    'text' => join("\r\n", $parts),
                    'parse_mode' => 'html' // Markdown
                ]);

                if ($id = $message->getMessageId()) {
                    Cache::set($crc, $id, 60);
                }
            }
        }
    }
}
