<!doctype html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | البركة- لوحة التحكم</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('build/images/favicon.ico')}}">

    <!-- include head css -->
    @include('layouts.admin.head-css')
</head>

<body>
    
    @yield('content')

    <!-- vendor-scripts -->
    @include('layouts.admin.vendor-scripts')

</body>

</html>
