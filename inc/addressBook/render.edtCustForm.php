<?php
require '../connect.php';

$in = $_REQUEST;
$custID = $in[edtID];

$row_primary = mysql_fetch_array(mysql_query("SELECT * FROM `adb_primary` WHERE `custID` = '$custID' LIMIT 1"));
$row_secondary = mysql_fetch_array(mysql_query("SELECT * FROM `adb_secondary` WHERE `custID` = '$custID' LIMIT 1"));
?>
<div id="edtCustomerWrapper" class="edtCustomerWrapper blackoutContentWrapper">
    <div id="divneo" class="divneo" >
        <div class="statHead">EDIT CUSTOMER PROFILE ! </div>
        <form id="edtCustomerForm" class="edtCustomerForm" >
            <input type="text" name="pn" hidden value="<?php echo $row_primary[name]; ?>" id="pn" style="width:270px" class="inp_neo">
            <input type="text" name="custID" hidden value="<?php echo $row_primary[custID]; ?>" id="custID" style="width:270px" class="inp_neo">
            <table id="addCustomerTable" class="addCustomerTable">
                <tr>
                    <td class="addCustomerTd">
                        Party Address : <br>
                        <div id="entry_block" style="width:100%"><input type="text" name="pa1" value="<?php echo $row_primary[adline1]; ?>" id="pa1" style="margin-bottom:3px;width:300px" class="inp_neo" ><br><input type="text" name="pa2" value="<?php echo $row_primary[adline2]; ?>" id="pa2" style="margin-bottom:3px;width:300px" class="inp_neo"><br><input type="text" name="pa3" value="<?php echo $row_primary[adline3]; ?>" id="pa3" style="margin-bottom:3px;width:300px" class="inp_neo"></div>
                    </td>
                </tr>
                <tr>
                    <td class="addCustomerTd">
                        Party Tin No : <br>
                        <div id="entry_block" style="width:100%"><input type="text" name="pa4" value="<?php echo $row_primary[tin]; ?>" id="pa4" style="width:300px" class="inp_neo"></div>
                    </td>
                </tr>
                <tr>
                    <td class="addCustomerTd">
                        Party Order No. : <br>
                        <div id="entry_block" style="width:80px"><input type="text" name="pon" value="<?php echo $row_secondary[pon]; ?>" id="pon" style="width:80px;" class="inp_neo"></div><div style="font-size:14px;font-weight:normal;color: #aaa;margin-right: 5px;width: 50px;line-height: 26px;float: left">Date : </div><div id="entry_block" style="float:left;width:130px"><input type="text" name="pod"  value="<?php echo $row_secondary[pod]; ?>" id="pod" style="width:100px;text-align: center" class="inp_neo"></div>
                    </td>
                </tr>
                <tr>
                    <td class="addCustomerTd">
                        Type : <br>
                        <input type="radio" <?php if ($row_secondary[type] == 'TAX INVOICE') echo 'checked'; ?> name="type" id="type" value="TAX INVOICE" /> <span style="font-size: 14px">Tax invoice</span>
                        <input type="radio" <?php if ($row_secondary[type] == 'SALE INVOICE') echo 'checked'; ?> name="type" id="type" value="SALE INVOICE" /> <span style="font-size: 14px"> Sales invoice</span>
                    </td>
                </tr>
                <tr>
                    <td class="addCustomerTd">
                        Through : <br>
                        <div id="entry_block" class="sp1" style="margin-top: 10px;width:300px"><input type="text" value="<?php echo $row_secondary[thr1]; ?>" name="thr1" id="thr1" style="width:300px" class="inp_neo"><br><input type="text" value="<?php echo $row_secondary[thr2]; ?>" name="thr2" id="thr2" style="width:300px" class="inp_neo"></div>
                    </td>
                </tr>
                <tr>
                    <td class="addCustomerTd">
                        Carrier : <br>
                        <div id="entry_block" style="width:300px"><input type="text" value="<?php echo $row_secondary[carrier]; ?>" name="car" id="car" style="width:300px" class="inp_neo"></div>
                    </td>
                </tr>
                <tr>
                    <td class="addCustomerTd">
                        Mode / Terms of payment : <br>
                        <div id="entry_block" style="width:200px"><input type="text" value="<?php echo $row_secondary[mtop]; ?>" name="mtp" id="mtp" style="width:200px" class="inp_neo"></div>
                    </td>
                </tr>
                <tr>
                    <td class="addCustomerTd">
                        vat : <br>
                        <div id="entry_block" style="width:65px"><input type="text" value="<?php echo $row_secondary[vat]; ?>" name="vat" id="vat" style="width:40px" class="inp_neo"> % </div>
                    </td>
                </tr>
                <tr>
                    <td class="addCustomerTd">
                        sat : <br>
                        <div id="entry_block" style="width:65px"><input type="text" value="<?php echo $row_secondary[sat]; ?>" name="sat" id="sat" style="width:40px" class="inp_neo"> % </div>
                    </td>
                </tr>
                <tr>
                    <td class="addCustomerTd">
                        cst : <br>
                        <div id="entry_block" style="width:65px"><input type="text" value="<?php echo $row_secondary[cst]; ?>" name="cst" id="cst" style="width:40px" class="inp_neo"> % </div>
                    </td>
                </tr>
                <tr>
                    <td class="addCustomerTd">
                        Transportation Charge : <br>
                        <div id="entry_block" style="width:100px">Rs. <input type="text" value="<?php echo $row_secondary[trns]; ?>" name="trn" id="trn" style="width:70px" class="inp_neo"></div>
                    </td>
                </tr>
            </table>
        </form>
        <button id="edtCustSubmit">Submit</button>
    </div>
</div>

<script>
    $('#edtCustSubmit').click(function() {
        var dataT = ($('#edtCustomerForm').serialize());
        var id = $('#custID').val();
        $.ajax({
            url: "./inc/addressBook/class.edtCust.php",
            data: dataT,
            success: function(data) {
                var obj = jQuery.parseJSON(data)
                closeLightbox(1);
                beepNotificationBox(obj.job, obj.notification);
                $.ajax({
                    url: "./inc/addressBook/class.useCust.php",
                    type: "POST",
                    data: $.param({useID: id}),
                    success: function(data) {
                        var obj = jQuery.parseJSON(data);
                        fillCustProfile(obj.data);
                        closeLightbox(1);
                    }
                });
            }
        });
    });
</script>