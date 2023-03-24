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
    $res = Order::where('order_id', $id)->first();
    return $res;
}
function getBestChoiceProduct($limit)
{
    $res = Product::with('category')->with('product_image')
        ->limit($limit)
        ->get();

    return $res;
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
        $query->where('products.id', '=', $product_id);
    }

    if ($product_name) {
        $query->where('products.name', 'like', '%' . $product_name . '%');
    }

    if ($price) {
        $query->where('products.price', '=', $price);
    }

    if ($category_id) {
        $query->where('products.category_id', '=', $category_id);
    }

    if ($inventory_number) {
        $query->where('products.inventory_number', '=', $inventory_number);
    }

    $res = !$pagination ? $query->get() : $query->paginate($pagination);
    return $res;
}
function getProductById($id)
{
    return Product::findOrFail($id);
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
