<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Admin;

class Admin extends Authenticatable
{
	protected $guard = "admins";
    protected $table = 'users';
    public $timestamps = true;


    protected $fillable = ['firstname','lastname','email','user_type_id','address','phone','password'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Admin Group Pages Variable

    public static $error_msg = "You are not authorised to view this page.";
   
    public static $LIST_ADMIN_MODULES = 1;
    public static $ADD_ADMIN_MODULES = 2;
    public static $EDIT_ADMIN_MODULES = 3;
    public static $DELETE_ADMIN_MODULES = 4;

    public static $LIST_ADMIN_MODULES_PAGES = 5;
    public static $ADD_ADMIN_MODULES_PAGES = 6;
    public static $EDIT_ADMIN_MODULES_PAGES = 7;
    public static $DETELE_ADMIN_MODULES_PAGES = 8;

    public static $ASSIGN_RIGHTS = 9;

    public static $LIST_ADMIN_LOG_ACTIONS = 10;
    public static $ADD_ADMIN_LOG_ACTIONS = 11;
    public static $EDIT_ADMIN_LOG_ACTIONS = 12;
    public static $DELETE_ADMIN_LOG_ACTIONS = 13;

    public static $LIST_USER_TYPE = 14;
    public static $ADD_USER_TYPE = 15;
    public static $EDIT_USER_TYPE = 16;
    public static $DELETE_USER_TYPE = 17;

    public static $LIST_USERS = 18;
    public static $ADD_USERS = 19;      
    public static $EDIT_USERS = 20; 
    public static $DELETE_USERS = 21;

    public static $USER_LOGS = 22;

    public static $LIST_BANNER = 23;
    public static $ADD_BANNER = 24;
    public static $EDIT_BANNER = 25;
    public static $DETELE_BANNER = 26;
    
    public static $LIST_ADMIN_MODULE_TITLE = 27;
    public static $ADD_ADMIN_MODULE_TITLE = 28;
    public static $EDIT_ADMIN_MODULE_TITLE = 29;
    public static $DELETE_ADMIN_MODULE_TITLE = 30;

    public static $ADD_EDIT_MEMBER = 33;
    //Leads
    public static $LEADS = 34;
    public static $CONTACT = 35;
    
    public static $NEW_SUPPORT_TICKET = 35;
    public static $REPLAY_SUPPORT_TICKET = 35;
    public static $MY_SALESPEOPLE = 45;

    //Email/sms
    public static $COMPOSE =49;
    public static $INBOX =50;
    //Tasks
    public static $LIST_TASKS = 54;
    public static $ADD_TASKS = 75;
    public static $EDIT_TASKS = 76;
    public static $DELETE_TASKS = 77;
    public static $STATUS_CHANGE_TASKS = 78;
    public static $CALENDAR = 55;

    public static $SUPPORT_TICKET_HISTORY=69;
    public static function checkPermission($intCurAdminUserRight)
    {
        $userrights = session("admin_user_rights_ids");
        
        if(is_array($userrights) && !empty($userrights)){
            if (!in_array($intCurAdminUserRight, (array)$userrights)) {
                session()->flash('error_message',\App\Models\Admin::$error_msg);
                return redirect('admin/dashboard');
            }
        }
    }
    /**
     * check page acces permissions
     *
     * @var $page_id
     */
    public static function isAccess($page_id)
    {
        $array = session("admin_user_rights_ids");
        $status = 0;

        if(is_array($array) && in_array($page_id, $array))
        {
            $status = 1;
        }
        return $status;
    }
}
