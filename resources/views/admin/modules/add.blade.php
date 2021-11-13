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
                    {!! Form::model($formObj,['method' => $method,'files' => true, 'route' => [$action_url,$action_params],'class' => 'sky-form form form-group', 'id' => 'main-frm','redirect-url'=>$list_url]) !!}
                        <div class="row ">
                            <div class="col-md-6">
                                <label class="control-label">Title:<span class="required">*</span></label>
                                {!! Form::text('title',null,['class' => 'form-control', 'data-required' => true]) !!}
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Order No:<span class="required">*</span></label>
                                {!! Form::text('order_index',null,['class' => 'form-control','data-required' => true]) !!}
                             </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="row ">
                             <div class="col-md-6">
                                <label class="control-label">Class:<span class="required">*</span></label>
                                {!! Form::text('module_class',null,['class' => 'form-control','data-required' => true]) !!}
                             </div>
                             <div class="col-md-6">
                                <label class="control-label">Select Group Title <span class="required">*</span></label>
                                {!! Form::select('admin_group_titles_id',['' => 'select Type']+$admin_group_titles,null,['class' => 'form-control', 'data-required' => true,'id'=>'user_id']) !!}
                            </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="row ">
                            <div class="col-md-3">
                                <label class="control-label">Is Sub Menu<span class="required">*</span></label>
                                {!! Form::select('is_sub_menu', [''=>'Is Sub Menu', 'Y'=>'Y', 'N'=>'N'], NULL, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-3">
                                  <label class="control-label">Show In Menu<span class="required">*</span></label>
                                  {!! Form::select('show_in_menu', [''=>'Show In Menu', 'Y'=>'Y', 'N'=>'N'], Request::get("search_pageGroup"), ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-2">
                                  <label class="control-label">Link Type<span class="required">*</span></label>
                                  {!! Form::select('link_type', [''=>'Link Type', '1'=>'Internal', '0'=>'External'], Request::get("search_pageGroup"), ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Url<span class="required"></span></label>
                                {!! Form::text('url',null,['class' => 'form-control']) !!}
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
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@endsection