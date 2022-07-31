<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Kondisi Aset Buku / Kepustakaan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="<?= base_url('admin/buku/index') ?>" button type="button" class="btn waves-effect waves-light btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
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
                            <h3 class="card-title">Ubah Data Kondisi Aset Buku / Kepustakaan</h3>
                        </div>
                        <!-- form start -->
                        <form action="" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input hidden type="text" class="form-control" id="nama_buku" name="nama_buku" value="<?= $kondisi_buku['id_buku'] ?>">
                                    <input readonly type="text" class="form-control" id="" name="" value="<?= $kondisi_buku['nama_buku'] ?>">
                                    <div class="form-text text-danger"><?= form_error('nama_buku'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Kode buku</label>
                                    <input readonly type="text" class="form-control" id="kode_buku" name="kode_buku" value="<?= $kondisi_buku['kode_buku'] ?>">
                                    <div class="form-text text-danger"><?= form_error('kode_buku'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Register</label>
                                    <input readonly type="text" class="form-control" id="register" name="register" value="<?= $kondisi_buku['register'] ?>">
                                    <div class="form-text text-danger"><?= form_error('register'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input readonly type="text" class="form-control" id="judul" name="judul" value="<?= $kondisi_buku['judul'] ?>">
                                    <div class="form-text text-danger"><?= form_error('judul'); ?></div>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Bertingkat</label>
                                    <select name="tingkat" class="form-control" id="tingkat">
                                        <option>- Pilih Konstruksi -</option>
                                        <option value="Bertingkat"> Bertingkat </option>
                                        <option value="Tidak Bertingkat"> Tidak Bertingkat </option>
                                    </select>
                                </div> -->
                                <!-- <div class="form-group">
                                    <label>Register</label>
                                    <input readonly type="text" class="form-control" id="register" name="register" value="<?= $kondisi_gedung['register'] ?>">
                                    <div class="form-text text-danger"><?= form_error('register'); ?></div>
                                </div> -->
                                <!-- <div class="form-group">
                                    <label>Lokasi</label>
                                    <input readonly type="text" class="form-control" id="perpindahan_id" name="perpindahan_id" value="<?= $kondisi_gedung['perpindahan_id'] ?>">
                                    <div class="form-text text-danger"><?= form_error('register'); ?></div>
                                </div> -->

                                <!-- <div class="form-group">
                                    <label>Kondisi</label>
                                    <select name="kondisi" class="form-control" id="kondisi">
                                        <option value="<?= $kondisi_buku['kondisi']; ?>"><?= $kondisi_buku['kondisi']; ?></option>
                                        <option value="Baik"> Baik </option>
                                        <option value="Kurang Baik"> Kurang Baik </option>
                                        <option value="Rusak Berat"> Rusak Berat </option>
                                    </select>
                                    <div class="form-text text-danger"><?= form_error('kondisi'); ?></div>
                                </div> -->
                                <div class="form-group">
                                    <label>Kondisi</label>
                                    <select name="kondisi" class="form-control">
                                        <option value="">- Pilih Kondisi -</option>
                                        <option value="Baik">Baik </option>
                                        <option value="Kurang Baik"> Kurang Baik</option>
                                        <option value="Rusak Berat"> Rusak Berat </option>
                                    </select>
                                    <div class="form-text text-danger"><?= form_error('kondisi'); ?></div>
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