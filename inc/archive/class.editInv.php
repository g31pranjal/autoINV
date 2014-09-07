<?php

require('../connect.php');

$in = $_REQUEST;
$inv = $in['inv'];
$ts = $in['timestamp'];

$query =  mysql_query("UPDATE invoice_aggregate SET carrier='" . $in['car'] . "', dispatch_no='" . $in['dd'] . "', paid='" . $in['paid'] . "', mode_terms='" . $in['mode_terms'] . "', paid_remark='" . $in['paid_remark'] . "' WHERE inv='" . $inv . "' AND timestamp='" . $ts . "'");

if($query)
    echo '{ "job" : "1" , "notification" : "Successfully edited the Invoice: '.$inv.'"  }';
else
    echo '{ "job" : "0" , "notification" : "Cannot Edit the Invoice !"  }';

?>