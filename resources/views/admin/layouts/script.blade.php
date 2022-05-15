    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('admin-assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script> 
    <script src="{{ asset('admin-assets/vendor/libs/hammer/hammer.js') }}"></script> 
    <script src="{{ asset('admin-assets/vendor/libs/typeahead-js/typeahead.js') }}"></script> 
    <script src="{{ asset('admin-assets/vendor/js/menu.js') }}"></script> 
    {{-- <script src="{{ asset('admin-assets/js/loder/mainscripts.bundle.js') }}"></script>
    <script src="{{ asset('admin-assets/js/loder/vendorscripts.bundle.js') }}"></script> --}}
    <!-- endbuild --> 
    
    <!-- Vendors JS -->  
    <script src="{{ asset('admin-assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script> 
    <script src="{{ asset('admin-assets/vendor/libs/toastr/toastr.js') }}"></script> 
    @yield('vendor-js') 
    <!-- Main JS -->
    <script src="{{ asset('admin-assets/js/main.js') }}"></script> 
    <!-- Page JS -->
    @yield('page-js') 