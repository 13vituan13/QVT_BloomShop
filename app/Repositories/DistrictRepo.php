<?php
namespace App\Repositories;

use App\Models\District;
use App\Interfaces\IDistrict;

class DistrictRepo implements IDistrict
{   
    public function getAll()
    {
        return District::all();
    }
    public function getById($id)
    {
        return District::find($id);
    }

    public function create(array $data)
    {
        District::create($data);
    }

    public function update($id, array $data)
    {
        $model = District::find($id);
        if (!$model) {
            return false;
        }

        $model->update($data);
        return $model;
    }

    public function delete($id)
    {
        $model = District::find($id);
        if (!$model) {
            return false;
        }

        $model->delete();
        return true;
    }
}
