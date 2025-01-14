@extends('layouts.rtl.app')


@section('pageTitle', 'من نحن | جمعية البركة الجزائرية لدعم الشعوب المظلومة')
@section('pageDescription', 'تعرف على جمعية البركة الجزائرية، المنظمة التي تسعى لدعم الشعوب المظلومة من خلال تقديم
المساعدات الإنسانية والاجتماعية.')
@section('pageKeywords', 'جمعية البركة الجزائرية, من نحن, دعم الشعوب, العمل الخيري, التبرعات, الجزائر')
@section('ogTitle', 'من نحن | جمعية البركة الجزائرية لدعم الشعوب المظلومة')
@section('ogDescription', 'جمعية البركة الجزائرية تهدف إلى تقديم الدعم والمساندة للشعوب المظلومة عبر مشاريع إنسانية
وخيرية.')
@section('ogImage', asset('assets/about_image.jpg'))
@section('ogUrl', route('about'))
@section('ogType', 'article')
@section('twitterTitle', 'من نحن | جمعية البركة الجزائرية لدعم الشعوب المظلومة')
@section('twitterDescription', 'جمعية البركة الجزائرية تهدف إلى تقديم الدعم والمساندة للشعوب المظلومة عبر مشاريع إنسانية
وخيرية.')
@section('twitterImage', asset('assets/about_image.jpg'))










@section('css')
<!-- plugin css -->
<link href="build/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

@include('section.about.banner')

@include('section.about.help')



@include('section.about.call-us')

@endsection

@section('js')
<script src="build/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="build/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>


@endsection