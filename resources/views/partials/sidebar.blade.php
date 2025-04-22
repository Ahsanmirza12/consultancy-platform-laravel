@section('sidebar')
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/dashboard') }}">
      <div class="sidebar-brand-text mx-3">Consultancy</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('/dashboard') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
      </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
      Interface
  </div>

  <!-- Packages -->
  <li class="nav-item {{ request()->is('packages*') || request()->is('admin/packages/create') || request()->is('package-view') || request()->is('add-subscription') ? 'active' : '' }}">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePackages"
          aria-expanded="true" aria-controls="collapsePackages">
          <i class="fas fa-fw fa-box"></i>
          <span>Packages</span>
      </a>
      <div id="collapsePackages" class="collapse {{ request()->is('packages*') || request()->is('admin/packages/create') || request()->is('package-view') || request()->is('add-subscription') ? 'show' : '' }}" aria-labelledby="headingPackages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item {{ request()->is('packages') ? 'active' : '' }}" href="{{ url('/packages') }}">Packages</a>
              <a class="collapse-item {{ request()->is('admin/packages/create') ? 'active' : '' }}" href="{{ url('/admin/packages/create') }}">Add Package</a>
              <a class="collapse-item {{ request()->is('package-view') ? 'active' : '' }}" href="{{ url('/package-view') }}">Subscriptions</a>
              <a class="collapse-item {{ request()->is('add-subscription') ? 'active' : '' }}" href="{{ url('/add-subscription') }}">Add Subscription</a>
          </div>
      </div>
  </li>

  <!-- Users -->
  <li class="nav-item {{ request()->is('users*') || request()->is('add-user') ? 'active' : '' }}">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
          aria-expanded="true" aria-controls="collapseUsers">
          <i class="fas fa-fw fa-user"></i>
          <span>User</span>
      </a>
      <div id="collapseUsers" class="collapse {{ request()->is('users*') || request()->is('add-user') ? 'show' : '' }}" aria-labelledby="headingUsers" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item {{ request()->is('users') ? 'active' : '' }}" href="{{ url('/users') }}">Users</a>
              <a class="collapse-item {{ request()->is('add-user') ? 'active' : '' }}" href="{{ url('/users/create') }}">Add User</a>
          </div>
      </div>
  </li>

</ul>

<script>
  // Run after DOM loads
  document.addEventListener('DOMContentLoaded', function () {
      const navItems = document.querySelectorAll('.nav-item');

      navItems.forEach(item => {
          item.addEventListener('click', function () {
              // Remove active class from all nav items
              navItems.forEach(i => i.classList.remove('active'));

              // Add active class to clicked nav item
              this.classList.add('active');
          });
      });
  });
</script>

@endsection