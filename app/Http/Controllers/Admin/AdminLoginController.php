<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Session;
// use Carbon\Carbon;
// use File;
// use Session;
// use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\Mail;
// use Illuminate\Support\Str;

class AdminLoginController extends Controller
{   
    public function index()
    {   
        if (Auth::guard('admin')->check()) {
            return redirect()->intended('admin/product');
        }
        return view("admin.login");
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

        $credentials = $request->only('email', 'password');
        // $remember = $request->has('remember'); // kiểm tra xem người dùng đã chọn "remember me" hay chưa
        if (Auth::guard('admin')->attempt($credentials)) {
            $user = Auth::guard('admin')->user();
            $token = $user->createToken('token')->plainTextToken;
            Session::put('token',$token);
            return redirect()->intended('admin/product');
        }
        else {
            return back()->withErrors(['loginfail' => 'Thông tin đăng nhập không đúng']);
        }
    }
    

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}