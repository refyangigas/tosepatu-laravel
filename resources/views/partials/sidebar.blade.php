<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            {{-- <img src="{{ asset('admin/img/logo/logo2.png') }}"> --}}
        </div>
        <div class="sidebar-brand-text mx-3">To Sepatu KC</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/transaksi">
            <i class="fa fa-briefcase"></i>
            <span>Transaksi</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/jasa">
            <i class="fa fa-podcast" aria-hidden="true"></i>
            <span>Jasa</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/pengguna">
            <i class="fa fa-users" aria-hidden="true"></i>
            <span>Pengguna</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('laporan') }}">
            <i class="fa fa-flag" aria-hidden="true"></i>
            <span>Laporan</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/profile">
            <i class="fa fa-male" aria-hidden="true"></i>
            <span>Profil</span></a>
    </li>
    </ul>
<!-- Sidebar -->
