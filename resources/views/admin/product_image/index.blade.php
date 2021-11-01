@extends('admin.layouts.app')

@section('styles')
@endsection
  
@section('content') 
    <input type="hidden" name="product_id" id="product_id" value="{{$product_id}}">
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light">
                <div class="portlet-title tabbable-line">
                    <div class="caption">
                        <i class="fa fa-list"></i>{{ $page_title }}
                    </div>
                    @if(true)
                        <a class="btn sbold green btn-default pull-right btn-sm mTop5" href="{{ $add_url }}">Add New <i class="fa fa-plus"></i> </a>
                    @endif
                </div>
                <div class="portlet-body">                    
                    <table class="table table-bordered table-striped table-condensed flip-content" id="server-side-datatables">
                        <thead>
                            <tr>                                   
                                <th width="75%">Name</th>                                         
                                <th width="15%">Image</th>                                       
                                <th width="10%" data-orderable="false">Action</th>
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
                    data.search_text = $("#search-frm input[name='search_text']").val();
                    data.product_id = $("#product_id").val();
                }
            },            
            order: [[ "0", "DESC" ]],
            columns: [
                { data: 'name', name: 'name' },
                { data: 'image', name: 'image' },
                { data: 'action', orderable: false, searchable: false}             
            ]
        });        
    });
    </script>
@endsection