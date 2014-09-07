
$(document).ready(function() {
    var url = window.location.href;
    var page = url.substring(url.lastIndexOf('/')+1, url.lastIndexOf('.'));
    raw = $.param({ page : page });
    $.ajax({
        url: "./inc/header/render.header.php",
        type: "POST",
        data : raw, 
        success: function(data) {
            $("body").prepend(data);
        },
    });
});

