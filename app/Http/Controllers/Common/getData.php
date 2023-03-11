<?php
use App\Models\Banner;
use App\Models\Customer;
use App\Models\Status;
use App\Models\Category;
use App\Models\Product;
use App\Models\PersonalAccessToken;
function getAllCustomer(){
    $res = Customer::all();
    return $res;
}
function getAllBanner(){
    $res = Banner::all();
    return $res;
}
function getAllStatus(){
    $res = Status::all();
    return $res;
}
function getAllCategory(){
    $res = Category::all();
    return $res;
}

function getBestChoiceProduct(){
    $res = Product::with('product_image')->get();
    return $res;
}
function getProductList($inputs)
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

    $res = $query->paginate(5);
        

    return $res;
}
function getProductById($id){
    return Product::findOrFail($id);
}
function getLastTokenById($id){
    $latestToken = PersonalAccessToken::where('tokenable_id', $id)->latest()->first();

    if ($latestToken) {
        $token = $latestToken->token;
    }
    return $token;
}
