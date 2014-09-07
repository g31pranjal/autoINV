<?php

if (isset($_GET['token']) == 'redirected') {
    $inst = new updateAddressBook();
    $inst->insertIntoAddressBook();
    echo('<META HTTP-EQUIV="Refresh" Content="0; URL=adr_book.php">');
}

class updateAddressBook {

    function insertIntoAddressBook() {
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'euphonic_invoice';
        $link = mysql_connect($host, $username, $password) or die(mysql_error());
        $db_selected = mysql_select_db($database, $link) or die(mysql_error());

        $query = "truncate table product_variant";
        if (mysql_query($query))
            ;

        $row_s = mysql_query("SELECT * FROM invoice_aggregate ORDER BY party_name ASC");
        while ($result_s = mysql_fetch_array($row_s)) {
            if (strcasecmp($dif, $result_s[party_name]) == 0) {
                $hits += 1;
                mysql_query("UPDATE address_book SET hits='$hits', pon='$result_s[pon]', pod='$result_s[podate]' WHERE name='$result_s[party_name]'");
                continue;
            } else {
                $dif = $result_s[party_name];
                //echo( $hits . $result_s[party_name] . '</br>');
                //$total = $total + $hits;
                $hits = 1;
                mysql_query("INSERT INTO address_book
           (name,adline1,adline2,adline3,tin,type,pon,pod,thr1,thr2,carrier,vat,sat,cst,trns,mtop,hits) VALUES ('$result_s[party_name]','$result_s[party_add_1]','$result_s[party_add_2]','$result_s[party_add_3]','$result_s[tin_cst_no]','$result_s[type]','$result_s[pon]','$result_s[podate]','$result_s[thr1]','$result_s[thr2]','$result_s[carrier]','$result_s[vat]','$result_s[sat]','$result_s[cst]','$result_s[trn]','$result_s[mode_terms]',1)");
            }
        }
    }
}

?>