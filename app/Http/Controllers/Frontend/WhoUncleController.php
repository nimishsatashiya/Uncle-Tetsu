<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WhoUncleTetsu;

class WhoUncleController extends Controller
{
   public function index()
   {
		$data = array();
      $data['who_uncle']=WhoUncleTetsu::find(1);
    	return view('frontend.who-uncle',$data);
   }
   
}
