<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | جمعية البركة الجزائرية</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/favicon.png')}}">

    <!-- include head css -->
    @include('layouts.admin.head-css')
</head>

@yield('body')

    <!-- Begin page -->
    <div id="layout-wrapper">
            <!-- topbar -->
            @include('layouts.admin.topbar')

            <!-- sidebar components -->
            @include('layouts.admin.sidebar')

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <!-- footer -->
                @include('layouts.admin.footer')

            </div>
            <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->



    <!-- vendor-scripts -->
    @include('layouts.admin.vendor-scripts')

</body>

</html>
