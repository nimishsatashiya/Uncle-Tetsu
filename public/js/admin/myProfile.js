$('#persional_info').submit(function () {
    //if ($(this).parsley('isValid'))
    if (true)
    {
        // return false;
        $('#submitBtnInfo').attr('disabled',true);
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
                    window.location = $('#persional_info').attr("redirect-url");
                }
                else
                {
                    $('#submitBtnInfo').attr('disabled',false);
                    $.bootstrapGrowl(result.msg, {type: 'danger', delay: 4000});
                }
                $('#submitBtnInfo').attr('disabled',false);
            },
            error: function (error) {
                $('#submitBtnInfo').attr('disabled',false);
                $('#AjaxLoaderDiv').fadeOut('slow');
                $.bootstrapGrowl("Internal server error !", {type: 'danger', delay: 4000});
            }
        });
    }            
    return false;
});
$('#change_profilepass').submit(function () {
    //if ($(this).parsley('isValid'))
    if (true)
    {
        // return false;
        $('#submitBtnPass').attr('disabled',true);
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
                    window.location = $('#change_profilepass').attr("redirect-url");
                }
                else
                {
                    $('#submitBtnPass').attr('disabled',false);
                    $.bootstrapGrowl(result.msg, {type: 'danger', delay: 4000});
                }
                $('#submitBtnPass').attr('disabled',false);
            },
            error: function (error) {
                $('#submitBtnPass').attr('disabled',false);
                $('#AjaxLoaderDiv').fadeOut('slow');
                $.bootstrapGrowl("Internal server error !", {type: 'danger', delay: 4000});
            }
        });
    }            
    return false;
});
$('#change_profile_img').submit(function () {
    //if ($(this).parsley('isValid'))
    if (true)
    {
        // return false;
        $('#submitBtnImg').attr('disabled',true);
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
                    window.location = $('#change_profile_img').attr("redirect-url");
                }
                else
                {
                    $('#submitBtnImg').attr('disabled',false);
                    $.bootstrapGrowl(result.msg, {type: 'danger', delay: 4000});
                }
                $('#submitBtnImg').attr('disabled',false);
            },
            error: function (error) {
                $('#submitBtnImg').attr('disabled',false);
                $('#AjaxLoaderDiv').fadeOut('slow');
                $.bootstrapGrowl("Internal server error !", {type: 'danger', delay: 4000});
            }
        });
    }            
    return false;
});
$('#change_profileprivacy').submit(function () {
    //if ($(this).parsley('isValid'))
    if (true)
    {
        // return false;
        $('#submitBtnPrivacy').attr('disabled',true);
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
                    window.location = $('#change_profileprivacy').attr("redirect-url");
                }
                else
                {
                    $('#submitBtnPrivacy').attr('disabled',false);
                    $.bootstrapGrowl(result.msg, {type: 'danger', delay: 4000});
                }
                $('#submitBtnPrivacy').attr('disabled',false);
            },
            error: function (error) {
                $('#submitBtnPrivacy').attr('disabled',false);
                $('#AjaxLoaderDiv').fadeOut('slow');
                $.bootstrapGrowl("Internal server error !", {type: 'danger', delay: 4000});
            }
        });
    }            
    return false;
});