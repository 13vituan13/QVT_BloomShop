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
    //Product List Page
    public function product(Request $request)
    {   
        $inputs = $request->all();
        $sessionLifetime = config('session.lifetime') * 60;
        $dataView = [
            'title' => 'Danh Sách Sản Phẩm',
            'product_list' => getProductList($inputs,10),
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
    //User List Page
    public function user(Request $request)
    {   
        $inputs = $request->all();
        $dataView = [
            'title' => 'Danh Sách Sản Phẩm',
            'user_list' => getUserList($inputs,10),
            'icon_title' => 'fa-solid fa-table-list',
        ];
        return view("admin.user_list",$dataView);

    }
    //Customer List Page
    public function customer(Request $request)
    {   
        $inputs = $request->all();
        $dataView = [
            'title' => 'Danh Sách Sản Phẩm',
            'customer_list' => getCustomerList($inputs,10),
            'icon_title' => 'fa-solid fa-table-list',
        ];
        return view("admin.customer_list",$dataView);

    }
    public function customer_detail($id = null)
    {   
        $dataView = [
            'vip_member_list' => getAllVipMemBer(),
            'citys_list' => getAllCity(),
            'districts_list' => getAllDistrict(),
        ];
        if ($id) { 
            // update
            $dataView['title'] = 'Cập nhật khách hàng';
            $dataView['icon_title'] = 'fa fa-pencil-square-o';

            $customers = getCustomerById($id);
            $dataView['customers'] = $customers;
        } else { 
            // create
            $dataView['title'] = 'Thêm khách hàng';
            $dataView['icon_title'] = 'fa-solid fa-plus';
        }

        return view("admin.customer_detail", $dataView);
    }

    //Order List Page
    public function order(Request $request)
    {   
        $inputs = $request->all();
        $dataView = [
            'title' => 'Danh Sách Đặt Hàng',
            'order_list' => getOrderList($inputs,10),
            'icon_title' => 'fa-solid fa-table-list',
        ];
        return view("admin.order_list",$dataView);
    }
    public function orderDetailById(Request $request)
    {   
        $inputs = $request->all();
        $order_id = $inputs['order_id'];
        $result = getOrderDetailById($order_id);
        return response()->json(['result' => $result], 200);
    }

}

