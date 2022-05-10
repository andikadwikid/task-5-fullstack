<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{ asset('admin/images/faces/face1.jpg') }}" alt="profile">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">David Grey. H</span>
                    <span class="text-secondary text-small">Project Manager</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#master" aria-expanded="false"
                aria-controls="master">
                <span class="menu-title">Master</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
            <div class="collapse" id="master">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="">Kategori</a></li>
                    <li class="nav-item"> <a class="nav-link" href="">Produk</a></li>
                    <li class="nav-item"> <a class="nav-link" href="">Member</a></li>
                    <li class="nav-item"> <a class="nav-link" href="">Supplier</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#transaksi" aria-expanded="false"
                aria-controls="transaksi">
                <span class="menu-title">Transaksi</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-cart menu-icon"></i>
            </a>
            <div class="collapse" id="transaksi">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="">Pengeluaran</a></li>
                    <li class="nav-item"> <a class="nav-link" href="">Daftar Pembelian</a></li>
                    <li class="nav-item"> <a class="nav-link" href="">Transaksi Pembelian</a></li>
                    <li class="nav-item"> <a class="nav-link" href="">Daftar Penjualan</a></li>
                    <li class="nav-item"> <a class="nav-link" href="">Transaksi Penjualan</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#report" aria-expanded="false"
                aria-controls="report">
                <span class="menu-title">Report</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-file-document menu-icon"></i>
            </a>
            <div class="collapse" id="report">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="">Laporan</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#pengaturan" aria-expanded="false"
                aria-controls="pengaturan">
                <span class="menu-title">System</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-settings menu-icon"></i>
            </a>
            <div class="collapse" id="pengaturan">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="">User</a></li>
                    <li class="nav-item"> <a class="nav-link" href="">Setting</a></li>
                    <li class="nav-item"> <a class="nav-link" href="">Profile</a></li>
                </ul>
            </div>
        </li>

    </ul>
</nav>
