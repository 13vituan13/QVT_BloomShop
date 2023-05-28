<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request; //using Request Laravel
use Illuminate\Support\Facades\Validator; //Check Validation Laravel
use App\Http\Controllers\API\APIStatusController; //Get custom status reponse 
use Illuminate\Support\Facades\Storage; //Handle File
use Illuminate\Support\Facades\DB; //Handle DB && Transaction
use Exception; //Return Msg Error 
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
class CustomerController extends APIStatusController
{   
    private $PATH_Customer_IMAGE;
    public function __construct()
    {
        $this->PATH_Customer_IMAGE = config('path.Customer_IMAGE');
    }
    
    public function store(Request $request)
    {   
        $input = $request->all();

        //Start create
        DB::beginTransaction();
        try {
            $input['created_at'] = now();
            $input['updated_at'] = now();
            $input['flg_del'] = 0;
            $input['password'] = Hash::make($input['password']);
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

        //Start create
        DB::beginTransaction();
        try {
            $customer = Customer::find($customer_id);
            $customer->name = $input['name'];
            $customer->address = $input['address'];
            $customer->district_id = $input['district_id'];
            $customer->city_id = $input['city_id'];
            $customer->phone = $input['phone'];
            $customer->email = $input['email'];
            if(isset($input['password'])){
                $customer->password = Hash::make($input['password']);
            }
            $customer->vip_id = $input['vip_id'];
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
            throw new Exception($e->getMessage());
        }
    }

    public function remove(Request $request)
    {   
        $input = $request->all();
        $id = $input['id'];

    	$customer = Customer::find($id);

        if (is_null($customer)) {
            return $this->errorResponse('Customer does not exist.');
        }
        $customer->flg_del = 1;
        $customer->save();

        return $this->successResponse('Customer successfully deleted.');
    }
}
