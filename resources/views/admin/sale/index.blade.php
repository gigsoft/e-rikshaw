@extends('admin.layouts.master',['layout'=>'sales'])
@section('content')




<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Sales Management</h1>
        </div>
        <div class="col-sm-6 text-right">
            <a href="{{route('admin.sale.create')}}" class="btn btn-primary">New Order</a>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

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
                      <th>Date</th>
                      <th>Store Name</th>
                      <th>Supplire  Name</th>
                      <th>Amount</th>
                      <th>Pending Item</th>
                      <th>Recived item</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @isset($sale_headers)
                        @php
                            $i=1;
                        @endphp
                        @foreach ($sale_headers as $row)

                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $row->date }}</td>
                        <td>{{ $row->store ? $row->store->name : 'N/A' }}</td>
                        <td>{{$row->supplier_name}}</td>
                        <td>{{ $row->total_amount}}</td>
                        <td>{{ $row->pending_count }}</td>
                        <td>{{ $row->recieved_count }}</td>
                        <td>
                            <a href="{{route('admin.sale.edit',[$row->id])}}">
                                <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                </svg>
                            </a>
                            <a href="{{ route('admin.sale.view',[$row->id]) }}" class="action-tooltip" data-toggle="tooltip" data-placement="top" title="View Docket"><i class="fa fa-eye"></i></a>

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

