<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request; //using Request Laravel
use Illuminate\Support\Facades\Validator; //Check Validation Laravel
use App\Http\Controllers\API\APIStatusController; //Get custom status reponse 
use Illuminate\Support\Facades\Storage; //Handle File
use Illuminate\Support\Facades\DB; //Handle DB && Transaction
use Exception; //Return Msg Error 

use App\Models\Order;
use App\Models\OrderDetail;

class OrderController extends APIStatusController
{   
    
    private static $Rules = [
        'name' => 'required|string|max:20',
        'price' => 'required|integer',
        'inventory_number' => 'required|integer',
        'category_id' => 'required',
        'status_id' => 'required',
    ];
    private static $Messages = [
        'name.required' => 'Vui lòng nhập tên sản phẩm',
        'price.required' => 'Vui lòng nhập giá sản phẩm',
        'price.integer' => 'Giá sản phẩm phải là số nguyên',
        'inventory_number.required' => 'Vui lòng nhập số lượng tồn kho',
        'inventory_number.integer' => 'Số lượng tồn kho phải là số nguyên',
        'category_id.required' => 'Vui lòng chọn danh mục sản phẩm',
        'status_id.required' => 'Vui lòng chọn trạng thái sản phẩm',
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
            $order = User::create($input);
            $order = $order->fresh(); // Fresh product table in Db
            $last_id = $order->product_id; //Just apply for Id = auto-incrementing

            
            $
            $result = [
                'product_id' => $last_id,
                
            ];
            //End create
            DB::commit();
            return $this->successResponse('Insert successfully created.',  $result);
        } catch (Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }


    public function update(Request $request)
    {
        $input = $request->all();
        $order_id = $input['product_id'];
        $result_validator = self::validateInput($input);

        if (!$result_validator['status']) {
            return response()->json($result_validator['msg_error'], 400);
        }

        //Start create
        DB::beginTransaction();
        try {
            $order = User::find($order_id);
            $order->name = $input['name'];
            $order->description = $input['description'];
            $order->price = $input['price'];
            $order->inventory_number = $input['inventory_number'];
            $order->category_id = $input['category_id'];
            $order->status_id = $input['status_id'];
            $order->updated_at = now();
            $order->save();

            //handle image product
            $arr_remove_image = json_decode($input['arr_remove_image']);
            if(count($arr_remove_image) > 0){
                foreach ($arr_remove_image as $remove_item) {
                    Role::where('image','=',$remove_item)->delete();
                    Storage::delete('public/'.$remove_item);
                }
            }
           
            $result = [
                'product_id' => $order_id,
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
