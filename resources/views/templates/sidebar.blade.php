<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">My Web <sup>
                <3</sup>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Tables -->
    <li class="nav-item {{Request::segment(1) == '' ? 'active' : '' }}">
        <a class="nav-link" href="/">
            <i class="fa-solid fa-house"></i>
            <span>Beranda</span></a>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::segment(1) == 'global' ? 'active' : '' }}">
        <a class="nav-link" href="/global">
            <i class="fa-solid fa-earth-americas"></i>
            <span>Global File</span></a>
    </li>

    @if (Auth::user()->status == 2)
        <!-- Nav Item - User -->
        <li class="nav-item {{ request()->is('user') == 'user' ? 'active' : '' }}">
            <a class="nav-link" href="/user">
                <i class="fa-solid fa-user"></i>
                <span>Data User</span></a>
        </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
