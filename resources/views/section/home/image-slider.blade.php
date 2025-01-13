<!-- ==== cause slider two section start ==== -->
<section class="cause-two">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="cause-two__inner">
                    <div class="slider-navigation">
                        <button type="button" aria-label="prev slide" title="prev slide"
                            class="prev-cause-two slider-btn">
                            <i class="fa-solid fa-arrow-left"></i>
                        </button>
                        <button type="button" aria-label="next slide" title="next slide"
                            class="next-cause-two slider-btn slider-btn-next">
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                    <div class="cause-two__slider swiper">
                        <div class="swiper-wrapper">
                            @foreach ($Images as $image)
                                <div class="swiper-slide">
                                    <div class="cause-two__slider-single">
                                        <div class="cause-thumb">
                                            <img src="{{ asset('storage/' . $image->image_url) }}" alt="Image">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="cause-two__content-slider swiper">
                    <div class="swiper-wrapper">
                        @foreach ($Images as $image)
                        <div class="swiper-slide">
                            <div class="cause-content">
                                <h4 class="fs-1 mb-3">البركة في صور</h4>
                                <p>{{ $image->title ?? '' }}</p>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>