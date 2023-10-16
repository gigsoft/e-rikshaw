<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('admin-assets/css/all.min.css')}}">

<link rel="stylesheet" href="{{asset('admin-assets/css/dataTables.bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{asset('admin-assets/css/responsive.bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{asset('admin-assets/css/buttons.bootstrap4.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('admin-assets/css/adminlte.min.css')}}">
<link rel="stylesheet" href="{{asset('admin-assets/css/custom.css')}}">
<link rel="stylesheet" href="{{asset('admin-assets/css/toastr.min.css')}}">
<link rel="stylesheet" href="{{asset('admin-assets/css/semantic.min.css')}}">
{{-- <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css'> --}}


@switch($layout)
		@case('dashboard')
		@break
        @case('users')

		@break
        @case('vehicles')
        <link rel="stylesheet" href="{{ asset('admin-assets/css/vehicles/vehicle.css') }}">
        <link rel="stylesheet" href="{{asset('admin-assets/css/bs-stepper.min.css')}}">
        @break
        @case('purchase')
        <link rel="stylesheet" href="{{ asset('admin-assets/css/purchase/purchase.css') }}">
        @break
        @case('sales')
        <link rel="stylesheet" href="{{ asset('admin-assets/css/sale/sale.css') }}">
        @break
        @case('users')
		    <link rel="stylesheet" href="{{ asset('assets/css/admin/dashboard/dashboard.css') }}">

	@endswitch

