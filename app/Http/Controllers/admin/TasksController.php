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
use App\Models\Task;
use App\Models\TasksAttachment;
use App\Models\TempAttachment;
use App\Models\TaskStatusList;
use App\Models\TaskStatus;

class TasksController extends Controller
{
    public function __construct() {

        $this->moduleRouteText = "tasks";
        $this->moduleViewName = "admin.tasks";
        $this->list_url = route($this->moduleRouteText.".index");        
        $module = "Task";
        $this->module = $module;

        $this->adminAction= new AdminAction;

        $this->modelObj = new Task();  
        $this->modelObjTask = new TasksAttachment();  

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
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$LIST_TASKS);
        
        if($checkrights) 
        {
            return $checkrights;
        }


        $data = array();
           
        $data['page_title'] = "Add Task";
        $data['add_url'] = route($this->moduleRouteText.'.create');        
        $data['taskData'] = Task::get();
        $data['btnAdd'] = \App\Models\Admin::isAccess(\App\Models\Admin::$ADD_TASKS);
        return view($this->moduleViewName.".index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$ADD_TASKS);
        
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
        
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$ADD_TASKS);
        
        if($checkrights) 
        {
            return $checkrights;
        }    
        $data = array();        
        $status = 1;
        $msg = $this->addMsg;
        $goto = $this->list_url;
        

