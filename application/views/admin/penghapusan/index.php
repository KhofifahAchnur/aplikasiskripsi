<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Penghapusan Aset Peralatan & Mesin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Penghapusan Aset Peralatan & Mesin</li>
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
                <?php if ($this->session->flashdata('flash')) : ?>
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            Data <strong> Berhasil </strong><?= $this->session->flashdata('flash'); ?>.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span arial-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <!-- /.card-header -->
                    <div class="card">
                        <div class="card-header">
                            <!-- <h3 class="card-title">
                                Daftar Data Penghapusan Aset
                            </h3> -->
                            <!-- <a href="<?= base_url('admin/perawatan/tambah') ?>" button type="button" class="btn waves-effect waves-light btn-primary" style="float:right"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a>
                            <a href="<?= base_url('admin/perawatan/filter') ?>" button type="button" class="btn waves-effect waves-light btn-primary" style="float:left"><i class="fas fas fa-print"></i>&nbsp;&nbsp;</a> -->
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
                                        <th>Kondisi</th>
                                        <th>Lokasi</th>
                                        <th>Status</th>
                                        <th>Tanggal Penghapusan</th>
                                        <th>Harga</th>
                                        <!-- <th>Kondisi</th> -->
                                        <th class="text-center">Aksi</th>
                                </thead>
                                </thead>
                                <tbody>
                                    <?php foreach ($hapus as $index => $hps) : ?>
                                        <tr>
                                            <td><?= ++$index; ?></td>
                                            <td><?= $hps['nama_barang'] ?></td>
                                            <td><?= $hps['kode_barang'] ?></td>
                                            <td><?= $hps['register'] ?></td>
                                            <td><?= $hps['kondisi'] ?></td>
                                            <td><?= $hps['lokasi'] ?></td>
                                            <td><?= $hps['status'] ?></td>
                                            <td><?= $hps['tgl_hapus'] ?></td>
                                            <td><?= "Rp." . number_format($hps['harga_brg'], 2, ",", "."); ?></td>
                                            <!-- <td><?= $hps['kondisi'] ?></td> -->
                                            <td style="width: 100px;" class="text-center">
                                                <!-- <a href="<?= base_url(); ?>admin/perawatan/edit/<?= $hps['id']; ?>" class="btn-success  btn-sm" title="edit"><i class="fas fa-fw fa-edit"></i></a> | -->
                                                <a href="<?= base_url(); ?>admin/penghapusan/hapus/<?= $hps['id']; ?>" class="btn-info  btn-sm" title="hapus" onclick="return confirm('Yakin ingin menghapus data?');"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="8" class="text-center">Total Aset</th>
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