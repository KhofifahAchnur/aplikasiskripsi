<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Aset Jalan , Irigasi & Jaringan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="<?= base_url('admin/jalan/index') ?>" button type="button" class="btn waves-effect waves-light btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
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
                            <h3 class="card-title">Edit Data Aset Jalan , Irigasi & Jaringan</h3>
                        </div>
                        <!-- form start -->
                        <form action = "" method = "post">
                        <input type="hidden" name="id_jalan" value="<?= $jalan['id_jalan']; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" id="nama_aset" placeholder="Masukkan Nama Gedung" name="nama_aset" value="<?= $jalan['nama_aset']; ?>">
                                    <div class="form-text text-danger"><?= form_error('nama_aset'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Kode Barang</label>
                                    <input type="text" class="form-control" id="kode_aset" placeholder="Masukkan Kode aset" name="kode_aset" value="<?= $jalan['kode_aset']; ?>">
                                    <div class="form-text text-danger"><?= form_error('kode_aset'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Register</label>
                                    <input type="text" class="form-control" id="register" placeholder="Masukkan Register" name="register" value="<?= $jalan['register']; ?>">
                                    <div class="form-text text-danger"><?= form_error('register'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Konstruksi</label>
                                    <input type="text" class="form-control" id="konstruksi" placeholder="Masukkan konstruksi" name="konstruksi" value="<?= $jalan['konstruksi']; ?>">
                                    <div class="form-text text-danger"><?= form_error('konstruksi'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Luas</label>
                                    <input type="text" class="form-control" id="luas" placeholder="Masukkan Luas jalan" name="luas" value="<?= $jalan['luas']; ?>">
                                    <div class="form-text text-danger"><?= form_error('luas'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <input type="text" class="form-control" id="lokasi" placeholder="Masukkan Lokasi jalan" name="lokasi" value="<?= $jalan['lokasi']; ?>">
                                    <div class="form-text text-danger"><?= form_error('lokasi'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Kondisi</label>
                                    <input type="text" class="form-control" id="kondisi" placeholder="Masukkan Kondisi jalan" name="kondisi" value="<?= $jalan['kondisi']; ?>">
                                    <div class="form-text text-danger"><?= form_error('kondisi'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="text" class="form-control" id="status" placeholder="Masukkan Status jalan" name="status" value="<?= $jalan['status']; ?>">
                                    <div class="form-text text-danger"><?= form_error('status'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Asal - usul</label>
                                    <input type="text" class="form-control" id="asal_usul" placeholder="Masukkan Asal-Usul jalan" name="asal_usul" value="<?= $jalan['asal_usul']; ?>">
                                    <div class="form-text text-danger"><?= form_error('asal_usul'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="text" class="form-control" id="harga" placeholder="Masukkan Harga jalan" name="harga" value="<?= $jalan['harga']; ?>">
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