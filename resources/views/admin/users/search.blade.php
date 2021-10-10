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
                            <label class="control-label">Created Date Range</label>
                            <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                                <input type="text" class="form-control" value="{{ \Request::get('search_start_date') }}" name="search_start_date" id="start_date" placeholder="Start Date" autocomplete="off">
                                <span class="input-group-addon"> To </span>
                                <input type="text" class="form-control" value="{{ \Request::get('search_end_date') }}" name="search_end_date" id="end_date" placeholder="End Date" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label">IDs</label>
                            <input type="text" value="{{ \Request::get('search_id') }}" class="form-control" name="search_id" />
                        </div>
                        <div class="col-md-4">
                            <label class="control-label">FirstName</label>
                            <input type="text" value="{{ \Request::get('search_fnm') }}" class="form-control" name="search_fnm" />
                        </div>
                        
                    </div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="control-label">LastName</label>
                            <input type="text" value="{{ \Request::get('search_lnm') }}" class="form-control" name="search_lnm" />
                        </div>
                        <div class="col-md-4">
                            <label class="control-label">Email</label>
                            <input type="text" value="{{ \Request::get('search_email') }}" class="form-control" name="search_email" />
                        </div>
                        <div class="col-md-4">
                            <label class="control-label">User Type</label>
                            {!! Form::select('search_type', [''=>'Search User Type'] + $user_types,null, ['class' => 'form-control','id'=>'user_id']) !!}
                        </div>
                    </div>
                    &nbsp;
                    <div class="row" align="center">
                        <input type="submit" class="btn sbold green mTop25" value="Search"/>
                        &nbsp;
                        <a href="{{ $list_url }}" class="btn default mTop25">Reset</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>