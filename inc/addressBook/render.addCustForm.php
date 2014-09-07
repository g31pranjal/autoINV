<div id="addCustomerWrapper" class="addCustomerWrapper blackoutContentWrapper">
    <div id="divneo" class="divneo" >
        <div class="statHead">ADD A NEW CUSTOMER !</div>
        <form id="addCustomerForm" class="addCustomerForm" >
            <table id="addCustomerTable" class="addCustomerTable">
                <tr>
                    <td class="addCustomerTd">
                        Party Name : <br>
                        <div id="entry_block" style="width:100%;font-weight: normal;">M/s <input type="text" name="pn" id="pn" style="width:270px" class="inp_neo"></div>
                    </td>
                </tr>
                <tr>
                    <td class="addCustomerTd">
                        Party Address : <br>
                        <div id="entry_block" style="width:100%"><input type="text" name="pa1" id="pa1" style="margin-bottom:3px;width:300px" class="inp_neo" ><br><input type="text" name="pa2" id="pa2" style="margin-bottom:3px;width:300px" class="inp_neo"><br><input type="text" name="pa3" id="pa3" style="margin-bottom:3px;width:300px" class="inp_neo"></div>
                    </td>
                </tr>
                <tr>
                    <td class="addCustomerTd">
                        Party Tin No : <br>
                        <div id="entry_block" style="width:100%"><input type="text" name="pa4" id="pa4" style="width:300px" class="inp_neo"></div>
                    </td>
                </tr>
            </table>
        </form>
        <button id="newCustSubmit">Submit</button>
    </div>
</div>

<script>
    $('#newCustSubmit').click(function() {
        var dataT = ($('#addCustomerForm').serialize());
        $.ajax({
            url: "./inc/addressBook/class.newCustEntry.php",
            data: dataT,
            success: function(data) {
                var obj = jQuery.parseJSON(data);
                var note = obj.notification;
                var job = obj.job;
                var id = obj.newID;
                closeLightbox(1);
                beepNotificationBox(job, note);
                if (job == 1) {
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
            }
        });
    });
</script>