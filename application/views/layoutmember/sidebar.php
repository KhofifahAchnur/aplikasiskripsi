<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?= base_url('adminlte/'); ?>dist/img/default.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?= $this->session->userdata['username'] ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icmon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('member/dashboard') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                    <hr color="white">
                <li class="nav-item">
                    <a href="<?= base_url('member/penanggung_jawab') ?>" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>

                        <p>
                            Data Penanggung Jawab
                        </p>
                    </a>
                    <hr color="white">
                    <li class="nav-item">
                    <a href="<?= base_url('member/masteraset') ?>" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>

                        <p>
                            Data Master Aset
                        </p>
                    </a>
                    <hr color="white">
                    <li class="nav-item">
                    <a href="<?= base_url('member/lokasi/index') ?>" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>

                        <p>
                            Data Lokasi Aset
                        </p>
                    </a>
                    <hr color="white">
                    <li class="nav-item">
                    <a href="<?= base_url('member/perbaikan') ?>" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>

                        <p>
                            History Perbaikan
                        </p>
                    </a>
                    <hr color="white">
                    <li class="nav-item">
                    <a href="<?= base_url('member/perpindahan') ?>" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>

                        <p>
                            History Perpindahan
                        </p>
                    </a>
                    <hr color="white">
                    <li class="nav-item">
                    <a href="<?= base_url('member/kondisi') ?>" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>

                        <p>
                            History Kondisi
                        </p>
                    </a>
                    <hr color="white">
                <!-- <li class="nav-header">DATA HISTORY</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-random"></i>
                        <p>
                            Data History
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/perbaikan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Perawatan/Perbaikan Aset</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/perpindahan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Perpindahan Aset</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/kondisi') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kondisi Aset</p>
                            </a>
                        </li>
                    </ul>
                    <hr color="white"> -->
                <!-- <li class="nav-header">LAPORAN</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-print"></i>
                        <p>
                            Laporan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('masteraset/laporan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Data Master aset</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('aset/laporan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Data aset</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Data Lokasi Aset</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('penanggung_jawab/laporan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Data Penanggung Jawab Aset</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('perbaikan/laporan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Perbaikan Aset</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('perpindahan/laporan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Perpindahan Aset</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan User</p>
                            </a>
                        </li>
                    </ul> -->
                    <!-- <hr color="white">
                <li class="nav-item"> -->
                    <a href="<?= base_url('auth/logout'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>