<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GlobalInquiry;
use Validator;

class GlobalContactController extends Controller
{
   public function index()
   {
		$data = array();
    	return view('frontend.global-contact',$data);
   }

    public function postContact(Request $request)
    {        
        $status = 1;
        $msg = "Thank you for your inquiry.";

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2',
            'email' => 'required|email',
            'message' => 'required|min:2',
            'privacy_policy' => 'required',
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
                $GlobalInquiry=new GlobalInquiry();
                $GlobalInquiry->name =$request->get('name');
                $GlobalInquiry->email =$request->get('email');
                $GlobalInquiry->message =$request->get('message');
                $GlobalInquiry->save();   
        }
        return ['status' => $status, 'msg' => $msg];
    } 
   
}
