{{-- Load Toastr Js File --}}
<script src="{{ asset('toastr/jquery.min.js') }}"></script>
<link href="{{ asset('toastr/toastr.min.css') }}" rel="stylesheet">
<script src="{{ asset('toastr/toastr.min.js') }}"></script>
<script>
    @if(Session::has('message'))
        toastr.options = {
            "closeButton" : true,
            "progressBar" : true
        }
        toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
        toastr.options = {
            "closeButton" : true,
            "progressBar" : true
        }
        toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
        toastr.options = {
            "closeButton" : true,
            "progressBar" : true
        }
        toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
        toastr.options = {
            "closeButton" : true,
            "progressBar" : true
        }
        toastr.warning("{{ session('warning') }}");
    @endif
</script>

{{-- Load Js File --}}
<script src="{{ asset('panel/vendors/js/vendors.min.js') }}"></script>
<script src="{{ asset('panel/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('panel/js/core/app-menu.min.js') }}"></script>
<script src="{{ asset('panel/js/core/app.min.js') }}"></script>
<script src="{{ asset('panel/js/scripts/pages/auth-register.min.js') }}"></script>
<script>
    $(window).on('load',  function() {
        if (feather) feather.replace({ width: 14, height: 14 });
    })
</script>
{{-- Load Js-Validation File --}}
<script type="text/javascript" src="{{ asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
@yield('js')
