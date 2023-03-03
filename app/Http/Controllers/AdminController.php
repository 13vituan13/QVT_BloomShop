<?php

namespace App\Http\Controllers;

class AdminController extends StatusController
{
    public function product()
    {
        return view("admin.product_list");
    }


}
