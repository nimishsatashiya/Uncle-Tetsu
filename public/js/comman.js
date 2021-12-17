$(document).ready(function(){
    $('.form').parsley();
    $('.form2').parsley();
    $('.form3').parsley();
    // CKEDITOR.replace( 'ckeditor' );
});

    
/* tiny mce configration */
function loadTinymce(selector){
 tinymce.init({
    selector: selector,
    apply_source_formatting : true,
    theme: "modern",
    height: 300,
    relative_urls: false,
    remove_script_host: false,
    valid_elements : '*[*]',
    plugins: [
      "advlist autolink link image lists charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
      "save table contextmenu directionality emoticons template paste textcolor", "jbimages"
      ],      
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
      style_formats: [
     {title: 'Bold text', inline: 'b'},
     {title: 'Example 1', inline: 'span', classes: 'example1'},
     {title: 'Example 2', inline: 'span', classes: 'example2'},
     {title: 'Table styles'},
     {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ],
    relative_urls : false,      
    
   });    
    
}


/* equal height */
function equalHeight(group) {
  tallest = 0;
  group.each(function () {
    thisHeight = $(this).height();
    if (thisHeight > tallest) {
      tallest = thisHeight;
    }
  });
  group.height(tallest);
}


function contHeight(){
  var vpHight= $(window).height();
  var hTop= $('.page-header').height();
  var hFtr= $('.page-footer').outerHeight();
  var hCont=vpHight-(hTop+hFtr);
  $('.page-content').css('min-height', hCont+'px');
  //console.log(vpHight, hTop, hFtr);
}
$(document).ready(function(){
  contHeight();  
  $('#malaysia').click(function () {
      $('.malaysia').toggleClass('active');
  });
  $('#Korea').click(function () {
    $('.korea').toggleClass('active');
});
});
$( window ).load(function() {
  contHeight();
});
$(window).resize(function(){
   contHeight();
});