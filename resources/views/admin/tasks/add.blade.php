@extends('admin.layouts.app')

@section('styles')
<style type="text/css">
.taskModule .todo-add-button {
    border: 1px solid #e0e6e9;
    background-color: #fff;
    color: #c1cbd1;
    text-decoration: none;
    padding: 0 .4em;
    font-size: 20px;
    margin: -.3em 0 0 .5em;    
}
.taskModule .portlet-title{
    margin-bottom: 25px;
}
.taskModule .red.todo-bold{
    margin-right: 10px;
}
.taskModule .todo-inline{
    margin-left: 2em;
}
.taskModule .todo-task-due{
    margin-left: 1em;
    font-weight: 600;
    color: #4db3a4;
    width: 150px!important;
}
.taskModule .selFile{
    height: 50px;
    width: 50px;
}
.taskModule .dropzone{
    border: 2px dashed #028AF4 !important;
    background: #fff !important;    
}
</style>
@endsection

@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="portlet light taskModule">
           
            <div class="portlet-body">
                <div class="form-body">   
                {!! Form::model($formObj,['method' => $method,'files' => true, 'route' => [$action_url,$action_params],'class' => 'sky-form form form-group', 'id' => 'main-frm','redirect-url'=>$list_url]) !!} 
                    <div class="portlet-title">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <button class="btn btn-square btn-sm red todo-bold ">Complete Task</button>
                        <a class="btn default pull-right btn-sm mTop5" href="{{ $list_url }}">Back</a>
                        <span class="todo-task-modal-title">Due:                    
                            {!! Form::text('due_date',null,['class' => 'form-control input-inline input-medium date-picker todo-task-due todo-inline','id' => 'due_date', 'data-required' => true,'placeholder' => 'Select Date', 'autocomplete' => "off"]) !!}
                        </span>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="control-label">Task Title<span class="required">*</span></label>                                        
                            {!! Form::text('title',null,['class' => 'form-control', 'data-required' => true]) !!}
                        </div>
                    </div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="row">                                    
                        <div class="col-md-12">
                            <label class="control-label">Task Description<span class="required">*</span></label>
                            {!! Form::textarea('description',null,['class' => 'form-control', 'data-required' => true, 'rows' => 5]) !!}
                        </div>
                    </div>                                                         
                    <div class="clearfix">&nbsp;</div>
                    <div class="form-group">                        
                        <div class="needsclick dropzone" id="document-dropzone">
                        </div>
                    </div>                                        
                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn default pull-right mrgleft10" href="{{ $list_url }}">Cancel</a>
                            <input type="submit" value="{{ $buttonText}}" class="btn btn-success pull-right" id="submitBtn"/>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            
        </div>                 
    </div>
</div>
    
@endsection

@section('scripts')
<script>  
    Dropzone.options.documentDropzone = {
        url: '{{ route('tasks.storeMedia') }}',
        maxFilesize: 2, // MB
        addRemoveLinks: true,
        dictDefaultMessage: 'Drop files here or click to upload.',
        headers: {
          'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        success: function (file, response) 
        {
          if(response.status == 1)
          {            
             $('#main-frm').append('<input type="hidden" name="document[]" value="' + response.id + '">');
             $(".dz-preview:last-child").attr('id', "document-" + response.id); 
             file.id = response.id;         
          } 
        },
        removedfile: function (file) {
          var id = file.id;  
 
          var fileOBJ = file;
          
          $.ajax({
                url: '{{ route('tasks.deleteMedia') }}',
                type: "POST",
                data: {tempId: id},                
                headers: 
                {
                  'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(response)
                {
                    fileOBJ.previewElement.remove();                
                }
          });
          $('#main-frm').find('input[name="document[]"][value="' + id + '"]').remove();
        },
    }
</script>
@stop