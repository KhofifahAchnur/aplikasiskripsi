<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Lokasi Aset</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('guru/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Lokasi Aset</li>
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
                    
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Daftar Data Lokasi Barang
                            </h3>
                        </div>
                    
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Lokasi Barang</th>
                                        <th>Nama</th>
                                        <!-- <th class="text-center">Aksi</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($barang as $brg) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td>
                                                <a href="<?= base_url(); ?>guru/lokasi/brgberdasarkanlks/<?= $brg['id']; ?>"><i><?= $brg['lokasi'] ?></i></a>
                                            </td>
                                            <td><?= $brg['nama'] ?></td>

                                            <!-- <td style="width: 120px;" class="text-center">
                                                <!-- <a href="<?= base_url(); ?>guru/lokasi/edit/<?= $brg['id']; ?>" class="btn-success  btn-sm" title="edit"><i class="fas fa-fw fa-edit"></i></a> |
                                                <a href="<?= base_url(); ?>guru/lokasi/hapus/<?= $brg['id']; ?>" class="btn-danger  btn-sm" title="hapus" onclick="return confirm('Yakin ingin menghapus data?');"><i class="fas fa-trash-alt"></i></a> | -->
                                                <!-- <a href="<?= base_url(); ?>guru/lokasi/laporanruangan/<?= $brg['id']; ?>" class="btn-primary  btn-sm" title="print"><i class="fas fa-print"></i></a> -->
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