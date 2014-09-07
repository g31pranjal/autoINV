<?php path(); ?>

<?php

function path() {
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'euphonic_invoice';
    $link = mysql_connect($host, $username, $password) or die(mysql_error());
    $db_selected = mysql_select_db($database, $link) or die(mysql_error());

    $row_s = mysql_query("SELECT * FROM invoice_aggregate ORDER BY sn ASC");
    while ($result = mysql_fetch_array($row_s)) {
        $path = $result[link_to_offlinecopy];
        $repath = 'http://localhost/euphonic_invoice/store/';
        $invdate = $result[invdate];
        
        if (substr($invdate, strlen($invdate) - 8, 3) == "Jan" || substr($invdate, strlen($invdate) - 8, 3) == "Feb" || substr($invdate, strlen($invdate) - 8, 3) == "Mar")
            $tree_1 = "FY " . ( substr($invdate, 7, 4) - 1) . "-" . (substr($invdate, 7, 4));
        else
            $tree_1 = "FY " . ( substr($invdate, 7, 4)) . "-" . (substr($invdate, 7, 4) + 1);
        
        $tree_2 = substr($invdate, 3, 3) . " " . substr($invdate, 7, 4);
        
        $repath = $repath.$tree_1.'/'.$tree_2.'/'.substr($result[type],0,3).' Inv.'.$result[inv].' Dt.'.$result[invdate].' '.$result[party_name].'.html';
        
        echo $repath.'<br>';
        
        mysql_query("UPDATE invoice_aggregate SET `link_to_offlinecopy` = '$repath' WHERE `sn` = '$result[sn]' LIMIT 1");
    }
}

?>
