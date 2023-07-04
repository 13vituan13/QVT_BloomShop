<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Interfaces\IVipMember;
use Illuminate\Http\Request;

use App\Interfaces\ICity;
use App\Interfaces\IDistrict;
use App\Interfaces\ICustomer;
class CustomerManageController extends Controller
{   
    protected $_cityRepo; 
    protected $_districtRepo;
    protected $_customerRepo;
    protected $_vipmemberRepo;
    public function __construct(
        ICity $cityRepo,
        IDistrict $districtRepo,
        ICustomer $customerRepo,
        IVipMember $vipmemberRepo
    )
    {
        $this->_cityRepo = $cityRepo;
        $this->_districtRepo = $districtRepo;
        $this->_customerRepo = $customerRepo;
        $this->_vipmemberRepo = $vipmemberRepo;
    }
    public function customer(Request $request)
    {   
        $inputs = $request->all();
        $dataView = [
            'title' => 'Danh Sách Khách Hàng',
            'customer_list' => $this->_customerRepo->getList($inputs,10),
            'icon_title' => 'fa-solid fa-table-list',
            'citys_list' => $this->_cityRepo->getAll(),
            'districts_list' => $this->_districtRepo->getAll(),
            'vip_member_list' => $this->_vipmemberRepo->getAll(),
        ];
        return view("admin.customer_list",$dataView);
    }

    public function ajaxCustomerById(Request $request)
    {   
        $inputs = $request->all();
        $id = $inputs['id'];
        $result = $this->_customerRepo->getById($id);
        return response()->json(['result' => $result], 200);
    }
}

