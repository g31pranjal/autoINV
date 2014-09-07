<?php

require ('../connect.php');

function getCurrentFY() {
    $query1 = mysql_query("SELECT * FROM invoice_aggregate ORDER BY mntID DESC");
    $row1 = mysql_fetch_array($query1);
    $mnt = $row1[mntID];
    $month = (0 + substr($mnt, 2));
    if ($month <= 3)
        $fy = (substr($mnt, 0, 2) - 1) . substr($mnt, 0, 2);
    else
        $fy = (substr($mnt, 0, 2)) . (substr($mnt, 0, 2) + 1);

    return $fy;
}

?>