@extends('admin.layouts.master',['layout'=>'store'])
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Store</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{route('admin.store')}}" class="btn btn-primary">Back</a>
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
    <form action="{{ route('admin.store.update', $store->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $store->name }}" required>
                    <span class="text-danger" id="name-error"></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Address"  value="{{ $store->address }}"required>
                    <span class="text-danger" id="address-error"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="phone_no">PHONE NO</label>
                    <input type="text" name="phone_no" id="phone_no" class="form-control" placeholder="PHONE NO"  value="{{ $store->phone_no }}"required>
                    <span class="text-danger" id="phone_no-error"></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email"  value="{{ $store->email }}"required>
                    <span class="text-danger" id="email-error"></span>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control mb-3" placeholder="Image" >
                    <img id="image" src="{{ asset('storage/store/image/'.$store->image.'') }}" alt="image Preview" class="preview-image">
                </div>
            </div>
        </div>
        <div class="pb-5 pt-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>

@endsection

@section('customJs')
<script>
    $(document).ready(function() {
        $('#item-form').submit(function(e) {
            e.preventDefault(); // Prevent the form from submitting

            // Reset any previous error messages
            $('.text-danger').text('');

            // Get the form values
            var name = $('#name').val();
            var price = $('#price').val();


            // Perform client-side validation
            var isValid = true;

            if (name === '') {
                $('#name-error').text('Name is required.');
                isValid = false;
            }

            if (email === '') {
                $('#price-error').text('price is required.');
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
