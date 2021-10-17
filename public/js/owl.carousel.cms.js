(function($){
	"use strict";
    $(document).ready(function(){
		$('.cms-gallery-carousel').each(function(i, el) {
		    $(el).magnificPopup({
		        delegate: '.magic-popups',
		        type: 'image',
		        tLoading: 'Loading image #%curr%...',
		        mainClass: 'mfp-3d-unfold',
		        removalDelay: 500,
		        callbacks: {
		            beforeOpen: function() {
		                this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
		            }
		        },
		        gallery: {
		            enabled: true,
		            navigateByImgClick: true,
		            preload: [0, 1]
		        },
		        image: {
		            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
		        }
		    });
		});


		var cmscarousel = {
		    "cms-gallery-carousel": {
		        "margin": "0",
		        "loop": "true",
		        "mouseDrag": "true",
		        "nav": "true",
		        "dots": "",
		        "autoplay": "",
		        "autoplayTimeout": 5000,
		        "smartSpeed": 1000,
		        "autoplayHoverPause": "true",
		        "navText": ["<span class=\"prev\">Prev<\/span>", "<span class=\"next\">Next<\/span>"],
		        "dotscontainer": "cms-gallery-carousel .cms-dots",
		        "center": "true",
		        "responsive": {
		            "0": {
		                "items": 1
		            },
		            "768": {
		                "items": 2
		            },
		            "992": {
		                "items": 3
		            },
		            "1200": {
		                "items": 4
		            }
		        }
		    }
		};
		
    	$(".cms-carousel").each(function(){
    		var $this = $(this),slide_id = $this.attr('id'),slider_settings = cmscarousel[slide_id];
            if($this.attr('data-slidersettings')){
                slider_settings = jQuery.parseJSON($this.attr('data-slidersettings'));
            }
            else{
                slider_settings.margin = parseInt(slider_settings.margin);
                slider_settings.loop = (slider_settings.loop==="true");
                slider_settings.mouseDrag = (slider_settings.mouseDrag==="true");
                slider_settings.nav = (slider_settings.nav==="true");
                slider_settings.dots = (slider_settings.dots==="true");
                slider_settings.autoplay = (slider_settings.autoplay==="true");
                slider_settings.autoplayTimeout =  parseInt(slider_settings.autoplayTimeout);
                slider_settings.autoplayHoverPause = (slider_settings.autoplayHoverPause==="true");
                slider_settings.smartSpeed = parseInt(slider_settings.smartSpeed);
                if($('.cms-dot-container'+slide_id).length){
                    slider_settings.dotsContainer = '.cms-dot-container'+slide_id;
                    slider_settings.dotsEach = true;
                }
            }
            var filters = $this.data('filters') ? $this.data('filters') : false;
            var center = slider_settings.center;
            
            if (filters) {
				$this.clone().appendTo($this.parent()).addClass( filters.substring(1) + '-carousel-original' );
				jQuery(filters).on('click', 'a', function( e ) {
					//processing filter link
					e.preventDefault();
					if (jQuery(this).hasClass('selected')) {
						return;
					}
					var filterValue = jQuery( this ).attr('data-filter');
					jQuery(this).siblings().removeClass('selected active');
					jQuery(this).addClass('selected active');
					
					//removing old items
					$this.find('.owl-item').length;
					for (var i = $this.find('.owl-item').length - 1; i >= 0; i--) {
						$this.trigger('remove.owl.carousel', [1]);
					};

					//adding new items
					var $filteredItems = jQuery($this.next().find(' > ' +filterValue).clone());
					$filteredItems.each(function() {
						$this.trigger('add.owl.carousel', jQuery(this));
						
					});
					
					$this.trigger('refresh.owl.carousel');
				});
				
			} 
            
           //$this.owlCarousel(slider_settings);
    		$this.on({
                'initialized.owl.carousel': function () {
                     $this.show();
                }
            }).owlCarousel(slider_settings);
            
            if(center) {
				$this.addClass('owl-center');
			}
    	});
        
        $(window).on('load', function() {
            overlapOwlNavWidth();
        });
        
        $(window).on('resize', function(event, ui) {
            overlapOwlNavWidth();
        });
         
        function overlapOwlNavWidth() {
        	$('.overlapped-owl-nav').each(function(){  
        		var $carousel = $(this);
        		var itemsAmount = $carousel.find('.owl-item.active').length;
        
        		if ($carousel.hasClass('owl-center')) {  
        			if (itemsAmount % 2 !== 0 && itemsAmount !== 2 && itemsAmount !== 3) {
        				var navWidth = $carousel.width() / itemsAmount;
						
        			} else if (itemsAmount === 2) {
        				var navWidth = ($carousel.width() - ($carousel.width() / 2) * 1.15) / 2;
        			} else if (itemsAmount === 3) {
        				var navWidth = ($carousel.width() - ($carousel.width() / 3) * 1.15) / 2;
        			} else {
        				var navWidth = $carousel.width() / itemsAmount / 2;
        			}
        		} else {
        			var navWidth = $carousel.width() / itemsAmount;
        		}
        		if($carousel.width() == 1920){
					console.log('');
					$carousel.find('.owl-nav').find('.owl-prev').width(navWidth);
					$carousel.find('.owl-nav').find('.owl-next').width('255');
				}else{
					$carousel.find('.owl-nav').find('div').width(navWidth);
				}
        	});
        }
        var owlItem = 1;
    	$('.cms-carousel-team .owl-dot').each(function(){
    		$(this).text(owlItem);
    	    owlItem++;
    	});
    });
})(jQuery)