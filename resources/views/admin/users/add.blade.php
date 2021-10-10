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
                                <label class="control-label">Firstname <span class="required">*</span></label>
                                {!! Form::text('firstname',null,['class' => 'form-control', 'data-required' => true,'placeholder'=>'Enter First Name']) !!}
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Lastname <span class="required">*</span></label>
                                {!! Form::text('lastname',null,['class' => 'form-control', 'data-required' => true,'placeholder'=>'Enter Last Name']) !!}
                            </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label">Email <span class="required">*</span></label>                                        
                                {!! Form::text('email',null,['class' => 'form-control', 'data-required' => true, 'data-type' => 'email','placeholder'=>'Enter Email']) !!}
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Mobile <span class="required">*</span></label>
                                {!! Form::text('phone',null,['class' => 'form-control', 'data-required' => true,'placeholder'=>'Enter Mobile number']) !!}
                            </div>
                            
                        </div>
                        @if(isset($show_password) && $show_password == 1)
                        <div class="clearfix">&nbsp;</div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label">Password <span class="required">*</span></label>                                        
                                {!! Form::password('password',['class' => 'form-control','data-required' => 'true','placeholder'=>'Enter Password']) !!}
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Confirm Password <span class="required">*</span></label>                                        
                                {!! Form::password('confirm_password',['class' => 'form-control','data-required' => 'true','placeholder'=>'Enter Confirm Password']) !!}
                            </div>   
                        </div>
                        @endif
                        <div class="clearfix">&nbsp;</div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label">User Type <span class="required">*</span></label>
                                {!! Form::select('user_type_id',['' => 'select Type']+$users_type,null,['class' => 'form-control', 'data-required' => true,'id'=>'user_id']) !!}
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Status: <span class="required">*</span></label>                            
                                {!! Form::select('status',['1'=>'Active','0'=>'inactive'],null,['class' => 'form-control', 'data-required' => true]) !!}
                            </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label">Address <span class="required">*</span></label>
                                {!! Form::textarea('address',null,['class' => 'form-control', 'data-required' => true,'rows'=>1,'placeholder'=>'Enter Address']) !!}
                            </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group last">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                    @if(!empty($formObj->image))
                                        <img src='{{ asset("/uploads/users/$user_id/$profile_pic")}}' alt="" />
                                    @else
                                        <img src="{{ asset('uploads/users/default-user.jpg')}}" alt="" />
                                    @endif
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                <div>
                                    <span class="btn default btn-file">
                                        <span class="fileinput-new"> Select image </span>
                                        <span class="fileinput-exists"> Change </span>
                                        <input type="file" name="image"> </span>
                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
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