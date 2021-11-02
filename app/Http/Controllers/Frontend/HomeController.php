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

class HomeController extends Controller
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

    public function postNewslatter(Request $request)
    {        
        $status = 1;
        $msg = "You've successfully subscribed to our newslatter.";

        $validator = Validator::make($request->all(), [
            'full_name' => 'required|min:4',
            'email' => 'required|email',
            'is_privacy_check' => 'required',
        ]);        
        
        if ($validator->fails()) 
        {
            $messages = $validator->messages();
            
            $status = 0;
            $msg = "";
            
            foreach ($messages->all() as $message) 
            {
                $msg .= $message . "<br />";
            }            
        }
        else
        {   
            $is_news_check=Newslatter::where('email',$request->get('email'))->count();
            if($is_news_check==0){
                $newslatter=new Newslatter();
                $newslatter->name =$request->get('full_name');
                $newslatter->email = $request->get('email');
                $newslatter->save();
            }else{
                $status = 0;
                $msg = "Your email aleredy subscribed to our newslatter.";
            }   
        }
        return ['status' => $status, 'msg' => $msg];
    } 
   
}
