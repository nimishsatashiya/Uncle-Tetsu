@foreach($product_imgs as $image)
 <div class="item">
   <img class="" src="{{asset('uploads/product_images/'.$image->image)}}" alt="{{$image->name}}">
 </div>
@endforeach