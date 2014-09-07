<?php

require ('../resource.php');

class generateList {

    function generateList($a, $b) {
        $this->yr = $a;
        $this->q = $b;
    }

    function main() {
        $this->printArchive($this->yr, $this->q);
    }

    function getDatabase($fy, $type) {
        $fy1 = substr($fy, 0, 2);
        $fy2 = substr($fy, 2, 2);
        $order = array($fy2 . '03', $fy2 . '02', $fy2 . '01', $fy1 . '12', $fy1 . '11', $fy1 . '10', $fy1 . '09', $fy1 . '08', $fy1 . '07', $fy1 . '06', $fy1 . '05', $fy1 . '04');
        for ($i = 0; $i < 12; $i++) {
            if ($type == "SAL")
                $query = mysql_query("SELECT * FROM `invoice_aggregate` WHERE `mntID` = '$order[$i]' AND `type` = 'SALE INVOICE' ORDER BY inv DESC");
            else if ($type == "TAX")
                $query = mysql_query("SELECT * FROM `invoice_aggregate` WHERE `mntID` = '$order[$i]' AND `type` = 'TAX INVOICE' ORDER BY inv DESC");
            while ($result = mysql_fetch_array($query))
                $passe[$order[$i]][] = $result[timestamp];
        }
        return $passe;
    }

    function printArchive($yr, $q) {
        $container = $this->getDatabase($yr, $q);

        echo ('<table class="content">');

        foreach ($container as $key => $v1) {
            $query = "SELECT * FROM `invoice_aggregate` WHERE timestamp = " . $container[$key][0];
            $row = mysql_fetch_array(mysql_query($query));
            $title = substr($row[invdate], 3);
            echo ('<tr style="height:20px;"></tr><tr class="con_category"><td class="con_category_subhead" colspan="6">' . $title . '</td></tr>');
            foreach ($container[$key] as $time) {
                $query = "SELECT * FROM `invoice_aggregate` WHERE timestamp = " . $time;
                $result = mysql_fetch_array(mysql_query($query));
                echo ('<tr class="con_entry">
                        <td class="con_unit" style="width:130px;">Inv. No. ' . $result["inv"] . '<br><div class="secondary_info">Dt :  ' . $result["invdate"] . '<br>PO : ' . $result['pon'] . '</div></td>
                <td class="con_unit" style="width:180px;">' . $result["party_name"] . '<br><div class="secondary_info">' . $result['party_add_1'] . "<br>" . $result['party_add_2'] . '<br>' . $result['party_add_3'] . '</div></td>
                <td class="con_unit" style="width:120px;">Rs. ' . ($result["tarnd"] == null ? $result["ta"] : $result["tarnd"] ) . '<br><div class="secondary_info">GROSS : Rs.' . $result['gt'] . '<br>tax : Rs.' . round_number_format($result['vatamt'] + $result['cstamt'] + $result['satamt']) . '</td>
                <td class="con_unit" style="width:120px;">' . date("d F Y", $result['timestamp']) . '<br><div class="secondary_info">' . date("h:i A", $result['timestamp']) . '<br>' . time_ago($result['timestamp']) . ' ago</div></td>
                <td class="con_unit" style="width:100px;"><table class="archive_navi"><tr>
                       <td class="arch_bt" ><div id="rb' . $result['timestamp'] . 'INV' . $result[inv] . '" class="reviewButton" >review</div></td></tr>
                       <tr><td class="arch_bt"><a style="color:#333;text-decoration:none;" href="' . $result['link_to_offlinecopy'] . '" target="_tab">offline copy</a></td></tr></table>
                </td></tr>');
            }
        }
    }


}

?>
