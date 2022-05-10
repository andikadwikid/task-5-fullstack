<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.ico') }}" />
    @yield('css')
</head>

<body>
    <div class="container-scroller">

        <!-- Navbar -->
        @include('master.navbar')

        <div class="container-fluid page-body-wrapper">
            <!-- Sidebar -->
            @include('master.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    <!-- Content -->
                    @yield('content')
                </div>
                <!--Footer-->
                @include('master.footer')

            </div>
        </div>

        <script src="{{ asset('admin/vendors/js/vendor.bundle.base.js') }}"></script>
        <script src="{{ asset('admin/js/jquery.cookie.js') }}" type="text/javascript"></script>
        <script src="{{ asset('admin/js/off-canvas.js') }}"></script>
        <script src="{{ asset('admin/js/hoverable-collapse.js') }}"></script>
        <script src="{{ asset('admin/js/misc.js') }}"></script>
        <script src="{{ asset('admin/js/dashboard.js') }}"></script>

        @stack('js')

</body>

</html>
