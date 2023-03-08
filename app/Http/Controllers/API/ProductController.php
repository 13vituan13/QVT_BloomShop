<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\APIStatusController;
use Illuminate\Support\Facades\DB;
use Exception;

use App\Models\Product;


class ProductController extends APIStatusController
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
            $product = Product::create($input);
            $last_id = $product->id; //just apply for Id = auto-incrementing
            $res = ['id' => $last_id];
            //End create
            DB::commit();
            return $this->successResponse('Insert successfully created.',  $res);
        } catch (Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }


    public function update(Request $request, $Kokyaku_Id)
    {

        // $input = $request->all();
        // $Kokyaku = MKokyaku::find($Kokyaku_Id);
        //     $Kokyaku->Kaishamei = $input['Kaishamei'];
        //     $Kokyaku->KaishameiKana = $input['KaishameiKana'];
        //     $Kokyaku->YuubinBangou = $input['YuubinBangou'];
        //     $Kokyaku->Todoufuken = $input['Todoufuken'];
        //     $Kokyaku->Shozaichi = $input['Shozaichi'];
        //     $Kokyaku->Tatemonomei = $input['Tatemonomei'];
        //     $Kokyaku->Tel = $input['Tel'];
        //     $Kokyaku->Fax = $input['Fax'];
        //     $Kokyaku->Tantoushamei = $input['Tantoushamei'];
        //     $Kokyaku->TantoushaMail = $input['TantoushaMail'];
        //     $Kokyaku->Flg_Kaiyaku = $input['Flg_Kaiyaku'];

        // //Start update
        // DB::beginTransaction();
        // try {

        //     $Kokyaku->save();
        //     //End update
        //     DB::commit();
        //     return $this->successResponse('Koguchi successfully updated.', $Kokyaku);
        // } catch (Exception $e) {
        //     DB::rollBack();
        //     throw new Exception($e->getMessage());
        // }

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
