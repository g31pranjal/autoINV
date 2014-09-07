<?php

// 01.Used for converting price value to its word equivalent | INIZIO.php
function wrd($num) {
    $k = (int) strrpos($num, ".");
    $paisa = substr($num, $k + 1, 2);
    $rupee = substr($num, 0, $k);

    $tens = array("", "", " Twenty", " Thirty", " Forty", " Fifty", " Sixty", " Seventy", " Eighty", " Ninety");
    $twnt = array("", " One", " Two", " Three", " Four", " Five", " Six", " Seven", " Eight", " Nine", " Ten", " Eleven", " Twelve", " Thirteen", " Fourteen", " Fifteen", " Sixteen", " Seventeen", " Eighteen", " Nineteen");
    $unit = array(" Crore", " Lakh", " Thousand", " Hundred", "");
    $factors = array(10000000, 100000, 1000, 100, 1);

    $rupeewords = "";
    $temp1;
    $temp2;
    for ($i = 0; $i < count($unit); $i++) {
        $temp1 = (int) (($rupee / $factors[$i]) / 10);
        $temp2 = (int) (($rupee / $factors[$i]) % 10);
        if ($temp1 == 1) {
            $temp2 += 10;
        }
        if ($temp1 == 0 && $temp2 == 0) {
            continue;
        } else {
            $rupeewords = $rupeewords . ($tens[$temp1] . $twnt[$temp2] . $unit[$i]);
        }
        $rupee %= $factors[$i];
    }
    $rupeewords = trim($rupeewords);
    if ($rupeewords != null) {
        $rupeewords = $rupeewords . " Rupees";
    }
    $paisawords = "";
    $temp1 = (int) (($paisa) / 10);
    $temp2 = (int) (($paisa) % 10);
    if ($temp1 == 1) {
        $temp2 += 10;
    }
    if ($temp1 == 0 && $temp2 == 0) {
        $paisawords = " Zero Paisa";
    } else {
        $paisawords = ($tens[$temp1] . $twnt[$temp2] . " Paisa");
    }
    $paisawords = trim($paisawords);

    return((trim(($rupeewords . " " . $paisawords))) . " Only");
}

