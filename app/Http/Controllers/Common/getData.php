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
function getBestChoiceProduct($limit)
{
    $res = Product::with('category')->with('product_image')
        ->limit($limit)
        ->get();

    return $res;
}
function getCustomerList($inputs, $pagination = null){
    $query = Customer::with('vip_member') // gọi hàm , district vs cái kia tương tự
    ->with('citys');
    $customer_id = isset($inputs['customer_id']) ? $inputs['customer_id'] : null;
    $customer_name = isset($inputs['customer_name']) ? $inputs['customer_name'] : null;
    $city = isset($inputs['citys']) ? $inputs['citys'] : null;
    $phone = isset($inputs['phone']) ? $inputs['phone'] : null;
    if ($customer_id) {
        $query->where('customer.id', '=', $customer_id);
    }

    if ($customer_name) {
        $query->where('customer.name', 'like', '%' . $customer_name . '%');
    }

    if ($city) {
        $query->where('customer.citys', '=', $city);
    }

    if ($phone) {
        $query->where('customer.phone', '=', $phone);
    }

    $res = !$pagination ? $query->get() : $query->paginate($pagination); 
    return $res;
   return $query;
}
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
        $query->where('product.id', '=', $product_id);
    }

    if ($product_name) {
        $query->where('product.name', 'like', '%' . $product_name . '%');
    }

    if ($price) {
        $query->where('product.price', '=', $price);
    }

    if ($category_id) {
        $query->where('product.category_id', '=', $category_id);
    }

    if ($inventory_number) {
        $query->where('product.inventory_number', '=', $inventory_number);
    }

    $res = !$pagination ? $query->get() : $query->paginate($pagination);
    return $res;
}
function getProductById($id)
{
    $res = Product::with('category')
                    ->with('status')
                    ->with('product_image')->findOrFail($id);
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
