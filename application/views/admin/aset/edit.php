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
                            <input type="hidden" name="id" value="<?= $barang['id']; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" id="nama_barang" placeholder="Masukkan Kode Barang" name="nama_barang" value="<?= $barang['nama_barang']; ?>">
                                    <div class="form-text text-danger"><?= form_error('nama_barang'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Kode Barang</label>
                                    <input type="text" class="form-control" id="kode_barang" placeholder="Masukkan Kode Barang" name="kode_barang" value="<?= $barang['kode_barang']; ?>">
                                    <div class="form-text text-danger"><?= form_error('kode_barang'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Register</label>
                                    <input type="text" class="form-control" id="register" placeholder="Masukkan Kode Barang" name="register" value="<?= $barang['register']; ?>">
                                    <div class="form-text text-danger"><?= form_error('register'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Merk</label>
                                    <input type="text" class="form-control" id="merk" placeholder="Masukkan Kode Barang" name="merk" value="<?= $barang['merk']; ?>">
                                    <div class="form-text text-danger"><?= form_error('merk'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Ukuran</label>
                                    <input type="text" class="form-control" id="ukuran" placeholder="Masukkan Kode Barang" name="ukuran" value="<?= $barang['ukuran']; ?>">
                                    <div class="form-text text-danger"><?= form_error('ukuran'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Bahan</label>
                                    <input type="text" class="form-control" id="bahan" placeholder="Masukkan Kode Barang" name="bahan" value="<?= $barang['bahan']; ?>">
                                    <div class="form-text text-danger"><?= form_error('bahan'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Tahun Peroleh</label>
                                    <input type="text" class="form-control" id="tahun" placeholder="Masukkan Kode Barang" name="tahun" value="<?= $barang['tahun']; ?>">
                                    <div class="form-text text-danger"><?= form_error('tahun'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Kondisi</label>
                                    <select name="kondisi" class="form-control" id="kondisi">
                                        <option value="<?= $barang['kondisi']; ?>"><?= $barang['kondisi']; ?></option>
                                        <option value="Baik"> Baik </option>
                                        <option value="Kurang Baik"> Kurang Baik </option>
                                        <option value="Rusak Berat"> Rusak Berat </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Asal-Usul</label>
                                    <input type="text" class="form-control" id="asal_usul" placeholder="Masukkan Kode Barang" name="asal_usul" value="<?= $barang['asal_usul']; ?>">
                                    <div class="form-text text-danger"><?= form_error('asal_usul'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Harga Barang</label>
                                    <input type="text" class="form-control" id="harga_brg" placeholder="Masukkan Kode Barang" name="harga_brg" value="<?= $barang['harga_brg']; ?>">
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