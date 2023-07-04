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

use Stripe\Stripe;
use Stripe\Charge;
use App\Interfaces\ICity;
use App\Interfaces\IDistrict;
use App\Interfaces\ICustomer;
use App\Interfaces\ICart;
use App\Interfaces\IOrder;
class CheckOutController extends Controller
{   
    protected $_cart;
    protected $_cityRepo;
    protected $_customerRepo;
    protected $_districtRepo;
    protected $_orderRepo;
    
    public function __construct(
        ICart $cartRepo,
        ICity $cityRepo,
        ICustomer $customerRepo,
        IDistrict $districtRepo,
        IOrder $orderRepo
    )
    {       
        $this->_cart = $cartRepo;
        $this->_cityRepo = $cityRepo;
        $this->_customerRepo = $customerRepo;
        $this->_districtRepo = $districtRepo;
        $this->_orderRepo = $orderRepo;
    }
    public function checkout()
    {   
         if(Session::has('customer')){
            $customer_login = Session::get('customer');
            $customer_id = $customer_login['customer_id'];
            $customer_info = $this->_customerRepo->getById($customer_id);
        }
        $cart = Session::get('cart', []);
        $cartCounter = $this->_cart->cartCounter();
        $citys_list  = $this->_cityRepo->getAll();
        $districts_list = $this->_districtRepo->getAll();
        $totalMoney = $this->_cart->cartTotalMoney();
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
    public function checkout_submit(Request $request)
    {
        $input = $request->all();
        $cart = Session::get('cart', []);
        if($input['paymentMethod'] == "creditCard"){
            Stripe::setApiKey(config('services.stripe.secret'));
            $amount = ((int)$input['total_money'])*100; // Số tiền thanh toán, đơn vị là cents
            try {
                $charge = Charge::create([
                    'amount' => $amount,
                    'currency' => 'usd',
                    'description' => $input['customer_name'].' thanh toán',
                    'source' => $input['stripeToken'],
                ]);
            } catch (Exception $e) {
                return response()->json(['message' => 'Fail!', 'error' => $e->getMessage()], 500);
            }
        }

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
            $NewOrder = $this->_orderRepo->getById($order_id);
            // send mail
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
