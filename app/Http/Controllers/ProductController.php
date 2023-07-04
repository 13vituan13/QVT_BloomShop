<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Interfaces\ICategory;
use App\Interfaces\IProduct;
class ProductController extends Controller
{
    protected $_categoryRepo;
    protected $_productRepo; 
    public function __construct(ICategory $categoryRepo, IProduct $productRepo)
    {
        $this->_categoryRepo = $categoryRepo;
        $this->_productRepo = $productRepo;
    }
    public function index(Request $request)
    {
        $input = $request->all();
        $category_id = isset($input['category_id']) ? $input['category_id'] : null;
        $sr_price = isset($input['price']) ? $input['price'] : null;
        $sr_product_name = isset($input['product_name']) ? $input['product_name'] : null;
        $category = $this->_categoryRepo->getById($category_id); 
        $product_list = $this->_productRepo->getList($input,6);
        $data = [
            'product_list' => $product_list,
            'category'    => $category,
            'sr_price' => $sr_price,
            'sr_product_name' => $sr_product_name,
        ];
        return view("user.product",$data);
    }

    public function product_detail($id)
    {   
        $product_detail = $this->_productRepo->getById($id);

        return view("user.product_detail",['product_detail' => $product_detail]);
    }
}
