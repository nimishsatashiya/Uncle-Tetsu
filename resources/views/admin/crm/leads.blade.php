@extends('admin.layouts.app')

@section('styles')
@endsection
  
@section('content') 
 
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
                                <th width="20%">Firstname</th>
                                <th width="15%">Lastname</th>
                                <th width="15%">Email</th>
                                <th width="15%">Created At</th>
                                <th width="15%">Last Action</th>
                                <th width="20%" data-orderable="false">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  
@endsection

@section('scripts')
<script type="text/javascript">

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
                    data.search_start_date = $("#search-frm input[name='search_start_date']").val();
                    data.search_end_date = $("#search-frm input[name='search_end_date']").val();
                    data.search_id = $("#search-frm input[name='search_id']").val();
                    data.search_fnm = $("#search-frm input[name='search_fnm']").val();
                    data.search_lnm = $("#search-frm input[name='search_lnm']").val();
                    data.search_email= $("#search-frm input[name='search_email']").val();
                }
            },
            lengthMenu:
              [
                [25,50,100,150,200],
                [25,50,100,150,200]
              ],
            order: [[ "0", "DESC" ]],
            columns: [
                { data: 'id', name: 'id' },
                { data: 'firstname', name: 'firstname' },
                { data: 'lastname', name: 'lastname' },
                { data: 'email', name: 'email' },
                { data: 'created_at', name: 'created_at' },
                { data: 'last_action', name: 'last_action' },
                { data: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endsection