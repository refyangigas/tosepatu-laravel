<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <!-- Replace the commented line below with your logo image -->
            {{-- <img src="{{ asset('admin/img/logo/logo2.png') }}"> --}}
        </div>
        <div class="sidebar-brand-text mx-3">To Sepatu KC</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('dashboard') }}">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/transaksi">
            <i class="fas fa-exchange-alt"></i>
            <span>Transaksi</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/jasa">
            <i class="fas fa-desktop"></i>
            <span>Layanan</span>
        </a>
    </li>        
    <li class="nav-item">
        <a class="nav-link" href="/pengguna">
            <i class="fas fa-users"></i>
            <span>Pengguna</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('laporan') }}">
            <i class="fas fa-chart-bar"></i>
            <span>Laporan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/profile">
            <i class="fas fa-user"></i>
            <span>Profil</span>
        </a>
    </li>
</ul>
<!-- Sidebar -->

<script>
    // Ambil semua elemen <a> di dalam sidebar
    var sidebarItems = document.querySelectorAll('.sidebar .nav-item');

    // Tambahkan event listener untuk setiap elemen <a>
    sidebarItems.forEach(function(item) {
        item.addEventListener('click', function() {
            // Hapus kelas "active" dari semua elemen <a>
            sidebarItems.forEach(function(item) {
                item.classList.remove('active');
            });

            // Tambahkan kelas "active" pada elemen yang sedang diklik
            this.classList.add('active');
        });
    });

    // Ambil URL halaman saat ini
    var currentUrl = window.location.href;

    // Cek setiap elemen <a> di dalam sidebar
    sidebarItems.forEach(function(item) {
        var link = item.querySelector('.nav-link');
        var href = link.getAttribute('href');

        // Periksa apakah URL halaman saat ini sesuai dengan href pada elemen <a>
        if (currentUrl.indexOf(href) !== -1) {
            // Tambahkan kelas "active" pada elemen yang sesuai dengan URL halaman saat ini
            item.classList.add('active');
        }
    });
</script>

<style>
    /* Gaya untuk fitur yang aktif */
    .sidebar .nav-item.active .nav-link {
        color: #666;
    }
</style>
