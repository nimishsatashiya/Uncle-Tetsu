@extends('admin.layouts.app')

<?php
$profile_pic = \Auth::user()->image;
$user_id = \Auth::user()->id;
?>

@section('styles')
<link href="{{ asset('themes/admin/assets/')}}/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('themes/admin/assets/pages/css/profile.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<!-- BEGIN PAGE HEAD-->
<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>New User Profile | Account
            <small>user account page</small>
        </h1>
    </div>
    <!-- END PAGE TITLE -->
</div>
<!-- END PAGE HEAD-->

<ul class="page-breadcrumb breadcrumb">

    <li>
        <a href="{{ url('admin/dashboard') }}">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">
            <a href="#">{{Request::segment(2)}}</a>
        </span>
    </li>
</ul>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PROFILE SIDEBAR -->
        <div class="profile-sidebar">
            <!-- PORTLET MAIN -->
            <div class="portlet light profile-sidebar-portlet bordered">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    @if(!empty($profile_pic))
                        <img src='{{ asset("/uploads/users/$user_id/$profile_pic")}}' alt="" class="img-responsive"/>
                    @else
                        <img src="{{ asset('uploads/users/default-user.jpg')}}" alt="" class="img-responsive"/>
                    @endif

                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name"> {{ Auth::user()->name }} </div>
                    <div class="profile-usertitle-job"> {{ Auth::user()->interests }} </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <!-- <div class="profile-userbuttons">
                    <button type="button" class="btn btn-circle green btn-sm">Follow</button>
                    <button type="button" class="btn btn-circle red btn-sm">Message</button>
                </div> -->
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <!-- <li>
                            <a href="#">
                                <i class="icon-home"></i> Overview </a>
                        </li> -->
                        <!-- <li class="active">
                            <a href="#">
                                <i class="icon-settings"></i> Account Settings </a>
                        </li> -->
                        <!-- <li>
                            <a href="#">
                                <i class="icon-info"></i> Help </a>
                        </li> -->
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
            <!-- END PORTLET MAIN -->
            <!-- PORTLET MAIN -->
            <?php /*
            <div class="portlet light bordered">
                <!-- STAT -->
                <div class="row list-separated profile-stat">
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="uppercase profile-stat-title"> 37 </div>
                        <div class="uppercase profile-stat-text"> Projects </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="uppercase profile-stat-title"> 51 </div>
                        <div class="uppercase profile-stat-text"> Tasks </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="uppercase profile-stat-title"> 61 </div>
                        <div class="uppercase profile-stat-text"> Uploads </div>
                    </div>
                </div>
                <!-- END STAT -->
                <div>
                    <h4 class="profile-desc-title">About Marcus Doe</h4>
                    <span class="profile-desc-text"> Lorem ipsum dolor sit amet diam nonummy nibh dolore. </span>
                    <div class="margin-top-20 profile-desc-link">
                        <i class="fa fa-globe"></i>
                        <a href="http://www.keenthemes.com">www.keenthemes.com</a>
                    </div>
                    <div class="margin-top-20 profile-desc-link">
                        <i class="fa fa-twitter"></i>
                        <a href="http://www.twitter.com/keenthemes/">@keenthemes</a>
                    </div>
                    <div class="margin-top-20 profile-desc-link">
                        <i class="fa fa-facebook"></i>
                        <a href="http://www.facebook.com/keenthemes/">keenthemes</a>
                    </div>
                </div>
            </div>
            */ 
            ?>
            <!-- END PORTLET MAIN -->
        </div>
        <!-- END BEGIN PROFILE SIDEBAR -->
        <!-- BEGIN PROFILE CONTENT -->
        <div class="profile-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                </li>
                                <li>
                                    <a href="#tab_1_2" data-toggle="tab">Change Avatar</a>
                                </li>
                                <li>
                                    <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                                </li>
                                <!-- <li>
                                    <a href="#tab_1_4" data-toggle="tab">Privacy Settings</a>
                                </li> -->
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <!-- PERSONAL INFO TAB -->
                                
                                <div class="tab-pane active" id="tab_1_1">
                                    {!! Form::model(Auth::user(), ['route' => 'update_profile', 'class' => 'sky-form form form-group', 'id' => 'persional_info', 'enctype'=>'multipart/form-data','redirect-url'=> route("edit_profile")]) !!}
                                        <div class="form-group">
                                            <label class="control-label">First Name</label>
                                            {!! Form::text('firstname',null,['placeholder' => 'Enter Your First Name','data-required' => true, 'class' => "form-control"]) !!}
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Last Name</label>
                                            {!! Form::text('lastname',null,['placeholder' => 'Enter Your Last Name','data-required' => true, 'class' => "form-control"]) !!}    
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Email</label>
                                            {!! Form::text('email',null,['placeholder' => 'Enter Your Email','data-required' => true, 'data-type' => "email",'class' => "form-control" ]) !!}
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Mobile Number</label>
                                            {!! Form::text('phone',null,['placeholder' => 'Enter Your Phone','data-required' => true, 'class' => "form-control"]) !!}
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Interests</label>
                                            {!! Form::text('interests',null,['placeholder' => 'Design, Web etc.','class' => "form-control"]) !!}
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Occupation</label>
                                            {!! Form::text('occupation',null,['placeholder' => 'Enter Your Occupation','class' => "form-control"]) !!}
                                            </div>
                                        <div class="form-group">
                                            <label class="control-label">Address</label>
                                            {!! Form::textarea('address',null,['placeholder' => 'Enter Your Address','data-required' => true, 'class' => "form-control",'rows'=>3]) !!}
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Website Url</label>
                                            {!! Form::text('website_url',null,['placeholder' => 'Enter Website Url','class' => "form-control"]) !!}
                                        </div>
                                        <div class="margiv-top-10">
                                            <input type="submit" value="Save Changes" class="btn green" id="submitBtnInfo" />
                                            <a href="javascript:;" class="btn default"> Cancel </a>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                                <!-- END PERSONAL INFO TAB -->
                                <!-- CHANGE AVATAR TAB -->
                                <div class="tab-pane" id="tab_1_2">
                                    <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                        eiusmod. </p>
                                    {!! Form::model(Auth::user(), ['route' => 'update_profile_avatar', 'class' => 'sky-form form form-group', 'id' => 'change_profile_img', 'enctype'=>'multipart/form-data','redirect-url'=> route("edit_profile")]) !!}
                                        <div class="form-group">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                    @if(!empty($profile_pic))
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
                                                    <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                </div>
                                            </div>
                                            <div class="clearfix margin-top-10">
                                                <span class="label label-danger">NOTE! </span>
                                                <span>Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                            </div>
                                        </div>
                                        <div class="margin-top-10">
                                            <input type="submit" value="Update" class="btn green" id="submitBtnImg" />
                                            <a href="javascript:;" class="btn default"> Cancel </a>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                                <!-- END CHANGE AVATAR TAB -->
                                <!-- CHANGE PASSWORD TAB -->
                                <div class="tab-pane" id="tab_1_3">
                                    {!! Form::model(Auth::user(), ['route' => 'update_password', 'class' => 'sky-form form form-group', 'id' => 'change_profilepass', 'enctype'=>'multipart/form-data','redirect-url' => route("edit_profile")]) !!}
                                        <div class="form-group">
                                            <label class="control-label">Current Password</label>
                                            <input type="password" class="form-control" name="password" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">New Password</label>
                                            <input type="password" class="form-control" name="new_password"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Re-type New Password</label>
                                            <input type="password" class="form-control" name="new_password_confirmation" />
                                        </div>
                                        <div class="margin-top-10">
                                            <input type="submit" value="Change Password" class="btn green" id="submitBtnPass">
                                            <a href="javascript:;" class="btn default"> Cancel </a>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                                <!-- END CHANGE PASSWORD TAB -->
                                <!-- PRIVACY SETTINGS TAB -->
                                <div class="tab-pane" id="tab_1_4">
                                    {!! Form::model(Auth::user(), ['route' => 'update_privacy', 'class' => 'sky-form form form-group', 'id' => 'change_profileprivacy', 'enctype'=>'multipart/form-data','redirect-url' => route("edit_profile")]) !!}
                                        <table class="table table-light table-hover">
                                            <tr>
                                                <td> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus.. </td>
                                                <td>
                                                    <div class="mt-radio-inline">
                                                        <label class="mt-radio">
                                                            {!! Form::radio('privacy_1',1,null) !!}
                                                             Yes
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            {!! Form::radio('privacy_1',0,null) !!}
                                                             No
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                                <td>
                                                    <div class="mt-radio-inline">
                                                        <label class="mt-radio">
                                                            {!! Form::radio('privacy_2',1,null) !!}
                                                            Yes
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            {!! Form::radio('privacy_2',0,null) !!}
                                                            No
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                                <td>
                                                    <div class="mt-radio-inline">
                                                        <label class="mt-radio">
                                                            {!! Form::radio('privacy_3',1,null) !!}
                                                            Yes
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            {!! Form::radio('privacy_3',0,null) !!}
                                                            No
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                                <td>
                                                    <div class="mt-radio-inline">
                                                        <label class="mt-radio">
                                                            {!! Form::radio('privacy_4',1,null) !!}
                                                            Yes
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            {!! Form::radio('privacy_4',0,null) !!}
                                                            No
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <!--end profile-settings-->
                                        <div class="margin-top-10">
                                            <input type="submit" value="Save Changes" class="btn green" id="submitBtnPrivacy">
                                            <a href="javascript:;" class="btn default"> Cancel </a>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                                <!-- END PRIVACY SETTINGS TAB -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PROFILE CONTENT -->
    </div>
</div>

@endsection
@section('scripts') 
<script src="{{ asset('themes/admin/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/admin/myProfile.js?454')}}" type="text/javascript"></script>
@endsection