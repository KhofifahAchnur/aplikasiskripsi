<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?= base_url('adminlte/'); ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-9" style="opacity: .8">
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
                <hr color="white">
                    <a href="<?= base_url('admin/dashboard') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                    <hr color="white">
                    <a href="<?= base_url('admin/penanggung_jawab') ?>" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>

                        <p>
                            Data Penanggung Jawab
                        </p>
                    </a>
                    <hr color="white">
                <!-- <li class="nav-header">MASTER DATA</li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/penanggung_jawab') ?>" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>

                        <p>
                            Data Penanggung Jawab
                        </p>
                    </a> -->
                <!-- <li class="nav-item">
                    <a href="<?= base_url('admin/member') ?>" class="nav-link">
                        <i class="fas fa-fw fa-user"></i>
                        <p>
                            Data Member
                        </p>
                    </a> -->
                <!-- <hr color="white"> -->
                <li class="nav-header">TRANSAKSI</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-random"></i>
                        <p>
                            Transaksi
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/masteraset') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Data Master Aset
                                </p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/aset') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Aset Baru</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/lokasi/index') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Data Lokasi Aset
                                </p>
                            </a>
                    </ul>
                    <hr color="white">
                <li class="nav-header">DATA HISTORY</li>
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
                            <a href="<?= base_url('admin/perbaikan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Perawatan/Perbaikan Aset</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/perpindahan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Perpindahan Aset</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/kondisi') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kondisi Aset</p>
                            </a>
                        </li>
                    </ul>
                    <hr color="white">
                <li class="nav-header">LAPORAN</li>
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
                            <a href="<?= base_url('admin/penanggung_jawab/laporan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Data Penanggung Jawab Aset</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/masteraset/laporan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Data Master aset</p>
                            </a>
                        </li>
                    </ul>
                    <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/aset/laporan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Data aset</p>
                            </a>
                        </li>
                    </ul> -->
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/lokasi/laporan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Data Lokasi Aset</p>
                            </a>
                        </li>
                    </ul>
                    <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/perbaikan/laporan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Perbaikan Aset</p>
                            </a>
                        </li>
                    </ul> -->
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/perpindahan/laporan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Perpindahan Aset</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/kondisi/laporan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Kondisi</p>
                            </a>
                        </li>
                    </ul>
                    <hr color="white">
                <li class="nav-item">
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