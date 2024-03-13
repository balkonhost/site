<?php

use App\Http\Controllers\DomainController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\FrontController;
use App\Services\RegRu\DomainService;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [FrontController::class, 'index'])->name('index');

// Разговоры на балконе
Route::resource('razgovory', ConversationController::class)->names([
    'index' => 'conversation',
    'create' => 'conversation.create',
    'store' => 'conversation.store',
    'edit' => 'conversation.edit',
    'update' => 'conversation.update',
    'show' => 'conversation.show',
    'destroy' => 'conversation.destroy'
]);
Route::post('upload', [ConversationController::class, 'uploadImage'])->name('post.upload');

Route::get('info', function () {
    return view('info/index');
})->name('info');

Route::get('info/odmin', function (Admin $admin) {
    return view('info/team',  ['admins' => $admin->all()]);
})->name('info.team');

Route::get('/info/data-centr', function () {
    return view('info/data-center');
})->name('info.data-center');

/*Route::group(['prefix' => 'domain'], function () {
    Route::get('', [DomainController::class, 'index'])
        ->name('domain');
    Route::post('', [DomainController::class, 'check'])
        ->name('domain.check')->middleware('throttle:1,0.02');
    Route::get('whois', [DomainController::class, 'whois'])
        ->name('domain.whois')
        ->middleware('throttle:1,0.02');
});*/

/*Route::get('/hosting', function () {
    return view('hosting');
})->name('hosting');*/

/*Route::get('/server', function () {
    return view('server');
})->name('server');*/

/*Route::get('/ssl', function () {
    return view('ssl');
})->name('ssl');*/

/*Route::get('/cms', function () {
    return view('cms');
})->name('cms');*/

/*Route::get('/support', function () {
    return view('support');
})->name('support');*/

/*Route::group(['prefix' => 'cart'], function () {
    Route::get('', [CartController::class, 'list'])->name('cart');
    Route::post('add', [CartController::class, 'add'])->name('cart.add');
    Route::get('remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('clear', [CartController::class, 'clear'])->name('cart.clear');
});*/

/*Route::post('/logout', function () {
    auth()->guard()->logout();
    return redirect()->back();
})->name('logout');*/

//Route::get('/test', function (DomainService $service) {
//    dd($service->getPrices());
//    echo 'test';
//});

/*Route::get('/test', function () {
    $user = \App\Models\User::find(0);
    dd($user->domains);
});*/

//Route::resource('', Controller::class)->names([
//    'index' => 'thoughts',
//    'create' => 'thoughts.create',
//    'store' => 'thoughts.store',
//    'edit' => 'thoughts.edit',
//    'update' => 'thoughts.update',
//    'show' => 'thoughts.show',
//    'destroy' => 'thoughts.destroy'
//]);
