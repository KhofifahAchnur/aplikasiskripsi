<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan Aset Pemeliharaan Gedung & Bangunan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Aset  Pemeliharaan Gedung & Bangunan</li>
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
                            <form action="<?= base_url(); ?>/admin/pemeliharaan/filter">

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
                                        <select name="nama_gedung" id="nama_gedung" class="form-control select2">
                                            <option value="" selected disabled></option>
                                            <?php foreach ($nama_gedung as $a) : ?>
                                                <option value="<?= $a['nama_gedung']; ?>" <?= (@$_GET['nama_gedung'] == $a['nama_gedung']) ? 'Selected' : ''; ?>><?= $a['nama_gedung']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" name="filter" value="true" class="btn btn-primary">TAMPILKAN</button>
                                <?php if (isset($_GET['filter'])) : ?>
                                    <a href="<?= base_url('admin/pemeliharaan/filter'); ?>" class="btn btn-default">RESET</a>
                                <?php endif; ?>
                            </form>
                            <!-- End Input Filter -->
                            <br>

                            <!-- Cetak Laporan -->
                            <?php if (isset($_GET['filter'])) : ?>
                                <p>Tanggal : <?= $tgl_awal; ?> sd <?= $tgl_akhir; ?></p>

                                <!-- Cetak Filter Tanggal & Nama -->
                                <?php if (isset($_GET['nama_gedung'])) : ?>
                                    <form action="<?= base_url('admin/Pemeliharaan/laporan'); ?>" target="_blank">
                                        <p>Nama gedung : <?= $nm_gedung; ?></p>
                                        <input type="hidden" id="tgl_awalcetak" name="tgl_awalcetak" value="<?= @$_GET['tgl_awal'] ?>">
                                        <input type="hidden" id="tgl_akhircetak" name="tgl_akhircetak" value="<?= @$_GET['tgl_akhir'] ?>">
                                        <input type="hidden" id="nama_gedung" name="nama_gedung" value="<?= @$_GET['nama_gedung'] ?>">
                                        <button type="submit" value="true" class="btn btn-success">Cetak</button>
                                    </form>
                                <?php else : ?>

                                    <!-- Cetak Filter Tanggal -->
                                    <form action="<?= base_url('admin/Pemeliharaan/laporan'); ?>" target="_blank">
                                        <input type="hidden" id="tgl_awalcetak" name="tgl_awalcetak" value="<?= @$_GET['tgl_awal'] ?>">
                                        <input type="hidden" id="tgl_akhircetak" name="tgl_akhircetak" value="<?= @$_GET['tgl_akhir'] ?>">
                                        <button type="submit" value="true" class="btn btn-success">Cetak</button>
                                    </form>
                                <?php endif; ?>
                            <?php else : ?>

                                <!-- Cetak Semua Data -->
                                <p>Cetak Semua Data</p>
                                <form action="<?= base_url('admin/Pemeliharaan/laporan'); ?>" target="_blank">
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
                                        <th>Nama Gedung</th>
                                        <th>Kode Gedung</th>
                                        <th>Register</th>
                                        <th>Lokasi</th>
                                        <th>Penanggung Jawab</th>
                                        <th>Jenis Pemeliharaan</th>
                                        <th>Tanggal Pemeliharaan</th>
                                        <th>Tanggal Selesai </th>
                                        <th>Biaya</th>
                                        <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $jumlah_kasmasuk = 0;
                                        foreach ($pemeliharaan as $index => $pln) :
                                            $jumlah_kasmasuk = $jumlah_kasmasuk + $pln['biaya'];
                                        ?>
                                        <tr>
                                        <td><?= ++$index; ?></td>
                                            <td><?= $pln['nama_gedung'] ?></td>
                                            <td><?= $pln['kode_gedung'] ?></td>
                                            <td><?= $pln['register'] ?></td>
                                            <td><?= $pln['lokasi'] ?></td>
                                            <td><?= $pln['nama'] ?></td>
                                            <td><?= $pln['jenis'] ?></td>
                                            <td><?= $pln['tgl_pemeliharaan'] ?></td>
                                            <td><?= $pln['tgl_selesai'] ?></td>
                                            <td><?= "Rp." . number_format($pln['biaya'], 2, ",", "."); ?></td>
                                            <td style="width: 100px;" class="text-center">
                                                <a href="<?= base_url(); ?>admin/pemeliharaan/edit/<?= $pln['id_pemeliharaan']; ?>" class="btn-secondary  btn-sm" title="edit"><i class="fas fa-fw fa-edit"></i></a> |
                                                <a href="<?= base_url(); ?>admin/pemeliharaan/hapus/<?= $pln['id_pemeliharaan']; ?>" class="btn-info  btn-sm" title="hapus" onclick="return confirm('Yakin ingin menghapus data?');"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="9" class="text-center">Total Aset</th>
                                        <th colspan="1"><?= "Rp." . number_format($jumlah_kasmasuk, 2, ",", "."); ?></th>
                                        <th></th>
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