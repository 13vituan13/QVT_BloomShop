<?php
namespace App\Repositories;

use App\Models\Ward;
use App\Interfaces\IWard;

class WardRepo implements IWard
{   
    public function getAll()
    {
        return Ward::all();
    }
    public function getById($id)
    {
        return Ward::find($id);
    }

    public function create(array $data)
    {
        Ward::create($data);
    }

    public function update($id, array $data)
    {
        $model = Ward::find($id);
        if (!$model) {
            return false;
        }

        $model->update($data);
        return $model;
    }

    public function delete($id)
    {
        $model = Ward::find($id);
        if (!$model) {
            return false;
        }

        $model->delete();
        return true;
    }
}
