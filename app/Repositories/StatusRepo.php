<?php
namespace App\Repositories;

use App\Models\Status;
use App\Interfaces\IStatus;

class StatusRepo implements IStatus
{   
    public function getAll()
    {
        return Status::all();
    }
    public function getById($id)
    {
        return Status::find($id);
    }

    public function create(array $data)
    {
        Status::create($data);
    }

    public function update($id, array $data)
    {
        $model = Status::find($id);
        if (!$model) {
            return false;
        }

        $model->update($data);
        return $model;
    }

    public function delete($id)
    {
        $model = Status::find($id);
        if (!$model) {
            return false;
        }

        $model->delete();
        return true;
    }
}
