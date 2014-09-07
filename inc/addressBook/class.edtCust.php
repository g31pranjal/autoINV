<?php

require('../connect.php');

$in = $_REQUEST;
$custID = $in[custID];

//echo $in[pa1];

$query1 = mysql_query("UPDATE `adb_primary` SET `adline1` =  '$in[pa1]', `adline2` =  '$in[pa2]', `adline3` =  '$in[pa3]', `tin` =  '$in[pa4]' WHERE `custID` = '$custID' LIMIT 1 ;");
$query2 = mysql_query("UPDATE `adb_secondary` SET `pon` =  '$in[pon]', `pod` =  '$in[pod]', `carrier` =  '$in[car]', `mtop` =  '$in[mtp]', `thr1` =  '$in[thr1]', `thr2` =  '$in[thr2]', `type` =  '$in[type]', `vat` =  '$in[vat]', `sat` =  '$in[sat]', `cst` =  '$in[cst]', `trns` =  '$in[trn]' WHERE `custID` = '$custID' LIMIT 1 ;");


if($query1 && $query2)
    echo '{ "job" : "1" , "notification" : "Successfully Edited : '.$in[pn].'"  }';
else
    echo '{ "job" : "0" , "notification" : "Cannot Edit the Customer Profile !"  }';

?>