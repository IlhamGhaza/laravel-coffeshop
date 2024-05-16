<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//login api
Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);

//logout api
Route::post('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout'])->middleware('auth:sanctum');

//api routes
//products api
Route::apiResource('/api-products', App\Http\Controllers\Api\ProductController::class)->middleware('auth:sanctum');
//show product api
Route::get('/api-products/{id}', [App\Http\Controllers\Api\ProductController::class, 'show'])->middleware('auth:sanctum');
//create product api
Route::post('/api-products', [App\Http\Controllers\Api\ProductController::class, 'store'])->middleware('auth:sanctum');
//update product api
Route::put('/api-products{id}', [App\Http\Controllers\Api\ProductController::class, 'update'])->middleware('auth:sanctum');
//delete product api
Route::delete('/api-products/{id}', [App\Http\Controllers\Api\ProductController::class, 'destroy'])->middleware('auth:sanctum');

//categories api
Route::apiResource('/api-categories', App\Http\Controllers\Api\CategoryController::class)->middleware('auth:sanctum');
//crate category api
Route::post('/api-categories', [App\Http\Controllers\Api\CategoryController::class, 'store'])->middleware('auth:sanctum');
//show category api
Route::get('/api-categories/{id}', [App\Http\Controllers\Api\CategoryController::class, 'show'])->middleware('auth:sanctum');
//update category api
Route::put('/api-categories', [App\Http\Controllers\Api\CategoryController::class, 'update'])->middleware('auth:sanctum');
//delete category api
Route::delete('/api-categories/{id}', [App\Http\Controllers\Api\CategoryController::class, 'destroy'])->middleware('auth:sanctum');


Route::post('/save-order', [App\Http\Controllers\Api\OrderController::class, 'saveOrder'])->middleware('auth:sanctum');
Route::get('/api-discounts', [App\Http\Controllers\Api\DiscountController::class, 'index'])->middleware('auth:sanctum');
Route::post('/api-discounts', [App\Http\Controllers\Api\DiscountController::class, 'store'])->middleware('auth:sanctum');
Route::put('/api-discounts/{discount}', [App\Http\Controllers\Api\DiscountController::class, 'update']);
Route::delete('/api-discounts/{discount}', [App\Http\Controllers\Api\DiscountController::class, 'destroy']);


Route::get('/orders/{date?}', [App\Http\Controllers\Api\OrderController::class, 'index'])->middleware('auth:sanctum');
Route::get('/summary/{date?}', [App\Http\Controllers\Api\OrderController::class, 'summary'])->middleware('auth:sanctum');
Route::get('/order-item/{date?}', [App\Http\Controllers\Api\OrderItemController::class, 'index'])->middleware('auth:sanctum');
Route::get('/order-sales', [App\Http\Controllers\Api\OrderItemController::class, 'orderSales'])->middleware('auth:sanctum');


//employes api
// Route::apiResource('/api-employees', App\Http\Controllers\Api\EmployeesController::class)->middleware('auth:sanctum');


