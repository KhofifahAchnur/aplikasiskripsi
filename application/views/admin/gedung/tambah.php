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
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Data Aset Gedung & Bangunan</h3>
                        </div>
                        <!-- form start -->
                        <form action="" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Gedung</label>
                                    <input type="text" class="form-control" id="nama_gedung" placeholder="Masukkan Nama Gedung / Bangunan" name="nama_gedung">
                                    <div class="form-text text-danger"><?= form_error('nama_gedung'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Kode Gedung</label>
                                    <input type="text" class="form-control" id="kode_gedung" placeholder="Masukkan Kode Gedung / Bangunan" name="kode_gedung" value="<?= $kode ?>" readonly>
                                    <div class="form-text text-danger"><?= form_error('kode_gedung'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Register</label>
                                    <input type="text" class="form-control" id="register" placeholder="Masukkan Kode Register Gedung / Bangunan" name="register">
                                    <div class="form-text text-danger"><?= form_error('register'); ?></div>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Bertingkat</label>
                                    <select name="tingkat" class="form-control" id="tingkat">
                                        <option>- Pilih Konstruksi -</option>
                                        <option value="Bertingkat"> Bertingkat </option>
                                        <option value="Tidak Bertingkat"> Tidak Bertingkat </option>
                                    </select>
                                    <div class="form-text text-danger"><?= form_error('tingkatt1'); ?></div>
                                </div> -->
                                <div class="form-group">
                                    <label>Bertingkat</label>
                                    <select name="tingkat" class="form-control">
                                        <option value="">- Pilih Konstruksi -</option>
                                        <option value="Bertingkat"> Bertingkat </option>
                                        <option value="Tidak Bertingkat"> Tidak Bertingkat </option>
                                    </select>
                                    <div class="form-text text-danger"><?= form_error('tingkat'); ?></div>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Beton</label>
                                    <select name="beton" class="form-control" id="beton">
                                        <option>- Pilih Konstruksi -</option>
                                        <option value="Beton"> Beton </option>
                                        <option value="Tidak Beton"> Tidak Beton </option>
                                    </select>
                                    <div class="form-text text-danger"><?= form_error('beton1'); ?></div>
                                </div> -->
                                <div class="form-group">
                                    <label>Beton</label>
                                    <select name="beton" class="form-control">
                                        <option value="">- Pilih Konstruksi -</option>
                                        <option value="Beton"> Beton </option>
                                        <option value="Tidak Beton"> Tidak Beton </option>
                                    </select>
                                    <div class="form-text text-danger"><?= form_error('beton'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Luas</label>
                                    <input type="text" class="form-control" id="luas" placeholder="Masukkan Luas Gedung / Bangunan" name="luas">
                                    <div class="form-text text-danger"><?= form_error('luas'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <input type="text" class="form-control" id="lokasi" placeholder="Masukkan Lokasi Gedung / Bangunan" name="lokasi">
                                    <div class="form-text text-danger"><?= form_error('lokasi'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Tahun Peroleh</label>
                                    <input type="text" class="form-control" id="tahun" placeholder="Masukkan Tahun Peroleh Gedung / Bangunan" name="tahun">
                                    <div class="form-text text-danger"><?= form_error('tahun'); ?></div>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Kondisi</label>
                                    <select name="kondisi" class="form-control" id="kondisi">
                                        <option value="">- Pilih Kondisi -</option>
                                        <option value="Baik"> Baik </option>
                                        <option value="Kurang Baik"> Kurang Baik </option>
                                        <option value="Rusak Berat"> Rusak Berat </option>
                                    </select>
                                    <div class="form-text text-danger"><?= form_error('kondisi1'); ?></div>
                                </div> -->
                                <div class="form-group">
                                    <label>Kondisi</label>
                                    <select name="kondisi" class="form-control">
                                        <option value="">- Pilih Kondisi -</option>
                                        <option value="Baik">Baik </option>
                                        <option value="Kurang Baik"> Kurang Baik</option>
                                        <option value="Rusak"> Rusak </option>
                                    </select>
                                    <div class="form-text text-danger"><?= form_error('kondisi'); ?></div>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Channel</label>
                                    <select name="channel" class="form-control">
                                        <option value="">- Pilih Channel -</option>
                                        <option value="IWS-PCMO">IWS-PCMO </option>
                                        <option value="IWS-MCO"> IWS-MCO </option>
                                        <option value="HUB"> HUB </option>
                                    </select>
                                    <div class="form-text text-danger"><?= form_error('channel'); ?></div>
                                </div> -->
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="text" class="form-control" id="status" placeholder="Masukkan Status Peroleh Gedung / Bangunan" name="status">
                                    <div class="form-text text-danger"><?= form_error('status'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Asal-Usul</label>
                                    <input type="text" class="form-control" id="asal_usul" placeholder="Masukkan Asal-Usul Gedung / Bangunan" name="asal_usul">
                                    <div class="form-text text-danger"><?= form_error('asal_usul'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Harga Gedung</label>
                                    <input type="text" class="form-control" id="harga" placeholder="Masukkan Harga Gedung / Bangunan" name="harga">
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