<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Interfaces\IProduct;
use App\Interfaces\ICategory;
use App\Interfaces\IStatus;
class ProductManageController extends Controller
{   
    protected $_productRepo;
    protected $_categoryRepo;
    protected $_statusRepo;
    public function __construct(IProduct $productRepo, ICategory $categoryRepo, IStatus $statusRepo)
    {
        $this->_productRepo = $productRepo;
        $this->_categoryRepo = $categoryRepo;
        $this->_statusRepo = $statusRepo;
    }
    public function product(Request $request)
    {   
        $inputs = $request->all();
        $sessionLifetime = config('session.lifetime') * 60;
        $dataView = [
            'title' => 'Danh Sách Sản Phẩm',
            'product_list' => $this->_productRepo->getList($inputs,10),
            'icon_title' => 'fa-solid fa-table-list',
        ];
        if ($request->ajax()) {
            $tableHTML = view('admin.partial.product_table', $dataView)->render();
        } else {
            return view("admin.product_list",$dataView)->with('sessionLifetime',$sessionLifetime);
        }
    }
    public function product_detail($id = null)
    {   
        $dataView = [
            'category_list' => $this->_categoryRepo->getAll(),
            'status_list' => $this->_statusRepo->getAll(),
        ];
        if ($id) { 
            // update
            $dataView['title'] = 'Cập nhật sản phẩm';
            $dataView['icon_title'] = 'fa fa-pencil-square-o';

            $products = $this->_productRepo->getById($id);
            $dataView['products'] = $products;
        } else { 
            // create
            $dataView['title'] = 'Thêm Sản Phẩm';
            $dataView['icon_title'] = 'fa-solid fa-plus';
        }
        return view("admin.product_detail", $dataView);
    }

    
}

