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
                    <label class="control-label">Title</label>
                    <input type="text" value="{{ \Request::get("search_text") }}" class="form-control" name="search_text" />
                </div>
                <div class="col-md-4">
                    <input type="submit" class="btn sbold green mTop25" value="Search"/>
                    &nbsp;
                    <a href="{{ $list_url }}" class="btn default mTop25">Reset</a>
                </div>
            </div>
        </form>
    </div>
</div>    
