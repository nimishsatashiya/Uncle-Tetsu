<?php

namespace App\Http\Controllers\admin;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Validator;
use DataTables;
use App\Models\User;
use App\Models\UserType;
use App\Models\AdminAction;
use App\Models\Blogs;


class BlogController extends Controller
{
    public function __construct() {

        $this->moduleRouteText = "blog";
        $this->moduleViewName = "admin.blog";
        $this->list_url = route($this->moduleRouteText.".index");        
        $module = "Blog";
        $this->module = $module;
        $this->adminAction= new AdminAction;
        $this->modelObj = new Blogs();
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
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$LIST_BANNER);
        if($checkrights) 
        {
            return $checkrights;
        }
        $data = array();
        $data['page_title'] = "Blog";
        $data['add_url'] = route($this->moduleRouteText.'.create');
        $data['add_btn_ttl'] = route($this->moduleRouteText.'.create');
        $data['btnAdd'] = \App\Models\Admin::isAccess(\App\Models\Admin::$ADD_BANNER);
        return view($this->moduleViewName.".index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$ADD_BANNER);
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
        
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$ADD_BANNER);
        
        if($checkrights) 
        {
            return $checkrights;
        }    
        $data = array();        
        $status = 1;
        $msg = $this->addMsg;
        $goto = $this->list_url;
        

