<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-success elevation-4">

  <!-- Brand Logo -->
  <a href="{{ url('/admin') }}" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">JVD Travel Admin</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- User panel -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name ?? 'Admin' }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

        <!-- Dashboard -->
        <li class="nav-item">
          <a href="{{ url('/admin') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <!-- Tour Management -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-map-marked-alt"></i>
            <p>
              Tour Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('/admin/tours') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Tours</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/admin/itineraries') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Customer Itineraries</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/admin/ai-itinerary') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>AI Itinerary Adjustment</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Booking Management -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-calendar-check"></i>
            <p>
              Booking Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('/admin/bookings') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tour Bookings</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/admin/transportation') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Transportation</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/admin/hotels') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Hotel Reservations</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Reports -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-bar"></i>
            <p>
              Reports
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('/admin/reports/sales') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Sales Report</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/admin/reports/bookings') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Booking Summary</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Settings -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
              Settings
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('/admin/settings/system') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>System Settings</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/admin/settings/notifications') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Notification Settings</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- User Management -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users-cog"></i>
            <p>
              User Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('/admin/users') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Admin Users</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/admin/roles') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Roles & Permissions</p>
              </a>
            </li>
          </ul>
        </li>

      </ul>
    </nav>
  </div>
</aside>
