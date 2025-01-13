<div class="col-12 col-lg-6">
    <div class="blog__single-wrapper" data-aos="fade-up" data-aos-duration="1000">
        <div class="blog__single van-tilt">
            <div class="blog__single-thumb">
                <a href="{{ route('projects.show', $project->id) }}">
                    <img src="{{ asset('storage/' . $project->image_url) }}" alt="Image">
                </a>
                <div class="tag">
                    <a href="blog-list.html"><i class="fa-solid fa-tags"></i>{{ $project->category }}</a>
                </div>
            </div>
            <div class="blog__single-inner">
                <div class="blog__single-meta">
                    <p><i class="fa-solid fa-location-dot"></i>{{ $project->location }}</p>
                </div>
                <div class="blog__single-content">
                    <h5><a href="{{ route('projects.show', $project->id) }}">{{ $project->name }}</a>
                    </h5>
                </div>
                <div class="blog__single-cta">
                    <a href="{{ route('projects.show', $project->id) }}" aria-label="blog details" title="blog details">إقرأ المزيد ...<i class="fa-solid fa-circle-arrow-right"></i></a>
                </div>
            </div>
            <img src="assets/images/blog/spade.png" alt="Image" class="spade-two">
        </div>
    </div>
</div>