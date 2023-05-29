<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comment;
class UserController extends Controller
{   
    public function test01(){
        $array = [3, 1, 4, 1, 5, 9, 2,6,8,7,10];
        $sortedArray = mergeSort($array);
        $result = binarySearch($sortedArray, 7);
        if ($result == -1) {
            echo "Không tìm thấy phần tử trong mảng";
        } else {
            echo "Phần tử được tìm thấy tại vị trí " . $result;
        }
        return $sortedArray;
    }
    public function home()
    {   
        $banner = getAllBanner();
        $product_banner = getBestChoiceProduct(count(getAllBanner()));
        $best_choice = getBestChoiceProduct(9);
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
            'count_product' => count(getAllProduct()),
            'count_client' => count(getAllCustomer()),
            'cartCounter'  => cartCounter()
        ];
        
        return view("user.home",$data);
    }

    public function about()
    {
        return view("user.about");
    }
    public function cart()
    {
        return view("user.cart");
    }

    public function contact()
    {
        return view("user.contact");
    }

    public function product(Request $request)
    {   
        $input = $request->all();
        $category_id = isset($input['category_id']) ? $input['category_id'] : null;
        $sr_price = isset($input['price']) ? $input['price'] : null;
        $sr_product_name = isset($input['product_name']) ? $input['product_name'] : null;
        $category = getCategoryById($category_id); 
        $data = [
            'product_list' => getProductList($input,6),
            'category'    => $category,
            'sr_price' => $sr_price,
            'sr_product_name' => $sr_product_name,
        ];
        return view("user.product",$data);
    }

    public function product_detail($id)
    {   
        $product_detail = getProductById($id);

        return view("user.product_detail",['product_detail' => $product_detail]);
    }

    public function services()
    {
        return view("user.services");
    }
    
    public function addComment(Request $request)
    {   
        $input = $request->all();
        $comment = Comment::create($input);
        return response()->json(['message' => 'successfully created.', 'comment' => $comment], 200);
    }
}
