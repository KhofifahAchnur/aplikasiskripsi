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
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Pemeliharaan Aset Gedung & Bangunan</li>
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
                            <!-- <h3 class="card-title">
                                Daftar Data Pemeliharaan Aset Gedung & Bangunan
                            </h3> -->
                            <a href="<?= base_url('admin/pemeliharaan/filter') ?>" button type="button" class="btn waves-effect waves-light btn-success" style="float:left"><i class="fas fas fa-print"></i>&nbsp;&nbsp;</a>
                            <a href="<?= base_url('admin/pemeliharaan/tambah') ?>" button type="button" class="btn waves-effect waves-light btn-success" style="float:right"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a>
                        </div>
                        <!-- /.card-header -->
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
                                        <th>Tanggal Pemeliharaan</th>
                                        <th>Tanggal Selesai </th>
                                        <th>Biaya</th>
                                        <th class="text-center">Aksi</th>
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
                                            <td><?= $pln['tgl_pemeliharaan'] ?></td>
                                            <td><?= $pln['tgl_selesai'] ?></td>
                                            <td><?= "Rp." . number_format($pln['biaya'], 2, ",", "."); ?></td>
                                            <td style="width: 100px;" class="text-center">
                                                <a href="<?= base_url(); ?>admin/pemeliharaan/edit/<?= $pln['id_pemeliharaan']; ?>" class="btn-secondary  btn-sm" title="edit"><i class="fas fa-fw fa-edit"></i></a> |
                                                <a href="<?= base_url(); ?>admin/pemeliharaan/hapus/<?= $pln['id_pemeliharaan']; ?>" class="btn-info  btn-sm" title="hapus" onclick="return confirm('Yakin ingin menghapus data?');"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="9" class="text-center">Total Kas Masuk</th>
                                        <th colspan="1"><?= "Rp." . number_format($jumlah_kasmasuk, 2, ",", "."); ?></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
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