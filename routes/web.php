<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserSignUpController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;


use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\ExcelController;

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

//______________________________ USER SITE_______________________________
Route::get('/', [UserController::class, 'home'])->name('home');
Route::get('/about', [UserController::class, 'about'])->name('about');
Route::get('/contact', [UserController::class, 'contact'])->name('contact');
Route::get('/product', [UserController::class, 'product'])->name('product');
Route::get('/services', [UserController::class, 'services'])->name('services');
Route::get('/product_detail/{id}', [UserController::class, 'product_detail'])->name('product_detail');

// ****** CART ******
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/cart_store', [CartController::class, 'store'])->name('cart.store');
Route::post('/cart_update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart_remove', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/checkout', [CheckOutController::class, 'checkout'])->name('checkout');
Route::post('/checkout_submit', [CheckOutController::class, 'checkout_submit'])->name('checkout.submit');

// ****** LOGIN ******
Route::get('/login', [UserLoginController::class, 'login'])->name('login');
Route::post('login_submit', [UserLoginController::class, 'post_Login'])->name('login.submit');
Route::get('/logout', [UserLoginController::class, 'logout'])->name('logout');

// ****** SIGNUP ******
Route::get('/sign_up', [UserSignUpController::class, 'sign_up'])->name('sign_up');
Route::post('/sign_up_submit', [UserSignUpController::class, 'sign_up_submit'])->name('sign_up.submit');
Route::post('/check_email_exist', [UserSignUpController::class, 'check_email_exist'])->name('check.email');

Route::post('/add_comment', [UserController::class, 'addComment'])->name('admin.addComment');

/*
|
|
|-------------------------------------------------------------------------
| 
| 
*/

//______________________________ ADMIN SITE_______________________________
Route::get('/test', [AdminController::class, 'test'])->name('test');

Route::prefix('/admin')->group(function() {
    // ****** LOGIN ******
    Route::get('login', [AdminLoginController::class, 'login'])->name('admin.login');
    Route::post('login_submit', [AdminLoginController::class, 'post_Login'])->name('admin.login.submit');
    Route::get('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
});

Route::prefix('/admin')->middleware(['admin.session'])->group(function() {
    // ****** PRODUCT ******
    Route::get('product', [AdminController::class, 'product'])->name('admin.product');
    Route::get('product_detail/{id?}', [AdminController::class, 'product_detail'])->name('admin.product_detail');
    // ****** CUSTOMER ******
    Route::get('customer', [AdminController::class, 'customer'])->name('admin.customer');
    Route::get('customer_detail/{id?}', [AdminController::class, 'customer_detail'])->name('admin.customer_detail');
    // ****** ORDER ******
    Route::get('order', [AdminController::class, 'order'])->name('admin.order');
    Route::get('get_order_detail_by_id', [AdminController::class, 'orderDetailById'])->name('admin.get_order_detail_by_id');
    Route::get('export_bill', [ExcelController::class, 'exportBill'])->name('admin.export_bill');
    // ****** USER ******
    Route::get('user', [AdminController::class, 'user'])->name('admin.user');
    Route::get('get_user_by_id', [AdminController::class, 'ajaxUserById'])->name('admin.ajax_get_user_by_id');
});

