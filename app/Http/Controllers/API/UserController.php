<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request; //using Request Laravel
use Illuminate\Support\Facades\Validator; //Check Validation Laravel
use App\Http\Controllers\API\APIStatusController; //Get custom status reponse 
use Illuminate\Support\Facades\Storage; //Handle File
use Illuminate\Support\Facades\DB; //Handle DB && Transaction
use Exception; //Return Msg Error 

use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;

class UserController extends APIStatusController
{   
    private $PATH_USER_IMAGE;
    public function __construct()
    {
        $this->PATH_USER_IMAGE = config('path.USER_IMAGE');

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
            $user = User::create($input);
            $user = $user->fresh(); // Fresh product table in Db
            $last_id = $user->product_id; //Just apply for Id = auto-incrementing

            //handle image product
            if ($request->hasFile('images_list')) {
                $images_list = $request->file('images_list');
                
                $folder_path = $this->PATH_USER_IMAGE.$last_id;
                Storage::makeDirectory('public/'.$folder_path); //Create folder if not exist

                foreach ($images_list as $file) {
                    $file_name = uniqid().'_'.$file->getClientOriginalName();
                    $file_path = $folder_path.'/'.$file_name;

                    $file->storeAs('public/'.$folder_path, $file_name); //storePubliclyAs('public', $file_name);
                    
                    //create ImageProduct row
                    $user_image = [
                        'product_id' => $last_id,
                        'image' => $file_path,
                    ];

                    Role::create($user_image);
                }
            }
            $file_list = Role::where('product_id','=',$last_id)->get();
            $result = [
                'product_id' => $last_id,
                'file_list'  => $file_list
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
        $user_id = $input['product_id'];
        $result_validator = self::validateInput($input);

        if (!$result_validator['status']) {
            return response()->json($result_validator['msg_error'], 400);
        }

        //Start create
        DB::beginTransaction();
        try {
            $user = User::find($user_id);
            $user->name = $input['name'];
            $user->description = $input['description'];
            $user->price = $input['price'];
            $user->inventory_number = $input['inventory_number'];
            $user->category_id = $input['category_id'];
            $user->status_id = $input['status_id'];
            $user->updated_at = now();
            $user->save();

            //handle image product
            $arr_remove_image = json_decode($input['arr_remove_image']);
            if(count($arr_remove_image) > 0){
                foreach ($arr_remove_image as $remove_item) {
                    Role::where('image','=',$remove_item)->delete();
                    Storage::delete('public/'.$remove_item);
                }
            }
            if ($request->hasFile('images_list')) {
                $images_list = $request->file('images_list');

                $folder_path = $this->PATH_USER_IMAGE.$user_id;
                Storage::makeDirectory('public/'.$folder_path); //Create folder if not exist

                foreach ($images_list as $file) {
                    $file_name = uniqid().'_'.$file->getClientOriginalName();
                    $file_path = $folder_path.'/'.$file_name;

                    $file->storeAs('public/'.$folder_path, $file_name); //storePubliclyAs('public', $file_name);
                    
                    //create ImageProduct row
                    $user_image = [
                        'product_id' => $user_id,
                        'image' => $file_path,
                    ];

                    Role::create($user_image);
                }
            }
            //end handle image product
            $file_list = Role::where('product_id','=',$user_id)->get();
            $result = [
                'product_id' => $user_id,
                'file_list'  => $file_list
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
