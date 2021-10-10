<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminGroup extends Model
{
    public $table = TBL_ADMIN_GROUP;
	public $timestamps = false;
	protected $fillable = ['parent_id', 'title', 'order_index','module_class','admin_group_titles_id','is_sub_menu','url','show_in_menu','link_type'];

	 public function adminGroup()
    {
        return $this->belongsTo('App\Models\AdminGroup', 'parent_id');
    }

     /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

      public function adminGroupPages()
    {
        return $this->hasMany('App\Models\AdminGroupPage');
    }
}
