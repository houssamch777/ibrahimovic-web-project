<!-- Layout Meta Tags -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Dynamic SEO Meta Tags -->
<title>@yield('pageTitle', 'جمعية البركة الجزائرية | دعم الأيتام والمحتاجين')</title>
<meta name="description"
    content="@yield('pageDescription', 'جمعية البركة الجزائرية هي منظمة خيرية تهدف لدعم الأيتام والمحتاجين وتحقيق التنمية المجتمعية.')">
<meta name="keywords"
    content="@yield('pageKeywords', 'جمعية البركة الجزائرية, الأعمال الخيرية, كفالة الأيتام, التبرعات, دعم المحتاجين')">
<meta name="author" content="جمعية البركة الجزائرية">

<!-- Open Graph Meta Tags -->
<meta property="og:title" content="@yield('ogTitle', 'جمعية البركة الجزائرية | دعم الأيتام والمحتاجين')">
<meta property="og:description" content="@yield('ogDescription', 'ساهم معنا في تحسين حياة الأيتام والمحتاجين.')">
<meta property="og:image" content="@yield('ogImage', asset('logo.jpg'))">
<meta property="og:url" content="@yield('ogUrl', route('home'))">
<meta property="og:type" content="@yield('ogType', 'website')">
<meta property="og:locale" content="ar_DZ">
<meta property="og:site_name" content="جمعية البركة الجزائرية">

<!-- Twitter Cards -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="@yield('twitterTitle', 'جمعية البركة الجزائرية | دعم الأيتام والمحتاجين')">
<meta name="twitter:description"
    content="@yield('twitterDescription', 'جمعية البركة الجزائرية تهدف لدعم الفئات الضعيفة وتحقيق الأمل.')">
<meta name="twitter:image" content="@yield('twitterImage', asset('logo.jpg'))">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Canonical URL -->
<link rel="canonical" href="@yield('canonicalUrl', route('home'))">

<!-- Favicon -->
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon.png') }}">