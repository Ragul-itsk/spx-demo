
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
          <div class="row justify-content-between align-items-center">
              <div class="col-md-4">
              <h6 class="mb-0 text-uppercase">Create User</h6>
              </div>
          </div>
           <hr />
            <div class="card">
              <div class="card-body">
                  <form class="row g-3" action="{{route('user.store')}}" method="POST">
                    @csrf
                      <div class="col-md-12">
                        <label for="inputFirstName" class="form-label">Name <span class="mandatory-field">*</span></label>
                        <input type="text" name="name" class="form-control" >
                        @error('name')
                                <span class="error" style="color: red;">{{ $message }}</span>
                                @enderror
                      </div>
                      <div class="col-md-12">
                        <label for="inputFirstName" class="form-label">Email <span class="mandatory-field">*</span></label>
                        <input type="email" name="email" class="form-control" >
                        @error('email')
                        <span class="error" style="color: red;">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="col-md-12">
                        <label for="inputFirstName" class="form-label">Mobile <span class="mandatory-field">*</span></label>
                        <input type="text" name="mobile" class="form-control" >
                        @error('mobile')
                        <span class="error" style="color: red;">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="col-md-12">
                        <label for="inputFirstName" class="form-label">Password <span class="mandatory-field">*</span></label>
                        <input type="password" name="password" class="form-control" >
                        @error('password')
                        <span class="error" style="color: red;">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="col-md-12">
                        <label for="inputFirstName" class="form-label">Confirm_Password <span class="mandatory-field">*</span></label>
                        <input type="password" name="confirm_password" class="form-control" >
                        @error('confirm_password')
                        <span class="error" style="color: red;">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="col-md-12">
                        <label for="inputFirstName" class="form-label">Branch <span class="mandatory-field">*</span></label>

                        <div class="col-md-12">
                            <select name="branch_id" id="" class="form-control">
                                <option value="">Select Branch</option>
                                @foreach ($branch as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                            </select>
                            @error('branch_id')
                            <span class="error" style="color: red;">{{ $message }}</span>
                            @enderror
                          </div>

                      </div>

                      <div class="col-md-12">
                        <label for="inputFirstName" class="form-label">Role <span class="mandatory-field">*</span></label>

                        <div class="col-md-12">
                            <select name="role" id="" class="form-control">
                                <option value="">Select Role</option>
                                @foreach ($role as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                            </select>
                            @error('role')
                            <span class="error" style="color: red;">{{ $message }}</span>
                            @enderror
                          </div>

                      </div>

                      <div class="col-12">
                          <button type="submit" class="btn btn-light px-5">
                            Submit
                          </button>
                            <a href="{{ route('user.index') }}" class="btn btn-light px-5">Cancel</a>
                        
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
