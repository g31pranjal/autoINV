var attempt = 0;

var obj = {
    type: {status: 0, error: "Not selected", opt : "u"},
    cust: {status: 0, error: ""},
    inv: {status: 0, error: ""},
    invd: {status: 0, error: ""},
    pon: {status: 0, error: ""},
    pod: {status: 0, error: ""},
    invb: {status: 0, error: ""},
    thr: {status: 0, error: ""},
    noc: {status: 0, error: ""},
    car: {status: 0, error: ""},
    cst: {status: 0, error: ""},
    vat: {status: 0, error: ""},
    sat: {status: 0, error: ""},
    trn: {status: 0, error: ""},
    iid: {status: 0, error: ""},
    iit: {status: 0, error: ""},
    rgd: {status: 0, error: ""},
    rgt: {status: 0, error: ""},
};

var flag = 0;















































$(document).ready(function() {

    /* Automatic validation in case of being redirected from the Address Book page */
    if ($('#redirect_inf').val() == 'y' && $('#redirect_src').val() == 'adr_book') {
        type_alter();
        //validatePartyName();
        //validatePartyAddress();
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












    $("div#entry_block").click(function() {
        if (($(this).css('border-color').substring(4, 6) == $(this).css('border-color').substring(9, 11) && $(this).css('border-color').substring(4, 6) == $(this).css('border-color').substring(14, 16)) && ($(this).css('border-color').substring(4, 6) >= '153' || $(this).css('border-left-color').substring(4, 6) <= '204')) {
            //Condition when the block is untouched i.e. grey colr
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
























    $('#confirmButton').click(function() {
        oneTimeValidate();
        switchingSwitch();
        $("html, body").animate({scrollTop: $(document).height()}, 1200);
        attempt++;
    });





    $("input:radio[id=type]").click(function() {
        type_alter();
        validateInvoiceNo();
        validateInvoiceBook();

        if (attempt > 0)
            conditionValidate();
    });











    /* Displaying field Help */
    $('tr.entry').mouseover(function() {
        $(this).children("td.feild").children("div#feild_s").children("img.q").show();
    });
    $('tr.entry').mouseout(function() {
        $(this).children("td.feild").children("div#feild_s").children("img.q").hide();
    });
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

});






























function conditionValidate(thi) {
    if ($(thi).children().is("#inv"))
        validateInvoiceNo();
    if ($(thi).children().is("#invdday") || $(this).children().is("#invdmnt") || $(this).children().is("#invdyr"))
        validateInvoiceDate();
    if ($(thi).children().is("#pon"))
        validatePartyOrderNo();
    if ($(thi).children().is("#podday") || $(this).children().is("#podmnt") || $(this).children().is("#podyr"))
        validatePartyOrderDate();
    if ($(thi).children().is("#thr1") || $(this).children().is("#thr2"))
        validateThrough();
    if ($(thi).children().is("#tib"))
        validateInvoiceBook();
    if ($(thi).children().is("#noc"))
        validateNoOfCases();
    if ($(thi).children().is("#sat"))
        validateSAT();
    if ($(thi).children().is("#cst"))
        validateCST();
    if ($(thi).children().is("#vat"))
        validateVAT();
    if ($(thi).children().is("#trn"))
        validateTransportationCharge();
    if ($(thi).children().is("#iit"))
        validateIssuingInvoiceTime();
    if ($(thi).children().is("#rgt"))
        validateRemovingGoodsTime();
    if ($(thi).children().is("#iidday") || $(this).children().is("#iidmnt") || $(this).children().is("#iidyr"))
        validateIssuingInvoiceDate();
    if ($(thi).children().is("#rgdday") || $(this).children().is("#rgdmnt") || $(this).children().is("#rgdyr"))
        validateRemovingGoodsDate();
    if ($(thi).children().is("#car"))
        validateCarrier();
    if (attempt > 0)
        oneTimeValidate();
    switchingSwitch();
}





















function oneTimeValidate() {
    validateCust();
    validateInvoiceNo();
    validateInvoiceDate();
    validatePartyOrderNo();
    validatePartyOrderDate();
    validateThrough();
    validateInvoiceBook();
    validateNoOfCases();
    validateSAT();
    validateCST();
    validateVAT();
    validateTransportationCharge();
    validateIssuingInvoiceTime();
    validateIssuingInvoiceDate();
    validateRemovingGoodsDate();
    validateRemovingGoodsTime();
    validateCarrier();
    
}





























function fireWarning() {
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
        if (!(valid[0][0] == 'si' || valid[0][0] == 'ti') || valid[0][t] != true) {
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




















function type_alter() {
    var invoice_type = $("input:radio[checked]").val();
    if (invoice_type == 'ti') {
        $('#vat').parent().parent().parent().parent().fadeIn(10);
        $('#sat').parent().parent().parent().parent().fadeIn(10);
        $('#cst').parent().parent().parent().parent().hide();
        $('#cst').val('');
        obj.type.opt = 'ti';
        obj.type.error = "";
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
        obj.type.opt = 'si';
        obj.type.error = "";
        if (parseInt((parseInt($('#last_s').val()) + 1) / 10) == 0)
            $('#inv').val("00".concat((parseInt($('#last_s').val()) + 1)));
        else if (parseInt((parseInt($('#last_s').val()) + 1) / 100) == 0)
            $('#inv').val("0".concat((parseInt($('#last_s').val()) + 1)));
        else if (parseInt((parseInt($('#last_s').val()) + 1) / 1000) == 0)
            $('#inv').val((parseInt($('#last_s').val()) + 1));

        $('#tib').val(1 + parseInt((parseInt($('#last_s').val()) + 1) / 50));

    }
}



















































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




































































function validateCust() {
    var c = $('#cust').val();
    var reg_i = /^(A[0-9]{3})$/;
    if (!(reg_i.test(c))) {
        obj.cust.status = 0;
        obj.cust.error = "Please select a customer";
    }
    else {
        obj.cust.status = 1;
        obj.cust.error = "";
    }
}

function validateInvoiceNo() {
    var inv = $('#inv').val();
    var reg_i = /^([0-9]{3})$/;
    if (!(reg_i.test(inv))) {
        wrongStatus($('#inv').parent('div#entry_block'));
        obj.inv.status = 0;
        obj.inv.error = "Invalid invoice number";
    }
    else {
        correctStatus($('#inv').parent('div#entry_block'));
        obj.inv.status = 1;
        obj.inv.error = "";
    }
}

function validateInvoiceDate() {
    var reg_d = /^(0?[1-9]|1[0-9]|2[0-9]|3[0-1])$/;
    var reg_m = /^(0?[1-9]|1[0-2])$/;
    var reg_y = /^([1-9][0-9])$/;
    if (!(reg_d.test($('#invdday').val()))) {
        wrongStatus($('#invdday').parent('div#entry_block'));
        obj.invd.status = 0;
        obj.invd.error = "The Day is not valid.";
    }
    else if (!(reg_m.test($('#invdmnt').val()))) {
        wrongStatus($('#invdmnt').parent('div#entry_block'));
        obj.invd.status = 0;
        obj.invd.error = "The Month is not valid.";
    }
    else if (!(reg_y.test($('#invdyr').val()))) {
        wrongStatus($('#invdyr').parent('div#entry_block'));
        obj.invd.status = 0;
        obj.invd.error = "The Year is not valid.";
    }
    else {
        correctStatus($('#invdday').parent('div#entry_block'));
        obj.invd.status = 1;
        obj.invd.error = "";
    }
}

function validatePartyOrderNo() {
    if ($('#pon').val() == "") {
        wrongStatus($('#pon').parent('div#entry_block'));
        obj.pon.status = 0;
        obj.pon.error = "Party Order No. could not be left empty.";
    }
    else {
        correctStatus($('#pon').parent('div#entry_block'));
        obj.pon.status = 1;
        obj.pon.error = "";
    }
}

function validatePartyOrderDate() {
    var reg_d = /^(0?[1-9]|1[0-9]|2[0-9]|3[0-1])$/;
    var reg_m = /^(0?[1-9]|1[0-2])$/;
    var reg_y = /^([1-9][0-9])$/;
    if (!(reg_d.test($('#podday').val()))) {
        wrongStatus($('#podday').parent('div#entry_block'));
        obj.pod.status = 0;
        obj.pod.error = "The Day is not valid.";
    }
    else if (!(reg_m.test($('#podmnt').val()))) {
        wrongStatus($('#podmnt').parent('div#entry_block'));
        obj.pod.status = 0;
        obj.pod.error = "The Month is not valid.";
    }
    else if (!(reg_y.test($('#podyr').val()))) {
        wrongStatus($('#podyr').parent('div#entry_block'));
        obj.pod.status = 0;
        obj.pod.error = "The Year is not valid.";
    }
    else {
        correctStatus($('#podday').parent('div#entry_block'));
        obj.pod.status = 1;
        obj.pod.error = "";
    }
}

function validateInvoiceBook() {
    var tib = $('#tib').val();
    var reg_t = /^([1-9][1-9]*)$/;
    if (!(reg_t.test(tib))) {
        wrongStatus($('#tib').parent('div#entry_block'));
        obj.invb.status = 0;
        obj.invb.error = "The Invoice book number is invalid.";
    }
    else {
        correctStatus($('#tib').parent('div#entry_block'));
        obj.invb.status = 1;
        obj.invb.error = "";
    }
}

function validateThrough() {
    if ($('#thr1').val() == "") {
        wrongStatus($('#thr1').parent('div#entry_block'));
        obj.thr.status = 0;
        obj.thr.error = "Through field cannot be left empty.";
    }
    else {
        correctStatus($('#thr1').parent('div#entry_block'));
        obj.thr.status = 1;
        obj.thr.error = "";
    }
}

function validateNoOfCases() {
    var noc = $('#noc').val();
    var reg_n = /^([1-9][0-9]?)$/;
    if (!(reg_n.test(noc))) {
        wrongStatus($('#noc').parent('div#entry_block'));
        obj.noc.status = 0;
        obj.noc.error = "The feild is invalid";
    }
    else {
        correctStatus($('#noc').parent('div#entry_block'));
        obj.noc.status = 1;
        obj.noc.error = "";
    }
}

function validateCarrier() {
    if ($('#car').val() == "") {
        wrongStatus($('#car').parent('div#entry_block'));
        obj.car.status = 0;
        obj.car.error = "The field cannot be left empty.";
    }
    else if (!((/^[A-z][A-z ]*[\x20\x28\x29\x2C\x2E\x5B\x5D\x7B\x7D\x26\x2F]*$/).test($('#car').val()))) {
        wrongStatus($('#car').parent('div#entry_block'));
        obj.car.status = 0;
        obj.car.error = "Invalid characters in the field.";
    }
    else {
        correctStatus($('#car').parent('div#entry_block'));
        obj.car.status = 1;
        obj.car.error = "";
    }
}

function validateVAT() {
    var x = $('#vat').val();
    var reg = /^([1-9]?[0-9]|[1-9]?[0-9][.][0-9][0-9]?)$/;
    if (!(reg.test(x))) {
        wrongStatus($('#vat').parent('div#entry_block'));
        obj.vat.status = 0;
        obj.vat.error = "The entered rate is invalid.";
    }
    else {
        correctStatus($('#vat').parent('div#entry_block'));
        obj.vat.status = 1;
        obj.vat.error = "";
    }
}

function validateSAT() {
    var x = $('#sat').val();
    var reg = /^([1-9]?[0-9]|[1-9]?[0-9][.][0-9][0-9]?)$/;
    if (!(reg.test(x))) {
        wrongStatus($('#sat').parent('div#entry_block'));
        obj.sat.status = 0;
        obj.sat.error = "The entered rate is invalid.";
    }
    else {
        correctStatus($('#sat').parent('div#entry_block'));
        obj.sat.status = 1;
        obj.sat.error = "";
    }
}

function validateCST() {
    var x = $('#cst').val();
    var reg = /^([1-9]?[0-9]|[1-9]?[0-9][.][0-9][0-9]?)$/;
    if (!(reg.test(x))) {
        wrongStatus($('#cst').parent('div#entry_block'));
        obj.cst.status = 0;
        obj.cst.error = "The entered rate is invalid.";
    }
    else {
        correctStatus($('#cst').parent('div#entry_block'));
        obj.cst.status = 1;
        obj.cst.error = "";
    }
}

function validateTransportationCharge() {
    var x = $('#trn').val();
    var reg = /^([1-9][0-9]*|[1-9][0-9]*[.][0-9][0-9]?|0|0.0|0.00)$/;
    if (!(reg.test(x))) {
        wrongStatus($('#trn').parent('div#entry_block'));
        obj.trn.status = 0;
        obj.trn.error = "The field is invalid.";
    }
    else {
        correctStatus($('#trn').parent('div#entry_block'));
        obj.trn.status = 1;
        obj.trn.error = "";
    }
}

function validateIssuingInvoiceDate() {
    var reg_d = /^(0?[1-9]|1[0-9]|2[0-9]|3[0-1])$/;
    var reg_m = /^(0?[1-9]|1[0-2])$/;
    var reg_y = /^([1-9][0-9])$/;
    if (!(reg_d.test($('#iidday').val()))) {
        wrongStatus($('#iidday').parent('div#entry_block'));
        obj.iid.status = 0;
        obj.iid.error = "The Day is not valid.";
    }
    else if (!(reg_m.test($('#iidmnt').val()))) {
        wrongStatus($('#iidmnt').parent('div#entry_block'));
        obj.iid.status = 0;
        obj.iid.error = "The Month is not valid.";
    }
    else if (!(reg_y.test($('#iidyr').val()))) {
        wrongStatus($('#iidyr').parent('div#entry_block'));
        obj.iid.status = 0;
        obj.iid.error = "The Year is not valid.";
    }
    else {
        correctStatus($('#iidday').parent('div#entry_block'));
        obj.iid.status = 1;
        obj.iid.error = "";
    }
}

function validateIssuingInvoiceTime() {
    var time = $('#iit').val();
    var reg_t = /^(([0-1][0-9])|(2[0-3]))[:]([0-5][0-9])$/;
    if (!(reg_t.test(time))) {
        wrongStatus($('#iit').parent('div#entry_block'));
        obj.iit.status = 0;
        obj.iit.error = "The time is invalid .";
    }
    else {
        correctStatus($('#iit').parent('div#entry_block'));
        obj.iit.status = 1;
        obj.iit.error = "";
    }
}

function validateRemovingGoodsDate() {
    var reg_d = /^(0?[1-9]|1[0-9]|2[0-9]|3[0-1])$/;
    var reg_m = /^(0?[1-9]|1[0-2])$/;
    var reg_y = /^([1-9][0-9])$/;
    if (!(reg_d.test($('#rgdday').val()))) {
        wrongStatus($('#rgdday').parent('div#entry_block'));
        obj.rgd.status = 0;
        obj.rgd.error = "The Day is not valid.";
    }
    else if (!(reg_m.test($('#rgdmnt').val()))) {
        wrongStatus($('#rgdmnt').parent('div#entry_block'));
        obj.rgd.status = 0;
        obj.rgd.error = "The Month is not valid.";
    }
    else if (!(reg_y.test($('#rgdyr').val()))) {
        wrongStatus($('#rgdyr').parent('div#entry_block'));
        obj.rgd.status = 0;
        obj.rgd.error = "The Year is not valid.";
    }
    else {
        correctStatus($('#rgdday').parent('div#entry_block'));
        obj.rgd.status = 1;
        obj.rgd.error = "";
    }
}

function validateRemovingGoodsTime() {
    var time = $('#rgt').val();
    var reg_t = /^(([0-1][0-9])|(2[0-3]))[:]([0-5][0-9])$/;
    if (!(reg_t.test(time))) {
        wrongStatus($('#rgt').parent('div#entry_block'));
        obj.rgt.status = 0;
        obj.rgt.error = "The time is invalid .";
    }
    else {
        correctStatus($('#rgt').parent('div#entry_block'));
        obj.rgt.status = 1;
        obj.rgt.error = "";
    }
}

