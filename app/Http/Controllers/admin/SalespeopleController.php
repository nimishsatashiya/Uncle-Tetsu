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
use App\Models\BrokerUser;

class SalespeopleController extends Controller
{
    public function __construct() {

        $this->moduleRouteText = "salespeople";
        $this->moduleViewName = "admin.salespeople";
        $this->list_url = route($this->moduleRouteText.".index");        
        $module = "Salespeople";
        $this->module = $module;

        $this->adminAction= new AdminAction;

        $this->modelObj = new User();  

        $this->addMsg = $module . " has been added successfully!";
        $this->updateMsg = $module . " has been updated successfully!";
        $this->deleteMsg = $module . " has been deleted successfully!";
        $this->deleteErrorMsg = $module . " can not deleted!";       

        view()->share("list_url", $this->list_url);        
        view()->share("moduleRouteText", $this->moduleRouteText);
        view()->share("moduleViewName", $this->moduleViewName);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        $user_typeId=\Auth::user()->user_type_id;
        if($user_typeId==BROKER_PARTENER){
            $ADD_EDIT_MEMBER=\App\Models\Admin::$MY_SALESPEOPLE;
        }else{
            $ADD_EDIT_MEMBER=\App\Models\Admin::$ADD_EDIT_MEMBER;
        }
        $checkrights = \App\Models\Admin::checkPermission($ADD_EDIT_MEMBER);
        
        if($checkrights) 
        {
            return $checkrights;
        }

        $data = array();
        $data['page_title'] = "Manage My Salespeople"; 
        $data['add_url'] = route($this->moduleRouteText.'.create');
        $data['btnAdd'] = \App\Models\Admin::isAccess($ADD_EDIT_MEMBER);
        $data["user_types"] = UserType::where('id','!=',DEV_ADMIN)->where('id','!=',SUPER_ADMIN_USER)->pluck('title','id')->all();

        return view($this->moduleViewName.".index", $data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_typeId=\Auth::user()->user_type_id;
        if($user_typeId==BROKER_PARTENER){
            $ADD_EDIT_MEMBER=\App\Models\Admin::$MY_SALESPEOPLE;
        }else{
            $ADD_EDIT_MEMBER=\App\Models\Admin::$ADD_EDIT_MEMBER;
        }
        $checkrights = \App\Models\Admin::checkPermission($ADD_EDIT_MEMBER);
        
        if($checkrights) 
        {
            return $checkrights;
        }
        $data = array();
        $data['formObj'] = $this->modelObj;
        $data['page_title'] = "Add User Profile";
        $data['action_url'] = $this->moduleRouteText.".store";
        $data['action_params'] = 0;
        $data['buttonText'] = "Save";
        $data["method"] = "POST";
        $data['show_password'] = 1;
        $data["show_image"] ='';
        $data["users_type"] = UserType::where('id','!=',DEV_ADMIN)->where('id','!=',SUPER_ADMIN_USER)->pluck('title','id')->all();
        $data["userData"] = "";
        return view($this->moduleViewName.'.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_typeId=\Auth::user()->user_type_id;
        if($user_typeId==BROKER_PARTENER){
            $ADD_EDIT_MEMBER=\App\Models\Admin::$MY_SALESPEOPLE;
        }else{
            $ADD_EDIT_MEMBER=\App\Models\Admin::$ADD_EDIT_MEMBER;
        }
        $checkrights = \App\Models\Admin::checkPermission($ADD_EDIT_MEMBER);
        
        if($checkrights) 
        {
            return $checkrights;
        }
        $data = array();
        $status = 1;
        $msg = $this->addMsg;
        $goto = $this->list_url;
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|min:2',
            'lastname' => 'required|min:2',
            'email' => 'required|email|unique:'.TBL_USERS.',email',
            'new_password' => 'required|min:6',            
            'new_password_confirmation' => 'required|min:6|same:new_password',            
            'address' => 'required|min:2',            
            'phone' => 'required|max:15',
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
            $new_password = $request->get("new_password");
            $confirm_password = $request->get("new_password_confirmation");
            $firstname = $request->get("firstname");
            $lastname = $request->get("lastname");
            $email = $request->get("email");
            $phone = $request->get("phone");
            $address = $request->get("address");
            $about = $request->get("about");
            $image = $request->file("image");
            $name = $firstname." ".$lastname;

            $user_typeId=\Auth::user()->user_type_id;
            if($user_typeId==SUPER_ADMIN_USER){
                $user_type_id = $request->get("user_type_id");
            }else{
                $user_type_id=4;
            }
            
            if($confirm_password == $new_password)
            {
                $user = $this->modelObj;
                $user->user_type_id = $user_type_id;
                $user->firstname = $firstname;
                $user->lastname = $lastname;
                $user->name = $name;
                $user->email = trim($email);
                $user->password = bcrypt($new_password);
                $user->phone = $phone;
                $user->address = $address;
                $user->about = $about;
                $user->privacy_1 = $request->get("privacy_1");
                $user->privacy_2 = $request->get("privacy_2");
                $user->privacy_3 = $request->get("privacy_3");
                $user->privacy_4 = $request->get("privacy_4");
                $user->save();
                $id = $user->id;

                if(!empty($image))
                {
                    $userimg = User::where('id',$id)->first();
                    $destinationPath = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'users'.DIRECTORY_SEPARATOR.$id;
                    $image_name =$image->getClientOriginalName();              
                    $extension =$image->getClientOriginalExtension();
                    $image_name=md5($image_name);
                    $profile_image= $image_name.'.'.$extension;
                    $file =$image->move($destinationPath,$profile_image);

                    $userimg->image = $profile_image;
                    $userimg->save();   
                    $id = $userimg->id;
                }
                
                //Store broker partener
                $broker= new BrokerUser();
                $broker->broker_id=\Auth::user()->id;
                $broker->user_id=$id;
                $broker->save();

                //store logs detail
                $params = array();
                $params['adminuserid']  = \Auth::user()->id;
                $params['actionid']     = $this->adminAction->ADD_USERS;
                $params['actionvalue']  = $id;
                $params['remark']       = "Add User::".$id;

                $logs = \App\Models\AdminLog::writeadminlog($params); 
                session()->flash('success_message', $this->addMsg);
            }
            else
            {
                $status = 0;
                $msg = "Password and confirm password not matched.";
            }
        }
        return ['status' => $status, 'msg' => $msg, 'data' => $data, 'goto' => $goto];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_typeId=\Auth::user()->user_type_id;
        if($user_typeId==BROKER_PARTENER){
            $ADD_EDIT_MEMBER=\App\Models\Admin::$MY_SALESPEOPLE;
        }else{
            $ADD_EDIT_MEMBER=\App\Models\Admin::$ADD_EDIT_MEMBER;
        }
        $checkrights = \App\Models\Admin::checkPermission($ADD_EDIT_MEMBER);
        
        if($checkrights) 
        {
            return $checkrights;
        }
        $formObj = $this->modelObj::find($id);

        if(!$formObj)
        {
            abort(404);
        }

        $data = array();
        $data['formObj'] = $formObj;
        $data['page_title'] = "Edit User Profile";
        $data['buttonText'] = "Update";
        $data['action_url'] = $this->moduleRouteText.".update";
        $data['action_params'] = $formObj->id;
        $data['method'] = "PUT";
        $data["show_image"] ='1';
        $data["users_type"] = UserType::where('id','!=',DEV_ADMIN)->where('id','!=',SUPER_ADMIN_USER)->pluck('title','id')->all();
        $data["userData"] = User::where('id',$id)->first();
        return view($this->moduleViewName.'.add', $data);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_typeId=\Auth::user()->user_type_id;
        if($user_typeId==BROKER_PARTENER){
            $ADD_EDIT_MEMBER=\App\Models\Admin::$MY_SALESPEOPLE;
        }else{
            $ADD_EDIT_MEMBER=\App\Models\Admin::$ADD_EDIT_MEMBER;
        }

        $checkrights = \App\Models\Admin::checkPermission($ADD_EDIT_MEMBER);
        
        if($checkrights) 
        {
            return $checkrights;
        }

        $model = $this->modelObj->find($id);
        if(!$model)
        {
            $status = 0;
            $msg = "Record not found !";
        }
        $data = array();
        $status = 1;
        $msg = $this->updateMsg;
        $goto = $this->list_url;

        $validator = Validator::make($request->all(), [
            'firstname' => 'required|min:2',
            'lastname' => 'required|min:2',
            'email' => 'required',
            'password' => 'required|min:4',
            'new_password' => 'required|min:6|confirmed',
            'new_password_confirmation' => 'required|min:6|same:new_password',            
            'address' => 'required|min:2',            
            'phone' => 'required|max:15',
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
            $new_password = $request->get("new_password");
            $confirm_password = $request->get("new_password_confirmation");
            $firstname = $request->get("firstname");
            $lastname = $request->get("lastname");
            $email = $request->get("email");
            $phone = $request->get("phone");
            $address = $request->get("address");
            $about = $request->get("about");
            $image = $request->file("image");

            $name = $firstname." ".$lastname;
            $user_typeId=\Auth::user()->user_type_id;
            if($user_typeId==SUPER_ADMIN_USER){
                $user_type_id = $request->get("user_type_id");
            }else{
                $user_type_id=4;
            }

            if($confirm_password == $new_password)
            {
                if($request->hasFile('image'))
                {
                    if(!empty($image))
                    {
                        $destinationPath = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'users'.DIRECTORY_SEPARATOR.$id;
                
                        $image_name =$image->getClientOriginalName();              
                        $extension =$image->getClientOriginalExtension();
                        $image_name=md5($image_name);
                        $profile_image= $image_name.'.'.$extension;
                        $file =$image->move($destinationPath,$profile_image);
                        $url = public_path().'/uploads/users/'.$id.'/'.$model->image;
                        if( is_file($url)){
                            unlink($url);
                        }
                        $model->image = $profile_image;    
                    }
                }
                $model->user_type_id = $user_type_id;
                $model->firstname = $firstname;
                $model->lastname = $lastname;
                $model->name = $name;
                $model->email = trim($email);
                $model->password = bcrypt($new_password);
                $model->phone = $phone;
                $model->address = $address;
                $model->about = $about;
                $model->privacy_1 = $request->get("privacy_1");
                $model->privacy_2 = $request->get("privacy_2");
                $model->privacy_3 = $request->get("privacy_3");
                $model->privacy_4 = $request->get("privacy_4");
                $model->save();
     
                //store logs detail
                $params=array();
                $params['adminuserid']  = \Auth::user()->id;
                $params['actionid']     = $this->adminAction->ADD_EDIT_MEMBER;
                $params['actionvalue']  = $id;
                $params['remark']       = "Edit User::".$id;

                $logs=\App\Models\AdminLog::writeadminlog($params);
                session()->flash('success_message', $this->updateMsg);
            }else{
                $status = 0;
                $msg = "Password and confirm password not matched.";
            }
        }
        return ['status' => $status,'msg' => $msg, 'data' => $data, 'goto' => $goto];               
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$DELETE_USERS);
        
        if($checkrights) 
        {
            return $checkrights;
        }

        $modelObj = $this->modelObj->find($id);

        if($modelObj) 
        {
            try 
            {             
                $backUrl = $request->server('HTTP_REFERER');
                $goto = $this->list_url;
                $url = public_path().'/uploads/users/'.$id.'/'.$modelObj->image;
                if (is_file($url)) {
                    unlink($url);
                }
                $modelObj->delete();
                session()->flash('success_message', $this->deleteMsg); 

                //store logs detail
                $params=array();
                $params['adminuserid']  = \Auth::user()->id;
                $params['actionid']     = $this->adminAction->DELETE_USERS;
                $params['actionvalue']  = $id;
                $params['remark']       = "Delete User::".$id;

                $logs=\App\Models\AdminLog::writeadminlog($params);    

                return redirect($goto);
            } 
            catch (Exception $e) 
            {
                session()->flash('error_message', $this->deleteErrorMsg);
                return redirect($this->list_url);
            }
        } 
        else 
        {
            session()->flash('error_message', "Record not exists");
            return redirect($this->list_url);
        }
    }

    public function data(Request $request)
    {
        $user_typeId=\Auth::user()->user_type_id;
        if($user_typeId==BROKER_PARTENER){
            $addmember=\App\Models\Admin::$MY_SALESPEOPLE;
        }else{
            $addmember=\App\Models\Admin::$ADD_EDIT_MEMBER;
        }
        $checkrights = \App\Models\Admin::checkPermission($addmember);
        
        if($checkrights) 
        {
            return $checkrights;
        }
        $user_typeId=\Auth::user()->user_type_id;
        $userId=\Auth::user()->id;
        if($user_typeId==BROKER_PARTENER){
            $model = User::select(TBL_USERS.".*",TBL_USER_TYPES.".title as user_type")
                ->join(TBL_USER_TYPES,TBL_USERS.".user_type_id","=",TBL_USER_TYPES.".id")
                ->join(TBL_BROKER_USERS,TBL_BROKER_USERS.".user_id","=",TBL_USERS.".id")
                ->where(TBL_BROKER_USERS.".broker_id",$userId);
        }else{
            $model = User::select(TBL_USERS.".*",TBL_USER_TYPES.".title as user_type")
                ->join(TBL_USER_TYPES,TBL_USERS.".user_type_id","=",TBL_USER_TYPES.".id")
                ->where('user_type_id',"!=",DEV_ADMIN);
        }
        return DataTables::eloquent($model)

            ->addColumn('action', function($row) use ($addmember) {

                return view("admin.partials.action",
                    [
                        'currentRoute' => $this->moduleRouteText,
                        'row' => $row,
                        'isEdit' => \App\Models\Admin::isAccess($addmember),
                    ]
                )->render();
            })
            ->rawColumns(['status','action'])
            ->filter(function ($query) 
            {
                $search_start_date = request()->get("search_start_date");
                $search_end_date = request()->get("search_end_date");
                $search_id = request()->get("search_id");                                         
                $search_fnm = request()->get("search_fnm");                                         
                $search_lnm = request()->get("search_lnm");                                         
                $search_email = request()->get("search_email");
                $search_type = request()->get("search_type");

                if (!empty($search_start_date)){
                    $from_date=$search_start_date.' 00:00:00';
                    $convertFromDate= $from_date;

                    $query = $query->where(TBL_USERS.".created_at",">=",addslashes($convertFromDate));
                }
                if (!empty($search_end_date)){

                    $to_date=$search_end_date.' 23:59:59';
                    $convertToDate= $to_date;

                    $query = $query->where(TBL_USERS.".created_at","<=",addslashes($convertToDate));
                }

                if(!empty($search_id))
                {
                    $idArr = explode(',', $search_id);
                    $idArr = array_filter($idArr);                
                    if(count($idArr)>0)
                    {
                        $query = $query->whereIn(TBL_USERS.".id",$idArr);
                    } 
                } 
                if(!empty($search_fnm))
                {
                    $query = $query->where(TBL_USERS.".firstname", 'LIKE', '%'.$search_fnm.'%');
                }
                if(!empty($search_lnm))
                {
                    $query = $query->where(TBL_USERS.".lastname", 'LIKE', '%'.$search_lnm.'%');
                }
                if(!empty($search_email))
                {
                    $query = $query->where(TBL_USERS.".email", 'LIKE', '%'.$search_email.'%');
                }
                if(!empty($search_type))
                {
                    $query = $query->where(TBL_USERS.".user_type_id",$search_type);
                }
            })
            ->make(true);
    }
}
