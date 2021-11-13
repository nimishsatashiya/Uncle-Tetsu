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
use App\Models\Newslatter;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {

        $this->moduleRouteText = "newsletter-inquiry";
        $this->moduleViewName = "admin.newsletter_inquiry";
        $this->list_url = route($this->moduleRouteText.".index");

        $module = "Newsletter Inquiry";
        $this->module = $module;

        $this->adminAction= new AdminAction;

        $this->modelObj = new Newslatter();  

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
    public function index()
    {
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$LIST_USER_TYPE);
        
        if($checkrights) 
        {
            return $checkrights;
        }

        $data = array();
        $data['page_title'] = "Newsletter Inquiry"; 
        $data['add_url'] = route($this->moduleRouteText.'.create');
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
    {}

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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$DELETE_USER_TYPE);
        
        if($checkrights) 
        {
            return $checkrights;
        }   
        $modelObj = $this->modelObj->find($id);
        
        if($modelObj)
        {
            try
            {                
                //$backUrl = $request->server('HTTP_REFERER');
                $modelObj->delete();
                $goto = $this->list_url;                
                session()->flash('success_message', $this->deleteMsg);

                $params=array();
                
                $params['adminuserid']  = \Auth::user()->id;
                $params['actionid']     = $this->adminAction->DELETE_USER_TYPE;
                $params['actionvalue']  = $id;
                $params['remark']       = "Delete User Type ::".$id;
                
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request)
    {
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$LIST_USER_TYPE);
        
        if($checkrights) 
        {
            return $checkrights;
        }

       $model = Newslatter::query();
       return DataTables::eloquent($model)
       ->addColumn('action', function(Newslatter $row) {
           return view("admin.partials.action",
               [
                    'currentRoute' => $this->moduleRouteText,
                    'row' => $row,
                    'isDelete' => \App\Models\Admin::isAccess(\App\Models\Admin::$DELETE_USER_TYPE),
               ]
           )->render();
       })
       ->rawColumns(['action'])
       ->filter(function ($query) {

           $search_text = request()->get("search_text");

           if(!empty($search_text))
           {
               $query = $query->where('title', 'LIKE', '%'.$search_text.'%');
           }
       })->make(true);
   }
}
