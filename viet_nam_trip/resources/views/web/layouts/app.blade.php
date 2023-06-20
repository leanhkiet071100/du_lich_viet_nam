<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $pageTitle }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">

    <link rel="stylesheet" href="{{ URL('assets/web/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL('assets/web/css/animate.css') }}">

    <link rel="stylesheet" href="{{ URL('assets/web/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL('assets/web/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ URL('assets/web/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ URL('assets/web/css/aos.css') }}">

    <link rel="stylesheet" href="{{ URL('assets/web/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ URL('assets/web/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ URL('assets/web/css/jquery.timepicker.css') }}">

    <link rel="stylesheet" href="{{ URL('assets/web/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ URL('assets/web/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ URL('assets/web/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL('assets/web/css/elegant-icons.css') }}">
    <link rel="stylesheet" href="{{ URL('assets/web/css/font-awesome.min.css') }}">
    <script type="text/javascript" src="{{ URL('assets/admin/assets/scripts/sweetalert2.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    <!-- start nav -->
    <div class="theme-layout"  id="theme-layout">
        @include('web.includes.menu')
        <!-- END nav -->

        @section('content')

        @show
        <!-- start footer -->
        @include('web.includes.footer')
    <!-- end footer -->
    </div>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="{{ URL('assets/web/js/jquery.min.js') }}"></script>
    <script src="{{ URL('assets/web/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ URL('assets/web/js/popper.min.js') }}"></script>
    <script src="{{ URL('assets/web/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL('assets/web/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ URL('assets/web/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ URL('assets/web/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ URL('assets/web/js/owl.carousel.min.js') }}"></script>
    <script src="{{ URL('assets/web/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ URL('assets/web/js/aos.js') }}"></script>
    <script src="{{ URL('assets/web/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ URL('assets/web/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ URL('assets/web/js/scrollax.min.js') }}"></script>
    <script src="{{ URL('assets/web/js/range.js') }}"></script>
    <script src="{{ URL('assets/web/js/main.js') }}"></script>
    <script src="{{ URL('assets/ckeditor/ckeditor.js') }}"></script>

    <script>
        function add_them_layout() {
            $(".theme-layout").addClass('active');
        }

        function remove_them_layout() {
            $(".theme-layout").removeClass('active');
        }
    </script>
    @yield('js')
</body>

</html>
