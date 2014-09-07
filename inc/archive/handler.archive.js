function getArchList(yr, q) {
    $.ajax({
        url: "./inc/archive/render.archList.php?yr=" + yr + "&q=" + q,
        success: function(data) {
            $("body").append(data);
        }
    });
}

function getArchSidebar(yr, q) {
    $.ajax({
        url: "./inc/archive/render.archSidebar.php?yr=" + yr + "&q=" + q,
        success: function(data) {
            $("body").append(data);
        }
    });
}

function refreshContent(arg1, arg2) {
    arg1mod = "FY : 20" + arg1.substring(0, 2) + " - 20" + arg1.substring(2, 4);
    $('#arch_container').remove();
    beepNotificationBox(2, "Changing List to : (" + arg1mod + " " + arg2 + " INVOICE)");
    getArchList(arg1, arg2);
}

$(document).ready(function() {
    getArchSidebar('', '');
    getArchList('', '');
});
