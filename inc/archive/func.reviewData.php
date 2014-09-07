<?php
require '../connect.php';

function returnData($ts, $inv) {
    $row = mysql_fetch_array(mysql_query("SELECT * FROM invoice_aggregate WHERE `inv` = '$inv' AND timestamp='$ts' LIMIT 1"));
    return $row;
}

?>
