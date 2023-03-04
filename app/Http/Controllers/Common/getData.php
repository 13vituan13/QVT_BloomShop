<?php
use App\Models\Banner;
use App\Models\Customer;

function getAllCustomer(){
    $res = Customer::all();
    return $res;
}
function getAllBanner(){
    $res = Banner::all();
    return $res;
}

