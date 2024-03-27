<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ url('/dashboard') }}">SIAP</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/dashboard') }}">SA</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Main Menu</li>

        <li class="dropdown">
            <a href="{{ url('/dashboard') }}" class="nav-link "><i class="fas fa-home"></i><span>Dashboard</span></a>
        </li>
        <li class="dropdown">
            <a href="{{ url('/organization') }}" class="nav-link "><i class="fas fa-building"></i><span>Organisasi</span></a>
        </li>
          </li>
        <li class="dropdown">
            <a href="{{ url('/user') }}" class="nav-link "><i class="fas fa-users"></i><span>Pengguna</span></a>
        <li class="dropdown">
            <a href="{{ url('/scheduler') }}" class="nav-link "><i class="fas fa-list"></i><span>Agenda</span></a>
        </li>
      </ul>

    </aside>
  </div>
