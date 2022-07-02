<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?= base_url('adminlte/'); ?>dist/img/logo.png" alt="AdminLTELogo" height="50" width="50">
</div>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <strong><a class="nav-link">SMPN 15 BANJARMASIN</a></strong>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <?= $this->session->userdata['username'] ?>
                <i class="far fa-user"></i>
            </a>
            <div class="dropdown-menu">
                <a href="<?= base_url('admin/penanggung_jawab') ?>" class="dropdown-item">
                    <i class="far fa-plus-square mr-2"></i>Pengguna
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('auth/logout') ?>" class="dropdown-item">
                    <i class="fas fa-sign-out-alt fa-sm mr-2"></i>Logout
                </a>
        </li>
        <!-- Messages Dropdown Menu -->
    </ul>
</nav>
<!-- /.navbar -->