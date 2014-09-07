
function openLightbox() {
    $('#blackout').fadeIn();
    $('#blackoutContent').delay(400).fadeIn();
}
function closeLightbox(yes) {
    if (yes == 1)
        $('#blackout').fadeOut();
    $('.blackoutContent').fadeOut();
}
function beepNotificationBox(job, info) {
    if (job == 1)
        $('#notification-box').css("background-color", "rgb(4,164,240)");
    else if (job == 0)
        $('#notification-box').css("background-color", "rgb(250,20,20)");
    else if (job == 2)
        $('#notification-box').css("background-color", "#ffa615");


    $('#notification-text').html(info);
    $('#notification-box').animate({bottom: '0px'}, 400);
    $('#notification-box').animate({bottom: '-10px'}, 400);
    $('#notification-box').delay(2222).animate({bottom: '-50px'}, 400);
}

$(document).ready(function() {
    $.ajax({
        url: "./inc/ntfnblackout/render.ntfnblackoutFramework.php",
        success: function(data) {
            $("body").prepend(data);
        },
        complete : function() {
        $('#closeBox').click(function() {
            closeLightbox(1);
        });
    }
    });
});

