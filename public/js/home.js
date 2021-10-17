window.onload = function () {

document.getElementById("mp4_src").src = '/march/chicago/video/istockphoto.mp4';
//document.getElementById("webm_src").src = 'video/chicago-kidds-video.webm';
//document.getElementById("ogg_src").src = 'video/chicago-kidds-video.ogg';
document.getElementById("video-1").autoplay = true;
document.getElementById("video-1").load();
var video = document.getElementById("video-1");

video.play();
var muteButton = document.getElementById("vidbtn");

var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);

if (isChrome)
{
    //  do not sound on for now
} else
{
    setTimeout(function () {
        $("#vidbtn").trigger("click");
    }, 400)
}

var mute2 = document.getElementById("banner");
mute2.addEventListener("click", function () {

    if (video.muted == true)
    {
        $("#vidbtn").parent().addClass('sound-animate');
        video.muted = false;
        muteButton.innerHTML = '<i class="fa fa-volume-up"></i>';
    } else
    {
        $("#vidbtn").parent().removeClass('sound-animate');
        video.muted = true;
        muteButton.innerHTML = '<i class="fa fa-volume-off"></i>';
    }
});
}

function getHeight()
{
    var hsHeight = $('.home_slider').outerHeight(true);
    var ht1 = hsHeight / 2;
    $('.home_slider').css('padding-top', ht1 + 'px');
}

$(document).ready(function () {
    getHeight();

});
$(window).on('resize', function () {
    getHeight();
});
