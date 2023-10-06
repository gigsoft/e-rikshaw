@extends('admin.layouts.master',['layout'=>'purchase_view'])
@section('content')




<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Purchase Report</h1>
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
                  <th>Amount</th>
                  <th>Pending Item</th>
                  <th>Recived Item</th>
                  <th>Status</th>

               </tr>
                </thead>
                <tbody>
                    @isset($stores)
                        @php
                            $i=1;
                        @endphp
                        @foreach ($stores as $row)
                <tr>

                    <td>{{ $i++ }}</td>
                    <td></td>
                    <td></td>
                    <td>{{ $row->purchase_headers ? $row->purchase_headers->total_amount : 'N/A' }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
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

