$(document).ready(function() {
$.ajax({
url: "./inc/statsCenter/render.stats.php",
        success: function(data) {
            $("#body").append(data);
        }
});
});
