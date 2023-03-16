<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserSignUpController;


use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;

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
Route::get('/product_detail', [UserController::class, 'product_detail'])->name('product_detail');
Route::get('/cart', [UserController::class, 'cart'])->name('cart');

// ****** LOGIN ******
Route::get('/login', [UserLoginController::class, 'login'])->name('login');
Route::post('login_submit', [UserLoginController::class, 'post_Login'])->name('login.submit');
Route::get('/logout', [UserLoginController::class, 'logout'])->name('logout');

// ****** SIGNUP ******
Route::get('/sign_up', [UserSignUpController::class, 'sign_up'])->name('sign_up');
Route::post('/sign_up_submit', [UserSignUpController::class, 'sign_up_submit'])->name('sign_up.submit');
Route::post('/check_email_exist', [UserSignUpController::class, 'check_email_exist'])->name('check.email');

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
    Route::get('login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('login_submit', [AdminController::class, 'post_Login'])->name('admin.login.submit');
    Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
});

Route::prefix('/admin')->middleware(['admin.session'])->group(function() {
    // ****** PRODUCT ******
    Route::get('product', [AdminLoginController::class, 'product'])->name('admin.product');
    Route::get('product_detail/{id?}', [AdminLoginController::class, 'product_detail'])->name('admin.product_detail');
});


