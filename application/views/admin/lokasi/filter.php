<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan Mutasi Pegawai</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Mutasi Pegawai</li>
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
                                Daftar Data Produk
                            </h3> -->

                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- Input Filter -->
                            <form action="<?= base_url(); ?>/admin/lokasi/filter">

                                <!-- Filter Berdasarkan Nama -->
                                <div class="form-group row">
                                    <label for="" class="col-sm-3">Filter By Nama</label>
                                    <div class="col-sm-3">
                                        <select name="lokasi" id="lokasi" class="form-control select2">
                                            <option value="" selected disabled></option>
                                            <?php foreach ($lokasi as $a) : ?>
                                                <option value="<?= $a['lokasi']; ?>" <?= (@$_GET['lokasi'] == $a['lokasi']) ? 'Selected' : ''; ?>><?= $a['lokasi']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" name="filter" value="true" class="btn btn-primary">TAMPILKAN</button>
                                <?php if (isset($_GET['filter'])) : ?>
                                    <a href="<?= base_url('admin/lokasi/filter'); ?>" class="btn btn-default">RESET</a>
                                <?php endif; ?>
                            </form>
                            <!-- End Input Filter -->
                            <br>

                            <!-- Cetak Laporan -->
                            <!-- <?php if (isset($_GET['filter'])) : ?>
                                <p>Tanggal : <?= $tgl_awal; ?> sd <?= $tgl_akhir; ?></p> -->

                            <!-- Cetak Filter Tanggal & Nama -->
                            <?php if (isset($_GET['lokasi'])) : ?>
                                <form action="<?= base_url('admin/lokasi/laporan'); ?>" target="_blank">
                                    <p>lokasi : <?= $jbtn; ?></p>
                                    <input type="hidden" id="lokasi" name="lokasi" value="<?= @$_GET['lokasi'] ?>">
                                    <button type="submit" value="true" class="btn btn-success">Cetak</button>
                                </form>
                                <!-- <?php else : ?> -->

                                <!-- Cetak Filter Tanggal -->
                                <!-- <form action="<?= base_url('kepegawaian/mutasi/laporan'); ?>" target="_blank">
                                        <input type="hidden" id="tgl_awalcetak" name="tgl_awalcetak" value="<?= @$_GET['tgl_awal'] ?>">
                                         <input type="hidden" id="tgl_akhircetak" name="tgl_akhircetak" value="<?= @$_GET['tgl_akhir'] ?>">
                                        <button type="submit" value="true" class="btn btn-success">Cetak</button>
                                    </form>
                                <?php endif; ?>
                             <?php else : ?> 

                                 Cetak Semua Data -->

                                <p>Cetak Semua Data</p>
                                <form action="<?= base_url('admin/lokasi/laporan'); ?>" target="_blank">
                                    <button type="submit" value="true" class="btn btn-success">Cetak</button>
                                </form>
                            <?php endif ?>

                            <!-- End Cetak Filter
                        </div>

                        /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>Lokasi Barang</th>
                                        <th>Nama</th>
                                        <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1;
                                    foreach ($barang as $brg) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td>
                                                <a href="<?= base_url(); ?>admin/lokasi/brgberdasarkanlks/<?= $brg['id']; ?>"><i><?= $brg['lokasi'] ?></i></a>
                                            </td>
                                            <td><?= $brg['nama'] ?></td>

                                            <td style="width: 120px;" class="text-center">
                                                <a href="<?= base_url(); ?>admin/lokasi/edit/<?= $brg['id']; ?>" class="btn-secondary  btn-sm" title="edit"><i class="fas fa-fw fa-edit"></i></a> |
                                                <a href="<?= base_url(); ?>admin/lokasi/hapus/<?= $brg['id']; ?>" class="btn-info  btn-sm" title="hapus" onclick="return confirm('Yakin ingin menghapus data?');"><i class="fas fa-trash-alt"></i></a> |
                                                <a href="<?= base_url(); ?>admin/lokasi/laporanruangan/<?= $brg['id']; ?>" class="btn-dark  btn-sm" title="print"><i class="fas fa-print"></i></a>
                                            </td>
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