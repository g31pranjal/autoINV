<?php
require('func.currentFY.php');
require('func.generateList.php');

$in = $_REQUEST;
if ($in['yr'] == '')
    $yr = getCurrentFY();
else
    $yr = $in['yr'];

if ($in['q'] == '')
    $q = 'SAL';
else
    $q = $in['q'];

$obj = new generateList($yr, $q);
?>
<div id="arch_container" >
    <div class="con_category_head"><?php echo ('<span style="font-size:15px;font-weight:normal">20' . substr($yr, 0, 2) . ' - 20' . substr($yr, 2, 2) . "</span> : " . $q . ' invoice'); ?></div>
    <?php
    $obj->main();
    ?>
</div>

<script>
    $('.reviewButton').click(function() {
        var revID = $(this).attr('id');
        var ts = revID.substring(2,12);
        var inv = revID.substring(15,18);
        $.ajax({
            url: "./inc/archive/render.reviewMod.php?ts=" + ts + "&inv=" + inv,
            success: function(data) {
                $('#blackoutContent').html(data);
            }
        });
        openLightbox();
    });
</script>