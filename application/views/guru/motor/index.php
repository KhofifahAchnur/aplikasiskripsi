<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Barang</li>
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
                                Daftar Data Barang
                            </h3>
                            <a href="<?= base_url('admin/kendaraan/tambah') ?>" button type="button" class="btn waves-effect waves-light btn-primary" style="float:right"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a>
                            
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
                                        <th>Merk</th>
                                        <th>Ukuran</th>
                                        <th>Bahan</th>
                                        <th>Tahun Peroleh</th>
                                        <th>Kondisi</th>
                                        <th>Asal-Usul</th>
                                        <th>Harga Barang</th>
                                        <th>Lokasi</th>
                                        <th>Tanggal Masuk</th>
                                        <th class="text-center">Aksi</th>
                                </thead>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($motor as $mtr) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td>
                                                <a href="<?= base_url(); ?>admin/hmotor/index/<?= $mtr['id']; ?>"><i><?= $mtr['nama_barang'] ?></i></a>
                                            </td>
                                            <td><?= $mtr['kode_barang'] ?></td>
                                            <td><?= $mtr['register'] ?></td>
                                            <td><?= $mtr['merk'] ?></td>
                                            <td><?= $mtr['ukuran'] ?></td>
                                            <td><?= $mtr['bahan'] ?></td>
                                            <td><?= $mtr['tahun'] ?></td>
                                            <td><?= $mtr['kondisi'] ?></td>
                                            <td><?= $mtr['asal_usul'] ?></td>
                                            <td><?= $mtr['harga_brg'] ?></td>
                                            <td><?= $mtr['lokasi'] ?></td>
                                            <td><?= $mtr['tanggal_masuk'] ?></td>
                                            <td style="width: 100px;" class="text-center">
                                                <a href= "<?= base_url(); ?>admin/kendaraan/edit/<?= $mtr['id']; ?>" class="btn-success  btn-sm" title="edit"><i class="fas fa-fw fa-edit"></i></a> |
                                                <a href="<?= base_url(); ?>admin/kendaraan/hapus/<?= $mtr['id']; ?>" class="btn-danger  btn-sm" title="hapus" onclick="return confirm('Yakin ingin menghapus data?');"><i class="fas fa-trash-alt"></i></a>
                                                <!-- <a href= "<?= base_url(); ?>admin/kondisi/tambah/<?= $brg['id']; ?>" class="badge badge-pill badge-success">UBAH KONDISI</a>  -->
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