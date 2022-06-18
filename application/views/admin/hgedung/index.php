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
                <div class="col-12 ml-12 mr-12">
                    <!-- /.card-header -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Identitas Barang</h3>
                        </div>
                        <!-- form start -->
                        <form action="" method="post">
                            <!-- <input type="hidden" name="id" value="<?= $barang['id']; ?>"> -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input readonly type="text" class="form-control" id="nama_gedung" placeholder="Masukkan Kode gedung" name="nama_gedung" value="<?= $kgedung['nama_gedung']; ?>">
                                    <div class="form-text text-danger"><?= form_error('nama_gedung'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Kode Barang</label>
                                    <input readonly type="text" class="form-control" id="kode_gedung" placeholder="Masukkan Kode gedung" name="kode_gedung" value="<?= $kgedung['kode_gedung']; ?>">
                                    <div class="form-text text-danger"><?= form_error('kode_gedung'); ?></div>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Register</label>
                                    <input readonly type="text" class="form-control" id="register" placeholder="Masukkan Kode Barang" name="register" value="<?= $kgedung['register']; ?>">
                                    <div class="form-text text-danger"><?= form_error('register'); ?></div>
                                </div> -->
                                <div class="form-group">
                                    <label>Bertingkat</label>
                                    <input readonly type="text" class="form-control" id="tingkat" placeholder="Masukkan Kode gedung" name="tingkat" value="<?= $kgedung['tingkat']; ?>">
                                    <div class="form-text text-danger"><?= form_error('tingkat'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Beton</label>
                                    <input readonly type="text" class="form-control" id="beton" placeholder="Masukkan Kode gedung" name="beton" value="<?= $kgedung['beton']; ?>">
                                    <div class="form-text text-danger"><?= form_error('beton'); ?></div>
                                </div>
                                <div class="text-center">

                                    <!-- <a href="<?= base_url('admin/perpindahan/tambah/') . $kgedung['id_gedung'] ?>" button type="button" class="btn btn-primary"></button> &nbsp;&nbsp;Perpindahan</a> -->
                                    <a href="<?= base_url('admin/pemeliharaan/tambah/') . $kgedung['id_gedung'] ?>" button type="button" class="btn btn-primary"></button> &nbsp;&nbsp;Pemeliharaan</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- /.card -->

        <!-- <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Perpindahan Barang</h3>
            </div> -->

        <!-- /.card-header -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">History Pemeliharaan</h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Kode Barang</th>
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

        <div class="card card-primary">
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