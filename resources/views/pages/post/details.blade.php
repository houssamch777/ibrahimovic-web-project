@extends('layouts.rtl.app')
@section('css')
<!-- plugin css -->
@endsection

@section('content')
@extends('section.partial.banner')
@section('title')
مشــــــاريعنا
@endsection
@section('secondtitle')
ساهم في تنفيذ مشاريع الجمعية
@endsection
<!-- ==== blog details section start ==== -->
<section class="blog-main cm-details">
    <div class="container">
        <div class="row gutter-60 mt-5">
            <div class="col-12 col-xl-8">
                <div class="cm-details__content">
                    <div class="cm-details__poster" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                        @if ($post->type=='image')
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Image">
                        @else
                        <iframe id="preview-video" src="{{$post->video_url}}" frameborder="0" allowfullscreen></iframe>
                        @endif

                    </div>
                    <div class="cm-details-meta">
                        <p><i class="fa-solid fa-calendar-days"></i>{{ $post->created_at }}</p>
                        <p><i class="fa-regular fa-user"></i>{{ $post->creator->name }}</p>
                    </div>
                    <div class="cm-group cta">
                        <h3 class="title-animation" >{{ $post->title }}</h3>
                        <p>
                        <p class="my-4" style="white-space: pre-wrap;word-wrap: break-word;">{{ $post->description }}
                        </p>
                        </p>
                    </div>


                    <div class="cm-img-group cta">
                        @if ($post->images)
                        @foreach ($post->images as $imageUrl)
                        <div class="cm-img-single">
                            <img src="{{ asset('storage/' . $imageUrl) }}" alt="Image">
                        </div>
                        @endforeach
                        @endif


                    </div>
                    <div class="details-footer cta">
                        <div class="details-tag">
                            <div class="tag-header">
                                <h6>شارك المشروع:</h6>
                            </div>
                            <div class="social">
                                <!-- Facebook -->
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                    target="_blank" aria-label="share us on facebook" title="Facebook">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>

                                <!-- Telegram -->
                                <a href="https://t.me/share/url?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->name) }}"
                                    target="_blank" aria-label="share us on telegram" title="Telegram">
                                    <i class="fa-brands fa-telegram"></i>
                                </a>


                                <!-- Twitter (X سابقًا) -->
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->name) }}"
                                    target="_blank" aria-label="share us on twitter" title="Twitter">
                                    <i class="fa-brands fa-twitter"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-4">
                <div class="blog-main__sidebar">
                    <div class="cm-details__sidebar">
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
<!-- ==== / blog details section end ==== -->
@endsection

@section('js')

@endsection