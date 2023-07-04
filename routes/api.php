<?php

use Illuminate\Support\Facades\Route;

use App\Http\API\ProductController;
use App\Http\API\UserController;
use App\Http\API\CustomerController;
use App\Http\API\OrderController;

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
    Route::delete('product_remove', [ProductController::class, 'destroy'])->name('api.product.remove');
    
    Route::put('update_test/{id}', [ProductController::class, 'update_test'])->name('api.product.updatetest');

    // ****** ORDER API ******
    Route::post('order_store', [OrderController::class, 'store'])->name('api.order.store');
    Route::post('order_update', [OrderController::class, 'update'])->name('api.order.update');

    // ****** USER API ******
    Route::post('user_store', [UserController::class, 'store'])->name('api.user.store');
    Route::post('user_update', [UserController::class, 'update'])->name('api.user.update');
    Route::delete('user_remove', [UserController::class, 'remove'])->name('api.user.remove');
    
    // ****** CUSTOMER API ******
    Route::post('customer_store', [CustomerController::class, 'store'])->name('api.customer.store');
    Route::post('customer_update', [CustomerController::class, 'update'])->name('api.customer.update');
    Route::delete('customer_remove', [CustomerController::class, 'remove'])->name('api.customer.remove');
});


