@extends('admin.layouts.master',['layout'=>'sales'])
@section('content')

<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sales Detail</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('admin.sale')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Order Information</h3>
        </div>
           <div class="card-body table-responsive p-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                          <th>Sr.No</th>
                          <th>Item Name</th>
                          <th>Qty</th>
                          <th>Price</th>
                          <th>Total Price</th>
                          <th>Status</th>
                        </tr>
                        </thead>
                 <tbody>
                     <tr> @isset($sale_details)
                        @php
                            $i=1;
                        @endphp
                       @foreach ($sale_details as $item)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->item_name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->total_price }}</td>
                        <td>{{ $item->status_text }}</td>

                     </tr>
                     @endforeach
                     @endisset
                 </tbody>
                </table>
            </div>
    </div>
</div>



<!-- Main content -->







@endsection

@section('customJs')

@endsection


