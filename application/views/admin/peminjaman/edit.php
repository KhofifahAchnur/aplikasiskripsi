<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Peminjaman Aset Peralatan & Mesin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="<?= base_url('admin/peminjaman/index') ?>" button type="button" class="btn waves-effect waves-light btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
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
                    <?php if ($this->session->flashdata('flash')) : ?>
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            Data <strong> Berhasil </strong><?= $this->session->flashdata('flash'); ?>.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span arial-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <!-- /.card-header -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data Peminjaman Aset Peralatan & Mesin</h3>
                        </div>
                        <!-- form start -->
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $pinjam['id_pinjam']; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input hidden type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $aset['id'] ?>">
                                    <input readonly type="text" class="form-control" id="" name="" value="<?= $aset['nama_barang'] ?>">
                                    <div class="form-text text-danger"><?= form_error('nama_barang'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Kode Barang</label>
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
                                <!-- <div class="form-group">
                                    <label>Lokasi</label>
                                    <select name="lokasi" class="form-control" id="lokasi">
                                        <?php foreach ($lokasi as $index => $lk) : ?>
                                            <option value="<?= $lk['id']; ?>"><?= $lk['lokasi']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div> -->
                                <!-- <div class="form-group">
                                    <label>Penanggung Jawab</label>
                                    <select name="nama" class="form-control" id="nama">
                                        <?php foreach ($penanggung_jawab as $index => $pj) : ?>
                                            <option value="<?= $pj['id']; ?>"><?= $pj['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div> -->
                                <div class="form-group">
                                    <label>Keperluan</label>
                                    <input type="text" class="form-control" id="keperluan" placeholder="Masukkan Keperluan" name="keperluan" value="<?= $pinjam['keperluan']; ?>">
                                    <div class="form-text text-danger"><?= form_error('keperluan'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Peminjaman</label>
                                    <input type="date" class="form-control" id="tgl_pinjam" placeholder="Masukkan Tanggal Pinjam" name="tgl_pinjam" value="<?= $pinjam['tgl_pinjam']; ?>">
                                    <div class="form-text text-danger"><?= form_error('tgl_pinjam'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Kembali</label>
                                    <input type="date" class="form-control" id="tgl_kembali" placeholder="Masukkan Tanggal Kembali " name="tgl_kembali" value="<?= $pinjam['tgl_kembali']; ?>">
                                    <div class="form-text text-danger"><?= form_error('tgl_kembali'); ?></div>
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