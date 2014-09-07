<?php require '../resource.php'; ?>

<script type="text/javascript" src="./inc/invForm/formValidation.js"></script>


<div id="formf" class="formf" style="padding: 30px 0px;">
    <button id="extCustomer" class="extCust">Select From Existing Customer List</button>
    <div id="custIDBox" class="custIDBox"></div>
    <div id="custDetailsBox" class="custDetailsBox"></div>
</div>
<form  id="f" >

    <div id="formf" class="formf" style="padding: 30px 0px;">
        <table class="inf1">
            <tbody>
                <tr class="group" >
                    <td colspan="2" style="padding:5px 20px;"><span class="group_head"> 1. GENERAL INFO : </span></td>
                </tr>

                <!-- 01. INVOICE TYPE [name=type] [id=type] -->
                <tr class="entry">
                    <td class="info">Type of invoice<?php tagging(true, false, '1'); ?></td>
                    <td class="feild">
                        <input type="radio" name="type" id="type" value="ti" /> <span style="font-size: 14px">Tax invoice</span>
                        <input type="radio" name="type" id="type" value="si" /> <span style="font-size: 14px"> Sales invoice</span>
                    </td>
                </tr>

            <input type="text" name="cust" id="cust" style="width:80px;" hidden>

            <!-- 07.08.09.10. INVOICE NO. & DATE [name={inv,invdday.invdmnt,invdyr}] [id={inv,invdday.invdmnt,invdyr}] -->
            <tr class="entry">
                <td class="info">invoice No. <?php tagging(true, true, '3'); ?></td>
                <td class="feild">
                    <div id="feild_s" style="width: 100%;float: left;">
                        <table class="local" style="float:left;width:314px;">
                            <tr>
                                <td style="width:80px;">
                                    <div id="entry_block" style="width:80px"><input type="text" name="inv" id="inv" style="width:80px;" class="inp_neo"></div> 
                                </td>
                                <td style="width:30px;"></td>
                                <td style="width:200px;">
                                    <div style="font-size:14px;color: #aaa;margin-right: 5px;width: 40px;line-height: 26px;float: left">Date : </div><div id="entry_block" style="float:left;width:130px"><input type="text" name="invdday" id="invdday" style="width:30px;text-align: center;" class="inp_neo"> . <input type="text" name="invdmnt" id="invdmnt" style="width:30px;text-align: center;" class="inp_neo"> . 20<input type="text" name="invdyr" id="invdyr" style="width:30px" class="inp_neo"></div>
                                </td>
                            </tr>
                        </table>
                        <?php printq(); ?>
                        <div id="query_post"><span style="font-size:11px;color:#7092BE;font-weight: bold">COMPULSORY FEILD, INFORMATIVE, SECURED</span><br>Specify the Invoice no. & date of issuance of Invoice. <br>The Information will be used in the storage name for quick-referncing.<br>Date format : dd-mm-yyyy</div>
                    </div>
                </td>
            </tr>

            <!-- 11.12.13.14. PARTY ORDER NO. & DATE [name={pon,podday.podmnt,podyr}] [id={pon,podday,podmnt,podyr}] -->
            <tr class="entry">
                <td class="info">Party Order No.<?php tagging(false, false, '3'); ?></td>
                <td class="feild">
                    <div id="feild_s" style="width: 100%;float: left;">
                        <table class="local" style="float:left;width:314px;">
                            <tr>
                                <td style="width:80px;">
                                    <div id="entry_block" style="width:80px"><input type="text" name="pon" id="pon" style="width:80px;" class="inp_neo"></div>
                                </td>
                                <td style="width:30px;"></td>
                                <td style="width:200px;">
                                    <div style="font-size:14px;color: #aaa;margin-right: 5px;width: 40px;line-height: 26px;float: left">Date : </div><div id="entry_block" style="float:left;width:130px"><input type="text" name="podday" id="podday" style="width:30px;text-align: center" class="inp_neo"> . <input type="text" name="podmnt" id="podmnt" style="text-align: center;width:30px" class="inp_neo"> . 20<input type="text" name="podyr" id="podyr" style="width:30px" class="inp_neo"></div>
                                </td>
                            </tr>
                        </table>
                        <?php printq(); ?>
                        <div id="query_post"><span style="font-size:11px;color:#7092BE;font-weight: bold">COMPULSORY FEILD, INFORMATIVE, SECURED</span><br>Specify the Invoice no. & date of issuance of Invoice. <br>The Information will be used in the storage name for quick-referncing.<br>Date format : dd-mm-yyyy</div>
                    </div>
                </td>
            </tr>

            <!-- 15. INVOICE BOOK NO. [name=tib] [id=tib] -->
            <tr class="entry">
                <td class="info">invoice Book No.<?php tagging(false, false, '1'); ?></td>
                <td class="feild">
                    <div id="feild_s">
                        <div id="entry_block" style="width:100px"><input type="text" name="tib" id="tib" style="width:100px;" class="inp_neo"></div><?php printq(); ?><br>
                        <div id="query_post"><span style="font-size:11px;color:#7092BE;font-weight: bold">SECURED</span><br>Specify the current Book No. for reference of the Office Copy of invoice.</div>
                    </div>

                </td>
            </tr>

            <tr style="height:50px;"></tr>
            <tr class="group" >
                <td colspan="2" style="padding:5px 20px;"><span class="group_head">2. TRANSPORTATION DETAILS : </span></td>
            </tr>

            <!-- 21.22.23. THROUGH [name={thropt,thr1,thr2}] [id={thropt,thr1,thr2}] -->
            <tr class="entry">
                <td class="info">Through<?php tagging(false, true, '1'); ?></td>
                <td class="feild">
                    <div id="feild_s">
                        <div id="entry_block" class="sp1" style="margin-top: 10px;width:300px"><input type="text" name="thr1" id="thr1" style="width:300px" class="inp_neo"><br><input type="text" name="thr2" id="thr2" style="width:300px" class="inp_neo"></div><?php printq(); ?><br>
                        <div id="query_post"><span style="font-size:11px;color:#7092BE;font-weight: bold">INFORMATIVE, SECURED</span><br>Specify the place of delivery. <br>In case the delivery is directly to the firm's permanent address, check "DIRECT TO THE PARTY" or else specify the location.</div>
                    </div>
                </td>
            </tr>

            <!-- 24. NO.OF.CASES [name=noc] [id=noc] -->
            <tr class="entry">
                <td class="info">No. Of Cases<?php tagging(true, true, '1'); ?></td>
                <td class="feild">
                    <div id="feild_s">
                        <div id="entry_block" style="width:70px"><input type="text" name="noc" id="noc" style="width:30px" class="inp_neo">Nos.</div><?php printq(); ?><br>
                        <div id="query_post"><span style="font-size:11px;color:#7092BE;font-weight: bold">COMPULSORY FEILD, INFORMATIVE, SECURED</span><br>Specify the number of Cases To be transported under Invoice</div>
                    </div>
                </td>
            </tr>

            <!-- 25. CARRIER [name=car] [id=car] -->
            <tr class="entry">
                <td class="info">Carrier<?php tagging(true, true, '1'); ?></td>
                <td class="feild">
                    <div id="feild_s">
                        <div id="entry_block" style="width:300px"><input type="text" name="car" id="car" style="width:300px" class="inp_neo"></div><?php printq(); ?><br>
                        <div id="query_post"><span style="font-size:11px;color:#7092BE;font-weight: bold">COMPULSORY FEILD, INFORMATIVE, SECURED</span><br>Specify the Name and Relevent information about the mode of carriage.</div>
                    </div>
                </td>
            </tr>

            <!-- 26. DISPATCH DOCUMENT NO. [name=dd] [id=dd] -->
            <tr class="entry">
                <td class="info">Dispatch Document No.<?php tagging(false, false, '1'); ?></td>
                <td class="feild">
                    <div id="feild_s">
                        <div id="entry_block" style="width:200px"><input type="text" name="dd" id="dd" style="width:200px" class="inp_neo"></div><?php printq(); ?><br>
                        <div id="query_post"><span style="font-size:11px;color:#7092BE;font-weight: bold">SECURED</span><br>Specify the Docket / Cargo No. (if available)</div>
                    </div>
                </td>
            </tr>

            <!-- 27. MODE/TERMS OF PAYMENT [name=mtp] [id=mtp] -->
            <tr class="entry">
                <td class="info">Mode / terms of Payment<?php tagging(false, false, '1'); ?></td>
                <td class="feild">
                    <div id="feild_s">
                        <div id="entry_block" style="width:200px"><input type="text" name="mtp" id="mtp" style="width:200px" class="inp_neo"></div><?php printq(); ?><br>
                        <div id="query_post"><span style="font-size:11px;color:#7092BE;font-weight: bold">SECURED</span><br>Specify the additional conditions / Requisites of Payment </div>
                    </div>
                </td>
            </tr>

            <tr style="height:50px;"></tr>
            <tr class="group" >
                <td colspan="2" style="padding:5px 20px;"><span class="group_head">3. PRODUCT DISCRIPTION : </span></td>
            </tr>
            <tr colspan="2">
                <td style="padding:0px 0px 0px 10px;">
                    <?php tagging(true, true, '1'); ?>
                </td>
            </tr>

            <!-- 27-to-47. PRODUCT DETAILS [name={pd*,qt*,rt*,dr*}] [id={pd*,qt*,rt*,dr*}] -->
            <tr class="entry">
                <td colspan="2">
                    <table class="prd" style="width: 95%;margin:20px auto;border-spacing: 0px;border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <td class="prd_head">S.no.</td>
                                <td class="prd_head">Product Details</td>
                                <td class="prd_head">Quantity</td>
                                <td class="prd_head">Rate <br>Rs/pcs</td>
                                <td class="prd_head">Duty<br>Rate %</td>
                            </tr>
                            <?php
                            for ($i = 1; $i <= 5; $i++)
                                echo('
                                            <tr colspan="2">
                                                <td class="pd_unit" style="text-align:center;" class="sno">' . $i . '</td>
                                                <td class="pd_unit"> <input type="text" name="pd' . $i . '" id="pd' . $i . '" style="width:380px" class="inp_neo pd_bar" ></td>
                                                <td class="pd_unit"> <input type="text" name="qt' . $i . '" id="qt' . $i . '" style="text-align:center;width: 70px" class="inp_neo pd_bar" ><span  class="hint" style="font-size:14px;padding: 0px 5px;">Pcs.</span></td>
                                                <td class="pd_unit"> <span class="hint" style="font-size:14px;">@ Rs. </span> <input type="text" name="rt' . $i . '" id="rt' . $i . '" style="width:50px"  class="inp_neo pd_bar" ></td>
                                                <td class="pd_unit"> <input type="text" name="dr' . $i . '" id="dr' . $i . '"  style="text-align:center;width: 50px" class="inp_neo pd_bar" ><span class="hint" style="font-size:14px; padding-right:5px;">%</span></td>
                                            </tr>');
                            ?>
                        </tbody>
                    </table>
                </td>
            </tr>

            <tr style="height:50px;"></tr>
            <tr class="group" >
                <td colspan="3" style="padding:5px 20px;"><span class="group_head">4. TAXAGE : </span>
            </tr>

            <!-- 48. CST [name=cst] [id=cst] -->
            <tr class="entry">
                <td class="info">Central Sales Tax (CST) @ <?php tagging(true, false, '1'); ?></td>
                <td class="feild">
                    <div id="feild_s">
                        <div id="entry_block" style="width:65px"><input type="text" name="cst" id="cst" style="width:40px" class="inp_neo"> % </div><?php printq(); ?><br>
                        <div id="query_post"><span style="font-size:11px;color:#7092BE;font-weight: bold">COMPULSORY FEILD, SECURED</span><br>Specify the Central Sale Tax (CST) as % of Sale through SALE INVOICE</div>
                    </div>
                </td>
            </tr>

            <!-- 49. VAT [name=vat] [id=vat] -->
            <tr class="entry">
                <td class="info">Value Added Tax (VAT) @ <?php tagging(true, false, '1'); ?></td>
                <td class="feild">
                    <div id="feild_s">
                        <div id="entry_block" style="width:65px"><input type="text" name="vat" id="vat" style="width:40px" class="inp_neo"> % </div><?php printq(); ?><br>
                        <div id="query_post"><span style="font-size:11px;color:#7092BE;font-weight: bold">COMPULSORY FEILD, SECURED</span><br>Specify the Value Added Tax (VAT) as % of Sale through TAX INVOICE</div>
                    </div>
                </td>
            </tr>

            <!-- 50. SAT [name=sat] [id=sat] -->
            <tr class="entry">
                <td class="info">Special Additional Tax (SAT) @ <?php tagging(false, false, '1'); ?></td>
                <td class="feild">
                    <div id="feild_s">
                        <div id="entry_block" style="width:65px"><input type="text" name="sat" id="sat" style="width:40px" class="inp_neo"> % </div><?php printq(); ?><br>
                        <div id="query_post"><span style="font-size:11px;color:#7092BE;font-weight: bold">SECURED</span><br>Specify the Special Additional Tax (SAT) as % of Sale </div>
                    </div>
                </td>
            </tr>

            <!-- 51. TRANSPORTATION CHARGES [name=trn] [id=trn] -->
            <tr class="entry">
                <td class="info">Transport Charges <?php tagging(true, false, '3'); ?></td>
                <td class="feild">
                    <div id="feild_s">
                        <div id="entry_block" style="width:100px">Rs. <input type="text" name="trn" id="trn" style="width:70px" class="inp_neo"></div><?php printq(); ?><br>
                        <div id="query_post"><span style="font-size:11px;color:#7092BE;font-weight: bold">COMPULSORY FEILD, PARTIALLY SECURED</span><br>Specify the Transportaion Charges on Carriage of Goods</div>
                    </div>
                </td>
            </tr>

            <tr style="height:50px;"></tr>
            <tr class="group" >
                <td colspan="2" style="padding:5px 20px;"><span class="group_head">5. DATE AND TIME STAMP : </span></td>
            </tr>

            <!-- 52.53.54.55. DATE & TIME OF ISSUING INVOICE [name={iidday,iidmnt,iidyr,iit}] [id={iidday,iidmnt,iidyr,iit}] -->
            <tr class="entry">
                <td class="info">Date and Time of Issuing invoice <?php tagging(true, true, '2'); ?></td>
                <td class="feild">
                    <div id="feild_s" style="width: 100%;float: left;">
                        <table class="local" style="float:left;width:345px;">
                            <tr>
                                <td style="width:200px;">
                                    <div style="font-size:14px;color: #aaa;margin-right: 5px;width: 40px;line-height: 26px;float: left">Date : </div><div id="entry_block" style="float:left;width:130px"><input type="text" name="iidday" id="iidday" value="<?php echo(current_date_formatted('mday')) ?>" style="width:30px;text-align: center" class="inp_neo"> . <input type="text" name="iidmnt" id="iidmnt" value="<?php echo(current_date_formatted('mon')) ?>" style="text-align: center;width:30px" class="inp_neo"> . 20<input type="text" name="iidyr" id="iidyr" value="<?php echo substr((current_date_formatted('year')), 2, 2) ?>" style="width:30px" class="inp_neo"></div>
                                </td>
                                <td style="width:10px;"></td>
                                <td style="width:130px;">
                                    <div style="font-size:14px;color: #aaa;margin-right: 5px;width: 50px;line-height: 26px;float: left">Time : </div><div id="entry_block" style="float:left;width:50px"><input type="text" name="iit" id="iit" value="16:00" style="width:50px;text-align: center" class="inp_neo"></div>
                                </td>
                            </tr>
                        </table>
                        <?php printq(); ?>
                        <div id="query_post"><span style="font-size:11px;color:#7092BE;font-weight: bold">COMPULSORY FEILD, INFORMATIVE, SECURED</span><br>Specify the Date and Time at which the Invoice is Issued. <br>Date Format : dd-mm-yyyy <br>Time Format : hh:mm (24-hrs format)</div>
                    </div>
                </td>
            </tr>

            <!-- 52.53.54.55. DATE & TIME OF REMOVING GOODS [name={rgdday,rgdmnt,rgdyr,rgt}] [id={rgdday,rgdmnt,rgdyr,rgt}] -->                            
            <tr class="entry">
                <td class="info">Date and Time of Removal Of goods <?php tagging(true, true, '2'); ?></td>
                <td class="feild">
                    <div id="feild_s" style="width: 100%;float: left;">
                        <table class="local" style="float:left;width:345px;">
                            <tr>
                                <td style="width:200px;">
                                    <div style="font-size:14px;color: #aaa;margin-right: 5px;width: 40px;line-height: 26px;float: left">Date : </div><div id="entry_block" style="float:left;width:130px"><input type="text" name="rgdday" id="rgdday" value="<?php echo(current_date_formatted('mday')) ?>" style="width:30px;text-align: center" class="inp_neo"> . <input type="text" name="rgdmnt" id="rgdmnt" value="<?php echo(current_date_formatted('mon')) ?>" style="text-align: center;width:30px" class="inp_neo"> . 20<input type="text" name="rgdyr" id="rgdyr" value="<?php echo substr((current_date_formatted('year')), 2, 2) ?>" style="width:30px" class="inp_neo"></div>
                                </td>
                                <td style="width:10px;"></td>
                                <td style="width:130px;">
                                    <div style="font-size:14px;color: #aaa;margin-right: 5px;width: 50px;line-height: 26px;float: left">Time : </div><div id="entry_block" style="float:left;width:50px"><input type="text" name="rgt" id="rgt" value="16:30" style="width:50px;text-align: center" class="inp_neo"></div>
                                </td>
                            </tr>
                        </table>
                        <?php printq(); ?>
                        <div id="query_post"><span style="font-size:11px;color:#7092BE;font-weight: bold">COMPULSORY FEILD, INFORMATIVE, NOT SECURED</span><br>Specify the Date and Time Of Removal of Goods <br>Date Format : dd-mm-yyyy <br>Time Format : hh:mm (24-hrs format)</div>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <br>
</form>
<div id="formf" class="formf" style="height: auto;padding: 10px;">
    <button id="submitButton" class="p_button p_button_c1" style="display: none;">Submit</button>
    <table id="errortable" class="error_table" ></table>
    <button id="confirmButton" class="p_button p_button_c2" style="width: 280px;">Confirm the form</button>
</div>

<script>
    $('#extCustomer').click(function() {
        $.ajax({
            url: "./inc/addressBook/render.extCustList.php",
            success: function(data) {
                $('#blackoutContent').html(data);
            }
        });
        openLightbox();
    });

    $('#submitButton').click(function() {
        var raw = $('#f').serialize();
        $.ajax({
            url: './inc/invForm/class.punchIn.php',
            type: "POST",
            data: raw,
            success: function(data) {
                var obj = $.parseJSON(data);
                if (obj.job == 1) {
                    $.ajax({
                        url: './inc/invForm/render.inizio.php',
                        type: "POST",
                        data: $.param({authentication_key: data}),
                        success: function(data) {
                            $('#blackoutContent').html(data);
                        }
                    });
                    openLightbox();
                }

            }
        });
    });

    function fillCustProfile(obj) {
        $('#custIDBox').html(obj.custID);
        $('#custDetailsBox').html(obj.name + " <br> " + obj.adline1 + " <br> " + obj.adline2 + " <br> " + obj.adline3 + " <br> " + obj.tin);
        $('#cust').val(obj.custID);
        $('#pon').val(obj.pon);
        $('#thr1').val(obj.thr1);
        $('#thr2').val(obj.thr2);
        $('#mtp').val(obj.mtop);
        $('#car').val(obj.carrier);
        if (obj.type == 'SALE INVOICE') {
            $('#vat').val(0);
            $('#sat').val(0);
            $('#cst').val(obj.cst);
        } else {
            $('#vat').val(obj.vat);
            $('#sat').val(obj.sat);
            $('#cst').val(0);
        }
        $('#trn').val(obj.trns);
        
    }
</script>