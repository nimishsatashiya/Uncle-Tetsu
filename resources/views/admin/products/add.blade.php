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
                                <label class="control-label">Product name<span class="required">*</span></label>
                                {!! Form::text('product_name',null,['class' => 'form-control','data-required' => true]) !!}
                            </div>
                            
                             <div class="col-md-6">
                                <label class="control-label">Category:<span class="required">*</span></label>
                                {!! Form::select('product_category_id', [''=>'Select Category']+$categories, null, ['class' => 'form-control','data-required' => true]) !!}
                             </div>
                             <div class="clearfix">&nbsp;</div>
                             <div class="col-md-6">
                                <label class="control-label">Product Small Images<span class="required">*</span></label>
                                {!! Form::file('small_image',null,['class' => 'form-control', 'data-required' => true]) !!}
                                @if($formObj->small_image)
                                <img src="{{asset('/uploads/products/')}}/{{$formObj->small_image}}" style="width:100px;" class="img-responsive" title="Banner" />
                                @endif
                             </div>
                             <div class="col-md-6">
                                <label class="control-label">Product Large Images<span class="required">*</span></label>
                                {!! Form::file('large_image',null,['class' => 'form-control', 'data-required' => true]) !!}
                                @if($formObj->large_image)
                                <img src="{{asset('/uploads/products/')}}/{{$formObj->large_image}}" style="width:100px;" class="img-responsive" title="Banner" />
                                @endif
                             </div>
                             <div class="clearfix">&nbsp;</div>
                             <div class="col-md-12">
                                <label class="control-label">Description<span class="required">*</span></label>
                                {!! Form::textarea('product_desc',null,['class' => 'form-control editor', 'data-required' => true]) !!}
                             </div>
                             <div class="clearfix">&nbsp;</div>
                             <div class="col-md-6">
                                <label class="control-label">Lable One<span class="required">*</span></label>
                                {!! Form::text('lable_one',null,['class' => 'form-control','data-required' => true]) !!}
                             </div>
                             <div class="col-md-6">
                                <label class="control-label">Lable Two<span class="required">*</span></label>
                                {!! Form::text('lable_two',null,['class' => 'form-control','data-required' => true]) !!}
                             </div>
                             <div class="clearfix">&nbsp;</div>
                             <div class="col-md-6">
                                <label class="control-label">Lable Three<span class="required">*</span></label>
                                {!! Form::text('lable_three',null,['class' => 'form-control','data-required' => true]) !!}
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