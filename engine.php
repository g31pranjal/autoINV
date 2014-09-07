<?php

require 'resource.php';
require_once 'class.organizeMonth.php';
require_once 'class.updateAddressBook.php';

include('./assets/plugins/code128/inventbc.php');
if ((isset($_GET['authentication_key']))) {
    echo ("False Redirection !");
//else {
    $ins = $_GET['authentication_key'];

    $timestamp = time();
    $t_base64 = createBCInstance($timestamp, '117', './assets/plugins/code128/t.png', '1', true);
    $a_base64 = createBCInstance($ins, '38', './assets/plugins/code128/s.png', '2', false);

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'euphonic_invoice';
    $link = mysql_connect($host, $username, $password) or die(mysql_error());
    $db_selected = mysql_select_db($database, $link) or die(mysql_error());
    mysql_query("UPDATE tmp SET timestamp = '" . $timestamp . "' , bc_timestamp = '" . $t_base64 . "' , bc_auth = '" . $a_base64 . "' WHERE authentication_key = '" . $ins . "'");

    $row_s = mysql_query("SELECT * FROM tmp WHERE authentication_key='" . $_GET['authentication_key'] . "'");
    $in = mysql_fetch_array($row_s);


    chdir(establish_directory($in[invdate]));
    
    $lnk = 'http://localhost/euphonic_invoice/development.version/V%205/generateF.php?authentication_key=' . $in[authentication_key];

    if ($in[type] == 'SALE INVOICE')
        $file_ofl = getcwd() . "\\SAL Inv." . $in[inv] . " Dt." . $in[invdate] . " " . $in[party_name] . '.html';
    else if ($in[type] == 'TAX INVOICE')
        $file_ofl = getcwd() . "\\TAX Inv." . $in[inv] . " Dt." . $in[invdate] . " " . $in[party_name] . '.html';
    $f = fopen($file_ofl, 'w') or die("can't open file");
    fwrite($f, file_get_contents($lnk));
    $link = "http://localhost/euphonic_invoice/store/" . substr($file_ofl, 39, 12) . "/" . substr($file_ofl, 52, 8) . "/" . substr($file_ofl, 61);
    $timestamp = time();
    fclose($f);

    mysql_query("INSERT INTO invoice_aggregate 
           (mntID,type,party_name,party_add_1,party_add_2,party_add_3,tin_cst_no,inv,invdate,pon,podate,tib,thr1,thr2,number_cases,carrier,dispatch_no,mode_terms,pd1,qt1,rt1,dr1,be1,av1,pv1,pd2,qt2,rt2,dr2,be2,av2,pv2,pd3,qt3,rt3,dr3,be3,av3,pv3,pd4,qt4,rt4,dr4,be4,av4,pv4,pd5,qt5,rt5,dr5,be5,av5,pv5,cst,trn,gt,tqt,tbe,cstamt,ta,tarnd,rnd,
                    iidate,iit,rgdate,rgt,link_to_offlinecopy,authentication_key,timestamp) VALUES ('$in[mntID]','$in[type]','$in[party_name]','$in[party_add_1]','$in[party_add_2]','$in[party_add_3]','$in[tin_cst_no]','$in[inv]','$in[invdate]','$in[pon]','$in[podate]','$in[tib]','$in[thr1]','$in[thr2]','$in[number_cases]','$in[carrier]','$in[dispatch_no]','$in[mode_terms]','$in[pd1]','$in[qt1]','$in[rt1]','$in[dr1]','$in[be1]','$in[av1]','$in[pv1]','$in[pd2]','$in[qt2]','$in[rt2]','$in[dr2]','$in[be2]','$in[av2]','$in[pv2]','$in[pd3]','$in[qt3]','$in[rt3]','$in[dr3]','$in[be3]','$in[av3]','$in[pv3]','$in[pd4]','$in[qt4]','$in[rt4]','$in[dr4]','$in[be4]','$in[av4]','$in[pv4]','$in[pd5]','$in[qt5]','$in[rt5]','$in[dr5]','$in[be5]','$in[av5]','$in[pv5]','$in[cst]','$in[trn]','$in[gt]','$in[tqt]','$in[tbe]','$in[cstamt]','$in[ta]','$in[tarnd]','$in[rnd]',
                    '$in[iidate]','$in[iit]','$in[rgdate]','$in[rgt]','$link','$in[authentication_key]','$in[timestamp]')");

    if ($in[type] == 'SALE INVOICE')
        mysql_query("INSERT INTO invoice_sal 
           (mntID,type,party_name,party_add_1,party_add_2,party_add_3,tin_cst_no,inv,invdate,pon,podate,tib,thr1,thr2,number_cases,carrier,dispatch_no,mode_terms,pd1,qt1,rt1,dr1,be1,av1,pv1,pd2,qt2,rt2,dr2,be2,av2,pv2,pd3,qt3,rt3,dr3,be3,av3,pv3,pd4,qt4,rt4,dr4,be4,av4,pv4,pd5,qt5,rt5,dr5,be5,av5,pv5,cst,trn,gt,tqt,tbe,cstamt,ta,tarnd,rnd,
                    iidate,iit,rgdate,rgt,link_to_offlinecopy,authentication_key,timestamp) VALUES ('$in[mntID]','$in[type]','$in[party_name]','$in[party_add_1]','$in[party_add_2]','$in[party_add_3]','$in[tin_cst_no]','$in[inv]','$in[invdate]','$in[pon]','$in[podate]','$in[tib]','$in[thr1]','$in[thr2]','$in[number_cases]','$in[carrier]','$in[dispatch_no]','$in[mode_terms]','$in[pd1]','$in[qt1]','$in[rt1]','$in[dr1]','$in[be1]','$in[av1]','$in[pv1]','$in[pd2]','$in[qt2]','$in[rt2]','$in[dr2]','$in[be2]','$in[av2]','$in[pv2]','$in[pd3]','$in[qt3]','$in[rt3]','$in[dr3]','$in[be3]','$in[av3]','$in[pv3]','$in[pd4]','$in[qt4]','$in[rt4]','$in[dr4]','$in[be4]','$in[av4]','$in[pv4]','$in[pd5]','$in[qt5]','$in[rt5]','$in[dr5]','$in[be5]','$in[av5]','$in[pv5]','$in[cst]','$in[trn]','$in[gt]','$in[tqt]','$in[tbe]','$in[cstamt]','$in[ta]','$in[tarnd]','$in[rnd]',
                    '$in[iidate]','$in[iit]','$in[rgdate]','$in[rgt]','$link','$in[authentication_key]','$in[timestamp]')");
    else if ($in[type] == 'TAX INVOICE')
        mysql_query("INSERT INTO invoice_tax
           (mntID,type,party_name,party_add_1,party_add_2,party_add_3,tin_cst_no,inv,invdate,pon,podate,tib,thr1,thr2,number_cases,carrier,dispatch_no,mode_terms,pd1,qt1,rt1,dr1,be1,av1,pv1,pd2,qt2,rt2,dr2,be2,av2,pv2,pd3,qt3,rt3,dr3,be3,av3,pv3,pd4,qt4,rt4,dr4,be4,av4,pv4,pd5,qt5,rt5,dr5,be5,av5,pv5,vat,sat,trn,gt,tqt,tbe,vatamt,satamt,ta,tarnd,rnd,
                    iidate,iit,rgdate,rgt,link_to_offlinecopy,authentication_key,timestamp) VALUES ('$in[mntID]','$in[type]','$in[party_name]','$in[party_add_1]','$in[party_add_2]','$in[party_add_3]','$in[tin_cst_no]','$in[inv]','$in[invdate]','$in[pon]','$in[podate]','$in[tib]','$in[thr1]','$in[thr2]','$in[number_cases]','$in[carrier]','$in[dispatch_no]','$in[mode_terms]','$in[pd1]','$in[qt1]','$in[rt1]','$in[dr1]','$in[be1]','$in[av1]','$in[pv1]','$in[pd2]','$in[qt2]','$in[rt2]','$in[dr2]','$in[be2]','$in[av2]','$in[pv2]','$in[pd3]','$in[qt3]','$in[rt3]','$in[dr3]','$in[be3]','$in[av3]','$in[pv3]','$in[pd4]','$in[qt4]','$in[rt4]','$in[dr4]','$in[be4]','$in[av4]','$in[pv4]','$in[pd5]','$in[qt5]','$in[rt5]','$in[dr5]','$in[be5]','$in[av5]','$in[pv5]','$in[vat]','$in[sat]','$in[trn]','$in[gt]','$in[tqt]','$in[tbe]','$in[vatamt]','$in[satamt]','$in[ta]','$in[tarnd]','$in[rnd]',
                    '$in[iidate]','$in[iit]','$in[rgdate]','$in[rgt]','$link','$in[authentication_key]','$in[timestamp]')");

    $org = new organizeMonth();
    $org->p_month();
    
    $inst = new updateAddressBook();
    $inst->insertIntoAddressBook();
    
    echo ($in[bc_timestamp]);
}
?>

