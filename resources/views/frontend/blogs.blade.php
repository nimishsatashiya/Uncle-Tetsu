@extends('frontend.layouts.app')
@section('content')
<main>
        <!-- Page active section start -->
        <div class="page-active-group">
            <a href="javascript:void(0);" class="page-active "></a>
            <a href="javascript:void(0);" class="page-active"></a>
            <a href="javascript:void(0);" class="page-active"></a>
            <a href="javascript:void(0);" class="page-active"></a>
            <a href="javascript:void(0);" class="page-active active"></a>
            <a href="javascript:void(0);" class="page-active"></a>
            <a href="javascript:void(0);" class="page-active "></a>
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
                <span class="watermark-text">Uncle Tetsu's Blog</span>
            </div>
            <div class="custom-padding-x">
                <div class="single-img">
                    <div class="item">
                        <img class="w-100" src="{{asset('uploads/blog_page/'.$blog_page->banner_path)}}" alt="">
                    </div>
                    <a class="down-arrow" href="#BlogDetail">
                        <img class="w-100" src="{{asset('themes/frontend/images/')}}/down-arrow.svg" alt="">
                    </a>
                </div>
            </div>
        </section>
        <!-- Banner section  end -->
        <!-- Franchising Page start -->
        <section id="BlogDetail" class="blog__page">
            <div class="marquee">
                <span class="watermark-text">Uncle Te tsu's Blog</span>
            </div>
            <div class="custom-padding-x">
                <div class="row">
                    <div class="col-12">
                        <div class="common-style blogs-head">
                            <h2>Uncle Tetsu's Blog</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="blog-before">
            <div class="custom-padding-x ">
                <div class="row">
                    <div class="col-12">
                        <div class="blog_wrapper">

                           <?php $blog_count=1; ?>
                            @foreach($blogs as $blog)
                                <?php
                                $even_class="";
                                if($blog_count % 2 == 0){
                                    $even_class="blog_card_reverse";
                                }
                                ?>

                                    <div class="blog_card {{$even_class}}">
                                        <div class="blog_card-imgbox">
                                            <img src="{{asset('uploads/blog/'.$blog->home_img_1)}}" alt="" class="img-fluid">
                                        </div>
                                        <div class="blog_card-contentbox">
                                            <div class="common-style">
                                                <span>{{$blog->main_title}} · {{date('d M Y', strtotime($blog->blog_date))}}</span>
                                                <h3>{{$blog->title}}</h3>
                                                <p>{{$blog->home_text}}</p>
                                                <a href="{{ url('blog-details/'.$blog->slug)}}">Read More
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="37.646" height="19.65" viewBox="0 0 37.646 19.65">
                                                        <g id="Group_511" data-name="Group 511" transform="translate(-989.5 1063.162) rotate(-90)">
                                                            <line id="Line_2" data-name="Line 2" y1="35.142" transform="translate(1053.337 990.5)" fill="none" stroke-linecap="round" stroke-width="2" />
                                                            <path id="Path_4660" data-name="Path 4660" d="M2513.136,1023.974l8.411,8.411,8.411-8.411" transform="translate(-1468.209 -6.239)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                        </g>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                            <?php $blog_count++ ?>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
              
        <!-- <div class="marquee blog-bottom">
            <span class="watermark-text">Our Philosophy</span>
            <h4>Loading . . .</h4>
         </div> -->
        <!-- Franchising Page end -->
</main>
@endsection
