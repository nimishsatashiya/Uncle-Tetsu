<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Validator;
use DataTables;
use App\Models\User;
use App\Models\UserType;
use App\Models\AdminAction;

class EmailSmaTextController extends Controller
{
    public function __construct() {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$INBOX);
        
        if($checkrights) 
        {
            return $checkrights;
        }
        return view("admin.email_sms.inbox"); 
    }

    public function inboxCompose(Request $request){
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$COMPOSE);
        
        if($checkrights) 
        {
            return $checkrights;
        }
        return view("admin.email_sms.app_inbox_compose");
    }
    public function AppInbox(){
        return view("admin.email_sms.app_inbox_inbox");
    }
    public function AppView(){
        return view("admin.email_sms.app_inbox_view");
    }
    public function AppReplay(){
        return view("admin.email_sms.app_inbox_reply");
    }

}
