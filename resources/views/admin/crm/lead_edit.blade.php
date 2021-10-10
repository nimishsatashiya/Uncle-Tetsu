@extends('admin.layouts.app')
<?php
$profile_pic =$formObj->image;
$user_id =$formObj->id;
?>
@section('styles')
<link href="{{ asset('themes/admin/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>
                   {{ $page_title }}
                </div>
                <a class="btn default pull-right btn-sm mTop5" href="{{ $list_url }}">Back</a>
            </div>
            <div class="portlet-body">
                <div class="form-body">
                   {!! Form::model($formObj,['method' => $method,'files' => true, 'route' => [$action_url,$action_params],'class' => 'sky-form form form-group', 'id' => 'main-frm','redirect-url'=>$list_url]) !!} 

                        <div class="clearfix">&nbsp;</div>
    					<div class="row">
                            <div class="col-md-6">
                                <div class="row"><div class="col-md-12 caption"><h5><strong>Persional Information</strong></h5></div></div>
                                <div class="clearfix">&nbsp;</div>
                                <div class="col-md-6">
                                    <label class="control-label">Firstname </label>
                                    {!! Form::text('firstname',null,['class' => 'form-control','placeholder'=>'Enter First Name']) !!}
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Lastname </label>
                                    {!! Form::text('lastname',null,['class' => 'form-control','placeholder'=>'Enter Last Name']) !!}
                                </div>
                                <div class="clearfix">&nbsp;</div>
                                <div class="col-md-12">
                                    <label class="control-label">Email </label>           
                                    {!! Form::text('email',null,['class' => 'form-control', 'data-type' => 'email','placeholder'=>'Enter Email']) !!}
                                </div>
                                <div class="clearfix">&nbsp;</div>
                                <div class="col-md-12">
                                    <label class="control-label">Mobile </label>
                                    {!! Form::text('mobile_number',null,['class' => 'form-control','placeholder'=>'Enter Mobile number']) !!}
                                </div>
                                <div class="clearfix">&nbsp;</div>
                                <div class="col-md-12">
                                    <label class="control-label">Home Number </label>
                                    {!! Form::text('home_number',null,['class' => 'form-control','placeholder'=>'Enter Home number']) !!}
                                </div>
                                <div class="clearfix">&nbsp;</div>
                                <div class="col-md-12">
                                    <label class="control-label">Office Number </label>
                                    {!! Form::text('office_number',null,['class' => 'form-control','placeholder'=>'Enter office number']) !!}
                                </div>
                                <div class="clearfix">&nbsp;</div>
                                <div class="col-md-12">
                                    <label class="control-label">Birth Date:</label>
                                    <div class="input-group input-large date-picker input-daterange" data-date-format="yyyy-mm-dd">
                                        {!! Form::text('birth_date',null,['class' => 'form-control','placeholder' => 'Select Birth Date','id'=>'birth_date']) !!}
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="clearfix">&nbsp;</div>
                                <div class="col-md-12">
                                    <label class="control-label">Company </label>
                                    {!! Form::text('company',null,['class' => 'form-control','placeholder'=>'Enter Company']) !!}
                                </div>
                                <div class="clearfix">&nbsp;</div>
                                <div class="col-md-12">
                                    <label class="control-label">Address </label>
                                    {!! Form::textarea('address',null,['class' => 'form-control','rows'=>2,'placeholder'=>'Enter Address']) !!}
                                </div>
                                <div class="clearfix">&nbsp;</div>
                                <div class="row"><div class="col-md-12 caption"><h5><strong>Spouse Information</strong></h5></div></div>
                                <div class="clearfix">&nbsp;</div>
                                <div class="col-md-12">
                                    <label class="control-label">Spouse Name </label>
                                    {!! Form::text('spouse_name',null,['class' => 'form-control','placeholder'=>'Enter Spouse Name']) !!}
                                </div>
                                <div class="clearfix">&nbsp;</div>
                                <div class="col-md-12">
                                    <label class="control-label">Spouse Email </label>
                                    {!! Form::text('spouse_email',null,['class' => 'form-control','placeholder'=>'Enter Email']) !!}
                                </div>
                                <div class="clearfix">&nbsp;</div>
                                <div class="col-md-12">
                                    <label class="control-label">Spouse Birthday</label>
                                    <div class="input-group input-large date-picker input-daterange" data-date-format="yyyy-mm-dd">
                                       {!! Form::text('spouse_birth_date',null,['class' => 'form-control','placeholder'=>'Enter Spouse Birthday','id'=>'spouse_birth_date']) !!}
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="clearfix">&nbsp;</div>
                                <div class="col-md-12">
                                    <label class="control-label">Spouse Phone </label>
                                    {!! Form::text('spouse_phone',null,['class' => 'form-control','placeholder'=>'Enter Spouse Phone']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row"><div class="col-md-12 caption"><h5><strong>Organize By:</strong></h5></div></div>
                                <div class="clearfix">&nbsp;</div>
                                <div class="col-md-12">
                                    <label class="control-label">Select Hotness level </label>
                                    {!! Form::select('hotness_level',['' => 'Select Hotness level'],null,['class' => 'form-control','id'=>'hotness_level']) !!}
                                </div>
                                <div class="clearfix">&nbsp;</div>
                                <div class="col-md-12">
                                    <label class="control-label">Select Tags.. </label>
                                    {!! Form::select('tags',['' => 'Select Tags..'],null,['class' => 'form-control','id'=>'tags']) !!}
                                </div>
                                <div class="clearfix">&nbsp;</div>
                                <div class="col-md-12">
                                    <label class="control-label">Select Lead Source </label>
                                    {!! Form::select('lead_source',['' => 'Select Lead Source'],null,['class' => 'form-control','id'=>'lead_source']) !!}
                                </div>
                                <div class="clearfix">&nbsp;</div>
                                <div class="col-md-12">
                                    <label class="control-label">Select Status </label>
                                    {!! Form::select('status',['' => 'Select status'],null,['class' => 'form-control','id'=>'status']) !!}
                                </div>
                                <div class="clearfix">&nbsp;</div>
                                <div class="col-md-12">
                                    <label class="control-label">Select Contact Type </label>
                                    {!! Form::select('contact_type',['' => 'Select Contact type'],null,['class' => 'form-control','id'=>'contact_type']) !!}
                                </div>
                                <div class="clearfix">&nbsp;</div>
                                <?php $user_typeId=\Auth::user()->user_type_id;
                                if($user_typeId==SUPER_ADMIN_USER){?>
                                    <div class="col-md-12">
                                        <label class="control-label">Select Contact List </label>
                                        {!! Form::select('contact_id',['' => 'select Contact List']+$contact_list,null,['class' => 'form-control','id'=>'contact_id']) !!}
                                    </div>
                                    <div class="clearfix">&nbsp;</div>
                                    <div class="col-md-12">
                                        <label class="control-label">Select Assigned Member </label>
                                        {!! Form::select('assign_user_id',['' => 'select Hotness Assigned Member']+$user_types,null,['class' => 'form-control','id'=>'assign_user_id']) !!}
                                    </div>
                                <?php } ?>
                                <div class="clearfix">&nbsp;</div>
                                <div class="col-md-12">
                                    <label class="control-label">Comments </label>
                                    {!! Form::textarea('comment',null,['class' => 'form-control','rows'=>3,'placeholder'=>'Enter comment']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        
                        <div class="row">
                            <div class="col-md-12" style="margin-top: 20px">
                                <a class="btn default pull-right mrgleft10" href="{{ $list_url }}">Cancel</a>
                                <input type="submit" value="Save" class="btn btn-success pull-right" id="submitBtn" />
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>                 
    </div>
</div>
@endsection

@section('scripts') 
<script src="{{ asset('themes/admin/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
@endsection