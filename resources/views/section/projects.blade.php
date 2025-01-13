<!-- ==== blog section start ==== -->
<section class="blog-main blog cm-details">
    <div class="container">
        <div class="row gutter-60">
            <div class="col-12 col-xl-8">
                <div class="row gutter-30">
                    @foreach ($projects as $project)
                    <x-project-component :project="$project" />
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="pagination-wrapper" data-aos="fade-up" data-aos-duration="1000">
                            @if ($projects->hasPages())
                            <ul class="pagination main-pagination">
                                {{-- Previous Page Link --}}
                                @if ($projects->onFirstPage())
                                <li class="disabled">
                                    <button disabled>
                                        <i class="fa-solid fa-angles-right"></i>
                                    </button>
                                </li>
                                @else
                                <li>
                                    <a href="{{ $projects->previousPageUrl() }}" aria-label="Previous">
                                        <i class="fa-solid fa-angles-right"></i>
                                    </a>
                                </li>
                                @endif
                            
                                {{-- Pagination Elements --}}
                                @foreach ($projects->getUrlRange(1, $projects->lastPage()) as $page => $url)
                                <li>
                                    <a href="{{ $url }}" class="{{ $projects->currentPage() == $page ? 'active' : '' }}">
                                        {{ $page }}
                                    </a>
                                </li>
                                @endforeach
                            
                                {{-- Next Page Link --}}
                                @if ($projects->hasMorePages())
                                <li>
                                    <a href="{{ $projects->nextPageUrl() }}" aria-label="Next">
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
                        <div class="cm-sidebar-widget" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                            <div class="intro">
                                <h5>الفئة</h5>
                            </div>
                            <div class="cm-categories">
                                @foreach ($categories as $category)
                                <a href="">
                                    <span>{{ $category->category }}</span>
                                    <span>{{ $category->count }}</span>
                                </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="cm-sidebar-widget" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                            <div class="intro">
                                <h5>المكان</h5>
                            </div>
                            <div class="tag-wrapper">
                                <a href="shop.html">غزة</a>
                                <a href="shop.html">لبنان</a>
                                <a href="shop.html">القدس</a>
                                <a href="shop.html">الجزائر</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==== / blog section end ==== -->