<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="<?= base_url('admin/perbaikan/index') ?>" button type="button" class="btn waves-effect waves-light btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
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
                            <h3 class="card-title">Tambah Data Barang</h3>
                        </div>
                        <!-- form start -->
                        <form action = "" method = "post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" id="nama_perbaikan" placeholder="Masukkan Kode Barang" name="nama_perbaikan">
                                    <div class="form-text text-danger"><?= form_error('nama_perbaikan'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <input type="text" class="form-control" id="lokasi_aset" placeholder="Masukkan Kode Barang" name="lokasi_aset">
                                    <div class="form-text text-danger"><?= form_error('lokasi_aset'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Kerusakan</label>
                                    <input type="text" class="form-control" id="rusak" placeholder="Masukkan Kerusakan" name="rusak">
                                    <div class="form-text text-danger"><?= form_error('rusak'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Biaya</label>
                                    <input type="text" class="form-control" id="biaya_perbaikan" placeholder="Masukkan Kode Barang" name="biaya_perbaikan">
                                    <div class="form-text text-danger"><?= form_error('biaya_perbaikan'); ?></div>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Tanggal Perbaikan</label>
                                    <input type="text" class="form-control" id="tgl_perbaikan" placeholder="Masukkan Tanggal Perbaikan" name="tgl_perbaikan">
                                    <div class="form-text text-danger"><?= form_error('tgl_perbaikan'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Selesai</label>
                                    <input type="text" class="form-control" id="tgl_selesai" placeholder="Masukkan Tanggal Selesai" name="tgl_selesai">
                                    <div class="form-text text-danger"><?= form_error('tgl_selesai'); ?></div>
                                </div> -->
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