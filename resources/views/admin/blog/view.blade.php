{!! Form::model($formObj,['method' => $method,'files' => true, 'route' => [$action_url,$action_params],'class' => 'sky-form form form-group', 'id' => 'main-frm','redirect-url'=>$list_url]) !!} 
	
	<div class="portlet-title">
	    <button class="btn default pull-right btn-sm mTop5" data-dismiss="modal" aria-hidden="true">Close</button>
	    <button class="btn btn-square btn-sm green todo-bold ">Complete Task</button>
	    <p class="todo-task-modal-title todo-inline">Due:                    
	        {!! Form::text('due_date',null,['class' => 'form-control input-inline input-medium date-picker todo-task-due todo-inline parsley-validated','id' => 'due_date', 'data-required' => true,'placeholder' => 'Select Date', 'autocomplete' => "off"]) !!}	    
	    </p>
	    
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
	        {!! Form::textarea('description',null,['class' => 'form-control', 'data-required' => true, 'rows' => 15]) !!}
	    </div>
	</div>                                                         
	<div class="clearfix">&nbsp;</div>
	<div class="form-group">                        
	    <div class="needsclick dropzone" id="document-dropzone">
	       	
	    </div>
	    
	</div>
	
	{{ Form::hidden('taskID', $action_params, array('id' => 'taskID')) }} 
	@if(!empty($imagArry))
		@foreach($imagArry as $imagArr)			
		 	<span class="rmvImg" data-id="{{$imagArr->id}}" style="display: inline-block; vertical-align: top;">
		 		@php
		 		
			 		$ext = url('/uploads/tasks/').'/'.$action_params.'/'.$imagArr->temp_name;
			 		$info = pathinfo($ext);
			 		$extension = $info['extension'];
		 		@endphp
		 		@if($extension =='pdf' || $extension =='doc' || $extension =='docs')
		 			<a target="_blank" href="{{url('/uploads/tasks/').'/'.$action_params.'/'.$imagArr->temp_name}}">{{$imagArr->name}}</a>
		 		@else
		 			<img src="{{url('/uploads/tasks/').'/'.$action_params.'/'.$imagArr->temp_name}}" width="75px" height="75px" class="css-class" alt="{{$ext}}">	
		 		@endif
 				
				<i class="fa fa-times todo-remove-file" data-id="{{$imagArr->id}}" style="display: block;margin-top: 10px;text-align: center;">			
				</i>
			</span>			
		@endforeach		
	@endif
	
	<div class="row">
	    <div class="col-md-12">	        
	        <button class="btn default pull-right mrgleft10" data-dismiss="modal" aria-hidden="true">Cancel</button>
	        <input type="submit" value="{{ $buttonText}}" class="btn btn-success pull-right" id="submitBtn"/>
	    </div>
	</div>
	
{!! Form::close() !!}
<script src="{{ asset('js/admin/custom.js?452452') }}" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){	   	
   	var Setdateval = $("#due_date").val();
   	var dateAr = Setdateval.split('-');
	var newDate = dateAr[1] + '/' + dateAr[2] + '/' + dateAr[0];	
   	$('#due_date').datepicker('setDate', newDate);   	
   	var APP_URL = {!! json_encode(url('/')) !!}
   	var taskID = $('#taskID').val();
   	var routeUrl = "{{ route('tasks.updateMedia') }}";
   	var updateMedia = routeUrl + '/' +taskID;   	
   	var delUrl = "{{ route('tasks.delelteUpdatedMedia') }}";
   	var delMedia = delUrl + '/' +taskID;   	
   	Dropzone.autoDiscover = false; 
	$("div#document-dropzone").dropzone({
		url: updateMedia,
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
             $('#main-frm').append('<input type="hidden" id="'+response.id+'" name="document[]" value="' + response.id + '">');
             $(".dz-preview:last-child").attr('id', "document-" + response.id); 
             file.id = response.id;         
          } 
        },
        removedfile: function (file) {
          var id = file.id;              
          var fileOBJ = file;
          $.ajax({
                url: delMedia,
                type: "POST",
                data: {deleteId: id},                
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
	});	
	$(".todo-remove-file").on("click", function(){
		var dataId = $(this).attr("data-id");
		if (confirm('Are you sure to delete this file ?')) {
		        $.ajax({
		        type: "POST",
		        url: delMedia,
		        data: {deleteId: dataId},      //--> send id of checked checkbox on other page
		        headers: {
		          'X-CSRF-TOKEN': "{{ csrf_token() }}"
		        },
		        success: function(response) {
		          if(response.status==1){
		            
		            $('.rmvImg[data-id^="'+ dataId +'"]').remove();
		            alert(response.msg); 	 		            
		          }else{
		            alert(response.msg);            
		          }
		        },
		        error: function() {
		          alert('Somethig Missing in Task Status Update');
		        }              
		    });
	    }	    

	});
});

</script>