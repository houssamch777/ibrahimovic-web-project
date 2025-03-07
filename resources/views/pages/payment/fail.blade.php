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
                        <div class="container mt-5">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card shadow-lg">
                                        <div class="card-header bg-danger text-white text-center">
                                            <h4>Transaction Échouée</h4>
                                        </div>
                                        <div class="card-body">
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    @foreach ($errors->all() as $error)
                                                        <p>{{ $error }}</p>
                                                    @endforeach
                                                </div>
                                            @endif
                        
                                            <p class="text-center">
                                                Nous sommes désolés, votre transaction n'a pas pu être complétée.
                                            </p>
                                            <p class="text-center">
                                                Si le problème persiste, veuillez contacter le numéro vert de la SATIM : <strong>3020</strong><img src="{{asset('assets/3020.png')}}" alt="" class="m-2">.
                                            </p>
                        
                                            <div class="text-center mt-4">
                                                <a href="{{ route('donation.index') }}" class="btn btn-primary">Retourner à la page de donation</a>
                                            </div>
                                        </div>
                                    </div>
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