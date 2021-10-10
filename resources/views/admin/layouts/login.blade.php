<!DOCTYPE html>
<html lang="en">
   <head>
        <meta charset="utf-8" />
        <meta name="title" content="Admin Panel: {{ env('APP_SITE_TITLE')}}" />
        <title>Admin Panel: {{ env('APP_SITE_TITLE')}}</title>
        <link href="{{asset('themes/admin/assets/pages/img/favicon-32x32.png')}}" sizes="16x16" type="image/png" rel="icon">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ asset('themes/admin/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('themes/admin/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('themes/admin/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('themes/admin/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('themes/admin/assets/global/css/components.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('themes/admin/assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('themes/admin/assets/pages/css/login.min.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/target-admin2.css') }}">
        <link rel="shortcut icon" href="favicon.ico" />

        @yield('styles')

    </head>

        <body class=" login">
            <!-- BEGIN LOGO -->
            <div class="logo">
                <a href="{{ route('admin_login') }}">
                    <img src=" {{ asset('themes/admin/assets/pages/img/logo-big.png') }}" alt="" />
                </a>
            </div>

            <!-- BEGIN CONTENT -->
            <div class="content">
                @yield('content')
            </div>

            <div class="copyright"> {{ date('Y')}} &copy;  {{ env('APP_SITE_TITLE')}}                ALL Rights Reserved. 
            </div>
            
            <div id="AjaxLoaderDiv" style="display: none;z-index:99999 !important;">
                <div style="width:100%; height:100%; left:0px; top:0px; position:fixed; opacity:0; filter:alpha(opacity=40); background:#000000;z-index:999999999;">
                </div>
                <div style="float:left;width:100%; left:0px; top:50%; text-align:center; position:fixed; padding:0px; z-index:999999999;">
                <img src="{{ asset('/images/ajax-loader.gif') }}" />                
                </div>
            </div> 

        <script src="{{ asset('themes/admin/assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('themes/admin/assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('themes/admin/assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('themes/admin/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('themes/admin/assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('themes/admin/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('themes/admin/assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('themes/admin/assets/global/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('themes/admin/assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
        <!-- <script src="{{ asset('themes/admin/assets/pages/scripts/login.min.js')}}" type="text/javascript"></script> -->
        <script type="text/javascript" src="{{ asset('js/parsley.js') }}" rel="stylesheet" ></script>
        <script type="text/javascript" src="{{ asset('themes/admin/assets/global/plugins/bootstrap-growl/jquery.bootstrap-growl.min.js') }}"></script>

        @yield('scripts')
    </body>

</html>