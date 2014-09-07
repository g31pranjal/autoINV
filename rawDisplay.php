<!DOCTYPE html>
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
        <?php
        $inst = new Display();
        $inst->rawDisplay();
        ?>
    </body>
</html>



<?php

class Display {

    function rawDisplay() {
        $con = mysql_connect("localhost", "pranjal_gupta", "rocksoul") or die(mysql_error());
        mysql_select_db("euphonic_invoice", $con);
        $row = mysql_query("SELECT * FROM invoice_aggregate ORDER BY sn ASC");

        echo ('<table border="1" style="text-align:center;width:5000px">
    ');

        echo ('<tr>
        <td>Serial No.</td>
        <td>Month ID </td>
        <td>Invoice Type</td>
        <td>party name</td>
        <td>address</td>
        <td>tin/cst no</td>
        <td>invoice (no and date of issue)</td>
        <td>invoice book</td>
        <td>party order no n date </td>  
        <td>through</td>
        <td>number of cases</td>  
        <td>carrier</td>  
        <td>Docket No.</td>  
        <td>Mode/Terms</td>
        <td>Product 1</td>
        <td>Product 2</td>
        <td>Product 3</td>
        <td>Product 4</td>
        <td>Product 5</td>
        <td>Taxes</td>
        <td>Total Quantity</td>
        <td>Gross Total</td>
        <td>Transportation</td>
        <td>Total basic Excise</td>
        <td>Taxes</td>
        <td>Date and Time of Issuing Invoice</td>
        <td>Date and Time of Removing Goods</td>
        <td>link to OfflineCopy</td>
        <td>authentication Key</td>
        <td>Timestamp</td>
    </tr>
    ');
        while ($result = mysql_fetch_array($row)) {

            echo ('<tr>
        <td>' . $result["sn"] . '</td>
        <td>' . $result["mntID"] . '</td>
        <td>' . substr($result["type"], 0, 3) . '</td>
        <td>' . $result["party_name"] . '</td>
        <td>' . $result["party_add_1"] . '<br>' . $result["party_add_2"] . '<br>' . $result["party_add_3"] . '</td>
        <td>' . $result["tin_cst_no"] . '</td>
        <td>' . $result["inv"] . '<br>date : ' . $result[invdate] . '</td>
        <td>' . $result["tib"] . '</td>
        <td>' . $result["pon"] . '<br>date : ' . $result[podate] . '</td>
        <td>' . $result["thr1"] . '<br> ' . $result[thr2] . '</td>
        <td>' . $result["number_cases"] . '</td>
        <td>' . $result["carrier"] . '</td>
        <td>' . $result["dispatch_no"] . '</td>
        <td>' . $result["mode_terms"] . '</td>
        <td>' . $result["pd1"] . '<br>QNT : ' . $result["qt1"] . ' @ Rs.' . $result["rt1"] . ' = Rs.' . $result[av1] . '<br> DR : ' . $result[dr1] . ' BE : ' . $result[be1] . '<br>PV : Rs. ' . $result[pv1] . '</td>
        <td>' . $result["pd2"] . '<br>QNT : ' . $result["qt2"] . ' @ Rs.' . $result["rt2"] . ' = Rs. ' . $result[av2] . '<br> DR : ' . $result[dr2] . ' BE : ' . $result[be2] . '<br>PV : Rs. ' . $result[pv2] . '</td>
        <td>' . $result["pd3"] . '<br>QNT : ' . $result["qt3"] . ' @ Rs.' . $result["rt3"] . ' = Rs. ' . $result[av3] . '<br> DR : ' . $result[dr3] . ' BE : ' . $result[be3] . '<br>PV : Rs. ' . $result[pv3] . '</td>
        <td>' . $result["pd4"] . '<br>QNT : ' . $result["qt4"] . ' @ Rs.' . $result["rt4"] . ' = Rs. ' . $result[av4] . '<br> DR : ' . $result[dr4] . ' BE : ' . $result[be4] . '<br>PV : Rs. ' . $result[pv4] . '</td>
        <td>' . $result["pd5"] . '<br>QNT : ' . $result["qt5"] . ' @ Rs.' . $result["rt5"] . ' = Rs. ' . $result[av5] . '<br> DR : ' . $result[dr5] . ' BE : ' . $result[be5] . '<br>PV : Rs. ' . $result[pv5] . '</td>
        <td> CST : ' . $result["cst"] . ' : ' . $result[cstamt] . '<br> VAT : ' . $result["vat"] . ' : ' . $result[vatamt] . '<br> SAT : ' . $result["sat"] . ' : ' . $result[satamt] . '</td>
        <td>' . $result["tqt"] . '</td>
        <td>' . $result["gt"] . '</td>
        <td>' . $result["trn"] . '</td>
        <td>' . $result["tbe"] . '</td>
        <td>' . $result["ta"] . '<br>Rounding Off : ' . $result[rnd] . '<br> = rs. ' . $result[tarnd] . '</td>
        <td>' . $result["iit"] . '<br>' . $result[iidate] . '</td>
        <td>' . $result["rgt"] . '<br>' . $result[rgdate] . '</td>
        <td>' . $result["link_to_offlinecopy"] . '</td>
        <td>' . $result["authentication_key"] . '</td>
        <td>' . $result["timestamp"] . '</td>
    </tr>
    ');
        }

        echo '</table>';
    }

}
?>