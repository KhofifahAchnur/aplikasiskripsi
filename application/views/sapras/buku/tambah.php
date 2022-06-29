<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Perpustakaan</h1>
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
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Data Perpustakaan</h3>
                        </div>
                        <!-- form start -->
                        <form action="" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Buku</label>
                                    <input type="text" class="form-control" id="nama_buku" placeholder="Masukkan Nama Buku" name="nama_buku">
                                    <div class="form-text text-danger"><?= form_error('nama_buku'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Kode Buku</label>
                                    <input type="text" class="form-control" id="kode_buku" placeholder="Masukkan Kode Buku" name="kode_buku" value="<?= $kode ?>" readonly>
                                    <div class="form-text text-danger"><?= form_error('kode_buku'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Register</label>
                                    <input type="text" class="form-control" id="register" placeholder="Masukkan Kode Register" name="register">
                                    <div class="form-text text-danger"><?= form_error('register'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" class="form-control" id="judul" placeholder="Masukkan Judul Buku" name="judul">
                                    <div class="form-text text-danger"><?= form_error('judul'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Spesifikasi</label>
                                    <input type="text" class="form-control" id="spesifikasi" placeholder="Masukkan Spesifikasi Buku" name="spesifikasi">
                                    <div class="form-text text-danger"><?= form_error('spesifikasi'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Asal-Usul</label>
                                    <input type="text" class="form-control" id="asal_usul" placeholder="Masukkan Asal-usul" name="asal_usul">
                                    <div class="form-text text-danger"><?= form_error('asal_usul'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Tahun Peroleh</label>
                                    <input type="text" class="form-control" id="tahun" placeholder="Masukkan Tahun Peroleh" name="tahun">
                                    <div class="form-text text-danger"><?= form_error('tahun'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Kondisi</label>
                                    <select name="kondisi" class="form-control" id="kondisi">
                                        <option>- Pilih Kondisi -</option>
                                        <option value="Baik"> Baik </option>
                                        <option value="Kurang Baik"> Kurang Baik </option>
                                        <option value="Rusak Berat"> Rusak Berat </option>
                                    </select>
                                    <div class="form-text text-danger"><?= form_error('kondisi'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Harga Buku</label>
                                    <input type="text" class="form-control" id="harga" placeholder="Masukkan Harga Buku" name="harga">
                                    <div class="form-text text-danger"><?= form_error('harga'); ?></div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-info">Simpan</button>
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