<?php
error_reporting(0);

function printRuppee() {
 echo ('<img style="height:20px;margin-bottom: -3px;margin-right: 5px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACIAAAArCAYAAAAdSFoKAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAAADqYAAAXb5JfxUYAAAAJcEhZcwAACxIAAAsSAdLdfvwAAAIvSURBVFhHxZg/KEdRFMdfMkgySJJkMEoGGSSDJMlsMEkGySBJJoMkGSQZJEm/JJMMvyQZZJJkMEpGSQaDDJLi+8179Tz33Pf//E59e79+791zPu/ee8557znOr41D38qacGP/OZQChDH/WRv+WYBW3CN/z0PL0AF0H3G27nDdKDQDLfl80Z8nLwZjJrJWjNqAPkKgRhJ5TzCoCmPOQmCmEvhNPOTUAvOOc42JPcccWI/rXy0w3F9qxiWQ0p4bPLZ1YsQOtO8e+dumXZxfhY4sIJ84twdtBnwxC7egDhMli4t2QTPWkVKAGCtr3KXhsnF6uUS2usI0Xw8sjbf8jJmZVcPTm2VZezKLFOKoP2SzNmiBMCukTV7UgmD62TKNs5W7lSPCtQWEmzl3Y9O7tEBc5U6AAGzxtv7Csl6bFoQO2DEroQqoDmKuMzhrxkvInjh3x6XlcFrgwStOvGv2iihln2PmUkcPOKDDKMF5DUH5xFaTNYTnryDAfOH/R4ibcRpiVc3VyuD9RoDpzTWywbl/v/iXik/pTF9VGxZm5USVwg22JsAslgKG9cGUSYPaME0IaCpmrDXN2jDSc4dKXwneLN+FTUvEp3R1OxZgxrRJWE0fDDCsuu3aMF3CrLDYsXOr2qQAc6hK4QYrCDCz2jB8br0VYPq0YaTm+AwQtXca76al5sjWoG78RGEqdvxwp25ScxzSJuGeeBJmZkAbphsB+RWJqc23vW3oAuJ3V6v9ANMTr91ePdwZAAAAAElFTkSuQmCC" />');
}

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'euphonic_invoice';
$link = mysql_connect($host, $username, $password) or die(mysql_error());
$db_selected = mysql_select_db($database, $link) or die(mysql_error());

$row_s = mysql_query("SELECT * FROM tmp WHERE authentication_key='" . $_GET['authentication_key'] . "'");
$in = mysql_fetch_array($row_s);
?>

