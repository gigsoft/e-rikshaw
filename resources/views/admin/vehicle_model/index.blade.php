@extends('admin.layouts.master',['layout'=>'vehicle_model'])
@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Vehicles Model</h1>
        </div>
        <div class="col-sm-6 text-right">
            <a href="{{route('admin.vehicle.model.create')}}" class="btn btn-primary">New Model</a>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>


  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr.No</th>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @isset($vehicle_models)
                        @php
                            $i=1;
                        @endphp
                        @foreach ($vehicle_models as $row)

                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $row->name }}</td>

                    <td>
                        <a href="{{route('admin.vehicle.model.edit',[$row->id])}}">
                            <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                            </svg>
                        </a>

                    </td>
                </tr>
                @endforeach
                @endisset

                </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>



@endsection
@section('customJs')
<script>

$(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});


    </script>
@endsection
@section('flash')
  @include('admin.flash_message.message')
@endsection
