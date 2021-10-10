<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrokerUser extends Model
{
    public $table = TBL_BROKER_USERS;
    public $timestamps = true;
    protected $fillable = ['broker_id,user_id'];
}
