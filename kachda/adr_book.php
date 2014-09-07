<?php
require('resource.php');
error_reporting(0);
?>

<html>
    <head>
        <title>Automated Invoicing</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
        <link rel="Shortcut Icon" href="./rel_files/favicon.png" type="image/x-icon" />
        <script src="jquery.js"></script>
        <script src="waypoints.min.js"></script>
        <script src="waypoints-sticky.js"></script>
        <script type = "text/javascript" >
            $(document).ready(function() {
                $('.topheader2').waypoint('sticky');
            });
        </script>
    </head>
    <body>
        
        <?php print_top('5'); ?>       
        <div id="body">
            <div id="formf" class="formf" style="width: 52%;padding: 10px 0px;margin-bottom:15px;float:left;">
                <div class="statHead">Existing profiles</div>
                <table style="width:92%;margin: auto;border-collapse:collapse;">
                    <?php
                    $host = 'localhost';
                    $username = 'root';
                    $password = '';
                    $database = 'euphonic_invoice';
                    $link = mysql_connect($host, $username, $password) or die(mysql_error());
                    $db_selected = mysql_select_db($database, $link) or die(mysql_error());

                    $row_s = mysql_query("SELECT * FROM address_book ORDER BY hits DESC");
                    while ($result_s = mysql_fetch_array($row_s)) {
                        if ($result_s[adline1] != '')
                            $address = $result_s[adline1] . '<br>';
                        if ($result_s[adline2] != '')
                            $address = $address . $result_s[adline2] . '<br>';
                        if ($result_s[adline3] != '')
                            $address = $address . $result_s[adline3] . '<br>';
                        if ($result_s[tin] != '')
                            $address = $address . $result_s[tin] . '<br>';

                        if ($result_s[thr1] != '')
                            $thr = $result_s[thr1] . '<br>';
                        if ($result_s[thr2] != '')
                            $thr = $thr . $result_s[thr2] . '<br>';

                        if ($result_s[type] != '')
                            $type = $result_s[type] . ' :';
                        if ($result_s[vat] != '')
                            $type = $type . ' vat @ ' . $result_s[vat] . '% ';
                        if ($result_s[sat] != '')
                            $type = $type . ' sat @ ' . $result_s[sat] . '% ';
                        if ($result_s[cst] != '')
                            $type = $type . ' cst @ ' . $result_s[cst] . '% ';

                        echo('<tr class="add_entry">
                                <td class="hits_box">
                                   ' . $result_s[hits] . ' <span style="font-size:15px;font-weight:normal;">hits<span>
                                </td>
                                <td class="add_box">
                                    <table class="add_head">
                                        <tr class="head_r"><td class="identity">' . $result_s[name] . '</td></tr>
                                    </table>
                                    <div class="add_info">
                                        <table class="add_info_tb">
                                            <tr class="info_r"><td class="info_sgmnt">' . $type . '</td></tr>
                                            <tr class="info_r"><td class="info_sgmnt">' . $address . '</td></tr>
                                            <tr class="info_r"><td class="info_sgmnt">' . $thr . '</td></tr>
                                            <tr class="info_r"><td class="info_sgmnt">PO : ' . $result_s[pon] . ' DATE : ' . $result_s[pod] . '</td></tr>
                                            <tr class="info_r"><td class="info_sgmnt">carrier : ' . $result_s[carrier] . ' @ Rs. ' . $result_s[trns] . '</td></tr>
                                        </table>
                                    </div>
                                    <div class="switch_box"><div class="box_wrapper">
                                    <div id="info_switch" class="identity_nav">info </div>
                                    <a href="invform.php?ri=y&rs=adr_book&name=' . $result_s[name] . '&adline1=' . $result_s[adline1] . '&adline2=' . $result_s[adline2] . '&adline3=' . $result_s[adline3] . '&tin=' . $result_s[tin] . '&type=' . $result_s[type] . '&pon=' . $result_s[pon] . '&pod=' . $result_s[pod] . '&vat=' . $result_s[vat] . '&sat=' . $result_s[sat] . '&cst=' . $result_s[cst] . '&trns=' . $result_s[trns] . '&mtop=' . $result_s[mtop] . '&carrier=' . $result_s[carrier] . '&thr1=' . $result_s[thr1] . '&thr2=' . $result_s[thr2] . '"><div class="identity_nav"> use </div></a>
                                    </div>
                                    </div>
                                </td>
                                
                              </tr>');
                    }
                    ?>
                </table>
            </div>
            <div id="updateBox" class="updateBox" style="top:45%;position:fixed;width:40%;left:55%;">
                <a href="./class.updateAddressBook.php?token=redirected" style="text-decoration: none;color:white;"> <div id="p_button" class="p_button p_button_c2" style="width: 280px;">Update </div></a>
                <div style="font-size: 13px;text-align: center;text-transform: uppercase;margin: 10px;padding: 10px 5px;line-height: 20px;">
                    Click on the "Update" button to directly update the Address Book. Recommended in the case the changes are made directly to the database.</div>
                <a href="./sqlbuddy/#page=browse&db=euphonic_invoice&table=address_book&topTabSet=2" target="newtab" style="font-size: 13px;border:1px solid #ddd;text-transform: uppercase;margin-top: 10px;text-decoration: underline;padding: 10px 150px;line-height: 20px;">EDIT DIRECTLY TO THE DATABASE</a>
            </div>

        </div>
    </body>
</html>

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