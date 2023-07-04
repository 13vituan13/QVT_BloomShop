<?php
namespace App\Repositories;

use App\Models\Order;
use App\Interfaces\IOrder;
use Illuminate\Support\Facades\DB;

class OrderRepo implements IOrder
{   
    public function getAll()
    {
        return Order::all();
    }
    public function getById($id)
    {
        return Order::with(['order_detail', 'order_detail.product'])
        ->where('order_id', $id)
        ->first();
    }

    public function create(array $data)
    {
        Order::create($data);
    }

    public function update($id, array $data)
    {
        $model = Order::find($id);
        if (!$model) {
            return false;
        }

        $model->update($data);
        return $model;
    }

    public function delete($id)
    {
        $model = Order::find($id);
        if (!$model) {
            return false;
        }

        $model->delete();
        return true;
    }
    function getList(array $data, $pagination = null){
        $order_id = isset($data['order_id']) ? $data['order_id'] : null;
        $customer_name = isset($data['customer_name']) ? $data['customer_name'] : null;
        $customer_phone = isset($data['customer_phone']) ? $data['customer_phone'] : null;
        $status_id = isset($data['status_id']) ? $data['status_id'] : null;
    
        $res = Order::select(
            'order.order_id',
            'order.customer_phone as cusPhone',
            'order.customer_address as cusAddress',
            'order.customer_email as cusEmail',
            'order.date',
            'order.customer_name as cusName',
            'order.total_money as total',
            'order.status_id',
            DB::raw('GROUP_CONCAT(product.name SEPARATOR ", ") AS productName'),
            DB::raw('SUM(order_detail.quantity) AS quantity'),
            DB::raw('GROUP_CONCAT(order_detail.price SEPARATOR ", ") AS price'), 
            'status_order.name as statusName')
        ->leftjoin('status_order', 'status_order.status_id', '=', 'order.status_id')
        ->leftjoin('order_detail', 'order_detail.order_id', '=', 'order.order_id')
        ->leftjoin('product', 'product.product_id', '=', 'order_detail.product_id');
        if ($order_id) {
            $res->where('order.order_id', '=', $order_id);
        }
    
        if ($customer_name) {
            $res->where('order.customer_name', 'like', '%' . $customer_name . '%');
        }
    
        if ($customer_phone) {
            $res->where('order.customer_phone', 'like', '%' . $customer_phone . '%');
        }
    
        if ($status_id) {
            $res->where('order.status_id', '=', $status_id);
        }
    
        $res->groupBy('order.order_id');
        $res->orderBy('order.order_id','DESC');
        $res = !$pagination ? $res->get() : $res->paginate($pagination);
        return $res;
    }
}
