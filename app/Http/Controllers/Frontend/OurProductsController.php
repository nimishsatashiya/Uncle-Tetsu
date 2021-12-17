<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductsPage;
use App\Models\Products;
use App\Models\Categories;

class OurProductsController extends Controller
{
   public function index()
   {
		$data = array();
      $data['products_content']=ProductsPage::find(1);
      $data['product_cat']=Categories::getProductCategoryList();
      $data['product_imgs']=Products::getProductList();
      $data['product_list']=Products::getProductWithCatList();
    	return view('frontend.our-products',$data);
   }

   public function loadProductsImage(Request $request)
   {
      $category_id=$request->get('category_id');
      $status=0;
      $category_name="";
      if($category_id>0){
         $categories=Categories::find($category_id);
         $data['product_imgs']=Products::getProductImgByCat($category_id);
         $view = view('frontend.products_img_slider',$data)->render();
         $status=1;
         $category_name=$categories->category_name;
      }
      return response()->json(['status'=>$status,'html'=>$view,'category_name'=>$category_name]);
   }
   
}
