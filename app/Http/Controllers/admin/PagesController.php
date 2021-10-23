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
use App\Models\Banner;
use App\Models\WhoUncleTetsu;
use App\Models\OurPhilosophy;


class PagesController extends Controller
{
    public function __construct() {

        $this->moduleRouteText = "pages";
        $this->moduleViewName = "admin.pages";
        $this->list_url = route($this->moduleRouteText.".index");        
        $module = "Page";
        $this->module = $module;
        $this->adminAction= new AdminAction;
        $this->modelObj = new Banner();
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
        $data['page_title'] = "Pages";
        $data['add_url'] = "";
        $data['add_btn_ttl'] = "";
        $data['btnAdd'] = 0;
        return view($this->moduleViewName.".index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        $html_file="";
        if($id=='who_uncle_tetsu'){
            $formObj = WhoUncleTetsu::where('page_slug',$id)->first();
            if(!$formObj)
            {
                abort(404);
            }  

            $data = array();
            $data['formObj'] = $formObj;
            $data['page_title'] = "Edit ".$this->module;
            $data['buttonText'] = "Update";
            $data['action_url'] = $this->moduleRouteText.".update";
            $data['action_params'] = $formObj->page_slug;
            $data['method'] = "PUT";
            $data["action_show_hidde"] = 1; 
            $html_file="who_uncle_tetsu";
        }else if($id=='our_philosophy'){
            $formObj = OurPhilosophy::where('page_slug',$id)->first();
            if(!$formObj)
            {
                abort(404);
            }  

            $data = array();
            $data['formObj'] = $formObj;
            $data['page_title'] = "Edit ".$this->module;
            $data['buttonText'] = "Update";
            $data['action_url'] = $this->moduleRouteText.".update";
            $data['action_params'] = $formObj->page_slug;
            $data['method'] = "PUT";
            $data["action_show_hidde"] = 1; 
            $html_file="our_philosophy";
        }
        return view($this->moduleViewName.'.'.$html_file, $data);
    
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
        if($id=='who_uncle_tetsu'){
            $formObj = WhoUncleTetsu::where('page_slug',$id)->first();
            if(!$formObj)
            {
                abort(404);
            }  
            $data = array();        
            $status = 1;
            $msg = $this->updateMsg;
            $goto = $this->list_url;   

            $validator = Validator::make($request->all(), [
                'home_title' => 'required',              
                'home_text' => 'required',              
                'title' => 'required',              
                'sec1_full_text' => 'required',              
                'sec1_right_text1' => 'required',              
                'sec1_left_text2' => 'required',              
                'sec1_left_text3' => 'required',              
                'sec2_left_text1' => 'required',              
                'sec2_left_text2' => 'required',              
                'sec2_left_text3' => 'required',              
            ]);
        
            // check validations
            if(!$formObj)
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
                $home_text = $request->get("home_text");
                $home_title = $request->get("home_title");
                $who_uncle_home_img1 = $request->file("who_uncle_home_img1");
                $who_uncle_home_img2 = $request->file("who_uncle_home_img2");
                $title = $request->get("title");
                $banner_path = $request->file("banner_path");
                $sec1_full_text = $request->get("sec1_full_text");
                $sec1_left_img1 = $request->file("sec1_left_img1");
                $sec1_right_text1 = $request->get("sec1_right_text1");
                $sec1_left_text2 = $request->get("sec1_left_text2");
                $sec1_right_img2 = $request->file("sec1_right_img2");
                $sec1_left_text3 = $request->get("sec1_left_text3");
                $sec2_left_text1 = $request->get("sec2_left_text1");
                $sec2_right_img1 = $request->file("sec2_right_img1");
                $sec2_left_img2 = $request->file("sec2_left_img2");
                $sec2_left_text2 = $request->get("sec2_left_text2");
                $sec2_left_text3 = $request->get("sec2_left_text3");

                

                $home_img1_filename=$formObj->who_uncle_home_img1;
                $home_img2_filename=$formObj->who_uncle_home_img2;
                $banner_path_filename=$formObj->banner_path;
                $sec1_left_img1_filename=$formObj->sec1_left_img1;
                $sec1_right_img2_filename=$formObj->sec1_right_img2;
                $sec2_right_img1_filename=$formObj->sec2_right_img1;
                $sec2_left_img2_filename=$formObj->sec2_left_img2;
                $formObj->sec2_right_img1 = $sec2_right_img1_filename;
                $formObj->sec2_left_img2 = $sec2_left_img2_filename;
                if($who_uncle_home_img1)
                {
                    $path = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'who_uncle_tetsu';
                    if (!file_exists($path)){
                        mkdir($path, 0777, true);
                    }

                    $originalFile = $who_uncle_home_img1->getClientOriginalName();
                    $home_img1_filename=date('YmdHis').$originalFile;
                    $who_uncle_home_img1->move($path, $home_img1_filename);
                }
                if($who_uncle_home_img2)
                {
                    $path = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'who_uncle_tetsu';
                    if (!file_exists($path)){
                        mkdir($path, 0777, true);
                    }

                    $originalFile = $who_uncle_home_img2->getClientOriginalName();
                    $home_img2_filename=date('YmdHis').$originalFile;
                    $who_uncle_home_img2->move($path, $home_img2_filename);
                }
                if($banner_path)
                {
                    $path = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'who_uncle_tetsu';
                    if (!file_exists($path)){
                        mkdir($path, 0777, true);
                    }

                    $originalFile = $banner_path->getClientOriginalName();
                    $banner_path_filename=date('YmdHis').$originalFile;
                    $banner_path->move($path, $banner_path_filename);
                }
                if($sec1_left_img1)
                {
                    $path = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'who_uncle_tetsu';
                    if (!file_exists($path)){
                        mkdir($path, 0777, true);
                    }

                    $originalFile = $sec1_left_img1->getClientOriginalName();
                    $sec1_left_img1_filename=date('YmdHis').$originalFile;
                    $sec1_left_img1->move($path, $sec1_left_img1_filename);
                }
                if($sec1_right_img2)
                {
                    $path = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'who_uncle_tetsu';
                    if (!file_exists($path)){
                        mkdir($path, 0777, true);
                    }

                    $originalFile = $sec1_right_img2->getClientOriginalName();
                    $sec1_right_img2_filename=date('YmdHis').$originalFile;
                    $sec1_right_img2->move($path, $sec1_right_img2_filename);
                }
                if($sec2_right_img1)
                {
                    $path = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'who_uncle_tetsu';
                    if (!file_exists($path)){
                        mkdir($path, 0777, true);
                    }

                    $originalFile = $sec2_right_img1->getClientOriginalName();
                    $sec2_right_img1_filename=date('YmdHis').$originalFile;
                    $sec2_right_img1->move($path, $sec2_right_img1_filename);
                }
                if($sec2_left_img2)
                {
                    $path = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'who_uncle_tetsu';
                    if (!file_exists($path)){
                        mkdir($path, 0777, true);
                    }

                    $originalFile = $sec2_left_img2->getClientOriginalName();
                    $sec2_left_img2_filename=date('YmdHis').$originalFile;
                    $sec2_left_img2->move($path, $sec2_left_img2_filename);
                }
                

                $formObj->home_title = $home_title;
                $formObj->home_text = $home_text;
                $formObj->who_uncle_home_img1 = $home_img1_filename;
                $formObj->who_uncle_home_img2 = $home_img2_filename;
                $formObj->title = $title;
                $formObj->banner_path = $banner_path_filename;
                $formObj->sec1_full_text = $sec1_full_text;
                $formObj->sec1_left_img1 = $sec1_left_img1_filename;
                $formObj->sec1_right_text1 = $sec1_right_text1;
                $formObj->sec1_left_text2 = $sec1_left_text2;
                $formObj->sec1_right_img2 = $sec1_right_img2_filename;
                $formObj->sec1_left_text3 = $sec1_left_text3;
                $formObj->sec2_left_text1 = $sec2_left_text1;
                $formObj->sec2_right_img1 = $sec2_right_img1_filename;
                $formObj->sec2_left_img2 = $sec2_left_img2_filename;
                $formObj->sec2_left_text2 = $sec2_left_text2;
                $formObj->sec2_left_text3 = $sec2_left_text3;
                $formObj->save();
                $banner_id = $formObj->id;
                
                //store logs detail
                $params=array();    
                                        
                $params['adminuserid']  = \Auth::user()->id;
                $params['actionid']     = $this->adminAction->EDIT_BANNER ;
                $params['actionvalue']  = $id;
                $params['remark']       = "Edit Page::".$id;
                                        
                $logs=\App\Models\AdminLog::writeadminlog($params);
                
                session()->flash('success_message', $msg);
            }

        }else if($id=='our_philosophy'){
            $formObj = OurPhilosophy::where('page_slug',$id)->first();
            if(!$formObj)
            {
                abort(404);
            }  
            $data = array();        
            $status = 1;
            $msg = $this->updateMsg;
            $goto = $this->list_url;   

            $validator = Validator::make($request->all(), [
                'home_title' => 'required',              
                'home_text' => 'required',              
                'title' => 'required',              
                'sec1_text1' => 'required',              
                'sec2_text1' => 'required',              
                'sec3_text1' => 'required'             
            ]);
        
            // check validations
            if(!$formObj)
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
                $home_title = $request->get("home_title");
                $home_img1 = $request->file("home_img1");
                $home_img2 = $request->file("home_img2");
                $home_img3 = $request->file("home_img3");
                $home_text = $request->get("home_text");
                $title = $request->get("title");
                $banner_path = $request->file("banner_path");
                $sec1_text1 = $request->get("sec1_text1");
                $sec1_img1 = $request->file("sec1_img1");
                $sec1_img2 = $request->file("sec1_img2");
                $sec1_text1 = $request->get("sec1_text1");
                $sec2_img1 = $request->file("sec2_img1");
                $sec2_text1 = $request->get("sec2_text1");
                $sec2_img2 = $request->file("sec2_img2");
                $sec3_img1 = $request->file("sec3_img1");
                $sec3_text1 = $request->get("sec3_text1");

                

                $home_img1_filename=$formObj->home_img1;
                $home_img2_filename=$formObj->home_img2;
                $home_img3_filename=$formObj->home_img3;
                $banner_path_filename=$formObj->banner_path;
                $sec1_img1_filename=$formObj->sec1_img1;
                $sec1_img2_filename=$formObj->sec1_img2;
                $sec2_img1_filename=$formObj->sec2_img1;
                $sec2_img2_filename=$formObj->sec2_img2;
                $sec3_img1_filename=$formObj->sec3_img1;
                if($home_img1)
                {
                    $path = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'our_philosophy';
                    if (!file_exists($path)){
                        mkdir($path, 0777, true);
                    }

                    $originalFile = $home_img1->getClientOriginalName();
                    $home_img1_filename=date('YmdHis').$originalFile;
                    $home_img1->move($path, $home_img1_filename);
                }
                if($home_img2)
                {
                    $path = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'our_philosophy';
                    if (!file_exists($path)){
                        mkdir($path, 0777, true);
                    }

                    $originalFile = $home_img2->getClientOriginalName();
                    $home_img2_filename=date('YmdHis').$originalFile;
                    $home_img2->move($path, $home_img2_filename);
                }
                if($home_img3)
                {
                    $path = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'our_philosophy';
                    if (!file_exists($path)){
                        mkdir($path, 0777, true);
                    }

                    $originalFile = $home_img3->getClientOriginalName();
                    $home_img3_filename=date('YmdHis').$originalFile;
                    $home_img3->move($path, $home_img3_filename);
                }
                if($banner_path)
                {
                    $path = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'our_philosophy';
                    if (!file_exists($path)){
                        mkdir($path, 0777, true);
                    }

                    $originalFile = $banner_path->getClientOriginalName();
                    $banner_path_filename=date('YmdHis').$originalFile;
                    $banner_path->move($path, $banner_path_filename);
                }
                if($sec1_img1)
                {
                    $path = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'our_philosophy';
                    if (!file_exists($path)){
                        mkdir($path, 0777, true);
                    }

                    $originalFile = $sec1_img1->getClientOriginalName();
                    $sec1_img1_filename=date('YmdHis').$originalFile;
                    $sec1_img1->move($path, $sec1_img1_filename);
                }
                if($sec1_img2)
                {
                    $path = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'our_philosophy';
                    if (!file_exists($path)){
                        mkdir($path, 0777, true);
                    }

                    $originalFile = $sec1_img2->getClientOriginalName();
                    $sec1_img2_filename=date('YmdHis').$originalFile;
                    $sec1_img2->move($path, $sec1_img2_filename);
                }
                if($sec2_img1)
                {
                    $path = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'our_philosophy';
                    if (!file_exists($path)){
                        mkdir($path, 0777, true);
                    }

                    $originalFile = $sec2_img1->getClientOriginalName();
                    $sec2_img1_filename=date('YmdHis').$originalFile;
                    $sec2_img1->move($path, $sec2_img1_filename);
                }
                if($sec2_img2)
                {
                    $path = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'our_philosophy';
                    if (!file_exists($path)){
                        mkdir($path, 0777, true);
                    }

                    $originalFile = $sec2_img2->getClientOriginalName();
                    $sec2_img2_filename=date('YmdHis').$originalFile;
                    $sec2_img2->move($path, $sec2_img2_filename);
                }
                if($sec3_img1)
                {
                    $path = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'our_philosophy';
                    if (!file_exists($path)){
                        mkdir($path, 0777, true);
                    }

                    $originalFile = $sec3_img1->getClientOriginalName();
                    $sec3_img1_filename=date('YmdHis').$originalFile;
                    $sec3_img1->move($path, $sec3_img1_filename);
                }
                

                $formObj->home_title = $home_title;
                $formObj->home_text = $home_text;
                $formObj->home_img1 = $home_img1_filename;
                $formObj->home_img2 = $home_img2_filename;
                $formObj->home_img3 = $home_img3_filename;
                $formObj->title = $title;
                $formObj->banner_path = $banner_path_filename;
                $formObj->sec1_img1 = $sec1_img1_filename;
                $formObj->sec1_img2 = $sec1_img2_filename;
                $formObj->sec1_text1 = $sec1_text1;
                $formObj->sec2_img1 = $sec2_img1_filename;
                $formObj->sec2_text1 = $sec2_text1;
                $formObj->sec2_img2 = $sec2_img2_filename;
                $formObj->sec3_img1 = $sec3_img1_filename;
                $formObj->sec3_text1 = $sec3_text1;
                $formObj->save();
                $banner_id = $formObj->id;
                
                //store logs detail
                $params=array();    
                                        
                $params['adminuserid']  = \Auth::user()->id;
                $params['actionid']     = $this->adminAction->EDIT_BANNER ;
                $params['actionvalue']  = $id;
                $params['remark']       = "Edit Page::".$id;
                                        
                $logs=\App\Models\AdminLog::writeadminlog($params);
                
                session()->flash('success_message', $msg);
            }
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
        $first = DB::table('who_uncle_tetsu')
                ->selectRaw('who_uncle_tetsu.page_slug,who_uncle_tetsu.title as title,"who_uncle_tetsu" as page_name');

        $second = DB::table('our_philosophy')
                ->selectRaw('our_philosophy.page_slug,our_philosophy.title as title,"our_philosophy" as page_name');

        $second = $second->union($first);

        $query = DB::table(DB::raw("({$second->toSql()}) as x"))->selectRaw("*");

        return Datatables::of($query)
        ->editColumn('title', function($row) {
            return $row->title;
        })
        ->addColumn('action', function($row) {
                return view("admin.partials.action",
                    [
                        'currentRoute' => $this->moduleRouteText,
                        'row' => $row,
                        'isPageEdit' => \App\Models\Admin::isAccess(\App\Models\Admin::$EDIT_BANNER),
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
