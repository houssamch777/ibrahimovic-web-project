@extends('layouts.admin.master-without-nav')
@section('title')
Register
@endsection
@section('content')
<div class="auth-maintenance d-flex align-items-center min-vh-100">
    <div class="bg-overlay bg-light"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="auth-full-page-content d-flex min-vh-100 py-sm-5 py-4">
                    <div class="w-100">
                        <div class="d-flex flex-column h-100 py-0 py-xl-3">
                            <div class="text-center mb-4">
                                <a href="#" class="">
                                    <img src="{{ URL::asset('build/images/logo-dark.png') }}" alt="" height="62"
                                        class="auth-logo logo-dark mx-auto">
                                    <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="" height="62"
                                        class="auth-logo logo-light mx-auto">
                                </a>
                                <p class="text-muted mt-2">إضافة معلومات الفرع</p>
                            </div>

                            <div class="card my-auto overflow-hidden">
                                <div class="row g-0">
                                    <div class="col-lg-6">
                                        <div class="bg-overlay bg-primary"></div>
                                        <div class="h-100 bg-auth align-items-end">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="p-lg-5 p-4">
                                            <div>
                                                <div class="text-center mt-1">
                                                    <h4 class="font-size-18">تسجيل فرع جديد</h4>
                                                    <p class="text-muted">يرجى إدخال بيانات الفرع أدناه.</p>
                                                </div>

                                                <form action="" method="POST"
                                                    class="auth-input">
                                                    @csrf

                                                    <div class="mb-2">
                                                        <label for="branch-name" class="form-label">اسم الفرع</label>
                                                        <input type="text" class="form-control" id="branch-name"
                                                            name="name" placeholder="أدخل اسم الفرع" required>
                                                    </div>

                                                    <div class="mb-2">
                                                        <label for="branch-address" class="form-label">عنوان
                                                            الفرع</label>
                                                        <input type="text" class="form-control" id="branch-address"
                                                            name="address" placeholder="أدخل عنوان الفرع" required>
                                                    </div>

                                                    <div class="mb-2">
                                                        <label for="branch-map-link" class="form-label">رابط موقع
                                                            جوجل</label>
                                                        <input type="url" class="form-control" id="branch-map-link"
                                                            name="map_link" placeholder="أدخل رابط الموقع على الخريطة">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">أرقام الهاتف</label>
                                                        <div id="phone-container">
                                                            <input type="text" class="form-control mb-2" name="phone[]"
                                                                placeholder="أدخل رقم الهاتف" required>
                                                        </div>
                                                        <button type="button" id="add-phone"
                                                            class="btn btn-secondary btn-sm">+ أضف رقمًا آخر</button>
                                                    </div>

                                                    <div class="mb-2">
                                                        <label for="branch-social-links" class="form-label">روابط مواقع
                                                            التواصل الاجتماعي</label>
                                                        <textarea class="form-control" id="branch-social-links"
                                                            name="social_links"
                                                            placeholder="أدخل روابط مواقع التواصل، كل رابط في سطر"></textarea>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="branch-status" class="form-label">حالة
                                                            المكتب</label>
                                                        <select class="form-select" id="branch-status" name="status"
                                                            required>
                                                            <option value="active">نشط</option>
                                                            <option value="inactive">غير نشط</option>
                                                        </select>
                                                    </div>

                                                    <div class="mt-3">
                                                        <button class="btn btn-primary w-100" type="submit">تسجيل
                                                            الفرع</button>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="mt-4 text-center">
                                                <p class="mb-0"><a href="{{ route('branches') }}"
                                                        class="fw-medium text-primary"> العودة إلى قائمة الفروع</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->

                            <div class="mt-5 text-center">
                                <p class="mb-0">©
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script> البركة. صُنع بحب <i class="mdi mdi-heart text-danger"></i>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
</div>




@endsection
@section('scripts')
<!-- App js -->
<script>
    document.getElementById('add-phone').addEventListener('click', function () {
        const phoneContainer = document.getElementById('phone-container');
        const newInput = document.createElement('input');
        newInput.type = 'text';
        newInput.name = 'phone[]';
        newInput.placeholder = 'أدخل رقم الهاتف';
        newInput.className = 'form-control mb-2';
        phoneContainer.appendChild(newInput);
    });
</script>
<script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection