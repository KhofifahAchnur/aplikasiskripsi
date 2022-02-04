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
                    <a href="<?= base_url('kondisi/tambah') ?>" button type="button" class="btn waves-effect waves-light btn-primary" style="float:right"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a>
                        
                    </ol>
                    
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-lg-12">
                        <!-- /.card-header -->
                        <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">History Kondisi</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Image</th>
                                        <th>Password</th>
                                        <th>Jabatan</th>
                                        <th>Aktif</th>
                                        <th>Tanggal Pembuatan</th>
                                </thead>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($member as $mbr) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $mbr['name'] ?></td>
                                            <td><?= $mbr['email'] ?></td>
                                            <td><?= $mbr['image'] ?></td>
                                            <td><?= $mbr['password'] ?></td>
                                            <td><?= $mbr['role_id'] ?></td>
                                            <td><?= $mbr['is_active'] ?></td>
                                            <td><?= $mbr['date_created'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
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