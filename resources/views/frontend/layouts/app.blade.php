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
  <style type="text/css">
  .dual-ring {
  display: inline-block;
  width: 120px;
  height: 120px;
}

.dual-ring:after {
  content: " ";
  display: block;
  width: 120px;
  height: 120px;
  margin: 1px;
  border-radius: 50%;
  border: 5px solid #f30a00;
  border-color: #f30a00 transparent #f30a00 transparent;
  animation: dual-ring1 1.2s linear infinite;
}

.dual-ring img {
  position: absolute;
  top: 15px;
  left: 50%;
  margin-left: -46px;
}

@keyframes dual-ring1 {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
input.form-control.error{
  border-color: red!important;
}
label.error {
  display: none!important;
}
input.form-control.error,textarea.form-control.error {
  border: 1px solid red!important;
}
</style>
</head>
<body>
  @include('frontend.includes.header')
    @yield('content')
  <div class="clearfix"></div>
  @include('frontend.includes.footer')
  <!-- <script type="text/javascript" src="{{ asset('themes/frontend/js/jquery-3.5.1.slim.min.js')}}"></script> -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="{{ asset('themes/frontend/js/popper.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('themes/frontend/js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('themes/frontend/js/owl.carousel.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('themes/frontend/js/gsap.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('themes/frontend/js/MotionPathPlugin.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/additional-methods.min.js') }}"></script>
  <script type="text/javascript" type="text/javascript" src="{{ asset('themes/frontend/js/common.js?v=456789')}}"></script>

  <!-- <script type="text/javascript" src="{{ asset('themes/frontend/js/custom-js.js')}}"></script> -->
  @yield('scripts')
</body>
</html>