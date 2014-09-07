<?php
require 'func.generateAddressBook.php';
?>
<div id="extCustomerWrapper" class="extCustomerWrapper blackoutContentWrapper">
    <div id="divneo" class="divneo" >
        <div class="statHead">CHOOSE THE CUSTOMER PORFILE<br>
            <button id="addButton" class="addButton">Add Customer</button>
        </div>
        <table style="width:92%;margin: auto;border-collapse:collapse;">
            <?php generateAddressBook() ?>
            <script type="text/javascript">
                $('tr.add_entry').mouseover(function() {
                    // $(this).children("td.add_box").children("div.identity_nav").css({'color':'#333','border': '1px solid #aaa'});
                    $(this).children("td.add_box").children("div.switch_box").children("div.box_wrapper").show();
                });
                $('tr.add_entry').mouseout(function() {
                    $(this).children("td.add_box").children("div.switch_box").children("div.box_wrapper").hide();
                });
                $('div#info_switch').click(function() {
                    if ($(this).parent().parent().parent().children("div.add_info").css('display') == 'none')
                        $(this).parent().parent().parent().children("div.add_info").slideDown();
                    else
                        $(this).parent().parent().parent().children("div.add_info").slideUp();
                });
            </script>
        </table>
    </div>
</div>

<script>
    $('.delButton').click(function() {
        var delref = ($(this).attr('id')).substring(3);
        $.ajax({
            url: "./inc/addressBook/class.delCust.php?delID=" + delref,
            //data: $.param({delID : delref}),      
            success: function(data) {
                var obj = jQuery.parseJSON(data);
                closeLightbox(1);
                beepNotificationBox(obj.job, obj.notification);
            }
        });
    });
    $('.edtButton').click(function() {
        var edtref = ($(this).attr('id')).substring(3);
        $.ajax({
            url: "./inc/addressBook/render.edtCustForm.php?edtID=" + edtref,
            success: function(data) {
                $('#blackoutContent').html(data);
            }
        });
    });
    $('.addButton').click(function() {
        $.ajax({
            url: "./inc/addressBook/render.addCustForm.php",
            success: function(data) {
                $('#blackoutContent').html(data);
            }
        });
    });
    $('.useButton').click(function() {
        var useref = ($(this).attr('id')).substring(3);
        $.ajax({
            url: "./inc/addressBook/class.useCust.php",
            type : "POST",
            data : $.param({ useID : useref}),
            success: function(data) {
                var obj = jQuery.parseJSON(data);
                beepNotificationBox(obj.job, obj.notification)
                fillCustProfile(obj.data);
                closeLightbox(1);
            }
        });
    });
</script>