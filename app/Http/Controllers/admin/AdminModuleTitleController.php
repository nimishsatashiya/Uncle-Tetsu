<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Models\AdminLog;
use App\Models\AdminAction;
use App\Models\AdminGroupTitle;


class AdminModuleTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {

        $this->moduleRouteText = "module-group-title";
        $this->moduleViewName = "admin.module_group_title";
        $this->list_url = route($this->moduleRouteText.".index");

        $module = "Admin Group Title";
        $this->module = $module;

        $this->adminAction= new \App\Models\AdminAction;

        $this->modelObj = new AdminGroupTitle;

        $this->addMsg = $module . " has been added successfully!";
        $this->updateMsg = $module . " has been updated successfully!";
        $this->deleteMsg = $module . " has been deleted successfully!";
        $this->deleteErrorMsg = $module . " can not deleted!";

        view()->share("list_url", $this->list_url);
        view()->share("moduleRouteText", $this->moduleRouteText);
        view()->share("moduleViewName", $this->moduleViewName);
    }

    public function index()
    {
       $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$LIST_ADMIN_MODULE_TITLE);
        
        if($checkrights) 
        {
            return $checkrights;
        }
        $data = array();
        $data['page_title'] = "Manage Admin Group Titles";
        $data['add_url'] = route($this->moduleRouteText.'.create');
        $data['btnAdd'] = \App\Models\Admin::isAccess(\App\Models\Admin::$ADD_ADMIN_MODULE_TITLE);
        return view($this->moduleViewName.".index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$ADD_ADMIN_MODULE_TITLE);
        
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
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$ADD_ADMIN_MODULE_TITLE);
        
        if($checkrights) 
        {
            return $checkrights;
        }    
        $data = array();
        $status = 1;
        $msg = $this->addMsg;
        $goto = $this->list_url;

        $validator = Validator::make($request->all(), [
            'group_title' => 'required|min:2',
            'order_index' => 'required|numeric'
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
            $input = $request->all();
            $obj = $this->modelObj->create($input);
            $id = $obj->id;
            session()->flash('success_message', $msg);

            //store logs detail
            $params=array();            
            $params['adminuserid']  = \Auth::user()->id;
            $params['actionid']     = $this->adminAction->ADD_ADMIN_MODULE_TITLE;            
            $params['actionvalue']  = $id;
            $params['remark']       = "Add Group Title::".$id;
                                    
            $logs= \App\Models\AdminLog::writeadminlog($params);
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
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$EDIT_ADMIN_MODULE_TITLE);
        
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
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$EDIT_ADMIN_MODULE_TITLE);
        
        if($checkrights) 
        {
            return $checkrights;
        }
        $model = $this->modelObj->find($id);

        $data = array();        
        $status = 1;
        $msg = $this->updateMsg;
        $goto = $this->list_url;

        $validator = Validator::make($request->all(), [
            'group_title' => 'required|min:2',
            'order_index' => 'required|numeric',
        ]);
        
        // check validations
        if(!$model)
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
            $input = $request->all();
            $model->update($input);                

           //store logs detail
            $params=array();
                                    
            $params['adminuserid']  = \Auth::user()->id;
            $params['actionid']     = $this->adminAction->EDIT_ADMIN_MODULE_TITLE;
            $params['actionvalue']  = $id;
            $params['remark']       = "Edit Group Title::".$id;
                                    
            $logs=\App\Models\AdminLog::writeadminlog($params);
            
            session()->flash('success_message', $msg);
        }
        
        return ['status' => $status, 'msg' => $msg, 'data' => $data,'goto'=>$goto];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$DELETE_ADMIN_MODULE_TITLE);
        
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
                $modelObj->delete();
                $goto = $this->list_url;

                session()->flash('success_message', $this->deleteMsg);

                $params=array();
                
                $params['adminuserid']  = \Auth::user()->id;
                $params['actionid']     = $this->adminAction->DELETE_ADMIN_MODULE_TITLE;
                $params['actionvalue']  = $id;
                $params['remark']       = "Delete Group Title::".$id;
                
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
       $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$LIST_ADMIN_MODULE_TITLE);
        
        if($checkrights) 
        {
            return $checkrights;
        }

       $model = AdminGroupTitle::query();

       return DataTables::eloquent($model)
       ->addColumn('action', function(AdminGroupTitle $row) {
           return view("admin.partials.action",
               [
                   'currentRoute' => $this->moduleRouteText,
                   'row' => $row,
                   'isEdit' => \App\Models\Admin::isAccess(\App\Models\Admin::$EDIT_ADMIN_MODULE_TITLE),
                   'isDelete' => \App\Models\Admin::isAccess(\App\Models\Admin::$DELETE_ADMIN_MODULE_TITLE),
               ]
           )->render();
       })
       ->rawColumns(['action'])
       ->filter(function ($query) {

           $search_text = request()->get("search_text");

           if(!empty($search_text))
           {
               $query = $query->where('group_title', 'LIKE', '%'.$search_text.'%');
           }
       })->make(true);
   }
}
