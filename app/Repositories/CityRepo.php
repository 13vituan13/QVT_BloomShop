<?php
namespace App\Repositories;

use App\Models\City;
use App\Interfaces\ICity;

class CityRepo implements ICity
{   
    public function getAll()
    {
        return City::all();
    }
    public function getById($id)
    {
        return City::find($id);
    }

    public function create(array $data)
    {
        City::create($data);
    }

    public function update($id, array $data)
    {
        $model = City::find($id);
        if (!$model) {
            return false;
        }

        $model->update($data);
        return $model;
    }

    public function delete($id)
    {
        $model = City::find($id);
        if (!$model) {
            return false;
        }

        $model->delete();
        return true;
    }
}
