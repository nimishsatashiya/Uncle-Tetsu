<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\WhoUncleTetsu;
use App\Models\OurPhilosophy;
use App\Models\FranchisingPages;
use App\Models\Products;
use App\Models\Blogs;
use App\Models\Newslatter;
use Validator;

class CkeditorController extends Controller
{
   public function index()
   {
	  $data = array();
      $data['banners']=Banner::getBannerList();
      $data['who_uncle']=WhoUncleTetsu::find(1);
      $data['philosophy']=OurPhilosophy::find(1);
      $data['franchising']=FranchisingPages::find(1);
      $data['product_imgs']=Products::getProductList();
      $data['blogs']=Blogs::getBlogsList();
      return view('frontend.homepage',$data);
   }

   /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
        
            $request->file('upload')->move(public_path('images'), $fileName);
   
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName); 
            $msg = 'Image uploaded successfully'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    } 
}
