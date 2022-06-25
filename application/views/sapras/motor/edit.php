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
                        <a href="<?= base_url('admin/aset/index') ?>" button type="button" class="btn waves-effect waves-light btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
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
                            <h3 class="card-title">Edit Data Barang</h3>
                        </div>
                        <!-- form start -->
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $motor['id']; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama motor</label>
                                    <input type="text" class="form-control" id="nama_barang" placeholder="Masukkan Kode motor" name="nama_barang" value="<?= $motor['nama_barang']; ?>">
                                    <div class="form-text text-danger"><?= form_error('nama_barang'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Kode motor</label>
                                    <input type="text" class="form-control" id="kode_barang" placeholder="Masukkan Kode barang" name="kode_barang" value="<?= $motor['kode_barang']; ?>">
                                    <div class="form-text text-danger"><?= form_error('kode_barang'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Register</label>
                                    <input type="text" class="form-control" id="register" placeholder="Masukkan Kode motor" name="register" value="<?= $motor['register']; ?>">
                                    <div class="form-text text-danger"><?= form_error('register'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Merk</label>
                                    <input type="text" class="form-control" id="merk" placeholder="Masukkan Kode motor" name="merk" value="<?= $motor['merk']; ?>">
                                    <div class="form-text text-danger"><?= form_error('merk'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Ukuran</label>
                                    <input type="text" class="form-control" id="ukuran" placeholder="Masukkan Kode motor" name="ukuran" value="<?= $motor['ukuran']; ?>">
                                    <div class="form-text text-danger"><?= form_error('ukuran'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Bahan</label>
                                    <input type="text" class="form-control" id="bahan" placeholder="Masukkan Kode motor" name="bahan" value="<?= $motor['bahan']; ?>">
                                    <div class="form-text text-danger"><?= form_error('bahan'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Tahun Peroleh</label>
                                    <input type="text" class="form-control" id="tahun" placeholder="Masukkan Kode motor" name="tahun" value="<?= $motor['tahun']; ?>">
                                    <div class="form-text text-danger"><?= form_error('tahun'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Kondisi</label>
                                    <select name="kondisi" class="form-control" id="kondisi">
                                        <option value="<?= $motor['kondisi']; ?>"><?= $motor['kondisi']; ?></option>
                                        <option value="Baik"> Baik </option>
                                        <option value="Kurang Baik"> Kurang Baik </option>
                                        <option value="Rusak Berat"> Rusak Berat </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Asal-Usul</label>
                                    <input type="text" class="form-control" id="asal_usul" placeholder="Masukkan Kode motor" name="asal_usul" value="<?= $motor['asal_usul']; ?>">
                                    <div class="form-text text-danger"><?= form_error('asal_usul'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Harga motor</label>
                                    <input type="text" class="form-control" id="harga_brg" placeholder="Masukkan Kode motor" name="harga_brg" value="<?= $motor['harga_brg']; ?>">
                                    <div class="form-text text-danger"><?= form_error('harga_brg'); ?></div>
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