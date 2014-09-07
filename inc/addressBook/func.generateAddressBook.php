<?php
require '../connect.php';

function generateAddressBook() {
    $query1 = mysql_query("SELECT * FROM `adb_primary` ORDER BY `hits` DESC");
    while ($row1 = mysql_fetch_array($query1)) {
        
        $id = $row1['custID'];
        $row2 = mysql_fetch_array(mysql_query("SELECT * FROM `adb_secondary` WHERE `custID` = '$id' LIMIT 1"));
        $address='';$thr='';$type='';
        
        if ($row1[adline1] != '')
            $address = $row1[adline1] . '<br>';
        if ($row1[adline2] != '')
            $address = $address . $row1[adline2] . '<br>';
        if ($row1[adline3] != '')
            $address = $address . $row1[adline3] . '<br>';
        if ($row1[tin] != '')
            $address = $address . $row1[tin] . '<br>';

        if ($row2[thr1] != '')
            $thr = $row2[thr1] . '<br>';
        if ($row2[thr2] != '')
            $thr = $thr . $row2[thr2] . '<br>';

        if ($row2[type] != '')
            $type = $row2[type] . ' :';
        if ($row2[vat] != '')
            $type = $type . ' vat @ ' . $row2[vat] . '% ';
        if ($row2[sat] != '')
            $type = $type . ' sat @ ' . $row2[sat] . '% ';
        if ($row2[cst] != '')
            $type = $type . ' cst @ ' . $row2[cst] . '% ';

        echo('<tr class="add_entry">
                    <td class="hits_box">
                                   ' . $row1[hits] . ' <span style="font-size:15px;font-weight:normal;">hits<span>
                                </td>
                                <td class="add_box">
                                    <table class="add_head">
                                        <tr class="head_r"><td class="identity">' . $row1[name] . '</td></tr>
                                    </table>
                                    <div class="add_info">
                                        <table class="add_info_tb">
                                            <tr class="info_r"><td class="info_sgmnt" style="color:rgb(233,69,120)">' . $address . '</td></tr>
                                            <tr class="info_r"><td class="info_sgmnt">' . $type . '</td></tr>
                                            <tr class="info_r"><td class="info_sgmnt">' . $thr . '</td></tr>
                                            <tr class="info_r"><td class="info_sgmnt">PO : ' . $row2[pon] . ' DATE : ' . $row2[pod] . '</td></tr>
                                            <tr class="info_r"><td class="info_sgmnt">carrier : ' . $row2[carrier] . ' @ Rs. ' . $row2[trns] . '</td></tr>
                                            <tr class="info_r"><td class="info_sgmnt" style="font-weight:bold">custID : ' . $id . '</td></tr>
                                        </table>
                                    </div>
                                    <div class="switch_box">
                                        <div class="box_wrapper">
                                            <div id="info_switch" class="identity_nav">info</div>
                                            <div id="use'.$id.'" class="useButton identity_nav"> use </div>
                                            <div id="edt'.$id.'" class="edtButton identity_nav">edit</div>
                                            <div id="del'.$id.'" class="delButton identity_nav">del</div>
                                        </div>
                                    </div>
                                </td>
                                
                              </tr>');
    }
}
?>