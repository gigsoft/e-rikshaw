<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Shop :: Administrative Panel</title>
        @include('admin.layouts.head_script')
	    <meta name="csrf-token" content="{{ csrf_token() }}">
	</head>
	<body class="hold-transition sidebar-mini">
		<!-- Site wrapper -->
		<div class="wrapper">
            @include('admin.layouts.nav_bar')
			<!-- /.navbar -->
			<!-- Main Sidebar Container -->
		    @include('admin.layouts.sidebar')
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				@yield('content')
			</div>
			<!-- /.content-wrapper -->
			<footer class="main-footer">
				<strong>Copyright &copy; 2014-2022 GigSoft Pro All rights reserved.
			</footer>

		</div>
		@include('admin.layouts.footer_script')


        @yield('customJs')
         <!-- Toastr Alerts after server side action -->

   @switch($layout)
   @case('users')
     @yield('flash')
   @break
   @case('items')
     @yield('flash')
   @break
   @case('store')
     @yield('flash')
   @break
   @case('roles')
     @yield('flash')
   @break
   @case('purchase')
   @yield('flash')
 @break
 @case('sale')
   @yield('flash')
 @break
   @case('vehicle_model')
     @yield('flash')
   @break
   @case('vehicles')
     @yield('flash')
   @break


@endswitch
	</body>
</html>
