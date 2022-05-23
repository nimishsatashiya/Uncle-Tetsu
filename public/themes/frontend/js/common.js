//=========================================================================================================================

$(document).ready(function() {





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
        smartSpeed: 2000,
        nav: false,
        dots: true,
        items: 2,
        responsiveClass: true,
        onDragged: setOwlTitel,
        responsive: {
            0: {
                items: 1,
                nav: true,
                dots: true,
            },
            992: {
                items: 2,
                nav: false
            },
        }
    }).on('changed.owl.carousel', function(e) {
        setOwlTitel(e, true);
    });


    $("#blogCarousel").owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 7000,
        smartSpeed: 800,
        nav: false,
        dots: true,
        items: 1,
        responsiveClass: true,
        responsive: {
            0: {
                nav: true,
                dots: false,
            },
            767: {
                nav: false
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
    $('.map_flags-box').each(function() {
        var $this = $(this);
        $this.on("click", function() {
            var country_name = $(this).data('id');
            $(".city_list-box").addClass("d-none");
            if ($("#" + country_name + "-box").hasClass("d-none")) {
                $("#" + country_name + "-box").removeClass("d-none");
            }
            if ($(".map-pin").hasClass("active")) {
                $(".map-pin").removeClass("active");
            }
            $("." + country_name).addClass("active");
            $(".city_list").addClass("active");
        });
    });
    $(".box-close").on("click", () => {
        if ($(".city_list").hasClass("active")) {
            $(".city_list").removeClass("active");
        }
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
    document.addEventListener("scroll", function() {
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

function setOwlTitel(event, ischange = false) {
    let target = event.target;
    let title = '';
    title = $(target).find('.owl-stage .active:first').find('img').attr('alt');
    if (ischange) {
        title = $(target).find('.owl-stage .active:last').find('img').attr('alt');
    }
    $("#product-name").html(title);
}

$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {
        $("header.header").addClass("fixed-top");
    } else {
        $("header.header").removeClass("fixed-top");
    }
});