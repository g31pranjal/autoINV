<?php

require('../connect.php');

$in = $_POST;

if ($in[useID] == '')
    echo '{ "job" : "0" , "notification" : "False Redirection !" }';
else {
    $row1 = mysql_fetch_array(mysql_query("SELECT * FROM `adb_primary` WHERE `custID` = '$in[useID]' LIMIT 1"));
    $row2 = mysql_fetch_array(mysql_query("SELECT * FROM `adb_secondary` WHERE `custID` = '$in[useID]' LIMIT 1"));
    $useDetails = '{ "custID" : "'.$row1[custID].'", "name" : "'.$row1[name].'", "adline1" : "'.$row1[adline1].'", "adline2" : "'.$row1[adline2].'", "adline3" : "'.$row1[adline3].'","tin" : "'.$row1[tin].'", "mtop" : "'.$row2[mtop].'", "carrier" : "'.$row2[carrier].'", "thr1" : "'.$row2[thr1].'", "thr2" : "'.$row2[thr2].'", "type" : "'.$row2[type].'", "vat" : "'.$row2[vat].'", "sat" : "'.$row2[sat].'", "cst" : "'.$row2[cst].'","pon" : "'.$row2[pon].'", "pod" : "'.$row2[pod].'", "trns" : "'.$row2[trns].'" }';
    $ret = '{ "job" : "1" , "notification" : "Added Customer : '.$row1[name].'", "data" : '.$useDetails.' }';
    echo $ret;
}
?>