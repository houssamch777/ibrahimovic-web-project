@extends('layouts.admin.master')
@section('title')
مشاريع
@endsection
@section('page-title')
ادارة المشاريع
@endsection
@section('body')

<body data-sidebar="colored">
    @endsection
    @section('content')
    <!--  Start your content -->
    <div class="row">
        <div class="col-xl-3">
            <div class="card filemanager-sidebar">
                <div class="card-body">
                    <div class="d-flex flex-column h-100">
                        <div>
                            <div class="mb-3">
                                <div class="dropdown">


                                    <a href="#" class="btn btn-primary w-100" data-bs-toggle="modal"
                                        data-bs-target="#addProjectModal">
                                        <i class="mdi mdi-plus me-1"></i> أضف مشروع جديد
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#"><i class="ri-folder-line me-1"></i>
                                            Folder</a>
                                        <a class="dropdown-item" href="#"><i class="ri-file-line me-1"></i>
                                            File</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="mt-2">
                            <h5 class="font-size-16 mb-0">فرز حسب</h5>
                            <ul class="list-unstyled categories-list">

                                <!-- فرز حسب الحالة -->
                                <li>
                                    <div class="custom-accordion">
                                        <a class="text-body fw-medium py-1 d-flex align-items-center collapsed"
                                            data-bs-toggle="collapse" href="#status-collapse" role="button"
                                            aria-expanded="false" aria-controls="status-collapse">
                                            <i class="mdi mdi-filter-outline font-size-20 text-primary me-2"></i> الحالة
                                            <i class="mdi mdi-chevron-up accor-down-icon ms-auto"></i>
                                        </a>
                                        <div class="collapse" id="status-collapse">
                                            <div class="card border-0 shadow-none ps-2 mb-0">
                                                <ul class="list-unstyled mb-0">
                                                    <li><a href="#" class="d-flex align-items-center"><i
                                                                class="mdi mdi-check-circle text-success me-2"></i><span
                                                                class="me-auto">مكتمل</span></a></li>
                                                    <li><a href="#" class="d-flex align-items-center"><i
                                                                class="mdi mdi-timer-sand text-danger me-2"></i><span
                                                                class="me-auto">مؤجل</span></a></li>
                                                    <li><a href="#" class="d-flex align-items-center"><i
                                                                class="mdi mdi-progress-clock text-warning me-2"></i><span
                                                                class="me-auto">قيد
                                                                التنفيذ</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <!-- فرز حسب النوع -->
                                <li>
                                    <div class="custom-accordion">
                                        <a class="text-body fw-medium py-1 d-flex align-items-center collapsed"
                                            data-bs-toggle="collapse" href="#category-collapse" role="button"
                                            aria-expanded="false" aria-controls="category-collapse">
                                            <i class="mdi mdi-tag-outline font-size-20 text-primary me-2"></i> النوع
                                            <i class="mdi mdi-chevron-up accor-down-icon ms-auto"></i>
                                        </a>
                                        <div class="collapse" id="category-collapse">
                                            <div class="card border-0 shadow-none ps-2 mb-0">
                                                <ul class="list-unstyled mb-0">
                                                    <li><a href="#" class="d-flex align-items-center"><i
                                                                class="mdi mdi-school text-primary me-2"></i><span
                                                                class="me-auto">تعليمي</span></a></li>
                                                    <li><a href="#" class="d-flex align-items-center"><i
                                                                class="mdi mdi-hospital text-success me-2"></i><span
                                                                class="me-auto">صحي</span></a></li>
                                                    <li><a href="#" class="d-flex align-items-center"><i
                                                                class="mdi mdi-charity text-warning me-2"></i><span
                                                                class="me-auto">إغاثة</span></a></li>
                                                    <li><a href="#" class="d-flex align-items-center"><i
                                                                class="mdi mdi-home-modern text-info me-2"></i><span
                                                                class="me-auto">بنى
                                                                تحتية</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <!-- فرز حسب التاريخ -->
                                <li>
                                    <div class="custom-accordion">
                                        <a class="text-body fw-medium py-1 d-flex align-items-center collapsed"
                                            data-bs-toggle="collapse" href="#date-collapse" role="button"
                                            aria-expanded="false" aria-controls="date-collapse">
                                            <i class="mdi mdi-calendar-range font-size-20 text-primary me-2"></i>
                                            التاريخ
                                            <i class="mdi mdi-chevron-up accor-down-icon ms-auto"></i>
                                        </a>
                                        <div class="collapse" id="date-collapse">
                                            <div class="card border-0 shadow-none ps-2 mb-0">
                                                <ul class="list-unstyled mb-0">
                                                    <li><a href="#" class="d-flex align-items-center"><i
                                                                class="mdi mdi-calendar-plus text-secondary me-2"></i><span
                                                                class="me-auto">تاريخ الإنشاء</span></a></li>
                                                    <li><a href="#" class="d-flex align-items-center"><i
                                                                class="mdi mdi-calendar-check text-success me-2"></i><span
                                                                class="me-auto">تاريخ
                                                                الانتهاء</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <h5 class="font-size-16 mt-4 mb-0">إحصاءيات بسيطة للمشاريع</h5>

                        <div class="border text-center rounded p-3 mt-4">
                            <div class="">
                                <img src="{{ URL::asset('build/images/upgrade-img.png') }}" class="img-fluid"
                                    style="width: 108px;" alt="">
                            </div>
                            <h5 class="mt-4">عدد المشاريع المسجلة : {{ $projectsCount }}</h5>
                            <p class="pt-1">مشاريع مكتملة: {{ $completedCount }}</p>
                            <p class="pt-1">مشاريع قيد التنفيذ: {{ $inProgressCount }}</p>
                            <div class="text-center pt-2">
                                <a href="{{route('projects')}}" class="btn btn-primary w-100" style="direction: rtl"> <i
                                        class="mdi mdi-arrow-left ms-1"></i> معاينة المشاريع في الموقع </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-9">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <div class="form-inline float-md-start mb-3">
                                <div class="search-box me-2">
                                    <div class="position-relative">
                                        <input type="text" class="form-control border" placeholder="Search...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="table-responsive mb-2">
                        <table class="table table-hover table-nowrap align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col" style="width: 50px;">
                                        <div class="form-check font-size-16">
                                            <input type="checkbox" class="form-check-input" id="projectCheckAll">
                                            <label class="form-check-label" for="projectCheckAll"></label>
                                        </div>
                                    </th>
                                    <th scope="col">اسم المشروع</th>
                                    <th scope="col">الحالة</th>
                                    <th scope="col">تاريخ البدء</th>
                                    <th scope="col">تاريخ الانتهاء</th>
                                    <th scope="col" style="width: 200px;">الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                <tr>
                                    <th scope="row">
                                        <div class="form-check font-size-16">
                                            <input type="checkbox" class="form-check-input"
                                                id="projectCheck{{ $project->id }}">
                                            <label class="form-check-label"
                                                for="projectCheck{{ $project->id }}"></label>
                                        </div>
                                    </th>
                                    <td>
                                        <img src="{{ asset('storage/' . $project->image_url) }}" alt=""
                                            class="avatar-xs rounded-circle me-2">
                                        <a href="{{ route('admin.projects.show', $project->id) }}" class="text-body">
                                            {{ $project->name }}
                                        </a>
                                    </td>
                                    <td>{{ $project->status }}</td>
                                    <td>{{ $project->created_at }}</td>
                                    <td>{{ $project->end_date ? $project->end_date->format('Y-m-d') : '-' }}</td>
                                    <td>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item">
                                                <a href="{{ route('admin.projects.edit', $project->id) }}"
                                                    class="px-2 text-primary">
                                                    <i class="ri-pencil-line font-size-18"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <form action="{{ route('admin.projects.destroy', $project->id) }}"
                                                    method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn text-danger p-0"
                                                        onclick="return confirm('هل أنت متأكد من حذف هذا المشروع؟')">
                                                        <i class="ri-delete-bin-line font-size-18"></i>
                                                    </button>
                                                </form>
                                            </li>
                                            <li class="list-inline-item dropdown">
                                                <a class="dropdown-toggle font-size-18 px-2" href="#" role="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true">
                                                    <i class="ri-more-2-fill"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.projects.show', $project->id) }}">عرض
                                                        المشروع</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.projects.edit', $project->id) }}">تعديل
                                                        المشروع</a>
                                                    <a class="dropdown-item text-danger" href="#"
                                                        onclick="event.preventDefault(); this.closest('form').submit();">حذف
                                                        المشروع</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <div>
                                <p class="mb-sm-0">
                                    Showing {{ $projects->firstItem() }} to {{ $projects->lastItem() }} of {{
                                    $projects->total() }} entries
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="float-sm-end">
                                <ul class="pagination mb-sm-0">
                                    <li class="page-item {{ $projects->onFirstPage() ? 'disabled' : '' }}">
                                        <a href="{{ $projects->previousPageUrl() }}" class="page-link"><i
                                                class="mdi mdi-chevron-right"></i></a>
                                    </li>
                                    @foreach ($projects->getUrlRange(1, $projects->lastPage()) as $page => $url)
                                    <li class="page-item {{ $projects->currentPage() == $page ? 'active' : '' }}">
                                        <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                                    </li>
                                    @endforeach
                                    <li class="page-item {{ $projects->hasMorePages() ? '' : 'disabled' }}">
                                        <a href="{{ $projects->nextPageUrl() }}" class="page-link"><i
                                                class="mdi mdi-chevron-left"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- Modal -->
