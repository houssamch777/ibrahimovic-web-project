@extends('layouts.rtl.app')

@section('pageTitle', 'جمعية البركة الجزائرية | دعم الشعوب المظلومة')
@section('pageDescription', 'جمعية البركة الجزائرية تعمل على دعم الشعوب المظلومة حول العالم من خلال تقديم المساعدة الإنسانية والاجتماعية.')
@section('pageKeywords', 'جمعية البركة الجزائرية, كفالة الأيتام, التبرعات, دعم المحتاجين, الجزائر, المشاريع الخيرية')
@section('ogTitle','جمعية البركة الجزائرية | دعم الشعوب المظلومة')
@section('ogDescription', 'ساهم معنا في تقديم الدعم للشعوب المظلومة من خلال برامج ومشاريع جمعية البركة الجزائرية.')
@section('ogImage', asset('assets/home_image.jpg'))
@section('ogUrl', route('home'))
@section('ogType', 'website')
@section('twitterTitle','جمعية البركة الجزائرية | دعم الشعوب المظلومة')
@section('twitterDescription', 'ساهم معنا في تقديم الدعم للشعوب المظلومة من خلال برامج ومشاريع جمعية البركة الجزائرية.')
@section('twitterImage', asset('assets/home_image.jpg'))

@section('content')

@include('section.home.banner')

@include('section.home.projects')

@include('section.home.counter')

@include('section.home.partner')

@include('section.home.team')

@include('section.home.values')

@include('section.home.image-slider')

@if ($Images)
    @include('section.home.events')
@endif


<div class="mb-6"></div>
@include('section.home.contact')

@endsection