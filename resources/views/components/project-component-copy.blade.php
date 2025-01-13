<div class="col-12 col-md-6 col-xl-4 col-xxl-3 d-flex ">
    <div class="cause__slider-inner w-100 d-flex flex-column" data-aos="fade-up" data-aos-duration="1000"
        style="min-height: 100%;">
        <div class="cause__slider-single van-tilt d-flex flex-column" style="min-height: 100%;">
            <div class="thumb">
                <a href="#">
                    <img src="assets/images/cause/one.png" alt="{{ $project->name }}">
                </a>
                <div class="tag">
                    <a href="#">
                        {{ $project->category }}
                    </a>
                </div>
            </div>
            <div class="content d-flex flex-column">
                <h6>
                    <a href="#">{{ $project->name }}</a>
                </h6>
                <p>{{ \Illuminate\Support\Str::limit($project->description, 120, '...') }}</p>
            </div>

            <!-- Card Footer -->
            <div class="card-footer text-center mt-auto">
                <a href="#" class="btn--primary mt-4 mb-2">إعرف أكثر ... </a>
            </div>
        </div>
    </div>
</div>