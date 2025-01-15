@extends('layouts.admin.master')
@section('title')
ادارة
@endsection
@section('css')


@endsection
@section('page-title')
معلومات رئيس الجمعية
@endsection

@section('body')

<body data-sidebar="colored">
    @endsection
    @section('content')
    <!--  Start your content -->
    <!--  Start your content -->
        <form action="{{ route('admin.president.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
            <div class="col-xl-7">
                <div class="card">
                    <div class="card-header border-0 align-items-center d-flex pb-0">
                        <h4 class="card-title mb-0 flex-grow-1 fs-4">بيانات رئيس الجمعية</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">اسم الرئيس</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $president->name ?? '' }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="designation" class="form-label">المنصب</label>
                                    <input type="text" class="form-control" id="designation" name="designation"
                                        value="{{ $president->designation ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">وصف عن الرئيس</label>
                                    <textarea class="form-control" id="description" name="description"
                                        rows="4">{{ $president->description ?? '' }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">صورة الرئيس</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    @if($president->image)
                                    <img src="{{ Storage::url($president->image) }}" alt="صورة الرئيس" class="img-thumbnail mt-2" width="150">
                                    @endif
                                </div>
                                <!-- روابط الشبكات الاجتماعية -->
                                <div class="mb-3">
                                    <label for="social_links" class="form-label">روابط الشبكات الاجتماعية</label>
                                    <ul id="social-links-list" class="list-group mb-3">
                                        @if (!empty($president->social_links))
                                        @foreach ($president->social_links as $platform => $link)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <input type="text" name="social_links[{{ $platform }}]" value="{{ $link }}" class="form-control"
                                                placeholder="رابط المنصة">
                                            <button type="button" class="btn btn-danger btn-sm remove-item">حذف</button>
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                    <button type="button" id="add-social-link" class="btn btn-success btn-sm">إضافة رابط</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- الإنجازات -->
                                <div class="mb-3">
                                    <label for="achievements" class="form-label">الإنجازات</label>
                                    <ul id="achievements-list" class="list-group mb-3">
                                        @if (!empty($president->achievements))
                                        @foreach ($president->achievements as $achievement)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <input type="text" name="achievements[]" value="{{ $achievement }}" class="form-control me-2">
                                            <button type="button" class="btn btn-danger btn-sm remove-item me-2">حذف</button>
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                    <button type="button" id="add-achievement" class="btn btn-success btn-sm">إضافة إنجاز</button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-xl-5">
                <div class="card">
                    <div class="card-header border-0 align-items-center d-flex pb-0">
                        <h4 class="card-title mb-0 flex-grow-1 fs-4">رسالة من رئيس الجمعية</h4>
                    </div>
                    <div class="card-body">
                        <!-- كلمة الرئيس -->
                        <div class="mb-3">
                            <label for="speech" class="form-label">كلمة الرئيس</label>
                            <textarea class="form-control me-2" id="speech" name="speech" rows="8">{{ $president->speech ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            
        
        </div>
        </form>


    @endsection
    @section('scripts')
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script>
        // إضافة إنجاز جديد
        document.getElementById('add-achievement').addEventListener('click', function () {
            const list = document.getElementById('achievements-list');
            const newItem = document.createElement('li');
            newItem.className = 'list-group-item d-flex justify-content-between align-items-center';
            newItem.innerHTML = `
                <input type="text" name="achievements[]" class="form-control me-2" placeholder="إنجاز جديد">
                <button type="button" class="btn btn-danger btn-sm remove-item">حذف</button>
            `;
            list.appendChild(newItem);
        });
    
        // إضافة رابط شبكات اجتماعية جديد
        document.getElementById('add-social-link').addEventListener('click', function () {
        const list = document.getElementById('social-links-list');
        const newItem = document.createElement('li');
        newItem.className = 'list-group-item d-flex justify-content-between align-items-center';
        newItem.innerHTML = `
        <input type="text" name="social_links[]" class="form-control me-2" placeholder="رابط المنصة">
        <button type="button" class="btn btn-danger btn-sm remove-item">حذف</button>
        `;
        list.appendChild(newItem);
        });
    
        // حذف العنصر
        document.addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('remove-item')) {
                e.target.closest('li').remove();
            }
        });
    </script>
    @endsection