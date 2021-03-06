<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Aset Gedung & Bangunan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Aset Gedung & Bangunan</li>
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
                            <h3 class="card-title">
                                Daftar Data Aset Gedung & Bangunan
                            </h3>
                            <a href="<?= base_url('admin/gedung/tambah') ?>" button type="button" class="btn waves-effect waves-light btn-success" style="float:right"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a>
                           
                            
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
                                        <th>Tanggal Masuk</th>
                                        <th>Harga Gedung</th>
                                        <th class="text-center">Aksi</th>
                                </thead>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($gedung as $gdg) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td>
                                                <a href="<?= base_url(); ?>admin/hgedung/index/<?= $gdg['id_gedung']; ?>"><i><?= $gdg['nama_gedung'] ?></i></a>
                                            </td>
                                            <!-- <td><?= $gdg['nama_gedung'] ?></td> -->
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
                                            <td><?= $gdg['tanggal_masuk'] ?></td>
                                            <td><?= "Rp." . number_format($gdg['harga'], 2, ",", "."); ?></td>
                                            <td style="width: 100px;" class="text-center">
                                                <a href="<?= base_url(); ?>admin/gedung/edit/<?= $gdg['id_gedung']; ?>" class="btn-secondary  btn-sm" title="edit"><i class="fas fa-fw fa-edit"></i></a> |
                                                <a href="<?= base_url(); ?>admin/gedung/hapus/<?= $gdg['id_gedung']; ?>" class="btn-info  btn-sm" title="hapus" onclick="return confirm('Yakin ingin menghapus data?');"><i class="fas fa-trash-alt"></i></a>
                                                <a href= "<?= base_url(); ?>admin/kondisi_gedung/tambah/<?= $gdg['id_gedung']; ?>" class="badge badge-pill badge-dark">UBAH KONDISI</a> 
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="13" class="text-center">Total Aset</th>
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