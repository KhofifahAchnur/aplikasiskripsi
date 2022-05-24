<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Tanah</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="<?= base_url('admin/tanah/index') ?>" button type="button" class="btn waves-effect waves-light btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
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
                            <h3 class="card-title">Tambah Data Tanah</h3>
                        </div>
                        <!-- form start -->
                        <form action="" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" id="nama_barang" placeholder="Masukkan Nama Penanggung Jawab" name="nama_barang">
                                    <div class="form-text text-danger"><?= form_error('nama_barang'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Kode Barang</label>
                                    <input type="text" class="form-control" id="kode_barang" placeholder="Masukkan Kode Barang" name="kode_barang">
                                    <div class="form-text text-danger"><?= form_error('kode_barang'); ?></div>
                                </div>
                                    <label>Register</label>
                                    <input type="text" class="form-control" id="register" placeholder="Masukkan Register" name="register">
                                    <div class="form-text text-danger"><?= form_error('register'); ?></div>
                            </div>
                                <div class="form-group">
                                    <label>Luas</label>
                                    <input type="text" class="form-control" id="luas" placeholder="Masukkan Luas" name="luas">
                                    <div class="form-text text-danger"><?= form_error('luas'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Tahun Peroleh</label>
                                    <input type="text" class="form-control" id="tahun" placeholder="Masukkan Tahun Peroleh" name="tahun">
                                    <div class="form-text text-danger"><?= form_error('tahun'); ?></div>
                            </div>
                                <div class="form-group">
                                <label>Lokasi</label>
                                <input type="text" class="form-control" id="lokasi" placeholder="Masukkan Lokasi" name="lokasi">
                                <div class="form-text text-danger"><?= form_error('lokasi'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Hak</label>
                                    <input type="text" class="form-control" id="hak" placeholder="Masukkan Hak" name="hak">
                                    <div class="form-text text-danger"><?= form_error('hak'); ?></div>
                            </div>
                                <div class="form-group">
                                    <label>Nomer</label>
                                    <input type="text" class="form-control" id="nomer" placeholder="Masukkan Nomer" name="nomer">
                                    <div class="form-text text-danger"><?= form_error('nomer'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Asal - Usul</label>
                                    <input type="text" class="form-control" id="asal_usul" placeholder="Masukkan Asal - Usul" name="asal_usul">
                                    <div class="form-text text-danger"><?= form_error('asal_usul'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="text" class="form-control" id="harga" placeholder="Masukkan Harga" name="harga">
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