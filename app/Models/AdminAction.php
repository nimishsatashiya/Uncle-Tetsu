<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminAction extends Model
{
    public $timestamps = false;
    protected $table = TBL_ADMIN_ACTION;

    protected $keyType = 'integer';	

    protected $fillable = ['description', 'remark','id'];

    public $ADMIN_LOGIN = 1;
    public $ADMIN_LOGOUT = 2;

    public $ADD_ADMIN_MODULES = 3;
    public $EDIT_ADMIN_MODULES = 4;
    public $DELETE_ADMIN_MODULES = 5;
        
    public $ADD_ADMIN_MODULES_PAGES = 6;
    public $EDIT_ADMIN_MODULES_PAGES = 7;
    public $DETELE_ADMIN_MODULES_PAGES = 8;

    public $ADD_ADMIN_ACTION = 9;
    public $EDIT_ADMIN_ACTION = 10;
    public $DELETE_ADMIN_ACTION = 11;

    public $UPDATE_RIGHTS = 12;

    public $ADD_USER_TYPE = 13;
    public $EDIT_USER_TYPE = 14;
    public $DELETE_USER_TYPE = 15;

    public $ADD_USERS = 16;      
    public $EDIT_USERS = 17; 
    public $DELETE_USERS = 18;

    public $UPDATE_CHANGE_PASSWORD = 21;
    public $UPDATE_PROFILE = 22;

    public $ADD_PROPERTIES = 23;
    public $EDIT_PROPERTIES = 24;
    public $DELETE_PROPERTIES = 25;


    public $ADD_TASK = 27;
    public $EDIT_TASK = 28;
    public $DELETE_TASK = 29;
    public $CHANGE_TASK_STATUS = 30;

    public $ADD_ADMIN_MODULE_TITLE = 31;
    public $EDIT_ADMIN_MODULE_TITLE = 32;
    public $DELETE_ADMIN_MODULE_TITLE = 33;

    
}
