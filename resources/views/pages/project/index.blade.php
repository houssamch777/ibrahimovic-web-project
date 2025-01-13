@extends('layouts.rtl.app')
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