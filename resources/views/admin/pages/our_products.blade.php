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
                    <input type="hidden" name="page_slug" id="page_slug" value="{{$formObj->page_slug}}">
                        <div class="row ">
                             <div class="col-md-6">
                                    <label class="control-label">Page Title:<span class="required">*</span></label>
                                    {!! Form::text('title',null,['class' => 'form-control','data-required' => true]) !!}
                             </div>
                             <div class="col-md-6">
                                    <label class="control-label">Banner:<span class="required">*</span></label>
                                    {!! Form::file('banner_path',null,['class' => 'custom-file-input form-control', 'data-required' => true]) !!}
                                    <div>&nbsp;</div>
                                    <img src="{{asset('/uploads/store_location/')}}/{{$formObj->banner_path}}" style="width:100px;" class="img-responsive" title="Banner" />
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