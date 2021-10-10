<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Task extends Model
{    
    public $table = TBL_TASKS;
	public $timestamps = true;
	protected $fillable = ['title','description'];	
}
