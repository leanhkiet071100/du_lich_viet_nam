<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ $pageTitle }}</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description"
        content="This is an example dashboard (CodeLean) created using build-in elements and components.">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    @include('admin.thuvien.css')
</head>

<body>
    <div class="theme-layout" id="theme-layout">
        <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
            @include('admin.include.navar')
            <div class="app-main">
                @include('admin.include.menu')
                <div class="app-main__outer">

                    @section('content')

                    @show
                    @include('admin.include.footer')
                </div>
            </div>

        </div>
        @include('admin.include.server-status')
    </div>



    <div class="app-drawer-overlay d-none animated fadeIn"></div>
    @include('admin.thuvien.js')
    <script>
        $(document).ready(function() {
            $url = window.location.href;


        });

        // function add_them_layout() {
        //     $(".theme-layout").addClass('active');
        // }

        // function remove_them_layout() {
        //     $(".theme-layout").removeClass('active');
        // }

        // không cho nhập kí tư vào input
        // function isNumberKey(e) {
        //     var charCode = (e.which) ? e.which : e.keyCode;
        //     if (charCode > 31 && (charCode < 48 || charCode > 57))
        //         return false;
        //     return true;
        // }
    </script>
    {{-- <script src="//cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script> --}}
    @yield('js')
</body>

</html>
