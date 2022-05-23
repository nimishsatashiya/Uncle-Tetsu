@extends('frontend.layouts.app')
@section('content')
<main>
      <!-- Page active section start -->
      <div class="page-active-group">
         <a href="javascript:void(0);" class="page-active "></a>
         <a href="javascript:void(0);" class="page-active"></a>
         <a href="javascript:void(0);" class="page-active"></a>
         <a href="javascript:void(0);" class="page-active active"></a>
         <a href="javascript:void(0);" class="page-active"></a>
         <a href="javascript:void(0);" class="page-active"></a>
         <a href="javascript:void(0);" class="page-active"></a>
         <a href="javascript:void(0);" class="page-active "></a>
      </div>
      <!-- Page active section end -->
      <!-- Social group section start -->
      @extends('frontend.includes.social_icon')
      <!-- Social group section end -->
      <!-- Line Animation- section start -->
      <div class="line-group">
         <div>
            <img class="line-main" src="{{asset('themes/frontend/images/')}}/line-main.png" alt="">
            <img class="line-ani" src="{{asset('themes/frontend/images/')}}/line-ani.png" alt="">
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
      <section id="bannerWrap" class="banner-section single-banner">
         <div class="marquee">
            <span class="watermark-text">uncle Tetsu</span>
         </div>
         <div class="custom-padding-x">
            <div class="single-img">
               <div class="item">
                  <img class="w-100" src="{{asset('uploads/product_page/'.$products_content->banner_path)}}" alt="">
                  <img class="slider-center-icon" src="{{asset('themes/frontend/images/')}}/slider-center-icon.svg" alt="">
               </div>
               <a class="down-arrow" href="#FranchisingPage">
                  <img class="w-100" src="{{asset('themes/frontend/images/')}}/down-arrow.svg" alt="">
               </a>
            </div>
         </div>
      </section>
      <!-- Banner section  end -->
      <!-- Our Products page start -->
      <section id="OurProductPage" class="our-product-page">
         <div class="marquee">
            <span class="watermark-text">{{$products_content->title}}</span>
         </div>
         <div class="custom-padding-x">
            <div class="common-style">
               <h2>{{$products_content->title}}</h2>
               <span class="sub-title">Variations & Special Items</span>
               <div class="product-tabs">
                  <ul class="nav nav-tabs">
                     <?php $cat_count=1; $active_category=''; ?>
                     @foreach($product_cat as $cat)
                        <?php
                        $active_class='';
                        if($cat_count=='1'){
                           $active_class="active";
                           $active_category=$cat->category_name;
                           $catgoty_id=$cat->id;
                        }
                        ?>
                        <li><a data-toggle="tab" class="{{$active_class}}" onclick="loadProductsImage({{$cat->id}});" href="#{{$cat->slug}}">{{$cat->category_name}}</a>
                        </li>
                     <?php $cat_count++ ?>
                     @endforeach
                  </ul>

                  <div class="tab-content">
                     <?php $pro_count=1;  ?>
                     @foreach($product_list as $pro)
                        <?php
                        $active_class='';
                        if($pro_count=='1'){
                           $active_class="in active show";
                        }
                        ?>
                     <div id="{{$pro->slug}}" class="tab-pane fade {{$active_class}}">                       
                        <div class="product-tab-main">
                           <div class="product-tab-img">
                              <img src="{{asset('uploads/products/'.$pro->small_image)}}" alt="">
                           </div>
                           <div class="product-tab-text">
                              <h4>{{$pro->product_name}}</h4>
                              {!! $pro->product_desc !!}
                              <div class="ingredient-impo">
                                 <span><img class="" src="{{asset('themes/frontend/images/')}}/true.svg" alt="">{{$pro->lable_one}}</span>
                                 <span><img class="" src="{{asset('themes/frontend/images/')}}/true.svg" alt="">{{$pro->lable_two}}</span>
                                 <span><img class="" src="{{asset('themes/frontend/images/')}}/star.svg" alt="">{{$pro->lable_three}}</span>
                              </div>
                           </div>
                        </div>                             
                     </div>
                     <?php $pro_count++; ?>
                     @endforeach
                  </div>
               </div>
            </div>
         </div>
      </section>

      <section id="OurProductsSlider" class="our-products-section custom-products-slider">
         <div class="marquee">
            <span class="watermark-text">Our Products</span>
         </div>
         <div class="content-wrap">
            <div class="common-style title-wrap">
               <h2>Variations <span id="category_name">{{$active_category}}</span></h2>
            </div>
            <div class="common-style">
               <div class="osjc">
                  <div class="cake-text">
                     <div class="cake">
                        <img class="" src="{{asset('themes/frontend/images/')}}/sec-three-img-icon.svg" alt="">
                     </div>
                     <h3 id="product-name">{{$active_category}}</h3>
                     <img class="product-line" src="{{asset('themes/frontend/images/')}}/product-line.png" alt="">
                  </div>
                  
               </div>
            </div>
         </div>
         <div class="custom-padding-x">
            <div class="owl-slider product-slider">
               <div id="productCarousels" class="owl-carousel">
                  
               </div>
            </div>
         </div>
      </section>
      <!-- Our Products page  end -->
   </main>

@endsection
@section('scripts')
<script type="text/javascript">
$(document).ready(function () {
   var category_id='{{$catgoty_id}}';
   loadProductsImage(category_id);
});
  function loadProductsImage(category_id){
            $('#AjaxLoaderDiv').show();
             $.ajax({
                 type: "GET",
                 url: '/load-products-images',
                 data: {category_id:category_id},
                 success: function (result)
                 {
                     $('#AjaxLoaderDiv').hide();
                     if (result.status == 1)
                     {
                         $("#productCarousels").html(result.html);
                         $("#category_name").html(result.category_name);
                         $('#productCarousels').owlCarousel('destroy'); 
                         $("#productCarousels").owlCarousel({
                            loop: true,
                            autoplay: true,
                            autoplayTimeout: 7000,
                            smartSpeed: 2000,
                            nav: false,
                            dots: true,
                            items: 2,
                            responsiveClass:true,
                            onDragged: setOwlTitel,
                            responsive:{
                                0:{
                                    items:1,
                                    nav:true,
                                    dots: true,
                                },
                                992:{
                                    items:2,
                                    nav:false
                                },
                            }
                          }).on('changed.owl.carousel', function(e) {
                            setOwlTitel(e, true);
                             
                          });
                     }   
                 },
                 error: function (error) {
                     $('#AjaxLoaderDiv').hide();
                     // $.bootstrapGrowl("Internal server error !", {type: 'danger', delay: 4000});
                 }
             });
             return false;
      }

      
</script>
@stop
