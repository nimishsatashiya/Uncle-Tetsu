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
        
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
        
        <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        
        <link href="{{ asset('themes/admin/assets/global/plugins/font-awesome-master/css/font-awesome.min.css?45445')}}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('themes/admin/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('themes/admin/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('themes/admin/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('themes/admin/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('themes/admin/assets/global/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('themes/admin/assets/global/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('themes/admin/assets/global/plugins/jqvmap/jqvmap/jqvmap.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('themes/admin/assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('themes/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('themes/admin/assets/global/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ asset('themes/admin/assets/global/css/plugins.min.css?v=123')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('themes/admin/assets/apps/css/todo.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('themes/admin/assets/layouts/layout4/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('themes/admin/assets/layouts/layout4/css/themes/default.min.css?v=1234')}}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{ asset('themes/admin/assets/layouts/layout4/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
         <link href="{{ asset('themes/admin/assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('themes/admin/assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/css/target-admin2.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}" />
        <link href="{{ asset('themes/admin/assets/layouts/layout4/css/custom.css')}}" rel="stylesheet" type="text/css" />

        <!--- Data picker -->        
        <link href="{{ asset('themes/admin/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('themes/admin/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('themes/admin/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('themes/admin/assets/global/plugins/clockface/css/clockface.css')}}" rel="stylesheet" type="text/css" />
        <!--- End Data picker -->
        <link rel="stylesheet" href="{{ asset('themes/admin/assets/global/plugins/jquery-file-upload/dropzone.min.css')}}" type="text/css" />   
        <link rel="shortcut icon" href="{{ asset('favicon.ico')}}" />
            <style>
                .mTop25{margin-top: 25px;}
                .mTop5{margin-top: 5px;}
                .pagination>.active>span{background-color: #32c5d2 !important;border-color: #32c5d2 !important}
                .dataTables_paginate .fa
                {
                    font-size: 14px !important;
                    padding: 2.5px !important;
                }
                .page-sidebar .page-sidebar-menu>li>a>i, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu>li>a>i {
                    font-size: 18px;
                    text-shadow: none;
                    font-weight: 300;
                    width: 30px;
                    display: inline-block;
                    margin-right: 4px;
                }
            </style>

        @yield('styles')
    </head>
    
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
        
        @include('admin.includes.header')
        
        <div class="clearfix"> </div>
        <div class="page-container">
            
            @include('admin.includes.sidebar')
            
            <div class="page-content-wrapper">
                 <div class="page-content">

                    @include('admin.includes.flashMsg')

                    {!! Form::open(['method' => 'DELETE','id' => 'global_delete_form']) !!}
                    {!! Form::hidden('id', 0,['id' => 'delete_id']) !!}
                    {!! Form::close() !!}

                @yield('content')

            </div> 
        </div>

        @include('admin.includes.footer')
        {!! Form::open(['method' => 'DELETE','id' => 'global_delete_form']) !!}
        {!! Form::hidden('id', 0,['id' => 'delete_id']) !!}
        {!! Form::close() !!}            


        <script src="{{ asset('themes/admin/assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
        <!-- Select2 js -->
        <script src="{{ asset('themes/admin/assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('themes/admin/assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('themes/admin/assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('themes/admin/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('themes/admin/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('themes/admin/assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('themes/admin/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('themes/admin/assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
        <script src="{{ asset('themes/admin/assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('themes/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
        <script src="{{ asset('themes/admin/assets/global/plugins/moment.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('themes/admin/assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('themes/admin/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('themes/admin/assets/global/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('themes/admin/assets/global/plugins/morris/raphael-min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('themes/admin/assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>

        <script src="{{ asset('themes/admin/assets/layouts/layout4/scripts/layout.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('themes/admin/assets/layouts/layout4/scripts/demo.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('themes/admin/assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>

        <script type="text/javascript" src="{{ asset('/js/parsley.js') }}"></script>
        <script type="text/javascript" src="{{ asset('themes/admin/assets/global/tinymce/tinymce.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/comman.js?1234566') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/jquery.bootstrap-growl.min.js') }}"></script>
        <script src="{{ asset('/js/jquery-ui.js') }}"></script>
        <script src="{{ asset('themes/admin/assets/global/fancybox/jquery.fancybox.pack.js') }}" type="text/javascript"></script>
        <link href="{{ asset('themes/admin/assets/global/fancybox/jquery.fancybox.css') }}" rel="stylesheet">
        <script src="{{ asset('js/admin/custom.js?06789') }}" type="text/javascript"></script>
        
         <!--- Data picker -->
        
        <script src="{{ asset('themes/admin/assets/global/plugins/moment.min.js')}}" type="text/javascript"></script>       
        <script src="{{ asset('themes/admin/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('themes/admin/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('themes/admin/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('themes/admin/assets/global/plugins/clockface/js/clockface.js')}}" type="text/javascript"></script>
        <script src="{{ asset('themes/admin/assets/pages/scripts/components-date-time-pickers.min.js')}}" type="text/javascript"></script>
        
        <!--- End Data picker -->
       
        <script src="{{ asset('themes/admin/assets/global/plugins/jquery-file-upload/dropzone.min.js')}}" type="text/javascript"></script>

        <!-- <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script> -->

        

        @yield('scripts')
    </body>
</html>