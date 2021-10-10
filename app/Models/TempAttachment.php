<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempAttachment extends Model
{    
    public $table = TBL_TEMP_ATTACHMENT;
	public $timestamps = true;
	protected $fillable = ['name'];	
}
