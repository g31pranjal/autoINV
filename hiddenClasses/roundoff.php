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
        $rnd = $result[rnd];
       
        if ($rnd != '') {
            $sign = substr($rnd,1,1);
            if ($sign == '+') {
                $val = substr($rnd,3);
                $posval += $val;
            }
            else {
                $val = substr($rnd,3);
                $negval += $val;
            }
        }
    }
    echo 'net :: '.($posval - $negval);    
}

?>
