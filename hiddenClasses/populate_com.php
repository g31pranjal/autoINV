<?php 

fillAGG_fromCOM();
//fillCOM_fromSAL();
//fillCOM_fromTAX();

?>

<?php

function fillAGG_fromCOM() {
    echo('b');
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'euphonic_invoice';
    $link = mysql_connect($host, $username, $password) or die(mysql_error());
    $db_selected = mysql_select_db($database, $link) or die(mysql_error());

    $row_s = mysql_query("SELECT * FROM com ORDER BY timestamp ASC");
    while ($result_s = mysql_fetch_array($row_s)) {
        mysql_query("INSERT INTO invoice_aggregate
           (mntID,type,party_name,party_add_1,party_add_2,party_add_3,tin_cst_no,inv,invdate,pon,podate,tib,thr1,thr2,number_cases,carrier,dispatch_no,mode_terms,pd1,qt1,rt1,dr1,be1,av1,pv1,pd2,qt2,rt2,dr2,be2,av2,pv2,pd3,qt3,rt3,dr3,be3,av3,pv3,pd4,qt4,rt4,dr4,be4,av4,pv4,pd5,qt5,rt5,dr5,be5,av5,pv5,cst,vat,sat,trn,gt,tqt,tbe,cstamt,vatamt,satamt,ta,tarnd,rnd,
                    iidate,iit,rgdate,rgt,link_to_offlinecopy,authentication_key,timestamp) VALUES ('$result_s[mntID]','$result_s[type]','$result_s[party_name]','$result_s[party_add_1]','$result_s[party_add_2]','$result_s[party_add_3]','$result_s[tin_cst_no]','$result_s[inv]','$result_s[invdate]','$result_s[pon]','$result_s[podate]','$result_s[tib]','$result_s[thr1]','$result_s[thr2]','$result_s[number_cases]','$result_s[carrier]','$result_s[dispatch_no]','$result_s[mode_terms]','$result_s[pd1]','$result_s[qt1]','$result_s[rt1]','$result_s[dr1]','$result_s[be1]','$result_s[av1]','$result_s[pv1]','$result_s[pd2]','$result_s[qt2]','$result_s[rt2]','$result_s[dr2]','$result_s[be2]','$result_s[av2]','$result_s[pv2]','$result_s[pd3]','$result_s[qt3]','$result_s[rt3]','$result_s[dr3]','$result_s[be3]','$result_s[av3]','$result_s[pv3]','$result_s[pd4]','$result_s[qt4]','$result_s[rt4]','$result_s[dr4]','$result_s[be4]','$result_s[av4]','$result_s[pv4]','$result_s[pd5]','$result_s[qt5]','$result_s[rt5]','$result_s[dr5]','$result_s[be5]','$result_s[av5]','$result_s[pv5]','$result_s[cst]','$result_s[vat]','$result_s[sat]','$result_s[trn]','$result_s[gt]','$result_s[tqt]','$result_s[tbe]','$result_s[cstamt]','$result_s[vatamt]','$result_s[satamt]','$result_s[ta]','$result_s[tarnd]','$result_s[rnd]',
                    '$result_s[iidate]','$result_s[iit]','$result_s[rgdate]','$result_s[rgt]','$result_s[link_to_offlinecopy]','$result_s[authentication_key]','$result_s[timestamp]')");
    }
}

function fillCOM_fromSAL() {
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'euphonic_invoice';
    $link = mysql_connect($host, $username, $password) or die(mysql_error());
    $db_selected = mysql_select_db($database, $link) or die(mysql_error());

    $row_s = mysql_query("SELECT * FROM invoice_sal ORDER BY timestamp ASC");
    while ($result_s = mysql_fetch_array($row_s)) {
        mysql_query("INSERT INTO com
           (mntID,type,party_name,party_add_1,party_add_2,party_add_3,tin_cst_no,inv,invdate,pon,podate,tib,thr1,thr2,number_cases,carrier,dispatch_no,mode_terms,pd1,qt1,rt1,dr1,be1,av1,pv1,pd2,qt2,rt2,dr2,be2,av2,pv2,pd3,qt3,rt3,dr3,be3,av3,pv3,pd4,qt4,rt4,dr4,be4,av4,pv4,pd5,qt5,rt5,dr5,be5,av5,pv5,cst,vat,sat,trn,gt,tqt,tbe,cstamt,vatamt,satamt,ta,tarnd,rnd,iidate,iit,rgdate,rgt,link_to_offlinecopy,authentication_key,timestamp) VALUES 
           ('$result_s[mntID]','$result_s[type]','$result_s[party_name]','$result_s[party_add_1]','$result_s[party_add_2]','$result_s[party_add_3]','$result_s[tin_cst_no]','$result_s[inv]','$result_s[invdate]','$result_s[pon]','$result_s[podate]','$result_s[tib]','$result_s[thr1]','$result_s[thr2]','$result_s[number_cases]','$result_s[carrier]','$result_s[dispatch_no]','$result_s[mode_terms]','$result_s[pd1]','$result_s[qt1]','$result_s[rt1]','$result_s[dr1]','$result_s[be1]','$result_s[av1]','$result_s[pv1]','$result_s[pd2]','$result_s[qt2]','$result_s[rt2]','$result_s[dr2]','$result_s[be2]','$result_s[av2]','$result_s[pv2]','$result_s[pd3]','$result_s[qt3]','$result_s[rt3]','$result_s[dr3]','$result_s[be3]','$result_s[av3]','$result_s[pv3]','$result_s[pd4]','$result_s[qt4]','$result_s[rt4]','$result_s[dr4]','$result_s[be4]','$result_s[av4]','$result_s[pv4]','$result_s[pd5]','$result_s[qt5]','$result_s[rt5]','$result_s[dr5]','$result_s[be5]','$result_s[av5]','$result_s[pv5]','$result_s[cst]','','','$result_s[trn]','$result_s[gt]','$result_s[tqt]','$result_s[tbe]','$result_s[cstamt]','','','$result_s[ta]','$result_s[tarnd]','$result_s[rnd]','$result_s[iidate]','$result_s[iit]','$result_s[rgdate]','$result_s[rgt]','$result_s[link_to_offlinecopy]','$result_s[authentication_key]','$result_s[timestamp]')");
    }
}

function fillCOM_fromTAX() {
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'euphonic_invoice';
    $link = mysql_connect($host, $username, $password) or die(mysql_error());
    $db_selected = mysql_select_db($database, $link) or die(mysql_error());

    $row_s = mysql_query("SELECT * FROM invoice_tax ORDER BY timestamp ASC");
    while ($result_s = mysql_fetch_array($row_s)) {
        mysql_query("INSERT INTO com
           (mntID,type,party_name,party_add_1,party_add_2,party_add_3,tin_cst_no,inv,invdate,pon,podate,tib,thr1,thr2,number_cases,carrier,dispatch_no,mode_terms,pd1,qt1,rt1,dr1,be1,av1,pv1,pd2,qt2,rt2,dr2,be2,av2,pv2,pd3,qt3,rt3,dr3,be3,av3,pv3,pd4,qt4,rt4,dr4,be4,av4,pv4,pd5,qt5,rt5,dr5,be5,av5,pv5,cst,vat,sat,trn,gt,tqt,tbe,cstamt,vatamt,satamt,ta,tarnd,rnd,iidate,iit,rgdate,rgt,link_to_offlinecopy,authentication_key,timestamp) VALUES 
           ('$result_s[mntID]','$result_s[type]','$result_s[party_name]','$result_s[party_add_1]','$result_s[party_add_2]','$result_s[party_add_3]','$result_s[tin_cst_no]','$result_s[inv]','$result_s[invdate]','$result_s[pon]','$result_s[podate]','$result_s[tib]','$result_s[thr1]','$result_s[thr2]','$result_s[number_cases]','$result_s[carrier]','$result_s[dispatch_no]','$result_s[mode_terms]','$result_s[pd1]','$result_s[qt1]','$result_s[rt1]','$result_s[dr1]','$result_s[be1]','$result_s[av1]','$result_s[pv1]','$result_s[pd2]','$result_s[qt2]','$result_s[rt2]','$result_s[dr2]','$result_s[be2]','$result_s[av2]','$result_s[pv2]','$result_s[pd3]','$result_s[qt3]','$result_s[rt3]','$result_s[dr3]','$result_s[be3]','$result_s[av3]','$result_s[pv3]','$result_s[pd4]','$result_s[qt4]','$result_s[rt4]','$result_s[dr4]','$result_s[be4]','$result_s[av4]','$result_s[pv4]','$result_s[pd5]','$result_s[qt5]','$result_s[rt5]','$result_s[dr5]','$result_s[be5]','$result_s[av5]','$result_s[pv5]','','$result_s[vat]','$result_s[sat]','$result_s[trn]','$result_s[gt]','$result_s[tqt]','$result_s[tbe]','','$result_s[vatamt]','$result_s[satamt]','$result_s[ta]','$result_s[tarnd]','$result_s[rnd]','$result_s[iidate]','$result_s[iit]','$result_s[rgdate]','$result_s[rgt]','$result_s[link_to_offlinecopy]','$result_s[authentication_key]','$result_s[timestamp]')");
    }
}


?>
