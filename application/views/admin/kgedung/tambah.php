
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Konfirmasi Pengajuan Pemeliharaan Aset Peralatan & Mesin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="<?= base_url('admin/kgedung/index') ?>" button type="button" class="btn waves-effect waves-light btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Ubah Data Konfirmasi Pengajuan Pemeliharaan Aset Peralatan & Mesin</h3>
                        </div>
                        <!-- form start -->
                        <form action="" method="post">
                                <div class="card-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input hidden type="text" class="form-control" id="aset" name="aset" value="<?= $status['id'] ?>">
                                    <input readonly type="text" class="form-control" id="" name="" value="<?= $status['aset'] ?>">
                                    <div class="form-text text-danger"><?= form_error('aset'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <input readonly type="text" class="form-control" id="des" name="des" value="<?= $status['des'] ?>">
                                    <div class="form-text text-danger"><?= form_error('des'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="<?= $status['status']; ?>"><?= $status['status']; ?></option>
                                        <option value="Diproses"> Diproses </option>
                                        <option value="Disetujui"> Disetujui </option>
                                        <option value="Tersedia"> Tersedia </option>
                                    </select>
                                </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </section>
</div>