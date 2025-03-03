<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-store"></i>
        </div>
        <div class="sidebar-brand-text mx-3">NGAWULO</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">Master</div>

    <!-- Nav Item - Barang -->
    <li class="nav-item {{ request()->routeIs(['data-barang', 'entri-barang', 'detail-barang', 'edit-barang', 'jenis-barang', 'entri-jenis', 'edit-jenis', 'satuan', 'entri-satuan', 'edit-satuan']) ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-box"></i>
            <span>Barang</span>
        </a>
        <div id="collapseTwo"
            class="collapse {{ request()->routeIs(['data-barang', 'entri-barang', 'detail-barang', 'edit-barang', 'jenis-barang', 'entri-jenis', 'edit-jenis', 'satuan', 'entri-satuan', 'edit-satuan']) ? 'show' : '' }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Komponen Barang:</h6>
                <a class="collapse-item {{ request()->routeIs(['data-barang', 'entri-barang', 'detail-barang', 'edit-barang']) ? 'active' : '' }}"
                    href="{{ route('data-barang') }}">
                    <i class="fas fa-clipboard-list mr-2"></i>Data Barang
                </a>
                <a class="collapse-item {{ request()->routeIs('jenis-barang', 'entri-jenis', 'edit-jenis') ? 'active' : '' }}"
                    href="{{ route('jenis-barang') }}">
                    <i class="fas fa-tags mr-2"></i>Jenis Barang
                </a>
                <a class="collapse-item {{ request()->routeIs('satuan', 'entri-satuan', 'edit-satuan') ? 'active' : '' }}"
                    href="{{ route('satuan') }}">
                    <i class="fas fa-balance-scale mr-2"></i>Satuan
                </a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">Transaksi</div>

    <!-- Nav Item - Barang Masuk -->
    <li class="nav-item {{ request()->routeIs('barang-masuk') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('barang-masuk') }}">
            <i class="fas fa-arrow-down"></i>
            <span>Barang Masuk</span>
        </a>
    </li>

    <!-- Nav Item - Barang Keluar -->
    <li class="nav-item {{ request()->routeIs('barang-keluar') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('barang-keluar') }}">
            <i class="fas fa-arrow-up"></i>
            <span>Barang Keluar</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">User Management</div>

    <!-- Nav Item - Barang Keluar -->
    <li class="nav-item {{ request()->routeIs('profile') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('profile') }}">
            <i class="fas fa-users"></i>
            <span>Profile User</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
    