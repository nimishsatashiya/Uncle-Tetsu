// NAVBAR STICKY START


// menu fixed
var headerHeight = $('.top-header').outerHeight();
$(window).scroll(function(){ 
  var sticky = $('.navbar'),
      scroll = $(window).scrollTop();

  if (scroll > headerHeight) sticky.addClass('fixed-top');
  else sticky.removeClass('fixed-top');
});
$(document).ready(function(){
        $('.submit-contact').submit(function () {
            var self = $(this);
            $('#AjaxLoaderDiv').fadeIn('slow');
            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: new FormData(this),
                contentType: false,
                processData: false,
                enctype: 'multipart/form-data',
                success: function (result)
                {
                    $('#AjaxLoaderDiv').fadeOut('slow');                    
                    if (result.status == 1)
                    {
                        $.bootstrapGrowl(result.msg, {type: 'success', delay: 4000});
                        self.trigger("reset");
                    }
                    else
                    {
                        $.bootstrapGrowl(result.msg, {type: 'danger', delay: 4000});
                    }
                },
                error: function (error) {
                    $('#AjaxLoaderDiv').fadeOut('slow');
                }
            });  
            return false;
        });

        $('.menu, .overlay').click(function () {
            $('.menu').toggleClass('clicked');
            $('#nav').toggleClass('show');
        });

        $('#category-tabs li a').click(function () {
            $(this).next('ul').slideToggle('500');
            $(this).find('i').toggleClass('fa-plus fa-minus')
        });
         $(".navbar-toggler").click(function check() {
            $(this).toggleClass("burgeractive");
        });
});
