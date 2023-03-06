<?php
use App\Models\Banner;
use App\Models\Customer;
use App\Models\Product;

function getAllCustomer(){
    $res = Customer::all();
    return $res;
}
function getAllBanner(){
    $res = Banner::all();
    return $res;
}

function getBestChoiceProduct(){
    $res = Product::with('productImage')->get();
    return $res;
}
