@extends('admin.layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list"></i>
                    {{ $page_title }}
                </div>
                <a class="btn default pull-right btn-sm mTop5" href="{{ $list_url }}">Back</a>
            </div>

            <div class="portlet-body">
                <div class="form-body">
                    {!! Form::model($formObj,['method' => $method,'files' => true, 'route' => [$action_url,$action_params],'class' => 'sky-form form form-group', 'id' => 'main-blog-frm','redirect-url'=>$list_url]) !!}
                        <div class="row ">
                            <div class="col-md-6">
                                <label class="control-label">Home Image 1:<span class="required">*</span></label>
                                {!! Form::file('home_img',null,['class' => 'form-control', 'data-required' => true]) !!}
                                @if($formObj->home_img)
                                <img src="{{asset('/uploads/blog/')}}/{{$formObj->home_img}}" style="width:100px;" class="img-responsive" title="Banner" />
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Home Image 2:<span class="required">*</span></label>
                                {!! Form::file('home_img_1',null,['class' => 'form-control', 'data-required' => true]) !!}
                                @if($formObj->home_img_1)
                                <img src="{{asset('/uploads/blog/')}}/{{$formObj->home_img_1}}" style="width:100px;" class="img-responsive" title="Banner" />
                                @endif
                            </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="row ">
                            <div class="col-md-6">
                                <label class="control-label">Home Image 3:<span class="required">*</span></label>
                                {!! Form::file('home_img_2',null,['class' => 'form-control', 'data-required' => true]) !!}
                                @if($formObj->home_img_2)
                                <img src="{{asset('/uploads/blog/')}}/{{$formObj->home_img_2}}" style="width:100px;" class="img-responsive" title="Banner" />
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Blog Date:<span class="required">*</span></label>
                                {!! Form::text('blog_date',null,['class' => 'form-control blog_date','data-required' => true]) !!}
                             </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="row ">
                            <div class="col-md-6">
                                <label class="control-label">Main Title:<span class="required">*</span></label>
                                {!! Form::text('main_title',null,['class' => 'form-control','data-required' => true]) !!}
                             </div>
                             <div class="col-md-6">
                                <label class="control-label">Title:<span class="required">*</span></label>
                                {!! Form::text('title',null,['class' => 'form-control','data-required' => true]) !!}
                            </div>
                        </div> 
                        
                        <div class="clearfix">&nbsp;</div> 
                        <div class="row ">
                            <div class="col-md-12">
                                <label class="control-label">Text:<span class="required">*</span></label>
                                {!! Form::textarea('description',null,['class' => 'form-control editor','id' => 'editor', 'data-required' => true,'rows'=>'10','cols'=>'10']) !!}
                            </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>                       
                        <div class="row">
                            <div class="col-md-12">
                                <a class="btn default pull-right mrgleft10" href="{{ $list_url }}">Cancel</a>
                                <input type="submit" value="{{ $buttonText}}" class="btn btn-success pull-right" id="submitBtn" />
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script src="{{ asset('js/admin/ckeditor.js?0111202') }}"></script>

<script type="text/javascript">
            ClassicEditor
                .create( document.querySelector( '.editor' ), {
                    // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
                } )
                .then( editor => {
                    window.editor = editor;
                } )
                .catch( err => {
                    console.error( err.stack );
                } );

            $(document).on('click', '.btn-delete-record', function () {

                $text = 'Are you sure ?';

                if ($(this).attr('title') == "delete user")
                {
                    $text = 'Are you sure you want to delete this user ?';
                }

                if (confirm($text))
                {
                    $url = $(this).attr('href');
                    $('#global_delete_form').attr('action', $url);
                    $('#global_delete_form #delete_id').val($(this).data('id'));
                    $('#global_delete_form').submit();
                }

                return false;
            });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.blog_date').datepicker({  
          format: 'yyyy-mm-dd'
        });  

        $('#main-blog-frm').submit(function () {
        
        if ($(this).parsley('isValid'))
        {
            for (instance in ClassicEditor.instances) {
                ClassicEditor.instances[instance].updateElement();
            }

            $('#submitBtn').attr('disabled',true);
            $('#AjaxLoaderDiv').fadeIn('slow');
            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: new FormData(this),
                contentType: false,
                processData: false,
                enctype: 'multipart/form-data',
                success: function (result)
                {
                    $('#AjaxLoaderDiv').fadeOut('slow');
                    if (result.status == 1)
                    {
                        $.bootstrapGrowl(result.msg, {type: 'success', delay: 4000});
                        window.location = $('#main-blog-frm').attr("redirect-url");
                    }
                    else
                    {
                        $('#submitBtn').attr('disabled',false);
                        $.bootstrapGrowl(result.msg, {type: 'danger', delay: 4000});
                    }
                    $('#submitBtn').attr('disabled',false);
                },
                error: function (error) {
                    $('#submitBtn').attr('disabled',false);
                    $('#AjaxLoaderDiv').fadeOut('slow');
                    $.bootstrapGrowl("Internal server error !", {type: 'danger', delay: 4000});
                }
            });
        }            
        return false;
    });
    });
</script>
@endsection