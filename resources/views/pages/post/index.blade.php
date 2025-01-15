@extends('layouts.rtl.app')
@section('pageTitle', 'أخبارنا | جمعية البركة الجزائرية لدعم الشعوب المظلومة')
@section('pageDescription', 'اطلع على أحدث أخبار جمعية البركة الجزائرية ومبادراتها لدعم الشعوب المظلومة حول العالم.')
@section('pageKeywords', 'جمعية البركة الجزائرية, أخبار, مبادرات, دعم الشعوب المظلومة, العمل الخيري, الجزائر')
@section('ogTitle', 'أخبارنا | جمعية البركة الجزائرية لدعم الشعوب المظلومة')
@section('ogDescription', 'تابع أخبار جمعية البركة الجزائرية وآخر المبادرات الإنسانية والمشاريع لدعم الشعوب المظلومة.')
@section('ogImage', asset('assets/10-years-logo.jpg'))
@section('ogUrl', route('posts'))
@section('ogType', 'article')
@section('twitterTitle', 'أخبارنا | جمعية البركة الجزائرية لدعم الشعوب المظلومة')
@section('twitterDescription', 'تابع أخبار جمعية البركة الجزائرية وآخر المبادرات الإنسانية والمشاريع لدعم الشعوب
المظلومة.')
@section('twitterImage', asset('assets/10-years-logo.jpg'))
@section('css')
<!-- plugin css -->
<link href="build/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
@extends('section.partial.banner')
@section('title')
أخر الأخبار
@endsection
@section('secondtitle')
تعرف على جديد الجمعية
@endsection
<!-- ==== cause slider section start ==== -->
<!-- ==== blog section start ==== -->
        <section class="blog-main cm-details">
            <div class="container">
                <div class="row gutter-60">
                    <div class="col-12 col-xl-8">
                        <div>
                            
                            @forelse($posts as $post)
                                <x-post-component :post="$post" />
                            @empty
                            <div class="col-12">
                                <p class="text-center text-muted">لا توجد منشورات لعرضها حاليًا.</p>
                            </div>
                            @endforelse
                        </div>
                        <div class="pagination-wrapper" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                            <ul class="pagination main-pagination">
                                <li>
                                    <button>
                                        <i class="fa-solid fa-angles-left"></i>
                                    </button>
                                </li>
                                <li>
                                    <a href="blog-list.html">1</a>
                                </li>
                                <li>
                                    <a href="blog-list.html" class="active">2</a>
                                </li>
                                <li>
                                    <a href="blog-list.html">3</a>
                                </li>
                                <li>
                                    <button>
                                        <i class="fa-solid fa-angles-right"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="blog-main__sidebar">
                            <div class="cm-details__sidebar">
                                <div class="cm-sidebar-widget" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                                    <div class="intro">
                                        <h5>search here</h5>
                                    </div>
                                    <form action="#" method="post">
                                        <input type="text" name="search-product" id="searchProduct" placeholder="Search Here..."
                                            required>
                                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </form>
                                </div>
                                <div class="cm-sidebar-widget" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                                    <div class="intro">
                                        <h5>Recent Posts</h5>
                                    </div>
                                    <div class="cm-sidebar-post">
                                        <div class="single-item">
                                            <div class="thumb">
                                                <a href="blog-details.html">
                                                    <img src="assets/images/blog/ph-one.png" alt="Image">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <p><i class="fa-solid fa-calendar-days"></i> <span>November 19, 2024</span>
                                                </p>
                                                <p><a href="blog-details.html">Where Innovation Meets Foundation</a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="single-item">
                                            <div class="thumb">
                                                <a href="blog-details.html">
                                                    <img src="assets/images/blog/ph-two.png" alt="Image">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <p><i class="fa-solid fa-calendar-days"></i> <span>November 19, 2024</span>
                                                </p>
                                                <p><a href="blog-details.html">Where Innovation Meets Foundation</a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="single-item">
                                            <div class="thumb">
                                                <a href="blog-details.html">
                                                    <img src="assets/images/blog/three.png" alt="Image">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <p><i class="fa-solid fa-calendar-days"></i> <span>November 22, 2024</span>
                                                </p>
                                                <p><a href="blog-details.html">Structures That Stand,
                                                        Dreams That Soar</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ==== / blog section end ==== -->

@endsection

@section('js')
<script src="build/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="build/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>


@endsection