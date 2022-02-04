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
                        <a href="<?= base_url('perbaikan/index') ?>" button type="button" class="btn waves-effect waves-light btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
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
                                    <label>Tanggal Masuk</label>
                                    <input type="date" class="form-control" id="tanggal_masuk" placeholder="Masukkan Tanggal Masuk" name="tanggal_masuk">
                                    <div class="form-text text-danger"><?= form_error('tanggal_masuk'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <select name="nama_barang" class="form-control" id="nama_barang">
                                        <?php foreach ($aset as $index => $brg) : ?>
                                            <option value="<?= $brg['id']; ?>"><?= $brg['nama_barang']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            <div class="form-group">
                                    <label>Kode Barang</label>
                                    <select name="kode_barang" class="form-control" id="kode_barang">
                                        <?php foreach ($aset as $index => $brg) : ?>
                                            <option value="<?= $brg['id']; ?>"><?= $brg['kode_barang']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kondisi</label>
                                    <select name="kondisi" class="form-control" id="kondisi">
                                        <?php foreach ($aset as $index => $brg) : ?>
                                            <option value="<?= $brg['id']; ?>"><?= $brg['kondisi']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kerusakan</label>
                                    <input type="text" class="form-control" id="kerusakan" placeholder="Masukkan Kode Barang" name="kerusakan">
                                    <div class="form-text text-danger"><?= form_error('kerusakan'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Service</label>
                                    <input type="text" class="form-control" id="jenis_service" placeholder="Masukkan Kode Barang" name="jenis_service">
                                    <div class="form-text text-danger"><?= form_error('jenis_service'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Biaya</label>
                                    <input type="text" class="form-control" id="biaya" placeholder="Masukkan Kode Barang" name="biaya">
                                    <div class="form-text text-danger"><?= form_error('biaya'); ?></div>
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