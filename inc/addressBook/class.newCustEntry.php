<?php

require('../connect.php');

$in = $_GET;
$back = 0;

if ($in[pn] == '' || $in[pa1] == '' || $in[pa4] == '')
    echo '{ "job" : "0" , "notification" : "Incomplete Information !"}';
else {
    $keyword = substr($in[pn], 0, (strpos($in[pn] . ' ', ' ', 3)));
    $duplicate = 0;

    $query1 = mysql_query("SELECT * FROM `adb_primary` ORDER BY `hits` ASC ");
    while ($row1 = mysql_fetch_array($query1)) {
        $taken = substr($row1[name], 0, (strpos($row1[name], ' ', 3)));
        if (strcasecmp($keyword, $taken) == 0) {
            $duplicate = 1;
            break;
        }
    }

    if ($duplicate == 0) {
        $num = 0;
        $query2 = mysql_query("SELECT * FROM `adb_primary` ORDER BY `custID` DESC LIMIT 1");
        $row2 = mysql_fetch_row($query2);
        $id = substr($row2[0], 2);
        $id = 'A0' . (++$id);
        if( mysql_query("INSERT INTO `adb_primary` (`custID`, `name`, `adline1`, `adline2`, `adline3`, `tin`, `hits`) VALUES ('$id','$in[pn]','$in[pa1]','$in[pa2]','$in[pa3]','$in[pa4]',0)") && mysql_query("INSERT INTO `adb_secondary` (`custID`, `name`) VALUES ('$id','$in[pn]')"))
            echo '{ "job" : "1" , "notification" : "Successfully added new customer profile !!", "newID" : "'.$id.'" }';
        else
            echo '{ "job" : "0" , "notification" : "Cannot add new profile. Please add the profile directly through Database !" }';
        
    } else {
        echo '{ "job" : "2" , "notification" : "The Customer profile already exists. Cannot add again !"}';
    }
}
?>