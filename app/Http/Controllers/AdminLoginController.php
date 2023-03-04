<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminLoginController extends Controller
{
    public function login()
    {   
        return view("admin.login");
    }
   
    public function postLogin(Request $request)
    {   
        $credentials = $request->only('email', 'password');
        // $remember = $request->has('remember'); // kiểm tra xem người dùng đã chọn "remember me" hay chưa
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('admin/product');
        }
        else {
            return back()->withErrors(['email' => 'Thông tin đăng nhập không đúng']);
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
    public function createTmp()
    {
        return User::create([
            'name' => 'Vĩ Tuấn',
            'email' => 'admin',
            'password' => Hash::make('abc'),
        ]);
    }
}
