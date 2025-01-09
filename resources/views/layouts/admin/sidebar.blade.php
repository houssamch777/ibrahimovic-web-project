<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{ route('admin') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="build/images/logo-sm-dark.png" alt="شعار الجمعية" height="30">
            </span>
            <span class="logo-lg">
                <img src="build/images/logo-dark.png" alt="شعار الجمعية" height="30">
            </span>
        </a>

        <a href="{{ route('admin') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="build/images/logo-sm-light.png" alt="شعار الجمعية" height="30">
            </span>
            <span class="logo-lg">
                <img src="build/images/logo-light.png" alt="شعار الجمعية" height="30">
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
                    <a href="{{route('admin')}}" class="waves-effect">
                        <i class="uim uim-airplay"></i>
                        <span>لوحة التحكم</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('settings') }}" class="waves-effect">
                        <i class="uim uim-bag"></i>
                        <span>الإعدادات العامة</span>
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
                    <a href="users" class="waves-effect">
                        <i class="uim uim-entry"></i>
                        <span>إدارة المستخدمين</span>
                    </a>
                </li>

                <li>
                    <a href="content-management" class="waves-effect">
                        <i class="uim uim-web-grid"></i>
                        <span>إدارة المحتوى</span>
                    </a>
                </li>

                <li>
                    <a href="reports" class="waves-effect">
                        <i class="uim uim uim-chart-pie"></i>
                        <span>التقارير والإحصائيات</span>
                    </a>
                </li>

                <li>
                    <a href="projects" class="waves-effect">
                        <i class="uim uim-circle-layer"></i>
                        <span>إدارة المشاريع</span>
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
                    <img src="build/images/users/avatar-2.jpg" class="img-fluid header-profile-user rounded-circle"
                        alt="المستخدم">
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
            <a class="dropdown-item" href="profile"><i
                    class="mdi mdi-account-circle text-muted font-size-16 align-middle me-1"></i> <span
                    class="align-middle">تغيير الصورة الشخصية</span></a>
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
<!-- Left Sidebar End -->