<!DOCTYPE html>
<html lang="fa" class="light-style layout-navbar-fixed {{ request()->is('admin/profile') ? 'layout-menu-collapsed' : 'layout-menu-fixed' }}" dir="rtl" data-theme="theme-default" data-assets-path="{{ asset('admin-assets/').'/' }}" data-template="vertical-menu-template">

<head>
    @include('admin.layouts.head-tag')
</head>

<body>
    <!-- BEGIN: loader-->
    @include('admin.layouts.loader')
    <!-- END: loader-->

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('admin.layouts.menu')
            <!-- / Menu -->
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Header -->
                @include('admin.layouts.header')
                <!-- / Header -->
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                    </div>
                    <!-- / Content -->
                    <!-- Footer -->
                    @include('admin.layouts.footer')
                    <!-- / Footer -->
                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>


    <!-- / Layout wrapper -->
    @include('admin.layouts.script')
 
    <!-- / loader script -->
    <script>
        $(document).ready(function() { 
            preloaderFadeOutTime = 500;
            function hidePreloader() {
                var preloader = $('.spinner-wrapper');
                preloader.fadeOut(preloaderFadeOutTime);
            }
            hidePreloader();
        });
    </script>
    <!-- BEGIN: Alerts--> 
    @include('admin.alerts.sweetalert.session')
    @include('admin.alerts.toast.session') 
    <!-- END: Alerts-->

    
</body>

</html>
