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
                                            <p class="mb-0 font-13"><i class="bx bxs-up-arrow align-middle"></i>14.5% Since
                                                last week</p>
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
                                                Since last week</p>
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
                                                Since last week</p>
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
                                                Since last week</p>
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
                                            <h5 class="mb-0">Recent Users</h5>
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











{{--  header data for backup  --}}




<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class="bx bx-menu"></i></div>

            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item mobile-search-icon">
                        <a class="nav-link" href="#">

                            <i class="bx bx-search"></i>
                        </a>
                    </li>
                    <li class="nav-item ">
                        @can('Users Icon')
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative"
                                href="{{ route('deposit.index') }}" role="button" aria-expanded="false">
                                <img width="30" height="30" src="assets\images\icons\d.png" alt="circled-w" />
                                <span class="alert-count">
                                    @php
                                        $count = App\Models\deposit::count();
                                    @endphp
                                    {{ $count }}
                                </span>
                            </a>
                        @endcan
                    </li>
                    <li class="nav-item ">
                        @can('Users Icon')
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative"
                                href="{{ route('withdraw.index') }}" role="button" aria-expanded="false">
                                <img width="30" height="30" src="assets\images\icons\w.png" alt="circled-w" />
                                <span class="alert-count">
                                    @php
                                        $count = App\Models\Withdraw::count();
                                    @endphp
                                    {{ $count }}
                                </span>
                            </a>
                        @endcan
                    </li>
                    @can('Setups')
                        <li>
                            <a href="{{ route('master.setting') }}"><i class="bx bx-cog f-22"></i></a>
                        </li>
                    @endcan



                    <li class="nav-item ">
                        @can('Users Icon')
                            <a href="{{ route('UserRegister.create') }}">
                                <img width="30" height="30" src="assets\images\icons\3.png" alt="circled-w" />
                            </a>
                        @endcan
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        @can('Users Icon')
                            <a href="{{ route('deposit.create') }}">
                                <img width="30" height="30" src="assets\images\icons\1.png"
                                    alt="circled-w" /></a>
                        @endcan

                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        @can('Users Icon')
                            <a href="{{ route('withdraw.create') }}">
                                <img width="30" height="30" src="assets\images\icons\2.png"
                                    alt="circled-w" /></a>
                        @endcan

                    </li>


                    <li class="nav-item dropdown dropdown-large">
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="{{ route('master.setting') }}">
                                <div class="msg-header">
                                    <p class="msg-header-title">Messages</p>
                                    <p class="msg-header-clear ms-auto">
                                        Marks all as read
                                    </p>
                                </div>
                            </a>
                            <div class="header-message-list">
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="assets/images/avatars/avatar-1.png" class="msg-avatar"
                                                alt="user avatar" />
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">
                                                Daisy Anderson
                                                <span class="msg-time float-end">5 sec ago</span>
                                            </h6>
                                            <p class="msg-info">The standard chunk of lorem</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="assets/images/avatars/avatar-2.png" class="msg-avatar"
                                                alt="user avatar" />
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">
                                                Althea Cabardo
                                                <span class="msg-time float-end">14 sec ago</span>
                                            </h6>
                                            <p class="msg-info">
                                                Many desktop publishing packages
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="assets/images/avatars/avatar-3.png" class="msg-avatar"
                                                alt="user avatar" />
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">
                                                Oscar Garner
                                                <span class="msg-time float-end">8 min ago</span>
                                            </h6>
                                            <p class="msg-info">
                                                Various versions have evolved over
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="assets/images/avatars/avatar-4.png" class="msg-avatar"
                                                alt="user avatar" />
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">
                                                Katherine Pechon
                                                <span class="msg-time float-end">15 min ago</span>
                                            </h6>
                                            <p class="msg-info">
                                                Making this the first true generator
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="assets/images/avatars/avatar-5.png" class="msg-avatar"
                                                alt="user avatar" />
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">
                                                Amelia Doe
                                                <span class="msg-time float-end">22 min ago</span>
                                            </h6>
                                            <p class="msg-info">
                                                Duis aute irure dolor in reprehenderit
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="assets/images/avatars/avatar-6.png" class="msg-avatar"
                                                alt="user avatar" />
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">
                                                Cristina Jhons
                                                <span class="msg-time float-end">2 hrs ago</span>
                                            </h6>
                                            <p class="msg-info">
                                                The passage is attributed to an unknown
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="assets/images/avatars/avatar-7.png" class="msg-avatar"
                                                alt="user avatar" />
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">
                                                James Caviness
                                                <span class="msg-time float-end">4 hrs ago</span>
                                            </h6>
                                            <p class="msg-info">The point of using Lorem</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="assets/images/avatars/avatar-8.png" class="msg-avatar"
                                                alt="user avatar" />
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">
                                                Peter Costanzo
                                                <span class="msg-time float-end">6 hrs ago</span>
                                            </h6>
                                            <p class="msg-info">
                                                It was popularised in the 1960s
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="assets/images/avatars/avatar-9.png" class="msg-avatar"
                                                alt="user avatar" />
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">
                                                David Buckley
                                                <span class="msg-time float-end">2 hrs ago</span>
                                            </h6>
                                            <p class="msg-info">
                                                Various versions have evolved over
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="assets/images/avatars/avatar-10.png" class="msg-avatar"
                                                alt="user avatar" />
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">
                                                Thomas Wheeler
                                                <span class="msg-time float-end">2 days ago</span>
                                            </h6>

                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="assets/images/avatars/avatar-11.png" class="msg-avatar"
                                                alt="user avatar" />
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">
                                                Johnny Seitz
                                                <span class="msg-time float-end">5 days ago</span>
                                            </h6>
                                            <p class="msg-info">
                                                All the Lorem Ipsum generators
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <a href="javascript:;">
                                <div class="text-center msg-footer">
                                    View All Messages
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="assets/images/avatars/images.jfif" class="user-img" alt="user avatar">
                    <div class="user-info ps-3">
                        <p class="user-name mb-0">{{ auth()->user()->name ?? '' }}
                            <br>
                            @auth
                                <span class="user-role">{{ auth()->user()->roles[0]->name }}</span>
                            @endauth
                        </p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <!-- <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
       </li> -->

                    <!-- <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-dollar-circle"></i><span>Earnings</span></a>
       </li> -->
                    <!-- <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-download"></i><span>Downloads</span></a>
       </li> -->

                    <li><a class="dropdown-item" href="{{ route('logout') }}"><i
                                class="bx bx-log-out-circle"></i><span>Logout</span></a>
                    </li>
                </ul>
            </div>

        </nav>
    </div>
