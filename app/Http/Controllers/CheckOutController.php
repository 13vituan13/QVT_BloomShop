<?php
namespace App\Http\Controllers;


use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

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
        $citys_list  = getAllCity();
        $districts_list = getAllDistrict();
        $totalMoney = cartTotalMoney();
        if(isset($customer_info) && isset($customer_info->vip_id)){
            //tính tiền giảm giá theo hạng Khách Hàng
            $totalMoney = (int) $totalMoney * ((100 - $customer_info->offer)/100);
        }
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
        $input['customer_id'] = isset($input['customer_id']) ? $input['customer_id'] : 0;
        $input['customer_address'] = $input['customer_address'].', '.$input['district_text'].', '.$input['city_text'];
        $input['date'] = Carbon::now()->format('Y-m-d');
        $input['status_id'] = 1;

        //Start create
        DB::beginTransaction();
        try {
            $order = Order::create($input);
            $order = $order->fresh(); 
            $order_id = $order->order_id;
            foreach($cart as $key => $item){
                $item['order_id'] = $order_id;
                OrderDetail::create($item);
            }
            Session::forget('cart');
            $NewOrder = getOrderById($order_id);
            Mail::to($input['customer_email'])->send(new SendMail($NewOrder));
            DB::commit();
            return response()->json(['message' => 'Success!', 'data' => $order_id], 200);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e);
            return response()->json(['message' => 'Fail!', 'error' => $e->getMessage()], 500);
        }
    }

}
