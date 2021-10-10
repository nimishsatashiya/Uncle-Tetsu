<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Session;

class User extends Authenticatable
{
    use Notifiable, Sluggable;

    protected $table = TBL_USERS;

    protected $fillable = ['firstname','lastname','email'];


    protected $hidden = [
        'password', 'remember_token',
    ];



     public function sluggable()
    {
        return [
            'slug' => [
                'source' => array('firstname','lastname'),
                'on_update' => true
            ]
        ];
    }
}
