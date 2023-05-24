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
    public function store(Request $request)
    {   
        $input = $request->all();
        
        
        //Start create
        DB::beginTransaction();
        try {
            $input['date'] = now();
            $input['created_at'] = now();
            $input['updated_at'] = now();
            $order = Order::create($input);
            $order = $order->fresh(); // Fresh order table in Db
            $last_id = $order->order_id; //Just apply for Id = auto-incrementing

            $product_detail = json_decode($input['product_detail'], true);
            // Access the array elements
            foreach ($product_detail as $key => $item) {
                $item['order_id'] = $last_id;
                $item['created_at'] = now();
                $item['updated_at'] = now();
                $product_detail_insert = OrderDetail::create($item);
            }

            $result = [
                'order_id' => $last_id,
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
        $order_id = $input['order_id'];

        //Start create
        DB::beginTransaction();
        try {
            $order = Order::find($order_id);
            $order->customer_id = $input['customer_id'];
            $order->customer_name = $input['customer_name'];
            $order->customer_email = $input['customer_email'];
            $order->customer_address = $input['customer_address'];
            $order->customer_phone = $input['customer_phone'];
            $order->status_id = $input['status_id'];
            $order->total_money = $input['total_money'];
            $order->updated_at = now();
            $order->save();

            $product_detail = json_decode($input['product_detail'], true);
            OrderDetail::find($order_id)->delete();
            // Access the array elements
            foreach ($product_detail as $key => $item) {
                $item['order_id'] = $order_id;
                $item['created_at'] = now();
                $item['updated_at'] = now();
                $product_detail_insert = OrderDetail::create($item);
            }

            $result = [
                'order_id' => $order_id,
            ];
            //End create
            DB::commit();
            return $this->successResponse('Update successfully created.',  $result);
        } catch (Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }

}
