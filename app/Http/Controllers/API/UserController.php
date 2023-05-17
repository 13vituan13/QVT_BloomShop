<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request; //using Request Laravel
use Illuminate\Support\Facades\Validator; //Check Validation Laravel
use App\Http\Controllers\API\APIStatusController; //Get custom status reponse 
use Illuminate\Support\Facades\Storage; //Handle File
use Illuminate\Support\Facades\DB; //Handle DB && Transaction
use Exception; //Return Msg Error 
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\RoleUser;

class UserController extends APIStatusController
{   
    private $PATH_USER_IMAGE;
    public function __construct()
    {
        $this->PATH_USER_IMAGE = config('path.USER_IMAGE');

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
            $user = User::create($input);
            $user = $user->fresh(); // Fresh product table in Db
            $last_id = $user->id; //Just apply for Id = auto-incrementing
            $data_role_user = [
                'role_id' => $input['role_id'],
                'user_id' => $last_id
            ];
            RoleUser::create($data_role_user);
            $result = [
                'user_id' => $last_id,
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
        $id = $input['id'];

        //Start create
        DB::beginTransaction();
        try {
            $user = User::find($id);
            $user->name = $input['name'];
            $user->email = $input['email'];
            $user->password = $input['password'];
            $user->updated_at = now();
            $user->save();
            RoleUser::where('user_id',$id)->delete();

            $data_role_user = [
                'role_id' => $input['role_id'],
                'user_id' => $id
            ];
            RoleUser::create($data_role_user);
            $result = [
                'user_id' => $id,
            ];       
            //End create
            DB::commit();
            return $this->successResponse('Update successfully created.',  $result);
        } catch (Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }

    public function remove(Request $request)
    {   
        $input = $request->all();
        $id = $input['id'];

    	$user = User::where('id',$id);

        if (is_null($user)) {
            return $this->errorResponse('User does not exist.');
        }

        $user->delete();

        return $this->successResponse('User successfully deleted.');
    }
}
