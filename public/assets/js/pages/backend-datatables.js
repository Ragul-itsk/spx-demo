$(document).ready(function () {

    function displayError(element, errorMessage) {
        element
            .html(errorMessage)
            .css("display", "block")
            .delay(3000)
            .fadeOut(700);
    }
    
    $('#all-deposits-table').DataTable({

        scrollY: "400px", // Set the desired height for vertical scrolling
        scrollCollapse: true, // Enable collapsing scrollbar
        processing: true,
        serverSide: true,
        ajax: {
            url: '/all-deposit-datas',
            type: 'GET',
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'utr', name: 'utr' },
            { data: 'player_name', name: 'platformDetail.platform_username' },
            { data: 'name', name: 'name' },
            { data: 'deposit_amount', name: 'deposit_amount' },
            { data: 'bonus', name: 'bonus' },
            {
                data: 'image',
                name: 'image',
            },
            { data: 'total_deposit_amount', name: 'total_deposit_amount' },
            { data: 'admin_status', name: 'admin_status' },
            { data: 'banker_status', name: 'banker_status' },
            { data: 'isInformed',
            name: 'isInformed',
            searchable: false,
            render: function (data, type, full, meta) {
                return data == 1 ? 'Verified' : 'Not Verified';
            }
        },
            { data: 'created_by', name: 'created_by' },
            {
                data: null,
                name: 'actions',
                searchable: false,
                render: function (data, type, row) {
                    return '<button class="action-btn delete-btn" data-id="' + data.id + '"><i class="fa-solid fa-trash"></i></button>';
                }
            }
            // Add more columns for other fields
        ],

    });

    $(document).on('click', '.delete-btn', function () {
        // Get the ID of the row you want to delete
        var id = $(this).data('id');

        // Set the ID as a data attribute in the confirmation modal
        $('#deleteConfirmationModal').data('id', id);

        // Open the confirmation modal
        $('#deleteConfirmationModal').modal('show');
       
    });

    $('#confirmDelete').on('click', function () {
        var id = $('#deleteConfirmationModal').data('id');

        // Make an AJAX request to delete the item
        $.ajax({
            url: '/delete-item/' + id, // Replace with your actual delete endpoint
            type: 'DELETE',
            success: function (response) {
                // Refresh the DataTable
                $('#all-deposits-table').DataTable().ajax.reload();
                displayError($("#success-message"),
                        "Data Deleted Success");
                        console.log("data deleted successfully");
        $('#deleteConfirmationModal').modal('hide');

            }
        });

        // Close the confirmation modal
    });

    $('.close').click(function () {
        $('#myModal').modal('hide');
    });


    // Add this JavaScript code
    $(document).on('click', '.image-link', function () {
        var imageUrl = $(this).data('image');
        $('#imageModal .modal-body').html('<img src="' + imageUrl + '" alt="Image" class="img-fluid">');
    });

    $(document).on('click', '.edit-btn', function () {
        var userId = $(this).data('id');
        // Redirect to the edit page with the user's ID
        window.location.href = '/UserRegister-edit/' + userId;
    });

    $('#all-withdraw-table').DataTable({

        scrollY: "400px", // Set the desired height for vertical scrolling
        scrollCollapse: true, // Enable collapsing scrollbar
        processing: true,
        serverSide: true,
        ajax: {
            url: '/all-withdraw-datas',
            type: 'GET',
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'player_name', name: 'platformDetail.platform_username', searchable: true },
            { data: 'account_number', name: 'bank.account_number' },
            { data: 'bank_name', name: 'bank.bank_name' },
            { data: 'withdraw_utr', name: 'withdrawUtr.utr' },
            { data: 'platform_name', name: 'platform_name' },
            { data: 'amount', name: 'amount' },
            { data: 'rolling_type', name: 'rolling_type' },
            {
                data: 'image',
                name: 'image',
                render: function (data, type, row) {
                    return '<a href="#" class="image-link" data-image="' + data + '"><img src="' + data + '" alt="Image" style="max-width: 50px; max-height: 50px;"></a>';
                },
            },
            { data: 'd_chips', name: 'd_chips' },
            { data: 'admin_status', name: 'admin_status' },
            { data: 'banker_status', name: 'banker_status' },
            { data: 'isInformed', name: 'isInformed',
            searchable: false,
            render: function (data, type, full, meta) {
                return data == 1 ? 'Verified' : 'Not Verified';
            }},
            { data: 'created_by', name: 'employee.name' },
        ],

        rowCallback: function (row, data, index) {
            // Attach a click event handler to the 'image-link' class
            $(row).find('.image-link').on('click', function (e) {
                e.preventDefault();
                // Get the image URL from the 'data-image' attribute
                var imageUrl = $(this).data('image');
                // Open a modal with the larger image
                $('#imageModal .modal-body').html('<img src="' + imageUrl + '" alt="Large Image" style="max-width: 100%;">');
                $('#imageModal').modal('show');
            });
        }

    });

    $('#all-deposits-report-table').DataTable({

        scrollY: "400px", // Set the desired height for vertical scrolling
        scrollCollapse: true, // Enable collapsing scrollbar
        processing: true,
        serverSide: true,
        ajax: {
            url: '/all-deposit-reports',
            type: 'GET',
            data: function (d) {
                d.start_date = $('#start_date').val();
                d.end_date = $('#end_date').val();
                d.created_by = $('#created_by').val();
                d.platform = $('#platform').val();
            },
        },
        dom: 'Bfrtip', // Add 'B' to enable export button
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print',
            {
                text: 'Export All Search Results',
                action: function (e, dt, node, config) {
                    window.location.href = '/export-all-search-results?' + $.param(dt.ajax.params());
                }
            }
        ],
        columns: [
            { data: 'id', name: 'id' },
            { 
                data: 'created_at',
                name: 'created_at',
                render: function (data, type, full, meta) {
                    // Format the date using a library like Moment.js or directly in JavaScript
                    return data ? new Date(data).toLocaleDateString() : '-';
                }
            },
            { data: 'utr', name: 'utr' },
            { data: 'player_name', name: 'platform_username' },
            { data: 'deposit_amount', name: 'deposit_amount' },
            { data: 'bonus', name: 'bonus' },
            {
                data: 'image',
                name: 'image',
            },
            { data: 'total_deposit_amount', name: 'total_deposit_amount' },
            { data: 'admin_status', name: 'admin_status' },
            { data: 'banker_status', name: 'banker_status' },
            { data: 'isInformed',
            name: 'isInformed',
            searchable: false,
            render: function (data, type, full, meta) {
                return data == 1 ? 'Verified' : 'Not Verified';
            }
        },
         
            { data: 'created_by', name: 'created_by' },
            // {
            //     data: null,
            //     name: 'actions',
            //     searchable: false,
            //     render: function (data, type, row) {
            //         return '<button class="action-btn delete-btn" data-id="' + data.id + '"><i class="fa-solid fa-trash"></i></button>';
            //     }
            // }
            // Add more columns for other fields
        ],

        footerCallback: function (row, data, start, end, display) {
            var api = this.api();
    $('#totalRecords').text(api.ajax.json().totalRecords);
    $('#totalDepositAmount').text(api.ajax.json().totalDepositAmount.toFixed(2));
    $('#totalBonus').text(api.ajax.json().totalBonusAmount.toFixed(2));
    $('#totalTotalDepositAmount').text(api.ajax.json().totalTotalDepositAmount.toFixed(2)); 
        },
        // Display total records information
    // infoCallback: function (settings, start, end, max, total, pre) {
    //     var api = this.api();
    //     var pageInfo = api.page.info();
    //     console.log("total Records");
    //     console.log(total);
    //     $('#total_records').text(total);
    // },

    });
    $('#applyFilterButton').on('click', function() {
        applyDateFilter();
    });

    function applyDateFilter() {
        // Redraw DataTables when the date filter is applied
        $('#all-deposits-report-table').DataTable().ajax.reload();
    }

    $('#all-withdraw-report-table').DataTable({

        scrollY: "400px", // Set the desired height for vertical scrolling
        scrollCollapse: true, // Enable collapsing scrollbar
        processing: true,
        serverSide: true,
        ajax: {
            url: '/all-withdraw-reports',
            type: 'GET',
            data: function (d) {
                d.start_date = $('#withdraw_start_date').val();
                d.end_date = $('#withdraw_end_date').val();
                d.created_by = $('#withdraw_created_by').val();
                d.platform = $('#withdraw_platform').val();
            },
        },
        dom: 'Bfrtip', // Add 'B' to enable export button
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print',
            {
                text: 'Export All Search Results',
                action: function (e, dt, node, config) {
                    window.location.href = '/export-all-withdraw-results?' + $.param(dt.ajax.params());
                }
            }
        ],
        columns: [
            { data: 'id', name: 'id' },
            { 
                data: 'created_at',
                name: 'created_at',
                render: function (data, type, full, meta) {
                    // Format the date using a library like Moment.js or directly in JavaScript
                    return data ? new Date(data).toLocaleDateString() : '-';
                }
            },
            { data: 'player_name', name: 'platformDetail.platform_username' },
            { data: 'bank_name', name: 'bank.bank_name'},
            { data: 'account_number', name: 'account_number' },
            { data: 'withdraw_utr', name: 'withdraw_utr' },
            { data: 'amount', name: 'amount' },
            { data: 'd_chips', name: 'd_chips' },
            {
                data: 'image',
                name: 'image',
            },
            { data: 'admin_status', name: 'admin_status' },
            { data: 'banker_status', name: 'banker_status' },
            { data: 'isInformed',
            name: 'isInformed',
            searchable: false,
            render: function (data, type, full, meta) {
                return data == 1 ? 'Verified' : 'Not Verified';
            }
        },
         
            { data: 'created_by', name: 'created_by' },
        ],
        footerCallback: function (row, data, start, end, display) {
            var api = this.api();
    $('#totalWithdrawRecords').text(api.ajax.json().totalRecords);
    $('#totalWithdrawAmount').text(api.ajax.json().totalWithdrawAmount.toFixed(2)); 
        },

    });
    $('#applyWithdrawFilterButton').on('click', function() {
        applyWithdrawDateFilter();
    });

    function applyWithdrawDateFilter() {
        // Redraw DataTables when the date filter is applied
        $('#all-withdraw-report-table').DataTable().ajax.reload();
    }



});
