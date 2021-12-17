<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StoreLocation;

class StoreLocationController extends Controller
{
   public function index()
   {
		$data = array();
      $data['store_pages']=StoreLocation::find(1);
 	return view('frontend.store-location',$data);
   }
   
}
