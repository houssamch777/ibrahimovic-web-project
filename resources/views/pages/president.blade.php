@extends('layouts.rtl.app')


@section('pageTitle', $president->name . ' | جمعية البركة الجزائرية لدعم الشعوب المظلومة')
@section('pageDescription', 'تعرف على ' . $president->name . ', رئيس جمعية البركة الجزائرية, ورؤيته في دعم الشعوب
المظلومة وتحقيق العدالة الاجتماعية من خلال العمل الخيري.')
@section('pageKeywords', 'الشيخ أحمد إبراهيمي, جمعية البركة الجزائرية, رئيس الجمعية, دعم الشعوب, العمل الخيري, الجزائر, التبرعات')
@section('ogTitle', $president->name . ' | جمعية البركة الجزائرية لدعم الشعوب المظلومة')
@section('ogDescription', 'الشيخ أحمد إبراهيمي، رئيس جمعية البركة الجزائرية، يسعى لدعم الشعوب المظلومة من خلال تقديم
المساعدات الإنسانية وتنفيذ المشاريع الخيرية.')
@section('ogImage', asset('storage/' . $president->image))
@section('ogUrl', route('president'))
@section('ogType', 'article')
@section('twitterTitle', $president->name . ' | جمعية البركة الجزائرية لدعم الشعوب المظلومة')
@section('twitterDescription', 'الشيخ أحمد إبراهيمي، رئيس جمعية البركة الجزائرية، يسعى لدعم الشعوب المظلومة من خلال
تقديم المساعدات الإنسانية وتنفيذ المشاريع الخيرية.')
@section('twitterImage', asset('storage/' . $president->image))




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
                        <span class="sub-title"><i class="icon-donation"></i>تعرف على إدارة الجمعية</span>
                        <h2 class="title-animation"> السيد رئــيس الجمعية</h2>
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
        <!-- ==== team details section start ==== -->
        <section class="team-details">
            <div class="container">
                <div class="row gutter-40 align-items-center">
                    <div class="col-12 col-lg-6 col-xl-5">
                        <div class="team-details__thumb" data-aos="zoom-in" data-aos-duration="1000">
                            <img src="{{ Storage::url($president->image) }}" alt="Image">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-7">
                        <div class="team-details__content" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                            <div class="team-details__meta">
                                <h4 class="title-animation">{{ $president->name }}</h4>
                                <p class="designation">{{ $president->designation }}</p>
                                <div class="social">
                                    @if(!empty($president->social_links))
                                    @foreach($president->social_links as $platform => $url)
                                    @php
                                    $icons = [
                                    'facebook' => 'fa-facebook-f',
                                    'twitter' => 'fa-twitter',
                                    'linkedin' => 'fa-linkedin-in',
                                    'vimeo' => 'fa-vimeo-v',
                                    'instagram' => 'fa-instagram',
                                    'youtube' => 'fa-youtube',
                                    'snapchat' => 'fa-snapchat-ghost',
                                    'tiktok' => 'fa-tiktok',
                                    'pinterest' => 'fa-pinterest-p',
                                    'reddit' => 'fa-reddit-alien',
                                    'github' => 'fa-github',
                                    'whatsapp' => 'fa-whatsapp',
                                    'telegram' => 'fa-telegram-plane',
                                    'tumblr' => 'fa-tumblr',
                                    'medium' => 'fa-medium',
                                    'discord' => 'fa-discord',
                                    ];
                                    @endphp
                                    @if(!empty($url))
                                    <a href="{{ $url }}" target="_blank" aria-label="share us on {{ $platform }}" title="{{ ucfirst($platform) }}">
                                        <i class="fa-brands {{ $icons[$platform] ?? 'fa-link' }}"></i>
                                    </a>
                                    @endif
                                    @endforeach
                                    @else
                                    <p>لا توجد روابط اجتماعية مضافة حاليًا.</p>
                                    @endif
                                </div>
                                <p>{{ $president->description }}</p>
                            </div>
                            <div class="team-details__list">
                                <ul>
                                    @if(!empty($president->achievements))
                                        @foreach($president->achievements as $achievement)
                                        <li><i class="icon-circle-check"></i> {{ $achievement }}</li>
                                        @endforeach
                                    @else
                                    <p>لا توجد إنجازات مضافة حاليًا.</p>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="about-me" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                            <h4 class="title-animation">كلمة الرئيس</h4>
                            <p>{{ $president->speech }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ==== team details section end ==== -->

@endsection

@section('js')
<script src="build/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="build/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>


@endsection