
$(document).ready(function() {
    $.ajax({
        url: "./inc/invForm/render.form.php",
        success: function(data) {
            $("#body").prepend(data);
        }
    });

});
