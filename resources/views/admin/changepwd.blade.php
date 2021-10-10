@extends('admin.layouts.app')

@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-key"></i>
                    Change Password
                </div>
            </div>
            <div class="portlet-body">
                
                    {!! Form::model(Auth::user(), ['route' => 'update_password', 'class' => 'sky-form form form-group', 'id' => 'main-frm', 'enctype'=>'multipart/form-data','redirect-url' => route("admin_dashboard")]) !!}
                    
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label">Old Password</label>
                            <input type="password" class="form-control" name="password" data-required="true" /> 
                        </div>
                        <div class="form-group">
                            <label class="control-label">New Password</label>
                            <input type="password" class="form-control" name="new_password" data-required="true"/> 
                        </div>
                        <div class="form-group">
                            <label class="control-label">Confirm Password</label>
                            <input type="password" class="form-control" name="new_password_confirmation" data-required="true" /> 
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Update" class="btn btn-success pull-right" id="submitBtn"/>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                    </div>
                {!! Form::close() !!}   
            </div>
        </div>                             
    </div>
</div>            
@endsection