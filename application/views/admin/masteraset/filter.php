<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan Aset Peralatan & Mesin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Aset Peralatan & Mesin</li>
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
                            <form action="<?= base_url(); ?>/admin/MasterAset/filter">

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
                                        <select name="nama" id="nama" class="form-control select2">
                                            <option value="" selected disabled></option>
                                            <?php foreach ($nama as $a) : ?>
                                                <option value="<?= $a['nama_barang']; ?>" <?= (@$_GET['nama'] == $a['nama_barang']) ? 'Selected' : ''; ?>><?= $a['nama_barang']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" name="filter" value="true" class="btn btn-primary">TAMPILKAN</button>
                                <?php if (isset($_GET['filter'])) : ?>
                                    <a href="<?= base_url('admin/masteraset/filter'); ?>" class="btn btn-default">RESET</a>
                                <?php endif; ?>
                            </form>
                            <!-- End Input Filter -->
                            <br>

                            <!-- Cetak Laporan -->
                            <?php if (isset($_GET['filter'])) : ?>
                                <p>Tanggal : <?= $tgl_awal; ?> sd <?= $tgl_akhir; ?></p>

                                <!-- Cetak Filter Tanggal & Nama -->
                                <?php if (isset($_GET['nama'])) : ?>
                                    <form action="<?= base_url('admin/MasterAset/laporan'); ?>" target="_blank">
                                        <p>Nama Barang : <?= $nm_barang; ?></p>
                                        <input type="hidden" id="tgl_awalcetak" name="tgl_awalcetak" value="<?= @$_GET['tgl_awal'] ?>">
                                        <input type="hidden" id="tgl_akhircetak" name="tgl_akhircetak" value="<?= @$_GET['tgl_akhir'] ?>">
                                        <input type="hidden" id="nama_barang" name="nama_barang" value="<?= @$_GET['nama'] ?>">
                                        <button type="submit" value="true" class="btn btn-success">Cetak</button>
                                    </form>
                                <?php else : ?>

                                    <!-- Cetak Filter Tanggal -->
                                    <form action="<?= base_url('admin/MasterAset/laporan'); ?>" target="_blank">
                                        <input type="hidden" id="tgl_awalcetak" name="tgl_awalcetak" value="<?= @$_GET['tgl_awal'] ?>">
                                        <input type="hidden" id="tgl_akhircetak" name="tgl_akhircetak" value="<?= @$_GET['tgl_akhir'] ?>">
                                        <button type="submit" value="true" class="btn btn-success">Cetak</button>
                                    </form>
                                <?php endif; ?>
                            <?php else : ?>

                                <!-- Cetak Semua Data -->
                                <p>Cetak Semua Data</p>
                                <form action="<?= base_url('admin/MasterAset/laporan'); ?>" target="_blank">
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
                                            <th>Register Barang</th>
                                            <th>Merk</th>
                                            <th>Ukuran</th>
                                            <th>Bahan</th>
                                            <th>Tahun Peroleh</th>
                                            <th>Kondisi</th>
                                            <th>Asal-Usul</th>
                                            <th>Lokasi</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Harga Barang</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($aset as $index => $brg) : ?>
                                            <tr>
                                                <td><?= ++$index; ?></td>
                                                <td><?= $brg['nama_barang'] ?></td>
                                                <td><?= $brg['kode_barang'] ?></td>
                                                <td><?= $brg['register'] ?></td>
                                                <td><?= $brg['merk'] ?></td>
                                                <td><?= $brg['ukuran'] ?></td>
                                                <td><?= $brg['bahan'] ?></td>
                                                <td><?= $brg['tahun'] ?></td>
                                                <td><?= $brg['kondisi'] ?></td>
                                                <td><?= $brg['asal_usul'] ?></td>
                                                <td><?= $brg['lokasi'] ?></td>
                                                <td><?= $brg['tanggal_masuk'] ?></td>
                                                <td><?= "Rp." . number_format($brg['harga_brg'], 2, ",", "."); ?></td>
                                                <td>
                                                    <!-- <a href="<?= base_url('admin/kondisi/tambah'); ?>" class="badge badge-pill badge-success">UBAH KONDISI</a> -->
                                                    <a href="<?= base_url(); ?>admin/kondisi/tambah/<?= $brg['id']; ?>" class="badge badge-pill badge-info">UBAH KONDISI</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <tfoot>
                                    <tr>
                                        <th colspan="12" class="text-center">Total Kas Masuk</th>
                                        <th colspan="1"><?= "Rp." . number_format($jumlah_kasmasuk, 2, ",", "."); ?></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                    </tbody>

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