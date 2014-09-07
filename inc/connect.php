<?php

$connectInst = new connect();

class connect {

    function connect() {
        $credential['host'] = 'localhost';
        $credential['username'] = 'pranjal_gupta';
        $credential['password'] = 'rocksoul';
        $con = mysql_connect($credential['host'],$credential['username'],$credential['password']);
        if (!$con)
            die('Could not connect: ' . mysql_error());
        else {
            mysql_select_db("euphonic_invoice", $con);
        }
    }
}
?>