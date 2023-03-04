<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController AS USER;
use App\Http\Controllers\UserLoginController AS USER_LOGIN;

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

Route::get('/', [USER::class, 'home'])->name('home');
Route::get('/about', [USER::class, 'about'])->name('about');
Route::get('/contact', [USER::class, 'contact'])->name('contact');
Route::get('/product', [USER::class, 'product'])->name('product');
Route::get('/services', [USER::class, 'services'])->name('services');
Route::get('/single', [USER::class, 'single'])->name('single');



Route::prefix('/admin')->group(function() {
    Route::get('login', [ADMIN_LOGIN::class, 'login'])->name('admin.login');
    Route::get('logout', [ADMIN_LOGIN::class, 'logout'])->name('admin.logout');

    Route::post('login_submit', [ADMIN_LOGIN::class, 'postLogin'])->name('admin.login.submit');
});

Route::prefix('/admin')->middleware(['admin.session'])->group(function() {
    Route::get('product', [ADMIN::class, 'product'])->name('admin.product');
});


