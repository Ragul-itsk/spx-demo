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

                <div class="row justify-content-between align-items-center">
                    <div class="col-md-4">
                        <h6 class="mb-0 text-uppercase">All User Details</h6>
                    </div>

                    <div class="col-md-8 d-flex justify-content-end">

                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-filter">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="searchName">User Name</label>
                                        <input type="text" id="searchName" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="searchMobile">Mobile</label>
                                        <input type="text" id="searchMobile" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="searchEmail">Email</label>
                                        <input type="text" id="searchEmail" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="searchSource">Lead Source</label>
                                        <input type="text" id="searchSource" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="table-responsive">
                            @can('User Report Show')

                                <table id="example" class="table table-striped table-bordered" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User Name</th>
                                            <th>Email</th>
                                            <th>Mobile Number</th>
                                            <th>Lead source</th>
                                            <th>View</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($userRegistration as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td> {{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->mobile }}</td>
                                                <td>{{ $item->leadSource->name }}</td>
                                                <td>
                                                    <div
                                                        class="d-flex align-items-center theme-icons shadow-sm p-2 cursor-pointer rounded">
                                                        <div class="font-22 text-white"> <a
                                                                class="d-flex align-items-center nav-link " href="#"
                                                                type="button" class="btn btn-primary"
                                                                data-bs-toggle="modal" data-id="{{ $item->id }}"
                                                                data-bs-target="#exampleModal{{ $item->id }}"> <i
                                                                    class="fadeIn animated bx bx-show-alt"></i>
                                                        </div>

                                                    </div>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal{{ $item->id }}"
                                                        tabindex="-1" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content bg-white">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5 text-black"
                                                                        id="exampleModalLabel">Game Details</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                @php
                                                                    $gamedetails = App\Models\PlatformDetails::where('player_id', $item->id)->get();
                                                                @endphp

                                                                @foreach ($gamedetails as $gamedetails)
                                                                    <div class="modal-body bg-black">
                                                                        <ul class="list-group list-group-flush">
                                                                            <li
                                                                                class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                                                <h6 class="mb-0">User Name

                                                                                </h6>
                                                                                <span class="text-white">
                                                                                    {{ $gamedetails->player->name }}</span>
                                                                            </li>
                                                                            <li
                                                                                class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                                                <h6 class="mb-0"> Platform Name</h6>
                                                                                <span
                                                                                    class="text-white">{{ $gamedetails->platform->name }}</span>
                                                                            </li>
                                                                            <li
                                                                                class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                                                <h6 class="mb-0">Game User Name</h6>
                                                                                <span
                                                                                    class="text-white">{{ $gamedetails->platform_username }}</span>
                                                                            </li>
                                                                            <li
                                                                                class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                                                <h6 class="mb-0">Game Password</h6>
                                                                                <span
                                                                                    class="text-white">{{ $gamedetails->platform_password }}</span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                @endforeach
                                                                <div class="modal-footer">
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
    <!-- userdetail canva  -->

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">

        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">
                Offcanvas right
            </h5>
            <button type="button" class="btn-close icon-close new-meth" data-bs-dismiss="offcanvas"
                aria-label="Close"><i class="fa-regular fa-circle-xmark"></i></button>
        </div>
        <div class="offcanvas-body">
            <div class="">
                <div class="page-content">
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Forms</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item">
                                        <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Form Layouts
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="ms-auto">
                            <div class="btn-group">
                                <button type="button" class="btn btn-light">
                                    Settings
                                </button>
                                <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split"
                                    data-bs-toggle="dropdown">
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
                                    <a class="dropdown-item" href="javascript:;">Action</a>
                                    <a class="dropdown-item" href="javascript:;">Another action</a>
                                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:;">Separated link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end breadcrumb-->
                    <div class="row">
                        <div class="col-xl-12 mx-auto">
                            <h6 class="mb-0 text-uppercase">Basic Form</h6>
                            <hr>
                            <div class="card border-top border-0 border-4 border-white">
                                <div class="card-body p-5">
                                    <div class="card-title d-flex align-items-center">
                                        <div>
                                            <i class="bx bxs-user me-1 font-22 text-white"></i>
                                        </div>
                                        <h5 class="mb-0 text-white">
                                            User Creation
                                        </h5>
                                    </div>



                                    <hr>

                                    <form class="row g-3">
                                        <div class="col-12">
                                            <label for="inputAddress" class="form-label">Address</label>
                                            <textarea class="form-control" id="inputAddress" placeholder="Address..." rows="3"></textarea>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                                <label class="form-check-label" for="gridCheck">Check me out</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-light px-5">
                                                Register
                                            </button>
                                        </div>
                                    </form>

                                    <div class="container py-2">
                                        <h2 class="font-weight-light text-center text-white py-3">Chat </h2>
                                        <!-- timeline item 1 -->
                                        <div class="row">
                                            <!-- timeline item 1 left dot -->
                                            <div class="col-auto text-center flex-column d-none d-sm-flex">
                                                <div class="row h-50">
                                                    <div class="col">&nbsp;</div>
                                                    <div class="col">&nbsp;</div>
                                                </div>
                                                <h5 class="m-2">
                                                    <span class="badge rounded-pill bg-light border">&nbsp;</span>
                                                </h5>
                                                <div class="row h-50">
                                                    <div class="col border-end">&nbsp;</div>
                                                    <div class="col">&nbsp;</div>
                                                </div>
                                            </div>
                                            <!-- timeline item 1 event content -->
                                            <div class="col py-2">
                                                <div class="card radius-15">
                                                    <div class="card-body">
                                                        <div class="float-end">Mon, Jan 9th 2020 7:00 AM</div>
                                                        <h4 class="card-title text-white">Orientation</h4>
                                                        <p class="card-text">Welcome to the campus, introduction and
                                                            get started with the tour.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->

                                        <div class="row">
                                            <!-- timeline item 1 left dot -->
                                            <div class="col-auto text-center flex-column d-none d-sm-flex">
                                                <div class="row h-50">
                                                    <div class="col">&nbsp;</div>
                                                    <div class="col">&nbsp;</div>
                                                </div>
                                                <h5 class="m-2">
                                                    <span class="badge rounded-pill bg-light border">&nbsp;</span>
                                                </h5>
                                                <div class="row h-50">
                                                    <div class="col border-end">&nbsp;</div>
                                                    <div class="col">&nbsp;</div>
                                                </div>
                                            </div>
                                            <!-- timeline item 1 event content -->
                                            <div class="col py-2">
                                                <div class="card radius-15">
                                                    <div class="card-body">
                                                        <div class="float-end">Mon, Jan 9th 2020 7:00 AM</div>
                                                        <h4 class="card-title text-white">Orientation</h4>
                                                        <p class="card-text">Welcome to the campus, introduction and
                                                            get started with the tour.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <!-- timeline item 1 left dot -->
                                            <div class="col-auto text-center flex-column d-none d-sm-flex">
                                                <div class="row h-50">
                                                    <div class="col">&nbsp;</div>
                                                    <div class="col">&nbsp;</div>
                                                </div>
                                                <h5 class="m-2">
                                                    <span class="badge rounded-pill bg-light border">&nbsp;</span>
                                                </h5>
                                                <div class="row h-50">
                                                    <div class="col border-end">&nbsp;</div>
                                                    <div class="col">&nbsp;</div>
                                                </div>
                                            </div>
                                            <!-- timeline item 1 event content -->
                                            <div class="col py-2">
                                                <div class="card radius-15">
                                                    <div class="card-body">
                                                        <div class="float-end">Mon, Jan 9th 2020 7:00 AM</div>
                                                        <h4 class="card-title text-white">Orientation</h4>
                                                        <p class="card-text">Welcome to the campus, introduction and
                                                            get started with the tour.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- end -->

    <!-- canva end -->


    @include('layouts.user_script')

    <script>
        $(document).ready(function() {
            $("#searchName, #searchMobile").on("keyup", function() {

                var nameFilter = $("#searchName").val().toLowerCase();
                alert(nameFilter);
                var mobileFilter = $("#searchMobile").val().toLowerCase();
                var emailFilter = $("#searchEmail").val().toLowerCase();
                var sourceFilter = $("#searchSource").val().toLowerCase();

                $("table tbody tr").each(function() {
                    var name = $(this).find("td:nth-child(2)").text().toLowerCase();
                    var mobile = $(this).find("td:nth-child(3)").text().toLowerCase();
                    var email = $(this).find("td:nth-child(4)").text().toLowerCase();
                    var source = $(this).find("td:nth-child(5)").text().toLowerCase();

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
    </script>
    <script src="assets/js/index.js"></script>
    <script>
        new PerfectScrollbar('.product-list');
        new PerfectScrollbar('.customers-list');
    </script>
</body>

</html>
