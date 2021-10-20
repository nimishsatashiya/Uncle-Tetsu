
$(".message_details").click(function(){
	$(".full_details").toggle(500);
	$(".fullnoti_details").hide(800);
	$(".fulluser_details").hide(800);
});
$(".noti_details").click(function(){
	$(".fullnoti_details").toggle(500);
	$(".full_details").hide(800);   
	$(".fulluser_details").hide(800);
});
$(".user").click(function(){
	$(".fulluser_details").toggle(500);
	$(".full_details").hide(800);
	$(".fullnoti_details").hide(800);		
});


$('.hamburger').click(function () 
{

	$('.menu-main-menu-container #menu-main-menu').toggleClass('menu-show-mob');
});


	// Responsive Menu.

         // First level
        $('.rh_menu__hamburger').click(function () {
          $('ul.menu-responsive').toggleClass('menu-responsive_show');
        });

        var sub_menu_parent = $('.menu-responsive ul.sub-menu').parent();
        sub_menu_parent.prepend('<i class="fa fa-caret-down menu-indicator"></i>');

        // Second Level
      /*  $('ul.menu-responsive > li').click(function () {
          $(this).toggleClass("li-blk");*/
          
           $('ul.menu-responsive > li .menu-indicator').click(function () {
            
            $(this).parent().children('ul.sub-menu').slideToggle();
            $(this).toggleClass('menu__indicator_up');

        });


         //ready

         /*header fix*/

        /*$(function() {
        	var header = $(".bg-tansp");
        	$(window).scroll(function() {    
        		var scroll = $(window).scrollTop();

        		if (scroll >= 50) {
        			header.removeClass('bg-tansp').addClass("bg-clor");
        		} else {
        			header.removeClass("bg-clor").addClass('bg-tansp');
        		}
        	});
        });*/


        /* On hover apply a class to the dropdown '.hov' */
        $('.menuWrapper ul li').hover( function () {
        	var el = $(this).children('ul');
			// check if it has a class of .hov 
			if (el.hasClass('hov')) {
				$(el).removeClass('hov');
			} else {
				$(el).addClass('hov');
			}
		});

        $('.nav-item').hover(
        	function(){ $(this).addClass('nav-hover') },
        	function(){ $(this).removeClass('nav-hover') }
        	)


        if (jQuery().select2) {
        	var selectOptions = {
        		width: 'off',
        	};

        	$('.menu-select2').select2(selectOptions)
        	.on("select2:open", function (e) {
                    // fired to the original element when the dropdown opens
                    $(e.target).parents('.advanc-filter-box').addClass('filter-box-bg');
                })
        	.on("select2:close", function (e) {
                    // fired to the original element when the dropdown closes
                    $(e.target).parents('.advanc-filter-box').removeClass('filter-box-bg');
                });

        	if ($('.dsidx-resp-search-form')) {
        		$('.dsidx-resp-search-form select').select2(selectOptions);

        		if ($('.dsidx-sorting-control')) {
        			$('.dsidx-sorting-control select').select2(selectOptions);
        		}

        		if ($('#dsidx-search-form-main')) {
        			$('#dsidx-search-form-main select').select2(selectOptions);
        		}

        		if ($('#dsidx.dsidx-details')) {
        			$('.dsidx-contact-form-schedule-date-row select').select2(selectOptions);
        		}
        	}
        }



        $('.select2-selectwrap').click(function (e) {
        	e.preventDefault();
        	var search_select = $(this).find('.menu-select2');

        	if (e.target.classList[0] === 'select2-selection' || e.target.classList[0] === 'select2-selection__rendered') return;

        	search_select.select2("open");
        });


        $('.select2').click(function (e) {
        });


        
        (function($) {
        	var s,
        	spanizeLetters = {
        		settings: {
        			letters: $('.js-spanize'),
        		},
        		init: function() {
        			s = this.settings;
        			this.bindEvents();
        		},
        		bindEvents: function(){
        			s.letters.html(function (i, el) {
		        //spanizeLetters.joinChars();
		        var spanizer = $.trim(el).split("");
		        //var rand = count+1;
		        return '<span>' + spanizer.join('</span><span>') + '</span>';
		        
		        /*$( "span" ).each(function() {
		        	alert("sdfsdfs");
		        	$(this).attr('id', count+1);
		        });*/

		    });
        		},
        	};
        	spanizeLetters.init();
        })(jQuery);

        var counter = 0;
        $( ".js-spanize span" ).each(function(index) 
        {
        	$(this).attr('id', 'counter_'+index);
        	$("p").css("background-color"); 
		});

        $(document).ready(function(){
            $('.customer-logos').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1500,
                arrows: false,
                dots: false,
                pauseOnHover: false,
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3
                    }
                },  {
                    breakpoint: 520,
                    settings: {
                        slidesToShow: 2
                    }
                }]
            });
        });

        /* $('.gallerySlider').append("<span class='pagingInfo'></span>"); */

        var $status = $('.pagingInfo');
        var $slickElement = $('.slickslide');

        $slickElement.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
          //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
          var i = (currentSlide ? currentSlide : 0) + 1;
          $status.text(i);
      });

      $slickElement.slick({
                dots: true,
                infinite: true,
                speed: 500,
                autoplay: false,
                slidesToShow: 1,
                pauseOnHover: false,
                loop: true,
                slidesToScroll: 1,
          });

         

        $(document).ready(function() {
            $('.js-example-basic-single').select2();

            $(".gallerySlider button.slick-arrow").click(function(){
              $('.gallerySlider .pagingInfo').show();
              $('.gallerySlider .pagingInfo').delay(4000).fadeOut();
            });
            $(".gallerySlider").mouseout(function(){
              $('.gallerySlider .pagingInfo').delay(3000).fadeOut();
            });
        });



        
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        });

        $(function() {

          $(".input input").focus(function() {
            $(this).parent(".input").each(function() {
              $("label", this).css({
                "line-height": "17px",
                "font-size": "17px",
                "top": "25px",
                "color": "#1ea69a",
                "transform": "translateY(-1rem)"
              });
              $(".spin", this).css({ "width": "100%" });
            });
          })
            .blur(function() {
            $(".spin").css({ "width": "0" });
            if ($(this).val() == "") {
              $(this).parent(".input").each(function() {
                $("label", this).css({
                  "line-height": "60px",
                  "font-size": "17px",
                  "color": "rgba(68, 68, 68, 1)",
                  "font-weight": "400",
                  "top": "15px"
                })
              });
            }
          });

          $(".form-animation").click(function() {
            if (!$(this).hasClass('material-button')) {
              $(".shape").css({
                "width": "100%",
                "height": "100%",
                "transform": "rotate(0deg)"
              });
              // This sucks
              setTimeout(function() {
                $(".overbox").css({
                  "overflow": "visible"
                });
              }, 700);
              $(this).animate({
                "width": "140px",
                "height": "140px"
              }, 500, function() {
                $(this).removeClass('active');
                $(".overbox .title, .overbox .input, .overbox .button").removeClass("show-me");
                $(".overbox .title, .overbox .input, .overbox .button").addClass("hide-me");
              });
              $(".form-animation").addClass('closing');
            }
          });

          $(".material-button").click(function() {
            if ($(this).hasClass('material-button')) {
              // This sucks also
              setTimeout(function() {
                $(".overbox").css({ "overflow": "hidden" });
              }, 200);
              $(this).addClass('active').animate({
                "width": "800px",
                "height": "800px"
              });
              setTimeout(function() {
                $(".shape").css({
                  "width": "50%",
                  "height": "50%",
                  "transform": "rotate(135deg)"
                });
                $(".overbox .title, .overbox .input, .overbox .button").removeClass("hide-me");
                $(".overbox .title, .overbox .input, .overbox .button").addClass("show-me");
              }, 300);
              $(this).removeClass('material-button');
            }
            if ($(".form-animation").hasClass('closing')) {
              $(".form-animation").removeClass('closing').addClass('material-button');
            }
          });


          $("button").click(function() {
            $(this).toggleClass('active');
          })

        });

        $(document).ready(function(){
            $("p").click(function(){
                $(this).toggleClass("highlight");
            });
        });

        $(document).ready(function(){
            function setCurrency (currency) {
              if (!currency.id) { return currency.text; }
              var $currency = $('<i class="cus-icn pr-2 fa fa-' + currency.element.value + '">' + currency.text + '</i>');
              return $currency;
            };
            $(".templatingSelect2").select2({
              templateResult: setCurrency,
              templateSelection: setCurrency
            });
          })

       /* $(document).ready(function() {

          $(".datepicker").datepicker({
            prevText: '<i class="fa fa-fw fa-angle-left"></i>',
            nextText: '<i class="fa fa-fw fa-angle-right"></i>'
          });
        });*/

        /*login menu*/

         function logInMenu() {
            if ($(window).width() > 1023) {
                $(".user_profile").on('mouseover', function (e) {
                    if (!$(this).hasClass('open-login')) {
                        $(this).addClass('open-login');
                    }
                });
                $(".log-modal").on('mouseout', function () {
                    if ($(".user_profile").hasClass('open-login')) {
                        $(".user_profile").removeClass('open-login');
                    }
                });
                /* $(".log-modal").click(function(){
                  if (!$(this).hasClass('open-login')) {
                      $(this).addClass('open-login');
                  }
                }); */
            } else {
                $(".user_profile").on('click', function () {
                    $(this).toggleClass('open-login');
                    $('.log_modal').click(function (e) {
                        e.stopPropagation();
                    });
                });
            }
        }

        logInMenu();

        $(window).on('resize', function () {
            logInMenu();
        });

        $(function () {
          $('.user_profile').on('mouseover', function () {
             if( $(this).find('#username').hasClass('focus-class') ){
                  var userFocus = $('.focus-class');
                  var fieldVal = userFocus.val();
                  var fieldLength = fieldVal.length;
                  if (fieldLength === 0) {
                      $(userFocus).focus();
                  }
             }
          });
      });

        /*login switch*/

         $(document).ready(function() {
           $('#rest_psw').hide();
           $('#rest_user').hide();

            $('#frg_pass').click(function(){
              
              $('#login_frm').hide('slow');
             /*  $('#rest_user').slideToggle('slow'); */
              $('#rest_psw').show('slow');
            });

            $('#login_btn').click(function(){

              /* $('#rest_user').hide('slow'); */
              $('#rest_psw').hide('slow');
              $('#login_frm').show('slow');
            });

            $('#regs_user').click(function(){
              
             /*  $('#rest_psw').slideToggle('slow'); */
              $('#login_frm').hide('slow');
              $('#rest_user').show('slow');
            });

            $('#al_login_btn').click(function(){
              $('#login_frm').show('slow');
              $('#rest_user').hide('slow');
            });
        });

        