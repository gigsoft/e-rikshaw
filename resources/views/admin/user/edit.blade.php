@extends('admin.layouts.app',['layout'=>'users'])
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit User</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{route('admin.user')}}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->

        <!-- /.card -->
    </section>
    <!-- /.content -->
    <form action="{{ route('admin.user.update', $user->id) }}" method="post">
        @csrf

        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="storeName">Store Name</label>
                                <select id="storeName" name="storeName" class="form-control" required>
                                    <option value="">Select Store</option>
                                    @foreach ($store as $store)
                                        <option value="{{ $store->id }}" {{ $user->store_id == $store->id ? 'selected' : '' }}>
                                            {{ $store->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Update</button>
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
            var email = $('#email').val();
            var password = $('#password').val();
            var cpassword = $('#cpassword').val();
            var store = $('#store').val();

            // Perform client-side validation
            var isValid = true;

            if (name === '') {
                $('#name-error').text('Name is required.');
                isValid = false;
            }

            if (email === '') {
                $('#email-error').text('Email is required.');
                isValid = false;
            }
            if (store === '') {
                $('#store-error').text('Store is required.');
                isValid = false;
            }

            if (password === '') {
                $('#password-error').text('Password is required.');
                isValid = false;
            }

            if (cpassword === '') {
                $('#cpassword-error').text('Confirm Password is required.');
                isValid = false;
            }

            if (password !== cpassword) {
                $('#cpassword-error').text('Passwords do not match.');
                isValid = false;
            }

            // If the form is valid, submit it
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
