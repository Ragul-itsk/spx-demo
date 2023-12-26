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
                            <h6 class="mb-0 text-uppercase">Edit Users</h6>
                            <hr />
                            <div class="card border-top border-0 border-4 border-white">
                                <div class="card-body p-5">
                                    <div class="card-title d-flex align-items-center">
                                        {{-- <div>
                                            <i class="bx bxs-user me-1 font-22 text-white"></i>
                                        </div>
                                        <h5 class="mb-0 text-white">
                                            User Creation
                                        </h5> --}}
                                    </div>
                                    <hr />
                                    <form class="row g-3" method="POST"
                                        action="{{ route('UserRegister.update', $data->id) }}">
                                        @csrf
                                        <div class="col-md-6">
                                            <label>Branch<span class="text-danger">*</span></label>
                                            <div>

                                                <select class="form-control" required name="user_name">
                                                    <option value="">Choose Name</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}"
                                                            {{ $data->branch_id == $user->id ? 'selected' : '' }}>
                                                            {{ $user->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputLastName" class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $data->name }}" />
                                        </div>

                                        <div class="col-md-6">
                                            <label for="inputPassword" class="form-label">Mobile Number</label>
                                            <input type="text" name="mobile"
                                                class="form-control"value="{{ $data->mobile }}" />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputEmail" class="form-label">Alternate Mobile No</label>
                                            <input type="text" name="alternative_mobile" class="form-control"
                                                id="inputEmail" value="{{ $data->alternative_mobile }}" />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputEmail" class="form-label">DOB</label>
                                            <input type="date" name="dob" class="form-control"
                                                value="{{ $data->dob }}" />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputPassword" class="form-label">Location</label>
                                            <input type="text" name="location" class="form-control"
                                                value="{{ $data->location }}" />
                                        </div>
                                        <div class="col-md-6">
                                            <label>Lead Source<span class="text-danger">*</span></label>
                                            <div>
                                                <select class="form-control" required name="lead_source">
                                                    <option value="">Choose Source</option>
                                                    @foreach ($lead_source as $source)
                                                        <option value="{{ $source->id }}"
                                                            {{ $data->lead_source_id == $source->id ? 'selected' : '' }}>
                                                            {{ $source->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Select Platform<span class="text-danger">*</span></label>
                                            <div>
                                                <select class="form-control" id="selected_platform" name="selected_platform">
                                                    <option value="">Choose Platform</option>
                                                    @foreach ($platform_details as $item)
                                                        <option value="{{ $item->platform->id }}">
                                                            {{ $item->platform->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <input type="hidden" value="{{ $data->id }}" id="player_id">
                                        <div class="col-md-6">
                                            <label for="p_username" class="form-label">UserName</label>
                                            <input type="text" name="p_username" id="p_username" class="form-control"
                                                value="{{ $data->location }}" />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="p_password" class="form-label">Password</label>
                                            <input type="text" name="p_password" id="p_password" class="form-control"
                                                value="{{ $data->location }}" />
                                        </div>
                                        <div class="card-title d-flex align-items-center pt-30">
                                            <div>
                                                <i class="bx bxs-user me-1 font-22 text-white"></i>
                                            </div>
                                            <h5 class="mb-0 text-white">Bank Details</h5>
                                        </div>
                                        <hr />
                                        <div id="newlink">
                                            @foreach ($bankDetails as $bankDetail)
                                                <div>
                                                    <table border="0">
                                                        <tr>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="inputFirstName"
                                                                        class="form-label">Account Holder Name</label>
                                                                    <input type="text" name="account_name[]"
                                                                        class="form-control" id="inputFirstName"
                                                                        value="{{ $bankDetail->account_name }}" />
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="inputLastName"
                                                                        class="form-label">Account ID</label>
                                                                    <input type="text" name="account_number[]"
                                                                        class="form-control" id="inputLastName"
                                                                        value="{{ $bankDetail->account_number }}" />
                                                                </div>
                                                            </div>
                                                        </tr>
                                                        <tr>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="inputLastName" class="form-label">IFSC
                                                                        Code</label>
                                                                    <input type="text" name="ifsc_code[]"
                                                                        class="form-control" id="inputLastName"
                                                                        value="{{ $bankDetail->ifsc_code }}" />
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="inputLastName" class="form-label">Bank
                                                                        Name</label>
                                                                    <input type="text" name="bank_name[]"
                                                                        class="form-control" id="inputLastName"
                                                                        value="{{ $bankDetail->bank_name }}" />
                                                                </div>
                                                            </div>
                                                        </tr>
                                                    </table>
                                                </div>
                                            @endforeach
                                        </div>
                                        <p id="addnew">
                                            <a href="javascript:new_link()" class="btn btn-light px-5">Add New </a>
                                        </p>
                                        <div id="newlinktpl" style="display:none">
                                            <div>
                                                <table border=0>
                                                    <tr>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="inputFirstName" class="form-label">Account
                                                                    Holder Name</label>
                                                                <input type="text" name="account_name[]"
                                                                    class="form-control" id="inputFirstName" />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="inputLastName" class="form-label">Account
                                                                    ID</label>
                                                                <input type="text" name="account_number[]"
                                                                    class="form-control" id="inputLastName" />
                                                            </div>
                                                        </div>
                                                    </tr>
                                                    <tr>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="inputLastName" class="form-label">IFSC
                                                                    Code</label>
                                                                <input type="text" name="ifsc_code[]"
                                                                    class="form-control" id="inputLastName" />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="inputLastName" class="form-label">Bank
                                                                    Name</label>
                                                                <input type="text" name="bank_name[]"
                                                                    class="form-control" id="inputLastName" />
                                                            </div>
                                                        </div>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="col-12">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            var delLink =
                '<div style="text-align:right;margin-right:65px;margin-top:10px;"><a class="btn btn-light px-5" href="javascript:delIt(' +
                ct +
                ')">Delete</a></div>';
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
        var platformDetails = "{{ url('edit-platform-details') }}";

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $(document).on('change', '#selected_platform', function() {
                var selectedValue = $(this).val();
                var playerId = $("#player_id").val();
                $.ajax({
                    type: "POST",
                    dataType: "JSON",
                    url: platformDetails,
                    data: {
                        selectedValue: selectedValue,
                        playerId: playerId
                    },
                    success: function(response) {
                        // Handle the response if needed
                        console.log("selected_platform Response");
                        console.log(response);
                        data = response[0];
                        $('#p_username').val(data.platformUsername);
                        $('#p_password').val(data.platformPassword);

                    },
                    error: function(xhr) {
                        // Handle the error if needed
                        console.log(xhr.responseText);
                    }
                });

            });
        });
    </script>
</body>

</html>
