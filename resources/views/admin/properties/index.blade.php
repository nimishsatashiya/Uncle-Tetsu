@extends('admin.layouts.app')

@section('content') 
    <div id="divLoading"></div>
    @include($moduleViewName.".search") 

    <div class="row">
        <div class="col-md-12">
            

            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-list"></i>{{ $page_title }}
                    </div>
                    
                </div>
                <div class="portlet-body">
                    <table class="table table-bordered table-striped table-condensed flip-content" id="server-side-datatables">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>                                                              
                                <th width="5%">MLS No</th> 
                                <th width="5%">MLS Type</th> 
                                <th width="5%">City</th>
                                <th width="5%">State</th>  
                                <!-- <th width="5%">Built Year</th>    -->                            
                                <th width="5%">Last Updated</th>
                                <th width="5%" data-orderable="false">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bs-modal-lg" id="property_view" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Property Detail</h4>
        </div>
        <div class="modal-body">
          <table class="table table-bordered" id="property_detail">
            
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">

    function openView($id){
          jQuery('#property_view').modal();     
          $('#AjaxLoaderDiv').fadeIn('slow');
          var credential_url="{{asset('admin/properties/view') }}";   
          $.ajax({
              type: "GET",
              url: credential_url,
              data: 
              {
                  property_id: $id
              },
              success: function (result)
              {
               
                  $("#property_detail").html(result);
                  $('#AjaxLoaderDiv').fadeOut('slow');
              },
              error: function (error) 
              {                
                  $('#AjaxLoaderDiv').fadeOut('slow');
              }
          });
    }
    $(document).ready(function(){

        $("#search-frm").submit(function(){
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
                   
                    data.id = $("#search-frm input[name='id']").val();
                    data.mls_id = $("#search-frm select[name='mls_id']").val();
                    data.mls_no = $("#search-frm input[name='mls_no']").val();                    
                    data.state_name = $("#search-frm select[name='state_name']").val();     
                    data.city_name = $("#search-frm select[name='city_name']").val();                                                    
                    data.start_price = $("#search-frm input[name='start_price']").val();  
                    data.end_price = $("#search-frm input[name='end_price']").val();                   
                    data.year_built = $("#search-frm input[name='year_built']").val();                  
                    data.mls_type = $("#search-frm select[name='mls_type']").val();  
                    data.search_start_date = $("#search-frm input[name='search_start_date']").val();
                    data.search_end_date = $("#search-frm input[name='search_end_date']").val();
                    //data.modified_time = $("#search-frm input[name='modified_time']").val();

                }
            }, 
            lengthMenu:
              [
                [100,500,1000,1500,2000],
                [100,500,1000,1500,2000]
              ],           
            order: [[ "0", "DESC" ]],
            columns: [
                { data: 'id', name: 'id' },                
                { data: 'mls_no', name: 'mls_no' },
                { data: 'mls_type', name: 'mls_type' },                
                { data: 'city_name', name: '{{TBL_CITIES}}.city_name' },
                { data: 'state_name', name: '{{TBL_STATES}}.state_name' },                
                //{ data: 'year_built', name: 'year_built' },                
                { data: 'modified_time', name: '.modified_time' },
                { data: 'action', orderable: false, searchable: false}
               
            ]
        });
    });
</script>
@endsection