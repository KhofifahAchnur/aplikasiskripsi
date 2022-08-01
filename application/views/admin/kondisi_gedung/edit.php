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
                        <a href="<?= base_url('admin/pbaru/index') ?>" button type="button" class="btn waves-effect waves-light btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
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
                            <h3 class="card-title">Edit Data Pemeliharaan Aset Peralatan & Mesin</h3>
                        </div>
                        <!-- form start -->
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $kondisi_gedung['id_gedung']; ?>">
                            <div class="card-body">
                            <div class="form-group">
                                    <label>Nama Gedung</label>
                                    <input hidden type="text" class="form-control" id="id_gedung" name="id_gedung" value="<?= $kondisi_gedung['id_gedung'] ?>">
                                    <input hidden type="text" class="form-control" id="nama_gedung" name="nama_gedung" value="<?= $kondisi_gedung['id_gedung'] ?>">
                                    <input readonly type="text" class="form-control" id="" name="" value="<?= $kondisi_gedung['nama_gedung'] ?>">
                                    <div class="form-text text-danger"><?= form_error('nama_gedung'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Kode gedung</label>
                                    <input readonly type="text" class="form-control" id="kode_gedung" name="kode_gedung" value="<?= $kondisi_gedung['kode_gedung'] ?>">
                                    <div class="form-text text-danger"><?= form_error('kode_gedung'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Register</label>
                                    <input readonly type="text" class="form-control" id="register" name="register" value="<?= $kondisi_gedung['register'] ?>">
                                    <div class="form-text text-danger"><?= form_error('register'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Bertingkat</label>
                                    <input readonly type="text" class="form-control" id="tingkat" name="tingkat" value="<?= $kondisi_gedung['tingkat'] ?>">
                                    <div class="form-text text-danger"><?= form_error('tingkat'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Beton</label>
                                    <input readonly type="text" class="form-control" id="beton" name="beton" value="<?= $kondisi_gedung['beton'] ?>">
                                    <div class="form-text text-danger"><?= form_error('beton'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Luas</label>
                                    <input readonly type="text" class="form-control" id="luas" name="luas" value="<?= $kondisi_gedung['luas'] ?>">
                                    <div class="form-text text-danger"><?= form_error('luas'); ?></div>
                                </div>
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