<?php
namespace App\Repositories;

use App\Models\StatusOrder;
use App\Interfaces\IStatusOrder;

class StatusOrderRepo implements IStatusOrder
{   
    public function getAll()
    {
        return StatusOrder::all();
    }
    public function getById($id)
    {
        return StatusOrder::find($id);
    }

    public function create(array $data)
    {
        StatusOrder::create($data);
    }

    public function update($id, array $data)
    {
        $model = StatusOrder::find($id);
        if (!$model) {
            return false;
        }

        $model->update($data);
        return $model;
    }

    public function delete($id)
    {
        $model = StatusOrder::find($id);
        if (!$model) {
            return false;
        }

        $model->delete();
        return true;
    }
}
