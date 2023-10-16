@extends('admin.layouts.master',['layout'=>'users'])
@section('content')
    <!-- Content Header (Page header) -->
    <style>

</style>
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create User</h1>
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
    <form action="{{ route('admin.user.store') }}" method="post" id="user-form">
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
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                                <span class="text-danger" id="email-error"></span>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                <span class="text-danger" id="password-error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">Confirm Password</label>
                                <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Password">
                                <span class="text-danger" id="cpassword-error"></span>
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
                                        <option value="{{ $store->id }}">{{ $store->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="mb-3">
                                <label for="role">Role</label>
                                 <select id="role" name="role" class="form-control" required>
                                    <option value="">Select Role</option>
                                    @foreach ($role as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="inline field">
                                     <label for="permission">Permissions</label>
                                       <select name="permission[]" multiple class="label ui selection fluid dropdown">
                                                <option value="">Select Role</option>
                                                @foreach ($permission as $permissions)
                                                       <option value="{{ $permissions->id }}">{{ $permissions->name }}</option>
                                               @endforeach
                                        </select>
                               </div>
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
            var email = $('#email').val();
            var password = $('#password').val();
            var cpassword = $('#cpassword').val();
            var store = $('#store').val();
            var store = $('#role').val();
            //var store = $('#permission[]').val();
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
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.js'></script>
<script id="rendered-js" >
       $('.label.ui.dropdown').
       dropdown();

      $('.no.label.ui.dropdown').
       dropdown({
      useLabels: false });


      $('.ui.button').on('click', function () {
      $('.ui.dropdown').
       dropdown('restore defaults');
      });
      //# sourceURL=pen.js
</script>
@endsection
@section('flash')
  @include('admin.flash_message.message')
@endsection
