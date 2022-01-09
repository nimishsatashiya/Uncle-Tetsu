@extends('frontend.layouts.app')
@section('content')
<main>
        <!-- Page active section start -->
        <div class="page-active-group">
            <a href="javascript:void(0);" class="page-active"></a>
            <a href="javascript:void(0);" class="page-active"></a>
            <a href="javascript:void(0);" class="page-active"></a>
            <a href="javascript:void(0);" class="page-active"></a>
            <a href="javascript:void(0);" class="page-active"></a>
            <a href="javascript:void(0);" class="page-active active"></a>
            <a href="javascript:void(0);" class="page-active"></a>
            <a href="javascript:void(0);" class="page-active"></a>
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
                        <img class="w-100" src="{{asset('uploads/store_location/'.$store_pages->banner_path)}}" alt="">
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
                <span class="watermark-text">{{$store_pages->title}}</span>
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
                            <a class="map-pin location-1 malaysia" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a>
                            <a class="map-pin location-2 malaysia" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a>
                            <a class="map-pin location-3 malaysia" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a>
                           <a class="map-pin location-4 malaysia" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a>
                            <a class="map-pin location-5 malaysia" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a>
                           <a class="map-pin location-6 malaysia" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a>
                              <a class="map-pin location-7 korea" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a>
                             <a class="map-pin location-8 newzealand" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a>
                            <a class="map-pin location-9 indonesia" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a>
                            <a class="map-pin location-10 indonesia" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a>
                            <a class="map-pin location-11 indonesia" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a>
                            <a class="map-pin location-12 indonesia" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a>
                            <a class="map-pin location-13 indonesia" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a>
                            <a class="map-pin location-14 uae" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a>
                            <a class="map-pin location-15 pakistan" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a>
                           <a class="map-pin location-16 canada" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a>
                             <a class="map-pin location-17 canada" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a>
                           <a class="map-pin location-18 canada" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a>
                            <a class="map-pin location-19 canada" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a>
                            <a class="map-pin location-20 canada" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a>
                            <a class="map-pin location-21 canada" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a>
                            <a class="map-pin location-22 canada" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a>
                            <a class="map-pin location-23 canada" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a>
                            <a class="map-pin location-24 canada" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                            <a class="map-pin location-25 australia" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                            <a class="map-pin location-26 australia" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                            <a class="map-pin location-26-1 australia" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                             <a class="map-pin location-27 indonesia" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                            <a class="map-pin location-28 usa" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                            <a class="map-pin location-29 usa" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                            <a class="map-pin location-30 usa" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                            <a class="map-pin location-31 usa" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                            <a class="map-pin location-32 usa" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                            <a class="map-pin location-33 usa" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                            <a class="map-pin location-34 usa" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                            <a class="map-pin location-35 myanmar" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                            <a class="map-pin location-36 myanmar" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                            <a class="map-pin location-37 myanmar" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                            <a class="map-pin location-38 saudi-arabia" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                            <a class="map-pin location-39 saudi-arabia" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                             <a class="map-pin location-40 saudi-arabia" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                            <a class="map-pin location-41 taiwan" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                            <a class="map-pin location-42 taiwan" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                            <a class="map-pin location-43 taiwan" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                            <a class="map-pin location-44 taiwan" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                            <a class="map-pin location-45 taiwan" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                            <a class="map-pin location-46 taiwan" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                            <a class="map-pin location-47 taiwan" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                            <a class="map-pin location-48 taiwan" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                            <a class="map-pin location-49 canada" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                            <a class="map-pin location-50 canada" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                            <a class="map-pin location-51 canada" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                            <a class="map-pin location-52 canada" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                            <a class="map-pin location-53 canada" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                            <a class="map-pin location-54 canada" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                            <a class="map-pin location-55 usa" href="#">
                                <svg width="20.623" height="27.318" viewBox="0 0 20.623 27.318">
                                    <path class="locationIconColor" id="Path_4463" data-name="Path 4463" d="M415.8,664.609a10.312,10.312,0,0,0-10.312,10.311c0,5.7,10.312,17.007,10.312,17.007s10.311-11.312,10.311-17.007A10.312,10.312,0,0,0,415.8,664.609Zm0,16.7a6.385,6.385,0,1,1,6.385-6.385A6.386,6.386,0,0,1,415.8,681.306Z" transform="translate(-405.492 -664.609)" />
                                </svg>
                            </a> 
                        </div>
                    </div>
                    <div class="city_list">
                        <button type="button" class="close box-close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div id="malaysia-box" class="city_list-box common-style d-none">
                            <h3 class="heading-title">MALAYSIA</h3>
                            <div class="city_list-box-item-group">
                                <div class="city_list-box-item">
                                    <h4>Petaling Jaya</h4>
                                    <p>Location Address :LG-K2A, 1 UTAMA SHOPPING CENTER 1, Lebuh Bandar Utama, Bandar Utama City Centre,Bandar Utama, 47800 Petaling Jaya,Selangor - 77329336</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Pulau Pinang</h4>
                                    <p>Location Address : B1-36A Basement,Gurney Plaza Old Wing, Pulau Pinang - 42189614</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Melaka</h4>
                                    <p>Location Address : BS15 & BS50, Lower Ground Floor,Dataran Pahlawan Megamall,75000 Melaka. - 62831760</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Perak</h4>
                                    <p>Location Address : Lot G40B, Ground Floor,Ipoh Parade, 105, Jalan Sultan Abdul Jalil,31400 Ipoh, Perak. - 124544540</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Jaya Selangor</h4>
                                    <p>Location Address : LK-03A, EMPIRE SHOPPING GALLERY16, Jalan　SS16/1, SS16,47500 Subang　Jaya,Selangor - 38850562</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Johor Bahru</h4>
                                    <p>Location Address : Lotts119, Second Floor No1,Jalan Desa Tebrau, Taman Desa Tebrau 81100,Johor Bahru - 3647777</p>
                                </div>
                            </div>
                            <!-- <a href="javascript:void(0);">View More <svg xmlns="http://www.w3.org/2000/svg" width="37.646"
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
                                </svg>
                            </a> -->
                        </div>
                        <div id="korea-box" class="city_list-box common-style d-none">
                            <h3 class="heading-title">KOREA</h3>
                            <div class="city_list-box-item-group">
                                <div class="city_list-box-item">
                                    <h4>233번길</h4>
                                    <p>Location Address : 경기도 성남시 분당구 운중로 233번길 8-8 CLOSED</p>
                                </div>                                
                            </div>
                            <!-- <a href="javascript:void(0);">View More <svg xmlns="http://www.w3.org/2000/svg" width="37.646"
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
                                </svg>
                            </a> -->
                        </div>
                        <div id="newzealand-box" class="city_list-box common-style d-none">
                            <h3 class="heading-title">New Zealand</h3>
                            <div class="city_list-box-item-group">
                                <div class="city_list-box-item">
                                    <h4>Auckland</h4>
                                    <p>Location Address : Z004, Z005 CivicTheatre Building 269-287 Queen Street, CBD, Auckland</p>
                                </div>                                
                            </div>
                            <!-- <a href="javascript:void(0);">View More <svg xmlns="http://www.w3.org/2000/svg" width="37.646"
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
                                </svg>
                            </a> -->
                        </div>
                        <div id="indonesia-box" class="city_list-box common-style d-none">
                            <h3 class="heading-title">INDONESIA</h3>
                            <div class="city_list-box-item-group">
                                <div class="city_list-box-item">
                                    <h4>Petaling Jaya</h4>
                                    <p>Location Address :LG-K2A, 1 UTAMA SHOPPING CENTER 1, Lebuh Bandar Utama, Bandar Utama City Centre,Bandar Utama, 47800 Petaling Jaya,Selangor - 77329336</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Jakarta Barat</h4>
                                    <p>Location Address : Lantai　Lower　Ground Unit 136, Jl. Letjen S.Parman, Slipi, Jakarta Barat - 021-29429924</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Jakarta Selatan</h4>
                                    <p>Location Address : 2B-18 2nd Floor MBK Center, Phayathai Rd Lantai 2 unit 1B, Jalan Metro Pondok Indah, Jakarta Selatan - 021-76626371</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Jakarta</h4>
                                    <p>Location Address : Ground Floor Unit 161A Mall Kelapa. Gading, Jl. Boulevard Raya, Klp. Gading, Jakarta 14240 - 021-45865007</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Surabaya</h4>
                                    <p>Location Address : lantai LG unit 31, Jalan Basuki Rahmat No.8-12, Surabaya</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Johor Bahru</h4>
                                    <p>Location Address : Lotts119, Second Floor No1,Jalan Desa Tebrau, Taman Desa Tebrau 81100,Johor Bahru - 3647777</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Johor Bahru</h4>
                                    <p>Location Address : Alamat Unit GL-I-02A, Jl. Sukajadi, Bandung - 022-82063463</p>
                                </div>
                            </div>
                            <!-- <a href="javascript:void(0);">View More <svg xmlns="http://www.w3.org/2000/svg" width="37.646"
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
                                </svg>
                            </a> -->
                        </div>
                        <div id="uae-box" class="city_list-box common-style d-none">
                            <h3 class="heading-title">UAE</h3>
                            <div class="city_list-box-item-group">
                                <div class="city_list-box-item">
                                    <h4>Dubai</h4>
                                    <p>Location Address : La Mer South, Jumeirah 1, Dubai - N/A</p>
                                </div>                                
                            </div>
                            <!-- <a href="javascript:void(0);">View More <svg xmlns="http://www.w3.org/2000/svg" width="37.646"
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
                                </svg>
                            </a> -->
                        </div>
                        <div id="pakistan-box" class="city_list-box common-style d-none">
                            <h3 class="heading-title">PAKISTAN</h3>
                            <div class="city_list-box-item-group">
                                <div class="city_list-box-item">
                                    <h4>Lahore</h4>
                                    <p>Location Address : 25 B2 Mian Mehmood Ali Kasoori Rd, Block B2 Block B 2 Gulberg III, Lahore - (+92) 42-111-243-373</p>
                                </div>                                
                            </div>
                            <!-- <a href="javascript:void(0);">View More <svg xmlns="http://www.w3.org/2000/svg" width="37.646"
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
                                </svg>
                            </a> -->
                        </div>
                        <div id="canada-box" class="city_list-box common-style d-none">
                            <h3 class="heading-title">CANADA</h3>
                            <div class="city_list-box-item-group">
                                <div class="city_list-box-item">
                                    <h4>Ontario</h4>
                                    <p>Location Address :4300 Steeles Avenue East Unit A30 Markham, Ontario L3R 0Y5</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Toronto</h4>
                                    <p>Location Address : 39 Orfus Road, Unit C, Toronto, ON M6A 1L7</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>North York</h4>
                                    <p>Location Address : 3401 Dufferin St, Unit 226B, North York, ON M6A 2T9</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Richmond Hill</h4>
                                    <p>Location Address : 9350 Yonge Street, Unit E1, Richmond Hill, ON L4C 5G20</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Burnaby</h4>
                                    <p>Location Address : 4700 Kingsway, Unit M16, Burnaby, BC V5H 4N2</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Vancouver</h4>
                                    <p>Location Address : 1151 Robson St, Vancouver, BC V6E 1B5</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Montreal</h4>
                                    <p>Location Address : 1408 Rue Pierce Montreal QC H3H 2K2</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Ontario</h4>
                                    <p>Location Address : 280D Elgin Street, Ottawa, Ontario K2P1M2</p>
                                </div>  
                                <div class="city_list-box-item">
                                    <h4>Toronto</h4>
                                    <p>Location Address : 191 Dundas St W, Toronto, Ontario, Canada</p>
                                </div> 
                                <div class="city_list-box-item">
                                    <h4>Toronto</h4>
                                    <p>Location Address : 598 Bay St, Toronto, Ontario</p>
                                </div> 
                                <div class="city_list-box-item">
                                    <h4>Toronto</h4>
                                    <p>Location Address : 596 Bay St, Toronto, Ontario</p>
                                </div> 
                                <div class="city_list-box-item">
                                    <h4>Toronto</h4>
                                    <p>Location Address : 65 Front Street West, York Concourse #222, Toronto, Ontario</p>
                                </div> 
                                <div class="city_list-box-item">
                                    <h4>Toronto</h4>
                                    <p>Location Address : 191 Dundas St W. Toronto, Ontario　CLOSED</p>
                                </div> 
                                <div class="city_list-box-item">
                                    <h4>Toronto</h4>
                                    <p>Location Address : 610 Bay Street, lower level, Toronto, Ontario</p>
                                </div>                               
                            </div>
                            <!-- <a href="javascript:void(0);">View More <svg xmlns="http://www.w3.org/2000/svg" width="37.646"
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
                                </svg>
                            </a> -->
                        </div>
                        <div id="australia-box" class="city_list-box common-style">
                            <h3 class="heading-title">AUSTRALIA</h3>
                            <div class="city_list-box-item-group">
                                <div class="city_list-box-item">
                                    <h4>Sydney</h4>
                                    <p>Location Address : B1F 501 George Street, Sydney CLOSED</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Sydney</h4>
                                    <p>Location Address : 1F 501 GEORGE STREET, SYDNEY</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Melbourne</h4>
                                    <p>Location Address : Shop3 55 Swanston Street, Melbourne, Victoria 3000</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Melbourne</h4>
                                    <p>Location Address : LG20/211 La Trobe St, Melbourne VIC 3000 CLOSED</p>
                                </div>                                                       
                            </div>
                            <!-- <a href="javascript:void(0);">View More <svg xmlns="http://www.w3.org/2000/svg" width="37.646"
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
                                </svg>
                            </a> -->
                        </div>
                        <div id="usa-box" class="city_list-box common-style d-none">
                            <h3 class="heading-title">USA</h3>
                            <div class="city_list-box-item-group">
                                <div class="city_list-box-item">
                                    <h4>Honolulu</h4>
                                    <p>Location Address :2nd Level Food Court　2233 Kalakaua Ave, Honolulu, HI 98615 CLOSED</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Arcadia</h4>
                                    <p>Location Address : 400 S. Baldwin Ave, Space M15　Arcadia, CA 91007 - (626) 254-9007</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>San Mateo</h4>
                                    <p>Location Address : 60 E 31st Ave, San Mateo, CA 94403 - (650) 437-0399</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Torrance</h4>
                                    <p>Location Address : 3525 W Carson St, Torrance, CA 90503 - (323) 275-9190</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>San Francisco</h4>
                                    <p>Location Address : 3251 20th Ave, San Francisco, CA 94132 - (415) 874-7082 </p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Santa Clara</h4>
                                    <p>Location Address : 2855 Stevens Creek Blvd, Santa Clara, CA 95050 - (408) 663-6781</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Daly City</h4>
                                    <p>Location Address : 3 Serramonte Center, Daly City, CA 94015 - (650) 980-7299</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>New york</h4>
                                    <p>Location Address : 135 w 41st st, New york, ny 10036, usa</p>
                                </div>
                            </div>
                            <!-- <a href="javascript:void(0);">View More <svg xmlns="http://www.w3.org/2000/svg" width="37.646"
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
                                </svg>
                            </a> -->
                        </div>
                        <div id="myanmar-box" class="city_list-box common-style d-none">
                            <h3 class="heading-title">MYANMAR</h3>
                            <div class="city_list-box-item-group">
                                <div class="city_list-box-item">
                                    <h4>Yangon</h4>
                                    <p>Location Address : No. 176 (B), Baho Road (Between Phyar Pone St & Myaung Mya St), Sanchaung, Yangon, Myanmar (Burma)</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Yangon</h4>
                                    <p>Location Address : 312-318, 3rd Street, Anawrahta Rd, Yangon, Myanmar (Burma)</p>
                                </div>                                                                                   
                            </div>
                            <!-- <a href="javascript:void(0);">View More <svg xmlns="http://www.w3.org/2000/svg" width="37.646"
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
                                </svg>
                            </a> -->
                        </div>
                        <div id="saudiArabia-box" class="city_list-box common-style d-none">
                            <h3 class="heading-title">SAUDI ARABIA</h3>
                            <div class="city_list-box-item-group">
                                <div class="city_list-box-item">
                                    <h4>KSA </h4>
                                    <p>Location Address : Mall of Dhahran, Eastern Province, KSA  - N/A</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Jeddah</h4>
                                    <p>Location Address : Al Fayha'a, Jeddah 22251, Saudi Arabia - N/A</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Saudi Arabia</h4>
                                    <p>Location Address : Riyadh 13511, Saudi Arabia - N/A</p>
                                </div>                                                       
                            </div>
                            <!-- <a href="javascript:void(0);">View More <svg xmlns="http://www.w3.org/2000/svg" width="37.646"
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
                                </svg>
                            </a> -->
                        </div>
                        <div id="taiwan-box" class="city_list-box common-style d-none">
                            <h3 class="heading-title">TAIWAN</h3>
                            <div class="city_list-box-item-group">
                                <div class="city_list-box-item">
                                    <h4>Taipei City</h4>
                                    <p>Location Address :No.16, Ln. 135, Sec. 1, Zhongshan N. Rd., Zhongshan Dist.,Taipei City 104, Taiwan (R.O.C.) </p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Taipei City</h4>
                                    <p>Location Address : 1 F, No.3, Beiping W. Rd., Zhongzheng Dist., Taipei City 100, Taiwan (R.O.C.)</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Taipei City</h4>
                                    <p>Location Address : 1 F, No.337, Sec. 3, Nanjing E. Rd., Songshan Dist., Taipei City 105, Taiwan (R.O.C.)</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Taipei City</h4>
                                    <p>Location Address : B1 F, No.39, Sec. 1, Fuxing S. Rd., Songshan Dist., Taipei City 105, Taiwan (R.O.C.)</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Kaohsiung City</h4>
                                    <p>Location Address : B1 F, NO.777, Bo-ai 2nd Rd., Zuoying District, Kaohsiung City 813, Taiwan (R.O.C)</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Kaohsiung City</h4>
                                    <p>Location Address : B3 F, No.266-1, Chenggong 1st Rd., Qianjin Dist., Kaohsiung City 801, Taiwan</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Taipei City</h4>
                                    <p>Location Address : No.9-1, Ln. 121, Sec. 1, Zhongshan N. Rd., Zhongshan Dist., Taipei City 104, Taiwan (R.O.C.)</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Taipei City</h4>
                                    <p>Location Address : No.16, No133, Ln. 121, Sec. 1, Zhongshan N. Rd., Zhongshan Dist., Taipei City 104, Taiwan (R.O.C.)</p>
                                </div>
                                <div class="city_list-box-item">
                                    <h4>Tainan　City</h4>
                                    <p>Location Address : B2F, No658, Ln. 1, Sec. 1, Semon W. Rd.,Central W. Dist., Tainan　City, Taiwan (R.O.C.)</p>
                                </div>
                            </div>
                            <!-- <a href="javascript:void(0);">View More <svg xmlns="http://www.w3.org/2000/svg" width="37.646"
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
                                </svg>
                            </a> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="map_flags">
                            <a href="javascript:void(0);" class="map_flags-box" data-id="australia" >
                                <div class="map_flags-box-img">
                                    <img src="{{asset('themes/frontend/images/')}}/map-flag-01.svg" alt="" class="imf-fluid">
                                </div>
                                <p>Australia</p>
                            </a>
                            <a href="javascript:void(0);" class="map_flags-box" data-id="malaysia">
                                <div class="map_flags-box-img">
                                    <img src="{{asset('themes/frontend/images/')}}/map-flag-01.svg" alt="" class="imf-fluid">
                                </div>
                                <p>Malaysia</p>
                            </a>
                            <a href="javascript:void(0);" class="map_flags-box" data-id="korea">
                                <div class="map_flags-box-img">
                                    <img src="{{asset('themes/frontend/images/')}}/map-flag-02.svg" alt="" class="imf-fluid">
                                </div>
                                <p>Korea</p>
                            </a>
                            <a href="javascript:void(0);" class="map_flags-box" data-id="china">
                                <div class="map_flags-box-img">
                                    <img src="{{asset('themes/frontend/images/')}}/map-flag-03.svg" alt="" class="imf-fluid">
                                </div>
                                <p>China</p>
                            </a>
                            <a href="javascript:void(0);" class="map_flags-box" data-id="china">
                                <div class="map_flags-box-img">
                                    <img src="{{asset('themes/frontend/images/')}}/map-flag-04.svg" alt="" class="imf-fluid">
                                </div>
                                <p>Hong Kong</p>
                            </a>
                            <a href="javascript:void(0);" class="map_flags-box" data-id="indonesia">
                                <div class="map_flags-box-img">
                                    <img src="{{asset('themes/frontend/images/')}}/map-flag-05.svg" alt="" class="imf-fluid">
                                </div>
                                <p>Indonesia</p>
                            </a>
                            <a href="javascript:void(0);" class="map_flags-box" data-id="japan">
                                <div class="map_flags-box-img">
                                    <img src="{{asset('themes/frontend/images/')}}/map-flag-06.svg" alt="" class="imf-fluid">
                                </div>
                                <p>Japan</p>
                            </a>
                            <a href="javascript:void(0);" class="map_flags-box" data-id="myanmar">
                                <div class="map_flags-box-img">
                                    <img src="{{asset('themes/frontend/images/')}}/map-flag-07.svg" alt="" class="imf-fluid">
                                </div>
                                <p>Myanmar</p>
                            </a>
                            <a href="javascript:void(0);" class="map_flags-box" data-id="newzealand">
                                <div class="map_flags-box-img">
                                    <img src="{{asset('themes/frontend/images/')}}/map-flag-08.svg" alt="" class="imf-fluid">
                                </div>
                                <p>New Zealand</p>
                            </a>
                            <a href="javascript:void(0);" class="map_flags-box" data-id="pakistan">
                                <div class="map_flags-box-img">
                                    <img src="{{asset('themes/frontend/images/')}}/map-flag-09.svg" alt="" class="imf-fluid">
                                </div>
                                <p>Pakistan</p>
                            </a>
                            <a href="javascript:void(0);" class="map_flags-box" data-id="uae">
                                <div class="map_flags-box-img">
                                    <img src="{{asset('themes/frontend/images/')}}/map-flag-10.svg" alt="" class="imf-fluid">
                                </div>
                                <p>Saudi Arabia</p>
                            </a>
                            <a href="javascript:void(0);" class="map_flags-box" data-id="taiwan">
                                <div class="map_flags-box-img">
                                    <img src="{{asset('themes/frontend/images/')}}/map-flag-11.svg" alt="" class="imf-fluid">
                                </div>
                                <p>Taiwan</p>
                            </a>
                            <a href="javascript:void(0);" class="map_flags-box" data-id="thailand">
                                <div class="map_flags-box-img">
                                    <img src="{{asset('themes/frontend/images/')}}/map-flag-12.svg" alt="" class="imf-fluid">
                                </div>
                                <p>Thailand</p>
                            </a>
                            <a href="javascript:void(0);" class="map_flags-box" data-id="usa">
                                <div class="map_flags-box-img">
                                    <img src="{{asset('themes/frontend/images/')}}/map-flag-13.svg" alt="" class="imf-fluid">
                                </div>
                                <p>USA</p>
                            </a>
                            <a href="javascript:void(0);" class="map_flags-box" data-id="canada">
                                <div class="map_flags-box-img">
                                    <img src="{{asset('themes/frontend/images/')}}/map-flag-02.svg" alt="" class="imf-fluid">
                                </div>
                                <p>Canada</p>
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
