<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="index.html">
                    <img src="{{ url('assets/admin/images/icon/logo.png') }}" alt="CoolAdmin" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li>
                    <a href="{{ url('/admin') }}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-tachometer-alt"></i>Master</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="{{ url('/admin/skills') }}">Skills</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/works') }}">Works</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/services') }}">Services</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/JenisProduk') }}">Jenis Produk</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('/admin/Produk') }}"><i class="fas fa-box"></i> Produk</a>
                </li>
                <li>
                    <a href="{{ url('/admin/transaksi') }}"><i class="fas fa-credit-card"></i> Transaksi</a>
                </li>
                <li>
                    <a href="{{ url('/admin/admin') }}">
                        <i class="fas fa-users"></i>Admin</a>
                </li>
            </ul>
        </div>
    </nav>
</header>