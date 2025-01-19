<!-- ==== banner section start ==== -->
<section class="banner-three">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-8">
                <div class="banner-three__slider swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="banner-three__content">
                                <span class="sub-title">ابدأ بالتبرع للأشخاص المحتاجين<i
                                        class="icon-donation"></i></span>
                                <h1 class="text">نحن منظمة <br>
                                    خيرية غير ربحية <span class="bottom-line">عالمية</span>
                                </h1>
                                <p>نرفض متعة الذات ونمدح السعي للمعاناة النبيلة التي تكشف الحقيقة، نحن بُناة المستقبل
                                    وصانعو الأمل.</p>
                                <div class="banner__content-cta cta">
                                    <a href="{{route('contact')}}" aria-label="من نحن" title="من نحن" class="btn--tertiary">
                                        أطلب استشارة<i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                    <a href="{{route('donation.index')}}" aria-label="تواصل معنا" title="تواصل معنا"
                                        class="btn--primary">
                                        تبرع الآن<i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 d-none d-lg-block">
                <div class="banner-three__thumb">
                    <div class="banner-three__thumb-inner">
                        <div class="group">
                            <div class="m-one move-image">
                                <img src="assets/images/banner/m-one.png" alt="Image" data-aos="fade-right"
                                    data-aos-duration="1000">
                            </div>
                            <div class="m-three move-image">
                                <img src="assets/images/banner/m-three.png" alt="Image" data-aos="fade-right"
                                    data-aos-duration="1000" data-aos-delay="300">
                            </div>
                        </div>
                        <div class="group">
                            <div class="m-two move-image">
                                <img src="assets/images/banner/m-two.png" alt="Image" data-aos="zoom-in"
                                    data-aos-duration="1000">
                            </div>
                            <div class="m-four move-image">
                                <img src="assets/images/banner/m-four.png" alt="Image" data-aos="zoom-in"
                                    data-aos-duration="1000" data-aos-delay="300">
                            </div>
                        </div>
                        <div class="group">
                            <div class="m-five move-image">
                                <img src="assets/images/banner/m-five.png" alt="Image" data-aos="fade-left"
                                    data-aos-duration="1000" data-aos-delay="300">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shape-lg">
        <img src="assets/images/banner/banner-three-bg.png" alt="Image" data-aos="zoom-in" data-aos-duration="1000">
    </div>
    <div class="sprade-shape">
        <img src="assets/images/sprade-base.png" alt="Image" class="base-img" data-aos="zoom-in"
            data-aos-duration="1000">
    </div>
    <div class="parasuit">
        <img src="assets/images/parasuit.png" alt="Image">
    </div>
</section>
<!-- ==== / banner section end ==== -->
<!-- ==== overview section start ==== -->
<section class="overview">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="overview__inner" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                    <div class="overview__single overview__left">
                        <h4>{{$project->title}}</h4>
                        <div class="cause__progress progress-bar-single">
                            <div class="cause-progress__bar">
                                <div class="progress-bar-wrapper" data-percent="{{$project->progress_percentage}}%">
                                    <div class="progress-bar">
                                        <div class="progress-bar-percent"><span
                                                class="percent-value">{{$project->progress_percentage}}%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cause-progress__goal">

                            <div class="goal-single">
                                <span>الهدف المطلوب</span>
                                <h5>{{$project->target_goal}}</h5>
                            </div>
                            <div class="goal-single">
                                <span>ما تم تحقيقه</span>
                                <h5>{{$project->achieved_value}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="overview__single overview__right">
                        <span>{{$project->campaign_name}}</span>
                        <h4><a href="{{route('projects')}}">{{$project->subtitle}}</a></h4>
                        <p>{{$project->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==== / overview section end ==== -->