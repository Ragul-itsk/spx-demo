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

        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                @if (session('success'))
                    <div id="success-message" class="alert border-0 alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0 text-white"> {{ session('success') }}</h6>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (Session('danger'))
                    <div class="alert border-0 alert-dismissible fade show" style="background-color: #d9534f">
                        <div class="text-white"> {{ session('danger') }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif



                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-0 text-uppercase">Page is Under Maintenance</h6>
                    </div>
                </div>
            </div>
        </div>
        <!--end page wrapper -->

</body>

</html>
