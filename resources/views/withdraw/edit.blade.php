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

                <div class="page-content">
                    <div class="row">
                        <div class="col-xl-12 mx-auto">
                            <h6 class="mb-0 text-uppercase">Add Withdraw Details</h6>
                            <hr />
                            <div class="card border-top border-0 border-4 border-white">
                                <div class="card-body p-5">
                                    <form class="row g-3" method="POST"
                                        action="{{ route('withdraw.update', $data->id) }}">
                                        @csrf
                                        <div class="col-md-6">
                                            <label>User Name<span class="text-danger">*</span></label>
                                            <div>
                                                {{--  <input type="text" id="country-dropdown" name="user_id" value="{{ $data->user->name }}" class="form-control" />
                                                <input type="hidden" name="user_id" value="{{ $data->user->id }}" />  --}}
                                                <select name="user_id" id="country-dropdown" class="form-control"
                                                    required>
                                                    <option value="">Choose Name</option>
                                                    {{--  @foreach ($data as $data)  --}}
                                                    <option value="{{ $data->id }}">
                                                        {{ $data->platformDetail->player->name ?? '' }}
                                                    </option>
                                                    {{--  @endforeach  --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Bank Name<span class="text-danger">*</span></label>
                                            <div>
                                                <select id="state-dropdown" value="{{ $data->bank_name_id }}"
                                                    name="bank_name_id" class="form-control" required
                                                    class="form-control">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
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
                                        </div>
                                        <div class="col-md-6">
                                            <label>Platform<span class="text-danger">*</span></label>
                                            <div>
                                                <select class="form-control" required name="platform">
                                                    <option value="">Choose platform</option>
                                                    @foreach ($platform as $key => $value)
                                                        <option value="{{ $value->id }}"
                                                            @if ($value->id == $data->platformDetail->platform_id) selected @endif>
                                                            {{ $value->name }}
                                                        </option>
                                                        {{-- Debug Output --}}
                                                        <p>Value: {{ $value->id }} | Data: {{ $data->platform_id }}
                                                        </p>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputEmail" class="form-label">Amount</label>
                                            <input type="number" name="amount" value="{{ $data->amount }}"
                                                id="amount" class="form-control" />
                                        </div>
                                        <div class="col-md-6">
                                            <label>Rolling Type<span class="text-danger">*</span></label>
                                            <div>
                                                <select class="form-control" required name="rolling_type">
                                                    <option value="">Choose Rolling</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
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
    </div>
    <!--end switcher-->
    @include('layouts.user_script')
    {{--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  --}}
    <script>
        $(document).ready(function() {
            $('#country-dropdown').on('change', function() {
                var idCountry = this.value;

                $("#state-dropdown").html('');
                $.ajax({
                    url: "{{ url('/fetch-banks') }}",
                    type: "POST",
                    data: {

                        country_id: idCountry,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        {{--  console.log(result);  --}}
                        $('#state-dropdown').html(
                            '<option value="">-- Select Bank --</option>');
                        $.each(result.states, function(key, value) {
                            $("#state-dropdown").append('<option value="' + value
                                .id + '">' + value.bank_name + '</option>');
                        });
                        $('#city-dropdown').html('<option value="">-- Select City --</option>');
                    }
                });
            });
        });

        $(document).ready(function() {
            // Function to fetch and display bank details
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
                        $('#account-id-input').val(result.account_id);
                        $('#account-holder-name-input').val(result.account_holder_name);
                        $('#ifsc-code-input').val(result.ifsc_code);
                    },
                    error: function() {
                        // Handle errors if necessary
                    }
                });
            }

            $('#country-dropdown').on('change', function() {
                var idCountry = this.value;

                $("#state-dropdown").html('');
                $("#city-dropdown").html('');
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
    <script src="assets/js/index.js"></script>
    <script>
        new PerfectScrollbar('.product-list');
        new PerfectScrollbar('.customers-list');
    </script>
</body>

</html>
