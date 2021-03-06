<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Penanggung Jawab</h1>
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
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data Penanggung Jawab</h3>
                        </div>
                        <!-- form start -->
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $barang['id']; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Barang" name="nama" value="<?= $barang['nama']; ?>">
                                    <div class="form-text text-danger"><?= form_error('nama'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>NIP</label>
                                    <input type="text" class="form-control" id="nip" placeholder="Masukkan NIP Barang" name="nip" value="<?= $barang['nip']; ?>">
                                    <div class="form-text text-danger"><?= form_error('nip'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" id="username" placeholder="Masukkan Username" name="username" value="<?= $barang['username']; ?>">
                                    <div class="form-text text-danger"><?= form_error('username'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Masukkan password" name="password" value="<?= $barang['password']; ?>">
                                    <div class="form-text text-danger"><?= form_error('password'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Hak Akses</label>
                                    <select name="hak_akses" class="form-control" id="hak_akses">
                                    <option value="<?= $barang['hak_akses'] ?>">
                                        <?php if ($barang['hak_akses'] == '1') {
                                                echo "Admin";
                                            } else if ($barang['hak_akses'] == '2') {
                                                echo "Guru";
                                            } else {
                                                echo "Sapras";
                                            } ?>
                                        <option value="1"> Admin </option>
                                        <option value="2"> Guru </option>
                                        <option value="3"> Sapras </option>
                                    </select>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-info">Simpan</button>
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