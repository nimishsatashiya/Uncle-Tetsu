<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Stores extends Model
{    
    public $table = TBL_STORE_LOCATION;
	public $timestamps = false;
	protected $fillable = [];	
}
