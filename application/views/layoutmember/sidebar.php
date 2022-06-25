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
                    <!-- <hr color="white"> -->
                    <a href="<?= base_url('member/dashboard') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                    <hr color="white">
                    <a href="<?= base_url('member/penanggung_jawab') ?>" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>

                        <p>
                            Data Penanggung Jawab
                        </p>
                    </a>
                    <!-- <hr color="white">
                    <a href="<?= base_url('member/pengajuan/index') ?>" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>

                        <p>
                            Pengajuan Aset
                        </p>
                    </a> -->
                    <hr color="white">
                    <a href="<?= base_url('member/lokasi/index') ?>" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>

                        <p>
                            Data Lokasi Aset
                        </p>
                    </a>
                    <!-- <hr color="white">
                    <a href="<?= base_url('member/penghapusan') ?>" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>

                        <p>
                            Penghapusan Aset
                        </p>
                    </a> -->
                    <hr color="white">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>
                            Aset Baru
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/pbaru') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Pengajuan Aset Baru
                                </p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/kbaru') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>History Konfirmasi</p>
                            </a>
                        </li>
                    </ul>
                    <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/lokasi/index') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Data Lokasi Aset
                                </p>
                            </a>
                    </ul> -->
                    <hr color="white">
                <li class="nav-header">TRANSAKSI</li>
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-random"></i>
                        <p>
                            TRANSAKSI ASET
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a> -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-random"></i>
                        <p>
                            Tanah
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/masteraset') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Data Master Aset
                                </p>
                            </a>
                        </li>
                    </ul> -->
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/tanah') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Aset</p>
                            </a>
                        </li>
                    </ul>
                    <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/lokasi/index') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Data Lokasi Aset
                                </p>
                            </a>
                    </ul> -->
                    <hr color="white">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-random"></i>
                        <p>
                            Peralatan & Mesin
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/masteraset') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Data Master Aset
                                </p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/aset') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Aset</p>
                            </a>
                        </li>
                    </ul>
                    <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/perpindahan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    History Perpindahan Aset
                                </p>
                            </a>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/kondisi') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    History Kondisi Aset
                                </p>
                            </a>
                    </ul> -->
                    <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/perbaikan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    History Perbaikan Aset
                                </p>
                            </a>
                    </ul> -->
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/perawatan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    History Pemeliharaan Aset
                                </p>
                            </a>
                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/pengajuan/index') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    History Pengajuan Aset
                                </p>
                            </a>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/konfirmasi') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    History Konfirmasi Aset
                                </p>
                            </a>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/peminjaman/index') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    History Peminjaman Aset
                                </p>
                            </a>
                    </ul>
                    <hr color="white">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-random"></i>
                        <p>
                            Gedung & Bangunan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/gedung') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Data Master Aset
                                </p>
                            </a>
                        </li>
                    </ul> -->
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/gedung') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Aset</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/pemeliharaan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    History Pemeliharaan Aset
                                </p>
                            </a>
                    </ul>
                    <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/kondisi_gedung') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    History Kondisi Aset
                                </p>
                            </a>
                    </ul> -->
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/pgedung/index') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    History Pengajuan Aset
                                </p>
                            </a>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/kgedung') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    History Konfirmasi Aset
                                </p>
                            </a>
                    </ul>
                    <!-- <hr color="white"> -->
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-random"></i>
                        <p>
                            Kendaraan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/gedung') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Data Master Aset
                                </p>
                            </a>
                        </li>
                    </ul> -->
                    <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/kendaraan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Aset</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/perawatan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    History Pemeliharaan Aset
                                </p>
                            </a>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/kondisi') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    History Kondisi Aset
                                </p>
                            </a>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/pmotor/index') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    History Pengajuan Aset
                                </p>
                            </a>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/kmotor') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    History Konfirmasi Aset
                                </p>
                            </a>
                    </ul> -->
                    <hr color="white">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-random"></i>
                        <p>
                            Buku
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/masteraset') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Data Master Aset
                                </p>
                            </a>
                        </li>
                    </ul> -->
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/buku') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Aset Baru</p>
                            </a>
                        </li>
                    </ul>
                    <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/lokasi/index') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Data Lokasi Aset
                                </p>
                            </a>
                    </ul> -->
                    <hr color="white">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-random"></i>
                        <p>
                            Jalan,Irigasi & Jaringan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/masteraset') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Data Master Aset
                                </p>
                            </a>
                        </li>
                    </ul> -->
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/jalan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Aset Baru</p>
                            </a>
                        </li>
                    </ul>
                    <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/lokasi/index') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Data Lokasi Aset
                                </p>
                            </a>
                    </ul> -->
                    <!-- <hr color="white"> -->

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

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/konfirmasi') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Konfirmasi Aset</p>
                            </a>
                        </li>
                    </ul> -->
                    <!-- <hr color="white">
                <li class="nav-header">PEMELIHARAAN ASET</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-random"></i>
                        <p>
                            Pemeliharaan Aset
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/perbaikan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Perbaikan Aset</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/perawatan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Perawatan Aset</p>
                            </a>
                        </li>
                    </ul>
                    <hr color="white"> -->
                    <!-- <a href="<?= base_url('member/lokasi/index') ?>" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>

                        <p>
                            Data Pengajuan
                        </p>
                    </a>
                    <hr color="white">
                    <a href="<?= base_url('member/pengajuan/index') ?>" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>

                        <p>
                            Pengajuan Aset
                        </p>
                    </a>
                    <hr color="white"> -->
                    <!-- <a href="<?= base_url('member/peminjaman') ?>" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>

                        <p>
                            Peminjaman Aset
                        </p>
                    </a> -->
                    <!-- <hr color="white">
                    <a href="<?= base_url('member/penghapusan') ?>" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>

                        <p>
                            Penghapusan Aset
                        </p>
                    </a> -->
                    <!-- <hr color="white"> -->

                <!-- <li class="nav-header">LAPORAN</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-print"></i>
                        <p>
                            Laporan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <<ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/penanggung_jawab/laporan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Data Penanggung Jawab Aset</p>
                            </a>
                        </li>
                    </ul> -->
                    <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/masteraset/filter') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Aset Peralatan & Mesin</p>
                            </a>
                        </li>
                    </ul> -->
                    <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/aset/laporan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Data aset</p>
                            </a>
                        </li>
                    </ul> -->
                    <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/lokasi/laporan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Data Lokasi Aset</p>
                            </a>
                        </li>
                    </ul> -->
                    <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/perbaikan/laporan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Perbaikan Aset</p>
                            </a>
                        </li>
                    </ul> -->
                    <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/perpindahan/laporan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Perpindahan Aset</p>
                            </a>
                        </li>
                    </ul> -->
                    <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/kondisi/laporan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Kondisi</p>
                            </a>
                        </li>
                    </ul> -->
                    <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/tanah/filter') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Aset Tanah</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/gedung/filter') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Aset Gedung</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/buku/filter') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Aset Perpustakaan</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/jalan/filter') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Aset Jalan , Irigasi & Jaringan</p>
                            </a>
                        </li>
                    </ul>
                     <hr color="white"> -->
                    <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/penghapusan/filter') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Penghapusan</p>
                            </a>
                        </li>
                    </ul> --> -->
                    <!-- <hr color="white"> -->
                    <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/konfirmasi/laporan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Konfirmasi</p>
                            </a>
                        </li>
                    </ul>
                    <hr color="white"> -->
                    <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/pengajuan/laporan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Pengajuan <p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/pbaru/laporan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Pengajuan Aset Baru <p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/kbaru/laporan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Konfirmasi Aset Baru <p>
                            </a>
                        </li>
                    </ul>
                    <hr color="white">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('member/hmotor/index') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Konfirmasi Aset Baru <p>
                            </a>
                        </li>
                    </ul>  --> -->
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