</header>







{{--  deposit index  --}}

<!doctype html>
<html lang="en">

<head>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
    @include('layouts.user_link')
    <style>
        .wrong_icon_red {
            color: red;
        }

        .righrt_icon_green {
            color: greenyellow;
        }
    </style>
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
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-4">
                        <h6 class="mb-0 text-uppercase">Deposit List</h6>
                    </div>

                    <div class="col-md-8 d-flex justify-content-end">

                        @can('Deposit Add')
                            <a type="button" class="btn btn-light" href="{{ route('deposit.create') }}   "
                                class="list-group-item">Add<i class="fa-solid fa-plus fs-18"></i></a>
                        @endcan

                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            @can('Deposit Show')
                                <table id="example" class="table table-striped table-bordered" style="width: 100%">
                                    <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>User Name</th>
                                            <th>Platform</th>
                                            <th>Deposit Amount</th>
                                            <th>Bonus</th>
                                            <th>Total Amount</th>
                                            <th>Image</th>
                                            <th>Admin</th>
                                            <th>UTR Details</th>
                                            <th>Banker</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody id="deposit_tbody">
                                        @foreach ($deposit as $item)
                                            <tr data-id="{{ $item->id }}"
                                                data-platformid="{{ $item->platformDetail->id }}"
                                                data-platformname="{{ $item->platformDetail->platform->name }}">

                                                <td>{{ $item->id }}</td>
                                                <td>
                                                    <a type="button" data-note-id="{{ $item->id }}"
                                                        href="{{ route('client.get_note', $item->id) }}" type="button"
                                                        data-target="#offcanvas" data-bs-toggle="offcanvas"
                                                        data-bs-target="#offcanvasRight{{ $item->id }}"
                                                        aria-controls="offcanvasRight">
                                                        {{ $item->platformDetail->player->name ?? '' }}
                                                    </a>
                                                    <div class="offcanvas offcanvas-end" tabindex="-1"
                                                        id="offcanvasRight{{ $item->id }}"
                                                        aria-labelledby="offcanvasRightLabel">

                                                        <div class="offcanvas-header">

                                                            <button type="button" class="btn-close icon-close new-meth"
                                                                data-bs-dismiss="offcanvas" aria-label="Close"><i
                                                                    class="fa-regular fa-circle-xmark"></i></button>
                                                        </div>
                                                        <div class="offcanvas-body">
                                                            <div class="">
                                                                <div class="page-content"> </div>
                                                                <div class="row">
                                                                    <div class="col-md-6 ">
                                                                        <div
                                                                            class="card border-top border-0 border-4 border-white">
                                                                            @can('Deposit Info')
                                                                                <div class="card-body p-5">
                                                                                    <div class="card-heaer-cus"
                                                                                        style="margin: 20px 0;">
                                                                                        <div class="h5">User Info
                                                                                        </div>
                                                                                    </div>
                                                                                    <ul class="list-group list-group-flush">
                                                                                        <li
                                                                                            class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                                                            <h6 class="mb-0">Name</h6>
                                                                                            <span
                                                                                                class="text-white">{{ $item->platformDetail->player->name ?? '-' }}</span>
                                                                                        </li>
                                                                                        <li
                                                                                            class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                                                            <h6 class="mb-0">Email
                                                                                            </h6>
                                                                                            <span
                                                                                                class="text-white">{{ $item->platformDetail->player->email ?? '-' }}</span>
                                                                                        </li>
                                                                                        <li
                                                                                            class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                                                            <h6 class="mb-0">Mobile
                                                                                                Number</h6>
                                                                                            <span
                                                                                                class="text-white">{{ $item->platformDetail->player->mobile ?? '-' }}</span>
                                                                                        </li>
                                                                                        <li
                                                                                            class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                                                            <h6 class="mb-0">
                                                                                                Alternative
                                                                                                Mobile Number</h6>
                                                                                            <span
                                                                                                class="text-white">{{ $item->platformDetail->player->alternative_mobile ?? '-' }}</span>
                                                                                        </li>
                                                                                        <li
                                                                                            class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                                                            <h6 class="mb-0">DOB</h6>
                                                                                            <span
                                                                                                class="text-white">{{ $item->platformDetail->player->dob ?? '-' }}</span>
                                                                                        </li>
                                                                                        <li
                                                                                            class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                                                            <h6 class="mb-0">Location
                                                                                            </h6>
                                                                                            <span
                                                                                                class="text-white">{{ $item->platformDetail->player->location ?? '-' }}</span>
                                                                                        </li>
                                                                                        <li
                                                                                            class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                                                            <h6 class="mb-0">Lead
                                                                                                Source
                                                                                            </h6>
                                                                                            <span
                                                                                                class="text-white">{{ $item->leadSource->name ?? '-' }}</span>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            @endcan
                                                                            <div
                                                                                class="card border-top border-0 border-4 border-white">
                                                                                @can('Deposit Bankdetails')
                                                                                    <div class="card-body p-5">
                                                                                        <div class="card-heaer-cus"
                                                                                            style="margin: 20px 0;">
                                                                                            <div class="h5">Bank
                                                                                                Details
                                                                                            </div>
                                                                                        </div>
                                                                                        @php
                                                                                            $banks = App\Models\bank_detail::where('player_id', $item->id)->get();
                                                                                        @endphp
                                                                                        <div class="table-responsive">
                                                                                        </div>
                                                                                        <table
                                                                                            class="table table-striped table-bordered">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th>ID</th>
                                                                                                    <th>Bank Name</th>
                                                                                                    <th>Account Number</th>
                                                                                                    <th>IFSC Code</th>
                                                                                                    <th>Account Holder Name</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @foreach ($banks as $bank)
                                                                                                    <tr>
                                                                                                        <td>{{ $bank->id }}
                                                                                                        </td>
                                                                                                        <td>{{ $bank->bank_name }}
                                                                                                        </td>
                                                                                                        <td>{{ $bank->account_number }}
                                                                                                        </td>
                                                                                                        <td>{{ $bank->ifsc_code }}
                                                                                                        </td>
                                                                                                        <td>{{ $bank->account_name }}
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                @endforeach
                                                                                            </tbody>
                                                                                        </table>

                                                                                    </div>
                                                                                @endcan
                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                    <div class="col-md-6 ">
                                                                        <div
                                                                            class="card border-top border-0 border-4 border-white">
                                                                            @can('Deposit Feedback')
                                                                                <div class="card-body p-5">
                                                                                    <form id="noteForm"
                                                                                        action="{{ route('client.note') }}"
                                                                                        method="POST">
                                                                                        @csrf
                                                                                        <div class="card-heaer-cus">
                                                                                            <div class="h5">
                                                                                                FeedBack
                                                                                            </div>
                                                                                        </div>
                                                                                        <br>
                                                                                        <textarea id="mytextarea_{{ $item->id }}" name="feedback"></textarea>
                                                                                        <script>
                                                                                            tinymce.init({
                                                                                                selector: "#mytextarea_{{ $item->id }}",
                                                                                                plugins: "autoresize",
                                                                                                toolbar: "undo redo | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link",
                                                                                            });
                                                                                        </script>
                                                                                        <div>
                                                                                            <br>
                                                                                            <input type="hidden" name="user_id"
                                                                                                value="{{ $item->id }}">
                                                                                            <div
                                                                                                class="d-flex justify-content-center">
                                                                                                <button class="btn btn-primary"
                                                                                                    style="margin-right: -5px"
                                                                                                    type="submit"
                                                                                                    id="saveNoteBtn">Save</button>
                                                                                            </div>
                                                                                    </form>
                                                                                    <div class="container py-2">

                                                                                        @php
                                                                                            $feedback = App\Models\feedback::where('user_id', $item->id)->get();
                                                                                        @endphp

                                                                                        @foreach ($feedback as $feedback)
                                                                                            <div class="row">
                                                                                                <div class="col py-2">
                                                                                                    <div
                                                                                                        class="card radius-15">
                                                                                                        <div
                                                                                                            class="card-body d-flex flex-column">
                                                                                                            <h4
                                                                                                                class="card-title text-white">
                                                                                                                {!! $feedback->feedback !!}
                                                                                                            </h4>
                                                                                                            <div
                                                                                                                class="card-text d-flex flex-grow-1">
                                                                                                                <p
                                                                                                                    class="me-auto">
                                                                                                                    {{ $feedback->branchUser->name ?? '' }}
                                                                                                                </p>
                                                                                                                <p>
                                                                                                                    {{ $feedback->created_at }}
                                                                                                                </p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>
                                                                                        @endforeach


                                                                                    </div>
                                                                                </div>
                                                                            @endcan

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                </td>

                                                <td>{{ $item->platformDetail->platform->name ?? '' }}</td>

                                                <td>{{ $item->deposit_amount }}</td>
                                                <td>{{ $item->bonus }}</td>
                                                <td>{{ $item->total_deposit_amount }}</td>
                                                <td>
                                                    @if ($item->image)
                                                        <a href="{{ route('deposit.show', $item->id) }}">
                                                            <img src="{{ asset('storage/' . $item->image) }}"
                                                                alt="Image" style="width: 20%;">
                                                        </a>
                                                    @else
                                                        No Image
                                                    @endif

                                                </td>
                                                <td class="deposit_status">
                                                    <div>
                                                        <select style="width: 110px; text-align: center;"
                                                            class="form-control rolling-type-select deposit_admin"
                                                            id="deposit_admin" name="deposit_admin"
                                                            @if ($item->banker_status === 'Verified') enabled @else disabled @endif
                                                            @cannot('Deposit Admin Enable') disabled @endcan required>
                                                            <option value="Pending"
                                                                @if ($item->admin_status === 'Pending') selected @endif>
                                                                Pending
                                                            </option>
                                                            <option value="Not Verified"
                                                                @if ($item->admin_status === 'Not Verified') selected @endif disabled>
                                                                Not
                                                                Verified</option>
                                                            <option value="Verified"
                                                                @if ($item->admin_status === 'Verified') selected @endif>
                                                                Verified
                                                            </option>
                                                            <option value="Rejected"
                                                                @if ($item->admin_status === 'Rejected') selected @endif>
                                                                Rejected
                                                            </option>
                                                        </select>

                                                    </div>
                                                    <!-- Verified Modal -->
                                                    <div class="modal fade" id="verifiedModal{{ $item->id }}"
                                                        tabindex="-1" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Platform Details</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form>
                                                                        <div class="mb-3">
                                                                            <label for="platform"
                                                                                class="col-form-label">Platform</label>
                                                                            <input type="text" class="form-control"
                                                                                value="{{ $item->platformDetail->platform->name }}"
                                                                                id="platform" readonly>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="user-id"
                                                                                class="col-form-label">User
                                                                                ID</label>
                                                                            <input type="text" class="form-control"
                                                                                value="{{ $item->platformDetail->platform_username }}"
                                                                                id="user-id" readonly>
                                                                            <span id="user-id-error" class="error-message"
                                                                                style="color:red"></span>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="user-password"
                                                                                class="col-form-label">User
                                                                                Password</label>
                                                                            <input type="text" class="form-control"
                                                                                value="{{ $item->platformDetail->platform_password }}"
                                                                                id="user-password" readonly>
                                                                            <span id="user-password-error"
                                                                                class="error-message"
                                                                                style="color:red"></span>
                                                                            <input type="hidden" class="form-control"
                                                                                value="{{ $item->platformDetail->id }}"
                                                                                id="platform_detail_id">
                                                                            <input type="hidden" class="form-control"
                                                                                value="" id="deposit_id">
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <span id="success-message{{ $item->id }}"
                                                                        class="error-message" style="color:green"></span>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    {{--  <button type="button" id="user_platform_active"
                                                                        class="btn btn-primary">Active</button>  --}}
                                                                    <button type="button"
                                                                        class="btn btn-primary user-platform-active"
                                                                        data-modal-id="{{ $item->id }}">Active</button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end -->
                                                </td>


                                                <td>{{ $item->utr }}</td>
                                                <td>
                                                    <div>
                                                        {{--  @dd($item->banker_status);  --}}
                                                        <select style="width: 110px; text-align: center;"
                                                            class="form-control rolling-type-select banker_admin"
                                                            id="banker_admin" name="banker_admin"
                                                            @if ($item->admin_status === 'Verified') disabled @else enabled @endif
                                                            @cannot('Deposit Banker Enable') disabled @endcan required>
                                                            <option value="Pending"
                                                                @if ($item->banker_status === 'Pending') selected @endif>
                                                                Pending
                                                            </option>
                                                            <option value="Verified"
                                                                @if ($item->banker_status === 'Verified') selected @endif>
                                                                Verified
                                                            </option>
                                                            <option value="Rejected"
                                                                @if ($item->banker_status === 'Rejected') selected @endif>
                                                                Rejected
                                                            </option>
                                                        </select>

                                                    </div>
                                                </td>

                                                <td>
                                                    @can('Deposit Admin Enable')
                                                        <a href="#" data-bs-toggle="modal"
                                                            data-id="{{ $item->id }}"
                                                            data-bs-target="#verifiedModal{{ $item->id }}"> <i
                                                                class="fa-solid fa-eye"></i>
                                                        </a>
                                                    @endcan
                                                    @can('Deposit Edit')
                                                        <a href="{{ route('deposit.edit', $item->id) }}"><i
                                                                class="fa-regular fa-pen-to-square"></i></a>
                                                    @endcan
                                                    @can('Deposit Delete')
                                                        <a href="" data-id="{{ $item->id }}"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#exampleSmallModal{{ $item->id }}"><i
                                                                class="fa-solid fa-trash-can"></i></a>
                                                    @endcan
                                                    {{-- <a href="" type="button"  data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal"><i class="fa-solid fa-trash-can"></i></a> --}}
                                                </td>



                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            @endcan
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
    @foreach ($deposit as $frame)
        <div class="modal fade" id="exampleSmallModal{{ $frame->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Delete Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this item?
                        <form id="deleteForm{{ $frame->id }}" method="post"
                            action="{{ route('deposit.delete', $frame->id) }}">
                            @csrf
                            @method('DELETE')
                            {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}

                    </div>
                    <div class="modal-footer">
                        <!-- Add a "Cancel" button that dismisses the modal -->
                        <button type="submit" class="btn btn-danger">Delete</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    @endforeach



    @include('layouts.user_script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable()
        });
    </script>
    <script>
        const btn_icon = document.querySelectorAll('.action-icons');
        console.log(btn_icon, "btn_icon sdxgdfhgh");

        btn_icon.forEach((btn_icons) => {
            btn_icons.addEventListener('click', () => {
                if (btn_icons.classList.contains('clicked')) {
                    // If the button was already clicked, reset it
                    btn_icons.innerHTML = `Not Verified <i class="fa-solid fa-xmark wrong_icon_red"></i>`;
                    // button.classList.add('fas', 'fa-heart');
                    btn_icons.classList.remove('clicked');
                } else {

                    btn_icons.innerHTML = `Verified <i class="fas fa-check righrt_icon_green"></i>`;
                    btn_icons.classList.add('clicked');
                }
            })
        });
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var adminStatus = "{{ url('admin_status') }}";
        var platformDetailActive = "{{ url('platform_detail_active') }}";
        $(document).ready(function() {
            $('#Transaction-History').DataTable({
                lengthMenu: [
                    [6, 10, 20, -1],
                    [6, 10, 20, 'Todos']
                ]
            });

            function displayError(element, errorMessage) {
                element
                    .html(errorMessage)
                    .css("display", "block")
                    .delay(3000)
                    .fadeOut(700);
            }

            $('.deposit_admin').change(function() {
                var selectedValue = $(this).val();
                var rowId = $(this).closest('tr').data('id');
                var platformId = $(this).closest('tr').data('platformid');
                var platformName = $(this).closest('tr').data('platformname');
                // if (selectedValue == "Verified") {
                //     $('#deposit_id').val(rowId);
                //     $('#platform_id').val(platformId);
                //     $('#platform').val(platformName);
                //     $('#verifiedModal').modal('show');
                //     return false;
                // }
                var type = "deposit_admin";
                console.log(selectedValue);
                console.log(rowId);
                console.log(platformId);
                // var test = "sample";
                $.ajax({
                    type: "POST",
                    url: adminStatus,
                    data: {
                        selectedValue: selectedValue,
                        userid: rowId,
                        type: type,
                        platformId: platformId
                    },
                    success: function(response) {
                        // Handle the response if needed
                        response = response[0];
                        if (response.flag == 1) {
                            console.log("inside flag");
                            console.log(response.platform_name);
                            console.log(response.username);
                            console.log(response.password);
                            var modalId = "#verifiedModal" + response.rowid;
                            $(modalId).modal('show');
                            $('#platform').val(response.platform_name);
                            $('#user-id').val(response.username);
                            $('#user-password').val(response.password);
                        }
                    },
                    error: function(xhr) {
                        // Handle the error if needed
                        console.log(xhr.responseText);
                    }
                });
            });
            $(document).on('click', '.user-platform-active', function() {
                var modalId = $(this).data('modal-id'); // Get the modal ID from the button's data attribute
                var modal = $('#verifiedModal' + modalId);
                var userId = modal.find('#user-id').val();
                var userPassword = modal.find('#user-password').val();
                var platformDetailId = modal.find('#platform_detail_id').val();
                var successMessage = $('#success-message' + modalId);
                console.log(userId);
                console.log(platformDetailId);
                if (userId.trim() === '') {
                    displayError($("#user-id-error"), "The User Id field is required");
                    return false;
                }
                if (userPassword.trim() === '') {
                    displayError($("#user-password-error"), "The User Password field is required");
                    return false;
                }
                var selectedValue = "Verified";
                // var rowId = $(this).closest('tr').data('id');
                var rowId = $('#deposit_id').val();

                var type = "deposit_admin";
                console.log(selectedValue);
                console.log(rowId);
                // var test = "sample";
                $.ajax({
                    type: "POST",
                    url: platformDetailActive,
                    data: {
                        platformDetailId: platformDetailId,
                    },
                    success: function(response) {
                        // Display success message in the modal footer
                        response = response[0];
                        if (response.flag == 1) {
                            displayError(successMessage, "Player Activated");
                            {{--  displayError($("#success-message"),
                                "Player Activated");  --}}


                            // Close the modal after a brief delay (e.g., 2 seconds)
                            setTimeout(function() {
                                $('#verifiedModal').modal('hide');
                            }, 2000);
                        }

                    },
                    error: function(xhr) {
                        // Handle the error if needed
                        console.log(xhr.responseText);
                    }
                });
            });

            $('.banker_admin').change(function() {
                var selectedValue = $(this).val();
                var rowId = $(this).closest('tr').data('id');
                var type = "deposit_banker";
                console.log(selectedValue);
                console.log(rowId);
                // var test = "sample";
                $.ajax({
                    type: "POST",
                    dataType: "JSON",
                    url: adminStatus,
                    data: {
                        selectedValue: selectedValue,
                        userid: rowId,
                        type: type
                    },
                    success: function(response) {
                        // Handle the response if needed
                        console.log(response);
                        console.log(response[0]);
                        console.log(response.flag);
                        response = response[0];
                        if (response.flag == 1) {
                            console.log("inside flag");
                            $("table tbody#deposit_tbody tr[data-id='" + rowId +
                                "'] td.deposit_status select").val(response.admin_status);
                        }
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

