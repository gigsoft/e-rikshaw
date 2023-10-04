@extends('admin.layouts.app',['layout'=>'items'])
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit item</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{route('admin.item')}}" class="btn btn-primary">Back</a>
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
    <form action="{{ route('admin.item.update', $item->id) }}" method="post">
        @csrf

        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $item->name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="price">Price</label>
                                <input type="text" name="price" id="price" class="form-control" value="{{ $item->price }}">
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
