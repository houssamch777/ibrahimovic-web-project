
@yield('css')
<!-- Bootstrap Css -->
<link href="{{ asset('build/css/bootstrap.min.rtl.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ asset('build/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ asset('build/css/app.min.rtl.css') }}" id="app-style" rel="stylesheet" type="text/css" />
<!-- Include Cropper.js CSS -->
<link href="https://cdn.jsdelivr.net/npm/cropperjs/dist/cropper.min.css" rel="stylesheet">

@vite(['resources/js/app.js', 'resources/sass/app.scss'])