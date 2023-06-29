<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/** Homepage */
Route::get('/', [MainController::class, 'index'])->name('main.index');

/** Sign in page */
Route::get('/signin', [MainController::class, 'singin'])->middleware(['guest'])->name('main.signin');

/** Sign up page */
Route::get('/signup', [MainController::class, 'singup'])->middleware(['guest'])->name('main.signup');

/** User basket page */
Route::get('/basket', [MainController::class, 'basket'])->name('main.basket');

/** Logout page */
Route::get('/logout', [MainController::class, 'logout'])->middleware(['auth'])->name('main.logout');

/** Area requiring authorization */
Route::middleware(['auth'])->prefix('cabinet')->name('cabinet.')->group(function () {

    /** Goods group */
    Route::prefix('product')->name('product.')->group(function () {
        /** Goods list */
        Route::get('/list', [ProductController::class, 'list'])->name('list');
    });

    /** Baskets group */
    Route::prefix('baskets')->name('baskets.')->group(function () {
        /** Baskets list */
        Route::get('/list', [BasketController::class, 'list'])->name('list');
    });

});