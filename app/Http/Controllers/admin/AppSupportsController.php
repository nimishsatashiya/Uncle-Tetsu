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

class AppSupportsController extends Controller
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
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$NEW_SUPPORT_TICKET);
        
        if($checkrights) 
        {
            return $checkrights;
        }
        
        return view("admin.support_ticket.new_ticket"); 
    }

    public function replayTicket(Request $request){
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$REPLAY_SUPPORT_TICKET);
        
        if($checkrights) 
        {
            return $checkrights;
        }
        return view("admin.support_ticket.replay_ticket");
    }
    public function supportTicket(Request $request){
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$SUPPORT_TICKET_HISTORY);
        
        if($checkrights) 
        {
            return $checkrights;
        }
        return view("admin.support_ticket.replay_ticket");
    }
}
