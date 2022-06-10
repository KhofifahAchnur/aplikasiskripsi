<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Gedung & Bangunan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Gedung & Bangunan</li>
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
                            <h3 class="card-title">
                                Daftar Data Gedung & Bangunan
                            </h3>
                            <!-- <a href="<?= base_url('admin/gedung/tambah') ?>" button type="button" class="btn waves-effect waves-light btn-primary" style="float:right"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Kode</th>
                                        <th>Register</th>
                                        <th>Bertingkat</th>
                                        <th>Beton</th>
                                        <th>Luas</th>
                                        <th>Lokasi</th>
                                        <th>Tahun Peroleh</th>
                                        <th>Kondisi</th>
                                        <th>Status</th>
                                        <th>Asal-Usul</th>
                                        <th>Harga Barang</th>
                                        <!-- <th class="text-center">Aksi</th>
                                </thead> -->
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($gedung as $gdg) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $gdg['nama_gedung'] ?></td>
                                            <td><?= $gdg['kode_gedung'] ?></td>
                                            <td><?= $gdg['register'] ?></td>
                                            <td><?= $gdg['tingkat'] ?></td>
                                            <td><?= $gdg['beton'] ?></td>
                                            <td><?= $gdg['luas'] ?></td>
                                            <td><?= $gdg['lokasi'] ?></td>
                                            <td><?= $gdg['tahun'] ?></td>
                                            <td><?= $gdg['kondisi'] ?></td>
                                            <td><?= $gdg['status'] ?></td>
                                            <td><?= $gdg['asal_usul'] ?></td>
                                            <td><?= $gdg['harga'] ?></td>
                                            <!-- <td style="width: 100px;" class="text-center">
                                                <a href="<?= base_url(); ?>admin/gedung/edit/<?= $gdg['id_gedung']; ?>" class="btn-success  btn-sm" title="edit"><i class="fas fa-fw fa-edit"></i></a> |
                                                <a href="<?= base_url(); ?>admin/gedung/hapus/<?= $gdg['id_gedung']; ?>" class="btn-danger  btn-sm" title="hapus" onclick="return confirm('Yakin ingin menghapus data?');"><i class="fas fa-trash-alt"></i></a>
                                            </td> -->
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