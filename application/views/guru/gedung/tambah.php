<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Aset Gedung & Bangunan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="<?= base_url('guru/gedung/index') ?>" button type="button" class="btn waves-effect waves-light btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
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
                            <h3 class="card-title">Tambah Data Aset Gedung & Bangunan</h3>
                        </div>
                        <!-- form start -->
                        <form action="" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Gedung</label>
                                    <input type="text" class="form-control" id="nama_gedung" placeholder="Masukkan Nama Gedung" name="nama_gedung">
                                    <div class="form-text text-danger"><?= form_error('nama_gedung'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Kode Gedung</label>
                                    <input type="text" class="form-control" id="kode_gedung" placeholder="Masukkan Kode Gedung" name="kode_gedung" value="<?= $kode ?>" readonly>
                                    <div class="form-text text-danger"><?= form_error('kode_gedung'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Register</label>
                                    <input type="text" class="form-control" id="register" placeholder="Masukkan Kode Register" name="register">
                                    <div class="form-text text-danger"><?= form_error('register'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Bertingkat</label>
                                    <select name="tingkat" class="form-control" id="tingkat">
                                        <option>- Pilih Konstruksi -</option>
                                        <option value="Bertingkat"> Bertingkat </option>
                                        <option value="Tidak Bertingkat"> Tidak Bertingkat </option>
                                    </select>
                                    <div class="form-text text-danger"><?= form_error('tingkat'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Beton</label>
                                    <select name="beton" class="form-control" id="beton">
                                        <option>- Pilih Konstruksi -</option>
                                        <option value="Beton"> Beton </option>
                                        <option value="Tidak Beton"> Tidak Beton </option>
                                    </select>
                                    <div class="form-text text-danger"><?= form_error('beton'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Luas</label>
                                    <input type="text" class="form-control" id="luas" placeholder="Masukkan Luas" name="luas">
                                    <div class="form-text text-danger"><?= form_error('luas'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <input type="text" class="form-control" id="lokasi" placeholder="Masukkan Lokasi" name="lokasi">
                                    <div class="form-text text-danger"><?= form_error('lokasi'); ?></div>
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
                                    <label>Status</label>
                                    <input type="text" class="form-control" id="status" placeholder="Masukkan status Peroleh" name="status">
                                    <div class="form-text text-danger"><?= form_error('status'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Asal-Usul</label>
                                    <input type="text" class="form-control" id="asal_usul" placeholder="Masukkan Asal-usul" name="asal_usul">
                                    <div class="form-text text-danger"><?= form_error('asal_usul'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Harga Gedung</label>
                                    <input type="text" class="form-control" id="harga" placeholder="Masukkan Harga Gedung" name="harga">
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