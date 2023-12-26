$(document).ready(function () {
    $('#example').DataTable({

    })

    $('#platformsTable tr').find('th:eq(4), td:eq(4)').hide();

    $('#all-player-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/all-players-data',
            type: 'GET',
        },
        columns: [
            { data: 'id', name: 'id'},
            { data: 'name', name: 'name'},
            { data: 'mobile', name: 'mobile'},
            // { data: 'platformNames', name: 'platformNames'},

            {
                data: 'platformNames',
                name: 'platformNames',
                render: function (data, type, row) {
                    if (Array.isArray(data)) {
                        return data.join(', '); // Display the usernames as a comma-separated list
                    }
                    return data; // Return data as is if it's not an array
                }
            },
            {
                data: null,
                name: 'actions',
                searchable: false,
                render: function (data, type, row) {
                    return '<button class="action-btn edit-btn" data-id="' + data.id + '"><i class="far fa-pen-to-square"></i></button>';
                }
            }
            // Add more columns for other fields
        ],
        
    });

    $(document).on('click', '.edit-btn', function () {
        var userId = $(this).data('id');
        // Redirect to the edit page with the user's ID
        window.location.href = '/UserRegister-edit/' + userId;
    });
});