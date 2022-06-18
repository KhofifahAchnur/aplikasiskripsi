<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pengajuan Pemeliharaan Aset Peralatan & Mesin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Pengajuan Pemeliharaan Aset Peralatan & Mesin</li>
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
                    <div class="card">
                        <div class="card-header">
                        <a href="<?= base_url('admin/pengajuan/laporan') ?>" button type="button" class="btn waves-effect waves-light btn-primary" style="float:left"><i class="fas fas fa-print"></i>&nbsp;&nbsp;</a>
                            <a href="<?= base_url('admin/pengajuan/tambah') ?>" button type="button" class="btn waves-effect waves-light btn-primary" style="float:right"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Aset</th>
                                        <th>Deskripsi</th>
                                        <th>Lokasi</th>
                                        <th>Penanggung Jawab</th>
                                        <th>Jenis Pengajuan</th>
                                        <th>Status</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th class="text-center">Aksi</th>
                                </thead>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($pengajuan as $brg) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $brg['aset'] ?></td>
                                            <td><?= $brg['des'] ?></td>
                                            <td><?= $brg['lokasi'] ?></td>
                                            <td><?= $brg['nama'] ?></td>
                                            <td><?= $brg['jenis'] ?></td>
                                            <td><?= $brg['status'] ?></td>
                                            <td><?= $brg['tanggal'] ?></td>
                                            <td style="width: 100px;" class="text-center">
                                                <a href="<?= base_url(); ?>admin/pengajuan/edit/<?= $brg['id']; ?>" class="btn-success  btn-sm" title="edit"><i class="fas fa-fw fa-edit"></i></a> |
                                                <a href="<?= base_url(); ?>admin/pengajuan/hapus/<?= $brg['id']; ?>" class="btn-danger  btn-sm" title="hapus" onclick="return confirm('Yakin ingin menghapus data?');"><i class="fas fa-trash-alt"></i></a>
                                                <a href="<?= base_url(); ?>admin/konfirmasi/tambah/<?= $brg['id']; ?>" class="badge badge-pill badge-primary">UBAH KONFIRMASI</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                
                            </table>
                        </div>
                        <!-- /.card-body -->
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