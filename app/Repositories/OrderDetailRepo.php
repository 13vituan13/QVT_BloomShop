<?php
namespace App\Repositories;

use App\Models\OrderDetail;
use App\Interfaces\IOrderDetail;

class OrderDetailRepo implements IOrderDetail
{   
    public function getAll()
    {
        return OrderDetail::all();
    }
    public function getById($id)
    {
        return OrderDetail::with('product')->where('order_id', $id)->get();
    }

    public function create(array $data)
    {
        OrderDetail::create($data);
    }

    public function update($id, array $data)
    {
        $model = OrderDetail::find($id);
        if (!$model) {
            return false;
        }

        $model->update($data);
        return $model;
    }

    public function delete($id)
    {
        $model = OrderDetail::find($id);
        if (!$model) {
            return false;
        }

        $model->delete();
        return true;
    }
}