<?php p_month(); ?>

<?php

function p_month() {
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'euphonic_invoice';
    $link = mysql_connect($host, $username, $password) or die(mysql_error());
    $db_selected = mysql_select_db($database, $link) or die(mysql_error());

    $row_s = mysql_query("SELECT * FROM invoice_tax ORDER BY sn ASC");
    while ($result = mysql_fetch_array($row_s)) {
        $mntID = dateCode($result[invdate]);
        mysql_query("UPDATE invoice_tax SET `mntID` = '$mntID' WHERE `sn` = '$result[sn]' LIMIT 1");
    }
}

function dateCode($invdate) {
    switch (substr($invdate, 3, 3)) {
        case 'Apr':$mnt = '04';
            break;
        case 'May':$mnt = '05';
            break;
        case 'Jun':$mnt = '06';
            break;
        case 'Jul':$mnt = '07';
            break;
        case 'Aug':$mnt = '08';
            break;
        case 'Sep':$mnt = '09';
            break;
        case 'Oct':$mnt = '10';
            break;
        case 'Nov':$mnt = '11';
            break;
        case 'Dec':$mnt = '12';
            break;
        case 'Jan':$mnt = '01';
            break;
        case 'Feb':$mnt = '02';
            break;
        case 'Mar':$mnt = '03';
            break;
    }
    $mnt = substr($invdate, 9, 2) . $mnt;
    return $mnt;
}

function ref($q) {
    $pre = array('Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
    $post = array('Jan', 'Feb', 'Mar');
    $success = false;
    for ($i = 0; $i < count($pre); $i++)
        if (strcmp($pre[$i], substr($q, 0, 3)) == 0) {
            $success = true;
            $fy = substr($q, 4, 4) . "-" . (substr($q, 4, 4) + 1);
        }
    if ($success == false)
        for ($i = 0; $i < count($post); $i++)
            if (strcmp($post[$i], substr($q, 0, 3)) == 0) {
                $success = true;
                $fy = (substr($q, 4, 4) - 1) . "-" . substr($q, 4, 4);
            }
    return $fy;
}

function round_number_format($value) {
    return number_format(round($value, 2), 2, '.', '');
}
?>
