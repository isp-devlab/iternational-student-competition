<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
  <div class="app-sidebar-header d-none d-lg-flex px-6 pt-8 pb-4" id="kt_app_sidebar_header">
    <div class="btn btn-outline btn-custom btn-flex w-100">
      <span class="d-flex flex-center flex-shrink-0 w-40px me-3">
        <img alt="Logo" src="{{ asset('assets/media/logos/dishub.png') }}" data-kt-element="logo" class="h-30px" />
      </span>
      <span class="d-flex flex-column align-items-start flex-grow-1">
        <span class="fs-5 fw-bold text-white text-uppercase" data-kt-element="title">E-Report</span>
        <span class="fs-7 fw-bold text-gray-700 lh-sm" data-kt-element="desc">DISHUB Simalungun</span>
      </span>
    </div>
  </div>
  <div class="app-sidebar-navs flex-column-fluid py-6" id="kt_app_sidebar_navs">
    <div id="kt_app_sidebar_navs_wrappers" class="hover-scroll-y my-2" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_header, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_navs" data-kt-scroll-offset="5px">
      <div id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false" class="menu menu-column menu-rounded menu-sub-indention menu-active-bg">
        <div class="menu-item">
          <a href="apps/projects/activity.html" class="menu-link">
            <span class="menu-icon">
              <i class="ki-duotone ki-home"></i>
            </span>
            <span class="menu-title">Dashboard</span>
          </a>
        </div>
        <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
          <span class="menu-link">
            <span class="menu-icon">
              <i class="ki-duotone ki-external-drive fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
                <span class="path4"></span>
                <span class="path5"></span>
              </i>
            </span>
            <span class="menu-title">Data Master</span>
            <span class="menu-arrow"></span>
          </span>
          <div class="menu-sub menu-sub-accordion">
            <div class="menu-item">
              <a class="menu-link active" href="index.html">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Kecamatan</span>
              </a>
            </div>
            <div class="menu-item">
              <a class="menu-link" href="dashboards/ecommerce.html">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Kelurahan</span>
              </a>
            </div>
            <div class="menu-item">
              <a class="menu-link" href="dashboards/ecommerce.html">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Jenis Lampu</span>
              </a>
            </div>
            <div class="menu-item">
              <a class="menu-link" href="dashboards/ecommerce.html">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Daya</span>
              </a>
            </div>
          </div>
        </div>
        <div class="menu-item">
          <a href="apps/projects/activity.html" class="menu-link">
            <span class="menu-icon">
              <i class="ki-duotone ki-flag fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
              </i>
            </span>
            <span class="menu-title">Objek</span>
          </a>
        </div>
        <div class="menu-item">
          <a href="apps/projects/activity.html" class="menu-link">
            <span class="menu-icon">
              <i class="ki-duotone ki-wrench fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
              </i>
            </span>
            <span class="menu-title">Kerusakan</span>
          </a>
        </div>
        <div class="menu-item">
          <a href="apps/projects/activity.html" class="menu-link">
            <span class="menu-icon">
              <i class="ki-duotone ki-screen fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
                <span class="path4"></span>
              </i>
            </span>
            <span class="menu-title">Monitoring</span>
          </a>
        </div>
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion @if($title == 'Pengguna') here show @endif">
          <span class="menu-link">
            <span class="menu-icon">
              <i class="ki-duotone ki-profile-circle fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
              </i>
            </span>
            <span class="menu-title">Pengguna</span>
            <span class="menu-arrow"></span>
          </span>
          <div class="menu-sub menu-sub-accordion">
            <div class="menu-item">
              <a class="menu-link @if($subTitle == 'Pending') active @endif" href="{{ route('user.pending') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Pending</span>
              </a>
            </div>
            <div class="menu-item">
              <a class="menu-link @if($subTitle == 'Aktif') active @endif" href="{{ route('user.active') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Aktif</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="app-sidebar-footer d-flex flex-stack px-11 pb-10" id="kt_app_sidebar_footer">
    <div class="">
      <div class="cursor-pointer symbol symbol-circle symbol-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-overflow="true" data-kt-menu-placement="top-start">
        <img src="https://ui-avatars.com/api/?bold=true&name={{ Auth::user()->name }}" alt="image" />
      </div>
      <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
        <div class="menu-item px-3">
          <div class="menu-content d-flex align-items-center px-3">
            <div class="d-flex flex-column">
              <div class="fw-bold d-flex align-items-center fs-5">{{ Auth::user()->name }} 
              <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">{{ Auth::user()->role }}</span></div>
              <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</a>
            </div>
          </div>
        </div>
        <div class="separator my-2"></div>
        <div class="menu-item px-5">
          <a href="{{ route('profile') }}" class="menu-link px-5">My Profile</a>
        </div>
        <div class="menu-item px-5">
          <a href="{{ route('logout') }}" class="menu-link px-5">Logout</a>
        </div>
      </div>
    </div>
    <a href="{{ route('logout') }}" class="btn btn-sm btn-outline btn-flex btn-custom px-3">
    <i class="ki-outline ki-entrance-left fs-2 me-2"></i>Logout</a>
  </div>
</div>