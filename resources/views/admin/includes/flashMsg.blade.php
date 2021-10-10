@if(Session::has('success_message'))
<div class="note note-success alert">
    <p>{!! Session::get('success_message')!!}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
    </p>
</div>
@endif

@if(Session::has('error_message'))
<div class="note note-danger alert">
    <p> {{ Session::get('error_message')}}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
    </p>
</div>   
@endif
