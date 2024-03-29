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
            'title' => 'Danh Sách Nhân Viên',
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
            'title' => 'Danh Sách Khách Hàng',
            'customer_list' => getCustomerList($inputs,10),
            'icon_title' => 'fa-solid fa-table-list',
            'citys_list' => getAllCity(),
            'districts_list' => getAllDistrict(),
            'vip_member_list' => getAllVipMemBer(),
        ];
        return view("admin.customer_list",$dataView);

    }

    //Order List Page
    public function order(Request $request)
    {   
        $inputs = $request->all();
        $dataView = [
            'title' => 'Danh Sách Đơn Hàng',
            'order_list' => getOrderList($inputs,10),
            'icon_title' => 'fa-solid fa-table-list',
            'status_order_list' => getAllStatusOrder(),
        ];
        $request->flash();

        return view("admin.order_list",$dataView);
    }
    public function order_detail($id = null)
    {   
        $dataView = [
            'customer_list' => getAllCustomer(),
            'status_order_list' => getAllStatusOrder(),
        ];
        if ($id) { 
            // update
            $dataView['title'] = 'Cập nhật đơn hàng';
            $dataView['icon_title'] = 'fa fa-pencil-square-o';

            $order = getOrderById($id);
            $dataView['order'] = $order;
        } else { 
            // create
            $dataView['title'] = 'Thêm Sản Phẩm';
            $dataView['icon_title'] = 'fa-solid fa-plus';
        }
        return view("admin.order_detail", $dataView);
    }
    public function orderDetailById(Request $request)
    {   
        $inputs = $request->all();
        $order_id = $inputs['order_id'];
        $result = getOrderDetailById($order_id);
        return response()->json(['result' => $result], 200);
    }
    public function ajaxUserById(Request $request)
    {   
        $inputs = $request->all();
        $id = $inputs['id'];
        $result = getUserById($id);
        return response()->json(['result' => $result], 200);
    }
    public function ajaxCustomerById(Request $request)
    {   
        $inputs = $request->all();
        $id = $inputs['id'];
        $result = getCustomerById($id);
        return response()->json(['result' => $result], 200);
    }
}

