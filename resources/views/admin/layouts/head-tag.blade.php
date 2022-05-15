<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<title>@yield('title','مدیریت')</title>
<meta name="description" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="{{ asset('admin-assets/img/favicon/favicon.ico') }}">
<!-- Icons -->
<link rel="stylesheet" href="{{ asset('admin-assets/css/loder.css') }}">
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/fonts/boxicons.css') }}">
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/fonts/fontawesome.css') }}">
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/fonts/flag-icons.css') }}">
<!-- Core CSS -->
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css">
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css">
<link rel="stylesheet" href="{{ asset('admin-assets/css/demo.css') }}">
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/css/rtl/rtl.css') }}">
<!-- Vendors CSS -->
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}">
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/typeahead-js/typeahead.css') }}">
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/sweetalert2/sweetalert2.css') }}">
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/toastr/toastr.css') }}">
@yield('vendor-css')
<!-- Page CSS -->
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/css/pages/page-icons.css') }}">
@yield('page-css')
<!-- Helpers -->
<script src="{{ asset('admin-assets/vendor/js/helpers.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/js/template-customizer.js') }}"></script>
<script src="{{ asset('admin-assets/js/config.js') }}"></script>