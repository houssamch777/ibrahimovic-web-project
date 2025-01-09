@extends('layouts.admin.master')
@section('title')
لوحة التحكم
@endsection
@section('page-title')
لوحة التحكم
@endsection
@section('body')

<body data-sidebar="colored">
    @endsection
    @section('content')


    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar-md flex-shrink-0">
                            <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                <i class="uim uim-history"></i>
                            </span>
                        </div>
                        <div class="flex-grow-1 overflow-hidden ms-4">
                            <p class="text-muted text-truncate font-size-15 mb-2"> عدد زوار الموقع</p>
                            <h3 class="fs-4 flex-grow-1 mb-3">{{ $visitorsCount }} <span
                                    class="text-muted font-size-16">زائر</span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar-md flex-shrink-0">
                            <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                <i class="uim uim-comment-alt-dots"></i>
                            </span>
                        </div>
                        <div class="flex-grow-1 overflow-hidden ms-4">
                            <p class="text-muted text-truncate font-size-15 mb-2">عدد الرسائل المستلمة</p>
                            <h3 class="fs-4 flex-grow-1 mb-3">46 <span class="text-muted font-size-16"> رسالة</span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar-md flex-shrink-0">
                            <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                <i class="uim uim-scenery"></i>
                            </span>
                        </div>
                        <div class="flex-grow-1 overflow-hidden ms-4">
                            <p class="text-muted text-truncate font-size-15 mb-2"> عدد المتطوعين</p>
                            <h3 class="fs-4 flex-grow-1 mb-3">1000 <span class="text-muted font-size-16"> متطوع </span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar-md flex-shrink-0">
                            <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                <i class="uim uim-briefcase"></i>
                            </span>
                        </div>
                        <div class="flex-grow-1 overflow-hidden ms-4">
                            <p class="text-muted text-truncate font-size-15 mb-2"> عدد فروع الجمعية</p>
                            <h3 class="fs-4 flex-grow-1 mb-3">160<span class="text-muted font-size-16"> فرع </span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-7">
            <div class="row">
                <div class="col-xl-6">
                    <div class="card" style="min-height: 420px;">
                        <div class="card-header border-0 align-items-center d-flex pb-0">
                            <h4 class="card-title mb-0 flex-grow-1">زيارة صفحات التواصل </h4>
                        </div>
                        <div class="card-body">

                            <div class="text-center">
                                <p class="mb-1">إجمالي الزوار</p>
                                <h3 class="mb-0">5,685</h3>
                            </div>
                            <p class="text-muted text-center w-75 mx-auto mt-4 mb-0">احصاءات زيارة رواد الموقع لصفحاتنا
                                في مواقع التوصل الإجتماعي.</p>
                            <div class="row gx-4 mt-1">
                                <div class="col-md-4">
                                    <div class="mt-4">
                                        <div class="progress" style="height: 7px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 85%"
                                                aria-valuenow="85" aria-valuemin="0" aria-valuemax="85">
                                            </div>
                                        </div>
                                        <p class="text-muted mt-2 pt-2 mb-0 text-uppercase font-size-13 text-truncate">
                                            الفيسبوك
                                        </p>
                                        <h4 class="mt-1 mb-0 font-size-20">100</h4>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mt-4">
                                        <div class="progress" style="height: 7px;">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 70%"
                                                aria-valuenow="70" aria-valuemin="0" aria-valuemax="70">
                                            </div>
                                        </div>
                                        <p class="text-muted mt-2 pt-2 mb-0 text-uppercase font-size-13 text-truncate">
                                            تلقرام
                                        </p>
                                        <h4 class="mt-1 mb-0 font-size-20">48,625</h4>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mt-4">
                                        <div class="progress" style="height: 7px;">
                                            <div class="progress-bar bg-black" role="progressbar" style="width: 60%"
                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="60">
                                            </div>
                                        </div>
                                        <p class="text-muted mt-2 pt-2 mb-0 text-uppercase font-size-13 text-truncate">
                                            تيكتوك
                                        </p>
                                        <h4 class="mt-1 mb-0 font-size-20">85,745</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row gx-4 mt-1">
                                <div class="col-md-4">
                                    <div class="mt-4">
                                        <div class="progress" style="height: 7px;">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 85%"
                                                aria-valuenow="85" aria-valuemin="0" aria-valuemax="85">
                                            </div>
                                        </div>
                                        <p class="text-muted mt-2 pt-2 mb-0 text-uppercase font-size-13 text-truncate">
                                            اليوتيوب
                                        </p>
                                        <h4 class="mt-1 mb-0 font-size-20">52,524</h4>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mt-4">
                                        <div class="progress" style="height: 7px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 70%"
                                                aria-valuenow="70" aria-valuemin="0" aria-valuemax="70">
                                            </div>
                                        </div>
                                        <p class="text-muted mt-2 pt-2 mb-0 text-uppercase font-size-13 text-truncate">
                                            تويتر
                                        </p>
                                        <h4 class="mt-1 mb-0 font-size-20">48,625</h4>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mt-4">
                                        <div class="progress" style="height: 7px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 60%"
                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="60">
                                            </div>
                                        </div>
                                        <p class="text-muted mt-2 pt-2 mb-0 text-uppercase font-size-13 text-truncate">
                                            انستقرام
                                        </p>
                                        <h4 class="mt-1 mb-0 font-size-20">85,745</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card" style="min-height: 420px;">
                        <div class="card-header border-0 align-items-center d-flex pb-0">
                            <h4 class="card-title mb-0 flex-grow-1">فارغ</h4>
                        </div>
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-5">
            <div class="card" style="min-height: 420px;">
                <div class="card-header border-0 align-items-center d-flex pb-0">
                    <h4 class="card-title mb-0 flex-grow-1">اخر المنشورات</h4>
                    <div>
                        <div class="dropdown">
                            <a class="dropdown-toggle text-reset" href="#" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="fw-semibold">الترتيب حسب:</span>
                                <span class="text-muted">التاريخ<i class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">التاريخ</a>
                                <a class="dropdown-item" href="#">التفاعل</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <div class="table-responsive" data-simplebar style="max-height: 350px;min-height: 350px;">
                        <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                            <tbody>
                                <tr>
                                    <td>جمعية البركة تنفذ مشروع 1000 وجبة في قاطع غزة</td>
                                    <td>1000 <i class="mdi mdi-cards-heart ms-1"></i></td>
                                    <td>
                                        <div class="d-flex gap-3">
                                            <a href="javascript:void(0);" class="btn btn-success btn-sm"><i
                                                    class="mdi mdi-pencil"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-danger btn-sm"><i
                                                    class="mdi mdi-delete"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <h6 class="text-muted text-center mt-4">لاتوجد منشورات اخرى</h6>
                    </div> <!-- enbd table-responsive-->
                </div>
            </div>
        </div>

    </div>
    <!-- END ROW -->
    <!-- END ROW -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header border-0 align-items-center d-flex pb-0">
                    <h4 class="card-title mb-0 flex-grow-1">اخر الرسائل</h4>
                    <div>
                        <div class="dropdown">
                            <a class="dropdown-toggle text-reset" href="#" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="fw-semibold">الترتيب حسب:</span>
                                <span class="text-muted">التاريخ<i class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">التاريخ</a>
                                <a class="dropdown-item" href="#">العنوان</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th>البريد الاكتروني</th>
                                    <th>رقم الهاتف</th>
                                    <th>تاريخ</th>
                                    <th>العنوان</th>
                                    <th>محتوى الرسالة</th>
                                    <th>حالة الرسالة</th>
                                    <th>العملية</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>mail@gmail.com</td>
                                    <td>
                                        <p class="mb-0">0673087447</p>
                                    </td>
                                    <td>
                                        07 Oct, 2022
                                    </td>
                                    <td>
                                        الوطاية,بسكرة
                                    </td>
                                    <td>
                                        هل يوجد مكتب في ولاية بسكرة
                                    </td>
                                    <td>
                                        <span class="badge rounded badge-soft-success font-size-12">تم الرد عليها</span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-3">
                                            <a href="javascript:void(0);" class="btn btn-success btn-sm"><i
                                                    class="mdi mdi-pencil"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-danger btn-sm"><i
                                                    class="mdi mdi-delete"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                </div>
            </div>
        </div>
    </div>
    <!-- END ROW -->

    @endsection
    @section('scripts')
    <!-- apexcharts -->
    <script src="build/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Vector map-->
    <script src="build/libs/jsvectormap/jsvectormap.min.js"></script>
    <script src="build/libs/jsvectormap/maps/world-merc.js"></script>

    <script src="build/js/pages/dashboard.init.js"></script>
    <!-- App js -->
    <script src="build/js/app.js"></script>
    @endsection