<?php
require('func.currentFY.php');
require('func.generateSidebar.php');

$in = $_REQUEST;
if ($in['yr'] == '')
    $yr = getCurrentFY();
else
    $yr = $in['yr'];

if ($in['q'] == '')
    $q = 'SAL';
else
    $q = $in['q'];

$obj = new generateSidebar($yr, $q);
?>


<div id="sidebar">
    <?php $obj->popullate_sidebar(); ?>
</div>

<script>
    $('.t2').click(function() {
        var extra1 = $(this).attr('id').substring(10,14);
        var extra2 = $(this).attr('id').substring(14,17);
        refreshContent(extra1,extra2);
        $('.t2').removeClass('t2active');
        $(this).addClass('t2active');
    });
</script>