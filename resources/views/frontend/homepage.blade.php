
@extends('frontend.layouts.app')
@section('content')
<main>
      <!-- Page active section start -->
      <div class="page-active-group">
         <a href="javascript:void(0);" class="page-active active"></a>
         <a href="javascript:void(0);" class="page-active"></a>
         <a href="javascript:void(0);" class="page-active"></a>
         <a href="javascript:void(0);" class="page-active"></a>
         <a href="javascript:void(0);" class="page-active"></a>
         <a href="javascript:void(0);" class="page-active"></a>
         <a href="javascript:void(0);" class="page-active"></a>
      </div>
      <!-- Page active section end -->
      <!-- Social group section start -->
      @extends('frontend.includes.social_icon')
      <!-- Social group section end -->
      <!-- Line Animation- section start -->
      <div class="line-group">
         <div>
            <img class="line-main" src="{{asset('themes/frontend/images/line-main.png')}}" alt="">
            <img class="line-ani" src="{{asset('themes/frontend/images/line-ani.png')}}" alt="">
         </div>
      </div>
      <!-- Line Animation- section end -->
      <!-- Plean Root start -->
      <section class="svg-path plan-root">
         <div id="rec">
            <div class="circle"></div>
         </div>
        
         <svg fill="none" width="1445" height="8653" viewBox="0 0 1445 8653">
            <path id="path" class="path" data-name="Path 4746"
               d="M12428.7,679.353s-243.437-42.818-243.437,237.351S13626.3,956.236,13630,1237.75s-1363,112.36-1363,428.221,1363-7.043,1363,340.228-1363,165.271-1363,469.968,1363,76.258,1363,399.668-1363,133.359-1363,373.938,1363,242.763,1363,489.792-1367.8,223.855-1363,458.356,1363,209.257,1363,471.565-1359.75,85.289-1363,366.217,1363.21,215.314,1363,506.682-1359.59,75.875-1363,375.621,1363,48.483,1363,341.767-1363,195.644-1363,506.682,1363,120.2,1363,361.2-1363,185.6-1363,481.6,1363,84.838,1363,386.286-1363,182.49-1363,465.041,1363,75.116,1363,384.778-1363,165.674-1363,494.167,1363,69.5,1363,398.078-1361.17,406.635-1363,681.008,1362.73,275.917,1363,396.317"
               transform="translate(-12184.746 -676.507)" fill="none" stroke="#000" stroke-linecap="round"
               stroke-width="1" stroke-dasharray="3 5" />
         </svg>
         
      </section>
      <!-- Plean Root end -->
      <!-- Banner section  start -->
      <section id="bannerWrap" class="banner-section">
         <div class="marquee">
            <span class="watermark-text">uncle Tetsu</span>
         </div>
         <div class="custom-padding-x">
            <div class="owl-slider banner-slider">
               <div id="bannerCarousel" class="owl-carousel">
                  @foreach($banners as $banner)
                  <div class="item">
                     <img class="w-100" src="{{asset('uploads/banner/'.$banner->banner_path)}}" alt="">
                     <img class="slider-center-icon" src="{{asset('themes/frontend/images/slider-center-icon.svg')}}" alt="">
                  </div>
                  @endforeach
               </div>
               <a class="down-arrow" href="#WhoUncleTetsu">
                  <img class="w-100" src="{{asset('themes/frontend/images/down-arrow.svg')}}" alt="">
               </a>
            </div>
         </div>
      </section>
      <!-- Banner section  end -->
      <!-- Who is Uncle Tetsu  section start -->
      <section id="WhoUncleTetsu" class="who-uncle-tetsu-section">
         <div class="marquee">
            <span class="watermark-text">{{$who_uncle->home_title}} </span>
         </div>
         <div class="custom-padding-x">
            <div class="content-wrap">
               <div class="common-style">
                  <h2>{{$who_uncle->home_title}}</h2>
                  <p>{!! $who_uncle->home_text !!}</p>
                  <a href="{{ route('who-uncle-tetsu')}}">Read More <svg xmlns="http://www.w3.org/2000/svg" width="37.646"
                        height="19.65" viewBox="0 0 37.646 19.65">
                        <g id="Group_511" data-name="Group 511"
                           transform="translate(-989.5 1063.162) rotate(-90)">
                           <line id="Line_2" data-name="Line 2" y1="35.142"
                              transform="translate(1053.337 990.5)" fill="none" stroke-linecap="round"
                              stroke-width="2" />
                           <path id="Path_4660" data-name="Path 4660"
                              d="M2513.136,1023.974l8.411,8.411,8.411-8.411"
                              transform="translate(-1468.209 -6.239)" fill="none" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2" />
                        </g>
                     </svg></a>
               </div>
               <img class="sec-one-img-1" src="{{asset('uploads/who_uncle_tetsu/'.$who_uncle->who_uncle_home_img1)}}" alt="">
               <img class="sec-one-img-2" src="{{asset('uploads/who_uncle_tetsu/'.$who_uncle->who_uncle_home_img2)}}" alt="">

            </div>
         </div>
      </section>
      <!-- Who is Uncle Tetsu  section end -->
      <!-- Our Philosophy  section start -->
      <section id="OurPhilosophy" class="our-philosophy-section">
         <div class="marquee">
            <span class="watermark-text">Our Philosophy</span>
         </div>
         <div class="custom-padding-x">
            <div class="content-wrap">
               <div class="common-style">
                  <h2>{{$philosophy->home_title}}</h2>
                  <p>{!! $philosophy->home_text !!}
                  </p>
                  <a href="{{ route('our-philosophy')}}">Read More <svg xmlns="http://www.w3.org/2000/svg" width="37.646"
                        height="19.65" viewBox="0 0 37.646 19.65">
                        <g id="Group_511" data-name="Group 511"
                           transform="translate(-989.5 1063.162) rotate(-90)">
                           <line id="Line_2" data-name="Line 2" y1="35.142"
                              transform="translate(1053.337 990.5)" fill="none" stroke-linecap="round"
                              stroke-width="2" />
                           <path id="Path_4660" data-name="Path 4660"
                              d="M2513.136,1023.974l8.411,8.411,8.411-8.411"
                              transform="translate(-1468.209 -6.239)" fill="none" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2" />
                        </g>
                     </svg></a>
               </div>
               <img class="sec-two-img-1" src="{{asset('uploads/our_philosophy/'.$philosophy->home_img1)}}" alt="">
               <img class="sec-two-img-3" src="{{asset('uploads/our_philosophy/'.$philosophy->home_img3)}}" alt="">
               <img class="sec-two-img-2" src="{{asset('uploads/our_philosophy/'.$philosophy->home_img2)}}" alt="">

            </div>
         </div>
      </section>
      <!-- Our Philosophy  section end -->
      <!-- Our Products  start -->
      <section id="OurProducts" class="our-products-section">
         <div class="marquee">
            <span class="watermark-text">Our Products</span>
         </div>
         <div class="content-wrap">
            <div class="common-style title-wrap">
               <h2>Our Products</h2>
            </div>
            <div class="common-style">
               <div class="osjc">
                  <div class="cake-text">
                     <div class="cake">
                        <img class="" src="{{asset('themes/frontend/images/sec-three-img-icon.svg')}}" alt="">
                     </div>
                     <h3 id="product-name">MATCHA CHEESECAKE</h3>
                     <img class="product-line" src="{{asset('themes/frontend/images/product-line.png')}}" alt="">
                  </div>
                  <a href="{{ route('our-products')}}">See All <svg xmlns="http://www.w3.org/2000/svg" width="37.646"
                        height="19.65" viewBox="0 0 37.646 19.65">
                        <g id="Group_511" data-name="Group 511"
                           transform="translate(-989.5 1063.162) rotate(-90)">
                           <line id="Line_2" data-name="Line 2" y1="35.142"
                              transform="translate(1053.337 990.5)" fill="none" stroke-linecap="round"
                              stroke-width="2" />
                           <path id="Path_4660" data-name="Path 4660"
                              d="M2513.136,1023.974l8.411,8.411,8.411-8.411"
                              transform="translate(-1468.209 -6.239)" fill="none" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2" />
                        </g>
                     </svg></a>
               </div>
            </div>
         </div>
         <div class="custom-padding-x">
            <div class="owl-slider product-slider">
               <div id="productCarousel" class="owl-carousel">
                  @foreach($product_imgs as $image)
                  
                   <div class="item">
                     <img class="" src="{{asset('uploads/product_images/'.$image->image)}}" alt="{{$image->name}}">
                   </div>
                  @endforeach
               </div>
            </div>
         </div>
      </section>
      <!-- Our Products  end -->
      <!-- Blog  section start -->
      <section id="UTBlog" class="blog-section">
         <div class="marquee">
            <span class="watermark-text">Uncle Tetsu's Blog</span>
         </div>
         <div class="custom-padding-x">
            <div class="common-style">
               <h2>Uncle Tetsu's Blog</h2>
            </div>
            <div class="owl-slider blog-slider">
               <div id="blogCarousel" class="owl-carousel">
                  @foreach($blogs as $blog)
                  <div class="item">
                     <div class="content-wrap">
                        <div class="image-group">
                           <img class="sec-four-img-1" src="{{asset('uploads/blog/'.$blog->home_img)}}" alt="">
                           <img class="sec-four-img-2" src="{{asset('uploads/blog/'.$blog->home_img_1)}}" alt="">
                           <img class="sec-four-img-3" src="{{asset('uploads/blog/'.$blog->home_img_2)}}" alt="">
                        </div>
                        <div class="common-style">
                           <span>{{$blog->main_title}} {{$blog->blog_date}}</span>
                           <h3>{{$blog->title}}</h3>
                           <p>{{$blog->home_text}}</p>
                           <a href="{{ url('blog-details/'.$blog->slug)}}">Read More <svg xmlns="http://www.w3.org/2000/svg"
                                 width="37.646" height="19.65" viewBox="0 0 37.646 19.65">
                                 <g id="Group_511" data-name="Group 511"
                                    transform="translate(-989.5 1063.162) rotate(-90)">
                                    <line id="Line_2" data-name="Line 2" y1="35.142"
                                       transform="translate(1053.337 990.5)" fill="none"
                                       stroke-linecap="round" stroke-width="2" />
                                    <path id="Path_4660" data-name="Path 4660"
                                       d="M2513.136,1023.974l8.411,8.411,8.411-8.411"
                                       transform="translate(-1468.209 -6.239)" fill="none"
                                       stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                 </g>
                              </svg></a>
                        </div>

                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
      </section>
      <!-- Blog  section end -->
      <!-- Store Locations  section start -->
      <section id="StoreLocations" class="store-section">
         <div class="marquee">
            <span class="watermark-text">Store Locations</span>
         </div>
         <div class="common-style head-top">
            <h2>Store Locations</h2>
            <p>with corporate & franchise locations in countries all over the world</p>
         </div>
         <div class="location-group">
            <div class="map-wrap">
               <img class="map-img" src="{{asset('themes/frontend/images/map.svg')}}" alt="">
               <!-- <img class="test-img" src="{{asset('themes/frontend/images/test.png')}}" alt=""> -->
               <a class="location-1" href="#" style="display:none;"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
               <a class="location-2" href="#" style="display:none;"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
               <a class="location-3" href="#" style="display:none;"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
               <a class="location-4" href="#" style="display:none;"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
               <a class="location-5" href="#" style="display:none;"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
               <a class="location-6" href="#" style="display:none;"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
               <a class="location-7" href="#" style="display:none;"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
               <a class="location-8" href="#" style="display:none;"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
               <a class="location-9" href="#" style="display:none;"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
               <a class="location-10" href="#" style="display:none;"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
               <a class="location-11" href="#" style="display:none;"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
               <a class="location-12" href="#" style="display:none;"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
               <a class="location-13" href="#" style="display:none;"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
               <a class="location-14" href="#" style="display:none;"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
               <a class="location-15" href="#" style="display:none;"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
               <a class="location-16" href="#"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
               <a class="location-17" href="#"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
               <a class="location-18" href="#"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
               <a class="location-19" href="#"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
               <a class="location-20" href="#"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
               <a class="location-21" href="#"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
               <a class="location-22" href="#"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
               <a class="location-23" href="#"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
               <a class="location-24" href="#" style="display:none;"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
            </div>
         </div>
         <div class="common-style head-top">
            <a href="{{ route('store-location')}}">SEE ALL STORES <svg xmlns="http://www.w3.org/2000/svg" width="37.646"
                  height="19.65" viewBox="0 0 37.646 19.65">
                  <g id="Group_511" data-name="Group 511" transform="translate(-989.5 1063.162) rotate(-90)">
                     <line id="Line_2" data-name="Line 2" y1="35.142" transform="translate(1053.337 990.5)"
                        fill="none" stroke-linecap="round" stroke-width="2" />
                     <path id="Path_4660" data-name="Path 4660" d="M2513.136,1023.974l8.411,8.411,8.411-8.411"
                        transform="translate(-1468.209 -6.239)" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" />
                  </g>
               </svg></a>
         </div>
      </section>
      <!-- Store Locations  section end -->
      <!-- Franchising  section start -->
      <section id="franchising" class="franchising-section">
         <div class="marquee">
            <span class="watermark-text">{{$franchising->title}}</span>
         </div>
         <div class="custom-padding-x">
            <div class="common-style head-top">
               <h2>{{$franchising->title}}</h2>
            </div>
            <div class="content-wrap">
               <img class="sec-six-img-1" src="{{asset('uploads/franchising/'.$franchising->home_img)}}" alt="">
               <div class="common-style">
                  {!! $franchising->home_text !!}
                  <a href="{{ route('franchising')}}">Read More <svg xmlns="http://www.w3.org/2000/svg" width="37.646"
                        height="19.65" viewBox="0 0 37.646 19.65">
                        <g id="Group_511" data-name="Group 511"
                           transform="translate(-989.5 1063.162) rotate(-90)">
                           <line id="Line_2" data-name="Line 2" y1="35.142"
                              transform="translate(1053.337 990.5)" fill="none" stroke-linecap="round"
                              stroke-width="2" />
                           <path id="Path_4660" data-name="Path 4660"
                              d="M2513.136,1023.974l8.411,8.411,8.411-8.411"
                              transform="translate(-1468.209 -6.239)" fill="none" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2" />
                        </g>
                     </svg></a>
               </div>


            </div>
         </div>
      </section>
      <!-- Franchising section end -->
      <!-- Uncle Tetsu Global  section start -->
      <section id="UncleTetsuGlobal" class="uncle-tetsu-global-section">
         <div class="marquee">
            <span class="watermark-text">Uncle Tetsu Canada</span>
         </div>
         <div class="common-style">
            <h2>Uncle Tetsu Canada</h2>
            <p>For all other inquiries, please use the form below, and we will try to get back to you as soon as we can.</p>
            {!! Form::open(['url' => 'contact-form', 'class' => 'custom-form','id' => 'front-form', 'enctype' => 'multipart/form-data']) !!}
               <div class="alert alert-danger" role="alert" id="msg_danger" style="display:none;"></div>
               <div class="alert alert-success" role="alert" id="msg_success" style="display:none;"></div>
               <div class="form-inline input-group">
                  {!! Form::text('full_name',null,['class' => 'form-control','placeholder' => 'NAME *','required' => true]) !!}
                  {!! Form::text('email',null,['class' => 'form-control','placeholder' => 'EMAIL *','required' => true]) !!}
               </div>
               <div class="form-inline input-group">
                  {!! Form::textarea('message',null,['class' => 'form-control', 'rows' => 2, 'placeholder' => 'Message *','required' => true]) !!}
               </div>
               <div class="form-inline text-group">
                  <div class="form-check">
                     <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="is_privacy_check"> Privacy policy applies
                     </label>
                  </div>
                  <span>Note: * is a required field</span>
                  <button type="submit" class="submit-btn">Send <img src="{{asset('themes/frontend/images/black-read-more-arrow.svg')}}"
                        alt=""></button>
               </div>
            {!! Form::close() !!}
         </div>
      </section>
      <!-- Uncle Tetsu Global  section end -->
   </main>
@endsection
@section('scripts')
<script type="text/javascript">
   $(document).ready(function () {
      $("#front-form").validate();

      $('#front-form').submit(function () {
         if ($(this).valid())
         {
             $('#AjaxLoaderDiv').show();
             $.ajax({
                 type: "POST",
                 url: '/newslatter-form',
                 data: new FormData(this),
                 processData: false,
                 contentType: false,
                 success: function (result)
                 {
                     $('#AjaxLoaderDiv').hide();
                     if (result.status == 1)
                     {
                         $("#msg_success").html(result.msg);
                         $("#msg_success").show();
                         $("#msg_danger").hide();
                         $('#front-form')[0].reset();
                     }   
                     else
                     {
                         $("#msg_danger").html(result.msg);
                         $("#msg_danger").show();
                         $("#msg_success").hide();
                     }
                 },
                 error: function (error) {
                     $('#AjaxLoaderDiv').hide();
                     $("#msg_danger").html("Internal server error !");
                     $("#msg_danger").show();
                     $("#msg_success").hide();
                 }
             });
         }
         return false;
      });
   });
</script>
@stop



