<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kondisi Aset Peralatan & Mesin</h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <a href="<?= base_url('sapras/masteraset/index') ?>" button type="button" class="btn waves-effect waves-light btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a> ||
                <!-- <a href="<?= base_url('sapras/kondisi/laporan') ?>" button type="button" class="btn waves-effect waves-light btn-info" style="float:left"><i class="fas fas fa-print"></i>&nbsp;&nbsp;</a>  -->
                </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-lg-12">
                        <!-- /.card-header -->
                        <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title"> Data History Kondisi Aset Peralatan & Mesin</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Kode Barang</th>
                                        <th>Register</th>
                                        <!-- <th>Lokasi</th> -->
                                        <th>Kondisi</th>
                                        <th>Tanggal Masuk</th>
                                </thead>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($kondisi as $kds) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $kds['nama_barang'] ?></td>
                                            <td><?= $kds['kode_barang'] ?></td>
                                            <td><?= $kds['register'] ?></td>
                                            <!-- <td><?= $kds['lokasi'] ?></td> -->
                                            <td><?= $kds['kondisi'] ?></td>
                                            <td><?= $kds['tanggal'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>