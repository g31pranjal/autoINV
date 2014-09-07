<?php

class organizeMonth {

    function p_month() {
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'euphonic_invoice';
        $link = mysql_connect($host, $username, $password) or die(mysql_error());
        $db_selected = mysql_select_db($database, $link) or die(mysql_error());

        mysql_query("TRUNCATE TABLE `div_month`");
        $row_s = mysql_query("SELECT * FROM invoice_aggregate ORDER BY timestamp ASC");
        while ($result = mysql_fetch_array($row_s)) {
            $currentCode = $result[mntID];
            if ($r1 = mysql_fetch_array(mysql_query("SELECT * FROM div_month WHERE mntID = " . $currentCode))) {
                if (strcmp($result[type], 'SALE INVOICE') == 0) {
                    if ($r1[start_s_inv] == '')
                        mysql_query("UPDATE div_month SET `start_s_inv` = '$result[inv]', `end_s_inv` = '$result[inv]' WHERE `sn` = '$r1[sn]' LIMIT 1");
                    $total_s_inv = $r1[total_s_inv] + 1;
                    $gross_s_amt = round_number_format($r1[gross_s_amt] + $result[gt]);
                    $total_s_amt = round_number_format($r1[total_s_amt] + ($result[tarnd] == null ? $result[ta] : $result[tarnd]));
                    $gt = round_number_format($r1[gt] + $result[gt]);
                    $ta = round_number_format($r1[ta] + ($result[tarnd] == null ? $result[ta] : $result[tarnd]));
                    echo ($result[invdate].' .. STR '.$r1[total_s_inv].'<br>');
                    mysql_query("UPDATE div_month SET `gt` = '$gt', `ta` = '$ta', `total_s_inv` = '$total_s_inv', `gross_s_amt` = '$gross_s_amt', `total_s_amt` = '$total_s_amt', `end_s_inv` = '$result[inv]', `end_sn` = '$result[sn]', `last_timestamp` = '$result[timestamp]' WHERE `sn` = '$r1[sn]' LIMIT 1");
                } else {
                    if ($r1[start_t_inv] == '')
                        mysql_query("UPDATE div_month SET `start_t_inv` = '$result[inv]', `end_t_inv` = '$result[inv]' WHERE `sn` = '$r1[sn]' LIMIT 1");
                    $total_t_inv = $r1[total_t_inv] + 1;
                    $gross_t_amt = round_number_format($r1[gross_t_amt] + $result[gt]);
                    $total_t_amt = round_number_format($r1[total_t_amt] + ($result[tarnd] == null ? $result[ta] : $result[tarnd]));
                    $gt = round_number_format($r1[gt] + $result[gt]);
                    $ta = round_number_format($r1[ta] + ($result[tarnd] == null ? $result[ta] : $result[tarnd]));
                    mysql_query("UPDATE div_month SET `gt` = '$gt', `ta` = '$ta', `total_t_inv` = '$total_t_inv', `gross_t_amt` = '$gross_t_amt', `total_t_amt` = '$total_t_amt', `end_t_inv` = '$result[inv]', `end_sn` = '$result[sn]', `last_timestamp` = '$result[timestamp]' WHERE `sn` = '$r1[sn]' LIMIT 1");
                }
            } else {
                $name = substr($result[invdate], 3, 8);
                $mntID = mntID($result[invdate]);
                $fy = $this->ref($name);
                $total_s_inv = 0;
                $total_t_inv = 0;
                $gross_s_amt = 0;
                $gross_t_amt = 0;
                $total_s_amt = 0;
                $total_t_amt = 0;
                $start_s_inv = null;
                $start_t_inv = null;
                $start_sn = null;
                if (strcmp($result[type], 'SALE INVOICE') == 0) {
                    $total_s_inv++;
                    $gross_s_amt = round_number_format($result[gt]);
                    $start_s_inv = $result[inv];
                    $total_s_amt = round_number_format($result[tarnd] == null ? $result[ta] : $result[tarnd]);
                    $start_sn = $result[sn];
                } else {
                    $total_t_inv++;
                    $start_t_inv = $result[inv];
                    $gross_t_amt = round_number_format($result[gt]);
                    $total_t_amt = round_number_format($result[tarnd] == null ? $result[ta] : $result[tarnd]);
                    $start_sn = $result[sn];
                }
                $gt = round_number_format($gross_s_amt + $gross_t_amt);
                $ta = round_number_format($total_s_amt + $total_t_amt);
                //echo($name . ' | ' . $fy . ' | ' . $start_sn . ' | ' . $start_t_inv . '<br>');
                mysql_query("INSERT INTO `euphonic_invoice`.`div_month` (`sn`, `mntID`, `name`, `fy`, `gt`, `ta`, `total_s_inv`, `total_t_inv`, `gross_s_amt`, `gross_t_amt`, `total_s_amt`, `total_t_amt`, `start_s_inv`, `end_s_inv`, `start_t_inv`, `end_t_inv`, `start_sn`, `end_sn`, `last_timestamp`) 
                VALUES (NULL, '$mntID', '$name', '$fy', '$gt', '$ta', '$total_s_inv', '$total_t_inv', '$gross_s_amt', '$gross_t_amt', '$total_s_amt', '$total_t_amt', '$start_s_inv', '$start_s_inv', '$start_t_inv', '$start_t_inv', '$start_sn',  '$start_sn', '$result[timestamp]');");
            }
        }
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


}

?>
