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
                                        <p>يمكنكم المساهمة في مشاريعنا ودعم جهودنا في مساعدة المحتاجين عبر إحدى الطرق
                                            التالية:</p>
                                        <ul>
                                            <li class="mb-2">
                                                <strong class="text-success fs-3 fw-bolder mb-4">التبرع النقدي
                                                    المباشر:</strong>
                                                <br>
                                                يمكنكم زيارة <a href="{{route('branches')}}" class="text-success"><strong>
                                                        مكاتب الجمعية </strong></a> المتواجدة في مختلف الولايات لتقديم
                                                تبرعاتكم النقدية مباشرة.
                                            </li>
                                            <li class="mb-2">
                                                <strong class="text-success fs-3 fw-bolder mb-4">عبر الموقع
                                                    الإلكتروني:</strong>
                                                <br>
                                                يمكنكم التبرع بسهولة وأمان عبر بوابتنا الإلكترونية باستخدام بطاقة الدفع.
                                                <a href="#donate" class="text-success"><strong>في الأسفل</strong></a>
                                            </li>
                                            <li class="mb-2">
                                                <strong class="text-success fs-3 fw-bolder mb-4">عبر مكاتب البريد
                                                    الجزائري:</strong>
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
                                                    <p><strong>ملاحظة:</strong> الصفحة قيد التطوير وربط نظام الدفع الإلكتروني جارٍ.</p>
                                                @if ($errors->has('error'))
                                                        <p><strong>{{ $errors->first('error') }}</strong></p> 
                                                @endif
                                                </div>
                                                

                                                <form action="{{ route('payment.create') }}" method="POST">
                                                    @csrf
                                                    <div class="donation-form" data-aos-delay="300">
                                                        <!-- Donation Amount -->
                                                        <div class="donation-form__single">
                                                            <h5>تبرعك:</h5>
                                                            <div class="input-group-icon">
                                                                <div class="thumb">
                                                                    <h5 class="text-light">دج</h5>
                                                                </div>
                                                                <input type="number" name="amount" id="donationAmount" 
                                                                       required placeholder="أدخل المبلغ" value="{{ old('amount') }}">
                                                                @error('amount')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                            <div class="made-amount">
                                                                <button type="button" class="donation-amount" onclick="setAmount(500)">500</button>
                                                                <button type="button" class="donation-amount" onclick="setAmount(1000)">1000</button>
                                                                <button type="button" class="donation-amount active" onclick="setAmount(2000)">2000</button>
                                                                <button type="button" class="donation-amount" onclick="setAmount(5000)">5000</button>
                                                                <button type="button" class="donation-amount" onclick="setAmount(10000)">10000</button>
                                                                <button type="button" class="donation-amount custom-amount" onclick="clearAmount()">مخصص</button>
                                                            </div>
                                                        </div>
                                                
                                                        <!-- Google Recaptcha -->
                                                        <div class="g-recaptcha mt-4 mb-2" data-sitekey="{{ config('services.recaptcha.key') }}"></div>
                                                        @error('g-recaptcha-response')
                                                            <small class="text-danger mt-2">{{ $message }}</small>
                                                        @enderror
                                                
                                                        <!-- Terms and Conditions -->
                                                        <div class="donation-form__single">
                                                            <div class="mt-2">
                                                                <input type="checkbox" id="offlineDonation" name="terms" {{ old('terms') ? 'checked' : '' }} required>
                                                                <label for="offlineDonation"> أوافق على <a href="javascript:void(0)" onclick="showTermsDocument()">الشروط والأحكام</a></label>
                                                                @error('terms')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                
                                                        <!-- SATIM Logo -->
                                                        <a href="https://www.satim.dz" target="_blank" class="btn btn-light border" style="margin: 10px;">
                                                            <img src="{{ asset('assets/logo-interoperabilite-final.png') }}" alt="CIB Logo" style="width: 50px; height: auto;">
                                                        </a>
                                                    </div>
                                                
                                                    <!-- Submit Button -->
                                                    <div class="cta">
                                                        <button type="submit" aria-label="donate us" title="donate us" class="btn--primary">
                                                            تبرع الأن <i class="fa-solid fa-arrow-right"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                                
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
                                                                            <a href="{{ route('posts.show', ['id' => $post->id]) }}">
                                                                                @if ($post->type == 'image')

                                                                                    <img src="{{ asset('storage/' . $post->image) }}" alt="Image">
                                                                                @else
                                                                                                                        @php
                                                                                                                            // Extract YouTube video ID from the URL using regex
                                                                                                                            preg_match(
                                                                                                                                '/(?:https?:\/\/(?:www\.)?youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/)([a-zA-Z0-9_-]{11}))/i',
                                                                                                                                $post->video_url,
                                                                                                                                $matches
                                                                                                                            );
                                                                                                                            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ]{11})%i', $post->video_url, $matches);

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
                                                                            <p><a
                                                                                    href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title}}</a>
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
    <script async src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function toggleSubmitButton() {
            const checkbox = document.getElementById('accept-terms');
            const submitButton = document.getElementById('submit-btn');
            submitButton.disabled = !checkbox.checked;
        }

        function showTermsDocument() {
            const termsWindow = window.open('', '_blank', 'width=600,height=400');
            termsWindow.document.write(`
                    <html>
                    <head>
                        <title>الشروط والأحكام</title>
                        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
                    </head>
                    <body class="p-4" style="direction: rtl;">
                        <h1 class="mb-3">الشروط والأحكام</h1>
                        <p>هذه وثيقة تجريبية للشروط والأحكام التي تنظم عملية الدفع الإلكتروني عبر الموقع.</p>
                        <p>يجب الالتزام بجميع الشروط المذكورة لضمان أمان وسلامة العمليات.</p>
                        <p>في حال وجود أي استفسارات، يمكنكم التواصل مع الدعم الفني.</p>
                    </body>
                    </html>
                `);
        }
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
            const element = document.getElementById('donate');
            console.log(element);
            if (element) {
                element.scrollIntoView({ behavior: 'smooth' });
            }
        });
</script>
@endsection