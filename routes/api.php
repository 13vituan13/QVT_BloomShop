<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\ProductController;

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
    Route::post('product_store', [ProductController::class, 'store'])->name('api.product.store');
    Route::post('product_update', [ProductController::class, 'update'])->name('api.product.update');
});


