{{-- Load Js File --}}
<script src="{{ asset('panel/vendors/js/vendors.min.js') }}"></script>
<script src="{{ asset('panel/vendors/js/charts/apexcharts.min.js') }}"></script>
<script src="{{ asset('panel/vendors/js/extensions/toastr.min.js') }}"></script>
<script src="{{ asset('panel/js/core/app-menu.min.js') }}"></script>
<script src="{{ asset('panel/js/core/app.min.js') }}"></script>
<script src="{{ asset('panel/js/scripts/customizer.min.js') }}"></script>
<script src="{{ asset('panel/js/scripts/pages/dashboard-ecommerce.min.js') }}"></script>

{{-- Load Custom JS --}}
<script src="{{ asset('panel/js/core/custom.js') }}"></script>

<script>
    $(window).on('load',  function() {if (feather) feather.replace({ width: 14, height: 14 });})
    {{-- For Errors --}}
    @if(count($errors) > 0)
        @foreach($errors->all() as $error) toastr.error("{{ $error }}"); @endforeach
    @endif
    toastr.options = {"preventDuplicates": true}
</script>

{{-- Load SweetAlert --}}
<script src="{{ asset('js/app.js') }}"></script>
@include('sweet::alert')

{{-- Load Toastr File --}}
<script src="{{ asset('panel/js/core/jquery.toast.min.js') }}"></script>

@yield('js')
