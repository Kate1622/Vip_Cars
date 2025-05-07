<aside class="main-sidebar sidebar-primary elevation-9">
  <!-- Brand Logo -->
  <a href="/home" class="brand-link navbar-light">
      
      <span class="brand-text font-weight-light">
          <img src="{{ asset('images/login/logo.jpg') }}" alt="AdminLTE Logo" style="height:30px"> </span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
      <!-- Sidebar user panel (optional)
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div> -->

      <!-- SidebarSearch Form
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>-->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-header">LABELS</li>
              <li class="nav-item">
                <a href="{{route('cliente.index')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p class="text">Cliente</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('vehiculo.index')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-warning"></i>
                  <p>Vehiculo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-circle text-info"></i>
                  <p>Informational</p>
                </a>
              </li>
            </ul>
      </nav>
      <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
