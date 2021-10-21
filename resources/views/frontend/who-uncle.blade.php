@extends('frontend.layouts.app')
@section('content')
<main>
      <!-- Page active section start -->
      <div class="page-active-group">
         <a href="javascript:void(0);" class="page-active"></a>
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
      <ul class="social-group">
         <li><a href="javascript:void(0);" class="social-icon">
               <img class="img-red" src="{{asset('themes/frontend/images/')}}/facebook.svg" alt="">
               <img class="img-hover" src="{{asset('themes/frontend/images/')}}/facebook-active.svg" alt="">
            </a></li>
         <li><a href="javascript:void(0);" class="social-icon">
               <img class="img-red" src="{{asset('themes/frontend/images/')}}/mail.svg" alt="">
               <img class="img-hover" src="{{asset('themes/frontend/images/')}}/mail-active.svg" alt="">
            </a></li>
         <li><a href="javascript:void(0);" class="social-icon">
               <img class="img-red" src="{{asset('themes/frontend/images/')}}/youtube.svg" alt="">
               <img class="img-hover" src="{{asset('themes/frontend/images/')}}/youtube-active.svg" alt="">
            </a></li>
         <li><a href="javascript:void(0);" class="social-icon">
               <img class="img-red" src="{{asset('themes/frontend/images/')}}/instagram.svg" alt="">
               <img class="img-hover" src="{{asset('themes/frontend/images/')}}/instagram-active.svg" alt="">
            </a></li>
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
         <!-- <svg fill="none" width="1446.761" height="10139.941" viewBox="0 0 1446.761 10139.941">
            <path id="path" class="path" data-name="Path 4746"
               d="M12428.684,679.353s-243.437-42.818-243.437,237.351S13626.331,956.236,13630,1237.754s-1363,112.36-1363,428.221,1363-7.043,1363,340.228-1363,165.271-1363,469.968,1363,76.258,1363,399.668-1363,133.359-1363,373.938c0,62.069,90.727,108.27,225.909,147.057C12879.581,3507.781,13630,3556.273,13630,3739.57c0,102.023-233.3,157.958-506.97,205.008-388.712,66.83-858.851,115.7-856.03,253.347,4.8,234.491,1363,209.257,1363,471.565s-1359.75,85.289-1363,366.217,1363.214,215.314,1363,506.682-1359.592,75.875-1363,375.621,1363,48.483,1363,341.767-1363,195.644-1363,506.682,1363,120.2,1363,361.2-1363,185.6-1363,481.6,1363,84.838,1363,386.286-1363,182.49-1363,465.041,1363,75.116,1363,384.778-1363,165.674-1363,494.167,1363,69.5,1363,398.078-1361.166,406.635-1363,681.008,1362.732,275.917,1363,396.317"
               transform="translate(-12184.246 -675.997)" fill="none" stroke="#000" stroke-linecap="round"
               stroke-width="2" stroke-dasharray="3 5" />
         </svg> -->
         <svg fill="none" width="1445" height="8653" viewBox="0 0 1445 8653">
            <path id="path" class="path" data-name="Path 4746"
               d="M12428.7,679.353s-243.437-42.818-243.437,237.351S13626.3,956.236,13630,1237.75s-1363,112.36-1363,428.221,1363-7.043,1363,340.228-1363,165.271-1363,469.968,1363,76.258,1363,399.668-1363,133.359-1363,373.938,1363,242.763,1363,489.792-1367.8,223.855-1363,458.356,1363,209.257,1363,471.565-1359.75,85.289-1363,366.217,1363.21,215.314,1363,506.682-1359.59,75.875-1363,375.621,1363,48.483,1363,341.767-1363,195.644-1363,506.682,1363,120.2,1363,361.2-1363,185.6-1363,481.6,1363,84.838,1363,386.286-1363,182.49-1363,465.041,1363,75.116,1363,384.778-1363,165.674-1363,494.167,1363,69.5,1363,398.078-1361.17,406.635-1363,681.008,1362.73,275.917,1363,396.317"
               transform="translate(-12184.746 -676.507)" fill="none" stroke="#000" stroke-linecap="round"
               stroke-width="1" stroke-dasharray="3 5" />
         </svg>
         <!-- <svg fill="none" width="1445" height="8880" viewBox="0 0 1445 8880">
            <path id="path" class="path" data-name="Path 4746" d="M12428.684,679.353s-243.437-42.818-243.437,237.351S13626.331,956.236,13630,1237.754s-1363,112.36-1363,428.221,1363-7.043,1363,340.228-1363,165.271-1363,469.968,1363,76.258,1363,399.668-1363,133.359-1363,373.938,1363,242.763,1363,489.792-1367.8,223.855-1363,458.356,1363,209.257,1363,471.565-1359.75,85.289-1363,366.217,1363.214,215.314,1363,506.682-1359.592,75.875-1363,375.621,1363,48.483,1363,341.767-1363,195.644-1363,506.682,1363,120.2,1363,361.2-1363,185.6-1363,481.6,1363,84.838,1363,386.286-1363,182.49-1363,465.041,1363,75.116,1363,384.778-1363,165.674-1363,494.167,1363,69.5,1363,398.078-1361.166,406.635-1363,681.008,1362.732,275.917,1363,396.317" transform="translate(-12184.746 -676.507)" fill="none" stroke="#000" stroke-linecap="round" stroke-width="2" stroke-dasharray="3 5"/>
         </svg> -->
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
                  <img class="w-100" src="{{asset('themes/frontend/images/')}}/who-uncle-tetsu-img-banner.png" alt="">
               </div>
               <a class="down-arrow" href="#GlobalContact">
                  <img class="w-100" src="{{asset('themes/frontend/images/')}}/down-arrow.svg" alt="">
               </a>
            </div>
         </div>
      </section>
      <!-- Banner section  end -->
      <!-- Uncle Tetsu Global  Contact section start -->
      <section id="WhoUncleTetsu" class="who-uncle-tetsu-page">
         <div class="marquee">
            <span class="watermark-text">Who is Uncle Tetsu?</span>
         </div>
         <div class="custom-padding-x before-one">
            <div class="common-style">
               <h2>Who is Uncle Tetsu?</h2>
               <div class="section-text-wrap">
                  <p>Uncle Tetsu, or Tetsushi Mizokami was born and raised in Fukuoka, Hakata, Japan.</p>
                  <p>Tetsushi learned how to bake from a very young age by helping his parents who owned a cake
                     shop
                  </p>
               </div>
               <div class="section-one">
                  <div class="section-one-img">
                     <img src="{{asset('themes/frontend/images/')}}/who-uncle-tetsu-img-1.png" alt="">
                     <span>Tessy’s Village Original Illustration, 1978</span>
                     <div class="img-text-group-one">
                        <img src="{{asset('themes/frontend/images/')}}/who-uncle-tetsu-img-2.png" alt="">
                        <span>Original Design: "Uncle Tetsu's Freshly Baked Studio"<br>or "Uncle Tetsu's
                           Fresh-Made Mini Factory"</span>
                     </div>
                  </div>
                  <div class="section-one-text">
                     <p>Throughout the 1970s & 80s Tetsushi opened various venues, including restaurants, izakaya, a rock music venue, and a cake shop, which he opened with his wife Kimiyo, called Hana Jam that sold various cakes that were made that morning. Among the offerings at Hana Jam was the uniquely soft & fluffy Japanese Cheesecake that has now become a global phenomenon.</p>
                     <p>The area in Hakata where Tetsushi opened all of these venues become known as Tessy’s Village.</p>
                     <p>Then in 1990, Tetsushi established the first shop that focused on the famous Japanese Cheesecake.</p>
                  </div>

               </div>
            </div>
         </div>
         <div class="custom-padding-x before-two">
            <div class="common-style">             
               <div class="section-two">
                  <div class="section-two-img order-1 order-lg-2">
                     <img src="{{asset('themes/frontend/images/')}}/who-uncle-tetsu-img-3.png" alt="">
                     <span>Uncle Tetsu at one of the 1st new openings in Asia, circa 1995.</span>
                     <div class="img-text-group-two">
                        <img src="{{asset('themes/frontend/images/')}}/who-uncle-tetsu-img-4.png" alt="">
                        <span>Tetsushi Mizokami, guest of<br>"Oyafuko Doori–Showa Music Festival", May 1 2018</span>
                     </div>
                  </div>
                  <div class="section-two-text order-2 order-lg-1">
                     <p>This shop was known as “Uncle Tetsu’s Cheesecake”.</p>

                     <p>Mr. Mizokami is to this day regarded as one of the fathers of "Oyafuko Doori" or Bad Boys Street which has a long and famous history in the area of Hakata.</p>
                     <p>To this day, Tetsushi has a home, where he has for many years, along Bad Boys Street in his home town of Hakata, Fukuoka, Japan</p>
                  </div>

               </div>
            </div>
         </div>
      </section>
      <!-- Uncle Tetsu Global Contact  section end -->
</main>
@endsection
