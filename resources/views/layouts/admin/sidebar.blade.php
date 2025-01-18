<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{ route('admin.dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{asset('build/images/logo-sm-dark.png')}}" alt="شعار الجمعية" height="30">
            </span>
            <span class="logo-lg">
                <img src="{{asset('build/images/logo-dark.png')}}" alt="شعار الجمعية" height="30">
            </span>
        </a>

        <a href="{{ route('admin.dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{asset('build/images/logo-sm-light.png')}}" alt="شعار الجمعية" height="30">
            </span>
            <span class="logo-lg">
                <img src="{{asset('build/images/logo-light.png')}}" alt="شعار الجمعية" height="30">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn"
        id="vertical-menu-btn">
        <i class="ri-menu-2-line align-middle"></i>
    </button>

    <div data-simplebar class="vertical-scroll">

        <!-- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">القائمة الرئيسية</li>

                <li>
                    <a href="{{route('admin.dashboard')}}" class="waves-effect">
                        <i class="uim uim-airplay"></i>
                        <span>لوحة التحكم</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.settings') }}" class="waves-effect">
                        <i class="uim uim-upload-alt"></i>
                        <span>الإعدادات العامة</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.branch.index') }}" class="waves-effect">
                        <i class="uim uim-bag"></i>
                        <span>إدارة الفروع</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.projects.index')}}" class="waves-effect">
                        <i class="uim uim-circle-layer"></i>
                        <span>إدارة المشاريع</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.president.edit')}}" class="waves-effect">
                        <i class="uim uim-apps"></i>
                        <span>إدارة الجمعية</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.posts.index')}}" class="waves-effect">
                        <i class="uim uim-web-grid"></i>
                        <span>إدارة المحتوى</span>
                    </a>
                </li>
                <li>
                    <a href="users" class="waves-effect">
                        <i class="uim uim-entry"></i>
                        <span>إدارة المستخدمين</span>
                    </a>
                </li>
                <li>
                    <a href="donations" class="waves-effect">
                        <i class="uim uim-box"></i>
                        <span>إدارة التبرعات</span>
                    </a>
                </li>

                <li>
                    <a href="volunteers" class="waves-effect">
                        <i class="uim uim-arrow-circle-left"></i>
                        <span>المتطوعون</span>
                    </a>
                </li>

                

                

                <li>
                    <a href="reports" class="waves-effect">
                        <i class="uim uim uim-chart-pie"></i>
                        <span>التقارير والإحصائيات</span>
                    </a>
                </li>
                <li>
                    <a href="support" class="waves-effect">
                        <i class="uim uim-comment-alt-dots"></i>
                        <span>الدعم الفني</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="dropdown px-3 sidebar-user sidebar-user-info">
        <button type="button" class="btn w-100 px-0 border-0" id="page-header-user-dropdown" data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <span class="d-flex align-items-center">
                <div class="flex-shrink-0">
                    <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('build/images/users/avatar-2.jpg') }}"
                        class="img-fluid header-profile-user rounded-circle" alt="المستخدم">
                </div>

                <div class="flex-grow-1 ms-2 text-start">
                    <span class="ms-1 fw-medium user-name-text">{{Auth::user()->name}}</span>
                </div>

                <div class="flex-shrink-0 text-end">
                    <i class="mdi mdi-dots-vertical font-size-16"></i>
                </div>
            </span>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
            <button type="button" class="dropdown-item" id="choose-file-button"><i
                    class="mdi mdi-account-circle text-muted font-size-16 align-middle me-1"></i> <span
                    class="align-middle">تغيير الصورة الشخصية</span></button>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="settings"><i
                    class="mdi mdi-cog-outline text-muted font-size-16 align-middle me-1"></i> <span
                    class="align-middle">الإعدادات</span></a>
            <a class="dropdown-item" href="logout"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                    class="mdi mdi-lock text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">تسجيل
                    الخروج</span></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</div>

<form action="{{ route('admin.profile.update') }}" method="POST" id="profile-image-form" enctype="multipart/form-data">
    @csrf
    <input id="file-upload" name="file" type="file" accept="image/*" style="display: none;" required>
    <input type="hidden" id="cropped-image" name="cropped_image">

    <!-- Modal for cropping the image -->
    <div id="cropperModal" class="modal fade" tabindex="-1" aria-labelledby="cropperModalLabel" aria-hidden="true"
        data-bs-scroll="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cropperModalLabel">Crop Your Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <img id="image-preview" style="max-width: 100%;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="crop-and-submit">Crop & Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>