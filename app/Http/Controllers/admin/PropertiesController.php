<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Validator;
use DataTables;
use App\Models\User;
use App\Models\AdminAction;
use App\Models\Property;
use App\Models\MlsMaster;
use App\Models\State;
use App\Models\City;
use App\Models\Latlong;
use App\Models\Building;

class PropertiesController extends Controller
{
    public function __construct() {        
        $this->moduleRouteText = "properties";
        $this->moduleViewName = "admin.properties";
        $this->list_url = route($this->moduleRouteText.".index");        
        $module = "Property";
        $this->module = $module;

        $this->adminAction= new AdminAction;

        $this->modelObj = new Property();  

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
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$LIST_PROPERTIES);
        
        if($checkrights) 
        {
            return $checkrights;
        }

        $data = array();
        $data['page_title'] = "Manage Properties"; 
        $data['add_url'] = route($this->moduleRouteText.'.create');
        $data['btnAdd'] = \App\Models\Admin::isAccess(\App\Models\Admin::$ADD_PROPERTIES);    
        $data["mls_id"] = MlsMaster::pluck('url','id')->all();
        $data["state_name"] = State::whereNotNull('state_name')->pluck('state_name','id')->all();
        //$data["city_name"] = City::whereNotNull('city_name')->pluck('city_name','id')->all();
        $data["price"] = Property::whereNotNull('price')->pluck('price','id')->all();
        $data['mls_type'] = Property::groupBy('mls_type')->pluck('mls_type','mls_type')->toArray();
        $data["latlong_id"] = Latlong::pluck('latitude','id')->all();
        $data["longitude"] = Latlong::pluck('longitude','id')->all();
        $data["building_id"] = Building::pluck('building_name','id')->all();


