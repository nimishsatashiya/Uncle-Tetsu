<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminGroupTitle extends Model
{
    public $table = TBL_ADMIN_GROUP_TITLE;
	public $timestamps = false;
	protected $fillable = ['group_title', 'order_index'];

	 public function adminGroupTitle()
    {
        return $this->belongsTo('App\Models\AdminGroupTitle', 'id');
    }

     /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

      public function adminGroupPages()
    {
        return $this->hasMany('App\Models\AdminGroupPage');
    }
}
