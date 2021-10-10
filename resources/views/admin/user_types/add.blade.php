@extends('admin.layouts.app')

@section('styles')
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>
                   {{ $page_title }}
                </div>
                <a class="btn default pull-right btn-sm mTop5" href="{{ $list_url }}">Back</a>
            </div>            
            <div class="portlet-body">
                <div class="form-body">
                    {!! Form::model($formObj,['method' => $method,'files' => true, 'route' => [$action_url,$action_params],'class' => 'sky-form form form-group', 'id' => 'main-frm','redirect-url'=>$list_url]) !!}
                        <div class="row ">
                            <div class="col-md-12">
                                <label class="control-label">Title:<span class="required">*</span></label>
                                {!! Form::text('title',null,['class' => 'form-control', 'data-required' => true]) !!}
                            </div>                            
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="row">
                            <div class="col-md-12">
                                <a class="btn default pull-right mrgleft10" href="{{ $list_url }}">Cancel</a>
                                <input type="submit" value="{{ $buttonText}}" class="btn btn-success pull-right" id="submitBtn"/>
                                
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>                 
    </div>
</div>
@endsection

