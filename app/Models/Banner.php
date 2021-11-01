<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Banner extends Model
{    
    public $table = TBL_BANNERS;
	public $timestamps = true;
	protected $fillable = ['banner_path','display_order'];	

	public static function getBannerList()
    {
        $rows = Banner::orderBy("banners.display_order")->get(); 
        return $rows;
    }
}
