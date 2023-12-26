<!doctype html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- @include('layouts.user_link') --}}
    <link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />



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
                        <h6 class="mb-0 text-uppercase">All User</h6>
                    </div>
                    @can('User Add')
                        <div class="col-md-8 d-flex justify-content-end">
                            <a type="button" class="btn btn-light" href="{{ route('UserRegister.create') }}   "
                                class="list-group-item">Add <i class="fa-solid fa-plus fs-18"></i></a>
                        </div>
                    @endcan
                </div>
                @can('User Show')
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Mobile Number</th>
                                            <th>Lead source</th>
                                            <th>Location</th>
                                            {{-- <th>Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endcan
            </div>
        </div>
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
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
        $(document).ready(function() {
    $('#example').DataTable({
        serverSide: true,
        processing: true,
        ajax: {
            url: '/your-server-side-endpoint',
            type: 'POST', // Use POST or GET as needed
        },
        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'mobile' },
            { data: 'lead_source_name' }, // Adjust this based on your server response
            { data: 'location' },
        ],
        // Additional options and configurations
    });
});

    </script>
    <script src="{{ asset('assets/js/pages/player.js') }}"></script>
    <script src="{{ asset('assets/js/copy-platformdetails.js') }}"></script>
</body>

</html>
