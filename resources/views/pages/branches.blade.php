@extends('layouts.rtl.app')

@section('pageTitle', 'مكاتب جمعية البركة الجزائرية | مواقعنا في مختلف الولايات')
@section('pageDescription', 'اكتشف مواقع مكاتب جمعية البركة الجزائرية في مختلف الولايات. تفضل بزيارة أقرب مكتب لدعم
الشعوب المظلومة والمشاركة في الأنشطة الخيرية.')
@section('pageKeywords', 'مكاتب جمعية البركة الجزائرية, مواقع الجمعية, دعم الشعوب, العمل الخيري, الجزائر, التبرعات,
الأنشطة الخيرية')
@section('ogTitle', 'مكاتبنا | جمعية البركة الجزائرية لدعم الشعوب المظلومة')
@section('ogDescription', 'تعرف على مكاتب جمعية البركة الجزائرية في مختلف الولايات وكيف يمكنك الانضمام أو تقديم التبرعات
لدعم الشعوب المظلومة.')
@section('ogImage', asset('assets/10-years-logo.jpg'))
<!-- استبدل 'offices-banner.jpg' بمسار صورة صفحة مكاتب الجمعية -->
@section('ogUrl', route('branches'))
<!-- استبدل 'offices' بمسار صفحة مكاتب الجمعية -->
@section('ogType', 'article')
@section('twitterTitle', 'مكاتب جمعية البركة الجزائرية | مواقعنا في مختلف الولايات')
@section('twitterDescription', 'اكتشف مواقع مكاتب جمعية البركة الجزائرية وكيف يمكنك المشاركة في الأنشطة الخيرية لدعم
الشعوب المظلومة.')
@section('twitterImage', asset('assets/10-years-logo.jpg'))
<!-- استبدل 'offices-banner.jpg' بمسار صورة صفحة مكاتب الجمعية -->
@section('css')

@endsection

@section('content')



@include('section.branches')


@endsection

@section('js')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    // إنشاء الخريطة وتحديد مركز الجزائر
    var map = L.map('algeria-map').setView([28.0339, 1.6596], 6); // إحداثيات الجزائر

    // إضافة خريطة الأساس
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // إضافة علامات مكاتب الجمعية
    var offices = [
        { name: "مكتب الجزائر العاصمة", coords: [36.7372, 3.0865] },
        { name: "مكتب وهران", coords: [35.6911, -0.6417] },
        { name: "مكتب قسنطينة", coords: [36.3650, 6.6147] }
    ];

    offices.forEach(function (office) {
        L.marker(office.coords)
            .addTo(map)
            .bindPopup(`<b>${office.name}</b>`)
            .openPopup();
    });
</script>
@endsection