$(document).ready(function () {
    $('#amount, #percentage').on('input', function () {
        var amount = parseFloat($('#amount').val()) || 0;
        var percentage = parseFloat($('#percentage').val()) || 0;
        var result = amount + (amount * percentage / 100);
        $('#result').val(result.toFixed(2));
    });

    $('#platform_selected').change(function () {
        var selectedPlatform = $(this).val();
        // var test = "sample";
        $.ajax({
            type: "GET",
            url: platform_selected,
            data: {
                selectedPlatform: selectedPlatform,
            },
            success: function (data) {
                // Clear the existing user options
                $('#user_select').empty();
                // Populate the user select element with the fetched users
                $('#user_select').append('<option value="">Select User</option>');
                $.each(data.players, function (key, value) {
                    $('#user_select').append('<option value="' + key + '">' + value + '</option>');
                });
            },
            error: function (xhr) {
                // Handle the error if needed
                console.log(xhr.responseText);
            }
        });
    });

    $('#user_select').on('change', function () {
        var playerId = $(this).val();
        if (playerId == "") {
            console.log("playerId Empty");

            $('#player_name').val("").prop('readonly', false);
            $('#player_email').val("").prop('readonly', false);
            $('#player_mobile').val("").prop('readonly', false);
            $('#player_doj').val("").prop('readonly', false);
            $('#player_alter_mobile').val("").prop('readonly', false);
            $('#selected_user').html().prop('disabled', false);
        }

        // Get the selected user ID
        // Use AJAX to fetch user details based on the selected user
        $.ajax({
            url: '/get-player-details/' + playerId, // Define the route for fetching user details
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                // Update the text fields with the fetched user details
                $('#player_name').val(data.user.name).prop('readonly', true);
                $('#player_email').val(data.user.email).prop('readonly', true);
                $('#selected_user').html(data.user.user.name).prop('disabled', true);
                $('#player_mobile').val(data.user.mobile).prop('readonly', true);
                $('#player_doj').val(data.user.dob).prop('readonly', true);
                $('#player_alter_mobile').val(data.user.alternative_mobile).prop('readonly', true);

            },
            error: function (xhr, status, error) {
                // Handle errors if necessary
            }
        });
    });

    $('#banker_admin').change(function () {
        var selectedValue = $(this).val();
        var rowId = $(this).closest('tr').data('id');
        var type = "deposit_banker";
        // var test = "sample";
        $.ajax({
            type: "POST",
            url: adminStatus,
            data: {
                selectedValue: selectedValue,
                userid: rowId,
                type: type
            },
            success: function (response) {
                // Handle the response if needed
                $('#preview').html('<img src="' + response.image_url +
                    '" alt="Uploaded Image">');
            },
            error: function (xhr) {
                // Handle the error if needed
                console.log(xhr.responseText);
            }
        });
    });
});