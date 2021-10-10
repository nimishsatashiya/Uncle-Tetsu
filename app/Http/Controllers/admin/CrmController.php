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
use App\Models\LeadContactForm;
use App\Models\LeadAssignTo;

class CrmController extends Controller
{
    public function __construct() {
        $this->moduleRouteText = "leads";
        $this->moduleViewName = "admin.crm";
        $this->list_url = route($this->moduleRouteText.".index"); 
        
        $module = "Leads Contact";
        $this->module = $module;
        $this->adminAction= new AdminAction;

        $this->modelObj = new LeadContactForm();
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
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$LEADS);
        
        if($checkrights) 
        {
            return $checkrights;
        }
        $data = array();
        $data['page_title'] = "Manage Leads"; 
         
        return view("admin.crm.leads", $data); 
    }
    public function create(){

    }
    public function store(Request $request){

    }
    public function edit($id){
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$LEADS);
        
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
        $data['page_title'] = "Edit Lead Contact Form";
        $data['buttonText'] = "Update";
        $data['action_url'] = $this->moduleRouteText.".update";
        $data['action_params'] = $formObj->id;
        $data['method'] = "PUT";

        $userId=\Auth::user()->id;
        $user_typeId=\Auth::user()->user_type_id;
        if($user_typeId==SUPER_ADMIN_USER){
            $data["user_types"] = User::where('user_type_id','!=',DEV_ADMIN)->where('user_type_id','!=',SUPER_ADMIN_USER)->pluck('name','id')->all();

            $data["contact_list"] = LeadContactForm::pluck('fullname','id')->all();

        }else{
            $data["user_types"] = User::where('user_type_id','!=',DEV_ADMIN)->where('user_type_id','!=',SUPER_ADMIN_USER)->where('id',$userId)->pluck('name','id')->all();
        }


        return view($this->moduleViewName.'.lead_edit', $data);
    }
    public function update(Request $request, $id){
        $msg="";
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$LEADS);
        
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
        
        $goto = $this->list_url;
        if($msg==""){
            $msg = $this->updateMsg;
            $model->firstname = $request->get("firstname");
            $model->lastname = $request->get("lastname");
            $model->email = $request->get("email");
            $model->mobile_number = $request->get("mobile_number");
            $model->home_number =$request->get("home_number");
            $model->office_number = $request->get("office_number");
            $model->birth_date = $request->get("birth_date");
            $model->company = $request->get("company");
            $model->address = $request->get("address");
            $model->spouse_name = $request->get("spouse_name");
            $model->spouse_email = $request->get("spouse_email");
            $model->spouse_birth_date = $request->get("spouse_birth_date");
            $model->spouse_phone = $request->get("spouse_phone");
            $model->fullname =$request->get("firstname")." ".$request->get("lastname");;
            $model->last_action = 'Update Lead Contact Form By '.\Auth::user()->name;
            $model->save();

            $leadAssign=LeadAssignTo::where('contact_id',$id)->first();
            if($leadAssign==""){
                $leadAssign= new LeadAssignTo();
            }
            $leadAssign->hotness_level = $request->get("hotness_level");
            $leadAssign->tags = $request->get("tags");
            $leadAssign->lead_source = $request->get("lead_source");
            $leadAssign->status = $request->get("status");
            $leadAssign->contact_type = $request->get("contact_type");
            $leadAssign->contact_id = $request->get("contact_id");
            $leadAssign->assign_user_id = $request->get("assign_user_id");
            $leadAssign->comment = $request->get("comment");
            $leadAssign->last_action = 'Assign to user id : '.$request->get("assign_user_id");
            $leadAssign->save();

            //store logs detail
            $params = array();
            $params['adminuserid']  = \Auth::user()->id;
            $params['actionid']     = $this->adminAction->LEADS;
            $params['actionvalue']  = $id;
            $params['remark']       = "Update Lead Contact Form ::".$id;

            $logs = \App\Models\AdminLog::writeadminlog($params); 
            session()->flash('success_message', $this->updateMsg);
        }
        return ['status' => $status,'msg' => $msg, 'data' => $data, 'goto' => $goto];

    }
    public function show($id)
    {
        //
    }
    public function contactData(Request $request){
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$CONTACT);
        
        if($checkrights) 
        {
            return $checkrights;
        }

        $data = array();
        $data['page_title'] = "Manage Contact"; 

        return view("admin.crm.contact", $data);
    }
    public function data(Request $request)
    {
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$LEADS);
        
        if($checkrights) 
        {
            return $checkrights;
        }
        $user_typeId=\Auth::user()->user_type_id;
        $userId=\Auth::user()->id;
        if($user_typeId==SUPER_ADMIN_USER){
            $model = LeadContactForm::query();
        }else{
            $model = LeadContactForm::select(TBL_LEAD_CONTACT_FORM.'.*')->join(TBL_LEAD_ASSIGN_TO,TBL_LEAD_CONTACT_FORM.".id","=",TBL_LEAD_ASSIGN_TO.".contact_id")
                ->where('assign_user_id',$userId);
        }

        return DataTables::eloquent($model)

            ->addColumn('action', function(LeadContactForm $row) {                

                return view("admin.partials.action",
                    [
                        'currentRoute' => $this->moduleRouteText,
                        'row' => $row,
                        'isEdit' => \App\Models\Admin::isAccess(\App\Models\Admin::$LEADS),
                    ]
                )->render();
            })
            ->rawColumns(['action'])
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

                    $query = $query->where(TBL_LEAD_CONTACT_FORM.".created_at",">=",addslashes($convertFromDate));
                }
                if (!empty($search_end_date)){

                    $to_date=$search_end_date.' 23:59:59';
                    $convertToDate= $to_date;

                    $query = $query->where(TBL_LEAD_CONTACT_FORM.".created_at","<=",addslashes($convertToDate));
                }

                if(!empty($search_id))
                {
                    $idArr = explode(',', $search_id);
                    $idArr = array_filter($idArr);                
                    if(count($idArr)>0)
                    {
                        $query = $query->whereIn(TBL_LEAD_CONTACT_FORM.".id",$idArr);
                    } 
                } 
                if(!empty($search_fnm))
                {
                    $query = $query->where(TBL_LEAD_CONTACT_FORM.".firstname", 'LIKE', '%'.$search_fnm.'%');
                }
                if(!empty($search_lnm))
                {
                    $query = $query->where(TBL_LEAD_CONTACT_FORM.".lastname", 'LIKE', '%'.$search_lnm.'%');
                }
                if(!empty($search_email))
                {
                    $query = $query->where(TBL_LEAD_CONTACT_FORM.".email", 'LIKE', '%'.$search_email.'%');
                }
                
            })
            ->make(true);
    }
}
