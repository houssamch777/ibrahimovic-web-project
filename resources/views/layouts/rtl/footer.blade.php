<!-- ==== footer start ==== -->
<footer class="footer-three">
    <div class="container">
        <div class="row gutter-30">
            <div class="col-12 col-lg-3">
                <div class="footer-three__logo" data-aos="fade-up" data-aos-duration="1000">
                    <a href="{{route('home')}}">
                        <img src="{{asset('assets/images/logo-light.png')}}" alt="جمعية البركة">
                    </a>
                </div>
            </div>
            <div class="col-12 col-lg-9">
                <div class="footer-three__inner" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                    <div class="footer__bottom-left">
                        <ul class="footer__bottom-list justify-content-center justify-content-lg-end">
                            <li><a href="{{route('about')}}">عن الجمعية</a></li>
                            <li><a href="{{route('projects')}}">برامجنا</a></li>
                            <li><a href="{{route('contact')}}">تواصل معنا</a></li>
                        </ul>
                    </div>
                    <div class="social">
                        @php
                        $socialLinks = [
                        'facebook' => ['url' => $contact->facebook, 'icon' => 'fa-facebook-f', 'label' =>
                        'facebook'],
                        'instagram' => ['url' => $contact->instagram, 'icon' => 'fa-instagram', 'label' =>
                        'instagram'],
                        'twitter' => ['url' => $contact->twitter, 'icon' => 'fa-twitter', 'label' =>
                        'twitter'],
                        'telegram' => ['url' => $contact->telegram, 'icon' => 'fa-telegram', 'label' =>
                        'telegram'],
                        'youtube' => ['url' => $contact->youtube, 'icon' => 'fa-youtube', 'label' =>
                        'youtube'],
                        'tiktok' => ['url' => $contact->tiktok, 'icon' => 'fa-tiktok', 'label' => 'tiktok'],
                        ];
                        @endphp

                        @foreach ($socialLinks as $key => $social)
                        @if (!empty($social['url']))
                        <a href="{{ $social['url'] }}" target="_blank" aria-label="share us on {{ $social['label'] }}"
                            title="{{ $social['label'] }}">
                            <i class="fa-brands {{ $social['icon'] }}"></i>
                        </a>
                        
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="divider">
    <div class="container">
        <div class="row gutter-80">
            <div class="col-12 col-md-6 col-xl-3">
                <div class="footer-three__widget" data-aos="fade-up" data-aos-duration="1000">
                    <div class="footer-two__widget-intro">
                        <h5>من نحن</h5>
                    </div>
                    <div class="footer-three__widget-single">
                        <p>جمعية البركة للعمل الخيري والإنساني هي جمعية تهدف إلى تعزيز التضامن الاجتماعي وتقديم العون
                            للمحتاجين في مختلف المجالات.</p>
                        <p><a href="mailto:{{$contact->email}}">{{$contact->email}}</a></p>
                    </div>
                    <div class="footer-three__widget-alt">
                        <div class="footer-two__widget-intro">
                            <h6 class="title-animation">ساعات العمل</h6>
                        </div>
                        <div class="footer-three__widget-single">
                            <p>{{$contact->working_hours}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <div class="footer-three__widget" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="footer-two__widget-intro">
                        <h5>آخر الأخبار</h5>
                    </div>
                    <div class="footer-three__widget-content">
                        <div class="footer-three__widget-news">
                            <div class="thumb">
                                <a href="news-details.html">
                                    <img src="{{asset('assets/images/blog/ph-one.png')}}" alt="الأخبار">
                                </a>
                            </div>
                            <div class="content">
                                <p><i class="fa-solid fa-calendar"></i>10 يناير 2025</p>
                                <p>
                                    <a href="news-details.html">انطلاق حملة الشتاء الدافئ لدعم الأسر المحتاجة</a>
                                </p>
                            </div>
                        </div>
                        <div class="footer-three__widget-news">
                            <div class="thumb">
                                <a href="news-details.html">
                                    <img src="{{asset('assets/images/blog/ph-two.png')}}" alt="الأخبار">
                                </a>
                            </div>
                            <div class="content">
                                <p><i class="fa-solid fa-calendar"></i>5 يناير 2025</p>
                                <p>
                                    <a href="news-details.html">توزيع المساعدات الغذائية في المناطق النائية</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <div class="footer-three__widget footer-three__widget-alter" data-aos="fade-up" data-aos-duration="1000"
                    data-aos-delay="400">
                    <div class="footer-two__widget-intro">
                        <h5>تواصل معنا</h5>
                    </div>
                    <div class="footer-three__widget-content">
                        <div class="single-address">
                            <div class="thumb">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="content">
                                <p>العنوان</p>
                                <p><a href="{{$contact->google_map}}" target="_blank">{{$contact->address}}</a></p>
                            </div>
                        </div>
                        <div class="single-address">
                            <div class="thumb">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="content">
                                <p>الهاتف</p>
                                <p><a href="tel:{{$contact->phone}}" style="direction: ltr">{{$contact->phone}}</a></p>
                                <p><a href="tel:{{$contact->alt_phone}}" style="direction: ltr">{{$contact->alt_phone}}</a></p>
                            </div>
                        </div>
                        <div class="single-address">
                            <div class="thumb">
                                <i class="fa-regular fa-envelope"></i>
                            </div>
                            <div class="content">
                                <p>البريد الإلكتروني</p>
                                <p><a href="mailto:{{$contact->email}}">{{$contact->email}}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <div class="footer-three__widget footer-three__widget--newsletter" data-aos="fade-up"
                    data-aos-duration="1000" data-aos-delay="600">
                    <div class="footer-two__widget-intro">
                        <h5>النشرة الإخبارية</h5>
                    </div>
                    <div class="footer-three__widget-content">
                        <p>اشترك في نشرتنا الإخبارية لتصلك أحدث الأخبار والمبادرات.</p>
                        <form action="#" method="post">
                            <div class="input-icon">
                                <input type="email" required name="subscribe-email" id="subscribeEmail"
                                    placeholder="أدخل بريدك الإلكتروني">
                                <button type="submit" aria-label="اشترك في نشرتنا" title="اشترك في نشرتنا">
                                    <i class="fa-solid fa-paper-plane"></i>
                                </button>
                            </div>
                            <div class="footer__newsletter-check">
                                <div class="form-group">
                                    <input type="checkbox" id="acceptPolicy">
                                    <label for="acceptPolicy" style="direction: rtl">أوافق على <a href="#">الشروط</a> و
                                        <a href="#">السياسات</a></label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-two__copyright">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-two__copyright-inner text-center">
                        <p style="direction: rtl;">جميع الحقوق محفوظة لجمعية البركة للعمل الخيري والإنساني. &copy;<a
                                href="{{route('home')}}">البركة</a> <span id="copyrightYear"></span>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ==== / footer end ==== -->
<!-- ==== custom cursor start ==== -->
<div class="mouseCursor cursor-outer"></div>
<div class="mouseCursor cursor-inner"></div>
<!-- ==== / custom cursor end ==== -->
<!-- ==== scroll to top start ==== -->
<button class="progress-wrap" aria-label="scroll indicator" title="back to top">
    <span></span>
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</button>
<!-- ==== / scroll to top end ==== -->