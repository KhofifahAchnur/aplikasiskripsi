<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Data Aset Perpustakaan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Data Aset Perpustakaan</li>
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
                                Daftar Data Aset Perpustakaan
                            </h3>
                            <a href="<?= base_url('admin/buku/tambah') ?>" button type="button" class="btn waves-effect waves-light btn-success" style="float:right"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Buku</th>
                                        <th>Kode Buku</th>
                                        <th>Register</th>
                                        <th>Judul</th>
                                        <th>Spesifikasi</th>
                                        <th>Asal-Usul</th>
                                        <th>Tahun Peroleh</th>
                                        <th>Kondisi</th>
                                        <th>Tanggal Peroleh</th>
                                        <th>Harga Buku</th>
                                        <th class="text-center">Aksi</th>
                                </thead>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($buku as $brg) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td>
                                                <a href="<?= base_url(); ?>admin/hbuku/index/<?= $brg['id_buku']; ?>"><i><?= $brg['nama_buku'] ?></i></a>
                                            </td>
                                            <!-- <td><?= $brg['nama_buku'] ?></td> -->
                                            <td><?= $brg['kode_buku'] ?></td>
                                            <td><?= $brg['register'] ?></td>
                                            <td><?= $brg['judul'] ?></td>
                                            <td><?= $brg['spesifikasi'] ?></td>
                                            <td><?= $brg['asal_usul'] ?></td>
                                            <td><?= $brg['tahun'] ?></td>
                                            <td><?= $brg['kondisi'] ?></td>
                                            <td><?= $brg['tanggal_masuk'] ?></td>
                                            <td><?= "Rp." . number_format($brg['harga'], 2, ",", "."); ?></td>
                                            <td style="width: 100px;" class="text-center">
                                                <a href= "<?= base_url(); ?>admin/buku/edit/<?= $brg['id_buku']; ?>" class="btn-secondary  btn-sm" title="edit"><i class="fas fa-fw fa-edit"></i></a> |
                                                <a href="<?= base_url(); ?>admin/buku/hapus/<?= $brg['id_buku']; ?>" class="btn-info  btn-sm" title="hapus" onclick="return confirm('Yakin ingin menghapus data?');"><i class="fas fa-trash-alt"></i></a>
                                                <a href="<?= base_url(); ?>admin/kondisi_buku/tambah/<?= $brg['id_buku']; ?>" class="badge badge-pill badge-dark">UBAH KONDISI</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="10" class="text-center">Total Kas Masuk</th>
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