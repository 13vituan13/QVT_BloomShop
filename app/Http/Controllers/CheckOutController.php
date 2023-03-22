<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

class CheckOutController extends Controller
{
    public function checkout()
    {   
        $cart = Session::get('cart', []);
        $cartCounter = cartCounter();
        $totalMoney = cartTotalMoney();
        $citys_list  = getAllCity();
        $districts_list = getAllDistrict();
        $dataView = [
            'cart' => $cart,
            'cartCounter' => $cartCounter,
            'totalMoney' => $totalMoney,
            'citys_list' => $citys_list,
            'districts_list' => $districts_list,
        ];
        return view("user.checkout",$dataView);
    }

}
