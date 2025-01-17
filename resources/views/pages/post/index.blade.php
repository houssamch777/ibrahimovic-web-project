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

                <div class="pagination-wrapper" data-aos="fade-up" data-aos-duration="1000">
                    @if ($posts->hasPages())
                    <ul class="pagination main-pagination">
                        {{-- Previous Page Link --}}
                        @if ($posts->onFirstPage())
                        <li class="disabled">
                            <button disabled>
                                <i class="fa-solid fa-angles-right"></i>
                            </button>
                        </li>
                        @else
                        <li>
                            <a href="{{ $posts->previousPageUrl() }}" aria-label="Previous">
                                <i class="fa-solid fa-angles-right"></i>
                            </a>
                        </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                        <li>
                            <a href="{{ $url }}" class="{{ $posts->currentPage() == $page ? 'active' : '' }}">
                                {{ $page }}
                            </a>
                        </li>
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($posts->hasMorePages())
                        <li>
                            <a href="{{ $posts->nextPageUrl() }}" aria-label="Next">
                                <i class="fa-solid fa-angles-left"></i>
                            </a>
                        </li>
                        @else
                        <li class="disabled">
                            <button disabled>
                                <i class="fa-solid fa-angles-left"></i>
                            </button>
                        </li>
                        @endif
                    </ul>
                    @endif
                </div>
            </div>
            <div class="col-12 col-xl-4">
                <div class="blog-main__sidebar">
                    <div class="cm-details__sidebar">
                        <div class="cm-sidebar-widget" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                            <div class="intro">
                                <h5>ابحث هنا</h5>
                            </div>
                            <input type="text" id="search-input" class="form-control" placeholder="Search for posts...">
                            <div id="search-results" class="cm-sidebar-post">
                                <!-- Search results will appear here -->
                            </div>
                        </div>
                        <div class="cm-sidebar-widget" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                            <div class="intro">
                                <h5>أخر الأخبار</h5>
                            </div>
                            <div class="cm-sidebar-post">
                                @foreach ($recentPosts as $post)
                                <div class="single-item">
                                    <div class="thumb">
                                        <a href="{{ route('posts.show', ['id'=>$post->id]) }}">
                                            @if ($post->type=='image')

                                            <img src="{{ asset('storage/' . $post->image) }}" alt="Image">
                                            @else
                                            @php
                                            // Extract YouTube video ID from the URL using regex
                                            preg_match('/(?:https?:\/\/(?:www\.)?youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/)([a-zA-Z0-9_-]{11}))/i',
                                            $post->video_url, $matches);
                                            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/
                                            ]{11})%i',$post->video_url, $matches);

                                            $videoId = $matches[1] ?? null;

                                            @endphp
                                            <img src="https://img.youtube.com/vi/{{ $videoId }}/maxresdefault.jpg"
                                                alt="Image">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="content">
                                        <p><i class="fa-solid fa-calendar-days"></i> <span>{{
                                                $post->created_at->diffForHumans() }}</span>
                                        </p>
                                        <p><a href="{{ route('posts.show', ['id'=>$post->id]) }}">{{ $post->title}}</a>
                                        </p>
                                    </div>
                                </div>
                                @endforeach

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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const searchInput = document.getElementById('search-input');
    const resultsContainer = document.getElementById('search-results');

    searchInput.addEventListener('keyup', function () {
        const query = this.value;

        if (query.length > 0) {
            $.ajax({
                url: "{{ route('posts.search') }}",
                method: "GET",
                data: { query: query },
                success: function (data) {
                    resultsContainer.innerHTML = ''; // Clear previous results

                    // Check if posts exist
                    if (data.length > 0) {
                        data.forEach(post => {
                            let postHtml = `
                            <div class="single-item">
                                <div class="thumb">
                                    <a href="/posts/${post.id}">
                            `;

                            // Check if the post has an image or a video
                            if (post.type === 'image') {
                                postHtml += `<img src="/storage/${post.image}" alt="Image">`;
                            } else if (post.video_url) {
                                // Extract the YouTube video ID
                                const videoId = post.video_url.match(/(?:https?:\/\/(?:www\.)?youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/)([a-zA-Z0-9_-]{11}))/i) || 
                                                post.video_url.match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\n]*{11})%i');
                                const youtubeImage = `https://img.youtube.com/vi/${videoId[1]}/maxresdefault.jpg`;
                                postHtml += `<img src="${youtubeImage}" alt="Image">`;
                            }

                            postHtml += `
                                    </a>
                                </div>
                                <div class="content">
                                    <p><i class="fa-solid fa-calendar-days"></i> <span>${new Date(post.created_at).toLocaleString()}</span></p>
                                    <p><a href="/posts/${post.id}">${post.title}</a></p>
                                </div>
                            </div>
                            `;

                            resultsContainer.innerHTML += postHtml; // Append the post HTML to the results container
                        });
                    } else {
                        resultsContainer.innerHTML = '<p class="text-muted">لم يتم ايجاد اي موضوع بهذا العنوان.</p>';
                    }

                    console.log(data); // For debugging purposes
                }
            });
        } else {
            resultsContainer.innerHTML = ''; // Clear results when input is empty
        }
    });
</script>
@endsection