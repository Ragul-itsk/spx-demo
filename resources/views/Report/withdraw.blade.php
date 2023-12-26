<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layouts.user_link')
    <title>SikanderPlayX - Portal</title>
</head>

<body class="bg-theme bg-theme2">
    <!--wrapper-->
    <div class="wrapper">
        @include('layouts.sidebar')
        <!--start header -->
        @include('layouts.header')
        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">

                <div class="row justify-content-between align-items-center">
                    <div class="col-md-4">
                        <h6 class="mb-0 text-uppercase">Withdrawal Reports</h6>
                    </div>

                    <div class="col-md-8 d-flex justify-content-end">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-title">
                                Filter
                            </div>
                            <div class="card-body">
                                <div class="row p-2">
                                    <div class="col-md-4">
                                        <label for="isinformed">Is Informed</label>
                                        <select name="isinformed" id="isinformed" class="form-control">
                                            <option value="Verified">Verified</option>
                                            <option value="Pending">Pending</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="banker_status">Banker Status</label>
                                        <select name="banker_status" id="banker_status" class="form-control">
                                            <option value="Verified">Verified</option>
                                            <option value="Rejected">Rejected</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Not Verified">Not Verified</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="admin_status">Admin Status</label>
                                        <select name="admin_status" id="admin_status" class="form-control">
                                            <option value="Verified">Verified</option>
                                            <option value="Rejected">Rejected</option>
                                            <option value="Pending">Pending</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-md-6">
                                        <label for="from_date">From Date</label>
                                        <input type="date" name="from_date" id="from_date" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="to_date">To Date</label>
                                        <input type="date" name="to_date" id="to_date" class="form-control">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="form-control" id="apply_filter">Apply</button>
                                    <button class="form-control" id="reset_filter">Reset</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-title">
                                <div class="card-body">
                                    Total Records : <span class="filter_result_count" id="filter_result_count">
                                        {{ $withdrawal_count }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-title">
                                <div class="card-body">
                                    Total Amount : <span class="filter_result_count" id="filter_withdraw_amount">
                                        {{ $total_amount }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width: 100%">
                                <thead>
                                    <tr>

                                        <th>ID</th>
                                        <th>User Name</th>
                                        <th>Withdraw Amount</th>
                                    </tr>
                                </thead>
                                <tbody id="deposit_tbody">
                                    @php
                                        $count = 1;
                                    @endphp
                                    @foreach ($withdrawal as $item)
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $item->platformDetail->player->name }}</td>
                                            <td>{{ $item->amount }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--end page wrapper -->
            <!--start overlay-->
            <div class="overlay toggle-icon"></div>
            <!--end overlay-->
            <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                    class='bx bxs-up-arrow-alt'></i></a>
            <!--End Back To Top Button-->
            {{--  @include('layouts.footer')  --}}
        </div>
        <!--end wrapper-->



        @include('layouts.user_script')

        <script>
            $(document).ready(function() {
                $('#example').DataTable()
            });
        </script>

        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).ready(function() {
                $('#apply_filter').click(function() {
                    // Get filter criteria
                    var isinformed = $('#isinformed').val();
                    var adminStatus = $('#admin_status').val();
                    var bankerStatus = $('#banker_status').val();
                    var from_date = $('#from_date').val();
                    var to_date = $('#to_date').val();

                    // Make an AJAX request to the Laravel route
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('filter.deposits') }}",
                        data: {
                            isinformed: isinformed,
                            admin_status: adminStatus,
                            banker_status: bankerStatus,
                            from_date: from_date,
                            to_date: to_date,
                        },
                        success: function(data) {
                            // Update the table with the filtered data
                            var depositTbody = $('#deposit_tbody');
                            depositTbody.empty();
                            var totalDepositAmount = 0;
                            // Iterate through the filtered data and append it to the table
                            $.each(data, function(index, item) {
                                console.log(item);
                                var row = '<tr>' +
                                    '<td>' + (index + 1) + '</td>' +
                                    '<td>' + item.platform_detail.player.name + '</td>' +
                                    '<td>' + item.deposit_amount + '</td>' +
                                    '<td>' + item.utr + '</td>' +
                                    '</tr>';
                                depositTbody.append(row);

                                // Update the total deposit amount
                                totalDepositAmount += parseFloat(item.deposit_amount);
                            });

                            // Update the total record count
                            $('#filter_deposit_amount').text(totalDepositAmount);

                            $('#filter_result_count').text(data.length);
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    });
                });

                // Add reset filter functionality if needed
                $('#reset_filter').click(function() {
                    // Clear input fields and reset the table
                    // Clear the filter criteria
                    $('#isinformed').val('Verified');
                    $('#admin_status').val('Verified');
                    $('#banker_status').val('Verified');
                    $('#from_date').val('');
                    $('#to_date').val('');
                    $('#apply_filter').click();
                    // You may also want to reload the original data
                });
            });
        </script>

</body>

</html>
