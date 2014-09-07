<?php
require 'resource.php';
error_reporting(0);

$in = $_POST;
$content = $in['editor1'];
$ref = $in['ref'];
$date = $in['date'];
?>

<html>
    <head>
        <title><?php echo('Letter Ref. ' . $ref . ' Dt. ' . $date) ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style>
            body {width: 800px;height: 1050px;border: 0px solid #eee;}
            .title {border-bottom:2px solid black;font-weight: bold;font-size: 60px;text-align:center;font-family: "calibri";}
            .subtitle {text-align:center;font-size: 20px;font-family: "calibri"}
            .quote {text-align:center;margin-top: 12px;font-size: 14px;font-family: "Michroma"}
            #doc {border: 0px solid transparent;}
            #infos{font-family: "calibri";font-size: 16px;margin-top: 10px;}
        </style>
    </head>
    <body>


        <!-- Head -->
        <div id="doc" style="width:100%;border: 0px solid black">
            <div class="title">Euphonic Electronics</div>
            <div class="subtitle">11, Chaitham Lines, Allahabad - 211 002 U.P. India</div>
            <div class="quote">MANUFACTURER OF ALL KIND OF SPEAKERS AND THEIR PARTS</div>
        </div>

        <!--content-->
        <div id="doc" style="height:880px;font-family: 'calibri';font-size: 18px;padding:40px;border: 0px solid black">
            <?php echo($content) ?>
        </div>

        <!-- foot -->
        <div id="doc" style="width:100%;border-top:2px solid black">
            <div id="infos">
                <span style="font-weight: bold;text-decoration: underline;">Office & Works:</span> 11, Chaitham Lines, Allahabad-211 002 Ph.no. 09415645035 E-mail: euphonic.ald@gmail.com<br>
                <span style="font-weight: bold;text-decoration: underline;">Delhi Office:</span> Mr. K.S. Gupta, 4315, Ansari Road, Dariya Ganj, Delhi-110 005 Ph. 09891048550<br>
                TIN No. 09212714621C  Dt. 02.01.12
            </div>
        </div>
    </body>
</html>