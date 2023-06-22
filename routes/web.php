<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DomainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::group(['prefix' => 'domain'], function () {
    Route::get('', [DomainController::class, 'index'])
        ->name('domain');
    Route::post('', [DomainController::class, 'check'])
        ->name('domain.check')->middleware('throttle:1,0.02');
    Route::get('whois', [DomainController::class, 'whois'])
        ->name('domain.whois')
        ->middleware('throttle:1,0.02');
});

Route::get('/hosting', function () {
    return view('hosting');
})->name('hosting');

Route::get('/server', function () {
    return view('server');
})->name('server');

Route::get('/ssl', function () {
    return view('ssl');
})->name('ssl');

Route::get('/cms', function () {
    return view('cms');
})->name('cms');

Route::get('/support', function () {
    return view('support');
})->name('support');

Route::get('/info', function () {
    return view('info');
})->name('info');

Route::get('/info/team', function () {
    return view('team');
})->name('team');

Route::get('/info/data-center', function () {
    return view('data-center');
})->name('data-center');
