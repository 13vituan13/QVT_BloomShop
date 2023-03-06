<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;


// use Carbon\Carbon;
// use File;
// use Session;
// use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\Mail;
// use Illuminate\Support\Str;


class AdminController extends StatusController
{
    public function product(Request $request)
    {   
        $inputs = $request->all();
        $dataView = [
            'product_list' => getProductList($inputs),
        ];
        if ($request->ajax()) {
            $tableHTML = view('admin.partial.product_table', $dataView)->render();
        } else {
            return view("admin.product_list");
        }
        
    }
    
}