        $validator = Validator::make($request->all(), [            
            'title' => 'required|min:2|unique:'.TBL_TASKS.',title' ,  
            'due_date' => 'required|date',
            'description' => 'required|min:2',
            // 'document.*' => 'exists:'.TBL_TASKS_ATTACHMENT.',id',            

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
            $user_id = \Auth::user()->id;
            $title = $request->get("title");
            $description = $request->get("description"); 
            $due_date = $request->get("due_date");                
            $due_date =  date('Y-m-d', strtotime($due_date));                        
            $taskObj = $this->modelObj;
            $taskObj->title = $title;
            $taskObj->description = $description;
            $taskObj->due_date = $due_date;
            $taskObj->user_id = $user_id;
            $taskObj->save();
            $task_id = $taskObj->id; 
            if($request->input('document'))
            {
                foreach($request->input('document',[]) as $tempId)
                {   
                    $path = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'tasks'.DIRECTORY_SEPARATOR.$task_id;                     
                    $oldpath = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'tmp';
                    
                    if (!file_exists($path)) {
                        mkdir($path, 0777, true);
                    }
                    $tempData = DB::table('temp_attachment')->where('id', $tempId)->first(); 

                    $taskAttach=new TasksAttachment();                    
                    $taskAttach->task_id=$task_id;
                    if($tempData){
                        $Filename =  $tempData->name;
                        $tempFilename =  $tempData->temp_name;
                        $taskAttach->name=$Filename; 
                        $taskAttach->temp_name=$tempFilename;  
                        if(!empty($Filename)){
                            rename($oldpath.DIRECTORY_SEPARATOR.$tempFilename, $path.DIRECTORY_SEPARATOR.$tempFilename); 
                        }
                        $taskAttach->save();
                        DB::table('temp_attachment')->where('id', $tempId)->delete(); 
                    }
                    $taskAttach->save();
                }
            }
                
            session()->flash('success_message', $msg);

            //store logs detail
            $params=array();            
            $params['adminuserid']  = \Auth::user()->id;
            $params['actionid']     = $this->adminAction->ADD_TASKS;            
            $params['actionvalue']  = $task_id;
            $params['remark']       = "Add Task :".$task_id;
                                
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
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$EDIT_TASKS);
        
        if($checkrights) 
        {
            return $checkrights;
        }
        $data = array();        
        $status = 1;
        $msg = $this->updateMsg;
        $goto = $this->list_url;
        
        $model = $this->modelObj->find($id);
        $user_id = \Auth::user()->id;
        if(!$model)
        {
            $status = 0;
            $msg = "Record not found !";
            return ['status' => $status, 'msg' => $msg, 'data' => $data,'goto'=>$goto];
        }
        if($user_id != $model->user_id)
        {
            $status = 0;
            $msg = "Record not found !";
            return ['status' => $status, 'msg' => $msg, 'data' => $data,'goto'=>$goto];
        }

        $validator = Validator::make($request->all(), [            
            'title' => 'required|min:2|unique:'.TBL_TASKS.',title,'.$id,     
            'due_date' => 'required|date',
            'description' => 'required|min:2',            
            //'document.*' => 'exists:'.TBL_TASKS_ATTACHMENT.'.id',
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
            $title = $request->get("title");
            $description = $request->get("description"); 
            $due_date = $request->get("due_date");                
            $due_date =  date('Y-m-d', strtotime($due_date));   
            $model->title = $title;
            $model->description = $description;
            $model->due_date = $due_date;
            $model->save();

            $params=array();
                                    
            $params['adminuserid']  = \Auth::user()->id;
            $params['actionid']     = $this->adminAction->EDIT_TASKS;
            $params['actionvalue']  = $id;
            $params['remark']       = "Edit Task :".$id;
            
            $logs=\App\Models\AdminLog::writeadminlog($params);
            
            session()->flash('success_message', $this->updateMsg);
        }
        
        return ['status' => $status, 'msg' => $msg, 'data' => $data,'goto'=>$goto];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        
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
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$LIST_TASKS);
        
        if($checkrights) 
        {
            return $checkrights;
        } 
        $user_id = \Auth::user()->id;                       
        $model = Task::where('user_id',$user_id);
        return DataTables::eloquent($model)
         
        ->editColumn('id', function($row) {
            $checked='';
            if($row->task_status==1){
                $checked="checked";
            }
            return ' <input type="checkbox" '.$checked.'  onclick="return OptionsSelected('.$row->id.')" class="taskId" id="taskId" name="task-'.$row->id.'" value="'.$row->id.'">';
        })
        ->editColumn('task_status' , function ($row)
            {
                if ($row->task_status == 0) {
                    return "<a class='btn btn-success btn-xs'>Active Task</a>";
                }
                if ($row->task_status == 1) {
                    return "<a class='btn btn-primary btn-xs'>Complete Task</a>";
                }
            })
        ->editColumn('taskView', function($row) {
            return '<a data-toggle="modal" href="#" onclick="return openView('.$row->id.')">'.$row->title.'</a>';
        })
        ->rawColumns(['id','action','taskView','task_status'])
        ->filter(function ($query) {
            $searchData = array();
            $taskStatus = request()->get("taskStatus");

            customDatatble($this->moduleRouteText);
            if($taskStatus!="")
            {
                $query = $query->where(TBL_TASKS.".task_status", '=', $taskStatus);
                $searchData['taskStatus'] = $taskStatus;
            }
        })
        ->make(true);
    }

    /*
    ** When Create Task Save images
    **
    */
    public function storeMedia(Request $request)
    {
        $status = 1;
        $msg = "File uploaded successfully!";
        $returnID = 0;

        $path = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'tmp';
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $file = $request->file('file');     
        if($file)
        {
            $name = $file->getClientOriginalName();
            
            $tempName = md5(uniqid() . '_' . trim($file->getClientOriginalName()));
            $extension =$file->getClientOriginalExtension();
            $full_name= $tempName.'.'.$extension;
            $file->move($path, $full_name);
          
            $returnID = \DB::table("temp_attachment")
            ->insertGetId([
                "id" => $returnID,
                "name" => $full_name,
                "temp_name" => $full_name,
                "created_at" => date("Y-m-d H:i:s")
            ]);
        }
        else
        {
            $status = 0;
            $msg = "Please upload valid file.";
        }
        
        return 
        [
            "status" => $status,
            "msg" => $msg,
            "id" => $returnID
        ];
    }
    /*
        Delete Media when insert new Task
    */
    public function deleteMedia(Request $request)
    {
        $status = 1;
        $msg = "File Deleted!";

        $tempId = $request->get('tempId'); 

        $tempData = DB::table('temp_attachment')->where('id', $tempId)->get(); 
        $oldpath = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'tmp';         
        foreach ($tempData as $tempValue) {
            $tempFilename =  $tempValue->temp_name;            
            if(file_exists($oldpath.DIRECTORY_SEPARATOR.$tempFilename)) {
                unlink($oldpath.DIRECTORY_SEPARATOR.$tempFilename);              
            } 

        }
        
        DB::table('temp_attachment')->where('id', $tempId)->delete();

        return ['status' => $status, 'msg' => $msg];
    }

