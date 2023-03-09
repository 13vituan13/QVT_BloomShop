<?php
namespace App\Http\Controllers;

class UserController extends Controller
{
    public function home()
    {   
        
        $data = [
            'banners' => getAllBanner(),
            'best_choice' => getBestChoiceProduct(),
        ];
        
        return view("user.home",$data);
    }

    public function about()
    {
        return view("user.about");
    }

    public function contact()
    {
        return view("user.contact");
    }

    public function product()
    {
        return view("user.product");
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
