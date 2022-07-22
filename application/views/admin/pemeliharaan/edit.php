<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pemeliharaan Aset Gedung & Bangunan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="<?= base_url('admin/pemeliharaan/index') ?>" button type="button" class="btn waves-effect waves-light btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
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
                            <h3 class="card-title">Edit Data Pemeliharaan Aset Gedung & Bangunan</h3>
                        </div>
                        <!-- form start -->
                        <form action="" method = "post">
                        <input type="hidden" name="id" value="<?= $pemeliharaan['id_pemeliharaan']; ?>">
                            <div class="card-body">
                            <div class="form-group">
                                    <label>Nama Gedung</label>
                                    <input hidden type="text" class="form-control" id="nama_gedung" name="nama_gedung" value="<?= $gedung['id_gedung'] ?>">
                                    <input readonly type="text" class="form-control" id="" name="" value="<?= $gedung['nama_gedung'] ?>">
                                    <div class="form-text text-danger"><?= form_error('nama_gedung'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Kode Gedung</label>
                                    <input readonly type="text" class="form-control" id="kode_gedung" name="kode_gedung" value="<?= $gedung['kode_gedung'] ?>">
                                    <div class="form-text text-danger"><?= form_error('kode_gedung'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Register</label>
                                    <input readonly type="text" class="form-control" id="register" name="register" value="<?= $gedung['register'] ?>">
                                    <div class="form-text text-danger"><?= form_error('register'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Penanggung Jawab</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan Kode Barang" name="nama" value="<?= $pemeliharaan['nama']; ?>">
                                    <div class="form-text text-danger"><?= form_error('nama'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Pemeliharaan</label>
                                    <input type="text" class="form-control" id="jenis" placeholder="Masukkan Kode Barang" name="jenis" value="<?= $pemeliharaan['jenis']; ?>">
                                    <div class="form-text text-danger"><?= form_error('jenis'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Biaya</label>
                                    <input type="text" class="form-control" id="biaya" placeholder="Masukkan Kode Barang" name="biaya" value="<?= $pemeliharaan['biaya']; ?>">
                                    <div class="form-text text-danger"><?= form_error('biaya'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pemeliharaan</label>
                                    <input type="date" class="form-control" id="tgl_pemeliharaan" placeholder="Masukkan Kode Barang" name="tgl_pemeliharaan" value="<?= $pemeliharaan['tgl_pemeliharaan']; ?>">
                                    <div class="form-text text-danger"><?= form_error('tgl_pemeliharaan'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Selesai</label>
                                    <input type="date" class="form-control" id="tgl_selesai" placeholder="Masukkan Kode Barang" name="tgl_selesai" value="<?= $pemeliharaan['tgl_selesai']; ?>">
                                    <div class="form-text text-danger"><?= form_error('tgl_selesai'); ?></div>
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