<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png" />

    @include('layouts.user_link')
    <title>SikanderPlayx</title>

</head>

<body class="bg-theme bg-theme2">
    @include('components.success-alert')
    <!--wrapper-->
    <div class="wrapper"> {{-- sidebar --}}
        @include('layouts.sidebar')
        @include('layouts.header')
        {{-- body content --}}
        <div class="page-wrapper">
            <div class="page-content">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-4">
                        <h6 class="mb-0 text-uppercase">Deposit Report</h6>
                    </div>
                    {{-- @can('User Add')
                        <div class="col-md-8 d-flex justify-content-end">
                            <a type="button" class="btn btn-light" href="{{ route('UserRegister.create') }} "
                                class="list-group-item">Add <i class="fa-solid fa-plus fs-18"></i></a>
                        </div>
                    @endcan --}}
                </div> @can('User Show')
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="start_date">Start Date:</label>
                                    <input type="date" class="form-control" id="start_date">
                                </div>
                                <div class="col-md-3">
                                    <label for="end_date">End Date:</label>
                                    <input type="date" class="form-control" id="end_date">
                                </div>
                                <div class="col-md-3">
                                    <label for="created_by">Created By:</label>
                                    <select name="created_by" id="created_by" class="form-control">
                                        <option value="">Select User </option>
                                        @foreach ($created_by as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="platform">Platform:</label>
                                    <select name="platform" id="platform" class="form-control">
                                        <option value="">Select Platform </option>
                                        @foreach ($platforms as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <div class="filter-btn">
                                        <button id="applyFilterButton" class="form-control btn">Apply
                                            Filter</button>
                                        </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <span class="report-result">
                                        <label>Total Record</label> <br>
                                        <span id="totalRecords">...</span>
                                    </span>

                                </div>
                                <div class="col-md-3">
                                    <span class="report-result">
                                        <label>Total Deposit</label> <br>
                                        <span id="totalDepositAmount">...</span>
                                    </span>

                                </div>
                                <div class="col-md-3">
                                    <span class="report-result">
                                        <label>Total Bonus</label> <br>
                                        <span id="totalBonus">...</span>
                                    </span>

                                </div>
                                <div class="col-md-3">
                                    <span class="report-result">
                                        <label>Total Amount</label> <br>
                                        <span id="totalTotalDepositAmount">...</span>
                                    </span>

                                </div>
                            </div>

                            <table id="all-deposits-report-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>UTRN</th>
                                        <th>User Name</th>
                                        <th>D.Amount</th>
                                        <th>Bonus</th>
                                        <th>Image</th>
                                        <th>TD.Amount</th>
                                        <th>Admin Status</th>
                                        <th>Banker Status</th>
                                        <th>CC Status</th>
                                        <th>Created By</th>
                                        <!-- Add more table headers for other columns -->
                                    </tr>
                                </thead>
                            </table>
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

    <!-- delete modal -->
    {{-- <button class="delete-btn" data-id="123">Delete User</button> --}}

    <!-- Delete Modal -->
    {{-- <div class="modal" id="myModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Delete Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this item?
                <span class="close">&times;</span>
                <p>User ID: <span id="userIdInModal"></span></p>
                <form method="POST" action="" id="deleteForm">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="">
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}
    {{-- <div id="deleteConfirmationModal" class="modal">
        <div class="modal-dialog modal-sm">
            <div class="modal-body">
                <p>Are you sure you want to delete this item?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default modal-close">Cancel</button>
                <button class="btn btn-danger" id="confirmDelete">Delete</button>
            </div>
        </div>
    </div> --}}

    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Profile Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you want to delete the record?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary modal-close" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger" id="confirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>


    </div>



    <!-- Add this to your HTML body section -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Image will be displayed here -->
                </div>
            </div>
        </div>
    </div>

    @include('layouts.user_script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var successAlertRoute = @json(route('success-alert'));
    </script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>

    <script src="{{ asset('assets/js/pages/backend-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/copy-platformdetails.js') }}"></script>
</body>

</html>
