<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Gedung</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="<?= base_url('admin/gedung/index') ?>" button type="button" class="btn waves-effect waves-light btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
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
                            <h3 class="card-title">Edit Data Gedung</h3>
                        </div>
                        <!-- form start -->
                        <form action = "" method = "post">
                        <input type="hidden" name="id_tanah" value="<?= $gedung['id_gedung']; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" id="nama_gedung" placeholder="Masukkan Nama Gedung" name="nama_gedung" value="<?= $gedung['nama_gedung']; ?>">
                                    <div class="form-text text-danger"><?= form_error('nama_gedung'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Kode Barang</label>
                                    <input type="text" class="form-control" id="kode_gedung" placeholder="Masukkan Kode Gedung" name="kode_gedung" value="<?= $gedung['kode_gedung']; ?>">
                                    <div class="form-text text-danger"><?= form_error('kode_gedung'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Register</label>
                                    <input type="text" class="form-control" id="register" placeholder="Masukkan Register" name="register" value="<?= $gedung['register']; ?>">
                                    <div class="form-text text-danger"><?= form_error('register'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Bertingkat</label>
                                    <select name="tingkat" class="form-control" id="tingkat">
                                        <option value="<?= $gedung['tingkat']; ?>"><?= $gedung['tingkat']; ?></option>
                                        <option>- Pilih Konstruksi -</option>
                                        <option value="Bertingkat"> Bertingkat </option>
                                        <option value="Tidak Bertingkat"> Tidak Bertingkat </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Beton</label>
                                    <select name="beton" class="form-control" id="beton">
                                        <option value="<?= $gedung['beton']; ?>"><?= $gedung['beton']; ?></option>
                                        <option>- Pilih Konstruksi -</option>
                                        <option value="Beton"> Beton </option>
                                        <option value="Tidak Beton"> Tidak Beton </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Luas</label>
                                    <input type="text" class="form-control" id="luas" placeholder="Masukkan Luas Gedung" name="luas" value="<?= $gedung['luas']; ?>">
                                    <div class="form-text text-danger"><?= form_error('luas'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <input type="text" class="form-control" id="lokasi" placeholder="Masukkan Lokasi Gedung" name="lokasi" value="<?= $gedung['lokasi']; ?>">
                                    <div class="form-text text-danger"><?= form_error('lokasi'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <input type="text" class="form-control" id="tahun" placeholder="Masukkan Tahun Gedung" name="tahun" value="<?= $gedung['tahun']; ?>">
                                    <div class="form-text text-danger"><?= form_error('tahun'); ?></div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Kondisi</label>
                                    <input type="text" class="form-control" id="kondisi" placeholder="Masukkan Kondisi Gedung" name="kondisi" value="<?= $gedung['kondisi']; ?>">
                                    <div class="form-text text-danger"><?= form_error('kondisi'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="text" class="form-control" id="status" placeholder="Masukkan Status Gedung" name="status" value="<?= $gedung['status']; ?>">
                                    <div class="form-text text-danger"><?= form_error('status'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Asal - usul</label>
                                    <input type="text" class="form-control" id="asal_usul" placeholder="Masukkan Asal-Usul Gedung" name="asal_usul" value="<?= $gedung['asal_usul']; ?>">
                                    <div class="form-text text-danger"><?= form_error('asal_usul'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="text" class="form-control" id="harga" placeholder="Masukkan Harga Gedung" name="harga" value="<?= $gedung['harga']; ?>">
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