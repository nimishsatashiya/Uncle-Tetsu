<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Blogs extends Model
{    
    public $table = TBL_BLOGS;
	public $timestamps = true;
	protected $fillable = [];

	public static function getBlogsList()
    {
        $rows = Blogs::orderBy("blogs.blog_date")->get(); 
        return $rows;
    }
}
