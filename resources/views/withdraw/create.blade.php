<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Required meta tags -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png" />
    @include('layouts.user_link')
    <title>SikanderPlayX - Portal</title>
    <style>
        .select2-container--default .select2-selection--single {
            background-color: rgb(0 0 0/15%);
            border: 1px solid rgb(255 255 255 / 15%);
            border-radius: 4px;
        }

        .select2-dropdown {
            background-color: #3c3c3c;
        }

        .select2-container--default .select2-search--dropdown .select2-search__field {
            border: 1px solid #aaa;
            background: #c1c1c173;
            border-radius: 5px;
            color: #fff;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #fff;
        }

        .select2-container--default .select2-selection--single {
            background-color: rgb(0 0 0/15%);
            border: 1px solid rgb(255 255 255 / 15%);
            border-radius: 4px;
            padding: 6px 0px 6px;
            height: 38px;
        }
    </style>
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
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-white">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">Profile Details</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body bg-black">
                                <ul class="list-group list-group-flush">
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">User Name</h6>
                                        <span class="text-white">Kamal Durai</span>
                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Mobile No</h6>
                                        <span class="text-white">1234567890</span>
                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Platform Paying</h6>
                                        <span class="text-white">@Sikander</span>
                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Account Id</h6>
                                        <span class="text-white">#23333334</span>
                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">User Id</h6>
                                        <span class="text-white">1234</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Deposite</button>
                                <button type="button" class="btn btn-primary">Withdraw</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end -->
                <div class="page-content">
                    <div class="row">
                        <div class="col-xl-12 mx-auto">
                            <h6 class="mb-0 text-uppercase">Add Withdraw Details</h6>
                            <hr />
                            <div class="card border-top border-0 border-4 border-white">
                                <div class="card-body p-5">
                                    <form class="row g-3" method="POST" action="{{ route('withdraw.store') }}">
                                        @csrf
                                        <div class="col-md-6">
                                            <label>GameUser Name<span class="text-danger">*</span></label>
                                            <div>
                                                <select name="user_id" id="player_platform" class="form-control select2"
                                                    required>
                                                    <option value="">Choose Name</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Bank Name<span class="text-danger">*</span></label>
                                            <div>
                                                <select id="state-dropdown" name="bank_name_id"
                                                    class="form-control select2" required class="form-control">
                                                </select>
                                            </div>
                                            <div class="d-flex justify-content-end" style="margin-top:15px">
                                                <button class="btn btn-success " id="openModalButton"
                                                    style="margin-right: 10px" disabled>Add
                                                    Bank</button>

                                                <button class="btn btn-success" id="addUPIButton" disabled>Add
                                                    UPI</button>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="account-id-name">User Name</label>
                                            <input type="text" id="account-id-name" name="name"
                                                class="form-control" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="account-id-name">Mobile</label>
                                            <input type="text" id="account-id-mobile" name="mobile"
                                                class="form-control" readonly>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="account-id-input" id="account-id-label">Account Number:</label>
                                            <input type="text" id="account-id-input" name="account_number"
                                                class="form-control" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="account-holder-name-input"
                                                id="account-holder-name-label">Account Holder Name:</label>
                                            <input type="text" id="account-holder-name-input" name="account_name"
                                                class="form-control" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="ifsc-code-input" id="ifsc-code-label">IFSC Code:</label>
                                            <input type="text" id="ifsc-code-input" name="ifsc_code"
                                                class="form-control" readonly>
                                        </div>
                                        {{--  <div class="col-md-6">
                                            <label for="account-id-input">Account Number:</label>
                                            <input type="text" id="account-id-input" name="account_number"
                                                class="form-control" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="account-holder-name-input">Account Holder Name:</label>
                                            <input type="text" id="account-holder-name-input" name="account_name"
                                                class="form-control" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="ifsc-code-input">IFSC Code:</label>
                                            <input type="text" id="ifsc-code-input" name="ifsc_code"
                                                class="form-control" readonly>
                                        </div>  --}}

                                        <div class="col-md-6">
                                            <label for="inputEmail" class="form-label">Amount</label>
                                            <input type="number" name="amount" id="amount"
                                                class="form-control" />
                                        </div>
                                        {{--  <div class="col-md-6">
                                            <label>Rolling Type<span class="text-danger">*</span></label>
                                            <div>
                                                <select class="form-control" required name="rolling_type">
                                                    <option value="">Choose Rolling</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>  --}}
                                        <div class="col-12">
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-light px-5">
                                                Submit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
        @include('layouts.footer')
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

        {{--  <div id="myModal" class="modal">
            <!-- Modal content goes here -->
            <div class="modal-content">
                <!-- Your modal content goes here -->
                <span class="close">&times;</span>
                <p>Modal Content</p>
            </div>
        </div>  --}}


        <div class="modal " id="myModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <span class="close"
                        style="    right: 0;
                    position: absolute;
                    width: 30px;
                    height: 30px;
                    text-align: center;
                    /* vertical-align: text-bottom; */
                    background: white;
                    color: black;
                    font-size: 25px;
                    padding-bottom: 2px;">&times;</span>
                    <div class="modal-header">
                        <h5 class="modal-title">ADD BANK DETAILS</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/submit-form') }}" method="post" id="myForm">
                            @csrf
                            <div class="form-group">
                                <label for="accountID">Account Holder Name:</label>
                                <input type="text" class="form-control" id="account_name" name="account_name"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="account-id-input">Account ID:</label>
                                <input type="text" id="account_number" name="account_number"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="account-holder-name-input">IFSC Code:</label>
                                <input type="text" id="ifsc_code" name="ifsc_code" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="ifsc-code-input">Bank Name:</label>
                                <input type="text" id="bank_name" name="bank_name" class="form-control">
                            </div>

                            <!-- Add hidden input field for user_id -->
                            <input type="hidden" id="selectedUserId" name="user_id" value="">


                            <div class="modal-footer">
                                <!-- Add a "Submit" button for the form -->
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="button" class="close btn btn-danger" data-bs-dismiss="modal"
                                    aria-label="Close">close</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>


        <div class="modal " id="upiModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <span class="close"
                        style="    right: 0;
                    position: absolute;
                    width: 30px;
                    height: 30px;
                    text-align: center;
                    /* vertical-align: text-bottom; */
                    background: white;
                    color: black;
                    font-size: 25px;
                    padding-bottom: 2px;">&times;</span>
                    <div class="modal-header">
                        <h5 class="modal-title">ADD UTR DETAILS</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/submit-utrform') }}" method="post" id="myForm">
                            @csrf

                            <input type="hidden" id="selectedUserIdForUPI" name="user_id" value="">

                            <div class="form-group">
                                <label for="utr-code-input">UTR Code:</label>
                                <input type="text" id="upi" name="upi" class="form-control" required>
                            </div>

                            <div class="modal-footer">
                                <!-- Add a "Submit" button for the form -->
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="button" class="close btn btn-danger" data-bs-dismiss="modal"
                                    aria-label="Close">Close</button>
                            </div>
                        </form>


                    </div>

                </div>
            </div>
        </div>




    </div>
    <!--end switcher-->
    @include('layouts.user_script')
    {{--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initially show the fields and labels
            showFields();

            // Function to hide the three input fields and labels
            function hideFields() {
                $("#account-id-input, #account-holder-name-input, #ifsc-code-input").hide();
                $("#account-id-label, #account-holder-name-label, #ifsc-code-label").hide();
            }

            // Function to show the three input fields and labels
            function showFields() {
                $("#account-id-input, #account-holder-name-input, #ifsc-code-input").show();
                $("#account-id-label, #account-holder-name-label, #ifsc-code-label").show();
            }

            $("#addUPIButton").click(function() {
                // Hide the fields and labels when the button is clicked
                hideFields();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var selectedPlayerId;

            // Enable buttons when a user is selected
            $("#player_platform").change(function() {
                $("#openModalButton, #addUPIButton").prop("disabled", false);
                // Store the selected player ID in the variable
                selectedPlayerId = $("#player_platform").val();
            });

            // Open Bank modal
            $("#openModalButton").click(function() {
                $("#selectedUserId").val(selectedPlayerId);
                $("#myModal").show();
            });

            // Open UPI modal
            $("#addUPIButton").click(function() {
                $("#selectedUserIdForUPI").val(selectedPlayerId);
                $("#upiModal").show();
            });

            // Close modals
            $(".close").click(function() {
                $("#myModal, #upiModal").hide();
                // Clear the selected player ID when the modal is closed
                selectedPlayerId = null;
            });
        });
    </script>
    {{--  <script>
        $(document).ready(function() {


            $("#openModalButton").prop("disabled", true);
            $("#player_platform").change(function() {
                $("#openModalButton").prop("disabled", false);
            });

            $("#openModalButton").click(function() {

                var selectedUserId = $("#player_platform").val();

                $("#selectedUserId").val(selectedUserId);
                $("#myModal").show();
            });


            $(".close").click(function() {
                $("#myModal").hide();
            });
        });
    </script>  --}}

    <script>
        $(document).ready(function() {
            // $('.select2').select2({
            //     placeholder: "-- Select an option --",
            //     allowClear: true
            // });

            $('#player_platform').select2({
                placeholder: "Search for an option",
                allowClear: true,
                minimumInputLength: 3,
                ajax: {
                    url: '/get-platform-details', // Replace with the URL of your server endpoint
                    dataType: 'json',
                    data: function(params) {
                        var query = {
                            search: params.term,
                            type: 'public',
                            from: "Withdraw",
                        }
                        return query;
                    },
                    delay: 250, // Delay in milliseconds before sending the query
                    processResults: function(data) {
                        console.log("success");
                        console.log(data);
                        return {
                            results: data.results
                        };
                    },
                    cache: true // Enable caching for better performance
                }
            });
        });

        $(document).ready(function() {
            // Function to fetch and display bebank details
            function fetchBankDetails(bankId) {
                $.ajax({
                    url: "{{ url('/fetch-bank-details') }}", // Replace with your route for fetching bank details
                    type: "POST",
                    data: {
                        bank_id: bankId,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        // Display the fetched data
                        $('#account-id-name').val(result.name);
                        $('#account-id-mobile').val(result.mobile);
                        $('#account-id-input').val(result.account_id);
                        $('#account-holder-name-input').val(result.account_holder_name);
                        $('#ifsc-code-input').val(result.ifsc_code);
                    },
                    error: function() {
                        // Handle errors if necessary
                    }
                });
            }

            $('#player_platform').on('change', function() {
                var idCountry = this.value;

                $("#state-dropdown").html('');
                $("#city-dropdown").html('');
                $('#account-id-name').val('');
                $('#account-id-mobile').val();
                $('#account-id-input').val(''); // Clear the account ID input
                $('#account-holder-name-input').val(''); // Clear the account holder name input
                $('#ifsc-code-input').val(''); // Clear the IFSC code input

                $.ajax({
                    url: "{{ url('/fetch-banks') }}", // Replace with your route for fetching banks
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#state-dropdown').html(
                            '<option value="">-- Select Bank --</option>');
                        $.each(result.states, function(key, value) {
                            $("#state-dropdown").append('<option value="' + value.id +
                                '">' + value.bank_name + '</option>');
                        });
                    },
                    error: function() {
                        // Handle errors if necessary
                    }
                });
            });

            // Handle bank selection
            $('#state-dropdown').on('change', function() {
                var selectedBankId = this.value;

                // Check if a bank is selected
                if (selectedBankId) {
                    // Fetch and display bank details
                    fetchBankDetails(selectedBankId);
                } else {
                    // Clear the input fields if no bank is selected
                    $('#account-id-name').val('');
                    $('#account-id-mobile').val('');
                    $('#account-id-input').val('');
                    $('#account-holder-name-input').val('');
                    $('#ifsc-code-input').val('');
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#amount, #percentage').on('input', function() {
                var amount = parseFloat($('#amount').val()) || 0;
                var percentage = parseFloat($('#percentage').val()) || 0;
                var result = amount + (amount * percentage / 100);
                $('#result').val(result.toFixed(2));
            });
        });
    </script>
    <script type="text/javascript">
        var ct = 1;

        function new_link() {
            ct++;
            var div1 = document.createElement('div');
            div1.id = ct;
            // link to delete extended form elements
            var delLink = '<div style="text-align:right;margin-right:65px"><a href="javascript:delIt(' + ct +
                ')">Del</a></div>';
            div1.innerHTML = document.getElementById('newlinktpl').innerHTML + delLink;
            document.getElementById('newlink').appendChild(div1);
        }
        // function to delete the newly added set of elements
        function delIt(eleId) {
            d = document;
            var ele = d.getElementById(eleId);
            var parentEle = d.getElementById('newlink');
            parentEle.removeChild(ele);
        }
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
    </script>

</body>

</html>
