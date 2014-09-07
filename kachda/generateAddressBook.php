
<script type="text/javascript">
    // Coding for entry_block actions

    var attempt = 0;
    $("div#entry_block").click(function() {
        if (($(this).css('border-color').substring(4, 6) == $(this).css('border-color').substring(9, 11) && $(this).css('border-color').substring(4, 6) == $(this).css('border-color').substring(14, 16)) && ($(this).css('border-color').substring(4, 6) >= '153' || $(this).css('border-left-color').substring(4, 6) <= '204')) {
            selectedStatus($(this));
        }
    });
    $("div#entry_block").mouseover(function() {
        if ($(this).css('border-left-color') == 'rgb(204, 204, 204)') {
            hoverStatus($(this));
        }
    });
    $("div#entry_block").mouseout(function() {
        if (($(this).css('border-color').substring(4, 6) == $(this).css('border-color').substring(9, 11) && $(this).css('border-color').substring(4, 6) == $(this).css('border-color').substring(14, 16)) && ($(this).css('border-color').substring(4, 6) >= '153' || $(this).css('border-left-color').substring(4, 6) <= '204')) {
            initialStatus($(this));
        }
    });
    $("div#entry_block").focusout(function() {
        conditionValidate(this);
    });
    $("div#entry_block").keyup(function() {
        conditionValidate(this);
    });

    var valid = [['u', false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, true], ['Type Of Invoice', 'Party Name', 'Party Address', 'Invoice No.', 'Invoice Date', 'Party Order No.', 'Party Order Date', 'Invoice Book No.', 'Through', 'No. Of Cases', 'Carrier', 'CST Rate', 'VAT Rate', 'SAT Rate', 'Transportation Charges', 'Issuing Invoice Date', 'Issuing Invoice Time', 'Removing Goods Date', 'Removing Goods Time'], ['Type of invoice not specified. Please select an Invoice type.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '']];

    $('#p_button').click(function() {
        oneTimeValidate();
        switchingSwitch();
        $("html, body").animate({scrollTop: $(document).height()}, 1200);
        attempt++;
    });

    function conditionValidate(thi) {
        if ($(thi).children().is("#pn"))
            validatePartyName();
        if ($(thi).children().is("#pa1") || $(this).children().is("#pa1") || $(this).children().is("#pa1"))
            validatePartyAddress();
        if ($(thi).children().is("#inv"))
            validateInvoiceNo();
        if ($(thi).children().is("#invdday") || $(this).children().is("#invdmnt") || $(this).children().is("#invdyr"))
            validateDate('#invdday', '#invdmnt', '#invdyr', 4);
        if ($(thi).children().is("#pon"))
            validatePartyOrderNo();
        if ($(thi).children().is("#podday") || $(this).children().is("#podmnt") || $(this).children().is("#podyr"))
            validateDate('#podday', '#podmnt', '#podyr', 6);
        if ($(thi).children().is("#thr1") || $(this).children().is("#thr2"))
            validateThrough();
        if ($(thi).children().is("#tib"))
            validateInvoiceBook();
        if ($(thi).children().is("#noc"))
            validateNoOfCases();
        if ($(thi).children().is("#sat"))
            validateRate('#sat', 13);
        if ($(thi).children().is("#cst"))
            validateRate('#cst', 11);
        if ($(thi).children().is("#vat"))
            validateRate('#vat', 12);
        if ($(thi).children().is("#trn"))
            validateTransportationCharge();
        if ($(thi).children().is("#iit"))
            validateTime('#iit', 16);
        if ($(thi).children().is("#rgt"))
            validateTime('#rgt', 18);
        if ($(thi).children().is("#iidday") || $(this).children().is("#iidmnt") || $(this).children().is("#iidyr"))
            validateDate('#iidday', '#iidmnt', '#iidyr', 15);
        if ($(thi).children().is("#rgdday") || $(this).children().is("#rgdmnt") || $(this).children().is("#rgdyr"))
            validateDate('#rgdday', '#rgdmnt', '#rgdyr', 17);
        if ($(thi).children().is("#car"))
            validateCarrier('#car');
        if (attempt > 0)
            oneTimeValidate();
        switchingSwitch();
    }

    function oneTimeValidate() {
        validatePartyName();
        validatePartyAddress();
        validateInvoiceNo();
        validateDate('#invdday', '#invdmnt', '#invdyr', 4);
        validatePartyOrderNo();
        validateDate('#podday', '#podmnt', '#podyr', 6);
        validateThrough();
        validateInvoiceBook();
        validateNoOfCases();
        validateRate('#sat', 13);
        validateRate('#cst', 11);
        validateRate('#vat', 12);
        validateTransportationCharge();
        validateTime('#iit', 16);
        validateTime('#rgt', 18);
        validateDate('#iidday', '#iidmnt', '#iidyr', 15);
        validateDate('#rgdday', '#rgdmnt', '#rgdyr', 17);
        validateCarrier('#car');
        var warning = "";
        for (var t = 0; t <= 18; t++) {
            if (valid[0]['0'] == 'si' && (t == 12 || t == 13))
                continue;
            if (valid[0]['0'] == 'ti' && t == 11)
                continue;
            if (valid[2][t] != '')
                warning = warning + "<tr><td style='text-align:right'> <span style='font-weight:bold;'>" + (valid[1][t]) + "&nbsp&nbsp&nbsp </span></td><td>&nbsp&nbsp&nbsp" + (valid[2][t]) + '</td></tr>'
            $('#p_button').css('display', 'none');
            $('#errortable').replaceWith('<table border="1" id="errortable" class="errortable"> <tr><td colspan="2" style="text-align:center;text-transform: uppercase;text-decoration: underline;font-size:10px;">Errors have been sited in the form and must be corrected before proceeding further :</td></tr><tr><td></td><td><br></td></tr>' + warning + "</div>");
            $('#errortable').fadeIn(10);

        }
    }

    function switchingSwitch() {
        var snap = 0;
        for (var t = 1; t <= 18; t++) {
            if (valid[0]['0'] == 'si' && (t == 12 || t == 13))
                continue;
            if (valid[0]['0'] == 'ti' && t == 11)
                continue;
            if (!(valid[0][0] == 'si' || valid[0][0] == 'ti') || valid[0]  [t] != true) {
                snap++;
                break;
            }
        }
        if (snap == 0) {
            $('#p_button').css('display', 'none');
            $('#errortable').css('display', 'none');
            ;
            $('#sb').fadeIn(10);
        }
        else {
            $('#sb').css('display', 'none');
            $('#p_button').fadeIn(10);
        }
    }


</script>

<script type="text/javascript">
    function type_alter() {
        var invoice_type = $("input:radio[checked]").val();
        if (invoice_type == 'ti') {
            $('#vat').parent().parent().parent().parent().fadeIn(10);
            $('#sat').parent().parent().parent().parent().fadeIn(10);
            $('#cst').parent().parent().parent().parent().hide();
            $('#cst').val('');
            valid[0][0] = 'ti';
            valid[2][0] = "";
            if (parseInt((parseInt($('#last_t').val()) + 1) / 10) == 0)
                $('#inv').val("00".concat((parseInt($('#last_t').val()) + 1)));
            else if (parseInt((parseInt($('#last_t').val()) + 1) / 100) == 0)
                $('#inv').val("0".concat((parseInt($('#last_t').val()) + 1)));
            else if (parseInt((parseInt($('#last_t').val()) + 1) / 1000) == 0)
                $('#inv').val((parseInt($('#last_t').val()) + 1));

            $('#tib').val(1 + parseInt((parseInt($('#last_t').val()) + 1) / 50));

        }
        else if (invoice_type == 'si') {
            $('#vat').parent().parent().parent().parent().hide();
            $('#vat').val('');
            $('#sat').parent().parent().parent().parent().hide();
            $('#sat').val('');
            $('#cst').parent().parent().parent().parent().fadeIn(10);
            valid[0][0] = 'si';
            valid[2][0] = "";
            if (parseInt((parseInt($('#last_s').val()) + 1) / 10) == 0)
                $('#inv').val("00".concat((parseInt($('#last_s').val()) + 1)));
            else if (parseInt((parseInt($('#last_s').val()) + 1) / 100) == 0)
                $('#inv').val("0".concat((parseInt($('#last_s').val()) + 1)));
            else if (parseInt((parseInt($('#last_s').val()) + 1) / 1000) == 0)
                $('#inv').val((parseInt($('#last_s').val()) + 1));

            $('#tib').val(1 + parseInt((parseInt($('#last_s').val()) + 1) / 50));

        }
    }


    $(document).ready(function() {
        if ($('#redirect_inf').val() == 'y' && $('#redirect_src').val() == 'adr_book') {
            type_alter();
            validatePartyName();
            validatePartyAddress();
            validatePartyOrderNo();
            validateDate('#podday', '#podmnt', '#podyr', 6);
            validateThrough();
            validateRate('#sat', 13);
            validateRate('#cst', 11);
            validateRate('#vat', 12);
            validateTransportationCharge();
            validateCarrier('#car');
            validateInvoiceNo();
            validateInvoiceBook();
        }

    });

    // Validating Functions
    $("input:radio[id=type]").click(function() {
        type_alter();
        validateInvoiceNo();
        validateInvoiceBook();

        if (attempt > 0)
            conditionValidate();
    });
    function validatePartyName() {
        var value = $('#pn').val();
        if (value == "") {
            wrongStatus($('#pn').parent('div#entry_block'));
            valid[0][1] = false;
            valid[2][1] = "Party Name could not be left empty.";
        }
        else if (value.indexOf("Mr. ") >= 0 || value.indexOf("M/s ") >= 0) {
            wrongStatus($('#pn').parent('div#entry_block'));
            valid[0][1] = false;
            valid[2][1] = "No salutations allowed before the Party Name.";
        }
        else {
            correctStatus($('#pn').parent('div#entry_block'));
            valid[0][1] = true;
            valid[2][1] = "";
        }
    }
    function validatePartyAddress() {
        if ($('#pa1').val() == "") {
            wrongStatus($('#pa1').parent('div#entry_block'));
            valid[0][2] = false;
            valid[2][2] = "Party Address could not be left empty.";
        }
        else if ($('#pa2').val() == "" && $('#pa3').val() != "") {
            wrongStatus($('#pa1').parent('div#entry_block'));
            valid[0][2] = false;
            valid[2][2] = "The Party Address Line 2 cannot be left empty.";
        }
        else {
            correctStatus($('#pa1').parent('div#entry_block'));
            valid[0][2] = true;
            valid[2][2] = "";
        }
    }
    function validateInvoiceNo() {
        var inv = $('#inv').val();
        var reg_i = /^([0-9]{3})$/;
        if (!(reg_i.test(inv))) {
            wrongStatus($('#inv').parent('div#entry_block'));
            valid[0][3] = false;
            valid[2][3] = "Invalid format of the Invoice No.";
        }
        else {
            correctStatus($('#inv').parent('div#entry_block'));
            valid[0][3] = true;
            valid[2][3] = "";
        }
    }
    function validatePartyOrderNo() {
        if ($('#pon').val() == "") {
            wrongStatus($('#pon').parent('div#entry_block'));
            valid[0][5] = false;
            valid[2][5] = "Party Order No. could not be left empty.";
        }
        else {
            correctStatus($('#pon').parent('div#entry_block'));
            valid[0][5] = true;
            valid[2][5] = "";
        }
    }
    function validateDate(r_day, r_mnt, r_yr, key1) {
        var day = $(r_day).val();
        var mnt = $(r_mnt).val();
        var yr = $(r_yr).val();
        var reg_d = /^(0?[1-9]|1[0-9]|2[0-9]|3[0-1])$/;
        var reg_m = /^(0?[1-9]|1[0-2])$/;
        var reg_y = /^([1-9][0-9])$/;
        if (!(reg_d.test(day))) {
            wrongStatus($(r_day).parent('div#entry_block'));
            valid[0][key1] = false;
            valid[2][key1] = "The Day is not valid.";
        }
        else if (!(reg_m.test(mnt))) {
            wrongStatus($(r_mnt).parent('div#entry_block'));
            valid[0][key1] = false;
            valid[2][key1] = "The Month is not valid.";
        }
        else if (!(reg_y.test(yr))) {
            wrongStatus($(r_yr).parent('div#entry_block'));
            valid[0][key1] = false;
            valid[2][key1] = "The Year is not valid.";
        }
        else {
            correctStatus($(r_day).parent('div#entry_block'));
            valid[0][key1] = true;
            valid[2][key1] = "";
        }
    }
    function validateTime(r_time, key3) {
        var time = $(r_time).val();
        var reg_t = /^(([0-1][0-9])|(2[0-3]))[:]([0-5][0-9])$/;
        if (!(reg_t.test(time))) {
            wrongStatus($(r_time).parent('div#entry_block'));
            valid[0][key3] = false;
            valid[2][key3] = "The time is invalid .";
        }
        else {
            correctStatus($(r_time).parent('div#entry_block'));
            valid[0][key3] = true;
            valid[2][key3] = "";
        }
    }
    function validateInvoiceBook() {
        var tib = $('#tib').val();
        var reg_t = /^([1-9][1-9]*)$/;
        if (!(reg_t.test(tib))) {
            wrongStatus($('#tib').parent('div#entry_block'));
            valid[0][7] = false;
            valid[2][7] = "The Invoice book number is invalid.";
        }
        else {
            correctStatus($('#tib').parent('div#entry_block'));
            valid[0][7] = true;
            valid[2][7] = "";
        }
    }

    function validateThrough() {
        if ($('#thr1').val() == "") {
            wrongStatus($('#thr1').parent('div#entry_block'));
            valid[0][8] = false;
            valid[2][8] = "Through field cannot be left empty.";
        }
        else {
            correctStatus($('#thr1').parent('div#entry_block'));
            valid[0][8] = true;
            valid[2][8] = "";
        }
    }
    function validateNoOfCases() {
        var noc = $('#noc').val();
        var reg_n = /^([1-9][0-9]?)$/;
        if (!(reg_n.test(noc))) {
            wrongStatus($('#noc').parent('div#entry_block'));
            valid[0][9] = false;
            valid[2][9] = "The feild is invalid";
        }
        else {
            correctStatus($('#noc').parent('div#entry_block'));
            valid[0][9] = true;
            valid[2][9] = "";
        }
    }
    function validateCarrier() {
        if ($('#car').val() == "") {
            wrongStatus($('#car').parent('div#entry_block'));
            valid[0][10] = false;
            valid[2][10] = "The field cannot be left empty.";
        }
        else if (!((/^[A-z][A-z ]*[\x20\x28\x29\x2C\x2E\x5B\x5D\x7B\x7D\x26\x2F]*$/).test($('#car').val()))) {
            wrongStatus($('#car').parent('div#entry_block'));
            valid[0][10] = false;
            valid[2][10] = "Invalid characters in the field.";
        }
        else {
            correctStatus($('#car').parent('div#entry_block'));
            valid[0][10] = true;
            valid[2][10] = "";
        }
    }
    function validateRate(val, key2) {
        var x = $(val).val();
        var reg = /^([1-9]?[0-9]|[1-9]?[0-9][.][0-9][0-9]?)$/;
        if (!(reg.test(x))) {
            wrongStatus($(val).parent('div#entry_block'));
            valid[0][key2] = false;
            valid[2][key2] = "The entered rate is invalid.";
        }
        else {
            correctStatus($(val).parent('div#entry_block'));
            valid[0][key2] = true;
            valid[2][key2] = "";
        }
    }
    function validateTransportationCharge() {
        var x = $('#trn').val();
        var reg = /^([1-9][0-9]*|[1-9][0-9]*[.][0-9][0-9]?|0|0.0|0.00)$/;
        if (!(reg.test(x))) {
            wrongStatus($('#trn').parent('div#entry_block'));
            valid[0][14] = false;
            valid[2][14] = "The field is invalid.";
        }
        else {
            correctStatus($('#trn').parent('div#entry_block'));
            valid[0][14] = true;
            valid[2][14] = "";
        }
    }
    function validatePrdList() {

    }
</script>

<script type="text/javascript">
    // Coding for Help and Query Box
    $("img.q").mouseover(function() {
        $(this).css('-webkit-opacity', '1.0');
    });
    $("img.q").mouseout(function() {
        $(this).css('-webkit-opacity', '0.5');
    });
    $("img.q").click(function() {
        if ($(this).parent().children("div#query_post").css('display') == 'none')
            $(this).parent().children("div#query_post").slideDown(200);
        else
            $(this).parent().children("div#query_post").slideUp(200);
    });
    $('tr.entry').mouseover(function() {
        $(this).children("td.feild").children("div#feild_s").children("img.q").show();
    });
    $('tr.entry').mouseout(function() {
        $(this).children("td.feild").children("div#feild_s").children("img.q").hide();
    });
</script>

<script type="text/javascript">
    //Status 

    function initialStatus(trial) {
        trial.css('border', '1px solid rgb(204, 204, 204)');
        trial.css('border-left', '5px solid rgb(204, 204, 204)');
        trial.css('-webkit-box-shadow', '0px 0px 0px #fff');
        trial.css('background', 'rgb(255,255,255)');
    }
    function hoverStatus(trial) {
        trial.css('border', '1px solid rgb(153, 153, 153)');
        trial.css('border-left', '5px solid rgb(153, 153, 153)');
        trial.css('-webkit-box-shadow', '0px 0px 20px #ccc');
        trial.css('background', 'rgb(255,255,255)');
    }
    function selectedStatus(trial) {
        trial.css('border', '1px solid  #09f');
        trial.css('border-left', '5px solid  #09f');
        trial.css('-webkit-box-shadow', '0px 0px 1px #fff');
        trial.css('background', 'rgb(255,255,255)');
    }
    function correctStatus(trial) {
        trial.css('border', '1px solid #5dc23e');
        trial.css('border-left', '5px solid #5dc23e');
        trial.css('background', '#f5fff2');
        trial.css('-webkit-box-shadow', '0px 0px 1px #fff');
    }
    function wrongStatus(trial) {
        trial.css('border', '1px solid #e01234');
        trial.css('border-left', '5px solid #e01234');
        trial.css('background', '#fff0f0');
        trial.css('-webkit-box-shadow', '0px 0px 1px #fff');
    }
</script>