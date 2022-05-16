<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
       <a href="javascript:void(0);" class="app-brand-link ">
       <span class="app-brand-logo demo">
       <img src="{{ asset('admin-assets/img/favicon/favicon.ico') }}" alt="لوگو" width="24px" height="24px">
       </span>
       <small class="app-brand-text text-muted text-center">  مدیریت  کاربران  </small><span class="app-brand-text demo menu-text fw-bold ms-2"> FAVA </span>
       </a>
       <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
       <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
       <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
       </a>
    </div>
    <div class="menu-divider mt-0"></div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1"> 
       <!-- Dashboards -->
       <li class="menu-item {{ request()->is('admin') ? 'active' : '' }} mb-2">
          <a href="{{ route('admin.dashboard') }}" class="menu-link">
             <i class="menu-icon tf-icons bx bx-home-circle"></i>
             <div data-i18n="Dashboards">داشبورد</div>
          </a>
       </li>  
       <!-- Users -->
       <li class="menu-item {{ request()->is('admin/user*') ? 'active' : '' }}">
        <a href="{{ route('admin.user.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div data-i18n="Dashboards">کاربران</div>
        </a>
      </li> 
      <!-- Organization -->
      <li class="menu-item {{ request()->is('admin/organization*') ? 'active' : '' }}">
        <a href="{{ route('admin.organization.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-building"></i>
            <div data-i18n="Dashboards">سازمان ها</div>
        </a>
      </li> 
       <!-- Roles and Permissions -->
       <li class="menu-item {{ request()->is('admin/role*') || request()->is('admin/permission*') ? 'open' : '' }}">
         <a href="javascript:void(0);" class="menu-link menu-toggle">
           <i class="menu-icon tf-icons bx bx-check-shield"></i>
           <div data-i18n="Roles &amp; Permissions">نقش‌ها و مجوزها</div>
         </a>
         <ul class="menu-sub">
            <!-- Roles -->
           <li class="menu-item {{ request()->is('admin/role*') ? 'active' : '' }}">
             <a href="{{ route('admin.role.index') }}" class="menu-link">
               <div data-i18n="Roles">نقش‌ها</div>
             </a>
           </li>
            <!-- Permissions -->
           <li class="menu-item {{ request()->is('admin/permission*') ? 'active' : '' }}">
             <a href="{{ route('admin.permission.index') }}" class="menu-link">
               <div data-i18n="Permission">مجوزها</div>
             </a>
           </li>
         </ul>
       </li>
    </ul>
</aside>