// 02.html-script for top Heading on pages | INDEX.php INIZIO.php
function print_top($stp) {
    echo(
    '<div id="header">
            <div class="navigation_container">
                <a id="bt_sch" class="bt"href="http://localhost/euphonic_invoice/version.history/">HISTORY</a>
                <a id="bt_tab" class="bt"href="./sqlbuddy" target="tab">dBASE</a>
                <a id="bt_sch" class="bt"href="./pad_editor.php">EDITOR</a>
                <a id="bt_abt" class="bt"href="./invform.php">INVOICE</a>
            </div>
            <a href="./" style="text-decoration:none;"><div class="heading">auto<span class="heading_later"><span style="font-size: 35px;">|</span>INV</span></div></a>
        </div>'
    );
    if ($stp >= 1 && $stp <= 5) {
        echo('
        <div id="topheader2" class="topheader2">
            <table class="submenu">
                <tr>
                    <td class="start" ><a style="color:white;text-decoration: none;"href="./index.php">invoiceCenter</a></td>
                    ');
        if ($stp == 1)
            echo('<td style="background:#00aff2" class="s1 opt"><a style="color:white;text-decoration: none;"href="./index.php">createInvoice</a></td>
                ');
        else
            echo('<td class="s1 opt"><a style="color:white;text-decoration: none;"href="./index.php">createInvoice</td>');
        if ($stp == 5)
            echo('<td style="background:#e0121d" class="s2 opt"><a style="color:white;text-decoration: none;"href="./adr_book.php">addressBook</a></td>');
        else
            echo('<td class="s2 opt"><a style="color:white;text-decoration: none;"href="./adr_book.php">addressBook</a></td>');
        if ($stp == 2)
            echo('<td style="background:#84c707" class="s3 opt"><a style="color:white;text-decoration: none;"href="./archive.php">archive</a></td>');
        else
            echo('<td class="s3 opt"><a style="color:white;text-decoration: none;"href="./archive.php">archive</a></td>');
        if ($stp == 3)
            echo('<td style="background:#F6B402" class="s4 opt"><a style="color:white;text-decoration: none;"href="./statsCenter.php">statsCenter</a></td>');
        else
            echo('<td class="s4 opt"><a style="color:white;text-decoration: none;"href="./statsCenter.php">statsCenter</a></td>');
        if ($stp == 4)
            echo('<td style="background:#92069d" class="s5 opt"><a style="color:white;text-decoration: none;"href="./queryCenter.php">queryCenter</a></td>');
        else
            echo('<td class="s5 opt"><a style="color:white;text-decoration: none;" href="./queryCenter.php">queryCenter</a></td>');

        echo ('</tr></table></div>');
    }
    if ($stp >= 6 && $stp <= 7) {
        echo('
    <div id="topheader2">
            <table class="submenu">
                <tr>
                    <td class="start" ><a style="color:white;text-decoration: none;"href="./index.php">letterCenter</a></td>
                    ');
        if ($stp == 6)
            echo('<td style="background:#01B0EC" class="s1 opt"><a style="color:white;text-decoration: none;"href="./index.php">letterEditor</a></td>');
        else
            echo('<td class="s1 opt"><a style="color:white;text-decoration: none;"href="./index.php">createInvoice</a></td>');
        if ($stp == 7)
            echo('<td style="background:#d54421" class="s2 opt"><a style="color:white;text-decoration: none;"href="./delInv.php">archive</a></td>');
        else
            echo('<td class="s2 opt"><a style="color:white;text-decoration: none;"href="./delInv.php">archive</a></td>');

        echo ('
            <td class="s3 opt"></td>
            <td class="s4 opt"></td>
            <td class="s5 opt"></td></tr></table></div>');
    }
}

// 03.Used to return formatted date based on data entered by user | INIZIO.php
function date_construct($day, $mnt, $yr) {
    if (strlen($day) == 1)
        $day = ('0' . $day);
    if (strlen($mnt) == 1)
        $mnt = ('0' . $mnt);
    if (strlen($yr) == 2)
        $yr = ('20' . $yr);

    if ($mnt == '01')
        $mnt = 'Jan'; else if ($mnt == '02')
        $mnt = 'Feb'; else if ($mnt == '03')
        $mnt = 'Mar'; else if ($mnt == '04')
        $mnt = 'Apr'; else if ($mnt == '05')
        $mnt = 'May'; else if ($mnt == '06')
        $mnt = 'Jun'; else if ($mnt == '07')
        $mnt = 'Jul'; else if ($mnt == '08')
        $mnt = 'Aug'; else if ($mnt == '09')
        $mnt = 'Sep'; else if ($mnt == '10')
        $mnt = 'Oct'; else if ($mnt == '11')
        $mnt = 'Nov'; else if ($mnt == '12')
        $mnt = 'Dec';

    if ($day != null)
        return ($day . '-' . $mnt . '-' . $yr);
    else
        return null;
}

// 04.Used to round-off the monetory values and format them | INIZIO.php
function round_number_format($value) {
    return number_format(round($value, 2), 2, '.', '');
}

// 05.Used to format the current time | INDEX.php
function current_time_formatted($time) {
    $today = getdate();
    if ($today[hours] < 10)
        $Tformat = '0' . $today[hours];
    else
        $Tformat = $today[hours];
    if ($today[minutes] < 10)
        $Tformat = $Tformat . ':0' . $today[minutes];
    else
        $Tformat = $Tformat . ':' . $today[minutes];
    return $Tformat;
}

// 06.Used to format the current date | INDEX.php
function current_date_formatted($elm) {
    $today = getdate();
    return ($today[$elm]);
}

// 07.Used to indicate the configuration of feild | INDEX.php
function tagging($_1, $_2, $_3) {
    $frame0 = '<img ';
    $style = 'style="margin:0px 3px 0px 0px;height:20px;';
    $frame[0] = '<img style="margin:0px 3px 0px 0px;height:20px;"src="./rel_files/';
    $frame[1] = '.png">';

    $imp = '<img style="margin:0px 3px 0px 0px;height:20px;" src="./assets/img/imp.png" />';
    $inf = '<img style="margin:0px 3px 0px 0px;height:20px;" src="./assets/img/inf.png" />';
    $mid = '<img style="margin:0px 3px 0px 0px;height:20px;" src="./assets/img/mid.png" />';
    $sec = '<img style="margin:0px 3px 0px 0px;height:20px;" src="./assets/img/sec.png" />';
    $xmp = '<img style="margin:0px 3px 0px 0px;height:20px;" src="./assets/img/xmp.png" />';


    echo '<br>';
    if ($_1)
        echo($imp);
    if ($_2)
        echo($inf);
    if ($_3 == '1')
        echo($sec);
    else if ($_3 == '2')
        echo($xmp);
    else if ($_3 == '3')
        echo($mid);
}

// 08.Return the last activity on the Database | INDEX.php
function activity_monitr() {
    $a = connectTo();
    $s = mysql_fetch_array($a['sl']);
    $t = mysql_fetch_array($a['tl']);
    $ret['0'] = ($s['timestamp'] >= $t['timestamp']) ? $s['timestamp'] : $t['timestamp'];
    $ret['0'] = date("d F Y", $ret['0']) . " @ " . date("h:i:s A", $ret['0']);
    $ret['1'] = $s['inv'];
    $ret['2'] = $t['inv'];
    return $ret;
}


// 09.Return UNIX timeStamp in terms of the time lapsed since the Stamp | ARCHIVE.php
function time_ago($timestamp, $recursive = 0) {
    $current_time = time();
    $difference = $current_time - $timestamp;
    $periods = array("second", "min", "hour", "day", "week", "month", "year", "decade");
    $lengths = array(1, 60, 3600, 86400, 604800, 2630880, 31570560, 315705600);
    for ($val = sizeof($lengths) - 1; ($val >= 0) && (($number = $difference / $lengths[$val]) <= 1); $val--)
        ;
    if ($val < 0)
        $val = 0;
    $new_time = $current_time - ($difference % $lengths[$val]);
    $number = floor($number);
    if ($number != 1)
        $periods[$val] .= "s";
    $text = sprintf("%d %s ", $number, $periods[$val]);
    if (($recursive == 1) && ($val >= 1) && (($current_time - $new_time) > 0))
        $text .= time_ago($new_time);
    return $text;
}




// 12.To create new directory as per the requirement of Storing Invoices | GENERATE.php
function establish_directory($invdate) {
    //echo ("Inv date : " . $invdate);
    if (substr($invdate, strlen($invdate) - 8, 3) == "Jan" || substr($invdate, strlen($invdate) - 8, 3) == "Feb" || substr($invdate, strlen($invdate) - 8, 3) == "Mar")
        $tree_1 = "FY " . ( substr($invdate, 7, 4) - 1) . "-" . (substr($invdate, 7, 4));
    else
        $tree_1 = "FY " . ( substr($invdate, 7, 4)) . "-" . (substr($invdate, 7, 4) + 1);
    $root_construct = "C:/xampp/htdocs/euphonic_invoice/store\\" . $tree_1;
    if (!is_dir($root_construct))
        mkdir($root_construct);

    $tree_2 = substr($invdate, 3, 3) . " " . substr($invdate, 7, 4);
    $root_construct = $root_construct . "\\" . $tree_2;
    if (!is_dir($root_construct))
        mkdir($root_construct);
    //echo $root_construct;
    return $root_construct;
}


//14. To return the array with the ref name of arrays containing the table of sales and tax invoice as well as the last entry in both the categories 

function connectTo() {
    $con = mysql_connect("localhost", "pranjal_gupta", "rocksoul");
    if (!$con)
        die('Could not connect: ' . mysql_error());
    else {
        mysql_select_db("euphonic_invoice", $con);
        $r['sa'] = mysql_query("SELECT * FROM invoice_sal ORDER BY sn DESC");
        $r['sl'] = mysql_query("SELECT * FROM invoice_sal ORDER BY sn DESC  LIMIT 1");
        $r['ta'] = mysql_query("SELECT * FROM invoice_tax ORDER BY sn DESC");
        $r['tl'] = mysql_query("SELECT * FROM invoice_tax ORDER BY sn DESC LIMIT 1");

        return $r;
    }
}

function printq() {
    echo ('<img class="q" src="./assets/img/q_mark.png" />');
}

function mntID($invdate) {
    switch (substr($invdate, 3, 3)) {
        case 'Apr':$mnt = '04';
            break;
        case 'May':$mnt = '05';
            break;
        case 'Jun':$mnt = '06';
            break;
        case 'Jul':$mnt = '07';
            break;
        case 'Aug':$mnt = '08';
            break;
        case 'Sep':$mnt = '09';
            break;
        case 'Oct':$mnt = '10';
            break;
        case 'Nov':$mnt = '11';
            break;
        case 'Dec':$mnt = '12';
            break;
        case 'Jan':$mnt = '01';
            break;
        case 'Feb':$mnt = '02';
            break;
        case 'Mar':$mnt = '03';
            break;
    }
    $mnt = substr($invdate, 9, 2) . $mnt;
    return $mnt;
}

   

?>