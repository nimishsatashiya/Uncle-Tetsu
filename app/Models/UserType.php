<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    public $table = TBL_USER_TYPES;
    public $timestamps = true;
    protected $fillable = ['title'];

    public function userType()
    {
        return $this->belongsTo('App\Models\UserType', 'id');
    }
}
