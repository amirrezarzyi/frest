<nav class="card layout-navbar navbar navbar-expand-xl align-items-center" id="layout-navbar">
   <div class="container-fluid">
      <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
         <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
         <i class="bx bx-menu bx-sm"></i>
         </a>
      </div>
      <ul class="navbar-nav flex-row align-items-center ms-auto">
         <!-- Style Switcher -->
         <li class="nav-item me-2 me-xl-0">
            <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
            <i class="bx bx-sm"></i>
            </a>
         </li>
         <!--/ Style Switcher --> 
      </ul>
      <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
         <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- User --> 
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
               <div class="text-end">
                  <span class="fw-semibold d-block">{{Auth()->user()->full_name}}</span>
                  <small>
                  @foreach (Auth()->user()->roles as $role)
                  * {{$role->name}} 
                  @endforeach 
                  </small>
               </div>
            </li>
            <li class="nav-item navbar-dropdown dropdown-user dropdown" >
               <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                     <img src="{{ asset(Auth()->user()->avatar == null ? 'https://www.psi.org.kh/wp-content/uploads/2019/01/profile-icon-300x300.png' : Auth()->user()->avatar) }}" alt class="rounded-circle">
                  </div>
               </a>
               <ul class="dropdown-menu dropdown-menu-end">
                  <li >
                     <a class="dropdown-item {{ request()->is('admin/profile') ? 'active' : '' }}" href="{{ route('admin.profile') }}">
                     <i class="bx bx-user me-2"></i>
                     <span class="align-middle">پروفایل من</span>
                     </a>
                  </li>
                  <li>
                     <a class="dropdown-item" href="pages-account-settings-account.html">
                     <i class="bx bx-cog me-2"></i>
                     <span class="align-middle">تنظیمات</span>
                     </a>
                  </li>
                  <li>
                     <div class="dropdown-divider"></div>
                  </li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                  </form>
                  <a class="dropdown-item text-danger" href="{{ route('logout') }}" target="_blank" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                  <i class="bx bx-power-off me-2"></i>
                  <span class="align-middle">خروج</span>
                  </a>
                  </li>
               </ul>
            </li>
            <!--/ User -->
         </ul>
      </div>
   </div>
</nav>