<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // sử dụng view composer để truyền dữ liệu vào view
        View::composer('layouts.user.header', function ($view) {

            // lấy danh sách thể loại từ CSDL
            $categories = Category::all();
            
            // truyền danh sách vào view
            $view->with('categories', $categories);
        });
    }
}
