<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\DomainController;

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
