<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Konfirmasi Aset</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="<?= base_url('guru/pengajuan/index') ?>" button type="button" class="btn waves-effect waves-light btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a> ||
                        <!-- <a href="<?= base_url('guru/konfirmasi/laporan') ?>" button type="button" class="btn waves-effect waves-light btn-primary" style="float:left"><i class="fas fas fa-print"></i>&nbsp;&nbsp;</a> -->
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
                            <h3 class="card-title">History Konfirmasi Aset</h3>
                        </div>
                        <!-- <a href="<?= base_url(); ?>guru/konfir/laporan/<?= $kfr['id_konfir']; ?>" class="btn-danger  btn-sm" title="print"><i class="fas fa-print"></i></a> -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Aset</th>
                                        <th>Deskripsi</th>
                                        <th>Jenis Pengajuan</th>
                                        <!-- <th>Lokasi</th>
                                        <th>Penanggung Jawab</th> -->
                                        <th>Status</th>
                                        <th>Tanggal Konfirmasi</th>
                                </thead>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($konfir as $kfr) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $kfr['aset'] ?></td>
                                            <td><?= $kfr['des'] ?></td>
                                            <!-- <td><?= $kfr['lokasi'] ?></td>
                                            <td><?= $kfr['nama'] ?></td> -->
                                            <td><?= $kfr['jenis'] ?></td>
                                            <td><?= $kfr['status'] ?></td>
                                            <td><?= $kfr['tgl_konfir'] ?></td>
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