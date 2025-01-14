@extends('layouts.admin.master')

@section('title')
المحتوى
@endsection

@section('page-title')
نشر منشور صور
@endsection

@section('body')

<body data-sidebar="colored">
    @endsection

    @section('content')
    <!--  ابدأ المحتوى -->
    <div class="container-fluid">
        <div class="row">
            <!-- العمود الأول: إدخال بيانات المنشور -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title">إضافة منشور صور جديد</h5>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <h5>حدثت الأخطاء التالية:</h5>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="type" value="image">
                            <!-- عنوان المنشور -->
                            <div class="mb-3">
                                <label for="title" class="form-label">عنوان المنشور</label>
                                <input type="text" name="title" id="title" class="form-control"
                                    placeholder="أدخل عنوان المنشور" required>
                            </div>

                            <!-- وصف المنشور -->
                            <div class="mb-3">
                                <label for="description" class="form-label">وصف المنشور</label>
                                <textarea name="description" id="description" class="form-control" rows="5"
                                    placeholder="أدخل وصف المنشور"></textarea>
                            </div>

                            <!-- صورة الواجهة الرئيسية -->
                            <div class="mb-3">
                                <label for="image" class="form-label">صورة الواجهة الرئيسية</label>
                                <input type="file" name="image" id="image" class="form-control" required>
                            </div>

                            <!-- الصور -->
                            <div class="mb-3">
                                <label for="images" class="form-label">صور المنشور</label>
                                <input type="file" name="images[]" id="images" class="form-control" multiple required>
                                <small class="text-muted">يمكنك اختيار عدة صور.</small>
                            </div>

                            <!-- زر الحفظ -->
                            <button type="submit" class="btn btn-primary w-100">نشر المنشور</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- العمود الثاني: عرض المعاينة -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title">معاينة المنشور</h5>
                    </div>
                    <div class="card-body text-center">
                        <!-- عرض معاينة العنوان -->
                        <h4 id="preview-title" class="text-primary">عنوان المنشور</h4>
                       
                        <!-- عرض معاينة صورة الواجهة -->
                        <div class="mb-3">
                            <h6>صورة الواجهة الرئيسية:</h6>
                            <img id="preview-image" src="{{ asset('assets/images/cause/four.png') }}" alt="معاينة"
                                class="img-thumbnail mx-auto d-block" style="width: 60%;">
                        </div>
                        <!-- عرض معاينة الوصف -->
                        <p id="preview-description" class="my-4" style="white-space: pre-wrap;word-wrap: break-word;">وصف المنشور سيظهر هنا...</p>
                        <!-- عرض معاينة الصور -->
                        <div id="preview-images" class="d-flex flex-wrap justify-content-center gap-2">
                            <small class="text-muted">صور المنشور ستظهر هنا...</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  نهاية المحتوى -->
    @endsection

    @section('scripts')
    <script>
        // تحديث معاينة العنوان
    document.getElementById('title').addEventListener('input', function () {
        document.getElementById('preview-title').textContent = this.value || 'عنوان المنشور';
    });

    // تحديث معاينة الوصف
    document.getElementById('description').addEventListener('input', function () {
        document.getElementById('preview-description').textContent = this.value || 'وصف المنشور سيظهر هنا...';
    });

    // تحديث معاينة صورة الواجهة الرئيسية
    document.getElementById('image').addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('preview-image').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    // تحديث معاينة الصور مع أزرار الحذف
    document.getElementById('images').addEventListener('change', function () {
        const previewImages = document.getElementById('preview-images');
        previewImages.innerHTML = ''; // مسح الصور القديمة
        Array.from(this.files).forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function (e) {
                const wrapper = document.createElement('div');
                wrapper.className = 'position-relative';

                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'img-thumbnail';
                img.style.width = '100px';
                img.style.height = '100px';

                const removeBtn = document.createElement('button');
                removeBtn.className = 'btn btn-danger btn-sm position-absolute top-0 end-0';
                removeBtn.textContent = '×';
                removeBtn.type = 'button';
                removeBtn.onclick = function () {
                    wrapper.remove();
                };

                wrapper.appendChild(img);
                wrapper.appendChild(removeBtn);
                previewImages.appendChild(wrapper);
            };
            reader.readAsDataURL(file);
        });
    });
    </script>
    @endsection