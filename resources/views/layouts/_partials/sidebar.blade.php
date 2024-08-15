<div id="kt_app_sidebar" class="app-sidebar flex-column mt-lg-4 ps-2 pe-2 ps-lg-7 pe-lg-4" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
  <div class="app-sidebar-logo flex-shrink-0 d-none d-md-flex flex-center align-items-center" id="kt_app_sidebar_logo">
    <a href="index.html">
      <img alt="Logo" src="assets/media/logos/demo55.svg" class="h-25px d-none d-sm-inline app-sidebar-logo-default theme-light-show" />
      <img alt="Logo" src="assets/media/logos/demo55-dark.svg" class="h-25px theme-dark-show" />
    </a>
    <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
      <div class="btn btn-icon btn-active-color-primary w-30px h-30px" id="kt_aside_mobile_toggle">
        <i class="ki-outline ki-abstract-14 fs-1"></i>
      </div>
    </div>
  </div>
  <div class="app-sidebar-menu flex-column-fluid">
    <div id="kt_app_sidebar_menu_wrapper" class="hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px">
      <div class="menu menu-column menu-rounded menu-sub-indention fw-bold px-6" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
        <div class="menu-item @if($title == 'Dashboard') here show @endif">
          <a href="{{ route('dashboard') }}" class="menu-link">
            <span class="menu-icon">
              <i class="ki-outline ki-category fs-2"></i>
            </span>
            <span class="menu-title">Dashboard</span>
            <span class="menu-arrow"></span>
          </a>
        </div>
        <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
          <span class="menu-link">
            <span class="menu-icon">
              <i class="ki-outline ki-cup fs-2"></i>
            </span>
            <span class="menu-title">Competition</span>
            <span class="menu-arrow"></span>
          </span>
          <div class="menu-sub menu-sub-accordion">
            <div class="menu-item">
              <a class="menu-link" href="index.html">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Member</span>
              </a>
            </div>
            <div class="menu-item">
              <a class="menu-link" href="index.html">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Submission</span>
              </a>
            </div>
            <div class="menu-item">
              <a class="menu-link" href="index.html">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Qualification</span>
              </a>
            </div>
            <div class="menu-item">
              <a class="menu-link" href="dashboards/ecommerce.html">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Final</span>
              </a>
            </div>
          </div>
        </div>
        <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
          <span class="menu-link">
            <span class="menu-icon">
              <i class="ki-outline ki-scroll fs-2"></i>
            </span>
            <span class="menu-title">Assessment</span>
            <span class="menu-arrow"></span>
          </span>
          <div class="menu-sub menu-sub-accordion">
            <div class="menu-item">
              <a class="menu-link active" href="index.html">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Qualification</span>
              </a>
            </div>
            <div class="menu-item">
              <a class="menu-link" href="dashboards/ecommerce.html">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Final</span>
              </a>
            </div>
          </div>
        </div>
        <div class="menu-item">
          <a href="" class="menu-link">
            <span class="menu-icon">
              <i class="ki-outline ki-people fs-2"></i>
            </span>
            <span class="menu-title">Team</span>
            <span class="menu-arrow"></span>
          </a>
        </div>
        <div class="menu-item">
          <a href="" class="menu-link">
            <span class="menu-icon">
              <i class="ki-outline ki-message-text fs-2"></i>
            </span>
            <span class="menu-title">Announcement</span>
            <span class="menu-arrow"></span>
          </a>
        </div>
        <div class="menu-item">
          <a href="" class="menu-link">
            <span class="menu-icon">
              <i class="ki-outline ki-flag fs-2"></i>
            </span>
            <span class="menu-title">Leaderboard</span>
            <span class="menu-arrow"></span>
          </a>
        </div>
        <div class="menu-item @if($title == 'User') here show @endif">
          <a href="{{ route('user') }}" class="menu-link">
            <span class="menu-icon">
              <i class="ki-outline ki-user fs-2"></i>
            </span>
            <span class="menu-title">User</span>
            <span class="menu-arrow"></span>
          </a>
        </div>
        <div class="menu-item">
          <a href="" class="menu-link">
            <span class="menu-icon">
              <i class="ki-outline ki-gear fs-2">
              </i>
            </span>
            <span class="menu-title">Setting</span>
            <span class="menu-arrow"></span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="app-sidebar-footer d-flex align-items-center px-8 pb-10" id="kt_app_sidebar_footer">
    <div class="">
      <div class="d-flex align-items-center" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-overflow="true" data-kt-menu-placement="top-start">
        <div class="d-flex flex-center cursor-pointer symbol symbol-circle symbol-40px">
          <img src="
                @if(Auth::user()->role == 'team') 
                  @if(Auth::user()->team->logo) 
                    {{ Storage::url(Auth::user()->team->logo) }}
                  @else 
                    https://ui-avatars.com/api/?bold=true&name={{ Auth::user()->team->member[0]->name }}
                  @endif
                @else 
                  https://ui-avatars.com/api/?bold=true&name={{ Auth::user()->name }}
                @endif
          " alt="image" />
        </div>
        <div class="d-flex flex-column align-items-start justify-content-center ms-3">
          <span class="text-gray-500 fs-8 fw-semibold">Hello</span>
          <span class="text-gray-800 fs-7 fw-bold text-hover-primary">
            @if (Auth::user()->role == 'team')
              {{ Auth::user()->team->member[0]->name }}
            @else
              {{ Auth::user()->name}}
            @endif
          </span>
        </div>
      </div>
      <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
        <div class="menu-item px-3">
          <div class="menu-content d-flex align-items-center px-3">
            <div class="symbol symbol-50px me-5">
              <img alt="Logo" src="
                @if(Auth::user()->role == 'team') 
                  @if(Auth::user()->team->logo) 
                    {{ Storage::url(Auth::user()->team->logo) }}
                  @else 
                    https://ui-avatars.com/api/?bold=true&name={{ Auth::user()->team->member[0]->name }}
                  @endif
                @else 
                  https://ui-avatars.com/api/?bold=true&name={{ Auth::user()->name }}
                @endif
              " />
            </div>
            <div class="d-flex flex-column">
              <div class="fw-bold d-flex align-items-center fs-5">
                @if (Auth::user()->role == 'team')
                  {{ Auth::user()->team->member[0]->name }}
                @else
                  {{ Auth::user()->name}}
                @endif
              </div>
              <span class="fw-semibold text-muted text-hover-primary fs-7">
                @if (Auth::user()->role == 'team')
                  {{ Auth::user()->team->name}}
                @else
                  {{ Auth::user()->email}}
                @endif
              </span>
            </div>
          </div>
        </div>
        <div class="separator my-2"></div>
        <div class="menu-item px-5">
          <a href="account/overview.html" class="menu-link px-5">Change Password</a>
        </div>
        <div class="menu-item px-5">
          <a href="{{ route('logout') }}" class="menu-link px-5">Sign Out</a>
        </div>
      </div>
    </div>
  </div>
</div>