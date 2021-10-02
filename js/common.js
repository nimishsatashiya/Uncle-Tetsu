//=========================================================================================================================

$(document).ready(function () {


  $("#bannerCarousel").owlCarousel({
    loop: true,
    autoplay: true,
    responsiveClass: true,
    autoplayTimeout: 7000,
    smartSpeed: 800,
    nav: false,
    dots: false,
    items: 1,
  });

  $("#productCarousel").owlCarousel({
    loop: true,
    autoplay: true,
    autoplayTimeout: 7000,
    smartSpeed: 800,
    nav: false,
    dots: true,
    items: 2,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true,
            dots: false,
        },
        992:{
            items:2,
            nav:false
        },
    }
  });

  $("#blogCarousel").owlCarousel({
    loop: true,
    autoplay: true,
    autoplayTimeout: 7000,
    smartSpeed: 800,
    nav: false,
    dots: true,
    items: 1,
    responsiveClass:true,
    responsive:{
        0:{
            nav:true,
            dots: false,
        },
        992:{
            nav:false
        },
    }
  });

  // --------------------------------------------------------------------------------------menu -----------------------------------------------------------------------------------------
  $(".hambergur").on("click", () => {
    $(".fullscreen").toggleClass("active").removeClass("reverse_anim");
    $("body").toggleClass("menu-active");
  });

  $(".close").on("click", () => {
    $(".fullscreen").removeClass("active").toggleClass("reverse_anim");
    $("body").removeClass("menu-active");
  });
  // ------------------------------------------------------------------------------------plan js ---------------------------------------------------------------------------------------
  gsap.registerPlugin(MotionPathPlugin);

  // The start and end positions in terms of the page scroll
  const offsetFromTop = innerHeight * 0.25;
  const pathBB = document.querySelector("#path").getBoundingClientRect();
  const startY = pathBB.top - innerHeight + offsetFromTop;
  const finishDistance = startY + pathBB.height - offsetFromTop;

  // the animation to use
  var tween = gsap
    .to("#rec", {
      duration: 5,
      paused: true,
      ease: "none",
      motionPath: {
        path: "#path",
        align: "#path",
        autoRotate: true,
        alignOrigin: [0.5, 0.5],
        start: 0,
        end: 0.96,
      },
    })
    .pause(0.001);
  var lastScrollTop = 0;
  // Listen to the scroll event
  document.addEventListener("scroll", function () {
    // Prevent the update from happening too often (throttle the scroll event)
    if (!requestId) {
      requestId = requestAnimationFrame(update);
    }

    var st = window.pageYOffset || document.documentElement.scrollTop;
    if (st > lastScrollTop) {
      $(".svg-path").removeClass("reverse");
    } else {
      $(".svg-path").addClass("reverse");
    }
    lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
  });

  update();

  function update() {
    // Update our animation
    tween.progress((scrollY - startY / 2) / finishDistance);

    // Let the scroll event fire again
    requestId = null;
  }
});

// $(window).scroll(function () {
//   if ($(this).scrollTop() >= 50) {
//     $("header .navbar").addClass("fixed-top");
//   } else {
//     $("header .navbar").removeClass("fixed-top");
//   }
// });
