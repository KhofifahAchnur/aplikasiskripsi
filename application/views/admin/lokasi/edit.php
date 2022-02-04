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
                        <a href="<?= base_url('admin/lokasi/index') ?>" button type="button" class="btn waves-effect waves-light btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
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
                            <h3 class="card-title">Edit Data Barang</h3>
                        </div>
                        <!-- form start -->
                        <form action = "" method = "post">
                        <input type="hidden" name="id" value="<?= $lokasi['id']; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Lokasi Barang</label>
                                    <input type="text" class="form-control" id="lokasi" placeholder="Masukkan Lokasi Barang" name="lokasi" value="<?= $lokasi['lokasi']; ?>">
                                    <div class="form-text text-danger"><?= form_error('lokasi'); ?></div>
                                </div>
                                <div class="form-group">
                                <label>Penanggung Jawab</label>
                                    <select name="nama" class="form-control" id="nama">
                                        <?php foreach($penanggung_jawab as $index => $pj): ?>
                                        <option value="<?= $pj['id']; ?>"><?= $pj['nama']; ?></option>
                                        <?php endforeach; ?>
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