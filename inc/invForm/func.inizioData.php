<?php

require '../connect.php';

function returnData($auth) {
    $row_s = mysql_query("SELECT * FROM tmp WHERE authentication_key='" . $auth . "'");
    $in = mysql_fetch_array($row_s);
    return $in;
    
}

?>
