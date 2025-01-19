<!-- ==== event section start ==== -->
<section class="event">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-xl-7">
                <div class="section__header text-center" data-aos="fade-up" data-aos-duration="1000">
                    <span class="sub-title"><i class="icon-donation"></i>البركة خير وعطــــــاء</span>
                    <h2 class="title-animation">تفقد  <span>جديد </span> البركة الجزائرية</h2>
                </div>
            </div>
        </div>
        <div class="row gutter-30">
            @foreach ($recentPosts as $index => $post)
            @if ($index === 0)
            <div class="col-12 col-lg-6 col-xl-7">
                <div class="event__single-wrapper" data-aos="fade-up" data-aos-duration="1000">
                    <div class="event__single van-tilt">
                        <div class="event__single-thumb">
                            @if ($post->type === 'video')
                            <!-- Display Video Thumbnail -->
                            @php
                            // Extract YouTube video ID from the URL using regex
                            preg_match('/(?:https?:\/\/(?:www\.)?youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/)([a-zA-Z0-9_-]{11}))/i',
                            $post->video_url, $matches);
                            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/
                            ]{11})%i',$post->video_url, $matches);
                            
                            $videoId = $matches[1] ?? null;
                            
                            @endphp
                            <img src="https://img.youtube.com/vi/{{ $videoId }}/maxresdefault.jpg" alt="Image">
                            @else
                            <!-- Display Post Main Image -->
                            <img src="{{asset('storage/' . $post->image) }}" alt="Image">
                            @endif
                        </div>
                        <div class="event__content">
                            <span>{{ $post->created_at->diffForHumans() }}</span>
                            <h4><a href="event-details.html">{{ $post->title }}</a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            @elseif ($index === 1)
            <div class="col-12 col-lg-6 col-xl-5">
                <div class="event__single-wrapper" data-aos="fade-left" data-aos-duration="1000">
                    <div class="event__single event-single-alt van-tilt">
                        <div class="event__single-thumb">
                            @if ($post->type === 'video')
                            <!-- Display Video Thumbnail -->
                            @php
                            // Extract YouTube video ID from the URL using regex
                            preg_match('/(?:https?:\/\/(?:www\.)?youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/)([a-zA-Z0-9_-]{11}))/i',
                            $post->video_url, $matches);
                            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/
                            ]{11})%i',$post->video_url, $matches);
                            
                            $videoId = $matches[1] ?? null;
                            
                            @endphp
                            <img src="https://img.youtube.com/vi/{{ $videoId }}/maxresdefault.jpg" alt="Image">
                            @else
                            <!-- Display Post Main Image -->
                            <img src="{{asset('storage/' . $post->image) }}" alt="Image">
                            @endif
                        </div>
                        <div class="event__content">
                            <span>{{ $post->created_at->diffForHumans() }}</span>
                            <h4><a href="event-details.html">{{ $post->title }}</a>
                            </h4>
                            
                        </div>
                    </div>
                </div>
            @elseif ($index === 2)
                <div class="event__single-wrapper" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="300">
                    <div class="event__single  event-single-alt van-tilt">
                        <div class="event__single-thumb">
                            @if ($post->type === 'video')
                            <!-- Display Video Thumbnail -->
                            @php
                            // Extract YouTube video ID from the URL using regex
                            preg_match('/(?:https?:\/\/(?:www\.)?youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/)([a-zA-Z0-9_-]{11}))/i',
                            $post->video_url, $matches);
                            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/
                            ]{11})%i',$post->video_url, $matches);
                            
                            $videoId = $matches[1] ?? null;
                            
                            @endphp
                            <img src="https://img.youtube.com/vi/{{ $videoId }}/maxresdefault.jpg" alt="Image">
                            @else
                            <!-- Display Post Main Image -->
                            <img src="{{asset('storage/' . $post->image) }}" alt="Image">
                            @endif
                        </div>
                        <div class="event__content">
                            <span>{{ $post->created_at->diffForHumans() }}</span>
                            <h4><a href="event-details.html">{{ $post->title }}</a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>

        <div class="row">
            <div class="col-12">
                <div class="section__cta cta text-center">
                    <a href="{{route('posts')}}" aria-label="our events" title="our events" class="btn--primary">كل الأخبار <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="spade">
        <img src="assets/images/blog/spade-base.png" alt="Image" class="base-img">
    </div>
</section>
<!-- ==== / event section end ==== -->