@extends('layouts.admin.master')
@section('title')
إعدادات
@endsection
@section('css')

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/4.3.0/jquery.bootstrap-touchspin.min.css"
    rel="stylesheet">
@endsection
@section('page-title')
الإعدادات العامة
@endsection

@section('body')

<body data-sidebar="colored">
    @endsection
    @section('content')
    <!--  Start your content -->
    <div class="row">
        <div class="col-xl-5">
            <div class="card">
                <div class="card-header border-0 align-items-center d-flex pb-0">
                    <h4 class="card-title  flex-grow-1 fs-4 ">معلومات الاتصال بالجمعية</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <label for="address" class="col-sm-3 col-form-label">عنوان المقر</label>
                        <div class="col-sm-9">
                            <input class="form-control" style="text-align: right" type="text"
                                placeholder="تعاونية الصومام 2 مكرر- لاكوت, بئر مراد رايس, الجزائر العاصمة, الجزائر."
                                id="address">
                        </div>
                    </div>
                    <!-- رقم الهاتف -->
                    <div class="row mb-3">
                        <label for="phone" class="col-sm-3 col-form-label">رقم الهاتف</label>
                        <div class="col-sm-9">
                            <input class="form-control" style="text-align: right" type="tel"
                                placeholder="+(213)-797-6910-31" id="phone">
                        </div>
                    </div>
                    <!-- البريد الإلكتروني -->
                    <div class="row mb-3">
                        <label for="email" class="col-sm-3 col-form-label">البريد الإلكتروني</label>
                        <div class="col-sm-9">
                            <input class="form-control" style="text-align: right" type="email"
                                placeholder="example@domain.com" id="email">
                        </div>
                    </div>
                    <!-- رابط موقع خرائط قوقل -->
                    <div class="row mb-3">
                        <label for="google-map" class="col-sm-3 col-form-label">رابط موقع خرائط Google</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="url" placeholder="https://www.google.com/maps"
                                id="google-map">
                        </div>
                    </div>
                    <!-- ساعات العمل -->
                    <div class="row mb-3">
                        <label for="working-hours" class="col-sm-3 col-form-label">ساعات العمل</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" placeholder="08:00 صباحاً - 05:00 مساءً"
                                id="working-hours">
                        </div>
                    </div>
                    <!-- رابط صفحة الفيسبوك -->
                    <div class="row mb-3">
                        <label for="facebook" class="col-sm-3 col-form-label">رابط صفحة الفيسبوك</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="url" placeholder="https://www.facebook.com" id="facebook">
                        </div>
                    </div>
                    <!-- رابط قناة اليوتيوب -->
                    <div class="row mb-3">
                        <label for="youtube" class="col-sm-3 col-form-label">رابط قناة اليوتيوب</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="url" placeholder="https://www.youtube.com" id="youtube">
                        </div>
                    </div>
                    <!-- رابط قناة التلقرام -->
                    <div class="row mb-3">
                        <label for="telegram" class="col-sm-3 col-form-label">رابط قناة التلقرام</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="url" placeholder="https://www.telegram.me" id="telegram">
                        </div>
                    </div>
                    <!-- رابط صفحة التيكتوك -->
                    <div class="row mb-3">
                        <label for="tiktok" class="col-sm-3 col-form-label">رابط صفحة التيكتوك</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="url" placeholder="https://www.tiktok.com" id="tiktok">
                        </div>
                    </div>
                    <!-- رابط صفحة الانستقرام -->
                    <div class="row mb-3">
                        <label for="instagram" class="col-sm-3 col-form-label">رابط صفحة الانستقرام</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="url" placeholder="https://www.instagram.com"
                                id="instagram">
                        </div>
                    </div>
                    <!-- رابط صفحة تويتر -->
                    <div class="row mb-3">
                        <label for="twitter" class="col-sm-3 col-form-label">رابط صفحة تويتر</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="url" placeholder="https://www.twitter.com" id="twitter">
                        </div>
                    </div>
                    <!-- زر التحديث -->
                    <div class="text-end pt-2">
                        <button type="button" class="btn btn-success waves-effect waves-light">
                            <i class="mdi mdi-arrow-left ms-1"></i> تحديث
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-7">
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header border-0 align-items-center d-flex pb-0">
                            <h4 class="card-title mb-0 flex-grow-1 fs-4">معلومات المشروع المثبت في الصفحة الرئيسية</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('featured-project.update') }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label for="title" class="col-sm-3 col-form-label">عنوان المشروع</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="title" style="text-align: right" type="text"
                                            value="{{ $project->title }}" id="title">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="target_goal" class="col-sm-3 col-form-label">الهدف المطلوب</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="target_goal" style="text-align: right"
                                            type="text" value="{{ $project->target_goal }}" id="target_goal">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="achieved_value" class="col-sm-3 col-form-label">القيمة المحققة</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="achieved_value" style="text-align: right"
                                            type="text" value="{{ $project->achieved_value }}" id="achieved_value">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="progress_percentage" class="col-sm-3 col-form-label">نسبة التقدم</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="progress_percentage" style="text-align: right"
                                            type="number" value="{{ $project->progress_percentage }}"
                                            id="progress_percentage">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="campaign_name" class="col-sm-3 col-form-label">اسم الحملة</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="campaign_name" style="text-align: right"
                                            type="text" value="{{ $project->campaign_name }}" id="campaign_name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="subtitle" class="col-sm-3 col-form-label">عنوان ثانوي</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="subtitle" style="text-align: right"
                                            type="text" value="{{ $project->subtitle }}" id="subtitle">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="description" class="col-sm-3 col-form-label">شرح المشروع</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="15" name="description" id="description"
                                            style="text-align: right">{{ $project->description }}</textarea>
                                    </div>
                                </div>
                                <div class="text-end pt-2">
                                    <button type="submit" class="btn btn-success waves-effect waves-light"> <i
                                            class="mdi mdi-arrow-left ms-1"></i> تحديث</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">

                        <div class="card-header border-0 align-items-center d-flex pb-0">
                            <h4 class="card-title mb-0 flex-grow-1 fs-4">صور الشهر</h4>
                        </div>
                        <div class="card-body " style="max-height: 490px; overflow-y: auto;">

                            @forelse ($images as $image)
                            <div class="card">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-md-4">
                                        <div class="card-body">
                                            <form action="{{ route('gallery.destroy', ['id'=>$image->id]) }}"
                                                method="POST" onsubmit="return confirm('هل أنت متأكد من حذف الصورة؟');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-sm btn-outline-danger btn-rounded waves-effect waves-light">
                                                    <i class="ri-close-line align-middle  "></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <img class="card-img img-fluid"
                                            src="{{ asset('storage/' . $image->image_url) }}" alt="Card image">
                                    </div>

                                </div>
                            </div>
                            @empty
                            <h5 class="text-muted text-center">لم يتم اضافة صور بعد</h5>
                            @endforelse
                        </div>

                    </div>
                    <div class="card">
                        <div class="card-body">
                            <!-- إضافة صورة جديدة -->
                            <form action="{{ route('gallery') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="title">عنوان الصورة (اختياري):</label>
                                    <input type="text" name="title" class="form-control" id="title">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="image_url">رفع الصورة:</label>
                                    <input type="file" name="image_url" class="form-control" id="image_url" required>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success">إضافة الصورة</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @endsection
    @section('scripts')
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script src="{{ URL::asset('build/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script>
        $("input[name='demo1']").TouchSpin({
                    min: 0,
                    max: 100,
                    step: 0.1,
                    decimals: 2,
                    boostat: 5,
                    maxboostedstep: 10,
                    postfix: '%'
                });
    </script>
    @endsection