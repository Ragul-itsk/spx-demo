$(document).ready(function () {


    function displayError(element, errorMessage) {
        element
            .html(errorMessage)
            .css("display", "block")
            .delay(3000)
            .fadeOut(700);
    }


    $(document).on('change', '.deposit_admin', function () {
        console.log("inside deposit_admin");

        var selectedValue = $(this).val();
        var rowId = $(this).closest('tr').data('id');
        var platformId = $(this).closest('tr').data('platformid');
        var platformName = $(this).closest('tr').data('platformname');
        var playerName = $(this).closest('tr').data('playername');
        // var selectElement = $('.deposit_admin');
        // selectElement.val('Pending');
        var selectElement = $("tr[data-id='" + rowId +
            "'] .deposit_admin");

        selectElement.val('Pending');

        if (selectedValue == "Verified") {
            $.ajax({
                type: "POST",
                url: checkPlatformDetailExist,
                data: {
                    selectedValue: selectedValue,
                    userid: rowId,
                    platformId: platformId
                },
                success: function (response) {
                    // Handle the response if needed
                    response = response[0];
                    var single_platform_detail = response.platformDetail;
                    if (single_platform_detail.platform_username != null) {

                        console.log("existing user");
                        $('#adminExistVerifyModal' + rowId).modal('show');
                        return false;

                    } else {
                        console.log("new User");
                        console.log("Single Platformdetails username equal to null");
                        $('#deposit_id').val(rowId);
                        $('#platform_id').val(platformId);
                        console.log(platformName);
                        $('#platform').val(platformName);
                        $('#modal_playername').val(playerName);
                        $('#user-id').val("").prop('readonly', false);
                        $('#user-password').val("").prop('readonly', false);
                        $('#adminNewVerifyModal' + rowId).modal('show');
                        return false;

                    }
                },
                error: function (xhr) {
                    // Handle the error if needed
                    console.log(xhr.responseText);
                }
            });
        } else if (selectedValue == "Rejected") {
            console.log(rowId);
            $('#rejectModal' + rowId).modal('show');
        }
    });

    $(document).on('click', '#submit_platform_details', function () {

        var modalId = $(this).closest('.modal').attr('id');
        var deposit_amount = $('#' + modalId + ' #current_deposit_amount').html();
        var verify_amount = $('#' + modalId + ' #confirm_total_deposit_amount').val();
        var remark = $('#' + modalId + ' #deposit_admin_remarks').val();
        var bonus = $('#' + modalId + ' #bonus-editor').val();
        var total_deposit_amount = $('#' + modalId + ' #total_deposit_amount').html();
        var userId = $('#' + modalId + ' #user-id').val();
        
        var userPassword = $('#' + modalId + ' #user-password').val();
        var platformId = $('#' + modalId + ' #new_platform_id').val();
        console.log(platformId);

        if (userId.trim() === '') {
            displayError($('#' + modalId + ' #user-id-error'), "The User Id field is required");
            return false;
        }
        if (userPassword.trim() === '') {
            displayError($('#' + modalId + ' #user-password-error'), "The User Password field is required");
            return false;
        }

        if(bonus == ""){
            displayError($('#' + modalId + ' #existing_deposit_modal_error'), "Need to Fill the required(*) fields");
            return false;
        }

        if (isNaN(bonus) || Number(bonus) < 0) {
            displayError($('#' + modalId + ' #existing_deposit_modal_error'), "Bonus should be a non-negative number");
            return false;
        }
        if (verify_amount == "") {
            displayError($('#' + modalId + ' #existing_deposit_modal_error'), "Need to Fill the required(*) fields");
            return false;
        }
        if (deposit_amount == verify_amount) {
            console.log("amount Equal");
        } else {
            displayError($('#' + modalId + ' #existing_deposit_modal_error'), "Amount Is Not Equal");
            return false;
        }
        var selectedValue = "Verified";
        // var rowId = $(this).closest('tr').data('id');
        var rowId = $('#' + modalId + ' #new_deposit_id').val();
        console.log(userId);
        console.log(userPassword);
        var type = "deposit_admin";
        var deposit_type = "New Deposit";
        console.log(selectedValue);
        console.log(rowId);
        // var test = "sample";
        $.ajax({
            type: "POST",
            url: adminStatus,
            data: {
                selectedValue: selectedValue,
                userid: rowId,
                type: type,
                platform_id: platformId,
                deposit_type: deposit_type,
                userId: userId,
                userPassword: userPassword,
                remark: remark,
                bonus: bonus,
                total_deposit_amount: total_deposit_amount
            },
            success: function (response) {
                // Display success message in the modal footer
                response = response[0];
                if (response.flag == 1) {
                    displayError($("#success-message"),
                        "Data Saved successfully");
                    var selectElement = $("tr[data-id='" + rowId +
                        "'] .deposit_admin");

                    selectElement.val('Verified');

                    // Close the modal after a brief delay (e.g., 2 seconds)
                    setTimeout(function () {
                        $('#adminNewVerifyModal' + rowId).modal('hide');
                    }, 2000);
                }

            },
            error: function (xhr) {
                // Handle the error if needed
                console.log(xhr.responseText);
            }
        });
    });
    $(document).on('change', '.bonus_eligibility', function () {

        var modalId = $(this).closest('.modal').attr('id');

        // Check if the checkbox is checked or not
        var deposit_amount = $('#' + modalId + ' #deposit_amount').html();
        var total_deposit_amount = $('#' + modalId + ' #total_deposit_amount').html();
        if ($(this).is(':checked')) {
            var roundedNumber = Math.round(total_deposit_amount);

            $('#' + modalId + ' #current_deposit_amount').html(roundedNumber);
            // Checkbox is checked
            console.log('checked');
        } else {
            $('#' + modalId + ' #current_deposit_amount').html(deposit_amount);

            console.log('unchecked');

            // Checkbox is unchecked
            // alert('Checkbox is unchecked');
        }
    });

    $(document).on('input', '.bonus-editor', function () {

        var modalId = $(this).closest('.modal').attr('id');
        console.log(modalId);
        console.log("deposit Amount");
        var deposit_amount = parseInt($('#' + modalId + ' #deposit_amount').html());
        console.log(deposit_amount);
        var bonus_value = $('#' + modalId + ' #bonus-editor').val();
        console.log(bonus_value);

        var bonus_sum = ( deposit_amount * bonus_value) / 100;
        var round_bonus_sum = Math.round(bonus_sum);
        console.log(round_bonus_sum);
        var total_bonus_sum = round_bonus_sum + deposit_amount;
        console.log(bonus_sum);
        console.log(total_bonus_sum);
        $('#' + modalId + ' #total_deposit_amount').html(total_bonus_sum);
        if($('#' + modalId + ' #bonus_eligibility').is(':checked')){
           $('#' + modalId + ' #current_deposit_amount').html(total_bonus_sum); 
        }
        


    });
    // var depositAmount = parseFloat($("#current_deposit_amount").text());
    // var roundedNumber = Math.round(depositAmount);
    // $("#current_deposit_amount").text(roundedNumber);
    $(document).on('click', '.confirm_admin_verify', function () {

        console.log("inside confirm_admin_verify");
        var modalId = $(this).closest('.modal').attr('id');
        var deposit_amount = $('#' + modalId + ' #current_deposit_amount').html();
        var verify_amount = $('#' + modalId + ' #confirm_total_deposit_amount').val();
        var remark = $('#' + modalId + ' #deposit_admin_remarks').val();
        var bonus = $('#' + modalId + ' #bonus-editor').val();
        var total_deposit_amount = $('#' + modalId + ' #total_deposit_amount').html();
        if(bonus == ""){
            displayError($('#' + modalId + ' #existing_deposit_modal_error'), "Need to Fill the required(*) fields");
            return false;
        }

        if (isNaN(bonus) || Number(bonus) < 0) {
            displayError($('#' + modalId + ' #existing_deposit_modal_error'), "Bonus should be a non-negative number");
            return false;
        }
        if (verify_amount == "") {
            displayError($('#' + modalId + ' #existing_deposit_modal_error'), "Need to Fill the required(*) fields");
            return false;
        }
        if (deposit_amount == verify_amount) {
            console.log("amount Equal");
        } else {
            displayError($('#' + modalId + ' #existing_deposit_modal_error'), "Amount Is Not Equal");
            return false;
        }
        console.log(modalId);
        var selectedValue = "Verified";
        var rowId = $('#' + modalId + ' #new_deposit_id').val();
        console.log(rowId);
        var platformId = $('#' + modalId + ' #new_platform_id').val();
        var type = "deposit_admin";
        var deposit_type = "Existing";
        // var test = "sample";
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: adminStatus,
            data: {
                selectedValue: selectedValue,
                userid: rowId,
                type: type,
                platform_id: platformId,
                deposit_type: deposit_type,
                remark: remark,
                bonus: bonus,
                total_deposit_amount: total_deposit_amount
            },
            success: function (response) {
                // Handle the response if needed
                console.log("adminStatus Response");
                console.log(response);
                console.log(response[0]);
                console.log(response.flag);
                response = response[0];
                if (response.flag == 1) {
                    displayMessage($(".custom-alert"), "Success", "Status Updated Successfully");
                    var selectElement = $("tr[data-id='" + rowId +
                        "'] .deposit_admin");

                    selectElement.val('Verified');
                }
                $(".close_model").click();

            },
            error: function (xhr) {
                // Handle the error if needed
                console.log(xhr.responseText);
            }
        });

    });

    $(document).on('click', '.confirm_banker_reject', function () {

        console.log("inside confirm_banker_reject");
        var modalId = $(this).closest('.modal').attr('id');
        var remark = $('#' + modalId + ' #reject_banker_remark').val();

        console.log(modalId);
        var selectedValue = "Rejected";
        var rowId = $('#' + modalId + ' #new_deposit_banker_reject_id').val();
        console.log(rowId);
        var platformId = $('#' + modalId + ' #new_platform_id').val();
        var type = "deposit_banker";
        var deposit_type = "Existing";
        // var test = "sample";
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: adminStatus,
            data: {
                selectedValue: selectedValue,
                userid: rowId,
                type: type,
                remark: remark
            },
            success: function (response) {
                // Handle the response if needed
                console.log("adminStatus Response");
                console.log(response);
                console.log(response[0]);
                console.log(response.flag);
                response = response[0];
                if (response.flag == 1) {
                    displayMessage($(".custom-alert"), "Success", "Status Updated Successfully");
                    var selectElement = $("tr[data-id='" + rowId +
                        "'] .banker_admin");

                    selectElement.val('Rejected');
                }
                $(".close_model").click();

            },
            error: function (xhr) {
                // Handle the error if needed
                console.log(xhr.responseText);
            }
        });

    });
    $(document).on('click', '.confirm_admin_reject', function () {

        console.log("inside confirm_admin_reject");
        var modalId = $(this).closest('.modal').attr('id');
        var remark = $('#' + modalId + ' #reject_remark').val();

        console.log(modalId);
        var selectedValue = "Rejected";
        var rowId = $('#' + modalId + ' #new_deposit_reject_id').val();
        console.log(rowId);
        var platformId = $('#' + modalId + ' #new_platform_id').val();
        var type = "deposit_admin";
        var deposit_type = "Existing";
        // var test = "sample";
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: adminStatus,
            data: {
                selectedValue: selectedValue,
                userid: rowId,
                type: type,
                remark: remark
            },
            success: function (response) {
                // Handle the response if needed
                console.log("adminStatus Response");
                console.log(response);
                console.log(response[0]);
                console.log(response.flag);
                response = response[0];
                if (response.flag == 1) {
                    displayMessage($(".custom-alert"), "Success", "Status Updated Successfully");
                    var selectElement = $("tr[data-id='" + rowId +
                        "'] .deposit_admin");

                    selectElement.val('Rejected');
                }
                $(".close_model").click();

            },
            error: function (xhr) {
                // Handle the error if needed
                console.log(xhr.responseText);
            }
        });

    });

    var selectedValue = "";
    var rowId = "";
    $(document).on('change', '.banker_admin', function () {
        selectedValue = $(this).val();
        console.log(selectedValue);
        rowId = $(this).closest('tr').data('id');

        $('#bankerVerifyModal' + rowId).modal('hide');
        $('#bankerRejectedModal' + rowId).modal('hide');

        var selectElement = $("tr[data-id='" + rowId +
            "'] .banker_admin");

        selectElement.val('Pending');
        if (selectedValue == "Verified") {

            $('#bankerVerifyModal' + rowId).modal('show');
        }
        else if (selectedValue === "Rejected") {
            $('#rejectBankerModal' + rowId).modal('show');
        } else {
            type = "deposit_banker"
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: adminStatus,
                data: {
                    selectedValue: selectedValue,
                    userid: rowId,
                    type: type
                },
                success: function (response) {
                    // Handle the response if needed
                    console.log("adminStatus Response");
                    console.log(response);
                    console.log(response[0]);
                    console.log(response.flag);
                    response = response[0];
                    if (response.flag == 1) {
                        displayMessage($(".custom-alert"), "Success", "Status Updated Successfully");
                        var selectElement = $("tr[data-id='" + rowId +
                            "'] .banker_admin");
                        selectElement.val('Pending');
                        $("table tbody#deposit_tbody tr[data-id='" + rowId +
                            "'] td.deposit_status select").val(response.admin_status);
                    }
                    $(".close_model").click();

                },
                error: function (xhr) {
                    // Handle the error if needed
                    console.log(xhr.responseText);
                }
            });
        }



    });



    function displayMessage(element, title, message) {
        element.css("display", "block")
            .delay(3000)
            .fadeOut(700);
        $('#alert-title').text(title);
        $('#alert-message').text(message);

    }




    $(document).on('click', '.confirm_banker_verify', function () {
        console.log("inside confirm_banker_verify");
        var type = "deposit_banker";
        // var test = "sample";
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: adminStatus,
            data: {
                selectedValue: selectedValue,
                userid: rowId,
                type: type
            },
            success: function (response) {
                // Handle the response if needed
                console.log("adminStatus Response");
                console.log(response);
                console.log(response[0]);
                console.log(response.flag);
                response = response[0];
                if (response.flag == 1) {
                    displayMessage($(".custom-alert"), "Success", "Status Updated Successfully");
                    var selectElement = $("tr[data-id='" + rowId +
                        "'] .banker_admin");
                    selectElement.val('Verified');
                    $("table tbody#deposit_tbody tr[data-id='" + rowId +
                        "'] td.deposit_status select").val(response.admin_status);
                }
                $(".close_model").click();

            },
            error: function (xhr) {
                // Handle the error if needed
                console.log(xhr.responseText);
            }
        });

    });

    $(document).on('change', '.cc_deposit', function () {

        var informStatus = $(this).val();

        var rowId = $(this).closest('tr').data('id');
        var selectElement = $("tr[data-id='" + rowId +
            "'] #cc_deposit");
        selectElement.val(0);

        if (informStatus == 1) {

            $('#ccVerifyModal' + rowId).modal('show');
        }
    });

    $(document).on('click', '.confirm_cc_verify', function () {
        console.log("inside confirm_cc_verify");
        var modalId = $(this).closest('.modal').attr('id');
        var rowId = $('#' + modalId + ' #new_deposit_id').val();

        var type = "deposit_cc";
        // var test = "sample";
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: adminStatus,
            data: {
                userid: rowId,
                type: type
            },
            success: function (response) {
                // Handle the response if needed
                console.log("adminStatus Response");
                console.log(response);
                console.log(response[0]);
                console.log(response.flag);
                response = response[0];
                if (response.flag == 1) {
                    displayMessage($(".custom-alert"), "Success", "Status Updated Successfully");

                    // var selectElement = $("tr[data-id='" + rowId +
                    //     "'] .cc_deposit");
                    // console.log("rowId");
                    console.log(rowId);
                    // $("table tbody#deposit_tbody tr[data-id='" + rowId +
                    // "'] td#cc_deposit select").val(1);
                    var selectElement = $("tr[data-id='" + rowId +
                        "'] #cc_deposit");
                    selectElement.val(1);

                }
                $(".close_model").click();

            },
            error: function (xhr) {
                // Handle the error if needed
                console.log(xhr.responseText);
            }
        });

    });


});


