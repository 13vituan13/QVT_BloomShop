<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Exception;

class CheckOutController extends Controller
{
    public function checkout()
    {   
        if(Session::has('customer')){
            $customer_login = Session::get('customer');
            $customer_id = $customer_login['customer_id'];
            $customer_info = getCustomerById($customer_id);
        }
        $cart = Session::get('cart', []);
        $cartCounter = cartCounter();
        $totalMoney = cartTotalMoney();
        $citys_list  = getAllCity();
        $districts_list = getAllDistrict();
        $dataView = [
            'cart' => $cart,
            'cartCounter' => $cartCounter,
            'totalMoney' => $totalMoney,
            'customer_info' => isset($customer_info) ? $customer_info : null,
            'citys_list' => $citys_list,
            'districts_list' => $districts_list,
        ];
        return view("user.checkout",$dataView);
    }
    public function checkout_submit(Request $request){
        $input = $request->all();
        $cart = Session::get('cart', []);
        $totalMoney = cartTotalMoney();
        $input['customer_id'] = 11;
        $input['customer_address'] = $input['customer_address'].'-'.$input['district_text'].'-'.$input['city_text'];
        $input['date'] = Carbon::now()->format('Y-m-d');
        $input['status_id'] = 1;
        $input['total_money'] = $totalMoney;
        //Start create
        DB::beginTransaction();
        try {
            $order = Order::create($input);
            $order = $order->fresh(); // Fresh product table in Db
            $order_id = $order->order_id;
            foreach($cart as $key => $item){
                $item['order_id'] = $order_id;
                OrderDetail::create($item);
            }
            DB::commit();
            return response()->json(['message' => 'Tạo mới khách hàng thành công!', 'data' => $order_id], 200);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e);
            return response()->json(['message' => 'Có lỗi xảy ra trong quá trình tạo mới khách hàng!', 'error' => $e->getMessage()], 500);
        }
    }

}
