<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Master Aset</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Aset</li>
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
                                Daftar Data Master Aset
                            </h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Kode Barang</th>
                                        <th>Register Barang</th>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($aset as $index => $brg) : ?>
                                        <tr>
                                            <td><?= ++$index; ?></td>
                                            <td><?= $brg['nama_barang'] ?></td>
                                            <td><?= $brg['kode_barang'] ?></td>
                                            <td><?= $brg['register'] ?></td>
                                            <td><?= $brg['merk'] ?></td>
                                            <td><?= $brg['ukuran'] ?></td>
                                            <td><?= $brg['bahan'] ?></td>
                                            <td><?= $brg['tahun'] ?></td>
                                            <td><?= $brg['kondisi'] ?></td>
                                            <td><?= $brg['asal_usul'] ?></td>
                                            <td><?= $brg['harga_brg'] ?></td>
                                            <td><?= $brg['lokasi'] ?></td>
                                            <td><?= $brg['tanggal_masuk'] ?></td>
                                            <td>
                                            <!-- <a href="<?= base_url('admin/kondisi/tambah'); ?>" class="badge badge-pill badge-success">UBAH KONDISI</a> -->
                                            <a href= "<?= base_url(); ?>admin/kondisi/tambah/<?= $brg['id']; ?>" class="badge badge-pill badge-success">UBAH KONDISI</a> 
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