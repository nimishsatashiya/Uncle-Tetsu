@extends('admin.layouts.app')

@section('styles')
<style type="text/css">
input[type="file"] {
  display: none;
}
label.todo-add-button{
  display: inline-block;
}
.todo-container .todo-tasks-item>h4>a{
  margin-left: 5px;
}
.dropzone{
    border: 2px dashed #028AF4 !important;
    background: #fff !important;    
}
#due_date{

}
.form-control.taskStatus{
    margin-left: 10px;    
    width: 100% !important;
}

.alert  {
  z-index: 10999 !important;
}

</style>
@endsection
  

@section('content') 
 

        

                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="todo-main-header">
                        <h3>Tasks</h3>
                        <ul class="todo-breadcrumb">
                            <li>
                                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
                            </li>
                        
                            <li>
                                <a class="todo-active" href="">{{Request::segment(2)}}</a>
                            </li>
                        </ul>
                    </div>                   
                      
                    <div class="todo-container">
                        <div class="row">
                            
                            <div class="col-md-7">
                                <div class="todo-tasks-container portlet light">
                                    <div class="portlet-title todo-head">                                        
                                        <a class="btn sbold green btn-default pull-right btn-sm mTop5" href="{{ $add_url }}">New Task </a>
                                        <h3>
                                            <span class="todo-grey">Task
                                        </h3>                                        
                                    </div>
                                    <form id="search-frm">
                                      <div class="pull-right" id="search-task">
                                        <select name="taskStatus" class="form-control taskStatus">
                                          <option value="">All Tasks</option>
                                          <option value="0">Active Tasks</option>
                                          <option value="1">Completed Tasks</option>
                                        </select>
                                      </div>
                                    </form>
                                      <table class="table table-bordered table-striped table-condensed flip-content" id="server-side-datatables"> 

                                          <thead>
                                              <tr>
                                                  <th>Complete</th>                                                  
                                                  <th width="75%">Title</th>
                                                  <th width="75%">Task Status</th>
                                                  <th width="10%">Due Date</th>
                                              </tr>
                                          </thead>                                                                    
                                      </table>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>           
        </div>
       

  <div id="todo-task-modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content scroller" style="height: 100%;" data-always-visible="1" data-rail-visible="0">
                
                <div class="modal-body todo-task-modal-body" id="task_list">
                   
                </div>                                                                                     
            </div>
        </div>
    </div>  
@endsection

@section('scripts')
<script type="text/javascript">
      
       function openView(id){

            var task_view_url="{{ url(route('tasks_view')) }}";             
            $.ajax({
                type: "GET",
                url: task_view_url,
                data: 
                {
                    task_id: id,
                },
                success: function (result)
                {                        
                      jQuery('#todo-task-modal').modal();
                      $("#task_list").html(result.view);
                },
                error: function (error) 
                {                
                    $('#AjaxLoaderDiv').fadeOut('slow');
                }
            });
      }
    
    $(document).ready(function(){
        $('#search-task').on('change', function() { 
            oTableCustom.draw();
            return false;
        });      
        $.fn.dataTableExt.sErrMode = 'throw';

        var oTableCustom = $('#server-side-datatables').DataTable({
            processing: true,
            serverSide: true,
            searching: false,            
            ajax: {
                "url": "{!! route($moduleRouteText.'.data') !!}",  
                 "data": function ( data ) 
                {
                    data.taskStatus = $("#search-task select[name='taskStatus']").val();
                }             
            },
            'columnDefs': [{
               'targets': 0,
               'searchable':false,
               'orderable':false,
               'className': 'dt-body-center',
            }],
            lengthMenu:
              [
                [10,50,100,150,200],
                [10,50,100,150,200]
              ],
            order: [[ "0", "DESC" ]],
           
            columns: [
                { data: 'id', name: 'id' },    
                { data: 'taskView', name: 'title' },                
                { data: 'task_status', name: 'task_status' },                
                { data: 'due_date',name: 'due_date' }, 
            ]
        });
        $('#search-task').appendTo("#server-side-datatables_wrapper .dataTables_length");
       $(".dataTables_length label").addClass("pull-left");
        
    });  
    
</script>
<script type="text/javascript">

function OptionsSelected(id)
{
    var checked = $('input[name="task-'+id+'"]:checked').length > 0;
    if (checked == false) {
      var checkedVal= 0;
    } else {
      var checkedVal= 1 ;
    }

    $.ajax({
        type: "POST",
        url: "{{ route('tasks.statusUpdate') }}",
        data: {statusId: checkedVal,task_id:id}, //--> send id of checked checkbox on other page
        headers: {
          'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        success: function(response) {
          if(response.status==1){            
            alert(response.msg);
            window.location.reload();
          }else{
            alert("You are not authorized person to change status.");            
            window.location.reload();
          }
        },
        error: function() {
          alert('Somethig Missing in Task Status Update');
        }              
    });
}
</script>
@endsection