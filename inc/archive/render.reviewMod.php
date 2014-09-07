<?php
require 'func.reviewData.php';
require '../resource.php';

$in = $_REQUEST;
$result = returnData($in[ts], $in[inv]);
?>

<div id="reviewModWrapper" class="reviewModWrapper blackoutContentWrapper">
    <div id="divneo" class="divneo" >
        <div class="statHead">REVEIW : INV. <?php echo $result[inv]; ?> Dt. <?php echo $result[invdate]; ?> : <?php echo $result[party_name]; ?><br>
            <button id="eb<?php echo $result['timestamp'] . 'INV' . $result['inv'] ?>" class="editInvButton">Edit Limited Details</dit>
        </div>
        <div id="formf1" class="reviewModTable">
            <table class="wrapper"> 
                <tr>
                    <td style="width:50%">
                        <table class="inf2">
                            <tbody>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">Type of Invoice</td>
                                    <td class="inf2_field"><?php echo($result['type']); ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">Party Name</td>
                                    <td class="inf2_field"><?php echo($result['party_name']); ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">Party Address</td>
                                    <td class="inf2_field"><?php
                                        if ($result['party_add_1'] != null)
                                            echo($result['party_add_1']);
                                        if ($result['party_add_2'] != null)
                                            echo('<br>' . $result['party_add_2']);
                                        if ($result['party_add_3'] != null)
                                            echo('<br>' . $result['party_add_3']);
                                        ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">Party Tin / Cst</td>
                                    <td class="inf2_field"><?php
                                        echo($result['tin_cst_no']);
                                        ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">Invoice No. *</td>
                                    <td class="inf2_field"><?php
                                        echo($result['inv']);
                                        echo('<br> Dt. : ' . $result['invdate']);
                                        ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">Party Order No.</td>
                                    <td class="inf2_field"><?php
                                        echo($result['pon']);
                                        echo('<br> Dt. : ' . $result['podate']);
                                        ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">Tax Invoice Book No.</td>
                                    <td class="inf2_field"><?php echo($result['tib']); ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">Dispatch Document No.</td>
                                    <td class="inf2_field"><?php echo($result['dispatch_no']); ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">Mode / Terms of Payment</td>
                                    <td class="inf2_field"><?php echo($result['mode_terms']); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </td><td style="width:50%">
                        <table class="inf2">
                            <tbody>

                                <tr class="inf2_entry">
                                    <td class="inf2_info">Through *</td>
                                    <td class="inf2_field"><?php echo($result['thr1'] . '<br>' . $result['thr2']); ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">No. Of Cases *</td>
                                    <td class="inf2_field"><?php echo($result['number_cases']); ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">Carrier *</td>
                                    <td class="inf2_field"><?php echo($result['carrier']); ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">CST applicable %</td>
                                    <td class="inf2_field"><?php echo($result['cst'] . " % "); ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">VAT applicable %</td>
                                    <td class="inf2_field"><?php echo($result['vat'] . " % "); ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">SAT applicable %</td>
                                    <td class="inf2_field"><?php echo($result['sat'] . " % "); ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">Transportation Charge</td>
                                    <td class="inf2_field"><?php echo($result['trn']); ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">Date & time of Issuing Invoice</td>
                                    <td class="inf2_field"><?php
                                        echo('Dt. : ' . $result['iidate']);
                                        if ($result['iit'] != null)
                                            echo("<br>Time : " . $result['iit']);
                                        ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">Date & Time of Removing goods</td>
                                    <td class="inf2_field"><?php
                                        echo(' Dt. : ' . $result[rgdate]);
                                        if ($result[rgt] != null)
                                            echo( "<br>Time : " . $result[rgt]);
                                        ?></td>
                                </tr>
                                <tr class="inf2_entry">
                                    <td class="inf2_info">Authentication Key</td>
                                    <td class="inf2_field" style="text-transform: none;"><?php echo($result[authentication_key]); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <!--MONETARY DETAILS-->
        <div id="formf2" class="reviewModTable">
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
                                    if ($result['pd' . $i] != null)
                                        echo ('<tr class="rw"><td class="un">' . $i . '</td><td class="un">' . $result['pd' . $i] . '</td><td class="un">' . $result['qt' . $i] . '</td><td class="un">' . $result['rt' . $i] . '</td><td class="un">' . $result['av' . $i] . '</td><td class="un">' . $result['dr' . $i] . '</td><td class="un">' . $result['be' . $i] . '</td><td class="un">' . $result['pv' . $i] . '<br>');
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
                                <td class="inf2_field" style="text-align:right;"><?php echo($result[gt]); ?></td>
                            </tr>
                            <?php
                            if ($result[cst] != null && $result[cst] != '0.00') {
                                echo('<tr class="rw">
                                    <td class="inf2_info" style="width:60%">CST @ '
                                . $result[cst] . ' % </td>
                                    <td class="inf2_field" style="text-align:right;">');
                                echo($result[cstamt]);
                                echo('</td>
                                </tr>');
                            }
                            if ($result[vat] != null && $result[vat] != '0.00') {
                                echo('<tr class="rw">
                                    <td class="inf2_info" style="width:60%">VAT @ '
                                . $result[vat] . ' % </td>
                                    <td class="inf2_field" style="text-align:right;">');
                                echo($result[vatamt]);
                                echo('</td>
                                </tr>');
                            }
                            if ($result[sat] != null && $result[sat] != '0.00') {
                                echo('<tr class="rw">
                                    <td class="inf2_info" style="width:60%">SAT @ '
                                . $result[sat] . ' % </td>
                                    <td class="inf2_field" style="text-align:right;">');
                                echo($result[satamt]);
                                echo('</td>
                                </tr>');
                            }
                            ?>
                            <tr>
                                <td class="inf2_info" style="width:60%">Transportation Charges  </td>
                                <td class="inf2_field" style="text-align:right;"><?php echo($result[trn]); ?></td>
                            </tr>
                            <tr>
                                <td class="inf2_info" style="width:60%">Rounding Off  </td>
                                <td class="inf2_field" style="text-align:right;"><?php echo($result[rnd]); ?></td>
                            </tr>

                            <tr>
                                <td class="inf2_info" style="font-size:20px;width:60%">Total Amount</td>
                                <td class="inf2_field" style="font-size:20px;text-align:right;"><?php echo($result[tarnd] == null ? $result[ta] : $result[tarnd]); ?></td>
                            </tr>
                        </table>         
                    </td>
                    <td>
                        <table style="margin: auto;height: 100%;width:90%;border:0px solid grey;">
                            <tr class="rw">
                                <td class="inf2_info" style="width:100%">Excise Amount (in words)</td>
                            </tr>
                            <tr class="rw">
                                <td class="inf2_field" style="text-align:left;"><?php echo(wrd($result[tbe])); ?></td>
                            </tr>
                            <tr class="rw">
                                <td class="inf2_info" style="width:100%">Total Amount (in words)</td>
                            </tr>
                            <tr class="rw">
                                <td class="inf2_field" style="text-align:left;"><?php echo(wrd($result[tarnd] == null ? $result[ta] : $result[tarnd])); ?></td>
                            </tr>
                        </table>         
                    </td>
                </tr>
            </table>
        </div>

        <div id="formf" class="reviewModTable">
            <table style="width:90%;border:0px solid grey;">
                <tr class="rw">
                    <td class="inf2_info" style="width:100%">Unix Timestamp (Creation Of Invoice)</td>
                </tr>
                <tr class="rw">
                    <td class="inf2_field" style="text-align:left;"><?php echo ($result['timestamp'] . " <br>Date and Time Of Creation : " . date("d F Y", $result['timestamp']) . " @ " . date("h:i:s A", $result['timestamp'])) ?></td>
                </tr>
            </table>     
        </div>
    </div>
</div>

<script>
    $('.editInvButton').click(function() {
        var editID = $(this).attr('id');
        var ts = editID.substring(2, 12);
        var inv = editID.substring(15, 18);
        $.ajax({
            url: "./inc/archive/render.editMod.php?ts=" + ts + "&inv=" + inv,
            success: function(data) {
                $('#blackoutContent').html(data);
            }
        });
    });
</script>