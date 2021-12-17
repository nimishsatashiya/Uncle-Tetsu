<?php
    $user_id = Auth::user()->id;
    $profile_pic = Auth::user()->image;                             
?>
<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <div class="page-logo">
            <a href="{{ url('admin/dashboard') }}">
            <img src="{{ asset('themes/admin/assets/layouts/layout4/img/admin-logo.png')}}" alt="logo" class="logo-default" /> </a>
            <!-- <div class="menu-toggler sidebar-toggler">
            </div> -->
        </div>
        <!-- <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a> -->
        <!-- <div class="page-actions">
            <div class="btn-group">
                <button type="button" class="btn red-haze btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <span class="hidden-sm hidden-xs">Actions&nbsp;</span>
                    <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="javascript:;">
                            <i class="icon-bell"></i> Alerts
                            <span class="badge badge-success">7</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div> -->
        <div class="page-top">
            <!-- <form class="search-form" action="#" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control input-sm" placeholder="Search..." name="query">
                    <span class="input-group-btn">
                        <a href="javascript:;" class="btn submit">
                            <i class="icon-magnifier"></i>
                        </a>
                    </span>
                </div>
            </form> -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- <li class="separator hide"> </li>
                    <li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="icon-bell"></i>
                            <span class="badge badge-success"> 7 </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3>
                                    <span class="bold">7 pending</span> notifications</h3>
                                <a href="#">view all / clear</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">just now</span>
                                            <span class="details">
                                                <span class="label label-sm label-icon label-success">
                                                    <i class="fa fa-plus"></i>
                                                </span> New user registered. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">3 mins</span>
                                            <span class="details">
                                                <span class="label label-sm label-icon label-danger">
                                                    <i class="fa fa-bolt"></i>
                                                </span> Server #12 overloaded. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">10 mins</span>
                                            <span class="details">
                                                <span class="label label-sm label-icon label-warning">
                                                    <i class="fa fa-bell-o"></i>
                                                </span> Server #2 not responding. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">14 hrs</span>
                                            <span class="details">
                                                <span class="label label-sm label-icon label-info">
                                                    <i class="fa fa-bullhorn"></i>
                                                </span> Application error. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">2 days</span>
                                            <span class="details">
                                                <span class="label label-sm label-icon label-danger">
                                                    <i class="fa fa-bolt"></i>
                                                </span> Database overloaded 68%. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">3 days</span>
                                            <span class="details">
                                                <span class="label label-sm label-icon label-danger">
                                                    <i class="fa fa-bolt"></i>
                                                </span> A user IP blocked. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">4 days</span>
                                            <span class="details">
                                                <span class="label label-sm label-icon label-warning">
                                                    <i class="fa fa-bell-o"></i>
                                                </span> Storage Server #4 not responding dfdfdfd. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">5 days</span>
                                            <span class="details">
                                                <span class="label label-sm label-icon label-info">
                                                    <i class="fa fa-bullhorn"></i>
                                                </span> System Error. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">9 days</span>
                                            <span class="details">
                                                <span class="label label-sm label-icon label-danger">
                                                    <i class="fa fa-bolt"></i>
                                                </span> Storage server failed. </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li> -->
                    <li class="separator hide"> </li>
                    <li class="separator hide"> </li>
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <span class="username username-hide-on-mobile">
                                <?php $name = ''; ?>
                                @if(Auth::check())
                                    <?php  $name = Auth::user()->name;
                                        $name = ucwords($name);
                                    ?>
                                @endif
                                {{ $name }}
                            </span>                        
                        @if(!empty($profile_pic))
                            <img class="img-circle" src='{{ asset("/uploads/users/$user_id/$profile_pic")}}' alt="" /></a>
                        @else
                            <img class="img-circle" src="{{ asset('uploads/users/default-user.jpg')}}" alt="" /></a>
                        @endif
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="{{ route('edit_profile')}}">
                                <i class="icon-user"></i> My Profile </a>
                            </li>
                            <li>
                                <a href="{{ route('change_password')}}">
                                <i class="icon-key"></i> Change Password </a>
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href="{{ route('logout')}}">
                                <i class="icon-lock"></i> Log Out </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-extended quick-sidebar-toggler">
                        <span class="sr-only">Toggle Quick Sidebar</span>
                        <i class="icon-logout" onclick="window.location = '{{ route('logout') }}'"></i>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="AjaxLoaderDiv" style="display: none;z-index:99999 !important;">
    <div style="width:100%; height:100%; left:0px; top:0px; position:fixed; opacity:0; filter:alpha(opacity=40); background:#000000;z-index:999999999;">
    </div>
    <div style="float:left;width:100%; left:0px; top:50%; text-align:center; position:fixed; padding:0px; z-index:999999999;">
        <img src="{{ asset('/images/ajax-loader.gif') }}">
        </center>
    </div>
</div>