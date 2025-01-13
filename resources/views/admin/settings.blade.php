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
                <form method="POST" action="{{ route('contact.update') }}">
                    @csrf
                    <div class="card-header border-0 align-items-center d-flex pb-0">
                        <h4 class="card-title flex-grow-1 fs-4">معلومات الاتصال بالجمعية</h4>
                    </div>
                    <div class="card-body">
                        <!-- عنوان المقر -->
                        <div class="row mb-3">
                            <label for="address" class="col-sm-3 col-form-label">عنوان المقر</label>
                            <div class="col-sm-9">
                                <input class="form-control @error('address') is-invalid @enderror" type="text" name="address"
                                    id="address" value="{{ old('address', optional($contact)->address) }}"
                                    placeholder="تعاونية الصومام 2 مكرر- لاكوت, بئر مراد رايس, الجزائر العاصمة, الجزائر."
                                    style="direction: rtl;text-align: right">
                                @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
            
                        <!-- رقم الهاتف -->
                        <div class="row mb-3">
                            <label for="phone" class="col-sm-3 col-form-label">رقم الهاتف في الجزائر</label>
                            <div class="col-sm-9">
                                <input class="form-control @error('phone') is-invalid @enderror" type="tel" name="phone" id="phone"
                                    value="{{ old('phone', optional($contact)->phone) }}" placeholder="+213-797-6910-31">
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
            
                        <!-- رقم الهاتف الدولي البديل -->
                        <div class="row mb-3">
                            <label for="alt_phone" class="col-sm-3 col-form-label">رقم الهاتف الدولي</label>
                            <div class="col-sm-9">
                                <input class="form-control @error('alt_phone') is-invalid @enderror" type="tel" name="alt_phone"
                                    id="alt_phone" value="{{ old('alt_phone', optional($contact)->alt_phone) }}"
                                    placeholder="+213-700-1234-56">
                                @error('alt_phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
            
                        <!-- البريد الإلكتروني -->
                        <div class="row mb-3">
                            <label for="email" class="col-sm-3 col-form-label">البريد الإلكتروني</label>
                            <div class="col-sm-9">
                                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                                    id="email" value="{{ old('email', optional($contact)->email) }}"
                                    placeholder="example@domain.com">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
            
                        <!-- رابط موقع خرائط Google -->
                        <div class="row mb-3">
                            <label for="google_map" class="col-sm-3 col-form-label">رابط خرائط Google</label>
                            <div class="col-sm-9">
                                <input class="form-control @error('google_map') is-invalid @enderror" type="url" name="google_map"
                                    id="google_map" value="{{ old('google_map', optional($contact)->google_map) }}"
                                    placeholder="https://www.google.com/maps">
                                @error('google_map')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
            
                        <!-- ساعات العمل -->
                        <div class="row mb-3">
                            <label for="working_hours" class="col-sm-3 col-form-label">ساعات العمل</label>
                            <div class="col-sm-9">
                                <input class="form-control @error('working_hours') is-invalid @enderror" type="text"
                                    name="working_hours" id="working_hours"
                                    value="{{ old('working_hours', optional($contact)->working_hours) }}"
                                    placeholder="08:00 صباحاً - 05:00 مساءً">
                                @error('working_hours')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
            
                        <!-- روابط وسائل التواصل الاجتماعي -->
                        @php
                        $social_media = [
                        'facebook' => 'رابط صفحة الفيسبوك',
                        'youtube' => 'رابط قناة اليوتيوب',
                        'telegram' => 'رابط قناة التلقرام',
                        'tiktok' => 'رابط صفحة التيكتوك',
                        'instagram' => 'رابط صفحة الانستقرام',
                        'twitter' => 'رابط صفحة تويتر'
                        ];
                        @endphp
            
                        @foreach($social_media as $key => $label)
                        <div class="row mb-3">
                            <label for="{{ $key }}" class="col-sm-3 col-form-label">{{ $label }}</label>
                            <div class="col-sm-9">
                                <input class="form-control @error($key) is-invalid @enderror" type="url" name="{{ $key }}"
                                    id="{{ $key }}" value="{{ old($key, optional($contact)->$key) }}"
                                    placeholder="https://www.{{ $key }}.com">
                                @error($key)
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @endforeach
            
                        <!-- زر التحديث -->
                        <div class="text-end pt-2">
                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                <i class="mdi mdi-arrow-left ms-1"></i> تحديث
                            </button>
                        </div>
                    </div>
                </form>
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