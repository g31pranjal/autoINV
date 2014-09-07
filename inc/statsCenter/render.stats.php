<?php
require('../resource.php');
require_once 'func.statsEngine.php';

$engine_inst = new statsEngine(array('localhost', 'pranjal_gupta', 'rocksoul', 'euphonic_invoice'));
$t1 = $engine_inst->t1();
$t2 = $engine_inst->t2();
$t3 = $engine_inst->t3();
$t4 = $engine_inst->t4();
?>


<!-- TOTAL AMOUNT-->
<div id="formf" class="formf" style="width: 68%;padding: 10px 0px;float:left;">
    <div class="statHead">Total Amount<br><div class="result1"><?php echo('Rs. ' . ($t1[6])) ?></div></div>
    <table style="width:95%;margin: auto;border-collapse:collapse;">
        <tr>
            <td style="width:50%"><div class="stattb">total gross amount from sale invoice<br><div class="resulttb"><?php echo('Rs. ' . $t1[0]) ?></div></div></td>
            <td style="width:50%"><div class="stattb">total gross amount from tax invoice <br><div class="resulttb"><?php echo('Rs. ' . $t1[3]) ?></div></div></td>
        </tr>
        <tr>
            <td style="width:50%"><div class="stattb">total tax amount from sale invoice<br><div class="resulttb"><?php echo('Rs. ' . $t1[1]) ?></div></div></td>
            <td style="width:50%"><div class="stattb">total tax amount from tax invoice<br><div class="resulttb"><?php echo('Rs. ' . $t1[4]) ?></div></div></td>
        </tr>
        <tr>
            <td style="width:50%"><div class="stattb">total aggregate amount from sale invoice<br><div class="resulttb"><?php echo('Rs. ' . $t1[2]) ?></div></div></td>
            <td style="width:50%"><div class="stattb">total aggregate amount from tax invoice<br><div class="resulttb"><?php echo('Rs. ' . $t1[5]) ?></div></div></td>
        </tr>
    </table>
</div>

<div id="formf" class="formf"  style="width: 30%;padding: 10px 0px;float:right;">
    <div class="statHead">Total Invoices<br>
        <span class="result1"><?php echo($t3[2]); ?></span>
    </div>
    <table style="width:93%;margin: auto;border-collapse:collapse;">
        <tr>
            <td style="width:50%"><div style="line-height: 20px;" class="stattb">sale invoices<span style="float:right;"class="resulttb"><?php echo($t3[0]) ?></span></div></td>
        </tr>
        <tr>
            <td style="width:50%"><div style="line-height: 20px;" class="stattb">tax invoices<span style="float:right;"class="resulttb"><?php echo($t3[1]) ?></span></div></td>
        </tr>
    </table>
</div>

<div id="formf" class="formf" style="width: 30%;margin-left: 0%; padding:10px 0px;float:right;">
    <div class="statHead">Highest grossing month<br>
        <span class="result1"><?php echo($t4[0]); ?></span>
    </div>
    <table style="width:93%;margin: auto;border-collapse:collapse;">
        <tr>
            <td style="width:50%"><div style="line-height: 20px;" class="stattb">Financial Year<span style="float:right;"class="resulttb"><?php echo($t4[1]) ?></span></div></td>
        </tr>
        <tr>
            <td style="width:50%"><div style="line-height: 20px;" class="stattb">total gross amount<span style="float:right;"class="resulttb">Rs. <?php echo($t4[2]) ?></span></div></td>
        </tr>
        <tr>
            <td style="width:50%"><div style="line-height: 20px;" class="stattb">total number of Invoices<span style="float:right;"class="resulttb"><?php echo($t4[3] + $t4[4]) ?></span></div></td>
        </tr>

    </table>
</div>

<div id="formf" class="formf"  style="width: 33%;padding:10px 0px;float:left;">
    <div class="statHead">Highest Grossing<br>
        <span class="result1">Rs. <?php echo($t2[0]); ?></span>
    </div>
    <table style="width:93%;margin: auto;border-collapse:collapse;">
        <tr>
            <td style="width:50%"><div style="line-height: 20px;" class="stattb">Invoice No. <?php echo($t2[1]); ?> Dated <?php echo($t2[2]); ?> towrads <?php echo($t2[3]); ?></div></td>
        </tr>
    </table>
</div>

<div id="formf" class="formf" style="width: 33%;margin-left: 2%; padding:10px 0px;float:left;">
    <div class="statHead">Lowest Grossing<br>
        <span class="result1">Rs. <?php echo($t2[4]); ?></span>
    </div>
    <table style="width:93%;margin: auto;border-collapse:collapse;">
        <tr>
            <td style="width:50%"><div style="line-height: 20px;" class="stattb">Invoice No. <?php echo($t2[5]); ?> Dated <?php echo($t2[6]); ?> towrads <?php echo($t2[7]); ?></div></td>
        </tr>
    </table>
</div>

<div id="formf" class="formf" style="width: 68%;padding: 10px 0px;float:left;">
    <div class="statHead">Top Contacts<br></div>
    <table style="width:95%;margin: auto;border-collapse:collapse;">
        <tr>
            <td style="width:50%"><div class="stattb">total gross amount from sale invoice<br><div class="resulttb"><?php echo('Rs. ' . $t1[0]) ?></div></div></td>
            <td style="width:50%"><div class="stattb">total gross amount from tax invoice <br><div class="resulttb"><?php echo('Rs. ' . $t1[3]) ?></div></div></td>
        </tr>
        <tr>
            <td style="width:50%"><div class="stattb">total tax amount from sale invoice<br><div class="resulttb"><?php echo('Rs. ' . $t1[1]) ?></div></div></td>
            <td style="width:50%"><div class="stattb">total tax amount from tax invoice<br><div class="resulttb"><?php echo('Rs. ' . $t1[4]) ?></div></div></td>
        </tr>
        <tr>
            <td style="width:50%"><div class="stattb">total aggregate amount from sale invoice<br><div class="resulttb"><?php echo('Rs. ' . $t1[2]) ?></div></div></td>
            <td style="width:50%"><div class="stattb">total aggregate amount from tax invoice<br><div class="resulttb"><?php echo('Rs. ' . $t1[5]) ?></div></div></td>
        </tr>
    </table>
</div>



