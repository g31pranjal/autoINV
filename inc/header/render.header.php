<?php

require 'func.getHeaderContent.php';
$in = $_POST;
?>
<script type = "text/javascript" >
    $(document).ready(function() {
        $('.topheader2').waypoint('sticky');
    });
</script>

<div id="header">
    <div class="navigation_container">
        <a id="bt_sch" class="bt"href="http://localhost/euphonic_invoice/version.history/">HISTORY</a>
        <a id="bt_tab" class="bt"href="./sqlbuddy" target="tab">dBASE</a>
        <a id="bt_sch" class="bt"href="./pad_editor.php">EDITOR</a>
        <a id="bt_abt" class="bt"href="./invform.php">INVOICE</a>
    </div>
    <a href="./" style="text-decoration:none;"><div class="heading">auto<span class="heading_later"><span style="font-size: 35px;">|</span>INV</span></div></a>
</div>

<?php echo getHeader($in[page]); ?>

