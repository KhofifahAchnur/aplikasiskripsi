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
                            <h3 class="card-title">Tambah Data Pengajuan Aset Baru</h3>
                        </div>
                        <!-- form start -->
                        <form action="" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" id="aset" placeholder="Masukkan Nama Aset" name="aset">
                                    <div class="form-text text-danger"><?= form_error('aset'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <input type="text" class="form-control" id="des" placeholder="Masukkan Deskripsi Aset" name="des">
                                    <div class="form-text text-danger"><?= form_error('des'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <select name="lokasi" class="form-control select2" style="width: 100%;">
                                        <option value="" selected>--Silahkan Pilih Lokasi--</option>
                                        <?php foreach ($lokasi as $index => $lk) : ?>
                                            <option value="<?= $lk['id']; ?>"><?= $lk['lokasi']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="form-text text-danger"><?= form_error('lokasi'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Penanggung Jawab</label>
                                    <select name="nama" class="form-control select2" style="width: 100%;">
                                    <option value="" selected>--Silahkan Pilih Penanggung Jawab--</option>
                                        <?php foreach ($penanggung_jawab as $index => $pj) : ?>
                                            <option value="<?= $pj['id']; ?>"><?= $pj['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="form-text text-danger"><?= form_error('nama'); ?></div>
                                </div>
                                
                                <!-- <div class="form-group">
                                    <label>Jenis Pengajuan</label>
                                    <select name="jenis" class="form-control" id="jenis">
                                        <option>- Pilih Jenis Pengajuan -</option>
                                        <option value="Pemeliharaan"> Pemeliharaan </option>
                                        <option value="Aset Baru"> Aset Baru </option>
                                    </select>
                                </div> -->
                                <!-- <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" id="status">
                                        <option>- Pilih Status -</option>
                                        <option value="Diproses"> Diproses </option>
                                        <!-- <option value="Disetujui"> Disetujui </option>
                                        <option value="Tersedia"> Tersedia </option> -->
                                <!-- </select> -->
                                <!-- </div> -->
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