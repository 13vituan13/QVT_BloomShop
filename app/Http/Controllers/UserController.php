<?php
namespace App\Http\Controllers;

class UserController extends StatusController
{
    public function home()
    {   
        return view("user.home");
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
    
    public function single()
    {
        return view("user.single");
    }

}
