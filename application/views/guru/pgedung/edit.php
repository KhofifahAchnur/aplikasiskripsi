<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pengajuan Pemeliharaan Aset Gedung & Mesin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="<?= base_url('guru/pengajuan/index') ?>" button type="button" class="btn waves-effect waves-light btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
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
                            <h3 class="card-title">Edit Pengajuan Pemeliharaan Aset Gedung & Mesin</h3>
                        </div>
                        <!-- form start -->
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $pgedung['id']; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Aset</label>
                                    <input type="text" class="form-control" id="aset" placeholder="Masukkan Nama Aset" name="aset" value="<?= $pgedung['aset']; ?>">
                                    <div class="form-text text-danger"><?= form_error('aset'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <input type="text" class="form-control" id="des" placeholder="Masukkan Deskripsi" name="des" value="<?= $pgedung['des']; ?>">
                                    <div class="form-text text-danger"><?= form_error('des'); ?></div>
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
                                <!-- <div class="form-group">
                                    <label>Lokasi</label>
                                    <select name="lokasi" class="form-control" id="lokasi">
                                        <?php foreach ($lokasi as $index => $lk) : ?>
                                            <option <?= ($pgedung['lokasi_id'] == $lk['id']) ? 'selected' : ''; ?> value="<?= $lk['id']; ?>"><?= $lk['lokasi']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div> -->
                                <div class="form-group">
                                    <label>Penanggung Jawab</label>
                                    <select name="nama" class="form-control" id="nama">
                                        <?php foreach ($penanggung_jawab as $index => $pj) : ?>
                                            <option <?= ($pgedung['penanggung_jawab_id'] == $pj['id']) ? 'selected' : ''; ?> value="<?= $pj['id']; ?>"><?= $pj['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="<?= $pgedung['status']; ?>"><?= $pgedung['status']; ?></option>
                                        <option value="Diproses"> Diproses </option>
                                        <option value="Disetujui"> Disetujui </option>
                                        <option value="Tersedia"> Tersedia </option>
                                    </select>
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