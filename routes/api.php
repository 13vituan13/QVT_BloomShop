<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\OrderController;

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

Route::prefix('/admin')->group(function() {
    // ****** PRODUCT API ******
    Route::post('product_store', [ProductController::class, 'store'])->name('api.product.store');
    Route::post('product_update', [ProductController::class, 'update'])->name('api.product.update');
    // ****** USER API ******
    Route::get('user_store', [UserController::class, 'store'])->name('api.user.store');
    Route::get('user_update', [UserController::class, 'update'])->name('api.user.update');
    // ****** CUSTOMER API ******
    Route::get('customer_store', [CustomerController::class, 'store'])->name('api.customer.store');
    Route::get('customer_update', [CustomerController::class, 'update'])->name('api.customer.update');
    // ****** ORDER API ******
    Route::get('order_store', [OrderController::class, 'store'])->name('api.order.store');
    Route::get('order_update', [OrderController::class, 'update'])->name('api.order.update');
});


