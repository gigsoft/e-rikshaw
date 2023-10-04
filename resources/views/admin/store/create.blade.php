@extends('admin.layouts.master',['layout'=>'store'])

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Store</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.store') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.store.store.add') }}" method="post" id="store-form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                                    <span class="text-danger" id="name-error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Address" required>
                                    <span class="text-danger" id="address-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone_no">PHONE NO</label>
                                    <input type="text" name="phone_no" id="phone_no" class="form-control" placeholder="PHONE NO" required>
                                    <span class="text-danger" id="phone_no-error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                                    <span class="text-danger" id="email-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="image"> Image</label>
                                    <input type="file" name="image" id="image" class="form-control mb-2" placeholder="IMAGE" required>
                                    {{-- <img id="image" src="{{asset('admin-assets/img/default-150x150.png')}}" alt="Profile Image Preview" class="preview-image"> --}}
                                    <img id="image-preview" src="{{ asset('admin-assets/img/default-150x150.png') }}" alt="Image Preview" class="preview-image" style="max-width: 150px; max-height: 150px;">
                                    {{-- <input type="file" id="image" name="image" accept="image/*"> --}}

                                </div>
                            </div>
                        </div>
                        <div class="pb-5 pt-3">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

@section('customJs')
    <script>
        $(document).ready(function() {
            $('#store-form').submit(function(e) {
                e.preventDefault(); // Prevent the form from submitting

                // Reset any previous error messages
                $('.text-danger').text('');

                // Get the form values
                var name = $('#name').val();
                var address = $('#address').val();
                var phone_no = $('#phone_no').val();
                var email = $('#email').val();
                var image = $('#image').val();

                // Perform client-side validation
                var isValid = true;

                if (name === '') {
                    $('#name-error').text('Name is required.');
                    isValid = false;
                }
                if (address === '') {
                    $('#address-error').text('Address is required.');
                    isValid = false;
                }
                if (phone_no === '') {
                    $('#phone_no-error').text('Phone No is required.');
                    isValid = false;
                }
                if (email === '') {
                    $('#email-error').text('Email is required.');
                    isValid = false;
                }
                if (image === '') {
                    $('#image-error').text('Image is required.');
                    isValid = false;
                }

                // If the form is valid, submit it
                if (isValid) {
                    this.submit();
                }
            });
        });
        $(document).ready(function() {
        // Add change event listener to file input
        $('#image').on('change', function(e) {
            // Get the selected file
            var file = e.target.files[0];

            // Create a FileReader
            var reader = new FileReader();

            // Set an event listener for the FileReader
            reader.onload = function(e) {
                // Update the src attribute of the image preview element with the data URL
                $('#image-preview').attr('src', e.target.result);
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(file);
        });
    });
            </script>
@endsection

@section('flash')
    @include('admin.flash_message.message')
@endsection
