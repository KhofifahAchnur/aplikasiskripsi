<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Aset Jalan , Irigasi & Jaringan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('member/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Aset Jalan , Irigasi & Jaringan</li>
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
                                Daftar Data Aset Jalan , Irigasi & Jaringan
                            </h3>
                            <!-- <a href="<?= base_url('member/jalan/tambah') ?>" button type="button" class="btn waves-effect waves-light btn-primary" style="float:right"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a> -->
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
                                        <th>Konstruksi</th>
                                        <th>Luas</th>
                                        <th>Tahun</th>
                                        <th>Kondisi</th>
                                        <th>Status</th>
                                        <th>Asal-Usul</th>
                                        <th>Tanggal Peroleh</th>
                                        <th>Harga</th>
                                        <!-- <th class="text-center">Aksi</th> -->
                                </thead>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($jalan as $jln) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $jln['nama_aset'] ?></td>
                                            <td><?= $jln['kode_aset'] ?></td>
                                            <td><?= $jln['register'] ?></td>
                                            <td><?= $jln['konstruksi'] ?></td>
                                            <td><?= $jln['luas'] ?></td>
                                            <td><?= $jln['tahun'] ?></td>
                                            <td><?= $jln['kondisi'] ?></td>
                                            <td><?= $jln['status'] ?></td>
                                            <td><?= $jln['asal_usul'] ?></td>
                                            <td><?= $jln['tanggal_masuk'] ?></td>
                                            <td><?= "Rp." . number_format($jln['harga'], 2, ",", "."); ?></td>
                                            <!-- <td style="width: 100px;" class="text-center">
                                                <a href="<?= base_url(); ?>admin/jalan/edit/<?= $jln['id_jalan']; ?>" class="btn-success  btn-sm" title="edit"><i class="fas fa-fw fa-edit"></i></a> |
                                                <a href="<?= base_url(); ?>admin/jalan/hapus/<?= $jln['id_jalan']; ?>" class="btn-danger  btn-sm" title="hapus" onclick="return confirm('Yakin ingin menghapus data?');"><i class="fas fa-trash-alt"></i></a>
                                            </td> -->
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="11" class="text-center">Total Kas Masuk</th>
                                        <th colspan="1"><?= "Rp." . number_format($jumlah_kasmasuk, 2, ",", "."); ?></th>
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