<html>
 <head>
 <title><?php echo('Invoice No. ' . $in[inv] . ' - ' . $_GET['print']) ?></title>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <style>
 body {width: 800px;height: 1050px;border: 0px solid #eee;font-family: sans-serif;}
 .header {margin:2px 0px;width:100%;margin-bottom: 10px;height:20px;border-bottom:1px solid black;float: left;}
 .invoiceType {float:left;text-transform: uppercase;font-size: 18px;font-weight: bold;}
 .invoiceCopy { float:right;font-style: italic;font-size: 14px;}
 .titleBox {margin: 2px 0px;width:59%;height:110px; ;float: left;}
 .title {font-weight: bolder;font-size: 34px;font-family:calibri;}
 .subtitle {font-size: 15px;}
 .email {font-style: italic;font-family:serif;}
 .preAuthentication {margin:2px 0px;text-align: center;width:39%;height:110px;float: right;}
 .preAuthentication_wrapper {border: 1px solid black;width:90%;float: right;margin: 10px 0px;text-align: center;font-size: 13px;}
 .customerDetail {margin:2px 0px;width:50%;height: 102px;font-size: 14px;border: 1px solid black;float: left;}
 .customerDetail_wrapper {margin:2px 0px 0px 3px;height: 100%;font-size: 13px;}
 .customerDetail_body {text-transform: uppercase;font-size: 14px;font-weight: bold;margin-top: 5px;margin:0px 0px 0px 20px;}
 .infoCorner {margin:2px 0px;width:49%;height: 174px;font-size: 14px;border: 0px solid black;float: right;}
 .snippet {border: 1px solid black;font-size: 14px;height: 100%;width: 100%;border-collapse: collapse;border-spacing: 0px;}
 .snippet_box {width: 50%;height: 45px;border: 1px solid black;}
 .snippet_wrapper {margin:2px 0px 0px 3px;height: 100%;font-size: 13px;}
 .snippet_head {font-size:13px;padding: 1px 0px 0px 10px}
 .snippet_rightDock {float:right;margin-right:3px;}
 .snippet_body {text-transform: uppercase;font-size: 14px;font-weight: bold;padding:5px 0px 0px 0px ;}
 .through {margin:2px 0px;width:50%;height: 71px;font-size: 14px;border: 1px solid #000;float: left;}
 .dutyNotification {margin:2px 0px;width:100%;height: 52px;font-size: 14px;border: 1px solid #000;float: right;}
 .dutyNotification_table{border: 0px ;width: 100%;border-spacing: 0px;border-collapse: collapse;margin: 6px 0px 0px 0px; }
 .dutyNotification_table_box{border: 0px ;width: 34%; }
 .productDescription{margin:2px 0px;width:100%;height: 370px;font-size: 14px;border: 0px solid black;float: right;}
 .productDiscription_table {border: 1px solid black;font-size: 14px;height: 100%;width: 100%;border-collapse: collapse;border-spacing: 0px;}
 .productDescription_head {text-align: center;font-size: 13px;border:1px solid #000;height: 25px;padding: 5px 0px}
 .productDescription_table_box {border-left: 1px solid black;border-right: 1px solid black;height: auto;font-size: 14px;font-weight: bold;text-align: right;padding-right: 10px;}
 .productDescription_table_box2 { text-align:left;padding-left:10px;}
 .productDescription_table_endBox {border-top:1px solid black;border-left: 1px solid black;border-right: 1px solid black;height: auto;font-size: 14px;font-weight: bold;text-align: right;padding-right: 10px;}
 .productDescription_table_endBox1 { border-right: 0px solid black;}
 .productDescription_table_endBox2 { border:1px solid #000;border-left: 1px solid transparent;height: 38px;text-align: right;padding-right: 10px;font-size: 16px;}
 .eAmountBox {margin:2px 0px;width:60%;height: 76px;font-size: 14px;border: 1px solid black;float: left;}
 .monetory {margin:2px 0px;width:39%;height: 160px;font-size: 14px;border: 0px solid black;float: right;}
 .monetory_table {border: 1px solid black;font-size: 14px;height: 100%;width: 100%;border-collapse: collapse;border-spacing: 0px;}
 .monetory_table_feild { border:1px solid black;width: 65%;padding-left: 20px;font-size: 13px;border: 0px;}
 .monetory_table_value {border:0px ;font-size: 14px;font-weight: bold;text-align: right; padding-right: 20px;text-transform: uppercase;}
 .monetory_table_endRow {height:25%;border-top:2px solid black;text-transform: uppercase;font-weight: bold;}
 .monetory_table_endFeild {padding-left: 20px;font-size: 16px;}
 .monetory_table_endValue {padding-right: 20px;font-size: 18px;}
 .tAmountBox {margin:2px 0px;width:60%;height: 76px;font-size: 14px;border: 1px solid black;float: left;}
 .notf1 {margin:2px 0px;width:99%;padding:3px 3px 0px 3px;font-weight: bold;border: 1px solid black;float:right;font-size: 13px;height: 37px;}
 .notf2 {margin:2px 0px;width:99%;padding:3px 3px 0px 3px;border: 1px solid black;float:right;font-size: 13px;height: 37px;}
 .imgStamp {margin:2px 0px;width: 12%;height: 100px;text-align: center;padding-right: 8px;border: 0px ;font-size: 13px;float:left;}
 .image {height:102px;margin-top: 1px;}
 .dateTimeBox {margin:2px 0px;width:52%;height: 100px;font-size: 14px;border: 1px solid black;float: left;}
 .dateTimeBox_table_feild { width: 69%;font-size:13px;padding-left: 20px;}
 .dateTimeBox_table_value { width: 25%;font-size:14px;font-weight: bold;text-transform: uppercase;}
 .signatoryCorner {margin:2px 0px;text-align: center;width:34%;border: 1px solid black;height:100px;float: right;}
 .signatoryCorner_comp1 {font-size: 18px;font-weight: bold;margin-top: 10px;}
 .signatoryCorner_comp2 {font-size: 12px;font-weight: bold;margin-top: 10px;text-transform: uppercase;}
 .note {border-right: 1px solid black;float:right;padding-right: 2px;font-size:12px;}
 .footer { width:100%;height:20px;border-top:1px solid black;margin-top:10px;float: left;}
 .footer_keyBox {float:left;font-size: 12px;margin: 2px 10px 0px 0px;font-weight: bold;}
 .footer_seal {float: right;text-decoration: none;font-weight:bold;margin: 2px 0px 0px 10px;font-size: 12px;}
 .footer_print {float: left;text-transform: uppercase;text-decoration: none;color: transparent;font-size: 14px;background-color: black}
 </style>
 </head>

 <body>
 <!-- header -->
 <div id="header" class="header">
 <span class="invoiceType"><?php echo($in[type]) ?></span>
<input class="type" style="border: 0px;text-align: right;padding-right: 5px;width: 200px;float:right;font-style: italic;font-size: 14px;">
 </div>

 <!-- titleBox -->
 <div id="titleBox" class="titleBox">
 <span class="title">EUPHONIC ELECTRONICS</span><br>
 <span class="subtitle">
 11, Chaitham Lines, Allahabad - 211 002 U.P. India<br> 
 Email : <span class="email" >euphonic.ald@gmail.com</span><br>
 TIN No. : 09212714621C
 </span>
 </div>

 <!-- preAuthentication -->
 <div id="preAuthentication" class="preAuthentication" >
 <div class="preAuthentication_wrapper" >
 Pre-authenticated<br><br><br>Authorised Signatory
 </div>
 </div>

 <!-- customerDetail -->
 <div id="customerDetail" class="customerDetail">
 <div class="customerDetail_wrapper">
 M/s
 <div class="customerDetail_body">
 <?php
 echo($in[party_name]);
 if ($in[party_add_1] != null)
 echo('<br>
 ' . $in[party_add_1]);
 if ($in[party_add_2] != null)
 echo('<br>
 ' . $in[party_add_2]);
 if ($in[party_add_3] != null)
 echo('<br>
 ' . $in[party_add_3]);
 if ($in[tin_cst_no] != null)
 echo('<br>
 ' . $in[tin_cst_no] );
 ?>

 </div> 
 </div>
 </div>

 <!-- infoCorner -->
 <div id="infoCorner" class="infoCorner">
 <table class="snippet" >
 <tr class="snippet_row">
 <td class="snippet_box" >
 <div class="snippet_wrapper" >
 Invoice No.
 <span class="snippet_rightDock" >Book No.</span><br><span class="snippet_body"><?php echo($in[inv] . '<span class="snippet_rightDock">' . $in[tib] . '</span>'); ?></span> 
 </div>
 </td>
 <td class="snippet_box" >
 <div class="snippet_wrapper" >
 Dated
 <span class="snippet_body"><br><?php echo($in[invdate]); ?></span>
 </div>
 </td>
 </tr>
 <tr class="snippet_row">
 <td class="snippet_box" >
 <div class="snippet_wrapper" >
 Party Order No.
 <span class="snippet_body"><br><?php echo($in[pon]); ?></span>
 </div>
 </td>
 <td class="snippet_box" >
 <div class="snippet_wrapper" >
 Dated
 <span class="snippet_body"><br><?php echo($in[podate]); ?></span>
 </div>
 </td>
 </tr>
 <tr class="snippet_row">
 <td class="snippet_box">
 <div class="snippet_wrapper">
 Carrier
 <span class="snippet_body"><br><?php echo($in[carrier]); ?></span>
 </div>
 </td>
 <td class="snippet_box" >
 <div class="snippet_wrapper" >
 Dispatch Document No.
 <span class="snippet_body"><br><?php echo($in[dispatch_no]); ?></span>
 </div>
 </td>
 </tr>
 <tr class="snippet_row">
 <td class="snippet_box">
 <div class="snippet_wrapper" >
 No. Of Cases
 <span class="snippet_body"><br><?php echo($in[number_cases]); ?></span>
 </div>
 </td>
 <td class="snippet_box">
 <div class="snippet_wrapper" >
 Mode/Terms of Payment
 <span class="snippet_body"><br><?php echo($in[mode_terms]); ?></span>
 </div>
 </td>
 </tr>
 </table>
 </div>

 <!-- through -->
 <div id="through" class="through">
 <div class="customerDetail_wrapper">
 Through
 <div class="customerDetail_body">
 <?php echo($in[thr1] . '<br>' . $in[thr2]); ?>
 </div> 
 </div>
 </div>

 <!-- dutyNotification -->
 <div id="dutyNotification" class="dutyNotification">
 <div class="snippet_wrapper">
 No. & Date of the Notification under which any concessional rate of duty is claimed : 
 <table class="dutyNotification_table">
 <tr class="dutyNotification_table_row ">
 <td class="dutyNotification_table_box " >
 <span class="snippet_head">Tarrif Item No. :</span>
 <span class="snippet_body">8518.00</span>
 </td>
 <td class="dutyNotification_table_box" >
 <span class="snippet_head">Notfn. No. :</span>
 <span class="snippet_body">8/2003</span>
 </td>
 <td class="dutyNotification_table_box" >
 <span class="snippet_head">Date :</span>
 <span class="snippet_body">28-Feb-2003</span>
 </td>
 </tr>
 </table>
 </div>
 </div>


 <!-- prodctDescription -->
 <div id="productDescription" class="productDescription">
 <table class="productDiscription_table" >
 <tr class="productDiscription_table_row" >
 <td class="productDescription_head" style="width:20px;">#</td>
 <td class="productDescription_head" style="width:300px;">Product Details</td>
 <td class="productDescription_head" style="width:70px;">Quantity</td>
 <td class="productDescription_head" style="width:60px;">Rate</td>
 <td class="productDescription_head" style="width:100px;">Assess Value (Rs.)</td>
 <td class="productDescription_head" style="width:70px;">Duty <br>Rate</td>
 <td class="productDescription_head" style="width:80px;">Basic Ex. Duty </td>
 <td class="productDescription_head" style="width:110px;">Product Value (Rs.) </td>
 </tr><?php
 $empty_fill = '
 <tr class="productDiscription_table_row">
 <td class="productDescription_table_box"><span style="color:transparent">0</span></td>
 <td class="productDescription_table_box"></td>
 <td class="productDescription_table_box"></td>
 <td class="productDescription_table_box"></td>
 <td class="productDescription_table_box"></td>
 <td class="productDescription_table_box"></td>
 <td class="productDescription_table_box"></td>
 <td class="productDescription_table_box"></td>
 </tr>';

 for ($i = 1; $i <= 7; $i++)
 if ($in['pd' . $i] != null)
 echo ('
 <tr class="productDiscription_table_row">
 <td class="productDescription_table_box productDescription_table_box1">' . $i . '</td>
 <td class="productDescription_table_box productDescription_table_box2">' . $in['pd' . $i] . '</td>
 <td class="productDescription_table_box productDescription_table_box3">' . $in['qt' . $i] . '</td>
 <td class="productDescription_table_box productDescription_table_box4">' . $in['rt' . $i] . '</td>
 <td class="productDescription_table_box productDescription_table_box5">' . $in['av' . $i] . '</td>
 <td class="productDescription_table_box productDescription_table_box6">' . $in['dr' . $i] . '</td>
 <td class="productDescription_table_box productDescription_table_box7">' . $in['be' . $i] . '</td>
 <td class="productDescription_table_box productDescription_table_box8">' . $in['pv' . $i] . '</td>
 </tr>');
 else
 echo ($empty_fill);
 ?>

 <tr >
 <td class="productDescription_table_endBox productDescription_table_endBox1"></td>
 <td class="productDescription_table_endBox productDescription_table_endBox2">TOTAL</td>
 <td class="productDescription_table_endBox productDescription_table_endBox3"><?php echo ($in[tqt]); ?></td>
 <td class="productDescription_table_endBox productDescription_table_endBox4"></td>
 <td class="productDescription_table_endBox productDescription_table_endBox5"></td>
 <td class="productDescription_table_endBox productDescription_table_endBox6"></td>
 <td class="productDescription_table_endBox productDescription_table_endBox7"><?php echo ($in[tbe]); ?></td>
 <td class="productDescription_table_endBox productDescription_table_endBox8"><?php echo ($in[gt]); ?></td>
 </tr>
 </table>
 </div>

 <!-- eAmountBox -->
 <div id="eAmountBox" class="eAmountBox" >
 <div class="snippet_wrapper">
 Excise Amount (in words)
 <div class="snippet_body" style="text-transform: none;"> 
 <?php echo($in[tbw].'
 '); ?></div> 
 </div>
 </div>

 <!-- monetory -->
 <div id="monetory" class="monetory" >
 <table class="monetory_table" >
 <tr class="monetory_table_row">
 <td class="monetory_table_feild ">Gross Amount : </td >
 <td class="monetory_table_value"><?php echo($in[gt]); ?></td>
 </tr>
 <?php
 if ($in[vat] != null && $in[vatamt] != '0.00')
 echo('<tr class="monetory_table_row">
 <td class="monetory_table_feild">VAT @ ' . $in[vat] . ' % :</td>
 <td class="monetory_table_value">' . $in[vatamt] . '</td>
 </tr>');
 if ($in[sat] != null && $in[satamt] != '0.00')
 echo('
 <tr class="monetory_table_row">
 <td class="monetory_table_feild">SAT @ ' . $in[sat] . ' % :</td>
 <td class="monetory_table_value">' . $in[satamt] . '</td>
 </tr>');
 if ($in[cst] != null && $in[cstamt] != '0.00')
 echo('<tr class="monetory_table_row">
 <td class="monetory_table_feild">CST @ ' . $in[cst] . ' % :</td>
 <td class="monetory_table_value">' . $in[cstamt] . '</td>
 </tr>');
 ?>
 <tr class="monetory_table_row">
 <td class="monetory_table_feild">Transportation Charge : </td>
 <td class="monetory_table_value"><?php echo($in[trn]); ?></td>
 </tr>
 <tr class="monetory_table_row">
 <td class="monetory_table_feild">Round Off : </td>
 <td class="monetory_table_value"><?php echo($in[rnd]); ?></td>
 </tr>
 <tr class="monetory_table_endRow">
 <td class="monetory_table_endFeild"> Total Amount :</td>
 <td class="monetory_table_endValue"><?php printRuppee(); ?><?php echo($in[tarnd]); ?></td>
 </tr>
 </table>
 </div>

 <!-- tAmountBox -->
 <div id="tAmountBox" class="tAmountBox" >
 <div class="snippet_wrapper">
 Total Amount (in words)
 <div class="snippet_body" style="text-transform: none;">
 <?php echo($in[inw]); ?>
 </div> 
 </div>
 </div>

 <!-- notf1 -->
 <div id="notf1" class="notf1" >
 Please furnish 'C' form Immediately. Interest @ 18% per annum will be charged if the payment is not made within the stipulated period. 
 </div>

 <!-- notf2 -->
 <div id="notf2" class="notf2">
 <span style="font-weight: bold;">Certificate : </span>
 Certified that all particulars given above are true and correct and the amount indicated represents the price actually charged and that there is no flow additional consideration directly or indirectly from the buyer. 
 </div>

 <!-- imgStamp -->
 <div id="imgStamp" class="imgStamp" >
 <img class="image" src="data:image/png;base64,<?php echo($in[bc_timestamp]) ?>" >
 </div>

 <!-- Date + Time Stamp -->
 <div id="dateTimeBox" class="dateTimeBox" >
 <table class="dateTimeBox_table">
 <tr class="dateTimeBox_table_row">
 <td class="dateTimeBox_table_feild ">Place : </td >
 <td class="dateTimeBox_table_value" >Allahabad</td>
 </tr>
 <tr class="dateTimeBox_table_row">
 <td class="dateTimeBox_table_feild">Date & Time of Issuing Invoice : /td>
 <td class="dateTimeBox_table_value" ><?php echo($in[iidate] . '<br>' . $in[iit]); ?></td>
 </tr>
 <tr class="dateTimeBox_table_row">
 <td class="dateTimeBox_table_feild">Date & Time of Removing Goods :</td>
 <td class="dateTimeBox_table_value"><?php echo($in[rgdate] . '<br>' . $in[rgt]); ?></td>
 </tr>
 </table>
 </div>

 <!-- signatoryCorner -->
 <div id="signatoryCorner" class="signatoryCorner" >
 <div class="signatoryCorner_comp1" >For Euphonic Electronics</div><br><br>
 <div class="signatoryCorner_comp2" >authorised signatory</div>
 </div>

 <!-- note -->
 <div id="note" class="note" >
 Subject to terms and conditions of our O.A.
 </div>

 <!-- footer -->
 <div id="footer" class="footer">
 <div class="footer_keyBox" >Authentication Key : <?php echo($in[authentication_key]) ?></div>
 <a href="javascript:window.print()" class="footer_print" >Print</a> 
 <div class="footer_seal">auto | INV</div>
 </div>

 </body>
</html>