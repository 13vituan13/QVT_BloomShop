<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;


// use Carbon\Carbon;
// use File;
// use Session;
// use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\Mail;
// use Illuminate\Support\Str;


class AdminController extends Controller
{
    public function product(Request $request)
    {   
        $inputs = $request->all();
        $sessionLifetime = config('session.lifetime') * 60;
        $dataView = [
            'title' => 'Danh Sách Sản Phẩm',
            'product_list' => getProductList($inputs,5),
            'icon_title' => 'fa-solid fa-table-list',
        ];
        if ($request->ajax()) {
            $tableHTML = view('admin.partial.product_table', $dataView)->render();
        } else {
            return view("admin.product_list",$dataView)->with('sessionLifetime',$sessionLifetime);
        }
    }
    public function product_detail($id = null)
    {   
        $dataView = [
            'category_list' => getAllCategory(),
            'status_list' => getAllStatus(),
        ];
        if ($id) { 
            // update
            $dataView['title'] = 'Cập nhật sản phẩm';
            $dataView['icon_title'] = 'fa fa-pencil-square-o';

            $products = getProductById($id);
            $dataView['products'] = $products;
        } else { 
            // create
            $dataView['title'] = 'Thêm Sản Phẩm';
            $dataView['icon_title'] = 'fa-solid fa-plus';
        }

        return view("admin.product_detail", $dataView);
    }
    public function customer(Request $request)
    {   
        $inputs = $request->all();
        $dataView = [
            'title' => 'Danh Sách Khách Hàng',
            //ở đây mình gọi hàm để lấy danh sách khách hàng trong database ,đặt tên hàm là getCustomerList 
            // truyền vô điều kiện với số khách hàng hiển thị trên 1 trang , ở đây mình hiển thị 5 khách
            'customer_list' => getCustomerList($inputs,5),
            'icon_title' => 'fa-solid fa-table-list',
        ];
        
        return view("admin.customer_list",$dataView);
        
    }
    public function customer_detail($id = null)
    {   
        $dataView = [
            'city_id' => getAllCity(),
            
        ];
        if ($id) { 
            // update
            $dataView['title'] = 'Cập nhật Khách Hàng';
            $dataView['icon_title'] = 'fa fa-pencil-square-o';

            $customer = getCustomerById($id);
            $dataView['customer'] = $customer;
        } else { 
            // create
            $dataView['title'] = 'Thêm Khách Hàng';
            $dataView['icon_title'] = 'fa-solid fa-plus';
        }

        return view("admin.customer_detail", $dataView);
    }
}
