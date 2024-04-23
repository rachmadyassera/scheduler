<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ url('/dashboard') }}">Siap</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/dashboard') }}">Sa</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Main Menu</li>
        <li class="dropdown">
          <a href="dashboard" class="nav-link "><i class="fas fa-home"></i><span>Dashboard</span></a>
        </li>
        <li class="dropdown">
            <a href="{{ url('/operator') }}" class="nav-link "><i class="fas fa-users"></i><span>Operator</span></a>
        </li>
        <li class="dropdown">
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-box"></i> <span>Product</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ url('/category')}}">Category Product</a></li>
                <li><a class="nav-link" href="{{ url('/product')}}">Data Product</a></li>
              </ul>
            </li>
          </li>
      </ul>

    </aside>
  </div>
