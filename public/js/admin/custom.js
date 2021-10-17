$(document).ready(function () {

    $('#main-frm').submit(function () {

        if ($(this).parsley('isValid'))
        {
            $('#submitBtn').attr('disabled',true);
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
                        window.location = $('#main-frm').attr("redirect-url");
                    }
                    else
                    {
                        $('#submitBtn').attr('disabled',false);
                        $.bootstrapGrowl(result.msg, {type: 'danger', delay: 4000});
                    }
                    $('#submitBtn').attr('disabled',false);
                },
                error: function (error) {
                    $('#submitBtn').attr('disabled',false);
                    $('#AjaxLoaderDiv').fadeOut('slow');
                    $.bootstrapGrowl("Internal server error !", {type: 'danger', delay: 4000});
                }
            });
        }            
        return false;
    });
    
    $("#start_date").datepicker({
        dateFormat: 'yy-mm-dd',
        changeYear: true,
        changeMonth: true,
        yearRange: '1900:2050',
        showButtonPanel: false,
        onClose: function (selectedDate) {
            $("#end_date").datepicker("option", "minDate", selectedDate);
        }
    });
    $("#end_date").datepicker({
        dateFormat: 'yy-mm-dd',
        changeYear: true,
        changeMonth: true,
        yearRange: '1900:2050',
        showButtonPanel: false,
        onClose: function (selectedDate) {
            $("#start_date").datepicker("option", "maxDate", selectedDate);
        }
    });    
    $("#city_name").prop('disabled', true);
    $('#state_name').on('change',function(){
        var stateID = $(this).val();            
        if(stateID){
            $("div#divLoading").addClass('showLoader');
            $.ajax({
                type:"GET",
                url:"get-city-list?state_id="+stateID, 
                                     
                success:function(res){               
                    if(res){                 
                        $("div#divLoading").removeClass('showLoader');       
                        $("#city_name").empty();
                        $("#city_name").prop('disabled', false);
                        $("#city_name").append('<select class="form-control">Search City</select>');
                        $.each(res,function(key,value){
                            $("#city_name").append('<option value="'+key+'">'+value+'</option>');
                        });
                   
                    }else{
                       $("#city_name").empty();
                    }
                }
            });
        }
        else{            
            $("#city_name").empty();
        }

    });
   
    $("#state_name").select2({
            placeholder: "Search State Name",
            allowClear: true,
            minimumInputLength: 0,
            width: null
    });
    $("#city_name").select2({
            placeholder: "Search City Name",
            allowClear: true,
            minimumInputLength: 0,
            width: null
    });
    $('#select2_sample2').on('change', function() {
        var value = $( this ).val();
        $( "p" ).text( value );
    });
    
});




$(document).ready(function() {
  /*multiple image preview first input*/

  $("#files").on("change", handleFileSelect);

  selDiv = $("#selectedFiles");
  $("#main-frm").on("submit", handleForm);

  $("body").on("click", ".selFile", removeFile);

  /*end image preview */
});


var selDiv = "";
// var selDivM="";
var storedFiles = [];

function handleFileSelect(e) {

  var files = e.target.files;
  var filesArr = Array.prototype.slice.call(files);
  var device = $(e.target).data("device");
  filesArr.forEach(function(f) {

    if (!f.type.match("image.*")) {
      return;
    }
    storedFiles.push(f);

    var reader = new FileReader();
    reader.onload = function(e) {
      var html = "<div><i class='fa fa-file-o todo-grey' title='Click to remove'>" + f.name + "<br clear=\"left\"/></i><i class='fa fa-times todo-remove-file selFile'></i></div>";

      /*var html = '<i class="fa fa-file-o todo-grey" id="attach_img">'+ f.name +'</i><i class="fa fa-times todo-remove-file selFile"></i><br>';*/

      $("#selectedFiles").append(html);
    }
    reader.readAsDataURL(f);
  });

}

function handleForm(e) {
  e.preventDefault();
  var data = new FormData();

  for (var i = 0, len = storedFiles.length; i < len; i++) {
    data.append('files', storedFiles[i]);
  }

  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'handler.cfm', true);

  xhr.onload = function(e) {
    if (this.status == 200) {
      console.log(e.currentTarget.responseText);
      alert(e.currentTarget.responseText + ' items uploaded.');
    }
  }

  xhr.send(data);
}

function removeFile(e) {
  var file = $(this).data("file");  
  for (var i = 0; i < storedFiles.length; i++) {
    if (storedFiles[i].name === file) {
      storedFiles.splice(i, 1);
      break;
    }
  }
  $(this).parent().remove();
}