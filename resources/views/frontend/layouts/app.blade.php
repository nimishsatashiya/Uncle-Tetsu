<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>Uncle Tetsu</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="{{ asset('themes/frontend/css/style.css')}}" />
  <link rel="icon" href="{{ asset('themes/frontend/images/favicon.ico')}}" type="image/x-icon"/>
  <link rel="shortcut icon" href="{{ asset('themes/frontend/images/favicon.ico')}}" type="image/x-icon"/>
</head>
<body>
  @include('frontend.includes.header')
    @yield('content')
  <div class="clearfix"></div>
  @include('frontend.includes.footer')
  <script type="text/javascript" src="{{ asset('themes/frontend/js/jquery-3.5.1.slim.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('themes/frontend/js/popper.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('themes/frontend/js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('themes/frontend/js/owl.carousel.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('themes/frontend/js/gsap.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('themes/frontend/js/MotionPathPlugin.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('themes/frontend/js/common.js')}}"></script>

  <!-- <script type="text/javascript" src="{{ asset('themes/frontend/js/custom-js.js')}}"></script> -->
  @yield('scripts')
</body>
</html>