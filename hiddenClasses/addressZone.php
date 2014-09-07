<?php insertIntoAddressBook(); ?>

<?php

function insertIntoAddressBook() {
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'euphonic_invoice';
    $link = mysql_connect($host, $username, $password) or die(mysql_error());
    $db_selected = mysql_select_db($database, $link) or die(mysql_error());

    $query1 = mysql_query("SELECT * FROM `adb_primary` ORDER BY `custID` ASC");
    while ($row1 = mysql_fetch_array($query1)) {
        $flag = 0;
        $name = $row1[name];
        $query2 = mysql_query("SELECT * FROM `address_book` ORDER BY `name` ASC");
        while ($row2 = mysql_fetch_array($query2)) {
            $comp = $row2[name];
            if(strcasecmp($comp, $name) == 0) {
                $flag = 1;
                $id = $row1[custID];
                mysql_query("INSERT INTO `euphonic_invoice`.`adb_secondary` (`custID`, `name`, `type`, `pon`, `pod`, `thr1`, `thr2`, `carrier`, `mtop`, `vat`, `sat`, `cst`, `trns`) VALUES ('$id', '$name', '$row2[type]', '$row2[pon]', '$row2[pod]', '$row2[thr1]', '$row2[thr2]', '$row2[carrier]', '$row2[mtop]', '$row2[vat]', '$row2[sat]', '$row2[cst]', '$row2[trns]');");
            } 
        }
    }
}
?>