    /*
    ** Update Task Media (images)
    **
    */
    public function updateServerMedia(Request $request,$task_id = null)
    {
        
        $status = 1;
        $msg = "File uploaded successfully!";
        $returnID = 0;

        $path = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'tasks'.DIRECTORY_SEPARATOR.$task_id;      

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $file = $request->file('file');    
        if($file)
        {
            
            $name = $file->getClientOriginalName();
            $tempName = md5(uniqid() . '_' . trim($file->getClientOriginalName()));
            $extension =$file->getClientOriginalExtension();
            $full_name= $tempName.'.'.$extension;
            $file->move($path, $full_name);
            $returnID = \DB::table("tasks_attachment")
            ->insertGetId([
                "id" => $returnID,
                "task_id" => $task_id,
                "temp_name"=>$full_name,
                "name" => $full_name,
                "created_at" => date("Y-m-d H:i:s")
                
            ]);
            
        }
        else
        {
            $status = 0;
            $msg = "Please upload valid file.";
        }
        
        return 
        [
            "status" => $status,
            "msg" => $msg,
            "id" => $returnID
        ];
    }
    public function deleteupdatedMedia(Request $request, $task_id = null)
    {

        $status = 1;
        $msg = "File Deleted!";        
        $deleteId = $request->get('deleteId');    

        $tempData = DB::table('tasks_attachment')->where('id', $deleteId)->get(); 
        $oldpath = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'tasks'.DIRECTORY_SEPARATOR.$task_id;  

        foreach ($tempData as $tempValue) {
            
            $tempFilename =  $tempValue->temp_name; 

            if(file_exists($oldpath.DIRECTORY_SEPARATOR.$tempFilename)) {
                unlink($oldpath.DIRECTORY_SEPARATOR.$tempFilename);              
            } 

        }     
        DB::table('tasks_attachment')
            ->where('task_id', $task_id)
            ->where("id",'=', $deleteId)                    
            ->delete();         


        return ['status' => $status, 'msg' => $msg];
    }

    /*
    ** Task Status Updated like
    ** Active Task == 0;
    ** Complete Task == 1;
    */
    public function statusUpdate(Request $request, $statusId = null)
    {        
        $status = 0;
        $msg = "Please select task.";  

        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$STATUS_CHANGE_TASKS);
        
        if($checkrights) 
        {
            return $checkrights;
        }

        $statusId = $request->get('statusId');         
        $task_id = $request->get('task_id');   
        if($statusId>=0 || $task_id>0){
            $status = 1;
            $msg = "Task Status Changed.";  
            $taskStatus = Task::find($task_id); 
            if($taskStatus){
                $taskStatus->task_status=$statusId;
                $taskStatus->save();
            }
        }
        $params=array();
        $params['adminuserid']  = \Auth::user()->id;
        $params['actionid']     = $this->adminAction->STATUS_CHANGE_TASKS;
        $params['actionvalue']  = $task_id;
        $params['remark']       = "Status Change::".$task_id;

        $logs=\App\Models\AdminLog::writeadminlog($params);  
        return ['status' => $status, 'msg' => $msg];
    }
    
}
