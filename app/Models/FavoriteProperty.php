<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Session;

class FavoriteProperty extends Authenticatable
{
    protected $table = TBL_FAVORITE_PROPERTY;

    protected $fillable = ['user_id','property_id','user_ip'];

    public static function storeFavirotProperty($prtIdArr){
        foreach ($prtIdArr as $value) {
            $fav = new FavoriteProperty();
            $fav->user_id= \Auth::user()->id;
            $fav->property_id= $value;
            $fav->save();
        }
    }
}
