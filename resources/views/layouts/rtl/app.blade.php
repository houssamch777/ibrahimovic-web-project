<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.rtl.seo')
    <!-- #title -->
    <title>البركة | جمعية البركة للعمل الخيري والإنساني</title>

    @include('layouts.rtl.style')
</head>

<body>
    

    <div class="page-wrapper rtl">
        <!-- ==== preloader start ==== -->
        <div class="preloader">
            <i class="icon-donation"></i>
            <p>جمعية البركة للعمل الخيري والإنســـاني</p>
        </div>
        <!-- ==== / preloader end ==== -->
        @include('layouts.rtl.header')
        @yield('content')
        @include('layouts.rtl.footer')
    </div>

    
    @include('layouts.rtl.scripts')
</body>

</html>