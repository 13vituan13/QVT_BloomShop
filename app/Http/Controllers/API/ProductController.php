<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request; //using Request Laravel
use Illuminate\Support\Facades\Validator; //Check Validation Laravel
use App\Http\Controllers\API\APIStatusController; //Get custom status reponse 
use Illuminate\Support\Facades\Storage; //Handle File
use Illuminate\Support\Facades\DB; //Handle DB && Transaction
use Exception; //Return Msg Error 

use App\Models\Product;
use App\Models\ProductImage;


class ProductController extends APIStatusController
{   
    private $PATH_PRODUCT_IMAGE;
    public function __construct()
    {
        $this->PATH_PRODUCT_IMAGE = config('path.PRODUCT_IMAGE');

    }
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
            $product = Product::create($input);
            $product = $product->fresh(); // Fresh product table in Db
            $last_id = $product->product_id; //Just apply for Id = auto-incrementing

            //handle image product
            if ($request->hasFile('images_list')) {
                $images_list = $request->file('images_list');
                
                $folder_path = $this->PATH_PRODUCT_IMAGE.$last_id;
                Storage::makeDirectory('public/'.$folder_path); //Create folder if not exist

                foreach ($images_list as $file) {
                    $file_name = $file->getClientOriginalName();

                    $file_path = $folder_path.'/'.$file_name;

                    $file->storeAs('public/'.$folder_path, $file_name); //storePubliclyAs('public', $file_name);
                    
                    //create ImageProduct row
                    $product_image = [
                        'product_id' => $last_id,
                        'image' => $file_path,
                    ];

                    ProductImage::create($product_image);
                }
            }

            $result = ['id' => $last_id];
            //End create
            DB::commit();
            return $this->successResponse('Insert successfully created.',  $result);
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
