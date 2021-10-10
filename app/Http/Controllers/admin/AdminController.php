<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Models\Admin;
use App\Models\User;
use App\Models\UserType;
use App\Models\AdminUserRight;


class AdminController extends Controller
{
	public function __construct()
    {
        $this->adminAction = new \App\Models\AdminAction;         
    }
   	public function index()
    {   
     	$auth_id = \Auth::user()->user_type_id;
        if($auth_id == DEV_ADMIN){
            $viewName = "dashboard-dev";
        }
        if($auth_id == SUPER_ADMIN_USER)
        {
            $viewName = "dashboard-su";
        }
        if($auth_id == BROKER_PARTENER)
        {
            $viewName = "dashboard-bp";
        }
        if($auth_id == SALESPERSON)
        {
            $viewName = "dashboard";
        }
        return view('admin.'.$viewName);
    }
    public function changePassword()
    {        
        $data = array();
        return view('admin.changepwd',$data);        
    }    
    
    // post change password
    public function postChangePassword(Request $request)
    {        
        $status = 1;
        $msg = "Your password has been changed successfully.";

        $validator = Validator::make($request->all(), [
            'password' => 'required|min:4',
            'new_password' => 'required|min:4|confirmed',
            'new_password_confirmation' => 'required',
        ]);        
        
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
            $user = \Auth::user();            
            
            $old_password = $request->get('password');            
            if(Hash::check($old_password, $user->password))
            {
                $user->password = bcrypt($request->get('new_password'));
                $user->save();
                
                // save log
                $params=array();

                $params['adminuserid']  = $user->id;
                $params['actionid'] = $this->adminAction->UPDATE_CHANGE_PASSWORD;
                $params['actionvalue']  = $user->id;
                $params['remark']   = 'Change Password';

                \App\Models\AdminLog::writeadminlog($params);
                unset($params);
                session()->flash('success_message', $msg);
            }
            else
            {
                $status = 0;
                $msg = 'old password is incorrect.';
            }
        }

