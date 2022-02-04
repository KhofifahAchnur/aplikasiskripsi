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
                        <a href="<?= base_url('member/aset/index') ?>" button type="button" class="btn waves-effect waves-light btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 ml-12 mr-12">
                    <!-- /.card-header -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Indentitas Barang</h3>
                        </div>
                        <!-- form start -->
                        <form action="" method="post">
                            <!-- <input type="hidden" name="id" value="<?= $barang['id']; ?>"> -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input readonly type="text" class="form-control" id="nama_barang" placeholder="Masukkan Kode Barang" name="nama_barang" value="<?= $barang['nama_barang']; ?>">
                                    <div class="form-text text-danger"><?= form_error('nama_barang'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Kode Barang</label>
                                    <input readonly type="text" class="form-control" id="kode_barang" placeholder="Masukkan Kode Barang" name="kode_barang" value="<?= $barang['kode_barang']; ?>">
                                    <div class="form-text text-danger"><?= form_error('kode_barang'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Register</label>
                                    <input readonly type="text" class="form-control" id="register" placeholder="Masukkan Kode Barang" name="register" value="<?= $barang['register']; ?>">
                                    <div class="form-text text-danger"><?= form_error('register'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Merk</label>
                                    <input readonly type="text" class="form-control" id="merk" placeholder="Masukkan Kode Barang" name="merk" value="<?= $barang['merk']; ?>">
                                    <div class="form-text text-danger"><?= form_error('merk'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Kondisi</label>
                                    <input readonly type="text" class="form-control" id="kondisi" placeholder="Masukkan Kode Barang" name="kondisi" value="<?= $barang['kondisi']; ?>">
                                    <div class="form-text text-danger"><?= form_error('kondisi'); ?></div>
                                </div>
                                <div class="text-center">
                                
                                    <a href="<?= base_url('perpindahan/tambah/').$barang['id'] ?>" button type="button" class="btn btn-primary"></button> &nbsp;&nbsp;Perpindahan</a>
                                </div>
                            </div>
                        </form>
                    </div>
                
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </section>
</div>