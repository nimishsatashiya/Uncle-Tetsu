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

class UsersController extends Controller
{
    public function __construct() {

        $this->moduleRouteText = "users";
        $this->moduleViewName = "admin.users";
        $this->list_url = route($this->moduleRouteText.".index");        
        $module = "User";
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
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$LIST_USERS);
        
        if($checkrights) 
        {
            return $checkrights;
        }

        $data = array();
        $data['page_title'] = "Manage Users"; 
        $data['add_url'] = route($this->moduleRouteText.'.create');
        $data['btnAdd'] = \App\Models\Admin::isAccess(\App\Models\Admin::$ADD_USERS);
        $data["user_types"] = \App\Models\UserType::pluck('title','id')->all();

        return view($this->moduleViewName.".index", $data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$ADD_USERS);
        
        if($checkrights) 
        {
            return $checkrights;
        }
        $data = array();
        $data['formObj'] = $this->modelObj;
        $data['page_title'] = "Add ".$this->module;
        $data['action_url'] = $this->moduleRouteText.".store";
        $data['action_params'] = 0;
        $data['buttonText'] = "Save";
        $data["method"] = "POST";
        $data['show_password'] = 1;
        $data["show_image"] ='';
        $data["users_type"] = UserType::pluck('title','id')->all();

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
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$ADD_USERS);
        
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
            'password' => 'required|min:4|same:password',            
            'confirm_password' => 'required|min:4|same:password',            
            'user_type_id' => 'required|exists:'.TBL_USER_TYPES.',id',           
            'address' => 'required|min:2',            
            'phone' => 'required|max:15',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4000',
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
            $password = $request->get("password");
            $confirm_password = $request->get("confirm_password");
            $user_type_id = $request->get("user_type_id");
            $firstname = $request->get("firstname");
            $lastname = $request->get("lastname");
            $email = $request->get("email");
            $phone = $request->get("phone");
            $address = $request->get("address");
            $image = $request->file("image");
            $name = $firstname." ".$lastname;

            if($confirm_password == $password)
            {
                $user = $this->modelObj;
                $user->user_type_id = $user_type_id;
                $user->firstname = $firstname;
                $user->lastname = $lastname;
                $user->name = $name;
                $user->email = trim($email);
                $user->password = bcrypt($password);
                $user->phone = $phone;
                $user->address = $address;
                $id = $user->id;

                if(!empty($image))
                {
                    $destinationPath = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'users'.DIRECTORY_SEPARATOR.$id;
                    $image_name =$image->getClientOriginalName();              
                    $extension =$image->getClientOriginalExtension();
                    $image_name=md5($image_name);
                    $profile_image= $image_name.'.'.$extension;
                    $file =$image->move($destinationPath,$profile_image);

                    $user->image = $profile_image;
                }
                $user->save();   
                $id = $user->id;

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
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$EDIT_USERS);
        
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
        $data['page_title'] = "Edit ".$this->module;
        $data['buttonText'] = "Update";
        $data['action_url'] = $this->moduleRouteText.".update";
        $data['action_params'] = $formObj->id;
        $data['method'] = "PUT";
        $data["show_image"] ='1'; 
        $data["users_type"] = UserType::pluck('title','id')->all();

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
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$EDIT_USERS);
        
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
            'email' => 'required|email|unique:'.TBL_USERS.',email,'.$id,
            'user_type_id' => 'required|exists:'.TBL_USER_TYPES.',id',         
            'address' => 'required|min:2',            
            'phone' => 'required|max:15',
            'status' => ['required', Rule::in([0,1])],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4000',
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
            $user_type_id = $request->get("user_type_id");
            $email = $request->get("email");
            $firstname = $request->get("firstname");
            $lastname = $request->get("lastname");
            $statuss = $request->get("status");
            $phone = $request->get("phone");
            $address = $request->get("address");
            $image = $request->file("image");
            $name = $firstname." ".$lastname;

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
            $model->phone = $phone;
            $model->address = $address;
            $model->email = trim($email);
            $model->name = $name;
            $model->status = $statuss;
            $model->save();
 
            //store logs detail
            $params=array();
            $params['adminuserid']  = \Auth::user()->id;
            $params['actionid']     = $this->adminAction->EDIT_USERS;
            $params['actionvalue']  = $id;
            $params['remark']       = "Edit User::".$id;

            $logs=\App\Models\AdminLog::writeadminlog($params);
            session()->flash('success_message', $this->updateMsg);
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
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$LIST_USERS);
        
        if($checkrights) 
        {
            return $checkrights;
        }

        $model = User::select(TBL_USERS.".*",TBL_USER_TYPES.".title as user_type")
                ->join(TBL_USER_TYPES,TBL_USERS.".user_type_id","=",TBL_USER_TYPES.".id");

        return DataTables::eloquent($model)

            ->addColumn('action', function(User $row) {                

                return view("admin.partials.action",
                    [
                        'currentRoute' => $this->moduleRouteText,
                        'row' => $row,
                        'isEdit' => \App\Models\Admin::isAccess(\App\Models\Admin::$EDIT_USERS),
                        'isDelete' => \App\Models\Admin::isAccess(\App\Models\Admin::$DELETE_USERS),
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
