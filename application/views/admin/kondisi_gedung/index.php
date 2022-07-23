<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Kondisi Aset Gedung & Bangunan</h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <a href="<?= base_url('admin/gedung/index') ?>" button type="button" class="btn waves-effect waves-light btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a> ||
                <a href="<?= base_url('admin/kondisi_gedung/filter') ?>" button type="button" class="btn waves-effect waves-light btn-primary" style="float:left"><i class="fas fas fa-print"></i>&nbsp;&nbsp;</a> 
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
                            <h3 class="card-title">Data Kondisi Aset Gedung & Bangunan</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Gedung</th>
                                        <th>Kode Gedung</th>
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