<div class="modal fade" id="addProjectModal" tabindex="-1" aria-labelledby="addProjectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProjectModalLabel">إضافة مشروع جديد</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
            </div>
            <!-- end modal-header -->

            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <!-- Project Name -->
                        <div class="col-md-6">
                            <label for="project-name" class="form-label">اسم المشروع</label>
                            <input type="text" class="form-control" id="project-name" name="name"
                                placeholder="أدخل اسم المشروع" required>
                        </div>

                        <!-- Project Category -->
                        <div class="col-md-6">
                            <label for="project-category" class="form-label">التصنيف</label>
                            <input type="text" class="form-control" id="project-category" name="category"
                                placeholder="أدخل تصنيف المشروع" required>
                        </div>

                        <!-- Project Description -->
                        <div class="col-md-12">
                            <label for="project-description" class="form-label">الوصف</label>
                            <textarea class="form-control" id="project-description" name="description" rows="4"
                                placeholder="أدخل وصف المشروع" required></textarea>
                        </div>

                        <!-- Project Budget -->
                        <div class="col-md-6">
                            <label for="project-budget" class="form-label">الميزانية (اختياري)</label>
                            <input type="number" step="0.01" class="form-control" id="project-budget" name="budget"
                                placeholder="أدخل الميزانية" min="0" >
                        </div>

                        <!-- Project Location -->
                        <div class="col-md-6">
                            <label for="project-location" class="form-label">الموقع</label>
                            <input type="text" class="form-control" id="project-location" name="location"
                                placeholder="أدخل الموقع">
                        </div>

                        <!-- End Date -->
                        <div class="col-md-6">
                            <label for="project-end-date" class="form-label">تاريخ الانتهاء (اختياري)</label>
                            <input type="date" class="form-control" id="project-end-date" name="end_date">
                        </div>

                        <!-- Featured Project -->
                        <div class="col-md-6">
                            <label for="project-featured" class="form-label">هل المشروع مميز؟</label>
                            <select class="form-select" id="project-featured" name="is_featured">
                                <option value="0">لا</option>
                                <option value="1">نعم</option>
                            </select>
                        </div>
                        <!-- Upload Images -->
                        <div class="col-md-12">
                            <label for="project-images" class="form-label">صورة المشروع الرئيسة</label>
                            <input type="file" class="form-control" id="project-main-image" name="main-image" required>
                        </div>
                        <!-- Upload Images -->
                        <div class="col-md-12">
                            <label for="project-images" class="form-label">صور اخرى (اختياري)</label>
                            <input type="file" class="form-control" id="project-images" name="images[]" multiple>
                        </div>
                    </div>
                </div>
                <!-- end modal-body -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-light w-sm" data-bs-dismiss="modal">إغلاق</button>
                    <button type="submit" class="btn btn-primary w-sm">إضافة</button>
                </div>
                <!-- end modal-footer -->
            </form>
        </div>
    </div>
</div>
    <!-- end modal -->
    @endsection
    @section('scripts')
<script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection