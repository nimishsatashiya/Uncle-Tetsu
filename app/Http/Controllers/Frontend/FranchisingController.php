<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FranchisingPages;
use App\Models\FranchisingInquiry;
use Validator;
class FranchisingController extends Controller
{
   public function index()
   {
		$data = array();
      $data['franchising']=FranchisingPages::find(1);
    	return view('frontend.franchising',$data);
   }

   public function postFranchising(Request $request)
    {        
        $status = 1;
        $msg = "Thank you for your interest in franchising.";

        $validator = Validator::make($request->all(), [
            'full_name' => 'required|min:2',
            'email' => 'required|email',
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
            $is_franchising_check=FranchisingInquiry::where('email',$request->get('email'))->count();
            if($is_franchising_check==0){
                $FranchisingInquiry=new FranchisingInquiry();
                $FranchisingInquiry->name =$request->get('full_name');
                $FranchisingInquiry->email = $request->get('email');
                $FranchisingInquiry->save();
            }else{
                $status = 0;
                $msg = "Your message aleredy in our team we will let you know soon.";
            }   
        }
        return ['status' => $status, 'msg' => $msg];
    } 
   
}
