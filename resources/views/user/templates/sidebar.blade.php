<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa-regular fa-building"></i>
        </div>
        <div class="sidebar-brand-text mx-3">MyCom <sup>❤</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
        <a class="nav-link" href="/">
            <i class="fa-solid fa-house"></i>
            <span>Beranda</span>
        </a>
    </li>

    <!-- Nav Item - Public File -->
    <li class="nav-item {{ request()->is('publikFile') ? 'active' : '' }}">
        <a class="nav-link" href="/publikFile">
            <i class="fa-solid fa-earth-americas"></i>
            <span>Publik File</span>
        </a>
    </li>

    @if (Auth::user()->status == 2)
    <li class="nav-item {{ request()->is('a/*') ? 'active' : '' }}">
        <a class="nav-link" href="/a/users">
            <i class="fa-regular fa-user"></i>
            <span>Data User</span>
        </a>
    </li>
    @endif

</ul>