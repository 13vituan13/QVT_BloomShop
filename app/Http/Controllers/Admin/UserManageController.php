<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Interfaces\IUser;

class UserManageController extends Controller
{   
    protected $_userRepo;
    public function __construct(IUser $userRepo)
    {
        $this->_userRepo = $userRepo;
    }
    //User List Page
    public function user(Request $request)
    {   
        $inputs = $request->all();
        $dataView = [
            'title' => 'Danh Sách Nhân Viên',
            'user_list' => $this->_userRepo->getList($inputs,10),
            'icon_title' => 'fa-solid fa-table-list',
        ];
        return view("admin.user_list",$dataView);

    }
    public function ajaxUserById(Request $request)
    {   
        $inputs = $request->all();
        $id = $inputs['id'];
        $result = $this->_userRepo->getById($id);
        return response()->json(['result' => $result], 200);
    }
}