         return ['status' => $status, 'msg' => $msg];
    }    
    
    public function editProfile()
    {        
        $data = array();
        return view('admin.profile',$data);        
    }    
    
    public function updateProfile(Request $request)
    {        
        $status = 1;
        $msg = "Your profile has been updated successfully.";
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:'.TBL_USERS.',email,'.\Auth::user()->id,
            'firstname' => 'required|min:2|max:255',
            'lastname' => 'required|min:2|max:255',
            'address' => 'required|min:2',
            'phone' => 'required|numeric',
        ]);        
        
        
        if($validator->fails())
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
            $user = \Auth::user();            
            $user_id = \Auth::user()->id;            
            $image = $request->file("image");
            $email = $request->get("email");
            $firstname = $request->get("firstname");
            $lastname = $request->get("lastname");
            $image = $request->file("image");
            $name = $firstname." ".$lastname;
            
            $user->firstname = $firstname;
            $user->lastname = $lastname;
            $user->phone = $request->get("phone");
            $user->interests = $request->get("interests");
            $user->occupation = $request->get("occupation");
            $user->address = $request->get("address");
            $user->website_url = $request->get("website_url");
            $user->email = $email;
            $user->name = $name;
            $user->status = $status;
            $user->save();
            
            // save log
            $params=array();

            $params['adminuserid']  = $user->id;
            $params['actionid'] = $this->adminAction->UPDATE_PROFILE;
            $params['actionvalue']  = $user->id;
            $params['remark']   = 'Update Profile';

            \App\Models\AdminLog::writeadminlog($params);
            unset($params);
            session()->flash('success_message', $msg);
            
        }

        return ['status' => $status, 'msg' => $msg];
    }
    public function updateProfileAvatar(Request $request){
        ini_set('upload_max_filesize', 4000000);
        $status = 1;
        $msg = "Your profile has been updated successfully.";
        
        $imgSize = '';  
        $image = $request->file("image");            
        if($image){

            $imgSize = $image->getClientSize();
            
            if($imgSize > 2000000 || $imgSize == 0){
                return ['status' => 0, 'msg' => 'The image may not be greater than 2 MB.'];
            }
        }
        
        $validator = Validator::make($request->all(), [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4000',
        ]);        
        
        
        if($validator->fails())
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
            $user = \Auth::user();            
            $user_id = \Auth::user()->id;            
            $image = $request->file("image");
            
            if($request->hasFile('image'))
            {
                if(!empty($image)){
                    $destinationPath = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'users'.DIRECTORY_SEPARATOR.$user_id;                    
                    $image_name =$image->getClientOriginalName();              
                    $extension =$image->getClientOriginalExtension();
                    $image_name=md5($image_name);
                    $profile_image= $image_name.'.'.$extension;
                    $file =$image->move($destinationPath,$profile_image);                    
                    $url = public_path().'/uploads/users/'.$user_id.'/'.$user->image;
                    if( is_file($url)){
                        unlink($url);
                    }
                    $user->image  = $profile_image;            
                    $user->save();
                }
                // save log
                $params=array();

                $params['adminuserid']  = $user->id;
                $params['actionid'] = $this->adminAction->UPDATE_PROFILE;
                $params['actionvalue']  = $user->id;
                $params['remark']   = 'Update Profile';

                \App\Models\AdminLog::writeadminlog($params);
                unset($params);
                session()->flash('success_message', $msg);
            }            
        }

        return ['status' => $status, 'msg' => $msg];
    }
    public function updateProfilePrivacy(Request $request){

        $status = 1;
        $msg = "Your profile has been updated successfully.";
        
        $user = \Auth::user();            
        $user_id = \Auth::user()->id;            
        
        
        $user->privacy_1 = $request->get("privacy_1");
        $user->privacy_2 = $request->get("privacy_2");
        $user->privacy_3 = $request->get("privacy_3");
        $user->privacy_4 = $request->get("privacy_4");
        $user->save();
        
        // save log
        $params=array();

        $params['adminuserid']  = $user->id;
        $params['actionid'] = $this->adminAction->UPDATE_PROFILE;
        $params['actionvalue']  = $user->id;
        $params['remark']   = 'Update Profile';

        \App\Models\AdminLog::writeadminlog($params);
        unset($params);
        session()->flash('success_message', $msg);
            

        return ['status' => $status, 'msg' => $msg];

    }
    // Rights
    public function rights(Request $request)
    {
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$ASSIGN_RIGHTS);
        
        if($checkrights) 
        {
            return $checkrights;
        }

        $type_id = $request->get("type_id");

        if($request->isXmlHttpRequest() && $request->get("action") == "update")
        {
            $status = 1;
            $msg = "Rights has been updated successfully.";

            if(intval($type_id) > 0)
            {
                $ids = $request->get("ids");
                
                // Delete old Roles
                \DB::table(TBL_ADMIN_USER_RIGHT)->where("user_type_id", $type_id)->delete();

                if(is_array($ids) && count($ids) > 0)
                {
                    foreach($ids as $page_id)
                    {
                        $dataToInsert = [
                            'user_type_id' => $type_id,
                            'page_id' => $page_id
                        ];

                        \DB::table(TBL_ADMIN_USER_RIGHT)->insert($dataToInsert);

                        unset($dataToInsert);
                    }
                }
                $adminAction = new \App\Models\adminAction();
                //store logs detail
                $params=array();                                            
                $params['adminuserid']  = \Auth::user()->id;
                $params['actionid']     = $adminAction->UPDATE_RIGHTS;
                $params['actionvalue']  = $type_id;
                $params['remark']       = "Update Rights ::".$type_id;
                \App\Models\AdminLog::writeadminlog($params);
            }
            else
            {
                $status = 0;
                $msg = "Please select user type.";
            }

            return ['status' => $status, 'msg' => $msg];
        }

        $data = array();
        $data['roles'] = UserType::get();
        $data['ids_selected'] = array();

        if(intval($type_id) > 0)
        {
            $temp = AdminUserRight::where("user_type_id",$type_id)->get();
            foreach($temp as $r)
            {
                $data['ids_selected'][] = $r->page_id;
            }    
        }

        $TBL_ADMIN_GROUP_TITLE = TBL_ADMIN_GROUP_TITLE;
        $ADMIN_GROUPS = TBL_ADMIN_GROUP;
        $ADMIN_GROUP_PAGES = TBL_ADMIN_GROUP_PAGE;
        
        $query= " SELECT ".
                  $TBL_ADMIN_GROUP_TITLE.".id AS admingrouptitleid, ".
                  $TBL_ADMIN_GROUP_TITLE.".group_title AS admingrouptitle, ".
                  $TBL_ADMIN_GROUP_TITLE.".order_index AS admingrouptitleord, ".
                  $ADMIN_GROUPS.".id AS trngroupid, ".
                  $ADMIN_GROUPS.".title AS trngrouptitle, ".
                  $ADMIN_GROUPS.".module_class AS trngroupclass, ".
                  $ADMIN_GROUPS.".url AS trngroupurl, ".
                  $ADMIN_GROUP_PAGES.".id AS trnid, ".
                  $ADMIN_GROUP_PAGES.".name AS trnname, ".
                  $ADMIN_GROUP_PAGES.".url AS pageurl, ".
                  $ADMIN_GROUP_PAGES.".menu_title AS trntitle, ".
                  $ADMIN_GROUP_PAGES.".show_in_menu AS show_in_menu, ".                  
                  $ADMIN_GROUP_PAGES.".is_sub_menu AS insubmenu ".
            " FROM ".
                  $TBL_ADMIN_GROUP_TITLE." ".
                  // $ADMIN_GROUPS.", ".
                  // $ADMIN_GROUP_PAGES." ".
            "LEFT JOIN ".$ADMIN_GROUPS." ON (".$ADMIN_GROUPS.".admin_group_titles_id = admin_group_titles.id)".
            "LEFT JOIN ".$ADMIN_GROUP_PAGES." ON (".$ADMIN_GROUP_PAGES.".admin_group_id = ".$ADMIN_GROUPS.".id)".
            " WHERE ".
                  $ADMIN_GROUPS.".show_in_menu='Y'".
                " OR ".
                  $ADMIN_GROUPS.".id = ".$ADMIN_GROUP_PAGES.".admin_group_id".
            " ORDER BY ".
                  $ADMIN_GROUPS.".order_index, ".
                  $ADMIN_GROUPS.".title, ".
                  $ADMIN_GROUP_PAGES.".menu_order, ".
                  $ADMIN_GROUP_PAGES.".name";

        $rows = \DB::select($query);
        $rows = json_decode(json_encode($rows), true);
        $data['rows'] = $rows;

        return view('admin.rights',$data);
    }
    
}
