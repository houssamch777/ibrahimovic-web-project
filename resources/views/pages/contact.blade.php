@extends('layouts.rtl.app')

@section('pageTitle', 'اتصل بنا | جمعية البركة الجزائرية لدعم الشعوب المظلومة')
@section('pageDescription', 'تواصل مع جمعية البركة الجزائرية لدعم الشعوب المظلومة عبر البريد الإلكتروني أو الهاتف.')
@section('pageKeywords', 'جمعية البركة الجزائرية, اتصل بنا, دعم الشعوب, العمل الإنساني, الجزائر')
@section('ogTitle', 'اتصل بنا | جمعية البركة الجزائرية لدعم الشعوب المظلومة')
@section('ogDescription', 'تواصل معنا لتقديم الدعم أو الاستفسار عن مشاريعنا الموجهة لدعم الشعوب المظلومة.')
@section('ogImage', asset('assets/10-years-logo.jpg'))
@section('ogUrl', route('contact'))
@section('ogType', 'article')
@section('twitterTitle', 'اتصل بنا | جمعية البركة الجزائرية لدعم الشعوب المظلومة')
@section('twitterDescription', 'تواصل معنا لتقديم الدعم أو الاستفسار عن مشاريعنا الموجهة لدعم الشعوب المظلومة.')
@section('twitterImage', asset('assets/10-years-logo.jpg'))

@section('css')

@endsection

@section('content')

@include('section.contact.banner')

@include('section.contact.contact')

@endsection

@section('js')


@endsection