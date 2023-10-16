@extends('admin.layouts.master',['layout'=>'permissions'])
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Permissions</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{route('admin.permissions')}}" class="btn btn-primary">Back</a>
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
    <form action="{{ route('admin.permissions.store.add') }}"  method="post" id="permissions-form">
        @csrf
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            {{-- <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                                 <span class="text-danger" id="name-error"></span>
                            </div> --}}
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input value="{{ old('name') }}"
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    placeholder="Name" required>
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
        $('#permissions-form').submit(function(e) {
            e.preventDefault(); // Prevent the form from submitting

            // Reset any previous error messages
            $('.text-danger').text('');
            // Get the form values
            var name = $('#name').val();
            // Perform client-side validation
            var isValid = true;
            if (name === '') {
                $('#name-error').text('Name is required.');
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
