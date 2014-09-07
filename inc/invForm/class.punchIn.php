<?php

require '../connect.php';
require '../resource.php';

mysql_query("TRUNCATE TABLE tmp");

$in = $_POST;
/* 01 */ $type = $in["type"];
/* 02 */ $pn = $in['pn'];
/* 03 */ $pa1 = $in['pa1'];
/* 04 */ $pa2 = $in['pa2'];
/* 05 */ $pa3 = $in['pa3'];
/* 06 */ $pa4 = $in['pa4'];
/* 07 */ $inv = $in['inv'];
/* 08 */ $invdday = $in['invdday'];
/* 09 */ $invdmnt = $in['invdmnt'];
/* 10 */ $invdyr = $in['invdyr'];
/* 11 */ $pon = $in['pon'];
/* 12 */ $podday = $in['podday'];
/* 13 */ $podmnt = $in['podmnt'];
/* 14 */ $podyr = $in['podyr'];
/* 15 */ $tib = $in['tib'];
/* 22 */ $thr1 = $in['thr1'];
/* 23 */ $thr2 = $in['thr2'];
/* 24 */ $noc = $in['noc'];
/* 25 */ $car = $in['car'];
/* 26 */ $dd = $in['dd'];
/* 27 */ $mtp = $in['mtp'];
/* 28 */ $pd1 = $in['pd1'];
/* 29 */ $qt1 = $in['qt1'];
/* 30 */ $rt1 = $in['rt1'];
/* 31 */ $dr1 = $in['dr1'];
/* 32 */ $pd2 = $in['pd2'];
/* 33 */ $qt2 = $in['qt2'];
/* 34 */ $rt2 = $in['rt2'];
/* 35 */ $dr2 = $in['dr2'];
/* 36 */ $pd3 = $in['pd3'];
/* 37 */ $qt3 = $in['qt3'];
/* 38 */ $rt3 = $in['rt3'];
/* 39 */ $dr3 = $in['dr3'];
/* 40 */ $pd4 = $in['pd4'];
/* 41 */ $qt4 = $in['qt4'];
/* 42 */ $rt4 = $in['rt4'];
/* 43 */ $dr4 = $in['dr4'];
/* 44 */ $pd5 = $in['pd5'];
/* 45 */ $qt5 = $in['qt5'];
/* 46 */ $rt5 = $in['rt5'];
/* 47 */ $dr5 = $in['dr5'];
/* 48 */ $cst = $in['cst'];
/* 49 */ $vat = $in['vat'];
/* 50 */ $sat = $in['sat'];
/* 51 */ $trn = $in['trn'];
/* 52 */ $iidday = $in['iidday'];
/* 53 */ $iidmnt = $in['iidmnt'];
/* 54 */ $iidyr = $in['iidyr'];
/* 55 */ $iit = $in['iit'];
/* 56 */ $rgdday = $in['rgdday'];
/* 57 */ $rgdmnt = $in['rgdmnt'];
/* 58 */ $rgdyr = $in['rgdyr'];
/* 59 */ $rgt = $in['rgt'];

if ($invdday != null && $invdmnt != null && $invdyr != null)
    $invdate = date_construct($invdday, $invdmnt, $invdyr);
$podate = date_construct($podday, $podmnt, $podyr);
$ntfdate = date_construct($ntfdday, $ntfdmnt, $ntfdyr);
$iidate = date_construct($iidday, $iidmnt, $iidyr);
$rgdate = date_construct($rgdday, $rgdmnt, $rgdyr);

if ($type == 'si')
    $type = "SALE INVOICE";
else if ($type == 'ti')
    $type = "TAX INVOICE";

for ($i = 1; $i <= 5; $i++)
    if (${'pd' . $i} != null) {
        ${'rt' . $i} = round_number_format(${'rt' . $i});
        if (${'dr' . $i} == null)
            ${'dr' . $i} = 0;
        ${'dr' . $i} = round_number_format(${'dr' . $i});
        ${'av' . $i} = round_number_format(${'rt' . $i} * ${'qt' . $i});
        ${'be' . $i} = round_number_format(${'av' . $i} * ${'dr' . $i} / 100);
        ${'pv' . $i} = round_number_format(${'av' . $i} + ${'be' . $i});
    }
$gt = round_number_format($pv1 + $pv2 + $pv3 + $pv4 + $pv5);
$tqt = $qt1 + $qt2 + $qt3 + $qt4 + $qt5;
$tbe = round_number_format($be1 + $be2 + $be3 + $be4 + $be5);

$cst = round_number_format($cst);
$cstamt = round_number_format($gt * $cst / 100);

$vat = round_number_format($vat);
$vatamt = round_number_format($gt * $vat / 100);

$sat = round_number_format($sat);
$satamt = round_number_format($gt * $sat / 100);

if ($trn == null)
    $trn = 0.0;$trn = round_number_format($trn);

$ta = round_number_format($gt + $vatamt + $cstamt + $satamt + $trn);
$tarnd = round_number_format(round($ta));

if ($tarnd >= $ta)
    $rnd = '(+)' . round_number_format($tarnd - $ta);
else if ($tarnd < $ta)
    $rnd = '(-)' . round_number_format($ta - $tarnd);


$inw = wrd($tarnd);
$tbw = wrd($tbe);

$key = '';
$chrs1 = range(0, 9);
$chrs2 = range('a', 'z');

for ($i = 0; $i < 1; $i++)
    $key .= $chrs1[array_rand($chrs1)];
for ($i = 0; $i < 4; $i++)
    $key .= $chrs2[array_rand($chrs2)];
for ($i = 0; $i < 3; $i++)
    $key .= $chrs1[array_rand($chrs1)];

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'euphonic_invoice';
$link = mysql_connect($host, $username, $password) or die(mysql_error());
$db_selected = mysql_select_db($database, $link) or die(mysql_error());
$mntID = mntID($invdate);
$query = mysql_query("INSERT INTO tmp 
           (mntID,type,party_name,party_add_1,party_add_2,party_add_3,tin_cst_no,inv,invdate,pon,podate,tib,thr1,thr2,number_cases,carrier,dispatch_no,mode_terms,pd1,qt1,rt1,dr1,be1,av1,pv1,pd2,qt2,rt2,dr2,be2,av2,pv2,pd3,qt3,rt3,dr3,be3,av3,pv3,pd4,qt4,rt4,dr4,be4,av4,pv4,pd5,qt5,rt5,dr5,be5,av5,pv5,cst,vat,sat,trn,gt,tqt,tbe,cstamt,vatamt,satamt,ta,tarnd,rnd,inw,tbw,
                    iidate,iit,rgdate,rgt,authentication_key) VALUES ('$mntID','$type','$pn','$pa1','$pa2','$pa3','$pa4','$inv','$invdate','$pon','$podate','$tib','$thr1','$thr2','$noc','$car','$dd','$mtp','$pd1','$qt1','$rt1','$dr1','$be1','$av1','$pv1','$pd2','$qt2','$rt2','$dr2','$be2','$av2','$pv2','$pd3','$qt3','$rt3','$dr3','$be3','$av3','$pv3','$pd4','$qt4','$rt4',
           '$dr4','$be4','$av4','$pv4','$pd5','$qt5','$rt5','$dr5','$be5','$av5','$pv5','$cst','$vat','$sat','$trn','$gt','$tqt','$tbe','$cstamt','$vatamt','$satamt','$ta','$tarnd','$rnd','$inw','$tbw','$iidate','$iit','$rgdate','$rgt','$key')");

if($query)
    echo '{ "job" : "1" , "auth" : "'.$key.'"}';
else
    echo '{ "job" : "0" }';

?>