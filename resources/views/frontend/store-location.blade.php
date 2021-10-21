@extends('frontend.layouts.app')
@section('content')
<main>
        <!-- Page active section start -->
        <div class="page-active-group">
            <a href="javascript:void(0);" class="page-active "></a>
            <a href="javascript:void(0);" class="page-active"></a>
            <a href="javascript:void(0);" class="page-active"></a>
            <a href="javascript:void(0);" class="page-active"></a>
            <a href="javascript:void(0);" class="page-active"></a>
            <a href="javascript:void(0);" class="page-active active"></a>
            <a href="javascript:void(0);" class="page-active "></a>
            <a href="javascript:void(0);" class="page-active "></a>
        </div>
        <!-- Page active section end -->
        <!-- Social group section start -->
        <ul class="social-group">
            <li>
                <a href="javascript:void(0);" class="social-icon">
                    <img class="img-red" src="{{asset('themes/frontend/images/')}}/facebook.svg" alt="">
                    <img class="img-hover" src="{{asset('themes/frontend/images/')}}/facebook-active.svg" alt="">
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="social-icon">
                    <img class="img-red" src="{{asset('themes/frontend/images/')}}/mail.svg" alt="">
                    <img class="img-hover" src="{{asset('themes/frontend/images/')}}/mail-active.svg" alt="">
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="social-icon">
                    <img class="img-red" src="{{asset('themes/frontend/images/')}}/youtube.svg" alt="">
                    <img class="img-hover" src="{{asset('themes/frontend/images/')}}/youtube-active.svg" alt="">
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="social-icon">
                    <img class="img-red" src="{{asset('themes/frontend/images/')}}/instagram.svg" alt="">
                    <img class="img-hover" src="{{asset('themes/frontend/images/')}}/instagram-active.svg" alt="">
                </a>
            </li>
        </ul>
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
                        <img class="w-100" src="{{asset('themes/frontend/images/')}}/store-location.png" alt="">
                    </div>
                    <a class="down-arrow" href="#StoreLocation">
                        <img class="w-100" src="{{asset('themes/frontend/images/')}}/down-arrow.svg" alt="">
                    </a>
                </div>
            </div>
        </section>
        <!-- Banner section  end -->
        <!-- Franchising Page start -->
        <section id="StoreLocation" class="storelocation-page">
            <div class="marquee">
                <span class="watermark-text">Store Locations</span>
            </div>
            <div class="common-style head-top">
            <h2>Store Locations</h2>
            <p>with corporate & franchise locations in countries all over the world</p>
         </div>
            <div class="custom-padding-x">
                <div class="mapstore-location">
                    <div class="map_box">
                        <div class="map_box-img">
                            <img src="{{asset('themes/frontend/images/')}}/map.svg" alt="" class="img-fluid">
                            <a class="location-1" href="#"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
                            <a class="location-2" href="#"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
                            <a class="location-3" href="#"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
                            <a class="location-4" href="#"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
                            <a class="location-5" href="#"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
                            <a class="location-6" href="#"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
                            <a class="location-7" href="#"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
                            <a class="location-8" href="#"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
                            <a class="location-9" href="#"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
                            <a class="location-10" href="#"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
                            <a class="location-11" href="#"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
                            <a class="location-12" href="#"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
                            <a class="location-13" href="#"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
                            <a class="location-14" href="#"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
                            <a class="location-15" href="#"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
                            <a class="location-16" href="#"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
                            <a class="location-17" href="#"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
                            <a class="location-18" href="#"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
                            <a class="location-19" href="#"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
                            <a class="location-20" href="#"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
                            <a class="location-21" href="#"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
                            <a class="location-22" href="#"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
                            <a class="location-23" href="#"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
                            <a class="location-24" href="#"> <img src="{{asset('themes/frontend/images/map-location.svg')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="city_list">
                        <div class="city_list-box common-style">
                            <h3 class="heading-title">Australia</h3>
                            <div class="city_list-box-item">
                                <h4>City</h4>
                                <p>Location Address :</p>
                            </div>
                            <div class="city_list-box-item">
                                <h4>City</h4>
                                <p>Location Address :</p>
                            </div>
                            <div class="city_list-box-item">
                                <h4>City</h4>
                                <p>Location Address :</p>
                            </div>
                            <a href="javascript:void(0);">View More <svg xmlns="http://www.w3.org/2000/svg" width="37.646"
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
                <div class="row">
                    <div class="col">
                        <div class="map_flags">
                            <a href="javascript:void(0);" class="map_flags-box">
                                <div class="map_flags-box-img">
                                    <img src="{{asset('themes/frontend/images/')}}/map-flag-01.svg" alt="" class="imf-fluid">
                                </div>
                                <p>Australia</p>
                            </a>
                            <a href="javascript:void(0);" class="map_flags-box">
                                <div class="map_flags-box-img">
                                    <img src="{{asset('themes/frontend/images/')}}/map-flag-02.svg" alt="" class="imf-fluid">
                                </div>
                                <p>Canada</p>
                            </a>
                            <a href="javascript:void(0);" class="map_flags-box">
                                <div class="map_flags-box-img">
                                    <img src="{{asset('themes/frontend/images/')}}/map-flag-03.svg" alt="" class="imf-fluid">
                                </div>
                                <p>China</p>
                            </a>
                            <a href="javascript:void(0);" class="map_flags-box">
                                <div class="map_flags-box-img">
                                    <img src="{{asset('themes/frontend/images/')}}/map-flag-04.svg" alt="" class="imf-fluid">
                                </div>
                                <p>Hong Kong</p>
                            </a>
                            <a href="javascript:void(0);" class="map_flags-box">
                                <div class="map_flags-box-img">
                                    <img src="{{asset('themes/frontend/images/')}}/map-flag-05.svg" alt="" class="imf-fluid">
                                </div>
                                <p>Indonesia</p>
                            </a>
                            <a href="javascript:void(0);" class="map_flags-box">
                                <div class="map_flags-box-img">
                                    <img src="{{asset('themes/frontend/images/')}}/map-flag-06.svg" alt="" class="imf-fluid">
                                </div>
                                <p>Japan</p>
                            </a>
                            <a href="javascript:void(0);" class="map_flags-box">
                                <div class="map_flags-box-img">
                                    <img src="{{asset('themes/frontend/images/')}}/map-flag-07.svg" alt="" class="imf-fluid">
                                </div>
                                <p>Myanmar</p>
                            </a>
                            <a href="javascript:void(0);" class="map_flags-box">
                                <div class="map_flags-box-img">
                                    <img src="{{asset('themes/frontend/images/')}}/map-flag-08.svg" alt="" class="imf-fluid">
                                </div>
                                <p>New Zealand</p>
                            </a>
                            <a href="javascript:void(0);" class="map_flags-box">
                                <div class="map_flags-box-img">
                                    <img src="{{asset('themes/frontend/images/')}}/map-flag-09.svg" alt="" class="imf-fluid">
                                </div>
                                <p>Pakistan</p>
                            </a>
                            <a href="javascript:void(0);" class="map_flags-box">
                                <div class="map_flags-box-img">
                                    <img src="{{asset('themes/frontend/images/')}}/map-flag-10.svg" alt="" class="imf-fluid">
                                </div>
                                <p>Saudi Arabia</p>
                            </a>
                            <a href="javascript:void(0);" class="map_flags-box">
                                <div class="map_flags-box-img">
                                    <img src="{{asset('themes/frontend/images/')}}/map-flag-11.svg" alt="" class="imf-fluid">
                                </div>
                                <p>Taiwan</p>
                            </a>
                            <a href="javascript:void(0);" class="map_flags-box">
                                <div class="map_flags-box-img">
                                    <img src="{{asset('themes/frontend/images/')}}/map-flag-12.svg" alt="" class="imf-fluid">
                                </div>
                                <p>Thailand</p>
                            </a>
                            <a href="javascript:void(0);" class="map_flags-box">
                                <div class="map_flags-box-img">
                                    <img src="{{asset('themes/frontend/images/')}}/map-flag-13.svg" alt="" class="imf-fluid">
                                </div>
                                <p>USA</p>
                            </a>
                            <a href="javascript:void(0);" class="map_flags-box">
                                <div class="map_flags-box-img">
                                    <img src="{{asset('themes/frontend/images/')}}/map-flag-14.svg" alt="" class="imf-fluid">
                                </div>
                                <p>Vietnam</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Franchising Page end -->
    </main>
@endsection
