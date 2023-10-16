
<!-- When user will submitted Leave form then this alert message show on top the leave list page -->
@if (Session::has('success'))
    <script>
    toastr.success("{{  Session::get('success') }}")
    </script>
@endif

@if (Session::has('error'))
    <script>
        toastr.warning("{{  Session::get('error') }}")
    </script>
   {{-- <script>
         $.toast({
            heading: '',
            text: "{{  Session::get('error') }}",
            position: 'top-right',
            loaderBg: '#ff1a1a',
            icon: 'error',
            hideAfter: 10000,
            stack: 6,
         });
   </script> --}}
@endif

