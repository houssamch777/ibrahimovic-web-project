@extends('layouts.rtl.app')


@section('pageTitle', 'تطوع مع جمعية البركة الجزائرية | دعم الشعوب المظلومة')
@section('pageDescription', 'انضم الآن إلى فريق المتطوعين في جمعية البركة الجزائرية وساهم في دعم الشعوب المظلومة من خلال
الأنشطة الخيرية والمبادرات الإنسانية.')
@section('pageKeywords', 'تطوع, جمعية البركة الجزائرية, دعم الشعوب, العمل الخيري, التطوع, العمل الإنساني, الجزائر')
@section('ogTitle', 'تطوع الآن | جمعية البركة الجزائرية لدعم الشعوب المظلومة')
@section('ogDescription', 'كن جزءًا من فريق التطوع في جمعية البركة الجزائرية وساهم في تحقيق العدالة الاجتماعية ودعم
الشعوب المظلومة.')
@section('ogImage', asset('assets/10-years-logo.jpg'))
<!-- استبدل 'volunteer-banner.jpg' بمسار صورة صفحة التطوع -->
@section('ogUrl', route('volunteer'))
<!-- استبدل 'volunteer' بمسار صفحة التطوع -->
@section('ogType', 'article')
@section('twitterTitle', 'تطوع مع جمعية البركة الجزائرية | دعم الشعوب المظلومة')
@section('twitterDescription', 'انضم الآن إلى فريق التطوع وساهم في دعم الشعوب المظلومة من خلال العمل الخيري مع جمعية
البركة الجزائرية.')
@section('twitterImage', asset('assets/10-years-logo.jpg'))
<!-- استبدل 'volunteer-banner.jpg' بمسار صورة صفحة التطوع -->


@section('css')
<!-- plugin css -->
<link href="build/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<!-- ==== banner section start ==== -->
<section class="common-banner">
    <div class="container">
        <div class="row">
            <div class="common-banner__content text-center">
                <span class="sub-title"><i class="icon-donation"></i>كن سفير للخير في ولايتك</span>
                <h2 class="title-animation"> تطوع الآن مع جمعيتنا</h2>
            </div>
        </div>
    </div>
    <div class="banner-bg">
        <img src="assets/images/banner/banner-bg.png" alt="Image">
    </div>
    <div class="shape">
        <img src="assets/images/shape.png" alt="Image">
    </div>
    <div class="sprade" data-aos="zoom-in" data-aos-duration="1000">
        <img src="assets/images/sprade-base.png" alt="Image" class="base-img">
    </div>
</section>
<!-- ==== / banner section end ==== -->
<section>
    <div class="container">
        <div class="row">
            
        </div>
    </div>

</section>

@endsection

@section('js')
<script src="build/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="build/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>


@endsection