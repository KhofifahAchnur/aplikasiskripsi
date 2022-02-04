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
                        <a href="<?= base_url('admin/penanggung_jawab/index') ?>" button type="button" class="btn waves-effect waves-light btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
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
                            <h3 class="card-title">Tambah Data Penanggung Jawab</h3>
                        </div>
                        <!-- form start -->
                        <form action = "" method = "post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Penanggung Jawab" name="nama">
                                    <div class="form-text text-danger"><?= form_error('nama'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>NIP</label>
                                    <input type="text" class="form-control" id="nip" placeholder="Masukkan NIP" name="nip">
                                    <div class="form-text text-danger"><?= form_error('nip'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" id="username" placeholder="Masukkan Username" name="username">
                                    <div class="form-text text-danger"><?= form_error('username'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Masukkan password" name="password">
                                    <div class="form-text text-danger"><?= form_error('password'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Hak Akses</label>
                                    <select name="hak_akses" class="form-control" id="hak_akses">
                                        <option>- Pilih Hak Akses -</option>
                                        <option value="1"> Admin </option>
                                        <option value="2"> Member </option>
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