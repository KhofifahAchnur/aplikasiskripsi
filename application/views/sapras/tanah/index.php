<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Aset Tanah</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('sapras/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Aset Tanah</li>
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
                                Daftar Data Aset Tanah
                            </h3>
                            <!-- <a href="<?= base_url('sapras/tanah/tambah') ?>" button type="button" class="btn waves-effect waves-light btn-primary" style="float:right"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Tanah</th>
                                        <th>Kode Tanah</th>
                                        <th>Register</th>
                                        <th>Luas</th>
                                        <th>Tahun Peroleh</th>
                                        <th>Lokasi</th>
                                        <th>Hak</th>
                                        <th>Nomer</th>
                                        <th>Asal-Usul</th>
                                        <th>Harga Barang</th>
                                        <th>Tanggal Peroleh</th>
                                        <!-- <th class="text-center">Aksi</th> -->
                                </thead>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($tanah as $brg) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $brg['nama_tanah'] ?></td>
                                            <td><?= $brg['kode_tanah'] ?></td>
                                            <td><?= $brg['register'] ?></td>
                                            <td><?= $brg['luas'] ?></td>
                                            <td><?= $brg['tahun'] ?></td>
                                            <td><?= $brg['lokasi'] ?></td>
                                            <td><?= $brg['hak'] ?></td>
                                            <td><?= $brg['nomer'] ?></td>
                                            <td><?= $brg['asal_usul'] ?></td>
                                            <td><?= "Rp." . number_format($brg['harga'], 2, ",", "."); ?></td>
                                            <td><?= $brg['tanggal_masuk'] ?></td>
                                            <!-- <td style="width: 100px;" class="text-center">
                                                <a href= "<?= base_url(); ?>sapras/tanah/edit/<?= $brg['id_tanah']; ?>" class="btn-success  btn-sm" title="edit"><i class="fas fa-fw fa-edit"></i></a> |
                                                <a href="<?= base_url(); ?>sapras/tanah/hapus/<?= $brg['id_tanah']; ?>" class="btn-danger  btn-sm" title="hapus" onclick="return confirm('Yakin ingin menghapus data?');"><i class="fas fa-trash-alt"></i></a>
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