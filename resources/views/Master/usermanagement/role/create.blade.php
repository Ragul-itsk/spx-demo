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
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-4">
                        <h6 class="mb-0 text-uppercase">Create Permission</h6>
                    </div>
                </div>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <form class="row g-3" action="{{ route('role.store') }}" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <label for="inputFirstName" class="form-label">Role Name</label>
                                <input type="text" name="name" class="form-control">
                                @error('name')
                                    <span class="error" style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <h6 class="mb-0 text-uppercase">Bordered tables</h6>
                                <hr />
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Module</th>
                                                    <th scope="col">Permission</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @if ($permissionGroups->count())
                                                    @foreach ($permissionGroups as $permissionGroup)
                                                        <tr>
                                                            <td width="30%">{{ $permissionGroup->name }}</td>
                                                            <td>
                                                                <div class="row">
                                                                    @if ($permissionGroup->permissions->count())
                                                                        @php
                                                                            $permission = Spatie\Permission\Models\Permission::where('permission_group_id', $permissionGroup->id)->get();
                                                                        @endphp
                                                                        @foreach ($permission as $key => $value)
                                                                            <div class="d-flex flex-wrap">
                                                                                <label>
                                                                                    <input class="form-check-input"
                                                                                        name="permission[]"
                                                                                        type="checkbox"
                                                                                        value="{{ $value->id }}"
                                                                                        id="invalidCheck">

                                                                                    {{ $value->name }}
                                                                                </label>
                                                                            </div>
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                            {{--  <tbody>
                                       <tr>
                                        @foreach ($permission as $item)
                                          <th>
                                            {{$item->permission_group_id}}
                                          </th>
                                          @endforeach

                                          @php
                                          $permissions =  Spatie\Permission\Models\Permission::where('permission_group_id', $item->permission_group_id)->get();
                                      @endphp
                                          @foreach ($permissions as $key => $value)
                                          <td class="d-flex flex-wrap" style="gap: 16px;" >

                                            <div class="col-md-12">
                                               <label>
                                               <input class="form-check-input" name="permission[]"
                                                  type="checkbox" value="{{ $value->id }}"
                                                  id="invalidCheck">
                                               {{ $value->name }}</label>
                                            </div>
                                          </td>
                                            @endforeach


                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">Default checkbox</label>
                                             </div>



                                       </tr>

                                       <tr>
                                          <th>2</th>
                                          <td>Jacob</td>
                                       </tr>

                                    </tbody>  --}}
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{--  <div class="col-md-12">
                           <label for="inputFirstName" class="form-label">Permission:</label>
                           @foreach ($permission as $key => $value)
                           <div class="col-md-12">
                              <label>
                              <input class="form-check-input" name="permission[]"
                                 type="checkbox" value="{{ $value->id }}"
                                 id="invalidCheck">
                              {{ $value->name }}</label>
                           </div>
                           @endforeach
                        </div>  --}}
                            <div class="col-12">
                                <button type="submit" class="btn btn-light px-5">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-light px-5">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>
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
