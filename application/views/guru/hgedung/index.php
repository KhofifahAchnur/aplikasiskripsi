<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data History Aset Gedung & Bangunan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="<?= base_url('guru/gedung/index') ?>" button type="button" class="btn waves-effect waves-light btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a> |
                        <!-- <a href="<?= base_url('guru/hgedung/laporan/') . $gedung['id_gedung'] ?>" class="btn waves-effect waves-light btn-info" style="float:left"><i class="fas fas fa-print"></i>&nbsp;&nbsp;</a> -->
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 ml-12 mr-12">
                    <!-- /.card-header -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Identitas Gedung</h3>
                        </div>
                        <!-- form start -->
                        <form action="" method="post">
                            <!-- <input type="hidden" name="id" value="<?= $barang['id']; ?>"> -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Gedung</label>
                                    <input readonly type="text" class="form-control" id="nama_gedung" placeholder="Masukkan Kode gedung" name="nama_gedung" value="<?= $gedung['nama_gedung']; ?>">
                                    <div class="form-text text-danger"><?= form_error('nama_gedung'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Kode Gedung</label>
                                    <input readonly type="text" class="form-control" id="kode_gedung" placeholder="Masukkan Kode gedung" name="kode_gedung" value="<?= $gedung['kode_gedung']; ?>">
                                    <div class="form-text text-danger"><?= form_error('kode_gedung'); ?></div>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Register</label>
                                    <input readonly type="text" class="form-control" id="register" placeholder="Masukkan Kode Barang" name="register" value="<?= $gedung['register']; ?>">
                                    <div class="form-text text-danger"><?= form_error('register'); ?></div>
                                </div> -->
                                <div class="form-group">
                                    <label>Bertingkat</label>
                                    <input readonly type="text" class="form-control" id="tingkat" placeholder="Masukkan Kode gedung" name="tingkat" value="<?= $gedung['tingkat']; ?>">
                                    <div class="form-text text-danger"><?= form_error('tingkat'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Beton</label>
                                    <input readonly type="text" class="form-control" id="beton" placeholder="Masukkan Kode gedung" name="beton" value="<?= $gedung['beton']; ?>">
                                    <div class="form-text text-danger"><?= form_error('beton'); ?></div>
                                </div>
                                <div class="text-center">

                                    <!-- <a href="<?= base_url('guru/perpindahan/tambah/') . $kgedung['id_gedung'] ?>" button type="button" class="btn btn-info"></button> &nbsp;&nbsp;Perpindahan</a> -->
                                    <a href="<?= base_url('guru/pemeliharaan/tambah/') . $gedung['id_gedung'] ?>" button type="button" class="btn btn-secondary"></button> &nbsp;&nbsp;Pemeliharaan</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- /.card -->

        <!-- <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Perpindahan Barang</h3>
            </div> -->

        <!-- /.card-header -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">History Pemeliharaan</h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Gedung</th>
                            <th>Kode Gedung</th>
                            <th>Register</th>
                            <th>Lokasi</th>
                            <th>Penanggung Jawab</th>
                            <th>Jenis Pemeliharaan</th>
                            <th>Biaya</th>
                            <th>Tanggal Pemeliharaan</th>
                            <th>Tanggal Selesai </th>
                    </thead>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($pemeliharaan as $pln) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $pln['nama_gedung'] ?></td>
                                <td><?= $pln['kode_gedung'] ?></td>
                                <td><?= $pln['register'] ?></td>
                                <td><?= $pln['lokasi'] ?></td>
                                <td><?= $pln['nama'] ?></td>
                                <td><?= $pln['jenis'] ?></td>
                                <td><?= $pln['biaya'] ?></td>
                                <td><?= $pln['tgl_pemeliharaan'] ?></td>
                                <td><?= $pln['tgl_selesai'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">History Kondisi</h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kode</th>
                            <th>Bertingkat</th>
                            <th>Beton</th>
                            <th>Luas</th>
                            <th>Kondisi</th>
                            <th>Tanggal Masuk</th>
                    </thead>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($kondisi_gedung as $kdg) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $kdg['nama_gedung'] ?></td>
                                <td><?= $kdg['kode_gedung'] ?></td>
                                <td><?= $kdg['tingkat'] ?></td>
                                <td><?= $kdg['beton'] ?></td>
                                <td><?= $kdg['luas'] ?></td>
                                <td><?= $kdg['kondisi'] ?></td>
                                <td><?= $kdg['tanggal'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>


</div>
<!-- /.card -->

</div>
<!-- /.col -->
</section>
</div>