<?php
namespace App\Http\Controllers;

class UserController extends Controller
{
    public function home()
    {   
        $banner = getAllBanner();
        $product_banner = getBestChoiceProduct(count(getAllBanner()));
        $best_choice = getBestChoiceProduct(9);
        foreach($banner as $key => $value){
            foreach($product_banner as $k => $v){
                if($key == $k){
                    $value['product'] = $v;
                }
            }
        }
        
        $data = [
            'banners' => $banner,
            'best_choice' => $best_choice,
            'count_product' => count(getAllProduct()),
            'count_client' => count(getAllCustomer()),
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
