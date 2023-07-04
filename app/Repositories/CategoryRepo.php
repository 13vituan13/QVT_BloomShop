<?php
namespace App\Repositories;

use App\Models\Category;
use App\Interfaces\ICategory;

class CategoryRepo implements ICategory
{   
    public function getAll()
    {
        return Category::all();
    }
    public function getById($id)
    {
        return Category::where('category_id', $id)->first();
    }

    public function create(array $data)
    {
        Category::create($data);
    }

    public function update($id, array $data)
    {
        $model = Category::find($id);
        if (!$model) {
            return false;
        }

        $model->update($data);
        return $model;
    }

    public function delete($id)
    {
        $model = Category::find($id);
        if (!$model) {
            return false;
        }

        $model->delete();
        return true;
    }
}
