<!doctype html>
<html lang="en">

<head>
    @include('layouts.user_link')
</head>

<body class="bg-theme bg-theme2">
    <!--wrapper-->
    <div class="wrapper">
        {{--  sidebar  --}}
        @include('layouts.sidebar')

        @include('layouts.header')

        {{--  body content  --}}
        <div class="page-wrapper">
            <div class="page-content">
                @if ($message = Session::get('success'))
                    <div id="success-message" class="alert border-0 alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0 text-white">{{ $message }}</h6>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($message = Session::get('danger'))
                    <div class="alert border-0 alert-dismissible fade show" style="background-color: #d9534f">
                        <div class="text-white">{{ $message }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row ">
                    @can('Total User')
                        <div class="col-md-3">
                            <div class="card radius-10">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0">Total User</p>
                                            <h4 class="my-1">{{ $totalUserCount }}</h4>
                                            <p class="mb-0 font-13"><i class="bx bxs-up-arrow align-middle"></i>14.5%
                                                Since
                                                last week
                                            </p>
                                        </div>
                                        <div class="widgets-icons ms-auto"><i class="bx bxs-group"></i>
                                        </div>
                                    </div>
                                    <!-- <div id="chart2"></div> -->
                                </div>
                            </div>
                        </div>
                    @endcan
                    @can('Total Deposit')
                        <div class="col-md-3">
                            <div class="card radius-10">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0">Total Deposit</p>
                                            <h4 class="my-1">{{ number_format($totalDepositAmount, 2) }}</h4>
                                            <p class="mb-0 font-13"><i class="bx bxs-down-arrow align-middle"></i>12.4%
                                                Since last week
                                            </p>
                                        </div>
                                        <div class="widgets-icons ms-auto"><i class="bx bxs-binoculars"></i>
                                        </div>
                                    </div>
                                    <!-- <div id="chart3"></div> -->
                                </div>
                            </div>
                        </div>
                    @endcan
                    @can('Total Withdraw')
                        <div class="col-md-3">
                            <div class="card radius-10">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0">Total Withdraw</p>
                                            <h4 class="my-1">59K</h4>
                                            <p class="mb-0 font-13"><i class="bx bxs-down-arrow align-middle"></i>12.4%
                                                Since last week
                                            </p>
                                        </div>
                                        <div class="widgets-icons ms-auto"><i class="bx bxs-binoculars"></i>
                                        </div>
                                    </div>
                                    <!-- <div id="chart3"></div> -->
                                </div>
                            </div>
                        </div>
                    @endcan
                    @can('Net')
                        <div class="col-md-3">
                            <div class="card radius-10">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0">NET</p>
                                            <h4 class="my-1">59K</h4>
                                            <p class="mb-0 font-13"><i class="bx bxs-down-arrow align-middle"></i>12.4%
                                                Since last week
                                            </p>
                                        </div>
                                        <div class="widgets-icons ms-auto"><i class="bx bxs-binoculars"></i>
                                        </div>
                                    </div>
                                    <!-- <div id="chart3"></div> -->
                                </div>
                            </div>
                        </div>
                    @endcan
                </div>
                <!--end row-->
                <!-- double card -->
                <div class="row">
                    @can('Recent User')
                        <div class="col-md-6">
                            <div class="card radius-10 h-240">
                                <div class="card-body ">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h5 class="mb-0">Recent Players</h5>
                                        </div>
                                        <div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="table-responsive">
                                        <table class="table align-middle mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>User Name</th>
                                                    <th>User ID</th>
                                                    <th>Mobile Number</th>
                                                    <th>Lead Source</th>
                                                    <th>Location</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($userRegistration as $item)
                                                    <tr>
                                                        <td>{{ $item->id }}</td>
                                                        <td><a href="">{{ $item->name }}</a></td>
                                                        <td>{{ $item->email }}</td>
                                                        <td>{{ $item->mobile }}</td>
                                                        <td>{{ $item->leadSource->name }}</td>
                                                        <td>{{ $item->location }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endcan
                    @can('Recent Deposit')
                        <div class="col-md-6">
                            <div class="card radius-10 h-240">
                                <div class="card-body ">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h5 class="mb-0">Recent Deposit</h5>
                                        </div>
                                        <div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="table-responsive">
                                        <table class="table align-middle mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>User Name</th>
                                                    <th>Platform</th>
                                                    <th>UTR</th>
                                                    <th>Deopsit Amount</th>
                                                    <th>Bouns</th>
                                                    <th>Total Deposit Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($deposit as $item)
                                                    <tr>
                                                        <td>{{ $item->id }}</td>
                                                        <td>{{ $item->platformDetail->player->name ?? '' }}</td>
                                                        <td>{{ $item->platformDetail->platform->name ?? '' }}</td>
                                                        <td>{{ $item->utr }}</td>
                                                        <td>{{ $item->deposit_amount }}</td>
                                                        <td>{{ $item->bonus }}</td>
                                                        <td>{{ $item->total_deposit_amount }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endcan
                </div>
                <!-- double card end-->
                <div class="card radius-10">
                    @can('Recent Withdraw')
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h5 class="mb-0">Recent Withdraw</h5>
                                </div>
                                <div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
                                </div>
                            </div>
                            <hr />
                            <div class="table-responsive">
                                <table class="table align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>User Name</th>
                                            <th>PlatForm</th>
                                            <th>Bank Name</th>
                                            <th>Amount</th>
                                            <th>Rolling Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($withdraws as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->user->name ?? '' }}</td>
                                                <td>{{ $item->platForm->name ?? '' }}</td>
                                                <td>{{ $item->bank->bank_name }}</td>
                                                <td>{{ $item->amount }}</td>
                                                <td>{{ $item->rolling_type }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endcan
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 5000);
            }
        });
    </script>
</body>

</html>
