<?php
namespace App\Repositories;

use App\Models\VipMember;
use App\Interfaces\IVipMember;

class VipMemberRepo implements IVipMember
{   
    public function getAll()
    {
        return VipMember::all();
    }
    public function getById($id)
    {
        return VipMember::find($id);
    }

    public function create(array $data)
    {
        VipMember::create($data);
    }

    public function update($id, array $data)
    {
        $model = VipMember::find($id);
        if (!$model) {
            return false;
        }

        $model->update($data);
        return $model;
    }

    public function delete($id)
    {
        $model = VipMember::find($id);
        if (!$model) {
            return false;
        }

        $model->delete();
        return true;
    }
}
