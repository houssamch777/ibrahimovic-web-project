<!-- ==== topbar start ==== -->
<div class="topbar topbar--tertiary d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="topbar__inner">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-7">
                            <div class="topbar__list-wrapper">
                                <ul class="topbar__list">
                                    <li><a href="{{$contact->google_map}}" target="_blank"><i
                                                class="fa-solid fa-location-dot"></i>{{$contact->address}}</a>
                                    </li>
                                    <li><a href="mailto:{{$contact->email}}"><i
                                                class="fa-regular fa-envelope"></i>{{$contact->email}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5">
                            <div class="topbar__items justify-content-end">

                                <p style="direction: ltr; text-align: left;"><a href="tel:{{$contact->phone}}"><i
                                            class="fa-solid fa-phone"></i>{{$contact->phone}}</a>
                                </p>
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
                                    <a href="{{ $social['url'] }}" target="_blank"
                                        aria-label="share us on {{ $social['label'] }}" title="{{ $social['label'] }}">
                                        <i class="fa-brands {{ $social['icon'] }}"></i>
                                    </a>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ==== / topbar end ==== -->
<!-- ==== header start ==== -->
<header class="header header-tertiary">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main-header__menu-box">
                    <nav class="navbar p-0">
                        <div class="navbar-logo">
                            <a href="{{route('home')}}">
                                <img src="{{asset('assets/images/logo.png')}}" alt="Image">
                            </a>
                        </div>
                        <div class="navbar__menu d-none d-xl-block">
                            <ul class="navbar__list">
                                <li class="navbar__item nav-fade">
                                    <a href="{{route('home')}}" class="navbar__link">الرئيسية</a>
                                </li>
                                <li class="navbar__item navbar__item--has-children nav-fade">
                                    <a href="#" aria-label="dropdown menu"
                                        class="navbar__dropdown-label dropdown-label-alter">عن الجمعية</a>
                                    <ul class="navbar__sub-menu">
                                        <li>
                                            <a href="{{route('about')}}">النشأة والتأسيس</a>
                                        </li>
                                        <li>
                                            <a href="{{route('vision')}}">الرؤية والرسالة</a>
                                        </li>
                                        <li>
                                            <a href="#">رئيس الجمعية</a>
                                        </li>
                                        <li>
                                            <a href="#">فريق العمل</a>
                                        </li>
                                        <li>
                                            <a href="#">مكاتبنا</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="navbar__item navbar__item--has-children nav-fade">
                                    <a href="#" aria-label="dropdown menu"
                                        class="navbar__dropdown-label dropdown-label-alter">خدمات</a>
                                    <ul class="navbar__sub-menu">
                                        <li>
                                            <a href="{{route('projects')}}">مشاريعنا</a>
                                        </li>
                                        <li>
                                            <a href="#">مناشدات</a>
                                        </li>
                                        <li>
                                            <a href="#">ميثاق العائلة الجزائرية</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="navbar__item navbar__item--has-children nav-fade">
                                    <a href="#" aria-label="dropdown menu"
                                        class="navbar__dropdown-label dropdown-label-alter">المركز الإعلامي</a>
                                    <ul class="navbar__sub-menu">
                                        <li>
                                            <a href="{{route('posts')}}">أخر الأخبار</a>
                                        </li>
                                        <li>
                                            <a href="#">معرض الصور</a>
                                        </li>
                                        <li>
                                            <a href="#">معرض الفيديوات</a>
                                        </li>
                                        <li>
                                            <a href="#">وثائق وتقارير</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="navbar__item nav-fade">
                                    <a href="#" class="navbar__link">الحسابات البنكية</a>
                                </li>
                                <li class="navbar__item nav-fade">
                                    <a href="{{ route('contact') }}" class="navbar__link">اتصل بنا</a>
                                </li>
                            </ul>
                        </div>
                        <div class="navbar__options">
                            <div class="navbar__mobile-options ">
                                <div class="select-country d-none d-xxl-block">
                                    <select name="country" class="country-select select">
                                        <option data-flag="fi-dz">العربية</option>
                                    </select>
                                </div>
                                <a href="donate-us.html" class="btn--primary d-none d-md-flex">بوابة التطوع <i
                                        class="fa-solid fa-arrow-right"></i></a>
                            </div>
                            <button class="open-offcanvas-nav d-flex d-xl-none" aria-label="toggle mobile menu"
                                title="open offcanvas menu">
                                <span class="icon-bar top-bar"></span>
                                <span class="icon-bar middle-bar"></span>
                                <span class="icon-bar bottom-bar"></span>
                            </button>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- ==== / header end ==== -->
<!-- ==== mobile menu start ==== -->
<div class="mobile-menu d-block d-xxl-none">
    <nav class="mobile-menu__wrapper">
        <div class="mobile-menu__header nav-fade">
            <div class="logo">
                <a href="{{route('home')}}" aria-label="home page" title="logo">
                    <img src="{{asset('assets/images/logo.png')}}" alt="Image">
                </a>
            </div>
            <button aria-label="close mobile menu" class="close-mobile-menu">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="mobile-menu__list"></div>
        <div class="mobile-menu__cta nav-fade d-block d-md-none">
            <a href="#" class="btn--primary ">بوابة التطوع <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        <div class="mobile-menu__social social nav-fade">
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
    </nav>
</div>
<div class="mobile-menu__backdrop"></div>
<!-- ==== / mobile menu end ==== -->

<!-- ==== off canvas start ==== -->
<div class="off-canvas d-none d-xl-block">
    <div class="off-canvas__inner">
        <div class="off-canvas__head">
            <a href="{{route('home')}}">
                <img src="{{asset('assets/images/logo.png')}}" alt="Logo">
            </a>
            <button aria-label="close off canvas" class="off-canvas-close">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="offcanvas__search">
            <form action="#">
                <input type="text" placeholder="What are you searching for?" required>
                <button type="submit">
                    <i class="icon-search"></i>
                </button>
            </form>
        </div>
        <div class="off-canvas__contact">
            <h5>Contact Info</h5>
            <div class="single">
                <span>
                    <i class="fa-solid fa-phone-volume"></i>
                </span>
                <a href="tel:253-556-7777">(+1) 253 556-7777</a>
            </div>
            <div class="single">
                <span>
                    <i class="fa-solid fa-envelope"></i>
                </span>
                <a href="mailto:example@support.com">example@support.com</a>
            </div>
            <div class="single">
                <span>
                    <i class="fa-solid fa-location-dot"></i>
                </span>
                <a target="_blank"
                    href="https://www.google.com/maps/place/Narbethong+QLD+4725,+Australia/@-23.8173641,145.3223283,11z/data=!3m1!4b1!4m15!1m8!3m7!1s0x2b2bfd076787c5df:0x538267a1955b1352!2sAustralia!3b1!8m2!3d-25.274398!4d133.775136!16zL20vMGNoZ2h5!3m5!1s0x6bcacfb51d7e5257:0x400eef17f209750!8m2!3d-23.8656897!4d145.5354411!16s%2Fg%2F1wd3w6zw">
                    Narbethong
                    Queensland 4725
                    Australia
                </a>
            </div>
        </div>
        <div class="social">
            <a href="https://www.facebook.com/" target="_blank" aria-label="share us on facebook" title="facebook">
                <i class="fa-brands fa-facebook-f"></i>
            </a>
            <a href="https://vimeo.com/" target="_blank" aria-label="share us on vimeo" title="vimeo">
                <i class="fa-brands fa-vimeo-v"></i>
            </a>
            <a href="https://x.com/" target="_blank" aria-label="share us on twitter" title="twitter">
                <i class="fa-brands fa-twitter"></i>
            </a>
            <a href="https://www.linkedin.com/" target="_blank" aria-label="share us on linkedin" title="linkedin">
                <i class="fa-brands fa-linkedin-in"></i>
            </a>
        </div>
    </div>
</div>
<div class="off-canvas-backdrop"></div>
<!-- ==== / off canvas end ==== -->

<div class="cart-backdrop"></div>