<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{asset('assets/images/favicon-32x32.png')}}" type="image/png" />

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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content bg-white">
          <div class="modal-header">
            <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">Profile Details</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body bg-black">
              <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      <h6 class="mb-0">User Name</h6>
                      <span class="text-white">Kamal Durai</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      <h6 class="mb-0">Mobile No</h6>
                      <span class="text-white">1234567890</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      <h6 class="mb-0">Platform Paying</h6>
                      <span class="text-white">@Sikander</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      <h6 class="mb-0">Account Id</h6>
                      <span class="text-white">#23333334</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
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
              <h6 class="mb-0 text-uppercase">Role List</h6>
              </div>

            <div class="col-md-8 d-flex justify-content-end">

            </div>
          </div>

            <hr />
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                    @can('Role Show')


                  <table
                    id="example"
                    class="table table-striped table-bordered"
                    style="width: 100%"
                  >
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Role</th>

                        <th>Action</th>

                      </tr>
                    </thead>
                    <tbody>
                        @if (!empty($all_roles))


                        @foreach ($all_roles as $item)
                        <tr>
                           <td>{{$item->id}}</td>
                           <td>{{$item->name}}</td>

                           <td>
                            @can('Role Edit')


                            <a href="{{route('role.edit',$item->id)}}"><i class="fa-regular fa-pen-to-square"></i></a>
                            @endcan
                           </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                  </table>
                  @endcan
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--end page wrapper -->



		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
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
			<hr/>
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


    {{--  modal code  --}}
    {{-- @foreach ($platformdata as $frame)
          <div class="modal fade" id="exampleSmallModal{{$frame->id}}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"> Delete Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this item?
                                <form id="deleteForm{{$frame->id}}" method="post" action="{{ route('platform.delete', ['id' => $frame->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                             <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach --}}

{{--
    @foreach ($leaddata as $frame)
<div class="modal fade" id="deleteModal{{$frame->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this item?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form id="deleteForm{{$frame->id}}" method="post" action="{{ route('lead.delete', ['id' => $frame->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach  --}}
	<!--end switcher-->

    @include('layouts.user_script')

	<script>
		$(document).ready(function() {
			$('#Transaction-History').DataTable({
				lengthMenu: [[6, 10, 20, -1], [6, 10, 20, 'Todos']]
			});
		  } );
	</script>
	<script src="assets/js/index.js"></script>
	<script>
		new PerfectScrollbar('.product-list');
		new PerfectScrollbar('.customers-list');
	</script>
</body>

</html>
