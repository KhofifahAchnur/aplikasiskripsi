<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Perbaikan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Perbaikan</li>
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
                                Daftar Data  Perbaikan
                            </h3>
                            <a href="<?= base_url('admin/perbaikan/tambah') ?>" button type="button" class="btn waves-effect waves-light btn-primary" style="float:right"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                    <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Lokasi</th>
                                        <th>Kerusakan</th>
                                        <th>Biaya</th>
                                        <th>Tanggal Perbaikan</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                </thead>
                                <tbody>
                                <?php foreach ($barang as $index => $brg) : ?>
                                        <tr>
                                            <td><?= ++$index; ?></td>
                                            <td><?= $brg['nama_perbaikan'] ?></td>
                                            <td><?= $brg['lokasi_aset'] ?></td>
                                            <td><?= $brg['rusak'] ?></td>
                                            <td><?= $brg['biaya_perbaikan'] ?></td>
                                            <td><?= $brg['tgl_perbaikan'] ?></td>
                                            <td><?= $brg['tgl_selesai'] ?></td>
                                            <td style="width: 100px;" class="text-center">
                                                <a href= "<?= base_url(); ?>admin/perbaikan/edit/<?= $brg['id_perbaikan']; ?>" class="btn-success  btn-sm" title="edit"><i class="fas fa-fw fa-edit"></i></a> |
                                                <a href="<?= base_url(); ?>admin/perbaikan/hapus/<?= $brg['id_perbaikan']; ?>" class="btn-danger  btn-sm" title="hapus" onclick="return confirm('Yakin ingin menghapus data?');"><i class="fas fa-trash-alt"></i></a>
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