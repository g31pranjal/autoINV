<?php

require('../connect.php');

$in = $_REQUEST;

if ($in[delID] == '')
    echo ('{ "job" : "0" , "notification" : "False Redirection !" }');
else {
    $row = mysql_fetch_array(mysql_query("SELECT * FROM `adb_primary` WHERE `custID` = '$in[delID]' LIMIT 1"));
    if ($row[hits] > 0) {
        echo ('{ "job" : "2" , "notification" : "Cannot delete the customer profile since there are invoices attached to this profile !" }');
    } else {
        if (mysql_query("DELETE FROM `adb_primary` WHERE `custID` = '$in[delID]' LIMIT 1") && mysql_query("DELETE FROM `adb_secondary` WHERE `custID` = '$in[delID]' LIMIT 1"))
            echo ('{ "job" : "1" , "notification" : "Successfully deleted Customer : ' . $row[name] . '" }');
        else
            echo ('{ "job" : "0" , "notification" : "Cannot delete the Customer Profile !" }');
    }
}
?>