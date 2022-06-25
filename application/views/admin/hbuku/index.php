<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data History Aset Perpustakaan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="<?= base_url('admin/buku/index') ?>" button type="button" class="btn waves-effect waves-light btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a> |
                        <a href="<?= base_url('admin/hbuku/laporan/') . $buku['id_buku'] ?>" class="btn waves-effect waves-light btn-primary" style="float:left"><i class="fas fas fa-print"></i>&nbsp;&nbsp;</a>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 ml-12 mr-12">
                    <!-- /.card-header -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Identitas Buku</h3>
                        </div>
                        <!-- form start -->
                        <form action="" method="post">
                            <!-- <input type="hidden" name="id" value="<?= $buku['id_buku']; ?>"> -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Buku</label>
                                    <input readonly type="text" class="form-control" id="nama_buku" placeholder="Masukkan Kode buku" name="nama_buku" value="<?= $buku['nama_buku']; ?>">
                                    <div class="form-text text-danger"><?= form_error('nama_buku'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Kode Buku</label>
                                    <input readonly type="text" class="form-control" id="kode_buku" placeholder="Masukkan Kode buku" name="kode_buku" value="<?= $buku['kode_buku']; ?>">
                                    <div class="form-text text-danger"><?= form_error('kode_buku'); ?></div>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Register</label>
                                    <input readonly type="text" class="form-control" id="register" placeholder="Masukkan Kode Barang" name="register" value="<?= $buku['register']; ?>">
                                    <div class="form-text text-danger"><?= form_error('register'); ?></div>
                                </div> -->
                                <div class="form-group">
                                    <label>Register</label>
                                    <input readonly type="text" class="form-control" id="register" placeholder="Masukkan Kode buku" name="register" value="<?= $buku['register']; ?>">
                                    <div class="form-text text-danger"><?= form_error('register'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input readonly type="text" class="form-control" id="judul" placeholder="Masukkan Kode buku" name="judul" value="<?= $buku['judul']; ?>">
                                    <div class="form-text text-danger"><?= form_error('judul'); ?></div>
                                </div>
                                <!-- <div class="text-center">

                                     <a href="<?= base_url('admin/perpindahan/tambah/') . $kgedung['id_gedung'] ?>" button type="button" class="btn btn-primary"></button> &nbsp;&nbsp;Perpindahan</a> -->
                                    <!-- <a href="<?= base_url('admin/pemeliharaan/tambah/') . $gedung['id_gedung'] ?>" button type="button" class="btn btn-primary"></button> &nbsp;&nbsp;Pemeliharaan</a>
                                </div> -->
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- /.card -->

        <!-- <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Perpindahan Barang</h3>
            </div> -->


        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">History Kondisi</h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kode</th>
                            <th>Register</th>
                            <th>Judul</th>
                            <th>Kondisi</th>
                            <th>Tanggal Masuk</th>
                    </thead>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($kondisi_buku as $kdb) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $kdb['nama_buku'] ?></td>
                                <td><?= $kdb['kode_buku'] ?></td>
                                <td><?= $kdb['register'] ?></td>
                                <td><?= $kdb['judul'] ?></td>
                                <td><?= $kdb['kondisi'] ?></td>
                                <td><?= $kdb['tanggal'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>


</div>
<!-- /.card -->

</div>
<!-- /.col -->
</section>
</div>