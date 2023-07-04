<?php
namespace App\Repositories;

use App\Interfaces\ICart;
use Illuminate\Support\Facades\Session;
class CartRepo implements ICart
{   
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
}
