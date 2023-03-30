<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Exception; 

use Illuminate\Support\Facades\Validator; //Check Validation Laravel
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class UserSignUpController extends Controller
{   
    private static $Rules = [
        'name' => 'required',
        'address' => 'required',
        'district' => 'required',
        'city' => 'required',
        'birthday' => 'required',
        'phone' => 'required',
        'email' => 'required',
        'password' => 'required',
    ];
    private static $Messages = [
        'name.required' => 'Vui lòng nhập tên sản phẩm',
        'address.required' => 'Vui lòng nhập địa chỉ',
        'district_id.required' => 'Vui lòng nhập quận',
        'city_id.required' => 'Vui lòng nhập tỉnh thành',
        'birthday.required' => 'Vui lòng nhập ngày sinh',
        'phone.required' => 'Vui lòng nhập số điện thoại',
        'email.required' => 'Vui lòng nhập email',
        'password.required' => 'Vui lòng nhập password',
    ];

    public function validateInput($input)
    {
        
        $validator = Validator::make($input, self::$Rules, self::$Messages); // Initialization validator with rules

        // Check input request from client
        $result_validator = [
            'status' => true,
        ];
        // If fails
        if ($validator->fails()) {
            $result_validator['status'] = false;
            $result_validator['msg_error'] = $validator->errors();
        }
        return $result_validator;
    }

    public function sign_up()
    {   
        $dataView = [
            'citys_list' => getAllCity(),
            'districts_list' => getAllDistrict(),
        ];
        return view("user.sign_up",$dataView);
    }
    public function sign_up_submit(Request $request){
        $input = $request->all();
        $result_validator = self::validateInput($input);

        if (!$result_validator['status']) {
            return response()->json($result_validator['msg_error'], 400);
        }

        if(checkEmailExist($input['email'])){
            return response()->json(['duplicated' => 1], 200);
        }

        //Start create
        DB::beginTransaction();
        try {
            $input['password'] = Hash::make($input['password']);
            $customer = Customer::create($input);
            $customer = $customer->fresh(); // Fresh product table in Db

            DB::commit();
            return response()->json(['message' => 'Tạo mới khách hàng thành công!', 'data' => $customer], 200);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e);
            return response()->json(['message' => 'Có lỗi xảy ra trong quá trình tạo mới khách hàng!', 'error' => $e->getMessage()], 500);
        }

    }

}
