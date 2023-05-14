<?php
use Illuminate\Support\Facades\Hash;

use App\Models\Banner;
use App\Models\City;
use App\Models\District;
use App\Models\Ward;
use App\Models\Customer;
use App\Models\Status;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\VipMember;
use App\Models\PersonalAccessToken;
use Illuminate\Support\Facades\Session;

function cartCounter(){
    // lấy số lượng sản phẩm trong giỏ hàng
    $cart = Session::get('cart', []);
    $cart_counter = 0;
    foreach($cart as $key => $item){
        $cart_counter += $item['quantity'];
    }
    return $cart_counter;
}
function cartTotalMoney(){
    // lấy số lượng sản phẩm trong giỏ hàng
    $cart = Session::get('cart', []);
    $total_money = 0;
    foreach($cart as $key => $item){
        $total_money += (int) $item['price'] * (int) $item['quantity'];
    }
    return $total_money;
}
function getAllVipMemBer()
{
    $res = VipMember::all();
    return $res;
}
function getAllCity()
{
    $res = City::all();
    return $res;
}
function getAllDistrict()
{
    $res = District::all();
    return $res;
}
function getAllWard()
{
    $res = Ward::all();
    return $res;
}
function getAllCustomer()
{
    $res = Customer::all();
    return $res;
}
function getAllBanner()
{
    $res = Banner::all();
    return $res;
}
function getAllStatus()
{
    $res = Status::all();
    return $res;
}
function getAllCategory()
{
    $res = Category::all();
    return $res;
}
function getAllProduct()
{
    $res = Product::all();
    return $res;
}
//Get by id
function getCustomerById($id){
    $res = Customer::leftJoin('vip_member', 'vip_member.vip_id', '=', 'customer.vip_id')
                    ->where('customer_id', $id)
                    ->select('*',
                    'customer.name AS name',
                    'vip_member.name AS vip_name')
                    ->first();

    return $res;
}
function getOrderById($id){
    $res = Order::with(['order_detail', 'order_detail.product'])
    ->where('order_id', $id)
    ->first();

    return $res;
}
function getOrderDetailById($id){
    $res = OrderDetail::with('product')->where('order_id', $id)->get();
    return $res;
}
function getBestChoiceProduct($limit)
{
    $res = Product::with('category')->with('product_image')
        ->limit($limit)
        ->get();

    return $res;
}
function getProductById($id)
{
    $res = Product::with('category')
                    ->with('status')
                    ->with('product_image')
                    ->with('comment')->findOrFail($id);
    return $res;
}
function getCategoryById($id)
{
    $res = Category::where('category_id', $id)->first();
    return $res;
}
function getLastTokenById($id)
{
    $latestToken = PersonalAccessToken::where('tokenable_id', $id)->latest()->first();

    if ($latestToken) {
        $token = $latestToken->token;
    }
    return $token;
}
function checkEmailExist($email)
{
    return Customer::where('email', $email)->exists();
}
function checkCustomerLogin($email, $password)
{   
    $customer = Customer::where('email', $email)->first();
    if ($customer) {
        return Hash::check($password, $customer->password);
    }
    return false;
}
function getCustomerLogin($email)
{
    return Customer::where('email', $email)->first();
}

//GET LIST 
function getProductList($inputs, $pagination = null)
{
    $product_id = isset($inputs['product_id']) ? $inputs['product_id'] : null;
    $product_name = isset($inputs['product_name']) ? $inputs['product_name'] : null;
    $price = isset($inputs['price']) ? $inputs['price'] : null;
    $category_id = isset($inputs['category_id']) ? $inputs['category_id'] : null;
    $inventory_number = isset($inputs['inventory_number']) ? $inputs['inventory_number'] : null;

    $query = Product::with('category')
        ->with('status')
        ->with('product_image');

    if ($product_id) {
        $query->where('product.product_id', '=', $product_id);
    }

    if ($product_name) {
        $query->where('product.name', 'like', '%' . $product_name . '%');
    }

    if ($price) {
        if($price == "1"){
            $query->where('product.price', '<', 200);
        }

        if($price == "2"){
            $query->where('product.price', '>=', 200)->where('product.price', '=<', 500);
        }

        if($price == "3"){
            $query->where('product.price', '>', 500);
        }
    }

    if ($category_id) {
        $query->where('product.category_id', '=', $category_id);
    }

    if ($inventory_number) {
        $query->where('product.inventory_number', '=', $inventory_number);
    }
    $query->orderBy('product_id', 'DESC');
    $res = !$pagination ? $query->get() : $query->paginate($pagination);
    return $res;
}
function getCustomerList($inputs, $pagination = null)
{
    $customer_id = isset($inputs['customer_id']) ? $inputs['customer_id'] : null;
    $name = isset($inputs['name']) ? $inputs['name'] : null;
    $phone = isset($inputs['phone']) ? $inputs['phone'] : null;
    $email = isset($inputs['email']) ? $inputs['email'] : null;
    $vip_id = isset($inputs['vip_id']) ? $inputs['vip_id'] : null;

    $query = Customer::with('vip_member')
        ->with('city')
        ->with('district');

    if ($customer_id) {
        $query->where('customer.customer_id', '=', $customer_id);
    }

    if ($name) {
        $query->where('customer.name', 'like', '%' . $name . '%');
    }

    if ($phone) {
        $query->where('customer.name', 'like', '%' . $phone . '%');
    }

    if ($email) {
        $query->where('customer.name', 'like', '%' . $email . '%');
    }

    if ($vip_id) {
        $query->where('customer.vip_id', '=', $vip_id);
    }
    $query->orderBy('customer_id', 'DESC');
    $res = !$pagination ? $query->get() : $query->paginate($pagination);
    return $res;
}

function getOrderList($inputs, $pagination = null)
{

    $res = Order::select(
        'order.order_id',
        'order.customer_phone as cusPhone',
        'order.customer_address as cusAddress',
        'order.customer_email as cusEmail',
        'order.date',
        'order.customer_name as cusName',
        'order.total_money as total',
        'order.status_id',
        DB::raw('GROUP_CONCAT(product.name SEPARATOR ", ") AS productName'),
        DB::raw('SUM(order_detail.quantity) AS quantity'),
        DB::raw('GROUP_CONCAT(order_detail.price SEPARATOR ", ") AS price'), 
        'status_order.name as statusName')
    ->leftjoin('status_order', 'status_order.status_id', '=', 'order.status_id')
    ->leftjoin('order_detail', 'order_detail.order_id', '=', 'order.order_id')
    ->leftjoin('product', 'product.product_id', '=', 'order_detail.product_id')
    ->groupBy('order.order_id')
    ->orderBy('order.order_id','DESC');
    $res = !$pagination ? $res->get() : $res->paginate($pagination);
    return $res;
}