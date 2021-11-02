<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\BlogPages;

class BlogsController extends Controller
{
   public function index()
   {
		$data = array();
      $data['blog_page']=BlogPages::find(1);
    	return view('frontend.blogs',$data);
   }

   public function blog_details($slug="")
   {
		$data = array();
      $data['blog_page']=BlogPages::find(1);
      $data['blog_details']=Blogs::where('slug',$slug)->first();
    	return view('frontend.blogs_details',$data);
   }
   
}
