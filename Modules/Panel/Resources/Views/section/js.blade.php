{{-- Load Js File --}}
<script src="{{ asset('panel/vendors/js/vendors.min.js') }}"></script>
<script src="{{ asset('panel/vendors/js/charts/apexcharts.min.js') }}"></script>
<script src="{{ asset('panel/vendors/js/extensions/toastr.min.js') }}"></script>
<script src="{{ asset('panel/js/core/app-menu.min.js') }}"></script>
<script src="{{ asset('panel/js/core/app.min.js') }}"></script>
<script src="{{ asset('panel/js/scripts/customizer.min.js') }}"></script>
<script src="{{ asset('panel/js/scripts/pages/dashboard-ecommerce.min.js') }}"></script>
<script>$(window).on('load',  function() {if (feather) feather.replace({ width: 14, height: 14 });})</script>
@yield('js')
