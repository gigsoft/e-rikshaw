@extends('admin.layouts.master',['layout'=>'vehicles'])
@section('content')

<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>View Detail</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('admin.vehicle.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> <strong>Vehicle Information</strong></h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">

                            <p><strong>Name:</strong> {{ $vehicle->model_name }}</p>
                            <p><strong>Date:</strong> {{ $vehicle->date }}</p>
                            <p><strong>Cash/Finance:</strong>{{ $vehicle->cash_finance }} </p>
                            <p><strong>Sales Price:</strong>{{ $vehicle->sales_price }} </p>
                            <p><strong>INSURANCE AMOUNT DATE:</strong>{{ $vehicle->insurance_amount_date }}</p>
                        </div>
                        <div class="col-md-3">


                            <p><strong>Bill Price:</strong> {{ $vehicle->bill_price }}</p>
                            <p><strong>Advance Payment:</strong> {{ $vehicle->advance_payment }}</p>
                            <p><strong>Colour:</strong> {{ $vehicle->color }}</p>
                            <p><strong>PENDING PAYMENT FROM FINANCE:</strong>{{ $vehicle->pending_payment }} </p>
                        </div>
                        <div class="col-md-3">

                            <p><strong>RC PENDING OR GIVEN :</strong>{{ $vehicle->rc_status }} </p>
                            <p><strong>CHASSIE PRINT:</strong> {{ $vehicle->chassie_print }}</p>
                            <p><strong>ENGINE NO:</strong>{{ $vehicle->engine_no }} </p>
                            <p><strong>DOWN PAYMENT:</strong>{{ $vehicle->down_payment }} </p>
                        </div>
                        <div class="col-md-3">

                            <p><strong>FINANCED BY:</strong>{{ $vehicle->financed_by }}</p>
                            <p><strong>EMI AMOUNT:</strong> {{ $vehicle->emi_amount }}</p>
                            <p><strong>UDHAR:</strong>{{ $vehicle->udhar }}</p>


                        </div>

                    </div>
                </div>
            </div>
        </div>

          <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> <strong>Heirer Information</strong></h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">

                            <p><strong>Name:</strong> {{ $vehicle->hierers->name }}</p>

                            <p><strong>Contact 1:</strong> {{ $vehicle->hierers->contact_1 }}</p>
                            <p><strong>Contact 2:</strong>{{ $vehicle->hierers->contact_2 }} </p>
                            <p><strong>Contact 3:</strong>{{ $vehicle->hierers->contact_3 }} </p>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-4">
                                     <p class="text-center"><strong>Profile Image</strong></p>
                                    <img src="{{ asset('storage/hierer/profile_image/'.$vehicle->hierers->profile_image.'') }}" alt="Profile Image" class="preview-image">

                                </div>
                                <div class="col-md-4">
                                    <p class="text-center"><strong>Aadhar Card</strong></p>
                                    <img src="{{ asset('storage/hierer/adhar_card/'.$vehicle->hierers->adhar_card.'') }}" alt="Aadhar Card"  class="preview-image">
                                </div>
                                <div class="col-md-4">
                                    <p class="text-center"><strong>PAN Card</strong></p>
                                    <img src="{{ asset('storage/hierer/pan_card/'.$vehicle->hierers->pan_card.'') }}" alt="PAN Card"  class="preview-image">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="text-center"><strong>Electricity Bill</strong></p>
                                    <img src="{{ asset('storage/hierer/electricty_bill/'.$vehicle->hierers->electricty_bill.'') }}" alt="Electricity Bill"  class="preview-image">
                                </div>
                                <div class="col-md-4">
                                    <p class="text-center"><strong>Bank Copy</strong></p>
                                    <img src="{{ asset('storage/hierer/bank_copy/'.$vehicle->hierers->bank_copy.'') }}" alt="Bank Copy" class="preview-image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class=""><strong> Uploaded Cheques</strong></p>
                            <div class="row">
                                @for ($i = 1; $i <= 5; $i++)
                                    <div class="col-md-4">
                                        <img src="{{ asset('storage/hierer/electricty_bill/'.$vehicle->hierers->electricty_bill.'') }}" alt="Cheque {{ $i }}" class="preview-image mb-3">
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> <strong> Guarnter Information </strong></h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Name:</strong>{{ $vehicle->guaranters->name }} </p>
                            <p><strong>Contact 1:</strong>{{ $vehicle->guaranters->contact_1 }}</p>
                            <p><strong>Contact 2:</strong>{{ $vehicle->guaranters->contact_2 }} </p>
                            <p><strong>Contact 3:</strong>{{ $vehicle->guaranters->contact_3 }} </p>
                        </div>
                        <div class="col-md-4">
                            <!-- <h5>Profile Images</h5> -->
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="text-center"><strong>Profile Image</strong></p>
                                    <img src="{{ asset('storage/guaranter/profile_image/'.$vehicle->guaranters->profile_image.'') }}" alt="Profile Image" class="preview-image">

                                </div>
                                <div class="col-md-4">
                                    <p class="text-center"><strong>Aadhar Card</strong></p>
                                    <img src="{{ asset('storage/guaranter/adhar_card/'.$vehicle->guaranters->adhar_card.'') }}" alt="Aadhar Card"  class="preview-image">

                                </div>
                                <div class="col-md-4">
                                    <p class="text-center"><strong>PAN Card</strong></p>
                                    <img src="{{ asset('storage/guaranter/pan_card/'.$vehicle->guaranters->pan_card.'') }}" alt="PAN Card"  class="preview-image">

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> <strong> Batteries Information </strong></h3>
                </div>
                   <div class="card-body table-responsive p-3">
                        <table class="table table-striped">

                            <tbody>
                                <tr>
                                    <td>Battery 1</td>
                                    <td>{{ $vehicle->batteries->battery_1}}</td>
                                </tr>
                                <tr>
                                    <td>Battery 2</td>
                                    <td>{{ $vehicle->batteries->battery_2}}</td>
                                </tr>
                               <tr>
                                    <td>Battery 3</td>
                                    <td>{{ $vehicle->batteries->battery_3}}</td>
                                </tr>
                                <tr>
                                    <td>Battery 4</td>
                                    <td>{{ $vehicle->batteries->battery_4}}</td>
                                </tr>
                                <tr>
                                    <td>Battery 5</td>
                                    <td>{{ $vehicle->batteries->battery_5}}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
            </div>
        </div>

        </div>
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->






@endsection

@section('customJs')

@endsection


