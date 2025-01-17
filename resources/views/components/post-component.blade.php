<div class="blog__single cta" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
    <div class="blog__single-thumb">
        @if ($post->type === 'video')
            <!-- Display Video Thumbnail -->
            @php
            // Extract YouTube video ID from the URL using regex
            preg_match('/(?:https?:\/\/(?:www\.)?youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/)([a-zA-Z0-9_-]{11}))/i',
            $post->video_url, $matches);
            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',$post->video_url, $matches);
            
                $videoId = $matches[1] ?? null;
            
            @endphp
            <a href="{{ route('posts.show', ['id'=>$post->id]) }}" target="_blank">
                <img src="https://img.youtube.com/vi/{{ $videoId }}/maxresdefault.jpg" alt="Video Thumbnail" style="max-height: 100px">
            </a>
            <div class="tag">
                <a href=""><i class="fa-solid fa-tags"></i>فيديو</a>
            </div>
        @else
            <!-- Display Post Main Image -->
            <a href="">
                <img src="{{asset('storage/' . $post->image) }}" alt="{{ $post->title }} " style="max-height: 100px">
            </a>
            <div class="tag">
                <a href="{{ route('posts.show', ['id'=>$post->id]) }}"><i class="fa-solid fa-tags"></i>صور</a>
            </div>
        @endif
    </div>
    <div class="blog__single-inner">
        <div class="blog__single-meta">
            <p><i class="icon-user"></i>{{ $post->creator->name ?? 'مستخدم مجهول' }}</p>
            <p><i class="icon-calendar"></i>{{ $post->created_at->diffForHumans() }}</p>
        </div>
        <div class="blog__single-content">
            <h4><a href="{{ route('posts.show', ['id'=>$post->id]) }}" style="direction: rtl;text-align: right">{{ $post->title }}</a></h4>
            <p>{{ \Illuminate\Support\Str::limit($post->description, 120, '...') }}</p>
        </div>
        <div class="blog__single-cta">
            <a href="{{ route('posts.show', ['id'=>$post->id]) }}" aria-label="تفاصيل المنشور" title="تفاصيل المنشور">
                اقرأ المزيد
                <i class="fa-solid fa-arrow-right-long"></i>
            </a>
        </div>
    </div>
</div>
