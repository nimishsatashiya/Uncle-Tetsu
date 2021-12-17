<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Countries extends Model
{    
    public $table = TBL_COUNTRIES;
	public $timestamps = true;
	protected $fillable = [];	

	public static function getCountriesList()
    {
        $rows = Countries::pluck('country_name', 'id')->toArray(); 
        return $rows;
    }
}
