<?php
use App\Models\Customer;

function getAllCustomer(){
    $res = Customer::all();
    return $res;
}

