@extends('admin.layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list"></i>
                    {{ $page_title }} : Our Philosophy
                </div>
                <a class="btn default pull-right btn-sm mTop5" href="{{ $list_url }}">Back</a>
            </div>

            <div class="portlet-body">
                <div class="form-body">
                    {!! Form::model($formObj,['method' => $method,'files' => true, 'route' => [$action_url,$action_params],'class' => 'sky-form form form-group', 'id' => 'main-frm','redirect-url'=>$list_url]) !!}
                    <input type="hidden" name="page_slug" id="page_slug" value="{{$formObj->page_slug}}">
                        <div class="row ">
                            
                            <div class="col-md-6">
                                <label class="control-label">Home Page Title:<span class="required">*</span></label>
                                {!! Form::text('home_title',null,['class' => 'form-control','data-required' => true]) !!}
                             </div>
                             <div class="col-md-6">
                                <label class="control-label">Home Page Text:<span class="required">*</span></label>
                                {!! Form::textarea('home_text',null,['class' => 'form-control ckeditor', 'data-required' => true]) !!}
                            </div>
                             <div class="col-md-6">
                                <label class="control-label">Home Page Image 1:<span class="required">*</span></label>
                                {!! Form::file('home_img1',null,['class' => 'form-control', 'data-required' => true]) !!}
                                <div>&nbsp;</div>
                                <img src="{{asset('/uploads/our_philosophy/')}}/{{$formObj->home_img1}}" style="width:100px;" class="img-responsive" title="Banner" />
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Home Page Image 2:<span class="required">*</span></label>
                                {!! Form::file('home_img2',null,['class' => 'form-control', 'data-required' => true]) !!}
                                <div>&nbsp;</div>
                                <img src="{{asset('/uploads/our_philosophy/')}}/{{$formObj->home_img2}}" style="width:100px;" class="img-responsive" title="Banner" />
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Home Page Image 3:<span class="required">*</span></label>
                                {!! Form::file('home_img3',null,['class' => 'form-control', 'data-required' => true]) !!}
                                <div>&nbsp;</div>
                                <img src="{{asset('/uploads/our_philosophy/')}}/{{$formObj->home_img3}}" style="width:100px;" class="img-responsive" title="Banner" />
                            </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="row ">
                            <div class="col-md-6">
                                <label class="control-label">Banner:<span class="required">*</span></label>
                                {!! Form::file('banner_path',null,['class' => 'form-control', 'data-required' => true]) !!}
                                <div>&nbsp;</div>
                                <img src="{{asset('/uploads/our_philosophy/')}}/{{$formObj->banner_path}}" style="width:100px;" class="img-responsive" title="Banner" />
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Page Title:<span class="required">*</span></label>
                                {!! Form::text('title',null,['class' => 'form-control','data-required' => true]) !!}
                             </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="row ">
                            <div class="col-md-6">
                                <label class="control-label">Section 1 Image 1:<span class="required">*</span></label>
                                {!! Form::file('sec1_img1',null,['class' => 'form-control', 'data-required' => true]) !!}
                                <div>&nbsp;</div>
                                <img src="{{asset('/uploads/our_philosophy/')}}/{{$formObj->sec1_img1}}" style="width:100px;" class="img-responsive" title="Banner" />
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Section 1 Image 2:<span class="required">*</span></label>
                                {!! Form::file('sec1_img2',null,['class' => 'form-control', 'data-required' => true]) !!}
                                <div>&nbsp;</div>
                                <img src="{{asset('/uploads/our_philosophy/')}}/{{$formObj->sec1_img2}}" style="width:100px;" class="img-responsive" title="Banner" />
                            </div>
                            
                            <div class="col-md-12">
                                <label class="control-label">Section 1 Text 1:<span class="required">*</span></label>
                                {!! Form::textarea('sec1_text1',null,['class' => 'form-control ckeditor', 'data-required' => true]) !!}
                            </div>
                            
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="row ">
                            <div class="col-md-6">
                                <label class="control-label">Section 2 Image 1:<span class="required">*</span></label>
                                {!! Form::file('sec2_img1',null,['class' => 'form-control', 'data-required' => true]) !!}
                                <div>&nbsp;</div>
                                <img src="{{asset('/uploads/our_philosophy/')}}/{{$formObj->sec2_img1}}" style="width:100px;" class="img-responsive" title="Banner" />
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Section 2 Text 1:<span class="required">*</span></label>
                                {!! Form::textarea('sec2_text1',null,['class' => 'form-control ckeditor', 'data-required' => true]) !!}
                            </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="row ">
                            <div class="col-md-6">
                                <label class="control-label">Section 2 Image 2:<span class="required">*</span></label>
                                {!! Form::file('sec2_img2',null,['class' => 'form-control', 'data-required' => true]) !!}
                                <div>&nbsp;</div>
                                <img src="{{asset('/uploads/our_philosophy/')}}/{{$formObj->sec2_img2}}" style="width:100px;" class="img-responsive" title="Banner" />
                            </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="row ">
                            <div class="col-md-6">
                                <label class="control-label">Section 3 Image 1:<span class="required">*</span></label>
                                {!! Form::file('sec3_img1',null,['class' => 'form-control', 'data-required' => true]) !!}
                                <div>&nbsp;</div>
                                <img src="{{asset('/uploads/our_philosophy/')}}/{{$formObj->sec3_img1}}" style="width:100px;" class="img-responsive" title="Banner" />
                                
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Section 3 Text 1:<span class="required">*</span></label>
                                {!! Form::textarea('sec3_text1',null,['class' => 'form-control ckeditor', 'data-required' => true]) !!}
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