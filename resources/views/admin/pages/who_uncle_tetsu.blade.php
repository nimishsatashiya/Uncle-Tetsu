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
                                <label class="control-label">Home Page Title:<span class="required">*</span></label>
                                {!! Form::text('home_title',null,['class' => 'form-control','data-required' => true]) !!}
                             </div>
                             <div class="col-md-6">
                                <label class="control-label">Home Page Text:<span class="required">*</span></label>
                                {!! Form::textarea('home_text',null,['class' => 'custom-file-input form-control', 'data-required' => true]) !!}
                            </div>
                             <div class="col-md-6">
                                <label class="control-label">Home Page Image 1:<span class="required">*</span></label>
                                {!! Form::file('who_uncle_home_img1',null,['class' => 'custom-file-input form-control', 'data-required' => true]) !!}
                                <div>&nbsp;</div>
                                <img src="{{asset('/uploads/who_uncle_tetsu/')}}/{{$formObj->who_uncle_home_img1}}" style="width:100px;" class="img-responsive" title="Banner" />
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Home Page Image 2:<span class="required">*</span></label>
                                {!! Form::file('who_uncle_home_img2',null,['class' => 'custom-file-input form-control', 'data-required' => true]) !!}
                                <div>&nbsp;</div>
                                <img src="{{asset('/uploads/who_uncle_tetsu/')}}/{{$formObj->who_uncle_home_img2}}" style="width:100px;" class="img-responsive" title="Banner" />
                            </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="row ">
                            <div class="col-md-6">
                                <label class="control-label">Banner:<span class="required">*</span></label>
                                {!! Form::file('banner_path',null,['class' => 'custom-file-input form-control', 'data-required' => true]) !!}
                                <div>&nbsp;</div>
                                <img src="{{asset('/uploads/who_uncle_tetsu/')}}/{{$formObj->banner_path}}" style="width:100px;" class="img-responsive" title="Banner" />
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Page Title:<span class="required">*</span></label>
                                {!! Form::text('title',null,['class' => 'form-control','data-required' => true]) !!}
                             </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="row ">
                            <div class="col-md-12">
                                <label class="control-label">Section 1 Full Text:<span class="required">*</span></label>
                                {!! Form::textarea('sec1_full_text',null,['class' => 'custom-file-input form-control', 'data-required' => true]) !!}
                            </div>
                            
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="row ">
                            <div class="col-md-6">
                                <label class="control-label">Section 1 Left Image 1:<span class="required">*</span></label>
                                {!! Form::file('sec1_left_img1',null,['class' => 'custom-file-input form-control', 'data-required' => true]) !!}
                                <div>&nbsp;</div>
                                <img src="{{asset('/uploads/who_uncle_tetsu/')}}/{{$formObj->sec1_left_img1}}" style="width:100px;" class="img-responsive" title="Banner" />
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Section 1 Right Text 1:<span class="required">*</span></label>
                                {!! Form::textarea('sec1_right_text1',null,['class' => 'custom-file-input form-control', 'data-required' => true]) !!}
                            </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="row ">
                            <div class="col-md-6">
                                <label class="control-label">Section 1 Left Text 2:<span class="required">*</span></label>
                                {!! Form::textarea('sec1_left_text2',null,['class' => 'custom-file-input form-control', 'data-required' => true]) !!}
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Section 1 Right Image 2:<span class="required">*</span></label>
                                {!! Form::file('sec1_right_img2',null,['class' => 'custom-file-input form-control', 'data-required' => true]) !!}
                                <div>&nbsp;</div>
                                <img src="{{asset('/uploads/who_uncle_tetsu/')}}/{{$formObj->sec1_right_img2}}" style="width:100px;" class="img-responsive" title="Banner" />
                            </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="row ">
                            <div class="col-md-6">
                                <label class="control-label">Section 1 Right Text 3:<span class="required">*</span></label>
                                {!! Form::textarea('sec1_left_text3',null,['class' => 'custom-file-input form-control', 'data-required' => true]) !!}
                            </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="row ">
                            <div class="col-md-6">
                                <label class="control-label">Section 2 Left Text 1:<span class="required">*</span></label>
                                {!! Form::textarea('sec2_left_text1',null,['class' => 'custom-file-input form-control', 'data-required' => true]) !!}
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Section 2 Right Image 1:<span class="required">*</span></label>
                                {!! Form::file('sec2_right_img1',null,['class' => 'custom-file-input form-control', 'data-required' => true]) !!}
                                <div>&nbsp;</div>
                                <img src="{{asset('/uploads/who_uncle_tetsu/')}}/{{$formObj->sec2_right_img1}}" style="width:100px;" class="img-responsive" title="Banner" />
                                
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="col-md-6">
                                <label class="control-label">Section 2 Left Image 2:<span class="required">*</span></label>
                                {!! Form::file('sec2_left_img2',null,['class' => 'custom-file-input form-control', 'data-required' => true]) !!}
                                <div>&nbsp;</div>
                                <img src="{{asset('/uploads/who_uncle_tetsu/')}}/{{$formObj->sec2_left_img2}}" style="width:100px;" class="img-responsive" title="Banner" />
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Section 2 Left Text 2:<span class="required">*</span></label>
                                {!! Form::textarea('sec2_left_text2',null,['class' => 'custom-file-input form-control', 'data-required' => true]) !!}
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="col-md-6">
                                <label class="control-label">Section 2 Left Text 3:<span class="required">*</span></label>
                                {!! Form::textarea('sec2_left_text3',null,['class' => 'custom-file-input form-control', 'data-required' => true]) !!}
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