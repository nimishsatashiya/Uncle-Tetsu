<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OurPhilosophy;

class OurPhilosophyController extends Controller
{
   public function index()
   {
		$data = array();
      $data['philosophy']=OurPhilosophy::find(1);
    	return view('frontend.our-philosophy',$data);
   }
   
}
