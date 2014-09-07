<?php anal();
?>

<?php

// fill the table (: prod )[cols : catID, name] from raw data from table(: invoice_aggregate)
function prod() {
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'euphonic_invoice';
    $link = mysql_connect($host, $username, $password) or die(mysql_error());
    $db_selected = mysql_select_db($database, $link) or die(mysql_error());
    $sn = 1;
    $row_type = mysql_query("SELECT * FROM  `product_category` ORDER BY `pcatID` ASC ");
    while ($result_type = mysql_fetch_array($row_type)) {
        $type = $result_type[name];
        $row_s = mysql_query("SELECT * FROM invoice_aggregate ORDER BY sn ASC");
        while ($result = mysql_fetch_array($row_s)) {
            for ($i = 1; $i <= 5; $i++)
                if ($result['pd' . $i] != '') {
                    $num = strpos($result['pd' . $i], ':');
                    $prd = substr($result['pd' . $i], $num + 2);
                    $typ = substr($result['pd' . $i], 0, $num - 1);
                    if ($type == $typ) {
                        echo ($sn++ . '.   ' . $prd . '<br>');
                        mysql_query("INSERT INTO `prod` (catID,name) VALUES ('$result_type[pcatID]','$prd')");
                    }
                }
        }
    }
}

//Copy the unique members of table(: prod) to prod1[cols : id, catID, name, occurnaces, pvaID]
function copyprd() {
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'euphonic_invoice';
    $link = mysql_connect($host, $username, $password) or die(mysql_error());
    $db_selected = mysql_select_db($database, $link) or die(mysql_error());
    $sn = 1;

    $query = "truncate table prod1";
    if (mysql_query($query))
        ;

    $row_s = mysql_query("SELECT * FROM prod ORDER BY name ASC");
    while ($result_s = mysql_fetch_array($row_s)) {
        //echo $result_s[name].'<br>'.$dif.' <> cmp'.strcasecmp($dif, $result_s[name]).'<br>';
        if (strcmp($dif, $result_s[name]) == 0) {
            //echo 'true<br>';
            $dif = $result_s[name];

            continue;
        } else {
            echo $sn++ . '..  ' . $result_s[name] . '-----------------------------------------------------<br>';
            $dif = $result_s[name];
            mysql_query("INSERT INTO prod1 (catID,name) VALUES ('$result_s[catID]','$result_s[name]')");
        }
    }
}

//Calculating the occurances of each product in the invoice_aggregate
function disp() {
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'euphonic_invoice';
    $link = mysql_connect($host, $username, $password) or die(mysql_error());
    $db_selected = mysql_select_db($database, $link) or die(mysql_error());


    for ($num = 1; $num <= 33; $num++) {
        //$chg = 'P-08 8 Ohms';
        $ele = mysql_query("SELECT * FROM prod1 WHERE `id` = '$num' LIMIT 1");
        $erow = mysql_fetch_row($ele);
        $elname = $erow[2];
        $occ = 0;
        $row_s = mysql_query("SELECT * FROM invoice_aggregate ORDER BY sn ASC");
        while ($result_s = mysql_fetch_array($row_s)) {

            for ($i = 1; $i <= 5; $i++)
                if ($result_s['pd' . $i] != '') {
                    $prd = $result_s['pd' . $i];
                    //echo $prd.'<br>';

                    if (strcasecmp($prd, $elname) == 0) {
                        $occ++;
                        //mysql_query("UPDATE  `euphonic_invoice`.`invoice_aggregate` SET `pd$i` =  'Speaker : $chg' WHERE  `sn` = $result_s[sn] ");
                        echo($result_s[party_name] . ' dt. ' . $result_s['rt' . $i] . ' prd. ' . $i . ' ' . $prd . '<br>');
                    }
                }
        }
        echo $occ . '<br><br>';
        mysql_query("UPDATE  `euphonic_invoice`.`prod1` SET  `occurances` =  '$occ' WHERE  `id` = $num ");
    }
}

//Changing / filling columns of prod1
function transfer() {
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'euphonic_invoice';
    $link = mysql_connect($host, $username, $password) or die(mysql_error());
    $db_selected = mysql_select_db($database, $link) or die(mysql_error());

    $c1 = 0;
    $c2 = 0;
    for ($num = 1; $num <= 37; $num++) {
        $ele = mysql_query("SELECT * FROM prod1 WHERE `id` = '$num' LIMIT 1");
        $erow = mysql_fetch_row($ele);
        $cid = $erow[1];
        $cat = 0;
        $cat = substr($cid, 3);

        if ($cat == 1) {
            $c1++;
            if ($c1 < 10)
                $pvarID = 'L20' . $cat . '00' . $c1;
            else
                $pvarID = 'L20' . $cat . '0' . $c1;
        }
        else {
            $c2++;
            if ($c2 < 10)
                $pvarID = 'L20' . $cat . '00' . $c2;
            else
                $pvarID = 'L20' . $cat . '0' . $c2;
        }

        echo $pvarID . '<br>';
        $row_s = mysql_query("UPDATE `prod1` SET  `pvarID` =  '$pvarID' WHERE `id` ='$num'");
    }
}

//popullate product_variant
function decode() {
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'euphonic_invoice';
    $link = mysql_connect($host, $username, $password) or die(mysql_error());
    $db_selected = mysql_select_db($database, $link) or die(mysql_error());

    $ele = mysql_query("SELECT * FROM prod1 ORDER BY name ASC");
    while ($erow = mysql_fetch_array($ele)) {
        echo $pvarID . '<br>';
        mysql_query("INSERT INTO `product_variant` (pvarID, pcatID, name) VALUES ('$erow[pvarID]','$erow[catID]','$erow[name]')");
    }
}

//Calculating the occurances of each product in the invoice_aggregate
function anal() {
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'euphonic_invoice';
    $link = mysql_connect($host, $username, $password) or die(mysql_error());
    $db_selected = mysql_select_db($database, $link) or die(mysql_error());


    $ele = mysql_query("SELECT * FROM product_variant ORDER BY name ASC");
    while ($erow = mysql_fetch_array($ele)) {
        $qt=0;$oc=0;
        $elname = $erow[name];
        $row_s = mysql_query("SELECT * FROM invoice_aggregate ORDER BY sn ASC");
        while ($result_s = mysql_fetch_array($row_s)) {
            for ($i = 1; $i <= 5; $i++) {
                if ($result_s['pd' . $i] != '') {
                    $prd = substr($result_s['pd'.$i],0);
                    if (strcasecmp($result_s['pd' . $i], $elname) == 0) {
                        echo '=<br>';
                        $oc++;
                        //echo '************************'.$oc.'<br>';
                        $qt += $result_s['qt' . $i];
                        //mysql_query("UPDATE  `euphonic_invoice`.`invoice_aggregate` SET `pd$i` =  'Speaker : $chg' WHERE  `sn` = $result_s[sn] ");
                        //echo($result_s[party_name] . ' dt. ' . $result_s['rt' . $i] . ' prd. ' . $i . ' ' . $prd . '<br>');
                    }
                }
            }
        }
        //echo $occ . '<br><br>';
        mysql_query("INSERT INTO `product_analysis` (`pvarID`,`name`,`occurances`,`quantity`,`per`) VALUES ('$erow[pvarID]','$elname','$oc','$qt','".($qt/$oc)."')");
    }
}
?>