        $validator = Validator::make($request->all(), [            
            'home_img' => 'required',
            'home_img_1' => 'required',
            'home_img_2' => 'required',
            'home_text' => 'required',
            'main_title' => 'required',
            'title' => 'required',
            'blog_date' => 'required',
            'description' => 'required',
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
            
            $main_title = $request->get("main_title");
            $title = $request->get("title");
            $home_img = $request->file("home_img");
            $home_img_1 = $request->file("home_img_1");
            $home_img_2 = $request->file("home_img_2");
            $home_text = $request->get("home_text");
            $blog_date = $request->get("blog_date");
            $description = $request->get("description");
            $delimiter="-";
            $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $title))))), $delimiter));
            
            if($home_img)
            {
                $path = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'blog';
                if (!file_exists($path)){
                    mkdir($path, 0777, true);
                }

                $originalFile = $home_img->getClientOriginalName();
                $home_img_filename=date('YmdHis').$originalFile;
                $home_img->move($path, $home_img_filename);
            }
            if($home_img_1)
            {
                $path = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'blog';
                if (!file_exists($path)){
                    mkdir($path, 0777, true);
                }

                $originalFile = $home_img_1->getClientOriginalName();
                $home_img_1_filename=date('YmdHis').'1'.$originalFile;
                $home_img_1->move($path, $home_img_1_filename);
            }
            if($home_img_2)
            {
                $path = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'blog';
                if (!file_exists($path)){
                    mkdir($path, 0777, true);
                }

                $originalFile = $home_img_2->getClientOriginalName();
                $home_img_2_filename=date('YmdHis').'2'.$originalFile;
                $home_img_2->move($path, $home_img_2_filename);
            }
            
            $blogObj = $this->modelObj;
            $blogObj->slug = $slug;
            $blogObj->home_img = $home_img_filename;
            $blogObj->home_img_1 = $home_img_1_filename;
            $blogObj->home_img_2 = $home_img_2_filename;
            $blogObj->home_text = $home_text;
            $blogObj->main_title = $main_title;
            $blogObj->title = $title;
            $blogObj->blog_date = $blog_date;
            $blogObj->description = $description;
            $blogObj->save();
            $banner_id = $blogObj->id;
            
            session()->flash('success_message', $msg);

            //store logs detail
            $params=array();            
            $params['adminuserid']  = \Auth::user()->id;
            $params['actionid']     = $this->adminAction->ADD_BANNER;            
            $params['actionvalue']  = $banner_id;
            $params['remark']       = "Add Blog :".$banner_id;

            $logs= \App\Models\AdminLog::writeadminlog($params);
            unset($params);
            session()->flash('success_message', $msg);      
        }

        return ['status' => $status, 'msg' => $msg, 'data' => $data,'goto'=>$goto];
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
        
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$EDIT_ADMIN_LOG_ACTIONS);
        
        if($checkrights) 
        {
            return $checkrights;
        }
        
        $formObj = $this->modelObj->find($id);

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
        $data["action_show_hidde"] = 1;   

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

        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$EDIT_BANNER);
        
        if($checkrights) 
        {
            return $checkrights;
        } 
        $blogObj = $this->modelObj->find($id);

        $data = array();        
        $status = 1;
        $msg = $this->updateMsg;
        $goto = $this->list_url;    
        

        $validator = Validator::make($request->all(), [
            'main_title' => 'required',
            'title' => 'required',
            'blog_date' => 'required',
            'home_text' => 'required',
            'description' => 'required',            
        ]);
        
        // check validations
        if(!$blogObj)
        {
            $status = 0;
            $msg = "Record not found !";
        }
        else if ($validator->fails()) 
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
            $main_title = $request->get("main_title");
            $title = $request->get("title");
            $delimiter="-";
            $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $title))))), $delimiter));
            $home_img = $request->file("home_img");
            $home_img_1 = $request->file("home_img_1");
            $home_img_2 = $request->file("home_img_2");
            $home_text = $request->get("home_text");
            $blog_date = $request->get("blog_date");
            $description = $request->get("description");
            $home_img_filename = $blogObj->home_img;
            $home_img_1_filename = $blogObj->home_img_1;
            $home_img_2_filename = $blogObj->home_img_2;
            
            if($home_img)
            {
                $path = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'blog';
                if (!file_exists($path)){
                    mkdir($path, 0777, true);
                }

                $originalFile = $home_img->getClientOriginalName();
                $home_img_filename=date('YmdHis').$originalFile;
                $home_img->move($path, $home_img_filename);
            }
            if($home_img_1)
            {
                $path = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'blog';
                if (!file_exists($path)){
                    mkdir($path, 0777, true);
                }

                $originalFile = $home_img_1->getClientOriginalName();
                $home_img_1_filename=date('YmdHis').'1'.$originalFile;
                $home_img_1->move($path, $home_img_1_filename);
            }
            if($home_img_2)
            {
                $path = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'blog';
                if (!file_exists($path)){
                    mkdir($path, 0777, true);
                }

                $originalFile = $home_img_2->getClientOriginalName();
                $home_img_2_filename=date('YmdHis').'2'.$originalFile;
                $home_img_2->move($path, $home_img_2_filename);
            }
            
            $blogObj->slug = $slug;
            $blogObj->home_img = $home_img_filename;
            $blogObj->home_img_1 = $home_img_1_filename;
            $blogObj->home_img_2 = $home_img_2_filename;
            $blogObj->home_text = $home_text;
            $blogObj->main_title = $main_title;
            $blogObj->title = $title;
            $blogObj->blog_date = $blog_date;
            $blogObj->description = $description;
            $blogObj->save();
            $banner_id = $blogObj->id;
            
            //store logs detail
            $params=array();    
                                    
            $params['adminuserid']  = \Auth::user()->id;
            $params['actionid']     = $this->adminAction->EDIT_BANNER ;
            $params['actionvalue']  = $id;
            $params['remark']       = "Edit Blog::".$id;
                                    
            $logs=\App\Models\AdminLog::writeadminlog($params);
            
            session()->flash('success_message', $msg);
        }
        
        return ['status' => $status, 'msg' => $msg, 'data' => $data,'goto' => $goto];
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        prd($id);
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$DETELE_BANNER);
        if($checkrights) 
        {
            return $checkrights;
        }
        $modelObj = $this->modelObj->find($id);

        if($modelObj) 
        {   
            try 
            {            
                
                $modelObj->delete();
                $goto = session()->get($this->moduleRouteText.'_goto');
                $goto = $this->list_url;                
                session()->flash('success_message', $this->deleteMsg);

                //store logs detail
                $params=array();    
                                        
                $params['adminuserid']  = \Auth::user()->id;
                $params['actionid']     = $this->adminAction->DELETE_ADMIN_ACTION;
                $params['actionvalue']  = $id;
                $params['remark']       = "Delete Banner::".$id;
                                        
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

    
    public function view(Request $request)
    {    
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$EDIT_TASKS);
        
        if($checkrights) 
        {
            return $checkrights;
        }
        $user_id = \Auth::user()->id;
        $id = $request->get('task_id');
        $taskObj = $this->modelObj->find($id);       
        if(!$taskObj){
            return ['view' =>'Data Not Found !', 'data' => [] ];
        }
        if($user_id != $taskObj->user_id){
            return ['view' =>'Data Not Found !', 'data' => [] ];
        }
        $data = array();
        $attachmentArr = TasksAttachment::getAttachments($id);  
        foreach ($attachmentArr as $row) {     
            $data['imagArry'][] = $row['imagArry']; 
        }
        $params=array();

        $data['formObj'] = $taskObj;      
        $data['page_title'] = "Edit ".$this->module;
        $data['buttonText'] = "Update";
        $data['action_url'] = $this->moduleRouteText.".update";
        $data['action_params'] = $id;
        $data['method'] = "PUT";

        $params['adminuserid']  = \Auth::user()->id;
        $params['actionid']     = $this->adminAction->EDIT_TASKS;
        $params['actionvalue']  = $id;
        $params['remark']       = "View Task::".$id;

        $logs=\App\Models\AdminLog::writeadminlog($params);            

        $view = view($this->moduleViewName.".view", $data)->render(); 
        
        return ['view' =>$view, 'data' => $data ];
    }


    public function data(Request $request)
    {
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$LIST_BANNER);
        
        if($checkrights) 
        {
            return $checkrights;
        } 
        $user_id = \Auth::user()->id;
        $model = Blogs::query();
        return DataTables::eloquent($model)
        ->editColumn('title', function(Blogs $row) {
            return $row->title;
        })
        ->addColumn('action', function(Blogs $row) {
                return view("admin.partials.action",
                    [
                        'currentRoute' => $this->moduleRouteText,
                        'row' => $row,
                        'isEdit' => \App\Models\Admin::isAccess(\App\Models\Admin::$EDIT_BANNER),
                        'isDelete' => \App\Models\Admin::isAccess(\App\Models\Admin::$DETELE_BANNER),
                    ]
                )->render();
        }) 
        ->rawColumns(['title','action'])
        ->filter(function ($query) {
            $searchData = array();

            // customDatatble($this->moduleRouteText);
            // if($taskStatus!="")
            // {
            //     $query = $query->where(TBL_TASKS.".task_status", '=', $taskStatus);
            //     $searchData['taskStatus'] = $taskStatus;
            // }
        })
        ->make(true);
    }
}
