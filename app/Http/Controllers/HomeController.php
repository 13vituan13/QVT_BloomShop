<?php
namespace App\Http\Controllers;

use App\Interfaces\IBanner;
use App\Interfaces\ICart;
use App\Interfaces\ICustomer;
use App\Interfaces\IProduct;

class HomeController extends Controller
{   
    protected $_bannerRepo; 
    protected $_productRepo;
    protected $_customerRepo;
    protected $_cart;

    public function __construct(
        IBanner $bannerRepo,
        ICart $cartRepo,
        ICustomer $customerRepo,
        IProduct $productRepo)
    {
        $this->_bannerRepo = $bannerRepo;
        $this->_productRepo = $productRepo;
        $this->_customerRepo = $customerRepo;
        $this->_cart = $cartRepo;
    }

    public function index()
    {   
        $banner = $this->_bannerRepo->getAll();
        $product_banner = $this->_productRepo->getBestChoiceProduct(count($banner));
        $best_choice = $this->_productRepo->getBestChoiceProduct(9);
        foreach($banner as $key => $value){
            foreach($product_banner as $k => $v){
                if($key == $k){
                    $value['product'] = $v;
                }
            }
        }
        
        $data = [
            'banners' => $banner,
            'best_choice' => $best_choice,
            'count_product' => count($this->_productRepo->getAll()),
            'count_client' => count($this->_customerRepo->getAll()),
            'cartCounter'  => $this->_cart->cartCounter()
        ];
        
        return view("user.home",$data);
    }
}
