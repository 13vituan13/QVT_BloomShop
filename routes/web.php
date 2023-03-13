<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController AS USER;
use App\Http\Controllers\UserLoginController AS USER_LOGIN;
use App\Http\Controllers\UserSignUpController AS USER_SIGNUP;


use App\Http\Controllers\AdminController AS ADMIN;
use App\Http\Controllers\AdminLoginController AS ADMIN_LOGIN;

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
Route::get('/', [USER::class, 'home'])->name('home');
Route::get('/about', [USER::class, 'about'])->name('about');
Route::get('/contact', [USER::class, 'contact'])->name('contact');
Route::get('/product', [USER::class, 'product'])->name('product');
Route::get('/services', [USER::class, 'services'])->name('services');
Route::get('/product_detail', [USER::class, 'product_detail'])->name('product_detail');

// ****** LOGIN -- SIGNUP ******
Route::get('/login', [USER_LOGIN::class, 'login'])->name('login');
Route::post('login_submit', [USER_LOGIN::class, 'post_Login'])->name('login.submit');
Route::get('/sign_up', [USER_SIGNUP::class, 'sign_up'])->name('sign_up');
Route::post('/sign_up_submit', [USER_SIGNUP::class, 'sign_up_submit'])->name('sign_up.submit');


//______________________________ ADMIN SITE_______________________________
Route::get('/test', [ADMIN::class, 'test'])->name('test');

Route::prefix('/admin')->group(function() {
    Route::get('login', [ADMIN_LOGIN::class, 'login'])->name('admin.login');
    Route::get('logout', [ADMIN_LOGIN::class, 'logout'])->name('admin.logout');

    Route::post('login_submit', [ADMIN_LOGIN::class, 'post_Login'])->name('admin.login.submit');
});

Route::prefix('/admin')->middleware(['admin.session'])->group(function() {
    Route::get('product', [ADMIN::class, 'product'])->name('admin.product');
    Route::get('product_detail/{id?}', [ADMIN::class, 'product_detail'])->name('admin.product_detail');
});


