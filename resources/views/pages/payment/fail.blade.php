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
                        <div class="container py-5">
                            <div class="text-center">
                                <div class="alert alert-danger" role="alert">
                                    <h3>عذرًا! العملية لم تتم بنجاح</h3>
                                    <p class="mt-3">
                                        {{ $errors->first('error') ?? 'حدث خطأ أثناء معالجة العملية. الرجاء المحاولة مرة أخرى.' }}
                                    </p>
                                </div>
                        
                                <div class="card my-4">
                                    <div class="card-body">
                                        <h4 class="card-title">تفاصيل العملية</h4>
                                        <p><strong>رقم الطلب:</strong> {{ $orderNumber ?? 'غير متوفر' }}</p>
                                        <p><strong>المبلغ:</strong> {{ isset($amount) ? number_format($amount, 2) : 'غير متوفر' }} دج</p>
                                        <p><strong>حالة العملية:</strong> فشلت</p>
                                    </div>
                                </div>
                        
                                <div class="mt-4">
                                    <a href="{{ route('donation.index') }}" class="btn btn-primary">
                                        العودة إلى صفحة التبرع
                                    </a>
                                    <a href="{{ route('home') }}" class="btn btn-secondary">
                                        العودة إلى الصفحة الرئيسية
                                    </a>
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