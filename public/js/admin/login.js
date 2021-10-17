$(document).ready(function () {
    $('#parsely-frm').submit(function () {        
        if ($(this).parsley('isValid'))
        {
            $('#loginBtn').attr('disabled','disabled');
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
                    $('#loginBtn').attr('disabled',false);
                    $('#AjaxLoaderDiv').fadeOut('slow');
                    if (result.status == 1)
                    {
                        $.bootstrapGrowl(result.msg, {type: 'success', delay: 4000});
                        window.location = redirectURL;
                    }
                    else
                    {                        
                        $('#loginBtn').attr('disabled',false);
                        $.bootstrapGrowl(result.msg, {type: 'danger', delay: 4000});
                    }
                },
                error: function (error)
                {
                    $('#loginBtn').attr('disabled',false);
                    $('#AjaxLoaderDiv').fadeOut('slow');
                    $.bootstrapGrowl("Internal server error !", {type: 'danger', delay: 4000});
                }
            });
        }
        return false;
    });
});
