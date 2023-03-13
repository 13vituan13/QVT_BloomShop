<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;


class UserSignUpController extends Controller
{
    public function sign_up()
    {   
        return view("user.sign_up");
    }

    public function sign_up_submit(Request $request){
        // $rules = [
        //     'email' => 'required',
        //     'password' => 'required',
        // ];
    
        // $messages = [
        //     'email.required' => 'Vui lòng nhập email',
        //     'password.required' => 'Vui lòng nhập mật khẩu',
        // ];
    
        // $validator = Validator::make($request->all(), $rules, $messages);
    
        // if ($validator->fails()) {
        //     return back()->withErrors($validator)->withInput();
        // }
        $input = $request->all();
        
        //Start create
        DB::beginTransaction();
        try {
            $input['created_at'] = now();
            $input['updated_at'] = now();
            $customer = Customer::create($input);
            $customer = $customer->fresh(); // Fresh product table in Db
            $last_id = $customer->product_id; //Just apply for Id = auto-incrementing
            $result = [
                'product_id' => $last_id,
            ];
            //End create
            DB::commit();
            return view("user.sign_up");
        } catch (Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }

}
