@extends('admin.layouts.app')

@section('styles')
<link href="{{ asset('themes/admin/assets/')}}/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('themes/admin/assets/pages/css/profile.min.css')}}" rel="stylesheet" type="text/css" />
<style type="text/css">
input {
    border: 1px solid #aaaaaa;
}
input.invalid {
  background-color: #ffdddd;
}
textarea {
    border: 1px solid #aaaaaa;
}
textarea.invalid {
  background-color: #ffdddd;
}
select{
   border: 1px solid #aaaaaa; 
}
select.invalid {
  background-color: #ffdddd;
}
</style>
@endsection
@section('content')
<?php
$userName="";
$interests="";
$website="";
$about="";
if($userData!=""){
    $userName=$userData->name;
    $interests=$userData->interests;
    $website=$userData->website_url;
    $about=$userData->about;
}
?>
<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>{{ $page_title }} | Account
            <small>user account page</small>
        </h1>
    </div>
    <!-- END PAGE TITLE -->
</div>
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
                    @if(!empty($userData->image))
                        <img src='{{ asset("/uploads/users/$userData->id/$userData->image")}}' alt="" class="img-responsive"/>
                    @else
                        <img src="{{ asset('uploads/users/default-user.jpg')}}" alt="" class="img-responsive"/>
                    @endif

                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name"> {{ $userName }} </div>
                    <div class="profile-usertitle-job"> {{ $interests }} </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                    <button type="button" class="btn btn-circle green btn-sm">Follow</button>
                    <button type="button" class="btn btn-circle red btn-sm">Message</button>
                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li>
                            <a href="#">
                                <i class="icon-home"></i> Overview </a>
                        </li>
                        <li class="active">
                            <a href="#">
                                <i class="icon-settings"></i> Account Settings </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-info"></i> Help </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
            <!-- END PORTLET MAIN -->
            <!-- PORTLET MAIN -->
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
                    @if($about)
                    <h4 class="profile-desc-title">About {{ $userName}}</h4>
                    <span class="profile-desc-text"> {{ $about }} </span>
                    @endif
                    @if($website)
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-globe"></i>
                            <a href="{{$website}}">{{$website}}</a>
                        </div>
                    @endif
                </div>
            </div>
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
                                <li class="active" id="tab1"  >
                                    <a href="javascript:void(0)" >Personal Info</a>
                                </li>
                                <li id="tab2" >
                                    <a href="javascript:void(0)" >Change Avatar</a>
                                </li>
                                <li id="tab3" >
                                    <a href="javascript:void(0)" >Change Password</a>
                                </li>
                                <li id="tab4" >
                                    <a href="javascript:void(0)" >Privacy Settings</a>
                                </li>
                            </ul>
                        </div>
                        <div class="portlet-body">
                            {!! Form::model($formObj,['method' => $method,'files' => true, 'route' => [$action_url,$action_params],'class' => 'sky-form form form-group', 'id' => 'main-frm1-tab1']) !!}
                            <div class="tab-content">
                                <!-- PERSONAL INFO TAB -->
                                <div class="tab-pane active" id="tab_1_1">
                                    <div class="form-group">
                                        <label class="control-label">First Name</label>
                                        {!! Form::text('firstname',null,['placeholder' => 'Enter Your First Name','data-required' => true, 'class' => "form-control" ,'oninput' => "this.className = 'form-control parsley-validated'"]) !!}
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Last Name</label>
                                        {!! Form::text('lastname',null,['placeholder' => 'Enter Your Last Name','data-required' => true, 'class' => "form-control" ,'oninput' => "this.className = 'form-control parsley-validated'"]) !!}    
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                        {!! Form::text('email',null,['placeholder' => 'Enter Your Email','data-required' => true, 'data-type' => "email",'class' => "form-control" ,'oninput' => "this.className = 'form-control parsley-validated'"]) !!}
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Mobile Number</label>
                                        {!! Form::text('phone',null,['placeholder' => 'Enter Your Phone','data-required' => true, 'class' => "form-control",'oninput' => "this.className = 'form-control parsley-validated'"]) !!}
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Interests</label>
                                        {!! Form::text('interests',null,['placeholder' => 'Design, Web etc.','class' => "form-control" ,'oninput' => "this.className = 'form-control'"]) !!}
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Occupation</label>
                                        {!! Form::text('occupation',null,['placeholder' => 'Enter Your Occupation','class' => "form-control" ,'oninput' => "this.className = 'form-control'"]) !!}
                                        </div>
                                    <div class="form-group">
                                        <label class="control-label">Address</label>
                                        {!! Form::textarea('address',null,['placeholder' => 'Enter Your Address','class' => "form-control parsley-validated",'rows'=>3 ,'oninput' => "this.className = 'form-control'"]) !!}
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">About</label>
                                        {!! Form::textarea('about',null,['placeholder' => 'About','class' => "form-control",'rows'=>3]) !!}
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Website Url</label>
                                        {!! Form::text('website_url',null,['placeholder' => 'Enter Website Url','class' => "form-control" ,'oninput' => "this.className = 'form-control'"]) !!}
                                    </div>
                                    @if(\Auth::user()->user_type_id==SUPER_ADMIN_USER)
                                    <div class="form-group">
                                        <label class="control-label">User Type <span class="required">*</span></label>
                                        {!! Form::select('user_type_id',['' => 'select Type']+$users_type,null,['class' => 'form-control parsley-validated', 'data-required' => true,'id'=>'user_id' ,'oninput' => "this.className = 'form-control parsley-validated'"]) !!}
                                    </div> 
                                    @endif                                  
                                </div>
                                <!-- END PERSONAL INFO TAB -->
                                <!-- CHANGE AVATAR TAB -->
                                <div class="tab-pane" id="tab_1_2">
                                    <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                        eiusmod. </p>
                                    <div class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                @if(!empty($userData->image))
                                                    <img src='{{ asset("/uploads/users/$userData->id/$userData->image")}}' alt=""/>
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
                                </div>
                                <!-- END CHANGE AVATAR TAB -->
                                <!-- CHANGE PASSWORD TAB -->
                                <div class="tab-pane" id="tab_1_3">
                                    @if(!empty($userData))
                                    <div class="form-group">
                                        <label class="control-label">Current Password</label>
                                        <input type="password" class="form-control parsley-validated" oninput="this.className = 'form-control parsley-validated'" name="password" />
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <label class="control-label">Password</label>
                                        <input type="password" class="form-control parsley-validated" name="new_password" oninput="this.className = 'form-control parsley-validated'"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Re-type Password</label>
                                        <input type="password" class="form-control parsley-validated" name="new_password_confirmation" oninput="this.className = 'form-control parsley-validated'"/>
                                    </div>
                                </div>
                                <!-- END CHANGE PASSWORD TAB -->
                                <!-- PRIVACY SETTINGS TAB -->
                                <div class="tab-pane" id="tab_1_4">
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
                                </div>
                                <div style="overflow:auto;">
                                    <div style="float:right;">
                                      <button type="button" class="btn default" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                      <button type="button" class="btn green" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                    </div>
                                </div>
                                <!-- END PRIVACY SETTINGS TAB -->
                            </div>
                            {!! Form::close() !!}
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

