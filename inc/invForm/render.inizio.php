<?php
require '../resource.php';
require 'func.inizioData.php';

$in = returnData($_POST['authentication_key']);
?>
<div id="inizioModWrapper" class="inizioWrapper blackoutContentWrapper">
    <div id="divneo" class="divneo" >
        <div class="statHead">REVIEW INFORMATION !</div>
        <!--inf2_info-->
        <div id="formf1" class="reviewModTable" style="padding: 10px;">
            <table class="wrapper"> 
                <tr>
                    <td style="width:50%">
                        <table class="inf2">
                            <tbody>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">Type of Invoice</td>
                                    <td class="inf2_field"><?php echo($in['type']); ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">Party Name</td>
                                    <td class="inf2_field"><?php echo($in['party_name']); ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">Party Address</td>
                                    <td class="inf2_field"><?php
                                        if ($in['party_add_1'] != null)
                                            echo($in['party_add_1']);
                                        if ($in['party_add_2'] != null)
                                            echo('<br>' . $in['party_add_2']);
                                        if ($in['party_add_3'] != null)
                                            echo('<br>' . $in['party_add_3']);
                                        ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">Party Tin / Cst</td>
                                    <td class="inf2_field"><?php
                                        echo($in['tin_cst_no']);
                                        ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">Invoice No. *</td>
                                    <td class="inf2_field"><?php
                                        echo($in['inv']);
                                        echo('<br> Dt. : ' . $in['invdate']);
                                        ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">Party Order No.</td>
                                    <td class="inf2_field"><?php
                                        echo($in['pon']);
                                        echo('<br> Dt. : ' . $in['podate']);
                                        ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">Tax Invoice Book No.</td>
                                    <td class="inf2_field"><?php echo($in['tib']); ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">Dispatch Document No.</td>
                                    <td class="inf2_field"><?php echo($in['dispatch_no']); ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">Mode / Terms of Payment</td>
                                    <td class="inf2_field"><?php echo($in['mode_terms']); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </td><td style="width:50%">
                        <table class="inf2">
                            <tbody>

                                <tr class="inf2_entry">
                                    <td class="inf2_info">Through *</td>
                                    <td class="inf2_field"><?php echo($in['thr1'] . '<br>' . $in['thr2']); ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">No. Of Cases *</td>
                                    <td class="inf2_field"><?php echo($in['number_cases']); ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">Carrier *</td>
                                    <td class="inf2_field"><?php echo($in['carrier']); ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">CST applicable %</td>
                                    <td class="inf2_field"><?php echo($in['cst'] . " % "); ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">VAT applicable %</td>
                                    <td class="inf2_field"><?php echo($in['vat'] . " % "); ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">SAT applicable %</td>
                                    <td class="inf2_field"><?php echo($in['sat'] . " % "); ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">Transportation Charge</td>
                                    <td class="inf2_field"><?php echo($in['trn']); ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">Date & time of Issuing Invoice</td>
                                    <td class="inf2_field"><?php
                                        echo('Dt. : ' . $in['iidate']);
                                        if ($in['iit'] != null)
                                            echo("<br>Time : " . $in['iit']);
                                        ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">Date & Time of Removing goods</td>
                                    <td class="inf2_field"><?php
                                        echo(' Dt. : ' . $in[rgdate]);
                                        if ($in[rgt] != null)
                                            echo( "<br>Time : " . $in[rgt]);
                                        ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">Authentication Key</td>
                                    <td class="inf2_field" style="text-transform: none;"><?php echo($in[authentication_key]); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
        </div>

        <!--MONETARY DETAILS-->
        <div id="formf2" class="reviewModTable" style="margin-bottom: 30px;padding: 10px;">
            <table class="wrapper">
                <tr>
                    <td colspan="2" class="inf2_info">Product Details</td></tr>
                <tr>
                    <td colspan="2">
                        <table class="prd" >
                            <tbody>
                                <tr style="text-transform: uppercase;font-weight: bold;font-size: 12px;">
                                    <td style="border:1px solid #ccc;width:20px;" class="sno">#</td>
                                    <td style="border:1px solid #ccc;width:300px;" class="pc">Product Details</td>
                                    <td style="border:1px solid #ccc;width:70px;" class="qnt">Quantity</td>
                                    <td style="border:1px solid #ccc;width:50px;" class="rat">Rate</td>
                                    <td style="border:1px solid #ccc;width:90px;" class="av">Assess Value<br>(Rs.)</td>
                                    <td style="border:1px solid #ccc;width:60px;" class="dur">Duty<br>Rate</td>
                                    <td style="border:1px solid #ccc;width:80px;" class="bex">Basic Ex.<br> Duty </td>
                                    <td style="border:1px solid #ccc;width:90px;" class="pv">Product<br>Value(Rs.) </td>
                                </tr>
                                <?php
                                for ($i = 1; $i <= 5; $i++)
                                    if ($in['pd' . $i] != null)
                                        echo ('<tr class="rw"><td class="un">' . $i . '</td><td class="un">' . $in['pd' . $i] . '</td><td class="un">' . $in['qt' . $i] . '</td><td class="un">' . $in['rt' . $i] . '</td><td class="un">' . $in['av' . $i] . '</td><td class="un">' . $in['dr' . $i] . '</td><td class="un">' . $in['be' . $i] . '</td><td class="un">' . $in['pv' . $i] . '<br>');
                                ?>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="height: 100%;width: 25%;border: 0px solid black;">
                        <table style="margin-left: 40px;width:80%;border:0px solid grey;">
                            <tr class="rw">
                                <td class="inf2_info" style="width:60%">Gross value (Rs.)</td>
                                <td class="inf2_field" style="text-align:right;"><?php echo($in[gt]); ?></td>
                            </tr>
                            <?php
                            if ($in[cst] != null && $in[cst] != '0.00') {
                                echo('<tr class="rw">
                                    <td class="inf2_info" style="width:60%">CST @ '
                                . $in[cst] . ' % </td>
                                    <td class="inf2_field" style="text-align:right;">');
                                echo($in[cstamt]);
                                echo('</td>
                                </tr>');
                            }
                            if ($in[vat] != null && $in[vat] != '0.00') {
                                echo('<tr class="rw">
                                    <td class="inf2_info" style="width:60%">VAT @ '
                                . $in[vat] . ' % </td>
                                    <td class="inf2_field" style="text-align:right;">');
                                echo($in[vatamt]);
                                echo('</td>
                                </tr>');
                            }
                            if ($in[sat] != null && $in[sat] != '0.00') {
                                echo('<tr class="rw">
                                    <td class="inf2_info" style="width:60%">SAT @ '
                                . $in[sat] . ' % </td>
                                    <td class="inf2_field" style="text-align:right;">');
                                echo($in[satamt]);
                                echo('</td>
                                </tr>');
                            }
                            ?>
                            <tr>
                                <td class="inf2_info" style="width:60%">Transportation Charges  </td>
                                <td class="inf2_field" style="text-align:right;"><?php echo($in[trn]); ?></td>
                            </tr>
                            <tr>
                                <td class="inf2_info" style="width:60%">Rounding Off  </td>
                                <td class="inf2_field" style="text-align:right;"><?php echo($in[rnd]); ?></td>
                            </tr>

                            <tr>
                                <td class="inf2_info" style="font-size:20px;width:60%">Total Amount</td>
                                <td class="inf2_field" style="font-size:20px;text-align:right;"><?php echo($in[tarnd]); ?></td>
                            </tr>
                        </table>         
                    </td>
                    <td>
                        <table style="margin: auto;height: 100%;width:90%;border:0px solid grey;">
                            <tr class="rw">
                                <td class="inf2_info" style="width:100%">Excise Amount (in words)</td>
                            </tr>
                            <tr class="rw">
                                <td class="inf2_field" style="text-align:left;"><?php echo($in[tbw]); ?></td>
                            </tr>
                            <tr class="rw">
                                <td class="inf2_info" style="width:100%">Total Amount (in words)</td>
                            </tr>
                            <tr class="rw">
                                <td class="inf2_field" style="text-align:left;"><?php echo($in[inw]); ?></td>
                            </tr>
                        </table>         
                    </td>
                </tr>
            </table>
        </div>

        <div id="formf" class="reviewModTable" style="padding:10px;">
            <div id="p_button" class="p_button p_button_c1" style="width: 280px;">Create Invoice</div>
            <div id="load_wrapper" class="load_wrapper">
                <div id="load_bar" class="load_bar"><div id="runup" class="runup"></div></div>
                <table id="after_content" class="wrapper" style="display: none">
                    <tr>
                        <td style="border: 0px solid black;width: 75%;">
                            <table style="width: 100%;border:0px solid #eee;padding: 0px 10px">
                                <tr class="rw">
                                    <td class="inf2_info" style="width:100%">Current Status regarding the Payment due against Invoice</td>
                                </tr>
                                <tr class="rw">
                                    <td class="inf2_field" style="text-align:left;">NOT PAID</td>
                                </tr>
                                <tr class="rw">
                                    <td class="inf2_info" style="width:100%">Unix Timestamp (Creation Of Invoice)</td>
                                </tr>
                                <tr class="rw">
                                    <td class="inf2_field" style="text-align:left;">1371394114 <br>DATE AND TIME OF CREATION : 16 JUNE 2013 @ 08:18:34 PM</td>
                                </tr>
                            </table>
                            <table style="width: 100%;border-top:1px solid #ddd;">
                                <tr>
                                    <td style="border: 0px solid black;padding: 15px 10px 10px 10px;width: 34%">
                                        <a class="p_button p_button_c1" style="padding:6px 48px;" target="_tab" href="generateN.php?authentication_key=<?php echo($in[authentication_key]); ?>&print=Office Copy">Office Copy</a>
                                    </td>
                                    <td style="border: 0px solid black;padding: 15px 10px 10px 10px;width: 33%">
                                        <a class="p_button p_button_c1" style="padding:6px 30px;" target="_tab" href="generateN.php?authentication_key=<?php echo($in[authentication_key]); ?>&print=Duplicate for the Transporter">Duplicate Copy</a>
                                    </td>
                                    <td style="border: 0px solid black;padding: 15px 10px 10px 10px;width: 33%">
                                        <a class="p_button p_button_c1" style="padding:6px 35px;" target="_tab" href="generateN.php?authentication_key=<?php echo($in[authentication_key]); ?>&print=Original for the Buyer">Original Copy</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td style="border: 1px solid #ddd;width: 25%;">
                            <div id="suc" class="suc" style="width: 100%;border: 1px solid transparent;background: rgb(93, 194, 62);height: 20%;text-align: center;line-height: 35px;font-size: 14px;font-weight: bold;color:white;">SUCCESSFULLY REGISTERED !</div>
                            <div id="bccontainer" class="bccontainer" style="width: 100%;border: 1px solid transparent;background: #fff;height: 80%;text-align: center;line-height: 30px;">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>