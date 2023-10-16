@extends('admin.layouts.master',['layout'=>'vehicles'])
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Model</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{route('admin.vehicle.models')}}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </section>

    <form action="{{ route('admin.vehicle.model.store') }}" method="post" id="user-form">
        @csrf
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                 <span class="text-danger" id="name-error"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>
    </form>
@endsection
@section('customJs')
<script>
    $(document).ready(function() {
        $('#user-form').submit(function(e) {
            e.preventDefault(); // Prevent the form from submitting

            // Reset any previous error messages
            $('.text-danger').text('');

            // Get the form values
            var name = $('#name').val();
            // var email = $('#email').val();
            // var password = $('#password').val();
            // var cpassword = $('#cpassword').val();

            // Perform client-side validation
            var isValid = true;

            if (name === '') {
                $('#name-error').text('Name is required.');
                isValid = false;
            }
            if (isValid) {
                this.submit();
            }
        });
    });
</script>
@endsection
@section('flash')
  @include('admin.flash_message.message')
@endsection
