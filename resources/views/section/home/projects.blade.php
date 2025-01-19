<!-- ==== projects slider section start ==== -->
<section class="cause cause-three">
    <div class="container">
        <div class="row gutter-30 align-items-center">
            <div class="col-12 col-md-8 col-xl-7">
                <div class="section__header">
                    <span class="sub-title">
                        <i class="icon-donation"></i>ابدأ بالتبرع لدعم المحتاجين
                    </span>
                    <h2 class="title-animation">
                        كن <span> عونًا</span> لهم في أوقات المحن
                    </h2>
                </div>
            </div>
            <div class="col-12 col-md-4 col-xl-5">
                <div class="slider-navigation">
                    <button type="button" aria-label="السابق" title="الشريحة السابقة" class="prev-cause slider-btn">
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                    <button type="button" aria-label="التالي" title="الشريحة التالية"
                        class="next-cause slider-btn slider-btn-next">
                        <i class="fa-solid fa-arrow-left"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="cause__slider-wrapper">
                    <div class="cause__slider swiper">
                        <div class="swiper-wrapper">
                            @foreach ($projects as $projectslide)
                                <div class="swiper-slide">
                                    <div class="cause__slider-inner">
                                        <div class="cause__slider-single">
                                            <div class="thumb">
                                                <a href="{{ route('projects.show', $projectslide->id) }}">
                                                    <img src="{{ asset('storage/' . $projectslide->image_url) }}" alt="Image">
                                                </a>
                                                <div class="tag">
                                                    <a href="#">{{$projectslide->category}}</a>
                                                </div>
                                            </div>
                                            <div class="content" style="direction: rtl; text-align: right;">
                                                <h6><a href="{{ route('projects.show', $projectslide->id) }}">{{$projectslide->name}}</a></h6>
                                                <p>{{ \Illuminate\Support\Str::limit($projectslide->description, 120, '...') }}
                                                    <a class="text-success" href="{{ route('projects.show', $projectslide->id) }}" aria-label="blog details" title="blog details"><strong >إقرأ المزيد</strong>
                                                        <i class="fa-solid fa-circle-arrow-right"></i></a>
                                                </p>
                                            </div>
                                            <dive class="cause__cta">
                
                                                <a href="{{route('donation.index')}}" aria-label="تبرع الآن" title="تبرع الآن" class="btn--secondary">تبرع الآن</a>
                                            </dive>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="spade">
        <img src="assets/images/help/spade.png" alt="Image">
    </div>
</section>
<!-- ==== / projects slider section end ==== -->