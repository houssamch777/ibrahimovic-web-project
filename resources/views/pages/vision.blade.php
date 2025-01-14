@extends('layouts.rtl.app')
@section('pageTitle', 'رؤيتنا | جمعية البركة الجزائرية لدعم الشعوب المظلومة')
@section('pageDescription', 'نسعى في جمعية البركة الجزائرية لتحقيق العدالة الاجتماعية ودعم الشعوب المظلومة من خلال
مشاريع إنسانية متنوعة.')
@section('pageKeywords', 'جمعية البركة الجزائرية, الرؤية, دعم الشعوب المظلومة, العمل الخيري, التبرعات')
@section('ogTitle', 'رؤيتنا | جمعية البركة الجزائرية لدعم الشعوب المظلومة')
@section('ogDescription', 'رؤيتنا تهدف إلى تقديم الدعم والمساندة للمحتاجين والشعوب المظلومة لتحقيق مستقبل مشرق.')
@section('ogImage', asset('assets/vision_image.jpg'))
@section('ogUrl', route('vision'))
@section('ogType', 'article')
@section('twitterTitle', 'رؤيتنا | جمعية البركة الجزائرية لدعم الشعوب المظلومة')
@section('twitterDescription', 'رؤيتنا تهدف إلى تقديم الدعم والمساندة للمحتاجين والشعوب المظلومة لتحقيق مستقبل مشرق.')
@section('twitterImage', asset('assets/vision_image.jpg'))




@section('css')
<!-- plugin css -->
<link href="build/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

@include('section.about.banner')

@include('section.about.about')

@include('section.about.cta')

@include('section.about.testimonial')


@endsection

@section('js')
<script src="build/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="build/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>


@endsection