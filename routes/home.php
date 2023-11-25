<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\HostingController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Home Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::group(['prefix' => 'balance'], function () {
    Route::get('', [BalanceController::class, 'index'])->name('home.balance');
});

Route::group(['prefix' => 'domain'], function () {
    Route::get('', [DomainController::class, 'list'])->name('home.domain');
});

Route::group(['prefix' => 'hosting'], function () {
    Route::get('', [HostingController::class, 'list'])->name('home.hosting');
});

Route::get('/auth/{user}', function (User $user) {
    if (auth()->user()->getAuthIdentifier() === 0) {
        auth()->login($user);
    }
    return view('home');
});

/*Route::get('/deposit', function () {
    if (auth()->user()->getAuthIdentifier() === 0) {
        $user = User::find(5);
        $user->deposit(170, [
            'description' => 'Пополнение баланса.',
            'comment' => 'Оплата через Сбербанк(карта).'
        ]);
    }
    return view('home');
});*/

/*Route::get('/withdraw', function () {
    if (auth()->user()->getAuthIdentifier() === 0) {
        $user = User::find(5);
        $user->withdraw(169, [
            'description' => 'Регистрация домена домашняя-тушенка-74.рф.',
            'comment' => 'Регистрации домена в зоне .РФ сроком на 1 год.'
        ]);
    }
    return view('home');
});*/
