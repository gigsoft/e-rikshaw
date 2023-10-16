<!-- jQuery -->
<script src="{{asset('admin-assets/js/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin-assets/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('admin-assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin-assets/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin-assets/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin-assets/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin-assets/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin-assets/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin-assets/js/jszip.min.js')}}"></script>
<script src="{{asset('admin-assets/js/pdfmake.min.js')}}"></script>
<script src="{{asset('admin-assets/js/vfs_fonts.js')}}"></script>
<script src="{{asset('admin-assets/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('admin-assets/js/buttons.print.min.js')}}"></script>
<script src="{{asset('admin-assets/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin-assets/js/adminlte.min.js')}}"></script>
<script src="{{asset('admin-assets/js/toastr.min.js')}}"></script>
<script src="{{asset('admin-assets/js/bs-stepper.min.js')}}"></script>
<script src="{{asset('admin-assets/js/chart.min.js')}}"></script>
{{-- <!-- AdminLTE for demo purposes -->
<script src="{{asset('admin-assets/js/demo.js')}}"></script> --}}
<script>
     // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })
</script>

@switch($layout)
	{{-- @case('vehicles')
    <script src="{{asset('admin-assets/js/vehicles/vehicle.js')}}"></script>
	@break
    @case('purchase')
    <script src="{{asset('admin-assets/js/purchase/purchase.js')}}"></script>
	@break
    @case('sales')
    <script src="{{asset('admin-assets/js/sale/sale.js')}}"></script>
	@break --}}


@endswitch
