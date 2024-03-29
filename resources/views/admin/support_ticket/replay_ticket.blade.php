@extends('admin.layouts.app')

@section('styles')
<link href="{{ asset('themes/admin/assets/')}}/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('themes/admin/assets/pages/css/profile.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('themes/admin/assets/apps/css/ticket.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
  
@section('content') 
 
<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>Support Tickets
            <small>main support page</small>
        </h1>
    </div>
    <!-- END PAGE TITLE -->
</div>
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="#">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Apps</span>
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
                    <img src="http://www.iprore.com/memberportal/assets/pages/media/profile/profile_user.jpg" class="img-responsive" alt=""> </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name"> Marcus Doe </div>
                    <div class="profile-usertitle-job"> Developer </div>
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
                        <li class="active">
                            <a href="#">
                                <i class="icon-home"></i> Ticket List </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-settings"></i> Support Staff </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-info"></i> Configurations </a>
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
                        <div class="uppercase profile-stat-text"> New </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="uppercase profile-stat-title"> 51 </div>
                        <div class="uppercase profile-stat-text"> Processed </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="uppercase profile-stat-title"> 61 </div>
                        <div class="uppercase profile-stat-text"> Completed </div>
                    </div>
                </div>
                <!-- END STAT -->
                <div>
                    <h4 class="profile-desc-title">About Marcus Doe</h4>
                    <span class="profile-desc-text"> Lorem ipsum dolor sit amet diam nonummy nibh dolore. </span>
                    <div class="margin-top-20 profile-desc-link">
                        <i class="fa fa-globe"></i>
                        <a href="#">www.keenthemes.com</a>
                    </div>
                    <div class="margin-top-20 profile-desc-link">
                        <i class="fa fa-twitter"></i>
                        <a href="#">@keenthemes</a>
                    </div>
                    <div class="margin-top-20 profile-desc-link">
                        <i class="fa fa-facebook"></i>
                        <a href="#">keenthemes</a>
                    </div>
                </div>
            </div>
            <!-- END PORTLET MAIN -->
        </div>
        <!-- END BEGIN PROFILE SIDEBAR -->
        <!-- BEGIN TICKET LIST CONTENT -->
        <div class="app-ticket app-ticket-list">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase">Ticket List</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="btn-group">
                                            <button id="sample_editable_1_new" class="btn sbold green"> Add New
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="btn-group pull-right">
                                            <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-print"></i> Print </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                <thead>
                                    <tr>
                                        <th>
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                                <span></span>
                                            </label>
                                        </th>
                                        <th> ID # </th>
                                        <th> Title </th>
                                        <th> Cust. Name </th>
                                        <th> Cust. Email </th>
                                        <th> Date/Time </th>
                                        <th> Assigned To </th>
                                        <th> Status </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
                                        <td>
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                <input type="checkbox" class="checkboxes" value="1" />
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <a href="#">1123</a>
                                        </td>
                                        <td>
                                            <a href="#">Changing Colors</a>
                                        </td>
                                        <td> Jane </td>
                                        <td>
                                            <a href="#"> customer@gmail.com </a>
                                        </td>
                                        <td class="center"> 10/12/15 1:45pm </td>
                                        <td> Hugh Jackman </td>
                                        <td>
                                            <span class="label label-sm label-warning"> New </span>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                <input type="checkbox" class="checkboxes" value="1" />
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <a href="#">1134</a>
                                        </td>
                                        <td>
                                            <a href="#">Modals popup customization</a>
                                        </td>
                                        <td> Randy </td>
                                        <td>
                                            <a href="#"> customer@gmail.com </a>
                                        </td>
                                        <td class="center"> 10/12/15 1:45pm </td>
                                        <td> Marcus Doe </td>
                                        <td>
                                            <span class="label label-sm label-info"> Processed </span>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                <input type="checkbox" class="checkboxes" value="1" />
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <a href="#">1144</a>
                                        </td>
                                        <td>
                                            <a href="#">Form Input styling</a>
                                        </td>
                                        <td> Samantha </td>
                                        <td>
                                            <a href="#"> customer@gmail.com </a>
                                        </td>
                                        <td class="center"> 10/12/15 1:45pm </td>
                                        <td> Marcus Doe </td>
                                        <td>
                                            <span class="label label-sm label-success"> Completed </span>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                <input type="checkbox" class="checkboxes" value="1" />
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <a href="#">1243</a>
                                        </td>
                                        <td>
                                            <a href="#">Counter skipping numbers</a>
                                        </td>
                                        <td> Daniel </td>
                                        <td>
                                            <a href="#"> customer@gmail.com </a>
                                        </td>
                                        <td class="center"> 10/12/15 1:45pm </td>
                                        <td> Marcus Doe </td>
                                        <td>
                                            <span class="label label-sm label-default"> Pending </span>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                <input type="checkbox" class="checkboxes" value="1" />
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <a href="#">1276</a>
                                        </td>
                                        <td>
                                            <a href="#">Menu not working</a>
                                        </td>
                                        <td> Billy </td>
                                        <td>
                                            <a href="#"> customer@gmail.com </a>
                                        </td>
                                        <td class="center"> 10/12/15 1:45pm </td>
                                        <td> Hugh Jackman </td>
                                        <td>
                                            <span class="label label-sm label-default"> Pending </span>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                <input type="checkbox" class="checkboxes" value="1" />
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <a href="#">1345</a>
                                        </td>
                                        <td>
                                            <a href="#">Changing Colors</a>
                                        </td>
                                        <td> Jane </td>
                                        <td>
                                            <a href="#"> customer@gmail.com </a>
                                        </td>
                                        <td class="center"> 10/12/15 1:45pm </td>
                                        <td> Hugh Jackman </td>
                                        <td>
                                            <span class="label label-sm label-warning"> New </span>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                <input type="checkbox" class="checkboxes" value="1" />
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <a href="#">1354</a>
                                        </td>
                                        <td>
                                            <a href="#">Modals popup customization</a>
                                        </td>
                                        <td> Randy </td>
                                        <td>
                                            <a href="#"> customer@gmail.com </a>
                                        </td>
                                        <td class="center"> 10/12/15 1:45pm </td>
                                        <td> Marcus Doe </td>
                                        <td>
                                            <span class="label label-sm label-default"> Pending </span>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                <input type="checkbox" class="checkboxes" value="1" />
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <a href="#">1365</a>
                                        </td>
                                        <td>
                                            <a href="#">Form Input styling</a>
                                        </td>
                                        <td> Samantha </td>
                                        <td>
                                            <a href="#"> customer@gmail.com </a>
                                        </td>
                                        <td class="center"> 10/12/15 1:45pm </td>
                                        <td> Marcus Doe </td>
                                        <td>
                                            <span class="label label-sm label-success"> Completed </span>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                <input type="checkbox" class="checkboxes" value="1" />
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <a href="#">1371</a>
                                        </td>
                                        <td>
                                            <a href="#">Counter skipping numbers</a>
                                        </td>
                                        <td> Daniel </td>
                                        <td>
                                            <a href="#"> customer@gmail.com </a>
                                        </td>
                                        <td class="center"> 10/12/15 1:45pm </td>
                                        <td> Marcus Doe </td>
                                        <td>
                                            <span class="label label-sm label-default"> Pending </span>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                <input type="checkbox" class="checkboxes" value="1" />
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <a href="#">1373</a>
                                        </td>
                                        <td>
                                            <a href="#">Menu not working</a>
                                        </td>
                                        <td> Billy </td>
                                        <td>
                                            <a href="#"> customer@gmail.com </a>
                                        </td>
                                        <td class="center"> 10/12/15 1:45pm </td>
                                        <td> Hugh Jackman </td>
                                        <td>
                                            <span class="label label-sm label-success"> Completed </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
<script src="{{ asset('themes/admin/assets/pages/scripts/table-datatables-managed.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/admin/myProfile.js?454')}}" type="text/javascript"></script>

@endsection