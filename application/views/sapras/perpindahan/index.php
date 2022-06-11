
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
                            <h3 class="card-title">Perpindahan Kondisi</h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Kode Barang</th>
                                        <th>lokasi</th>
                                        <th>Nama Penanggung Jawab</th>
                                        <th>Tanggal Perpindahan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($barang as $index => $brg) : ?>
                                        <tr>
                                            <td><?= ++$index; ?></td>
                                            <td><?= $brg['nama_barang'] ?></td>
                                            <td><?= $brg['kode_barang'] ?></td>
                                            <td><?= $brg['lokasi'] ?></td>
                                            <td><?= $brg['nama'] ?></td>
                                            <td><?= $brg['tanggal'] ?></td>
                                            
                                           
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