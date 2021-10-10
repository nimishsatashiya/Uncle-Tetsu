<div class="row">
    <div class="col-md-12">
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-search"></i>Advance Search
                </div>
                <div class="tools">
                    <a href="javascript:;" class="expand"> </a>
                </div>
            </div>
            
            <div class="portlet-body" style="display: none">
                <form id="search-frm">
                    <div class="row">
                        
                        <div class="col-md-4">
                            <label class="control-label">ID</label>
                            <input type="number" min="0" value="{{ \Request::get('id') }}" class="form-control" name="id" />
                        </div>
                        <div class="col-md-4">
                            <label class="control-label">Found From</label>
                           
                            {!! Form::select('mls_id', [''=>'Search Found From'] + $mls_id ,null, ['class' => 'form-control','id'=>'mls_id']) !!}
                        </div>
                        <div class="col-md-4">
                            <label class="control-label">MLS No</label>
                            <input type="text" value="{{ \Request::get('mls_no') }}" class="form-control" name="mls_no" />
                        </div>
                        
                        
                    </div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="row">
                       
                        <div class="col-md-4">
                            <label class="control-label">State</label>
                            {!! Form::select('state_name', [''=>'Search State'] + $state_name ,null, ['class' => 'form-control','id'=>'state_name']) !!}
                            
                        </div>
                        <div class="col-md-4">
                            <label class="control-label">City</label>
                            
                            {!! Form::select('city_name', [''=>'Search City']  ,null, ['class' => 'form-control','id'=>'city_name']) !!}                            
                            
                        </div>                        

                        <div class="col-md-4">
                            <label class="control-label">Price</label>
                            <div class="input-group input-large ">
                                <input type="number" min="0" class="form-control" value="{{ \Request::get('start_price') }}" name="start_price" id="start_price" placeholder="Start Price" autocomplete="off">
                                <span class="input-group-addon"> To </span>
                                <input type="number" min="0" class="form-control" value="{{ \Request::get('end_price') }}" name="end_price" id="end_price" placeholder="End Price" autocomplete="off">
                            </div>
                        </div> 
                       
                                                
                    </div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="row">                       
                        <div class="col-md-4">
                            <label class="control-label">MLS Type</label>
                            
                            {!! Form::select('mls_type', [''=>'Search MLS Type'] + $mls_type ,null, ['class' => 'form-control','id'=>'mls_type']) !!}
                            
                        </div>                        
                        <div class="col-md-4">
                            <label class="control-label">Modified Time</label>
                            <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                                <input type="text" class="form-control" value="{{ \Request::get('search_start_date') }}" name="search_start_date" id="start_date" placeholder="Start Date" autocomplete="off">
                                <span class="input-group-addon"> To </span>
                                <input type="text" class="form-control" value="{{ \Request::get('search_end_date') }}" name="search_end_date" id="end_date" placeholder="End Date" autocomplete="off">
                            </div>
                        </div> 
                        
                        <div class="col-md-4" align="left">
                            <input type="submit" class="btn sbold green mTop25" value="Search"/>
                            &nbsp;
                            <a href="{{ $list_url }}" class="btn default mTop25">Reset</a>
                        </div>                     
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