        return view($this->moduleViewName.".index", $data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$ADD_PROPERTIES);
        
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
        $data["mls_id"] = MlsMaster::pluck('url','id')->all();
        $data["state_name"] = State::pluck('state_name','id')->all();
        $data["city_name"] = City::pluck('city_name','id')->all();
        $data["latlong_id"] = Latlong::pluck('latitude','id')->all();
        $data["longitude"] = Latlong::pluck('longitude','id')->all();
        $data["building_id"] = Building::pluck('building_name','id')->all();
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
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$ADD_PROPERTIES);
        
        if($checkrights) 
        {
            return $checkrights;
        }
        $data = array();
        $status = 1;
        $msg = $this->addMsg;
        $goto = $this->list_url;
        $validator = Validator::make($request->all(), [
            'mls_id' => 'required',
            'mls_no' => 'required|min:2',
            'mls_original_no' => 'required|min:2',
            'city_id' => 'required',
            'state_id' => 'required',
            'pincode' => 'required|min:2',
            'address' => 'required|min:2',            
            'bath' => 'required|min:2',
            'year_built' => 'required|min:2',
            'dom' => 'required|min:2',
            'mls_type' => 'required|min:2',
            'county' => 'required|min:2',
            'agent_email' => 'required|min:2',
            'agent_name' => 'required|min:2',
            'floor_space' => 'required|min:2',
            'balconies_space' => 'required|min:2',
            'neighborhood_id' => 'required|min:2',
            'number_of_balconies' => 'required|min:2',
            'number_of_bedrooms' => 'required|min:2',
            'number_of_garages' => 'required|min:2',
            'number_of_parking_spaces' => 'required|min:2',
            'pets_allowed' => 'required|min:2',
            'description' => 'required|min:2',
            'status_id' => 'required|min:2',
            'latlong_id' => 'required',
            'building_id' => 'required',            
            
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

            //store logs detail
            $params = array();
            $params['adminuserid']  = \Auth::user()->id;
            $params['actionid']     = $this->adminAction->ADD_PROPERTIES;
            $params['actionvalue']  = $id;
            $params['remark']       = "Add Property::".$id;

            $logs = \App\Models\AdminLog::writeadminlog($params); 
            session()->flash('success_message', $this->addMsg);
            
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
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$EDIT_PROPERTIES);
        
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
        $data["mls_id"] = MlsMaster::pluck('url','id')->all();
        $data["state_id"] = State::pluck('state_name','id')->all();
        $data["city_id"] = City::pluck('city_name','id')->all();
        $data["latlong_id"] = Latlong::pluck('latitude','id')->all();
        $data["longitude"] = Latlong::pluck('longitude','id')->all();
        $data["building_id"] = Building::pluck('building_name','id')->all();

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
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$EDIT_PROPERTIES);
        
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
            'mls_id' => 'required',
            'mls_no' => 'required|min:2',
            'mls_original_no' => 'required|min:2',
            'city_id' => 'required',
            'state_id' => 'required',
            'pincode' => 'required|min:2',
            'address' => 'required|min:2',            
            'bath' => 'required|min:2',
            'year_built' => 'required|min:2',
            'dom' => 'required|min:2',
            'mls_type' => 'required|min:2',
            'county' => 'required|min:2',
            'agent_email' => 'required|email',
            'agent_name' => 'required|min:2',
            'floor_space' => 'required|min:2',
            'balconies_space' => 'required|min:2',
            'neighborhood_id' => 'required|min:2',
            'number_of_balconies' => 'required|min:2',
            'number_of_bedrooms' => 'required|min:2',
            'number_of_garages' => 'required|min:2',
            'number_of_parking_spaces' => 'required|min:2',
            'pets_allowed' => 'required|min:2',
            'description' => 'required|min:2',
            'status_id' => 'required|min:2',
            'latlong_id' => 'required',
            'building_id' => 'required',            
            
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
           
            $input = $request->all();
            $model->update($input);
 
            //store logs detail
            $params=array();
            $params['adminuserid']  = \Auth::user()->id;
            $params['actionid']     = $this->adminAction->EDIT_PROPERTIES;
            $params['actionvalue']  = $id;
            $params['remark']       = "Edit Property::".$id;

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
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$DETELE_PROPERTIES);
        
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
                $modelObj->delete();
                session()->flash('success_message', $this->deleteMsg); 

                //store logs detail
                $params=array();
                $params['adminuserid']  = \Auth::user()->id;
                $params['actionid']     = $this->adminAction->DELETE_PROPERTIES;
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





    public function view(Request $request)
    {     
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$LIST_PROPERTIES);
        
        if($checkrights) 
        {
            return $checkrights;
        }
        $id = $request->get('property_id');
        $data = array();
        if(!empty($id)){
            
            $data ['viewData'] = Property::select(TBL_PROPERTIES.".*",TBL_CITIES.".city_name as city_id",
                    TBL_STATES.".state_name as state_id",TBL_MLS_MASTER.".url as mls_id")
                    ->leftJoin(TBL_CITIES,TBL_PROPERTIES.".city_id","=",TBL_CITIES.".id")
                    ->leftJoin(TBL_STATES,TBL_PROPERTIES.".state_id","=",TBL_STATES.".id") 
                    ->leftJoin(TBL_MLS_MASTER,TBL_PROPERTIES.".mls_id","=",TBL_MLS_MASTER.".id") 
                    ->where(TBL_PROPERTIES.'.id', $id)
                    ->get();
        }
        $img = \DB::table(TBL_PROPERTY_IMAGES)
                    ->where('property_id',$id) 
                    ->get();
        $data ['Images'] = $img->toArray();
       
        $params=array();
        $params['adminuserid']  = \Auth::user()->id;
        $params['actionid']     = $this->adminAction->LIST_PROPERTIES;
        $params['actionvalue']  = $id;
        $params['remark']       = "View Property::".$id;

        $logs=\App\Models\AdminLog::writeadminlog($params);        
        return view($this->moduleViewName.".view", $data);         
    }


    public function data(Request $request)
    {
        
        $checkrights = \App\Models\Admin::checkPermission(\App\Models\Admin::$LIST_PROPERTIES);
        
        if($checkrights) 
        {
            return $checkrights;
        }        
        
        $model = Property::select(TBL_PROPERTIES.".*",TBL_CITIES.".city_name as city_name",
                    TBL_STATES.".state_name as state_name")
                    ->leftJoin(TBL_CITIES,TBL_PROPERTIES.".city_id","=",TBL_CITIES.".id")
                    ->leftJoin(TBL_STATES,TBL_PROPERTIES.".state_id","=",TBL_STATES.".id");

        return DataTables::eloquent($model)
           ->addColumn('action', function(Property $row) {                

                return view("admin.partials.action",
                    [
                        'currentRoute' => $this->moduleRouteText,
                        'row' => $row,
                        'isView' =>\App\Models\Admin::isAccess(\App\Models\Admin::$LIST_PROPERTIES),
                        
                    ]
                )->render();
            })
            
            ->rawColumns(['action','property_images'])
            ->filter(function ($query) 
            {
                $search_start_date = request()->get("search_start_date");
                $search_end_date = request()->get("search_end_date");
                $start_price = request()->get("start_price");
                $end_price = request()->get("end_price");
                $id = request()->get("id");                                         
                $mls_id = request()->get("mls_id"); 
                $mls_no = request()->get("mls_no");                                         
                $mls_original_no = request()->get("mls_original_no");                                         
                $city_name = request()->get("city_name");
                $state_name = request()->get("state_name");
                
                $pincode = request()->get("pincode");
                $search_email = request()->get("search_email");
                $price = request()->get("price");
                $bath = request()->get("bath");
                $year_built = request()->get("year_built");
                $dom = request()->get("dom");
                $mls_type = request()->get("mls_type");      
                
                $county = request()->get("county");
                $agent_email = request()->get("agent_email");
                $agent_name = request()->get("agent_name");
                $floor_space = request()->get("floor_space");
                $balconies_space = request()->get("balconies_space");
                $neighborhood_id = request()->get("neighborhood_id");
                $number_of_garages = request()->get("number_of_garages");
                $number_of_parking_spaces = request()->get("number_of_parking_spaces");
                $pets_allowed = request()->get("pets_allowed");
                $description = request()->get("description");
                $status_id = request()->get("status_id");
                $latlong_id = request()->get("latlong_id");
                $building_id = request()->get("building_id");
                $modified_time = request()->get("modified_time");
                $created_at = request()->get("created_at");


                if (!empty($search_start_date)){
                    $from_date=$search_start_date.' 00:00:00';
                    $convertFromDate= $from_date;
                    $query = $query->where(TBL_PROPERTIES.".modified_time",">=",addslashes($convertFromDate));
                }
                if (!empty($search_end_date)){
                    $to_date=$search_end_date.' 23:59:59';
                    $convertToDate= $to_date;
                    $query = $query->where(TBL_PROPERTIES.".modified_time","<=",addslashes($convertToDate));
                }
                if (!empty($start_price)){
                    $query = $query->whereBetween(TBL_PROPERTIES.'.price', [(int)$start_price, (int)$end_price]);
                }
                
                if(!empty($id))
                {
                    $query = $query->where(TBL_PROPERTIES.".id", '=', $id);
                }
                if(!empty($mls_id))
                {  
                    $query = $query->where(TBL_PROPERTIES.".mls_id", '=', $mls_id);
                }
                if(!empty($mls_no))
                {
                    $query = $query->where(TBL_PROPERTIES.".mls_no", '=', $mls_no);
                }
                
                if(!empty($city_name))
                {
                    $query = $query->where(TBL_CITIES.".id", '=',$city_name);
                }
                if(!empty($state_name))
                {
                    $query = $query->where(TBL_STATES.".id", '=', $state_name);
                }
                
                if(!empty($price))
                {
                    $query = $query->where(TBL_PROPERTIES.".price", 'LIKE', '%'.$price.'%');
                }
                
                if(!empty($year_built))
                {
                    $query = $query->where(TBL_PROPERTIES.".year_built", 'LIKE', '%'.$year_built.'%');
                }
                
                if(!empty($mls_type))
                {
                    $query = $query->where(TBL_PROPERTIES.".mls_type", '=', $mls_type);
                }
                
            })
            ->make(true);           
                
    }
    public function getCityList(Request $request)
    {
        
        $cities = \DB::table("cities")
                    ->where("state_id",$request->state_id)
                    ->orderBy('city_name', 'ASC')
                    ->pluck("city_name","id")
                    ->all();
        return response()->json($cities);
    }
}
