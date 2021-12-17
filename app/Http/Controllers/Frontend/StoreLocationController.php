<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StoreLocation;
use App\Models\Stores;

class StoreLocationController extends Controller
{
   public function index()
   {
		$data = array();
      $data['store_pages']=StoreLocation::find(1);

      $data['store_list']=Stores::select(TBL_STORE_LOCATION.'.*',TBL_COUNTRIES.'.country_name')
                ->leftJoin(TBL_COUNTRIES,TBL_COUNTRIES.".id","=",TBL_STORE_LOCATION.".country_id")
                ->get();
 	   return view('frontend.store-location',$data);
   }
   
}
