<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController AS User;
use App\Http\Controllers\UserLoginController AS UserLogin;
use App\Http\Controllers\UserSignUpController AS UserSignUp;


use App\Http\Controllers\AdminController AS Admin;
use App\Http\Controllers\AdminLoginController AS AdminLogin;

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
Route::get('/', [User::class, 'home'])->name('home');
Route::get('/about', [User::class, 'about'])->name('about');
Route::get('/contact', [User::class, 'contact'])->name('contact');
Route::get('/product', [User::class, 'product'])->name('product');
Route::get('/services', [User::class, 'services'])->name('services');
Route::get('/product_detail', [User::class, 'product_detail'])->name('product_detail');
Route::get('/cart', [User::class, 'cart'])->name('cart');

// ****** LOGIN -- SIGNUP ******
Route::get('/login', [UserLogin::class, 'login'])->name('login');
Route::get('/logout', [UserLogin::class, 'logout'])->name('logout');
Route::post('login_submit', [UserLogin::class, 'post_Login'])->name('login.submit');
Route::get('/sign_up', [UserSignUp::class, 'sign_up'])->name('sign_up');
Route::post('/sign_up_submit', [UserSignUp::class, 'sign_up_submit'])->name('sign_up.submit');
Route::post('/check_email_exist', [UserSignUp::class, 'check_email_exist'])->name('check.email');

//______________________________ ADMIN SITE_______________________________
Route::get('/test', [Admin::class, 'test'])->name('test');

Route::prefix('/admin')->group(function() {
    Route::get('login', [AdminLogin::class, 'login'])->name('admin.login');
    Route::get('logout', [AdminLogin::class, 'logout'])->name('admin.logout');

    Route::post('login_submit', [AdminLogin::class, 'post_Login'])->name('admin.login.submit');
});

Route::prefix('/admin')->middleware(['admin.session'])->group(function() {
    Route::get('product', [Admin::class, 'product'])->name('admin.product');
    Route::get('product_detail/{id?}', [Admin::class, 'product_detail'])->name('admin.product_detail');
});


