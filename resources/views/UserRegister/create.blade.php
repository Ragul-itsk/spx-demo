<!doctype html>
<html lang="en">

<head>
    @include('layouts.user_link')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <style>
        <style>.image-preview {
            width: 100%;
            height: auto;
            border: 2px dashed #ccc;
            padding: 20px;
            text-align: center;
        }

        .image-preview img {
            max-width: 25%;
            max-height: 80px;
        }

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
        {{--  sidebar  --}}
        @include('layouts.sidebar')

        @include('layouts.header')



        <div class="page-wrapper">
            <div class="page-content">


                <div class="page-content">
                    <div class="row">
                        <div class="col-xl-12 mx-auto">
                            <h6 class="mb-0 text-uppercase">Create Player</h6>
                            <hr />
                            <div class="card border-top border-0 border-4 border-white">
                                <div class="card-body p-5">
                                    <div class="card-title d-flex align-items-center">
                                        <div>
                                            <i class="bx bxs-user me-1 font-22 text-white"></i>
                                        </div>
                                        <h5 class="mb-0 text-white">
                                            Player Creation
                                        </h5>
                                    </div>
                                    <hr />
                                    <form class="row g-3" method="POST" action="{{ route('UserRegister.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-md-6">
                                            <label>Platform<span class="text-danger">*</span></label>
                                            <div>
                                                <select class="form-control select2" name="platform"
                                                    id="platform_selected">

                                                    <option value="">Choose platform</option>
                                                    @foreach ($platform as $key => $value)
                                                        <option value="{{ $value->id }}">{{ $value->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('platform')
                                                    <span class="error" style="color: red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="user_select">Existing Users:</label>
                                            <select class="form-control select2" name="user_id" id="user_select">
                                                <!-- Populate this select element with user options using JavaScript -->
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label> Assign To<span class="text-danger">*</span></label>
                                            <div>
                                                <select class="form-control select2" required name="branch_name">
                                                    <option value="" id="selected_user">Choose Name</option>
                                                    @foreach ($data as $key => $value)
                                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputLastName" class="form-label">Name<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="name" id="player_name" class="form-control"
                                                value="{{ old('name') }}" />
                                            @error('name')
                                                <span class="error" style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="inputPassword" class="form-label">Mobile Number<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="mobile" id="player_mobile" class="form-control"
                                                required />
                                            @error('mobile')
                                                <span class="error" style="color: red;">{{ $message }}</span>
                                            @enderror

                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputEmail" class="form-label">Alternate Mobile No</label>
                                            <input type="text" name="alternative_mobile" id="player_alter_mobile"
                                                class="form-control" id="inputEmail"
                                                value="{{ old('alternative_mobile') }}" />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputEmail" class="form-label">DOJ</label>
                                            <input type="date" name="dob" id="player_doj" class="form-control"
                                                value="{{ old('date', date('Y-m-d')) }}" />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputPassword" class="form-label">Location</label>
                                            <input type="text" name="location" id="player_location"
                                                class="form-control" value="{{ old('location') }}" />
                                        </div>
                                        <div class="col-md-6">
                                            <label>Lead Source </label>
                                            <div>
                                                <select class="form-control select2" name="lead_source">
                                                    <option value="" id="selected_user">Choose Source</option>
                                                    @foreach ($lead_source as $key => $value)
                                                        <option value="{{ $value->id }}">{{ $value->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="card-title d-flex align-items-center pt-30">
                                            <div>
                                                <i class="bx bxs-user me-1 font-22 text-white"></i>
                                            </div>
                                            <h5 class="mb-0 text-white">Deposit Details</h5>
                                        </div>
                                        <hr />
                                        {{--  <div class="form-group">
                                            <label for="bank_name">Bank Name:</label>
                                            <select class="form-control" id="bank_name" name="bank_name">
                                                <option value="">Select a bank</option>
                                                @foreach ($bankdetail as $bank)
                                                    <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>  --}}

                                        <div class="col-md-6">
                                            <label>Our Bank Name<span class="text-danger">*</span></label>
                                            <div>
                                                <select class="form-control select2" required name="our_bank_name">
                                                    <option value="" id="">Select a bank</option>
                                                    @foreach ($bankdetail as $key => $value)
                                                        <option value="{{ $value->id }}">
                                                            {{ $value->bank_name }},{{ $value->account_number }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="inputPassword" class="form-label">UTR<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="utr" id="utr" class="form-control" />
                                            <span id="utr-exists"> </span>
                                            @error('utr')
                                                <span class="error" style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="inputEmail" class="form-label">Deposit Amount<span
                                                    class="text-danger">*</span></label>
                                            <input type="number" name="deposit_amount" id="amount"
                                                class="form-control" value="{{ old('deposit_amount') }}" />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputEmail" class="form-label">Bonus
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="number" name="bonus" id="percentage"
                                                class="form-control" value="{{ old('bonus') }}" />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputEmail" class="form-label">Total Deposit Amount</label>
                                            <input type="text" id="result" readonly class="form-control"
                                                name="total_deposit_amount"
                                                value="{{ old('total_deposit_amount') }}" />
                                        </div>
                                        {{--  <div class="col-md-6">
                                            <label for="inputPassword" class="form-label"> Upload Image</label>
                                            <input type="file" class="form-control" name="image" />
                                        </div>  --}}
                                        {{--  <div class="container">  --}}
                                        {{--  <div class="row">  --}}
                                        <div class="col-md-6">
                                            <label for="image" class="form-label">Upload Image</label>
                                            <input type="file" class="form-control" name="image"
                                                id="imageInput" accept="image/*" />
                                        </div>
                                        <div class="col-md-6">
                                            <div id="imagePreview" class="image-preview">

                                            </div>
                                        </div>
                                        {{--  </div>  --}}
                                        {{--  </div>  --}}
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-light px-5">
                                                Submit
                                            </button>
                                        </div>

                                        <div class="card-title d-flex align-items-center pt-30">
                                            <div>
                                                <i class="bx bxs-user me-1 font-22 text-white"></i>
                                            </div>
                                            <h5 class="mb-0 text-white">Bank Details</h5>
                                        </div>
                                        <hr />
                                        <div id="newlink">
                                            <div>
                                                <table border=0>
                                                    <tr>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="inputFirstName" class="form-label">Account
                                                                    Holder Name</label>
                                                                <input type="text" name="account_name[]"
                                                                    class="form-control" id="inputFirstName"
                                                                    value="{{ old('account_name[]') }}" />
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
                                        <p id="addnew">
                                            <a class="btn btn-light px-5" href="javascript:new_link()">Add New </a>
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

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>






        {{--  color change icon  --}}
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <footer class="page-footer">
            <p class="mb-0">Copyright © 2021. All right reserved.</p>
        </footer>
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
    @include('layouts.user_script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/js/player_register.js') }}"></script>
    <script>
        const imageInput = document.getElementById('imageInput');
        const imagePreview = document.getElementById('imagePreview');

        imageInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.innerHTML = '<img src="' + e.target.result + '" alt="Image Preview" />';
                };

                reader.readAsDataURL(this.files[0]);
            }
        });

        imagePreview.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.style.border = '2px dashed #007bff';
        });

        imagePreview.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.style.border = '2px dashed #ccc';
        });

        imagePreview.addEventListener('drop', function(e) {
            e.preventDefault();
            this.style.border = '2px dashed #ccc';

            const file = e.dataTransfer.files[0];
            if (file && file.type.match('image/*')) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.innerHTML = '<img src="' + e.target.result + '" alt="Image Preview" />';
                };

                reader.readAsDataURL(file);
                imageInput.files = e.dataTransfer.files;
            }
        });
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var platform_selected = "{{ url('platform_selected') }}";
    </script>
    <script type="text/javascript">
        var ct = 1;

        function new_link() {
            ct++;
            var div1 = document.createElement('div');
            div1.id = ct;
            // link to delete extended form elements
            var delLink =
                '<div style="text-align:right;margin-right:65px"><a class="btn btn-light px-5" href="javascript:delIt(' +
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
        $(document).ready(function() {

            $('.select2').select2({
                placeholder: "-- Select an option --",
                allowClear: true
            });

            $('#Transaction-History').DataTable({
                lengthMenu: [
                    [6, 10, 20, -1],
                    [6, 10, 20, 'Todos']
                ]
            });
        });

        var delayTimer;

            $('#utr').on('input', function() {
                var utr = $(this).val();

                // Clear the previous delay timer
                clearTimeout(delayTimer);

                // Set a new delay timer to trigger the AJAX request after 1 second (1000 milliseconds)
                delayTimer = setTimeout(function() {
                    if (utr.length > 0) {
                        $.ajax({
                            url: '/check-utr',
                            method: 'GET',
                            data: {
                                utr: utr
                            },
                            success: function(response) {
                                if (response.exists) {
                                    $('#utr-exists').html('UTR already exists').css('background-color', 'white');
                                } else {
                                    $('#utr-exists').html('');
                                }
                            },
                        });
                    } else {
                        $('#utr-exists').text('');
                    }
                }, 1000); // 1000 milliseconds (1 second)
            });

    </script>


</body>

</html>
