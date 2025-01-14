@extends('layouts.rtl.app')
@section('pageTitle', 'مشاريعنا | جمعية البركة الجزائرية لدعم الشعوب المظلومة')
@section('pageDescription', 'تعرف على مشاريع جمعية البركة الجزائرية التي تهدف لدعم الشعوب المظلومة وتحقيق العدالة
الاجتماعية.')
@section('pageKeywords', 'جمعية البركة الجزائرية, المشاريع, دعم الشعوب المظلومة, التبرعات, الجزائر, المشاريع الإنسانية')
@section('ogTitle', 'مشاريعنا | جمعية البركة الجزائرية لدعم الشعوب المظلومة')
@section('ogDescription', 'اكتشف مشاريع جمعية البركة الجزائرية الموجهة لدعم الشعوب المظلومة وتعزيز العمل الإنساني.')
@section('ogImage', asset('assets/projects_image.jpg'))
@section('ogUrl', route('projects'))
@section('ogType', 'article')
@section('twitterTitle', 'مشاريعنا | جمعية البركة الجزائرية لدعم الشعوب المظلومة')
@section('twitterDescription', 'اكتشف مشاريع جمعية البركة الجزائرية الموجهة لدعم الشعوب المظلومة وتعزيز العمل
الإنساني.')
@section('twitterImage', asset('assets/projects_image.jpg'))
@section('css')
<!-- plugin css -->
<link href="build/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
@extends('section.partial.banner')
@section('title')
مشــــــاريعنا
@endsection
@section('secondtitle')
ساهم في تنفيذ مشاريع الجمعية
@endsection
<!-- ==== cause slider section start ==== -->
<div class="mt-5"></div>
<!-- ==== / cause slider section end ==== -->
<div class="section__header mb-0 text-center" data-aos="fade-up" data-aos-duration="1000">
    <h2 class="title-animation " >بكل مشروع نحي
        <span>أملاً</span> جديد
    </h2>
</div>
@include('section.projects')


@endsection

@section('js')
<script src="build/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="build/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>


@endsection