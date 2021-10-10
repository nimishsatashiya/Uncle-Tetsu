@extends('admin.layouts.app')

@section('content')
<div id="divLoading"></div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>
                    {{ $page_title }}
                </div>
                <a class="btn btn-default pull-right btn-sm mTop5" href="{{ $list_url }}">Back</a>
            </div>
            <div class="portlet-body">
                <div class="form-body">
                   {!! Form::model($formObj,['method' => $method,'files' => true, 'route' => [$action_url,$action_params],'class' => 'sky-form form form-group', 'id' => 'main-frm','redirect-url'=>$list_url]) !!} 

                        <div class="clearfix">&nbsp;</div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label">Mls Id <span class="required">*</span></label>
                                
                                {!! Form::select('mls_id',['' => 'select Type']+$mls_id,null,['class' => 'form-control', 'data-required' => true,'id'=>'mls_id']) !!}
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Mls No <span class="required">*</span></label>
                                {!! Form::text('mls_no',null,['class' => 'form-control', 'data-required' => true,'placeholder'=>'Enter Mls No']) !!}
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Mls Original No <span class="required">*</span></label>
                                {!! Form::text('mls_original_no',null,['class' => 'form-control', 'data-required' => true,'placeholder'=>'Enter Mls Original No']) !!}
                            </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>

                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label">County <span class="required">*</span></label>
                                {!! Form::text('county',null,['class' => 'form-control', 'data-required' => true,'placeholder'=>'Enter Year County']) !!}
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">State <span class="required">*</span></label>
                                
                                {!! Form::select('state_id',['' => 'select Type']+$state_id,null,['class' => 'form-control', 'data-required' => true,'id'=>'state_id']) !!}
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">City <span class="required">*</span></label>                                
                                {!! Form::select('city_id',['' => 'select Type']+$city_id,null,['class' => 'form-control', 'data-required' => true,'id'=>'city_id']) !!}
                                
                                <input type="hidden" id="CityId" name="city_id" value="">
                            </div>  
                            <div id="otherBox" style="visibility: hidden;margin: 5px 0px 0px 140px;">
                            <input type="text" name="name" placeholder="Enter City" id="EnterCity" disabled>
                        </div>                          
                            
                        </div>
                        <div class="clearfix">&nbsp;</div>

                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label">Pincode <span class="required">*</span></label>
                                {!! Form::text('pincode',null,['class' => 'form-control', 'data-required' => true,'placeholder'=>'Enter Pincode']) !!}
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Address <span class="required">*</span></label>                               
                                {!! Form::textarea('address',null,['class' => 'form-control','rows' => 2,'data-required' => true]) !!}
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Bath <span class="required">*</span></label>
                                {!! Form::text('bath',null,['class' => 'form-control', 'data-required' => true,'placeholder'=>'Enter Bath']) !!}
                            </div>
                            
                        </div>
                        <div class="clearfix">&nbsp;</div>

                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label">Year Built <span class="required">*</span></label>
                                {!! Form::number('year_built',null,['class' => 'form-control', 'data-required' => true,'placeholder'=>'Enter Year Built']) !!}
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">DOM <span class="required">*</span></label>
                                {!! Form::text('dom',null,['class' => 'form-control', 'data-required' => true,'placeholder'=>'Enter DOM']) !!}
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Mls Type <span class="required">*</span></label>
                                {!! Form::text('mls_type',null,['class' => 'form-control', 'data-required' => true,'placeholder'=>'Enter Mls Type']) !!}
                            </div>                            
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label">Agent Email <span class="required">*</span></label>
                                {!! Form::email('agent_email',null,['class' => 'form-control', 'data-required' => true,'placeholder'=>'Enter Agent Email']) !!}
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Agent Name <span class="required">*</span></label>
                                {!! Form::text('agent_name',null,['class' => 'form-control', 'data-required' => true,'placeholder'=>'Enter Agent Name']) !!}
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Floor Space <span class="required">*</span></label>
                                {!! Form::text('floor_space',null,['class' => 'form-control', 'data-required' => true,'placeholder'=>'Enter Floor Space']) !!}
                            </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>

                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label">Balcony Space <span class="required">*</span></label>
                                {!! Form::text('balconies_space',null,['class' => 'form-control', 'data-required' => true,'placeholder'=>'Enter Balcony Space']) !!}
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Neighborhood Id <span class="required">*</span></label>
                                {!! Form::text('neighborhood_id',null,['class' => 'form-control', 'data-required' => true,'placeholder'=>'Enter Agent Name']) !!}
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">No. Of Balcony <span class="required">*</span></label>
                                {!! Form::text('number_of_balconies',null,['class' => 'form-control', 'data-required' => true,'placeholder'=>'Enter No. Of Balcony']) !!}
                            </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label">No. Of Bedrooms <span class="required">*</span></label>
                                {!! Form::text('number_of_bedrooms',null,['class' => 'form-control', 'data-required' => true,'placeholder'=>'Enter No. Of Bedrooms']) !!}
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">No. Of Garadge <span class="required">*</span></label>
                                {!! Form::text('number_of_garages',null,['class' => 'form-control', 'data-required' => true,'placeholder'=>'Enter No. Of Garadge']) !!}
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">No. Of Parking Spaces <span class="required">*</span></label>
                                {!! Form::text('number_of_parking_spaces',null,['class' => 'form-control', 'data-required' => true,'placeholder'=>'Enter No. Of Parking Spaces']) !!}
                            </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>

                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label">Pets Allowed <span class="required">*</span></label>
                                {!! Form::text('pets_allowed',null,['class' => 'form-control', 'data-required' => true,'placeholder'=>'Enter Pets Allowed']) !!}
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Description <span class="required">*</span></label>                                
                                {!! Form::textarea('description',null,['class' => 'form-control','rows' => 2,'data-required' => true]) !!}
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Status <span class="required">*</span></label>
                                {!! Form::number('status_id',null,['class' => 'form-control', 'data-required' => true,'placeholder'=>'Enter Status']) !!}
                            </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>

                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label">Latlong Id <span class="required">*</span></label>                                
                                {!! Form::select('latlong_id',['' => 'select Type']+$latlong_id,null,['class' => 'form-control', 'data-required' => true,'id'=>'latlong_id']) !!}
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Building Id <span class="required">*</span></label>                                
                                {!! Form::select('building_id',['' => 'select Type']+$building_id,null,['class' => 'form-control', 'data-required' => true,'id'=>'building_id']) !!}
                            </div>
                             <div class="col-md-4">
                                <label class="control-label">Modified Time<span class="required">*</span></label>                                
                                {!! Form::date('modified_time',\Carbon\Carbon::now()->format('d-m-Y h:s:ia'),['class' => 'form-control', 'data-required' => true,]) !!}
                                
                            </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>

                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label">Price<span class="required">*</span></label>                                
                                {!! Form::number('price',null,['class' => 'form-control', 'data-required' => true,'placeholder'=>'Enter Price']) !!}
                            </div>
                            
                            <div class="col-md-4" style="margin-top: 20px;">
                                <input type="submit" value="Save" class="btn btn-success pull-right" id="submitBtn" />
                            </div>
                            <div class="col-md-4">
                                
                            </div>
                        </div>
                        
                        
                    {!! Form::close() !!}
                </div>
            </div>
        </div>                 
    </div>
</div>
@endsection