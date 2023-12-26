<!doctype html>
<html lang="en">

<head>
    @include('layouts.user_link')
    <link href="{{ asset('assets/plugins/fancy-file-uploader/fancy_fileupload.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css') }}" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body class="bg-theme bg-theme2">
    <!--wrapper-->
    <div class="wrapper">
        {{--  sidebar  --}}
        @include('layouts.sidebar')

        @include('layouts.header')



        <div class="page-wrapper">
            <div class="page-content">


                <div class="page-content">
                    <div class="row">
                        <div class="col-xl-12 mx-auto">
                            <h6 class="mb-0 text-uppercase">Create Player</h6>
                            <hr />
                            <div class="card border-top border-0 border-4 border-white">
                                <div class="card-body p-5">
                                    <div class="card-title d-flex align-items-center">
                                        <div>
                                            <i class="bx bxs-user me-1 font-22 text-white"></i>
                                        </div>
                                        <h5 class="mb-0 text-white">
                                            Player Creation
                                        </h5>
                                    </div>
                                    <form action="{{ route('player_files.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-9 mx-auto">
                                                <h6 class="mb-0 text-uppercase">Image Uploadify</h6>
                                                <hr />
                                                <div class="card">
                                                    <div class="card-body">
                                                        <input id="image-uploadify" name="excel_file" type="file"
                                                            accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf"
                                                            multiple>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="please-wait-message" style="display: none;">
                                            Please wait...
                                        </div>
                                        <button type="submit" id="upload-file" class="form-control">Upload Excel File</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <script src="{{ asset('assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/js/player_register.js') }}"></script>
    <script>


        function showPleaseWaitMessage() {
            // Display the "Please wait" message
            document.getElementById('please-wait-message').style.display = 'block';

            // Submit the form
            // You can choose to submit the form using AJAX or a regular form submission, depending on your needs
        }

        
        const imageInput = document.getElementById('imageInput');
        const imagePreview = document.getElementById('imagePreview');

        imageInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.innerHTML = '<img src="' + e.target.result + '" alt="Image Preview" />';
                };

                reader.readAsDataURL(this.files[0]);
            }
        });

        imagePreview.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.style.border = '2px dashed #007bff';
        });

        imagePreview.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.style.border = '2px dashed #ccc';
        });

        imagePreview.addEventListener('drop', function(e) {
            e.preventDefault();
            this.style.border = '2px dashed #ccc';

            const file = e.dataTransfer.files[0];
            if (file && file.type.match('image/*')) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.innerHTML = '<img src="' + e.target.result + '" alt="Image Preview" />';
                };

                reader.readAsDataURL(file);
                imageInput.files = e.dataTransfer.files;
            }
        });
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var platform_selected = "{{ url('platform_selected') }}";
    </script>
    <script type="text/javascript">
        var ct = 1;

        function new_link() {
            ct++;
            var div1 = document.createElement('div');
            div1.id = ct;
            // link to delete extended form elements
            var delLink =
                '<div style="text-align:right;margin-right:65px"><a class="btn btn-light px-5" href="javascript:delIt(' +
                ct +
                ')">Delete</a></div>';
            div1.innerHTML = document.getElementById('newlinktpl').innerHTML + delLink;
            document.getElementById('newlink').appendChild(div1);
        }
        // function to delete the newly added set of elements
        function delIt(eleId) {
            d = document;
            var ele = d.getElementById(eleId);
            var parentEle = d.getElementById('newlink');
            parentEle.removeChild(ele);
        }
    </script>
    <script>
        $('#fancy-file-upload').FancyFileUpload({
            params: {
                action: 'fileuploader'
            },
            maxfilesize: 1000000
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#image-uploadify').imageuploadify();
        })
    </script>
    <script>
        $(document).ready(function() {

            $('.select2').select2({
                placeholder: "-- Select an option --",
                allowClear: true
            });

            $('#Transaction-History').DataTable({
                lengthMenu: [
                    [6, 10, 20, -1],
                    [6, 10, 20, 'Todos']
                ]
            });
        });

        var delayTimer;

        $('#utr').on('input', function() {
            var utr = $(this).val();

            // Clear the previous delay timer
            clearTimeout(delayTimer);

            // Set a new delay timer to trigger the AJAX request after 1 second (1000 milliseconds)
            delayTimer = setTimeout(function() {
                if (utr.length > 0) {
                    $.ajax({
                        url: '/check-utr',
                        method: 'GET',
                        data: {
                            utr: utr
                        },
                        success: function(response) {
                            if (response.exists) {
                                $('#utr-exists').html('UTR already exists').css(
                                    'background-color', 'white');
                            } else {
                                $('#utr-exists').html('');
                            }
                        },
                    });
                } else {
                    $('#utr-exists').text('');
                }
            }, 1000); // 1000 milliseconds (1 second)
        });
    </script>


</body>

</html>
