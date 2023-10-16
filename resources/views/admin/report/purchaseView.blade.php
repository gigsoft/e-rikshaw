@extends('admin.layouts.master',['layout'=>'purchase_view'])
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Report</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
            <!-- BAR CHART -->
            <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Bar Chart</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
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
                  <th>Model Name</th>
                  <th>Item</th>
                  <th>Qty In</th>
                  <th>Qty Out</th>
               </tr>
                </thead>
                <tbody>
                    @isset($purchase_details)
                        @php
                            $i=1;
                        @endphp
                        @foreach ($purchase_details as $row)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{$row->purchase_header->date}}</td>
                    <td>{{$row->store_name}}</td>
                    <td>{{$row->vehicles->name ?? ''}}</td>
                    <td>{{$row->itemData->name}}</td>
                    <td>{{$row->quantity}}</td>
                    <td>{{$row->quantity_out}}</td>
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
    var getPurcahseData = "{{ route('admin.getPurcahseData') }}";
    $(function () {
        $.ajax({
            url: getPurcahseData,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                var salesData = [];
                var purchaseData = [];
                for (var i = 1; i <= 12; i++) {
                    salesData.push(data.saleCount[i] || 0);
                    purchaseData.push(data.purchaseCount[i] || 0);
                }
                var areaChartData = {
                    labels: monthNames,
                    datasets: [
                        {
                            label: 'Sales',
                            backgroundColor: 'rgba(60,141,188,0.9)',
                            borderColor: 'rgba(60,141,188,0.8)',
                            pointRadius: false,
                            pointColor: '#3b8bba',
                            pointStrokeColor: 'rgba(60,141,188,1)',
                            pointHighlightFill: '#fff',
                            pointHighlightStroke: 'rgba(60,141,188,1)',
                            data: salesData
                        },
                        {
                            label: 'Purchase',
                            backgroundColor: 'rgba(210, 214, 222, 1)',
                            borderColor: 'rgba(210, 214, 222, 1)',
                            pointRadius: false,
                            pointColor: 'rgba(210, 214, 222, 1)',
                            pointStrokeColor: '#c1c7d1',
                            pointHighlightFill: '#fff',
                            pointHighlightStroke: 'rgba(220,220,220,1)',
                            data: purchaseData
                        },
                    ]
                };
                var barChartCanvas = $('#barChart').get(0).getContext('2d');
                var barChartData = $.extend(true, {}, areaChartData);
                var temp0 = areaChartData.datasets[0];
                var temp1 = areaChartData.datasets[1];
                barChartData.datasets[0] = temp1;
                barChartData.datasets[1] = temp0;
                var barChartOptions = {
                    responsive: true,
                    maintainAspectRatio: false,
                    datasetFill: false
                };
                new Chart(barChartCanvas, {
                    type: 'bar',
                    data: barChartData,
                    options: barChartOptions
                });
            },
            error: function (error) {
                console.error('Error fetching purchase data: ' + error);
            }
        });
    });
</script>


@endsection

@section('flash')
  @include('admin.flash_message.message')
@endsection

