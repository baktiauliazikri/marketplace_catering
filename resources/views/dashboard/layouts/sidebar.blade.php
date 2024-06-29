<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        {{-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div> --}}
        <div class="sidebar-brand-text mx-3">Merchant</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a href="/dashboard" class="nav-link @yield('menuDashboard')">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Manage Menu
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a href="{{ route('menu.index')}}" class="nav-link @yield('dataMenu')">
            <i class="fa-solid fa-bowl-food"></i>
            <span>Menu</span>
        </a>
    </li>
    <hr class="sidebar-divider my-0">
    <!-- Divider -->
    {{-- <hr class="sidebar-divider"> --}}
    <li class="nav-item">
        <a class="nav-link" href="{{route('order.index')}}">
            <i class="fa-solid fa-cart-shopping"></i>
            <span>Order</span>
        </a>
    </li>
</ul>
