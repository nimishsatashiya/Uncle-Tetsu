<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GlobalContactController extends Controller
{
   public function index()
   {
		$data = array();
    	return view('frontend.global-contact',$data);
   }
   
}
