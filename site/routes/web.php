<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home.page')
    ->middleware('auth');

Route::post('/', [App\Http\Controllers\OrderBookController::class, 'store'])
    ->name('home.page.book.store')
    ->middleware('auth');

Route::put('/', [App\Http\Controllers\OrderBookController::class, 'update'])
    ->name('home.page.book.update')
    ->middleware('auth');

Route::delete('/', [App\Http\Controllers\OrderBookController::class, 'delete'])
    ->name('home.page.book.delete')
    ->middleware('auth');

Route::get('/profil', function () {
   return redirect()->route('profile.show', Auth::user()->slug);
});

Route::get('/profil/{user:slug}', [App\Http\Controllers\ProfilController::class, 'show'])
    ->name('profile.show')
    ->middleware(['auth', 'can:view,user']);

Route::put('/profil/{user:slug}', [App\Http\Controllers\ProfilController::class, 'update'])
    ->name('profile.update')
    ->middleware(['auth', 'can:update,user']);

Route::get('/books', [App\Http\Controllers\BookController::class, 'index'])
    ->name('book.page')
    ->middleware('auth');

Route::post('/books', [App\Http\Controllers\OrderBookController::class, 'store'])
    ->name('book.page.book.store')
    ->middleware('auth');

Route::get('/books/{book:isbn}', [App\Http\Controllers\BookController::class, 'show'])
    ->name('book.show')
    ->middleware('auth');

Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])
    ->name('order.page')
    ->middleware('auth');

Route::put('/orders', [App\Http\Controllers\OrderBookController::class, 'update'])
    ->name('order.page.book.update')
    ->middleware('auth');

Route::delete('/orders', [App\Http\Controllers\OrderBookController::class, 'delete'])
    ->name('order.page.book.delete')
    ->middleware('auth');

Route::get('/history', [App\Http\Controllers\HistoryController::class, 'index'])
    ->name('history.page')
    ->middleware('auth');

Route::get('/notifications', [App\Http\Controllers\NotificationController::class, 'index'])
    ->name('notifs.page')
    ->middleware('auth');

Route::get('/settings', [App\Http\Controllers\SettingsController::class, 'index'])
    ->name('settings.page')
    ->middleware('auth');



Route::prefix('admin')->middleware(['auth', 'can:getAdminAccess'])->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\AdminHomeController::class, 'index'])
        ->name('admin.home.page');

    Route::get('/profil/', [App\Http\Controllers\Admin\AdminProfilController::class, 'index'])
        ->name('admin.profile.page');

    Route::get('/books', [App\Http\Controllers\Admin\AdminBookController::class, 'index'])
        ->name('admin.book.page');

    Route::get('/orders', [App\Http\Controllers\Admin\AdminOrderController::class, 'index'])
        ->name('admin.order.page');
});
