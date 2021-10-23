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
        <ul class="social-group">
            <li>
                <a href="javascript:void(0);" class="social-icon active">
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
           <svg fill="none"width="1446.761" height="10139.941" viewBox="0 0 1446.761 10139.941">
                <path id="path" class="path" data-name="Path 4746" d="M12428.684,679.353s-243.437-42.818-243.437,237.351S13626.331,956.236,13630,1237.754s-1363,112.36-1363,428.221,1363-7.043,1363,340.228-1363,199.715-1363,504.412,1363,41.814,1363,365.224-1363,133.359-1363,373.938,1363,242.763,1363,489.792-1367.8,223.855-1363,458.356,1363,209.257,1363,471.565-1359.75,85.289-1363,366.217,1363.214,215.314,1363,506.682-1359.592,75.875-1363,375.621,1363,48.483,1363,341.767-1363,195.644-1363,506.682,1363,120.2,1363,361.2-1363,185.6-1363,481.6,1363,84.838,1363,386.286-1363,182.49-1363,465.041,1363,75.116,1363,384.778-1363,165.674-1363,494.167,1363,69.5,1363,398.078-1361.166,406.635-1363,681.008,1362.732,275.917,1363,396.317" transform="translate(-12184.246 -675.997)" fill="none" stroke="#000" stroke-linecap="round" stroke-width="2" stroke-dasharray="3 5"/>
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
                        <img class="w-100" src="{{asset('themes/frontend/images/')}}/blog-detail-banner.png" alt="">
                    </div>
                    <a class="down-arrow" href="#BlogDetail">
                        <img class="w-100" src="{{asset('themes/frontend/images/')}}/down-arrow.svg" alt="">
                    </a>
                </div>
            </div>
        </section>
        <!-- Banner section  end -->
        <!-- Blog Detail Page start -->
        <section id="BlogDetail" class="blog_details_page">
            <div class="marquee">
                <span class="watermark-text">Uncle Tetsu's Blog</span>
            </div>
            <div class="custom-padding-x">
                <div class="row">
                    <div class="col-12">
                        <div class="blog__head">
                            <div class="common-style">
                                <span>A NEW SHOP OPENS · 16th July 2019</span>
                                <h1>Uncle Tetsu flies to New York City in search for what will be the first shop in Eastern USA!</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog-wrapper">
                    <div class="row">
                        <div class="col-12 col-md-8">
                            <div class="blog__content">
                                <p class="lead-right">Uncle Tetsu departs Hong Kong and flies across the world to the Big Apple to find the ideal location for the 1st ever shop in New York, one that has the potential to be among the grandest launches in the world, given the
                                    growing love of Uncle Tetsu’s Japanese Cheesecakes across the west. Following him is Mr. Matsui from RKB, a major broadcasting corporation in Fukuoka, which is creating a program about Uncle Tetsu’s expansion across
                                    the planet starting from Oyafuko Street in his hometown.</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="blog__img">
                                <img src="{{asset('themes/frontend/images/')}}/blog-head-img.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <p>And, as business assistant to Uncle Tetsu, the young and talented Luca from Team Canada meets us in New York to be a part of the search.</p>
                    <p>But first, a Mini History of Uncle Tetsu’s recent spread across the Western World leading to this moment of New York.</p>
                    <div class="blog__img">
                        <img src="{{asset('themes/frontend/images/')}}/blog-img-01.png" alt="" class="img-fluid">
                    </div>
                    <p>Based on his experience opening in Canada, Australia & New Zealand, Uncle Tetsu intuits that New York, with its sheer size in population of locals as well as tourists, could be home to three Japanese Cheesecake Factories. And so, while
                        we would like to determine the best place for the first shop in Manhattan, we will also be looking at areas which could work for our second and third shops.</p>
                    <h3>Day 1:</h3>
                    <p class=""> Now Uncle Tetsu lands in New York to begin the exploration of the city’s busiest and most fitting districts, starting with some expert advice from our corporate real estate agents.</p>
                    <div class="blog__video">
                        <img src="{{asset('themes/frontend/images/')}}/blog-video-thumbnail.png" alt="" class="img-fluid">
                        <a class="video-link" href="javascript:void(0);"  data-toggle="modal" data-target="#videoModal"><img src="{{asset('themes/frontend/images/')}}/blog-video-icon.svg" alt="" class="img-fluid"></a>
                    </div>
                    <p>With only a few days in NYC this time, Uncle Tetsu and the team head out into the thick of the city. The first stop is one that needs no introduction…</p>
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="blog__img">
                                <img src="{{asset('themes/frontend/images/')}}/blog-img-02.png" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="blog__content">
                                <p class="lead">Times Square…<br/><br/>Known as “The Crossroads of the World”, it is one of the busiest pedestrian areas and the world’s most visited tourist attractions. It is no doubt that Uncle Tetsu would be looking in this area, around
                                    the famous Broadway Street in Manhattan, where eyes from New York, North America, and the world would be able to witness the performance of Uncle Tetsu’s Japanese Cheesecake, Cheese Tart, and Madeleine Production in
                                    our open factories for </p>
                            </div>
                        </div>
                    </div>
                    <p>After seeing two possible shops, Uncle Tetsu takes a load off at the popular “Ootoya” an upscale Japanese Izakaya that started in Japan in 2005 and has since spread to countries in Asia and New York.</p>
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="blog__img">
                                <img src="{{asset('themes/frontend/images/')}}/blog-img-03.png" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="blog__img">
                                <img src="{{asset('themes/frontend/images/')}}/blog-img-04.png" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="blog__img">
                                <img src="{{asset('themes/frontend/images/')}}/blog-img-05.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <p>After lunch, Uncle Tetsu walks down broadway south toward a monumental building that ofttimes stands as one of the Symbols of NYC, the Empire State Building.</p>
                    <div class="blog__img">
                        <img src="{{asset('themes/frontend/images/')}}/blog-img-06.png" alt="" class="img-fluid">
                    </div>
                    <p>When I asked Mr. Matsui if he knew of the Empire State Building he remarked:<br/> “Of course I do. In fact, when I was a little boy, the pillow that I slept on was that of the famous King Kong on top of the Empire State Building. And
                        sometimes—maybe as a result—I would dream of King Kong and New York.”</p>
                    <p>Despite this however, this was Mr. Matsui’s very first time ever travelling to any Western country and surely to set his eyes on the Empire State.</p>

                    <div class="blog__img">
                        <img src="{{asset('themes/frontend/images/')}}/blog-img-07.png" alt="" class="img-fluid">
                    </div>
                    <h3>Day 2:</h3>
                    <p class=""> Uncle Tetsu, Luca, and Mr. Matsui from RKB TV travel to Union Square, in the midtown of Manhattan. As we emerge from the subway we find ourselves surrounded by a beautiful patch of green—a park—bustling with Newyorkers but in a way
                        that still feels serene.</p>
                    <div class="blog__img">
                        <img src="{{asset('themes/frontend/images/')}}/blog-img-08.png" alt="" class="img-fluid">
                    </div>
                    <p>When I asked Mr. Matsui if he knew of the Empire State Building he remarked:<br/> “Of course I do. In fact, when I was a little boy, the pillow that I slept on was that of the famous King Kong on top of the Empire State Building. And
                        sometimes—maybe as a result—I would dream of King Kong and New York.”</p>
                    <p>Despite this however, this was Mr. Matsui’s very first time ever travelling to any Western country and surely to set his eyes on the Empire State.</p>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="blog__img">
                                <img src="{{asset('themes/frontend/images/')}}/blog-img-09.png" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="blog__img">
                                <img src="{{asset('themes/frontend/images/')}}/blog-img-10.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <p> Departing the park, I spot some art on the side of a building that silently fills the neighborhood with a classic song from the 1940s… an era of music very familiar to, much-loved by, and often sung in Karaoke by Uncle Tetsu himself:</p>
                    <p>Follow our blog here to find out more about New York, Uncle Tetsu’s travels, and to always be on the forefront of the ever-growing love of Uncle Tetsu’s Japanese Cheesecake!</p>
                    <div class="blog__img">
                        <img src="{{asset('themes/frontend/images/')}}/blog-img-11.png" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="recent-blog-box">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="blog-card">
                                <div class="blog-card-img">
                                    <img src="{{asset('themes/frontend/images/')}}/blog-card-thumb.png" alt="" class="img-fluid">
                                </div>
                                <div class="blog-card-content">
                                    <div class="common-style">
                                        <span>A NEW SHOP OPENS · 16th July 2019</span>
                                        <h3>Uncle Tetsu New York officially opens on Wednesday, July 17th.</h3>
                                        <p>The announcement is finally here for Uncle Tetsu’s grand opening in New York City!</p>
                                        <a href="javascript:void(0);">Read More <svg xmlns="http://www.w3.org/2000/svg"
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
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="blog-card">
                                <div class="blog-card-img">
                                    <img src="{{asset('themes/frontend/images/')}}/blog-card-thumb-01.png" alt="" class="img-fluid">
                                </div>
                                <div class="blog-card-content">
                                    <div class="common-style">
                                        <span>BEHIND THE SCENES · 11th July 2019</span>
                                        <h3>What exactly is Uncle Tetsu’s Japanese Cheesecake?</h3>
                                        <p>Japanese Cheesecake lies at the heart of everything Uncle Tetsu.</p>
                                        <a href="javascript:void(0);">Read More <svg xmlns="http://www.w3.org/2000/svg"
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Detail Page end -->
        <!-- Video modal -->
        <div class="modal fade video-modal" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">              
                    <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                        <iframe src="https://www.youtube.com/embed/owsfdh4gxyc" frameborder="0" allowfullscreen></iframe>
                    </div>              
                </div>
            </div>
        </div>
        <!-- Video modal -->
    </main>
@endsection
