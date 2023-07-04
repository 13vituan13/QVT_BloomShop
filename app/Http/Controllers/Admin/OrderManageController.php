<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\IOrder;
use App\Interfaces\IOrderDetail;
use App\Interfaces\ICustomer;
use App\Interfaces\IStatusOrder;
class OrderManageController extends Controller
{   
    protected $_orderRepo;
    protected $_orderDetailRepo;
    protected $_customerRepo;
    protected $_statusOrderRepo;
    public function __construct(IOrder $orderRepo, IOrderDetail $orderDetailRepo, ICustomer $customerRepo, IStatusOrder  $statusOrderRepo)
    {
        $this->_orderRepo = $orderRepo;
        $this->_orderDetailRepo = $orderDetailRepo;
        $this->_customerRepo = $customerRepo;
        $this->_statusOrderRepo = $statusOrderRepo;
    }
    public function order(Request $request)
    {   
        $inputs = $request->all();
        $dataView = [
            'title' => 'Danh Sách Đơn Hàng',
            'order_list' => $this->_orderRepo->getList($inputs,10),
            'icon_title' => 'fa-solid fa-table-list',
            'status_order_list' => $this->_statusOrderRepo->getAll(),
        ];
        $request->flash();

        return view("admin.order_list",$dataView);
    }
    public function order_detail($id = null)
    {   
        $dataView = [
            'customer_list' => $this->_customerRepo->getAll(),
            'status_order_list' => $this->_statusOrderRepo->getAll(),
        ];
        if ($id) { 
            // update
            $dataView['title'] = 'Cập nhật đơn hàng';
            $dataView['icon_title'] = 'fa fa-pencil-square-o';

            $order = $this->_orderRepo->getById($id);
            $dataView['order'] = $order;
        } else { 
            // create
            $dataView['title'] = 'Thêm Sản Phẩm';
            $dataView['icon_title'] = 'fa-solid fa-plus';
        }
        return view("admin.order_detail", $dataView);
    }
    public function orderDetailById(Request $request)
    {   
        $inputs = $request->all();
        $order_id = $inputs['order_id'];
        $result = $this->_orderDetailRepo->getById($order_id);
        return response()->json(['result' => $result], 200);
    }
}

