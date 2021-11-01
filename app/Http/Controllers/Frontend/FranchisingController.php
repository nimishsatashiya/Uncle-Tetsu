<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FranchisingPages;

class FranchisingController extends Controller
{
   public function index()
   {
		$data = array();
      $data['franchising']=FranchisingPages::find(1);
    	return view('frontend.franchising',$data);
   }
   
}
