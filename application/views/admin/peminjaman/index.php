<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Peminjaman Aset Peralatan & Mesin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Peminjaman Aset Peralatan & Mesin</li>
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
                                Daftar Data Peminjaman Aset Peralatan & Mesin
                            </h3> -->
                            <a href="<?= base_url('admin/peminjaman/laporan') ?>" button type="button" class="btn waves-effect waves-light btn-primary" style="float:left"><i class="fas fas fa-print"></i>&nbsp;&nbsp;</a>
                            <a href="<?= base_url('admin/peminjaman/tambah') ?>" button type="button" class="btn waves-effect waves-light btn-primary" style="float:right"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Kode Barang</th>
                                        <th>Register</th>
                                        <th>Lokasi</th>
                                        <th>Keperluan</th>
                                        <th>Penanggung Jawab</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Tanggal Kembali </th>
                                        <th class="text-center">Aksi</th>
                                </thead>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($pinjam as $pjm) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $pjm['nama_barang'] ?></td>
                                            <td><?= $pjm['kode_barang'] ?></td>
                                            <td><?= $pjm['register'] ?></td>
                                            <td><?= $pjm['lokasi'] ?></td>
                                            <td><?= $pjm['keperluan'] ?></td>
                                            <td><?= $pjm['nama'] ?></td>
                                            <td><?= $pjm['tgl_pinjam'] ?></td>
                                            <td><?= $pjm['tgl_kembali'] ?></td>
                                            <td style="width: 100px;" class="text-center">
                                                <a href="<?= base_url(); ?>admin/peminjaman/edit/<?= $pjm['id_pinjam']; ?>" class="btn-success  btn-sm" title="edit"><i class="fas fa-fw fa-edit"></i></a> |
                                                <a href="<?= base_url(); ?>admin/peminjaman/hapus/<?= $pjm['id_pinjam']; ?>" class="btn-danger  btn-sm" title="hapus" onclick="return confirm('Yakin ingin menghapus data?');"><i class="fas fa-trash-alt"></i></a>
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