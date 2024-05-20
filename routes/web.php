<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('pages.auth.login');
});

Route::middleware(['auth'])->group(function(){
    Route::get('home', function(){
        return view('pages.dashboard');
    })->name('home');

    Route::resource('user', UserController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('reservation', ReservationController::class);
    Route::resource('order', OrderController::class);


});

