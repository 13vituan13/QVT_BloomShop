<?php
namespace App\Repositories;

use App\Models\Banner;
use App\Interfaces\IBanner;

class BannerRepo implements IBanner
{   
    public function getAll()
    {
        return Banner::all();
    }
    public function getById($id)
    {
        return Banner::find($id);
    }

    public function create(array $data)
    {
        Banner::create($data);
    }

    public function update($id, array $data)
    {
        $model = Banner::find($id);
        if (!$model) {
            return false;
        }

        $model->update($data);
        return $model;
    }

    public function delete($id)
    {
        $model = Banner::find($id);
        if (!$model) {
            return false;
        }

        $model->delete();
        return true;
    }
}