<script type="text/javascript">
/*function openTab(tabId) {
    var i;
    for (i = 1; i < 5; i++) {
        var j='tab'+i;
        if(j==tabId){
            $("#"+tabId).addClass('active');
            $("#tab_1"+'_'+i).addClass('active');
        }else{
            $("#"+j).removeClass('active'); 
            $("#tab_1"+'_'+i).removeClass('active'); 
        }
    }
}*/
var currentTab = 0; 
showTab(currentTab); 

function showTab(n) {
    for (i = 0; i <= 4; i++) {
        var k=i+1;
        if(i==n){
            $("#tab"+k).addClass('active');
            // $("#tab_1"+'_'+k).addClass('active');
        }else{
            $("#tab"+k).removeClass('active'); 
            // $("#tab_1"+'_'+k).removeClass('active'); 
            var x = document.getElementsByClassName("tab-pane");
            x[n].style.display = "block";
        }
    }

  
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
}

function nextPrev(n) {
  var x = document.getElementsByClassName("tab-pane");
  if (n == 1 && !validateForm()) return false;
      x[currentTab].style.display = "none";
      currentTab = currentTab + n;
  if (currentTab >= x.length) {
    $("#main-frm1-tab1").submit();
    document.getElementById('tab_1_1').style.display = 'block';
    currentTab=0;
    return false;
  }
  showTab(currentTab);
}

function validateForm() {
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab-pane");
  y = x[currentTab].getElementsByClassName("parsley-validated");
  for (i = 0; i < y.length; i++) {
    if (y[i].value == "") {
      y[i].className += " invalid form-control";
      valid = false;
    }
  }
  if (valid) {
  }
  return valid; 
}




$(document).ready(function () {
    $('#main-frm1-tab1').submit(function () {
        if ($(this).parsley('isValid'))
        {
            $('#AjaxLoaderDiv').fadeIn('slow');
            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: new FormData(this),
                contentType: false,
                processData: false,
                enctype: 'multipart/form-data',
                success: function (result)
                {
                    $('#AjaxLoaderDiv').fadeOut('slow');
                    if (result.status == 1)
                    {
                        $.bootstrapGrowl(result.msg, {type: 'success', delay: 4000});
                        window.location = result.goto;    
                    }
                    else
                    {
                        $.bootstrapGrowl(result.msg, {type: 'danger', delay: 4000});
                        $("#tab1").addClass('active');
                        $("#tab_1_1").addClass('active');
                        document.getElementById("nextBtn").innerHTML = "Next";
                        showTab(currentTab);
                    }
                },
                error: function (error) {
                    $('#AjaxLoaderDiv').fadeOut('slow');
                    $.bootstrapGrowl("Internal server error !", {type: 'danger', delay: 4000});
                }
            });
        }            
        return false;
    });
});
</script>
@endsection