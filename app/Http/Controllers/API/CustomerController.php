<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request; //using Request Laravel
use Illuminate\Support\Facades\Validator; //Check Validation Laravel
use App\Http\Controllers\API\APIStatusController; //Get custom status reponse 
use Illuminate\Support\Facades\Storage; //Handle File
use Illuminate\Support\Facades\DB; //Handle DB && Transaction
use Exception; //Return Msg Error 

use App\Models\Customer;
class CustomerController extends APIStatusController
{   
    private $PATH_Customer_IMAGE;
    public function __construct()
    {
        $this->PATH_Customer_IMAGE = config('path.Customer_IMAGE');
    }
    private static $Rules = [
        'name' => 'required|string|max:20',
        'zipcode' => 'required|integer',
        'phone' => 'required|integer',
        'district_id' => 'required|integer',
        'city_id' => 'required|integer',
        'address' => 'required',
        'email' => 'required',
    ];
    private static $Messages = [
        'name.required' => 'Vui lòng nhập tên khách hàng',
        'zipcode.required' => 'Vui lòng nhập zipcode',
        'phone.required' => 'Vui lòng nhập số điện thoại',
        'district_id.required' => 'Vui lòng chọn quận/huyện',
        'city_id.required' => 'Vui lòng chọn thành phố',
        'address.required' => 'Vui lòng nhập địa chỉ',
        'email.required' => 'Vui lòng nhập địa chỉ email',
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

    public function store(Request $request)
    {   
        $input = $request->all();

        $result_validator = self::validateInput($input);

        if (!$result_validator['status']) {
            return response()->json($result_validator['msg_error'], 400);
        }

        //Start create
        DB::beginTransaction();
        try {
            $input['created_at'] = now();
            $input['updated_at'] = now();
            $customer = Customer::create($input);
            $customer = $customer->fresh(); // Fresh Customer table in Db
            $last_id = $customer->Customer_id; //Just apply for Id = auto-incrementing
            
            //End create
            DB::commit();
            return $this->successResponse('Insert successfully created.',  $last_id);
        } catch (Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }


    public function update(Request $request)
    {
        $input = $request->all();
        $customer_id = $input['customer_id'];
        $result_validator = self::validateInput($input);

        if (!$result_validator['status']) {
            return response()->json($result_validator['msg_error'], 400);
        }

        //Start create
        DB::beginTransaction();
        try {
            $customer = Customer::find($customer_id);
            $customer->name = $input['name'];
            $customer->zipcode = $input['zipcode'];
            $customer->address = $input['address'];
            $customer->district_id = $input['district_id'];
            $customer->city_id = $input['city_id'];
            $customer->phone = $input['phone'];
            $customer->email = $input['email'];

            $customer->updated_at = now();
            $customer->save();
            $result = [
                'customer_id' => $customer_id,
            ];
            //End create
            DB::commit();
            return $this->successResponse('Update successfully created.',  $result);
        } catch (Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }

    public function destroy($Kokyaku_Id)
    {
        // $Kokyaku = MKokyaku::find($Kokyaku_Id);

        // if (is_null($Kokyaku)) {
        //     return $this->errorResponse('Koguchi does not exist.');
        // }

        // $Kokyaku->delete();

        // return $this->successResponse('Kokyaku successfully deleted.');
    }
}
