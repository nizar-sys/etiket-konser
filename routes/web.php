<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RouteController;

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

# ------ Unauthenticated routes ------ #
Route::get('/', [RouteController::class, 'eventList']);
Route::get('/invoice', function(){
    return redirect('/');
});
Route::get('/order', function(){
    return redirect('/');
});
Route::get('/invoice/{id}', [RouteController::class, 'orderDetail'])->name('event.order.detail');
Route::get('/invoice/print/{id}', [RouteController::class, 'printOrderDetail'])->name('event.order.print');

Route::get('/events', [RouteController::class, 'eventList']);
Route::get('/events/{event:nama_acara}', [RouteController::class, 'eventDetail'])->name('event.detail');
// checkout tiket
Route::get('/order/{event:nama_acara}', [RouteController::class, 'checkoutTiket'])->name('event.checkout');
Route::post('/order', [RouteController::class, 'orderTiketEvent'])->name('event.order');
require __DIR__.'/auth.php';


# ------ Authenticated routes ------ #
Route::middleware('auth')->prefix('dashboard')->group(function() {
    Route::get('/', [RouteController::class, 'dashboard'])->name('home'); # dashboard

    Route::resource('users', UserController::class);
    Route::resource('events', EventController::class);
    Route::resource('orders', OrderController::class);
});
