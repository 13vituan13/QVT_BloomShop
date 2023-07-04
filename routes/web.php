<?php

use Illuminate\Support\Facades\Route;

//User Site Controller
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;

//Admin Site Controller
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\CustomerManageController;
use App\Http\Controllers\Admin\ExcelController;
use App\Http\Controllers\Admin\OrderManageController;
use App\Http\Controllers\Admin\ProductManageController;
use App\Http\Controllers\Admin\UserManageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------

___________________________________________________________________________

|--------------------------------------------------------------------------
| USER SITE
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product_detail/{id}', [ProductController::class, 'product_detail'])->name('product_detail');

// ****** CART ******
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/cart_store', [CartController::class, 'store'])->name('cart.store');
Route::post('/cart_update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart_remove', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/checkout', [CheckOutController::class, 'checkout'])->name('checkout');
Route::post('/checkout_submit', [CheckOutController::class, 'checkout_submit'])->name('checkout.submit');

// ****** LOGIN ******
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('login_submit', [LoginController::class, 'post_Login'])->name('login.submit');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// ****** SIGNUP ******
Route::get('/sign_up', [SignUpController::class, 'sign_up'])->name('sign_up');
Route::post('/sign_up_submit', [UserSigSignUpControllernUpController::class, 'sign_up_submit'])->name('sign_up.submit');
Route::post('/check_email_exist', [SignUpController::class, 'check_email_exist'])->name('check.email');

Route::post('/add_comment', [UserController::class, 'addComment'])->name('admin.addComment');

/*
|--------------------------------------------------------------------------
| ADMIN SITE
|--------------------------------------------------------------------------
*/

Route::prefix('/admin')->group(function() {
    // ****** LOGIN ******
    Route::get('/', [AdminLoginController::class, 'index'])->name('admin.login');
    Route::post('login_submit', [AdminLoginController::class, 'post_Login'])->name('admin.login.submit');
    Route::get('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
});

Route::prefix('/admin')->middleware(['admin.session'])->group(function() {
    // ****** PRODUCT ******
    Route::get('product', [ProductManageController::class, 'product'])->name('admin.product');
    Route::get('product_detail/{id?}', [ProductManageController::class, 'product_detail'])->name('admin.product_detail');
    // ****** ORDER ******
    Route::get('order', [OrderManageController::class, 'order'])->name('admin.order');
    Route::get('order_detail/{id?}', [OrderManageController::class, 'order_detail'])->name('admin.order_detail');
    Route::get('get_order_detail_by_id', [OrderManageController::class, 'orderDetailById'])->name('admin.get_order_detail_by_id');
    Route::get('export_bill', [ExcelController::class, 'exportBill'])->name('admin.export_bill');
    // ****** CUSTOMER ******
    Route::get('customer', [CustomerManageController::class, 'customer'])->name('admin.customer');
    Route::get('get_customer_by_id', [CustomerManageController::class, 'ajaxCustomerById'])->name('admin.ajax_get_customer_by_id');
    // ****** USER ******
    Route::get('user', [UserManageController::class, 'user'])->name('admin.user');
    Route::get('get_user_by_id', [UserManageController::class, 'ajaxUserById'])->name('admin.ajax_get_user_by_id');
});

