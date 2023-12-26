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
                            <h6 class="mb-0 text-uppercase">Deposit Details</h6>
                            <hr />
                            <div class="card border-top border-0 border-4 border-white">
                                <div class="card-body p-5">
                                    <form class="row g-3" method="POST"
                                        action="{{ route('deposit.update', $data->id) }}">
                                        @csrf
                                        <div class="col-md-6">
                                            <label>User Name<span class="text-danger">*</span></label>
                                            <div>
                                                <div>
                                                    <input type="text" name="user_name"
                                                        value="{{ $data->platformDetail->player->name ?? '' }}"
                                                        class="form-control" />
                                                    <input type="hidden" name="user_id"
                                                        value="{{ $data->platformDetail->player_id }}" />
                                                </div>
                                            </div>
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
                                            <label for="inputPassword" class="form-label">UTR Details</label>
                                            <input type="text" name="utr" value="{{ $data->utr }}"
                                                class="form-control" />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputEmail" class="form-label">Deposit Amount</label>
                                            <input type="number" name="deposit_amount"
                                                value="{{ $data->deposit_amount }}" id="amount"
                                                class="form-control" />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputEmail" class="form-label">Bonus</label>
                                            <input type="number" name="bonus" value="{{ $data->bonus }}"
                                                id="percentage" class="form-control" name="bonus" />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputEmail" class="form-label">Total Deposit Amount</label>
                                            <input type="text" id="result"
                                                value="{{ $data->total_deposit_amount }}" readonly
                                                class="form-control" name="total_deposit_amount" />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputPassword" class="form-label">Upload Image</label>
                                            <input type="file" class="form-control" name="image" />
                                        </div>

                                        <!-- Display the current image if it exists -->
                                        @if ($data->image)
                                            <div class="form-group">
                                                <label>Current Image</label>
                                                <img src="{{ asset('storage/' . $data->image) }}" style="width: 15%"
                                                    alt="Current Image">
                                            </div>
                                        @endif
                                        {{--  <div class="col-md-6">
                                            <label for="inputPassword" class="form-label">Upload Image</label>
                                            <input type="file" class="form-control" name="image" />
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
