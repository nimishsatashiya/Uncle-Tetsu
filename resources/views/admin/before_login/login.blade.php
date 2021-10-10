@extends('admin.layouts.login')

@section('content')
    {!!Form::open(['url' => 'admin/login', 'files' => 'true','class' => 'login-form','id' => 'parsely-frm'])!!}
        <h3 class="form-title font-green">Sign In</h3>
        <div class="form-group">
            {!! Form::label('email','Email',['class'=>'control-label visible-ie8 visible-ie9']) !!}
            {!!Form::text('email',null,['data-required' => 'true' , 'class' => 'form-control form-control-solid placeholder-no-fix', 'placeholder' => 'Enter Your Email' , 'autocomplete' => 'off'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('password','Password',['class'=>'control-label visible-ie8 visible-ie9']) !!}
            {!! Form::password('password',['data-required' => 'true','class' => 'form-control form-control-solid placeholder-no-fix', 'placeholder' => 'Enter Your Password']) !!}
        </div>
        <div class="form-actions">
            <button type="submit" class="btn green uppercase" id="loginBtn">Login</button>
        </div>
    {!!Form::close() !!}
@endsection

@section('scripts')
<script type="text/javascript">
    @php
        $url = url()->previous();
        if(strpos($url, 'admin') === false)
        {
            $url = url('admin/login');
        }
    @endphp
    var redirectURL = '{{ $url }}';
</script>
<script type="text/javascript" src="{{ asset('js/admin/login.js?465465') }}" rel="stylesheet" ></script>

@endsection