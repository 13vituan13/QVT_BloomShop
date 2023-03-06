<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class AdminController extends StatusController
{
    public function product()
    {   
        return view("admin.product_list");
    }
}
