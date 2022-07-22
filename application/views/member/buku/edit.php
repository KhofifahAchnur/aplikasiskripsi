<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Data Aset Buku / Kepustakaan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="<?= base_url('admin/buku/index') ?>" button type="button" class="btn waves-effect waves-light btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card-header -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data Aset Buku / Kepustakaan</h3>
                        </div>
                        <!-- form start -->
                        <form action = "" method = "post">
                        <input type="hidden" name="id_buku" value="<?= $buku['id_buku']; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Buku</label>
                                    <input type="text" class="form-control" id="nama_buku" placeholder="Masukkan Nama Buku" name="nama_buku" value="<?= $buku['nama_buku']; ?>">
                                    <div class="form-text text-danger"><?= form_error('nama_buku'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Kode Buku</label>
                                    <input type="text" class="form-control" id="kode_buku" placeholder="Masukkan Kode Buku" name="kode_buku" value="<?= $buku['kode_buku']; ?>">
                                    <div class="form-text text-danger"><?= form_error('kode_buku'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Register</label>
                                    <input type="text" class="form-control" id="register" placeholder="Masukkan Register" name="register" value="<?= $buku['register']; ?>">
                                    <div class="form-text text-danger"><?= form_error('register'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" class="form-control" id="judul" placeholder="Masukkan Judul Buku" name="judul" value="<?= $buku['judul']; ?>">
                                    <div class="form-text text-danger"><?= form_error('judul'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Spesifikasi</label>
                                    <input type="text" class="form-control" id="spesifikasi" placeholder="Masukkan Spesifikasi Buku" name="spesifikasi" value="<?= $buku['spesifikasi']; ?>">
                                    <div class="form-text text-danger"><?= form_error('spesifikasi'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Asal - usul</label>
                                    <input type="text" class="form-control" id="asal_usul" placeholder="Masukkan Asal-Usul Buku" name="asal_usul" value="<?= $buku['asal_usul']; ?>">
                                    <div class="form-text text-danger"><?= form_error('asal_usul'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <input type="text" class="form-control" id="tahun" placeholder="Masukkan Tahun buku" name="tahun" value="<?= $buku['tahun']; ?>">
                                    <div class="form-text text-danger"><?= form_error('tahun'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Kondisi</label>
                                    <input type="text" class="form-control" id="kondisi" placeholder="Masukkan Kondisi buku" name="kondisi" value="<?= $buku['kondisi']; ?>">
                                    <div class="form-text text-danger"><?= form_error('kondisi'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="text" class="form-control" id="harga" placeholder="Masukkan Harga Buku" name="harga" value="<?= $buku['harga']; ?>">
                                    <div class="form-text text-danger"><?= form_error('harga'); ?></div>
                                </div>
                                
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </section>
</div>