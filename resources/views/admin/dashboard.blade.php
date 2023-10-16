@extends('admin.layouts.app',['layout'=>'dashboard'])


@section('content')
<!-- Content Header (Page header) -->

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Dashboard</h1>
                            </div>
                            <div class="col-sm-6">

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
                            <div class="col-lg-3 col-6">
                                <div class="small-box card">
                                    <div class="inner">
                                        <h3>{{ $data['storeCount'] }}</h3>
                                        <p>Total Stores</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ route('admin.store')}}" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box card">
                                    <div class="inner">
                                        <h3>{{ $data['userCount'] }}</h3>
                                        <p>Total Users</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ route('admin.user')}}" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box card">
                                    <div class="inner">
                                        <h3>{{ $data['vehicleCount'] }}</h3>
                                        <p>Total Vehicles</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ route('admin.vehicle.index')}}" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.card -->
                </section>
                <!-- /.content -->
@endsection

@section('customJs')
<script>

    consol.log("hello")
    </script>
@endsection
