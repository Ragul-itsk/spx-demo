<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png" />

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





        @can('Payment Show')
            <div class="page-wrapper">
                <div class="page-content">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-4">
                            <h6 class="mb-0 text-uppercase">Payment List</h6>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            {{--  <div class="row">  --}}

                            <div class="table-filter">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="searchName">User Name:</label>
                                            <input type="text" id="searchName" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="searchMobile">Mobile:</label>
                                            <input type="text" id="searchMobile" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--  </div>  --}}
                            <br>

                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User Name</th>
                                            <th>Platform</th>
                                            <th>Transfer Amount</th>
                                            <th>Bonus</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 1;
                                        @endphp
                                        @foreach ($deposit as $item)
                                            <tr>
                                                <td>
                                                    {{ $count }}
                                                    @php
                                                        $count++;
                                                    @endphp
                                                </td>
                                                <td>
                                                    {{ $item->name }}
                                                </td>
                                                <td>
                                                    {{ $item->mobile }}
                                                </td>
                                                <td>

                                                    <a href="#" data-bs-toggle="modal" data-id="{{ $item->id }}"
                                                        data-bs-target="#platforms{{ $item->id }}"> <i
                                                            class="fa-solid fa-eye"></i>
                                                    </a>
                                                    <!-- Verified Modal -->
                                                    <div class="modal fade" id="platforms{{ $item->id }}" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Platform Details</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table id="platformsTable"
                                                                        class="table table-striped table-bordered"
                                                                        style="width: 100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>ID</th>
                                                                                <th>Platform</th>
                                                                                <th>User Id</th>
                                                                                <th>Password</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                                $count = 1;
                                                                            @endphp
                                                                            @foreach ($item->platformDetails as $item)
                                                                                <tr>
                                                                                    <td>
                                                                                        {{ $count++ }}
                                                                                    </td>
                                                                                    <td>{{ $item->platform->name ?? '-' }}
                                                                                    </td>
                                                                                    <td>{{ $item->platform_username ?? '-' }}
                                                                                    </td>
                                                                                    <td>{{ $item->platform_password ?? '-' }}
                                                                                    </td>
                                                                                    <td>

                                                                                        <a class="copy-details"> <i
                                                                                                class="fa-solid fa-copy"></i>
                                                                                        </a>

                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <span id="success-message" class="error-message"
                                                                        style="color:green"></span>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end -->
                                                </td>



                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan




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
    <!--start switcher-->
    <div class="switcher-wrapper">
        <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
        </div>
        <div class="switcher-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
                <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
            </div>
            <hr />
            <p class="mb-0">Gaussian Texture</p>
            <hr>
            <ul class="switcher">
                <li id="theme1"></li>
                <li id="theme2"></li>
                <li id="theme3"></li>
                <li id="theme4"></li>
                <li id="theme5"></li>
                <li id="theme6"></li>
            </ul>
            <hr>
            <p class="mb-0">Gradient Background</p>
            <hr>
            <ul class="switcher">
                <li id="theme7"></li>
                <li id="theme8"></li>
                <li id="theme9"></li>
                <li id="theme10"></li>
                <li id="theme11"></li>
                <li id="theme12"></li>
                <li id="theme13"></li>
                <li id="theme14"></li>
                <li id="theme15"></li>
            </ul>
        </div>
    </div>
    <!--end switcher-->

    @include('layouts.user_script')
    <script>
        $(document).ready(function() {
            $("#searchName, #searchMobile").on("keyup", function() {
                var nameFilter = $("#searchName").val().toLowerCase();
                var mobileFilter = $("#searchMobile").val().toLowerCase();

                $("table tbody tr").each(function() {
                    var name = $(this).find("td:nth-child(2)").text().toLowerCase();
                    var mobile = $(this).find("td:nth-child(3)").text().toLowerCase();

                    // First, filter by name
                    if (name.includes(nameFilter)) {
                        // If name filter is met, then apply the mobile filter
                        if (mobile.includes(mobileFilter)) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#Transaction-History').DataTable({
                lengthMenu: [
                    [6, 10, 20, -1],
                    [6, 10, 20, 'Todos']
                ]
            });
        });
        // Function to copy table data
        $('.copy-details').click(function() {
            var $row = $(this).closest('tr'); // Get the parent row
            var $columns = $row.find('td').slice(1, -1);

            var rowData = {};
            $columns.each(function(index) {
                // Get the column name from the table header
                var columnName = $('#platformsTable th').eq(index + 1).text();
                // Get the column value from the row
                var columnValue = $(this).text();
                rowData[columnName] = columnValue;
            });

            var textToCopy = JSON.stringify(rowData, null, 4);
            textToCopy = textToCopy.slice(1, -1);

            // Attempt to use the Clipboard API
            if (navigator.clipboard) {
                navigator.clipboard.writeText(textToCopy).then(function() {
                    alert('Table data copied to clipboard:\n' + textToCopy);
                }).catch(function(err) {
                    // If Clipboard API fails, try the alternative method
                    alternativeCopyMethod(textToCopy);
                });
            } else {
                // If Clipboard API is not supported, try the alternative method
                alternativeCopyMethod(textToCopy);
            }
        });

        // Function for the alternative copy method
        function alternativeCopyMethod(text) {
            var textArea = document.createElement("textarea");
            textArea.value = text;
            document.body.appendChild(textArea);
            textArea.select();

            try {
                document.execCommand("copy");
                alert('Table data copied to clipboard (alternative method):\n' + text);
            } catch (err) {
                alert('Failed to copy data to clipboard using the alternative method: ' + err);
            } finally {
                document.body.removeChild(textArea);
            }
        }
    </script>
    <script src="assets/js/index.js"></script>
    <script>
        new PerfectScrollbar('.product-list');
        new PerfectScrollbar('.customers-list');
    </script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable()
        });
    </script>
</body>

</html>
