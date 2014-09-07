<?php
require 'func.editData.php';
require '../resource.php';

$in = $_REQUEST;
$result = returnData($in[ts], $in[inv]);
?>

<div id="editModWrapper" class="editModWrapper blackoutContentWrapper">
    <div id="divneo" class="divneo" >
        <div class="statHead">Edit Details !</div>
        <table style="width: 100%;">
            <tr>
                <td style="width:50%">
                    <div id ="info_window_l" class="editModTable">
                        <span class="info_window_head"><?php echo ($result['party_name']); ?></span><br>
                        <span class="info_window_subr"><?php echo ($result['party_add_1'] . "<br>" . $result['party_add_2'] . "<br>" . $result['party_add_3'] . "<br>" . $result['tin_cst_no']); ?></span><br>
                        <span class="info_window_subr"><span style="font-weight: bold">Invoice No : </span><?php echo ($result['inv'] . '<span style="font-weight:bold"> Dt.</span>' . $result['invdate'] . '<br><span style="font-weight:bold">Purchase Order : </span>' . $result['pon'] . '<span style="font-weight:bold"> Dt. </span>' . $result['podate']); ?></span><br>
                        <br>
                        <span class="info_window_subr"><span style="font-weight: bold">Throught : </span><?php echo ($result['thr1'] . $result['thr2'] . '<br><span style="font-weight:bold">Carrier : </span>' . $result['carrier'] . '<br><span style="font-weight:bold">Mode / Terms of Payment : </span>' . $result['mode_terms'] . '<br><span style="font-weight:bold">Disapatch Dcument No. : </span>' . $result['dd']); ?></span><br>
                        <br>
                        <span class="info_window_subr"><span style="font-weight: bold">Total Amount : </span><?php echo ($result['ta'] . '<br><span style="font-weight:bold">Payment Status : </span>' . $result['paid']) ?></span><br>
                    </div>
                </td>
                <td style="border: 1px solid #eee;">
                    <div id ="info_window_l" class="editModTable">
                        <form id="editInvForm">
                            <input type="text" hidden="hidden" name="inv" value="<?php echo ($result['inv']) ?>">
                            <input type="text" hidden="hidden" name="timestamp" value="<?php echo ($result['timestamp']) ?>">
                            Carrier : <input type="text" name="car" value="<?php echo ($result['carrier']) ?>"><br>
                            Dispatch Document No. : <input type="text" name="dd" value="<?php echo ($result['dispatch_no']) ?>"><br>
                            Mode/terms Of Payment : <input type="text" name="mode_terms" value="<?php echo ($result['mode_terms']) ?>"><br>
                            Payment :                      
                            <input type="radio" name="paid" id="type" <?php
                            if ($result['paid'] == 1)
                                echo 'checked';
                            ?> value="1" /> Paid
                            <input type="radio" name="paid" id="type" <?php
                            if ($result['paid'] == 0)
                                echo 'checked';
                            ?> value="0" /> Not Paid<br>
                            Payment Remarks : <input name="paid_remark" value="<?php echo ($result['paid_remark']) ?>"valtype="text">
                            <br><br>
                        </form>
                        <button id="editInvSubmit" class="editInvSubmit">Submit Changes ! </button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>

<script>
    $('#editInvSubmit').click(function() {
        var dataT = ($('#editInvForm').serialize());
        $.ajax({
            url: "./inc/archive/class.editInv.php",
            data: dataT,
            success: function(data) {
                var obj = jQuery.parseJSON(data);
                closeLightbox(1);
                beepNotificationBox(obj.job, obj.notification);
            }
        });
    });
</script>