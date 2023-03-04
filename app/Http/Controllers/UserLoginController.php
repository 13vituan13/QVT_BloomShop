<?php

namespace App\Http\Controllers;

class UserLoginController extends StatusController
{
    public function login()
    {
        return view("user.login");
    }
}
