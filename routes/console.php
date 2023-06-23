<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('test', function () {
    // ...
})->purpose('Testing');

Artisan::command('email {dir}', function () {
    $table = DB::table('emails');
    $storage = Storage::disk('local');
    $files = $storage->files($this->argument('dir'));

    foreach ($files as $file) {
        $this->comment($file);
        $stream = $storage->readStream($file);
        while (($line = fgets($stream, 4096)) !== false) {
            $email = trim($line);
            $table->upsert([
                'email' => $email,
                'created_at' => now()
            ], 'email');
        }
        $this->info('DONE');
    }

})->purpose('Import email');

Artisan::command('registration', function (
    \Faker\Generator $generator,
    \Laravel\Fortify\Contracts\CreatesNewUsers $creator) {

    if ($email = DB::table('emails')
        ->where('email', 'test@kit.team')
        ->whereNull('sented_at')
        ->first()) {

        $creator->create([
            'email' => $email->email,
            'name' => $generator->firstName
        ]);
    }
})->purpose('Registration');


