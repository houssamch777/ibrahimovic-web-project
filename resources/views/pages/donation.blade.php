@extends('layouts.rtl.app')

@section('pageTitle', 'تبرع لجمعية البركة الجزائرية | دعم الشعوب المظلومة')
@section('pageDescription', 'تبرع الآن لجمعية البركة الجزائرية وساهم في دعم الشعوب المظلومة من خلال المساعدات الإنسانية،
المشاريع الخيرية، والإغاثة العاجلة.')
@section('pageKeywords', 'تبرع, جمعية البركة الجزائرية, دعم الشعوب, المشاريع الخيرية, التبرعات, العمل الإنساني,
الإغاثة')
@section('ogTitle', 'تبرع الآن | جمعية البركة الجزائرية لدعم الشعوب المظلومة')
@section('ogDescription', 'ساهم في دعم الشعوب المظلومة من خلال التبرع لجمعية البركة الجزائرية. تبرعاتكم تساهم في تقديم
المساعدات الإنسانية وتنفيذ المشاريع الخيرية.')
@section('ogImage', asset('images/10-years-logo.jpg'))
<!-- استبدل 'donation-banner.jpg' بمسار صورة صفحة التبرع -->
@section('ogUrl', route('donation.index'))
<!-- استبدل 'donation' بمسار صفحة التبرع -->
@section('ogType', 'article')
@section('twitterTitle', 'تبرع لجمعية البركة الجزائرية | دعم الشعوب المظلومة')
@section('twitterDescription', 'تبرع الآن وساهم في تحقيق العدالة الإنسانية ودعم الشعوب المظلومة من خلال جمعية البركة
الجزائرية.')
@section('twitterImage', asset('assets/10-years-logo.jpg'))
<!-- استبدل 'donation-banner.jpg' بمسار صورة صفحة التبرع -->
@section('css')

@endsection

@section('content')


<section class="mt-4">
    <div class="mt-4">
        <!-- ==== donate us section start ==== -->
        <div class="cm-details donate-us community checkout faq">
            <div class="container">
                <div class="row gutter-60">
                    <div class="col-12 col-xl-8">
                        <div class="cm-details__content">
                            <div class="cm-details__poster" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="100">
                                <img src="assets/images/donation-poster.png" alt="Image">
                            </div>
                            <div class="donate-inner" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                                <div class="cm-group">
                                    <h3 class="title-animation">كن يد العون للفقراء والمحتاجين وسبيلهم</h3>
                                    <p>يمكنكم المساهمة في مشاريعنا ودعم جهودنا في مساعدة المحتاجين عبر إحدى الطرق التالية:</p>
                                    <ul>
                                        <li class="mb-2">
                                            <strong class="text-success fs-3 fw-bolder mb-4">التبرع النقدي المباشر:</strong>
                                            <br>
                                            يمكنكم زيارة  <a href="{{route('branches')}}" class="text-success"><strong> مكاتب الجمعية </strong></a> المتواجدة في مختلف الولايات لتقديم تبرعاتكم النقدية مباشرة.
                                        </li>
                                        <li class="mb-2">
                                            <strong class="text-success fs-3 fw-bolder mb-4">عبر الموقع الإلكتروني:</strong>
                                            <br>
                                            يمكنكم التبرع بسهولة وأمان عبر بوابتنا الإلكترونية باستخدام بطاقة الدفع.
                                            <a href="#donate" class="text-success"><strong>في الأسفل</strong></a>
                                        </li>
                                        <li class="mb-2">
                                            <strong class="text-success fs-3 fw-bolder mb-4">عبر مكاتب البريد الجزائري:</strong>
                                            <br class="mb-1">
                                            يمكنكم إيداع تبرعاتكم في حساب الجمعية عبر مكاتب البريد.
                                            <br>
                                            <strong>CCP</strong> : 210 243 29 <strong>Cle</strong> 40
                                            <br>
                                            أو عبر الموزع الالي عبر الرقم التالي
                                            <br>
                                            <strong>RIP</strong> : 00799999002102432914
                                            <br>
                                            <span class="text-danger">ملاحظة لا يمكن التبرع عبر تطبيق بريدي موب</span>
                                        </li>
                                        <li class="mb-2">
                                            <strong class="text-success fs-3 fw-bolder mb-4">التحويلات البنكية:</strong>
                                            <br>
                                            بإمكانكم تحويل تبرعاتكم عبر بنك القرض الشعبي.
                                            <br>
                                            <strong>CPA</strong> : 004 001 854 100 009 720 30
                                        </li>
                                        
                                    </ul>
                                    <div class="contact mt-4">                                      
                                        <p></p>
                                    </div>
                                </div>
                                <div class="cta">
                                    <div class="community-donation" id="donate">
                                        <div class="community-donation__inner mt-5">
                                            <h5 class="mt-4">معًا نُحدث فرقًا ونزرع الأمل في قلوب المحتاجين.</h5>
                                            <div class="warning">
                                                <div class="line"><i class="fa-solid fa-triangle-exclamation"></i></div>
                                                <p><strong>ملاحظة:</strong> الصفحة قيد التطوير ولم يتم ربط نظام التبرع الإلكتروني بعد.
                                                </p>
                                            </div>
                                            <div class="donation-form" data-aos-delay="300">
                                                <div class="donation-form__single">
                                                    <h5>تبرعك:</h5>
                                                    <div class="input-group-icon">
                                                        <div class="thumb">
                                                            <h5 class="text-light">دج</h5>
                                                        </div>
                                                        <input type="text" name="donation-amount" id="donationAmount">
                                                    </div>
                                                    <div class="made-amount">
                                                        <span class="donation-amount">500</span>
                                                        <span class="donation-amount">1000</span>
                                                        <span class="donation-amount active">2000</span>
                                                        <span class="donation-amount">5000</span>
                                                        <span class="donation-amount">10000</span>
                                                        <span class="donation-amount custom-amount">مخصص</span>
                                                    </div>
                                                </div>
                                                <div class="donation-form__single">
                                                    <h5>اختر طريقة الدفع</h5>
                                                    <div class="radio-wrapper">

                                                        <div class="radio-single">
                                                            <input type="radio" id="offlineDonation" name="donation-payment"
                                                                checked>
                                                            <label for="offlineDonation">البطاقة البنكية CIB</label>
                                                        </div>
                                                        <div class="radio-single">
                                                            <input type="radio" id="cardDonation" name="donation-payment"
                                                                checked>
                                                            <label for="cardDonation">البطاقة الذهبية</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cta">
                                                    <a href="" aria-label="donate us" title="donate us"
                                                        class="btn--primary">تبرع الأن <i
                                                            class="fa-solid fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="cm-details__sidebar">
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
                                                <img src="https://img.youtube.com/vi/{{ $videoId }}/maxresdefault.jpg" alt="Image">
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
                            <div class="cm-sidebar-overview" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="100">
                                <div class="cm-logo">
                                    <img src="{{asset('assets/images/logo-main.png')}}" style="width: 30%" alt="Image">
                                </div>
                                <div class="cm-content">
                                    <p>مبلغ بسيط يصنع أثر كبير ...</p>
                                    <h4> إطعام, صحة وتعليم للشعوب المستضعفة في كل مكان
                                    </h4>
                                </div>
                                <div class="cm-cta">
                                    <a href="contact-us.html" aria-label="contact us" title="contact us"
                                        class="btn--primary">
                                        أطلب إستشارة<i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                                <img src="assets/images/donate.png" alt="Image" class="parallax-image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ==== / donate us section end ==== -->
    </div>
</section>



@endsection

@section('js')


@endsection