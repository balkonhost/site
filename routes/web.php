<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BlogController;
use App\Services\RegRu\DomainService;
use App\Models\Admin;

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

// Главная
Route::get('/', function () {
    return view('index');
})->name('index');

// Разговоры на балконе
Route::group(['prefix' => 'blog'], function () {
    Route::get('/', 'BlogController@index')->name('blog');
    Route::get('/{post}', 'BlogController@show')->name('blog.show');
});

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

Route::get('/info/team', function (Admin $admin) {
    return view('team',  ['admins' => $admin->all()]);
})->name('team');

Route::get('/info/data-center', function () {
    return view('data-center');
})->name('data-center');

Route::group(['prefix' => 'cart'], function () {
    Route::get('', [CartController::class, 'list'])->name('cart');
    Route::post('add', [CartController::class, 'add'])->name('cart.add');
    Route::get('remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('clear', [CartController::class, 'clear'])->name('cart.clear');
});

Route::post('/logout', function () {
    auth()->guard()->logout();
    return redirect()->back();
})->name('logout');

//Route::get('/test', function (DomainService $service) {
//    dd($service->getPrices());
//    echo 'test';
//});

Route::get('/test', function () {
    $user = \App\Models\User::find(0);
    dd($user->domains);
});
