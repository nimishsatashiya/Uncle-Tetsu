<div class="btn-group">
@if(isset($isEdit) && $isEdit)
<a href="{{ route($currentRoute.'.edit',['id' => $row->id]) }}" class="btn btn-xs btn-primary" title="edit">
    <i class="fa fa-edit"></i>
</a>         
@endif
@if(isset($isImageEdit) && $isImageEdit)
<a href="{{ route($currentRoute.'.edit',['id' => $row->id]) }}" class="btn btn-xs btn-primary" title="edit">
    <i class="fa fa-edit"></i>
</a>         
@endif
@if(isset($isPageEdit) && $isPageEdit)
<a href="{{ route($currentRoute.'.edit',['id' => $row->page_slug]) }}" class="btn btn-xs btn-primary" title="edit">
    <i class="fa fa-edit"></i>
</a>         
@endif

@if(isset($isDelete) && $isDelete)
<a data-id="{{ $row->id }}" href="{{ route($currentRoute.'.destroy',['id' => $row->id]) }}" class="btn btn-xs btn-danger btn-delete-record" title="delete"><i class="fa fa-trash-o"></i>
</a>
@endif
@if(isset($isView) && $isView)

<a data-id="{{ $row->id }}" class="btn btn-xs btn-success" onclick="openView({{$row->id}})" title="view">
    <i class="fa fa-eye"></i>
</a>
@endif
@if(isset($isImage) && $isImage)
<a href="{{ route('products-images.index',['id' => $row->id]) }}" class="btn btn-xs btn-primary" title="Upload more image">
    <i class="fa fa-upload"></i>
</a>
@endif
</div>