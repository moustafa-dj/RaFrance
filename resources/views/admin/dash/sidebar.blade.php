<aside class="main-sidebar sidebar-dark-primary elevation-4">
 <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">{{ Auth::guard('admin')->user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('admin.admin.main')}}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Dashboared
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.domain.index')}}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Domains
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.service.index')}}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Services
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.estimate.index')}}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Devis
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.SiteSetting.index')}}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Pramétres De Site
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.type.index')}}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Types d'accessoires
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.accessory.index')}}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Accessoires
              </p>
            </a>
          </li>  
          <li class="nav-item">
            <a href="{{route('admin.profile.index')}}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          <li class="nav-item mt-4">
            <a href="{{route('admin.logout')}}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Déconnecter
              </p>
            </a>
          </li> 
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>