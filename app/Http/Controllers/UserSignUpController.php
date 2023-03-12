<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;


class UserSignUpController extends Controller
{
    public function sign_up()
    {   
        
        return view("user.sign_up");
    }

}
