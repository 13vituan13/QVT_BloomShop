<?php
namespace App\Repositories;

use App\Models\Product;
use App\Interfaces\IProduct;

class ProductRepo implements IProduct
{
    public function getAll()
    {
        return Product::all();
    }
    public function getById($id)
    {
        return Product::with('category')->with('status')->with('product_image')->with('comment')->findOrFail($id);
    }

    public function create(array $data)
    {
        Product::create($data);
    }

    public function update($id, array $data)
    {
        $model = Product::find($id);
        if (!$model) {
            return false;
        }

        $model->update($data);
        return $model;
    }

    public function delete($id)
    {
        $model = Product::find($id);
        if (!$model) {
            return false;
        }

        $model->delete();
        return true;
    }
    
    public function getList(array $data, $pagination = null)
    {
        $product_id = isset($data['product_id']) ? $data['product_id'] : null;
        $product_name = isset($data['product_name']) ? $data['product_name'] : null;
        $price = isset($data['price']) ? $data['price'] : null;
        $category_id = isset($data['category_id']) ? $data['category_id'] : null;
        $inventory_number = isset($data['inventory_number']) ? $data['inventory_number'] : null;
    
        $query = Product::with('category')
            ->with('status')
            ->with('product_image')->where(function ($query) {
                $query->where('product.flg_del', '<>', 1)
                    ->orWhereNull('product.flg_del');
            });
    
        if ($product_id) {
            $query->where('product.product_id', '=', $product_id);
        }
    
        if ($product_name) {
            $query->where('product.name', 'like', '%' . $product_name . '%');
        }
    
        if ($price) {
            if($price == "1"){
                $query->where('product.price', '<', 50);
            }
    
            if($price == "2"){
                $query->whereBetween('product.price', [50, 100]);
            }
    
            if($price == "3"){
                $query->where('product.price', '>', 100);
            }
        }
    
        if ($category_id) {
            $query->where('product.category_id', '=', $category_id);
        }
    
        if ($inventory_number) {
            $query->where('product.inventory_number', '=', $inventory_number);
        }
        $query->orderBy('product_id', 'DESC');
        $res = !$pagination ? $query->get() : $query->paginate($pagination);
        return $res;
    }

    function getBestChoiceProduct($limit)
    {
        $res = Product::with('category')->with('product_image')->where(function ($query) {
            $query->where('product.flg_del', '<>', 1)
                ->orWhereNull('product.flg_del');
        })->limit($limit)
            ->get();
    
        return $res;
    }
}
