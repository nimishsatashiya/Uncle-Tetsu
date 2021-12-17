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
use App\Models\Countries;
use App\Models\Stores;


class StoreLocationsController extends Controller
{
    public function __construct() {

        $this->moduleRouteText = "store-locations";
        $this->moduleViewName = "admin.store_locations";
        $this->list_url = route($this->moduleRouteText.".index");        
        $module = "Store Locations";
        $this->module = $module;
        $this->adminAction= new AdminAction;
        $this->modelObj = new Stores();
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
           
        $data['page_title'] = "Store Locations";
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

        $countriesObj=Countries::getCountriesList();
        $data = array();
        $data['countriesObj'] = $countriesObj;
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
            'country_id' => 'required',
            'shop_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'lat' => 'required',
            'long' => 'required',
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
            
            $country_id = $request->get("country_id");
            $shop_name = $request->get("shop_name");
            $address = $request->get("address");
            $phone = $request->get("phone");
            $location_name = $request->get("location_name");
            $lat = $request->get("lat");
            $long = $request->get("long");
            
            
            $locationObj = $this->modelObj;
            $locationObj->country_id = $country_id;
            $locationObj->shop_name = $shop_name;
            $locationObj->address = $address;
            $locationObj->phone = $phone;
            $locationObj->lat = $lat;
            $locationObj->long = $long;
            $locationObj->save();
            $location_id = $locationObj->id;
            
            session()->flash('success_message', $msg);

            //store logs detail
            $params=array();            
            $params['adminuserid']  = \Auth::user()->id;
            $params['actionid']     = $this->adminAction->ADD_BANNER;            
            $params['actionvalue']  = $location_id;
            $params['remark']       = "Add Store Locations :".$location_id;

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
        $countriesObj=Countries::getCountriesList();
        $data = array();
        $data['countriesObj'] = $countriesObj;
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
        $locationObj = $this->modelObj->find($id);

        $data = array();        
        $status = 1;
        $msg = $this->updateMsg;
        $goto = $this->list_url;    
        

        $validator = Validator::make($request->all(), [            
            'country_id' => 'required',
            'shop_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'lat' => 'required',
            'long' => 'required',
        ]);
        
        // check validations
        if(!$locationObj)
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
            $country_id = $request->get("country_id");
            $shop_name = $request->get("shop_name");
            $address = $request->get("address");
            $phone = $request->get("phone");
            $location_name = $request->get("location_name");
            $lat = $request->get("lat");
            $long = $request->get("long");
            
            $locationObj->country_id = $country_id;
            $locationObj->shop_name = $shop_name;
            $locationObj->address = $address;
            $locationObj->phone = $phone;
            $locationObj->lat = $lat;
            $locationObj->long = $long;
            $locationObj->save();
            $location_id = $locationObj->id;
            
            //store logs detail
            $params=array();    
                                    
            $params['adminuserid']  = \Auth::user()->id;
            $params['actionid']     = $this->adminAction->EDIT_BANNER ;
            $params['actionvalue']  = $id;
            $params['remark']       = "Edit Location::".$id;
                                    
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
        $model = Stores::select(TBL_STORE_LOCATION.'.*',TBL_COUNTRIES.'.country_name')
                ->leftJoin(TBL_COUNTRIES,TBL_COUNTRIES.".id","=",TBL_STORE_LOCATION.".country_id");
        return DataTables::eloquent($model)
        ->addColumn('action', function(Stores $row) {
                return view("admin.partials.action",
                    [
                        'currentRoute' => $this->moduleRouteText,
                        'row' => $row,
                        'isEdit' => \App\Models\Admin::isAccess(\App\Models\Admin::$EDIT_BANNER),
                        'isDelete' => \App\Models\Admin::isAccess(\App\Models\Admin::$DETELE_BANNER),
                    ]
                )->render();
        }) 
        ->rawColumns(['action'])
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
