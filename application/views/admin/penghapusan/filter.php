<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan Aset Pemeliharaan Peralatan & Mesin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Aset Pemeliharaan Peralatan & Mesin</li>
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
                        <!-- <div class="card-header">
                            <h3 class="card-title">
                                Laporan
                            </h3>
                        </div> -->

                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- Input Filter -->
                            <form action="<?= base_url(); ?>/admin/penghapusan/filter">

                                <!-- Filter Berdasarkan Tanggal -->
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Tanggal Awal</label>
                                            <input type="date" class="form-control" id="tgl_awal" name="tgl_awal" required value="<?= @$_GET['tgl_awal'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Tanggal Akhir</label>
                                            <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir" required value="<?= @$_GET['tgl_akhir'] ?>">
                                        </div>
                                    </div>
                                </div>


                                <!-- Filter Berdasarkan Nama -->
                                <div class="form-group row">
                                    <label for="" class="col-sm-3">Filter By Nama</label>
                                    <div class="col-sm-3">
                                        <select name="nama_barang" id="nama_barang" class="form-control select2">
                                            <option value="" selected disabled></option>
                                            <?php foreach ($nama_barang as $a) : ?>
                                                <option value="<?= $a['nama_barang']; ?>" <?= (@$_GET['nama_barang'] == $a['nama_barang']) ? 'Selected' : ''; ?>><?= $a['nama_barang']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" name="filter" value="true" class="btn btn-primary">TAMPILKAN</button>
                                <?php if (isset($_GET['filter'])) : ?>
                                    <a href="<?= base_url('admin/penghapusan/filter'); ?>" class="btn btn-default">RESET</a>
                                <?php endif; ?>
                            </form>
                            <!-- End Input Filter -->
                            <br>

                            <!-- Cetak Laporan -->
                            <?php if (isset($_GET['filter'])) : ?>
                                <p>Tanggal : <?= $tgl_awal; ?> sd <?= $tgl_akhir; ?></p>

                                <!-- Cetak Filter Tanggal & Nama -->
                                <?php if (isset($_GET['nama_barang'])) : ?>
                                    <form action="<?= base_url('admin/Penghapusan/laporan'); ?>" target="_blank">
                                        <p>Nama Barang : <?= $nm_barang; ?></p>
                                        <input type="hidden" id="tgl_awalcetak" name="tgl_awalcetak" value="<?= @$_GET['tgl_awal'] ?>">
                                        <input type="hidden" id="tgl_akhircetak" name="tgl_akhircetak" value="<?= @$_GET['tgl_akhir'] ?>">
                                        <input type="hidden" id="nama_barang" name="nama_barang" value="<?= @$_GET['nama_barang'] ?>">
                                        <button type="submit" value="true" class="btn btn-success">Cetak</button>
                                    </form>
                                <?php else : ?>

                                    <!-- Cetak Filter Tanggal -->
                                    <form action="<?= base_url('admin/Penghapusan/laporan'); ?>" target="_blank">
                                        <input type="hidden" id="tgl_awalcetak" name="tgl_awalcetak" value="<?= @$_GET['tgl_awal'] ?>">
                                        <input type="hidden" id="tgl_akhircetak" name="tgl_akhircetak" value="<?= @$_GET['tgl_akhir'] ?>">
                                        <button type="submit" value="true" class="btn btn-success">Cetak</button>
                                    </form>
                                <?php endif; ?>
                            <?php else : ?>

                                <!-- Cetak Semua Data -->
                                <p>Cetak Semua Data</p>
                                <form action="<?= base_url('admin/Penghapusan/laporan'); ?>" target="_blank">
                                    <button type="submit" value="true" class="btn btn-success">Cetak</button>
                                </form>
                            <?php endif ?>
                            <!-- End Cetak Filter -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-hover table-bordered table-striped">
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
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $jumlah_kasmasuk = 0;
                                        foreach ($hapus as $index => $hps) :
                                            $jumlah_kasmasuk = $jumlah_kasmasuk + $hps['harga_brg'];
                                        ?>
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
                                                <td style="width: 100px;" class="text-center">
                                                    <!-- <a href="<?= base_url(); ?>admin/perawatan/edit/<?= $hps['id']; ?>" class="btn-success  btn-sm" title="edit"><i class="fas fa-fw fa-edit"></i></a> | -->
                                                    <a href="<?= base_url(); ?>admin/penghapusan/hapus/<?= $hps['id']; ?>" class="btn-danger  btn-sm" title="hapus" onclick="return confirm('Yakin ingin menghapus data?');"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="9" class="text-center">Total Kas Masuk</th>
                                            <th colspan="1"><?= "Rp." . number_format($jumlah_kasmasuk, 2, ",", "."); ?></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
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