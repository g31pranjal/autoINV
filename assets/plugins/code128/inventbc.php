<?php
include('code128.class.php');

function createBCInstance($stamp,$h,$filename,$pix,$text) {
    $barcode = new phpCode128("$stamp", "$h", 'c:\windows\fonts\verdana.ttf', 10);
    $barcode->setBorderWidth(0);
    $barcode->setBorderSpacing(0);
    $barcode->setPixelWidth($pix);
    $barcode->setEanStyle(false);
    $barcode->setShowText("$text");
    $barcode->setAutoAdjustFontSize(false);
    $barcode->setTextSpacing(10);
    $barcode->saveBarcode("$filename");

    $imagedata = file_get_contents("$filename");
    $base64 = base64_encode($imagedata);
    
    return $base64;
}

?>