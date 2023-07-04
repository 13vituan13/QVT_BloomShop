<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

use App\Interfaces\IBanner;
use App\Interfaces\ICart;
use App\Interfaces\ICategory;
use App\Interfaces\ICity;
use App\Interfaces\ICustomer;
use App\Interfaces\IDistrict;
use App\Interfaces\IOrder;
use App\Interfaces\IOrderDetail;
use App\Interfaces\IProduct;
use App\Interfaces\IStatus;
use App\Interfaces\IStatusOrder;
use App\Interfaces\IUser;
use App\Interfaces\IVipMember;
use App\Interfaces\IWard;

use App\Repositories\BannerRepo;
use App\Repositories\CartRepo;
use App\Repositories\CategoryRepo;
use App\Repositories\CityRepo;
use App\Repositories\CustomerRepo;
use App\Repositories\DistrictRepo;
use App\Repositories\OrderRepo;
use App\Repositories\OrderDetailRepo;
use App\Repositories\ProductRepo;
use App\Repositories\StatusRepo;
use App\Repositories\StatusOrderRepo;
use App\Repositories\UserRepo;
use App\Repositories\VipMemberRepo;
use App\Repositories\WardRepo;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IBanner::class, BannerRepo::class);
        $this->app->bind(ICart::class, CartRepo::class);
        $this->app->bind(ICategory::class, CategoryRepo::class);
        $this->app->bind(ICity::class, CityRepo::class);
        $this->app->bind(ICustomer::class, CustomerRepo::class);
        $this->app->bind(IDistrict::class, DistrictRepo::class);
        $this->app->bind(IOrder::class, OrderRepo::class);
        $this->app->bind(IOrderDetail::class, OrderDetailRepo::class);
        $this->app->bind(IProduct::class, ProductRepo::class);
        $this->app->bind(IStatus::class, StatusRepo::class);
        $this->app->bind(IStatusOrder::class, StatusOrderRepo::class);
        $this->app->bind(IUser::class, UserRepo::class);
        $this->app->bind(IVipMember::class, VipMemberRepo::class);
        $this->app->bind(IWard::class, WardRepo::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
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
