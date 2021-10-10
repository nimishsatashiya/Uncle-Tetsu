<?php

namespace App\Http\Controllers\admin;

use Validator;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class AdminLoginController extends Controller
{

	use AuthenticatesUsers;
    
    public $redirectPath = 'admin';
    public $redirectAfterLogout = 'admin/login';
    public $loginPath = 'admin/login';


	public function __construct()
  {
    $this->middleware('guest_admin', ['except' => 'getLogout']);
    $this->adminAction = new \App\Models\AdminAction;
  }

	public function getLogin()
  {         
    return view('admin.before_login.login');
  }

  public function postLogin(Request $request)
  {
    $status = 0;
    $msg = "The credential that you've entered doesn't match any account.";
    
    $validator = Validator::make($request->all(), [
        'email' => 'required', 
        'password' => 'required',            
    ]);
    
    // check validations
    if ($validator->fails()) 
    {
        $messages = $validator->messages();
        
        $status = 0;
        $msg = "";
        
        foreach ($messages->all() as $message) 
        {
            $msg .= $message . "<br />";
        }
    }
    else
    {
        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) 
        {
            $user = Auth::user();
            $status = 1;
            $msg = "Logged in successfully.";
            $user->last_login_at = \Carbon\Carbon::now();
            $user->save(); 

            // save log
            $params=array();
            $params['adminuserid']  = $user->id;
            $params['actionid'] = $this->adminAction->ADMIN_LOGIN;
            $params['actionvalue']  = $user->id;
            $params['remark']   = 'Login User';

            \App\Models\AdminLog::writeadminlog($params);
            unset($params);
            $this->saveAdminSession($user);
        }
    }
    if($request->isXmlHttpRequest())
    {
        return ['status' => $status, 'msg' => $msg];
    }
    else
    {
        if($status == 0)
        {
            session()->flash('error_message', $msg);
        }
        
        return redirect('admin/login');
    }
  }
    public function saveAdminSession($user)
    {
        $user_id = $user->user_type_id;

        $TBL_ADMIN_GROUP_TITLE = TBL_ADMIN_GROUP_TITLE;
        $ADMIN_GROUPS = TBL_ADMIN_GROUP;
        $ADMIN_GROUP_PAGES = TBL_ADMIN_GROUP_PAGE;
        $ADMIN_USER_RIGHTS = TBL_ADMIN_USER_RIGHT;
        $ADMIN_USER_ID = "user_type_id";

        $adminRightsArray = array();

        $rows = \DB::table($ADMIN_USER_RIGHTS)->where("user_type_id", $user_id)->get();

        foreach($rows as $row)
        {
           $adminRightsArray[] = $row->page_id;
        }

        unset($rows);

        $query= " SELECT ".
                  $TBL_ADMIN_GROUP_TITLE.".id AS admingrouptitleid, ".
                  $TBL_ADMIN_GROUP_TITLE.".group_title AS admingrouptitle, ".
                  $TBL_ADMIN_GROUP_TITLE.".order_index AS admingrouptitleord, ".
                  $ADMIN_GROUPS.".id AS trngroupid, ".
                  $ADMIN_GROUPS.".title AS trngrouptitle, ".
                  $ADMIN_GROUPS.".module_class AS trngroupclass, ".
                  $ADMIN_GROUPS.".url AS trngroupurl, ".
                  $ADMIN_GROUPS.".link_type AS trngrouplinktype, ".
                  $ADMIN_GROUP_PAGES.".id AS trnid, ".
                  $ADMIN_GROUP_PAGES.".name AS trnname, ".
                  $ADMIN_GROUP_PAGES.".url AS pageurl, ".
                  $ADMIN_GROUP_PAGES.".menu_title AS trntitle, ".
                  $ADMIN_GROUP_PAGES.".show_in_menu AS show_in_menu, ".                  
                  $ADMIN_GROUP_PAGES.".is_sub_menu AS insubmenu, ".
                  $ADMIN_GROUP_PAGES.".link_type AS pagelink_type ".
            " FROM ".
                  $TBL_ADMIN_GROUP_TITLE.", ".
                  $ADMIN_GROUPS.", ".
                  $ADMIN_GROUP_PAGES.", ".
                  $ADMIN_USER_RIGHTS.
            " WHERE ".
                  $TBL_ADMIN_GROUP_TITLE.".id = ".$ADMIN_GROUPS.".admin_group_titles_id".
                " AND ".
                  $ADMIN_GROUPS.".id = ".$ADMIN_GROUP_PAGES.".admin_group_id".
                " AND ".
                  $ADMIN_GROUP_PAGES.".id = ".$ADMIN_USER_RIGHTS.".page_id ".
                " AND ".
                  $ADMIN_USER_RIGHTS.".".$ADMIN_USER_ID."=".$user_id." ".
            " ORDER BY ".
                  $TBL_ADMIN_GROUP_TITLE.".order_index,".        
                  $ADMIN_GROUPS.".order_index, ".
                  $ADMIN_GROUPS.".title, ".
                  $ADMIN_GROUP_PAGES.".menu_order, ".
                  $ADMIN_GROUP_PAGES.".name";
        $rows = \DB::select($query);
        $rows = json_decode(json_encode($rows), true);                  
        
        $groupname  = "";
        $scriptdata = "";
        $groupwidth = 0;

        $rowarray = array();

        foreach($rows as $row)
        {
            $rowarray[$row["admingrouptitleid"]][$row["trnid"]] = array(
                                         "admingrouptitleid"  => $row["admingrouptitleid"],
                                         "admingrouptitle"    => $row["admingrouptitle"],
                                         "admingrouptitleord" => $row["admingrouptitleord"],
                                         "trngroupid"         => $row["trngroupid"],
                                         "trngrouptitle"      => $row["trngrouptitle"],
                                         "trngroupclass"      => $row["trngroupclass"],
                                         "trngroupurl"        => $row["trngroupurl"],
                                         "trngrouplinktype"   => $row["trngrouplinktype"],
                                         "trnid"              => $row["trnid"],
                                         "trnname"            => $row["trnname"],
                                         "pageurl"            => $row["pageurl"],
                                         "trntitle"           => $row["trntitle"],
                                         "insubmenu"          => $row["insubmenu"],
                                         "show_in_menu"       => $row["show_in_menu"],                                         
                                         "pagelink_type"      => $row["pagelink_type"],                                             
                                         );
            $rowarray[$row["admingrouptitleid"]][0] = array('title' => $row["admingrouptitle"]);
        }

       \Session::put('admin_user_rights', $rowarray);
       \Session::put('admin_user_rights_ids', $adminRightsArray);       
       \Session::save();
    }
    public function getLogout()
    {
		    $user = Auth::user();
        Auth::logout();

        // save log
        $params=array();
        $params['adminuserid']  = $user->id;
        $params['actionid'] = $this->adminAction->ADMIN_LOGOUT;
        $params['actionvalue']  = $user->id;
        $params['remark'] = 'Logout User';

        \App\Models\AdminLog::writeadminlog($params);
        unset($params);
        
        \Session::flush();
        return redirect($this->redirectAfterLogout);
    }
}
