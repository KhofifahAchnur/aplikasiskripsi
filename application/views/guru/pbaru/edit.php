<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pengajuan Aset Baru</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="<?= base_url('guru/pbaru/index') ?>" button type="button" class="btn waves-effect waves-light btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
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
                            <h3 class="card-title"> Pengajuan Aset Baru</h3>
                        </div>
                        <!-- form start -->
                        <!-- <form action="" method="post"> -->
                        <form action="" method="post" enctype="multipart/form-data">
                            <!-- <?php echo form_open_multipart(); ?>
                            <input type="hidden" name="suratlama" value="<?= $pbaru['surat']; ?>"> -->
                            <!-- <input type="hidden" name="id" value="<?= $pbaru['id']; ?>"> -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Aset</label>
                                    <input type="text" class="form-control" id="aset" placeholder="Masukkan Nama Aset" name="aset" value="<?= $pbaru['aset']; ?>">
                                    <div class="form-text text-danger"><?= form_error('aset'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <input type="text" class="form-control" id="des" placeholder="Masukkan Deskripsi" name="des" value="<?= $pbaru['des']; ?>">
                                    <div class="form-text text-danger"><?= form_error('des'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <select name="lokasi" class="form-control" id="lokasi">
                                        <?php foreach ($lokasi as $index => $lk) : ?>
                                            <option <?= ($pbaru['lokasi_id'] == $lk['id']) ? 'selected' : ''; ?> value="<?= $lk['id']; ?>"><?= $lk['lokasi']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Penanggung Jawab</label>
                                    <select name="nama" class="form-control" id="nama">
                                        <?php foreach ($penanggung_jawab as $index => $pj) : ?>
                                            <option <?= ($pbaru['penanggung_jawab_id'] == $pj['id']) ? 'selected' : ''; ?> value="<?= $pj['id']; ?>"><?= $pj['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <input hidden type="text" class="form-control" id="status" name="status" value="<?= $pbaru['status'] ?>">
                                    <input readonly type="text" class="form-control" id="" name="" value="<?= $pbaru['status'] ?>">
                                    <div class="form-text text-danger"><?= form_error('status'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Surat</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="surat" class="custom-file-input" id="exampleInputFile" >
                                            <label class="custom-file-label" for="exampleInputFile"><?= $pbaru['surat'] ?> </label>
                                        </div>
                                    </div>
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