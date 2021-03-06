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

Route::post('/book_order', [App\Http\Controllers\OrderBookController::class, 'store'])
    ->name('book_order.store')
    ->middleware('auth');

Route::post('/order', [App\Http\Controllers\OrderController::class, 'store'])
    ->name('order.create')
    ->middleware('auth');




Route::put('/book_order', [App\Http\Controllers\OrderBookController::class, 'update'])
    ->name('book_order.update')
    ->middleware('auth');

Route::put('/order', [App\Http\Controllers\OrderController::class, 'update'])
    ->name('order.update')
    ->middleware('auth');

Route::put('/profil/{user:slug}', [App\Http\Controllers\ProfilController::class, 'update'])
    ->name('profile.update')
    ->middleware(['auth', 'can:update,user']);




Route::delete('/order', [App\Http\Controllers\OrderController::class, 'delete'])
    ->name('order.delete')
    ->middleware('auth');

Route::delete('/book_order', [App\Http\Controllers\OrderBookController::class, 'delete'])
    ->name('book_order.delete')
    ->middleware('auth');




Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home.page')
    ->middleware('auth');

Route::get('/profil', function () {
   return redirect()->route('profile.show', Auth::user()->slug);
});

Route::get('/profil/{user:slug}', [App\Http\Controllers\ProfilController::class, 'show'])
    ->name('profile.show')
    ->middleware(['auth', 'can:view,user']);

Route::get('/books', [App\Http\Controllers\BookController::class, 'index'])
    ->name('book.page')
    ->middleware('auth');

Route::get('/books/{book:slug}', [App\Http\Controllers\BookController::class, 'show'])
    ->name('book.show')
    ->middleware('auth');

Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])
    ->name('order.page')
    ->middleware('auth');

Route::get('/orders/{order:order_number}', [App\Http\Controllers\OrderController::class, 'show'])
    ->name('order.show')
    ->middleware('auth');

Route::get('/orders/{order:order_number}/paid', [App\Http\Controllers\OrderPaidController::class, 'index'])
    ->name('order.paid.page')
    ->middleware('auth');

Route::get('/history', [App\Http\Controllers\HistoryController::class, 'index'])
    ->name('history.page')
    ->middleware('auth');

Route::get('/notifications', [App\Http\Controllers\NotificationController::class, 'index'])
    ->name('notifs.page')
    ->middleware('auth');




Route::prefix('admin')->middleware(['auth', 'can:getAdminAccess'])->group(function () {

    Route::post('/books', [App\Http\Controllers\Admin\AdminBookController::class, 'store'])
        ->name('admin.book.store');



    Route::put('/profil/{user:slug}', [App\Http\Controllers\Admin\AdminProfilController::class, 'update'])
        ->name('admin.profile.update');

    Route::put('/books', [App\Http\Controllers\Admin\AdminBookController::class, 'update'])
        ->name('admin.book.update');

    Route::put('/orders', [App\Http\Controllers\Admin\AdminOrderUserController::class, 'update'])
        ->name('admin.order.user.update');



    Route::delete('/books', [App\Http\Controllers\Admin\AdminBookController::class, 'delete'])
        ->name('admin.book.delete');



    Route::get('/', [App\Http\Controllers\Admin\AdminHomeController::class, 'index'])
        ->name('admin.home.page');

    Route::get('/profil/', function () {
        return redirect()->route('admin.profile.show', Auth::user()->slug);
    })->name('admin.profile.page');

    Route::get('/profil/{user:slug}', [App\Http\Controllers\Admin\AdminProfilController::class, 'show'])
        ->name('admin.profile.show');

    Route::get('/history', [App\Http\Controllers\Admin\AdminHistoryController::class, 'index'])
        ->name('admin.history.page');

    Route::get('/notifications', [App\Http\Controllers\Admin\AdminNotificationController::class, 'index'])
        ->name('admin.notifs.page');

    Route::get('/settings', [App\Http\Controllers\Admin\AdminSettingsController::class , 'index'])
        ->name('admin.settings.page');

    Route::get('/books', [App\Http\Controllers\Admin\AdminBookController::class, 'index'])
        ->name('admin.book.page');

    Route::get('/books/create', [App\Http\Controllers\Admin\AdminBookController::class, 'create'])
        ->name('admin.book.create');

    Route::get('/orders', [App\Http\Controllers\Admin\AdminOrderController::class, 'index'])
        ->name('admin.order.page');

    Route::get('/orders/{user:slug}', [App\Http\Controllers\Admin\AdminOrderUserController::class, 'index'])
        ->name('admin.order.user.page');

    Route::get('/orders/{user:slug}/{order:order_number}', [App\Http\Controllers\Admin\AdminOrderUserController::class, 'show'])
        ->name('admin.order.user.show');
});

