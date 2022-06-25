<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pemeliharaan Aset Peralatan & Mesin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="<?= base_url('sapras/perawatan/index') ?>" button type="button" class="btn waves-effect waves-light btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
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
                            <h3 class="card-title">Edit Data Pemeliharaan Aset Peralatan & Mesin</h3>
                        </div>
                        <!-- form start -->
                        <form action="" method = "post">
                        <input type="hidden" name="id" value="<?= $rawat['id_rawat']; ?>">
                            <div class="card-body">
                            <div class="form-group">
                                    <label>Nama barang</label>
                                    <input hidden type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $aset['id'] ?>">
                                    <input readonly type="text" class="form-control" id="" name="" value="<?= $aset['nama_barang'] ?>">
                                    <div class="form-text text-danger"><?= form_error('nama_barang'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Kode barang</label>
                                    <input readonly type="text" class="form-control" id="kode_barang" name="kode_barang" value="<?= $aset['kode_barang'] ?>">
                                    <div class="form-text text-danger"><?= form_error('kode_barang'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Register</label>
                                    <input readonly type="text" class="form-control" id="register" name="register" value="<?= $aset['register'] ?>">
                                    <div class="form-text text-danger"><?= form_error('register'); ?></div>
                                </div>
                             <div class="form-group">
                                    <label>Lokasi</label>
                                    <input hidden type="text" class="form-control" id="lokasi" name="lokasi" value="<?= $lokasi['id'] ?>">
                                    <input readonly type="text" class="form-control" id="" name="" value="<?= $lokasi['lokasi'] ?>">
                                    <div class="form-text text-danger"><?= form_error('lokasi'); ?></div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Penanggung Jawab</label>
                                    <input hidden type="text" class="form-control" id="nama" name="nama" value="<?= $nama['id'] ?>">
                                    <input readonly type="text" class="form-control" id="" name="" value="<?= $nama['nama'] ?>">
                                    <div class="form-text text-danger"><?= form_error('nama'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Perawatan</label>
                                    <input type="text" class="form-control" id="jenis" placeholder="Masukkan Kode Barang" name="jenis" value="<?= $rawat['jenis']; ?>">
                                    <div class="form-text text-danger"><?= form_error('jenis'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Biaya</label>
                                    <input type="text" class="form-control" id="biaya" placeholder="Masukkan Kode Barang" name="biaya" value="<?= $rawat['biaya']; ?>">
                                    <div class="form-text text-danger"><?= form_error('biaya'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Perawatan</label>
                                    <input type="date" class="form-control" id="tgl_rawat" placeholder="Masukkan Kode Barang" name="tgl_rawat" value="<?= $rawat['tgl_rawat']; ?>">
                                    <div class="form-text text-danger"><?= form_error('tgl_rawat'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Selesai</label>
                                    <input type="date" class="form-control" id="tgl_selesai" placeholder="Masukkan Kode Barang" name="tgl_selesai" value="<?= $rawat['tgl_selesai']; ?>">
                                    <div class="form-text text-danger"><?= form_error('tgl_selesai'); ?></div>
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