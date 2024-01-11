<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/amezia/layouts/admin/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Nov 2023 03:07:33 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Kemahasiswaan|Stilo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets_backend') }}/images/favicon.ico">

    <link href="{{ asset('assets_backend') }}/libs/metrojs/release/MetroJs.Full/MetroJs.min.css" rel="stylesheet"
        type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets_backend') }}/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets_backend') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets_backend') }}/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets_backend/css/style.css') }}">
    <!-- include libraries(jQuery, bootstrap) -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />

</head>

<body data-topbar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">
        <!--header -->
        @include('layout.template_backend.header')
        <!--/header -->
        <!-- ========== Left Sidebar Start ========== -->
        @include('layout.template_backend.sidebar')
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                @yield('content')
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


            @include('layout.template_backend.footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->




    <script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- JAVASCRIPT -->

    <script src="{{ asset('assets_backend') }}/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets_backend') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets_backend') }}/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ asset('assets_backend') }}/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('assets_backend') }}/libs/node-waves/waves.min.js"></script>

    <!--Morris Chart-->

    <script src="{{ asset('assets_backend') }}/libs/morris.js/morris.min.js"></script>
    <script src="{{ asset('assets_backend') }}/libs/raphael/raphael.min.js"></script>
    <script src="{{ asset('assets_backend') }}/libs/jquery-knob/jquery.knob.min.js"></script>
    <script src="{{ asset('assets_backend') }}/libs/metrojs/release/MetroJs.Full/MetroJs.min.js"></script>

    <script src="{{ asset('assets_backend') }}/js/pages/dashboard.init.js"></script>

    <script src="{{ asset('assets_backend') }}/js/app.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#teksedtor'
        });
    </script>
    @yield('script')
</body>



</html>
