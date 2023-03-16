<?php
namespace App\Http\Controllers;

class UserController extends Controller
{
    public function home()
    {   
        $data = [
            'banners' => getAllBanner(),
            'best_choice' => getBestChoiceProduct(),
            'count_product' => count(getAllProduct()),
        ];
        
        return view("user.home",$data);
    }

    public function about()
    {
        return view("user.about");
    }
    public function cart()
    {
        return view("user.cart");
    }

    public function contact()
    {
        return view("user.contact");
    }

    public function product()
    {   
        $inputs = [];
        $data = [
            'product_list' => getProductList($inputs,6),
        ];
        return view("user.product",$data);
    }

    public function services()
    {
        return view("user.services");
    }
    
    public function product_detail()
    {
        return view("user.product_detail");
    }

}
