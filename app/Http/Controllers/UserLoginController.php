<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;
use Session;
class UserLoginController extends Controller
{
    public function login()
    {   
        return view("user.login");
    }
    public function post_Login(Request $request)
    {   
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];
    
        $messages = [
            'email.required' => 'Vui lòng nhập email',
            'password.required' => 'Vui lòng nhập mật khẩu',
        ];
    
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $email = $request->get('email');
        $password = $request->get('password');
        
        if (checkCustomerLogin($email,$password)) {
            $customer = getCustomerLogin($email);
            Session::put('customer',$customer);
            
            return response()->json(['message' => 'Đăng nhập thành công!', 'data' => $customer], 200);
        }
        else {
            return response()->json(['message' => 'đăng nhập thất bại'],400);
        }
    }
    

    public function logout()
    {
        Session::forget('customer');
        return redirect('/');
    }
}
