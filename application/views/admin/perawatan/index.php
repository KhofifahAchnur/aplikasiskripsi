<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pemeliharaan Aset</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Pemeliharaan Aset</li>
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
                                Daftar Data Pemeliharaan Aset
                            </h3>
                            <!-- <a href="<?= base_url('admin/perawatan/tambah') ?>" button type="button" class="btn waves-effect waves-light btn-primary" style="float:right"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a> -->
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
                                        <th>Penanggung Jawab</th>
                                        <th>Jenis Pemeliharaan</th>
                                        <th>Biaya</th>
                                        <th>Tanggal Perawatan</th>
                                        <th>Tanggal Selesai </th>
                                        <th class="text-center">Aksi</th>
                                </thead>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($rawat as $rwt) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $rwt['nama_barang'] ?></td>
                                            <td><?= $rwt['kode_barang'] ?></td>
                                            <td><?= $rwt['register'] ?></td>
                                            <td><?= $rwt['lokasi'] ?></td>
                                            <td><?= $rwt['nama'] ?></td>
                                            <td><?= $rwt['jenis'] ?></td>
                                            <td><?= $rwt['biaya'] ?></td>
                                            <td><?= $rwt['tgl_rawat'] ?></td>
                                            <td><?= $rwt['tgl_selesai'] ?></td>
                                            <td style="width: 100px;" class="text-center">
                                                <a href="<?= base_url(); ?>admin/perawatan/edit/<?= $rwt['id_rawat']; ?>" class="btn-success  btn-sm" title="edit"><i class="fas fa-fw fa-edit"></i></a> |
                                                <a href="<?= base_url(); ?>admin/perawatan/hapus/<?= $rwt['id_rawat']; ?>" class="btn-danger  btn-sm" title="hapus" onclick="return confirm('Yakin ingin menghapus data?');"><i class="fas fa-trash-alt"></i></a>
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