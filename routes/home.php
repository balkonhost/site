<?php

use App\Http\Controllers\Home;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [Home\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'balans'], function () {
    Route::get('', [Home\BalanceController::class, 'index'])->name('home.balance');
    Route::any('zakinut', [Home\BalanceController::class, 'refill'])->name('home.balance.refill');
    Route::any('{id}', [Home\BalanceController::class, 'transaction'])->name('home.balance.transaction');
});

Route::group(['prefix' => 'domen'], function () {
    Route::get('', [Home\DomainController::class, 'index'])->name('home.domain');
    Route::get('novy/{domain?}', [Home\DomainController::class, 'registration'])->name('home.domain.check');
    Route::post('novy/{domain}', [Home\DomainController::class, 'registration'])->name('home.domain.registration');
});

/*Route::group(['prefix' => 'hosting'], function () {
    Route::get('', [HostingController::class, 'list'])->name('home.hosting');
});*/

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

/*Route::get('/withdraw', function () {
    if (auth()->user()->getAuthIdentifier() === 0) {
        $user = User::find(5);
        $user->forceWithdraw(175, [
            'description' => 'Продление домена домашняя-тушенка-74.рф.',
            'comment' => 'Продление регистрации домена в зоне .РФ сроком на 1 год.'
        ]);
    }
    return view('home');
});*/
