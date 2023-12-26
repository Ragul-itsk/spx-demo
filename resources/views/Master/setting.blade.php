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
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    {{--  <div class="breadcrumb-title pe-3">Components</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Cards</li>
							</ol>
						</nav>
					</div>  --}}
                    {{--  <div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-light">Settings</button>
							<button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div>
					</div>  --}}
                </div>
                <!--end breadcrumb-->

                <!--end row-->
                {{--  <h6 class="mb-0 text-uppercase">Card-Keerthana</h6>
				<hr/>  --}}
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            @can('Generals')

                                <div class="card-body">
                                    <h5 class="card-title">General</h5>

                                </div>
                                @can('Branch')
                                    <ul class="list-group list-group-flush h-250">
                                        <a href="{{ route('branch.index') }}" class="list-group-item">Branch</a>
                                        <a href="{{ route('ourbankdetail.index') }}" class="list-group-item">Bank</a>
                                    </ul>
                                @endcan









                            @endcan

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            @can('User And Control')
                                <div class="card-body">
                                    <h5 class="card-title">User And Control</h5>

                                </div>
                                <ul class="list-group list-group-flush h-250">
                                    @can('Users')
                                        <a href="{{ route('user.index') }}" class="list-group-item">Users</a>
                                    @endcan
                                    @can('Role')
                                        <a href="{{ route('role.index') }}" class="list-group-item">Roles</a>
                                    @endcan
                                    @can('Permission')
                                        <a href="{{ route('permission.index') }}" class="list-group-item">Permission</a>
                                    @endcan
                                </ul>
                            @endcan
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            @can('Lead Setting')
                                <div class="card-body">
                                    <h5 class="card-title">Lead Setting</h5>

                                </div>
                                <ul class="list-group list-group-flush h-250">
                                    @can('Leadsource')
                                        <a href="{{ route('lead.index') }}   " class="list-group-item">Lead Source</a>
                                    @endcan
                                    @can('Platform')
                                        <a href="{{ route('platform.index') }}" class="list-group-item">Platform</a>
                                    @endcan
                                </ul>
                            @endcan
                        </div>
                    </div>
                    {{--  <div class="col-md-3">
						<div class="card">

							<div class="card-body">
								<h5 class="card-title">Card title</h5>

							</div>
							<ul class="list-group list-group-flush h-250">
								<li class="list-group-item">Cras justo odio</li>
								<li class="list-group-item">Dapibus ac facilisis in</li>
								<li class="list-group-item">Vestibulum at eros</li>
							</ul>

						</div>
					</div>  --}}
                </div>
            </div>
        </div>
        <!--end page wrapper -->
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

    @include('layouts.user_script')

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
