<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan Aset Gedung</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Aset Gedung</li>
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
                            <form action="<?= base_url(); ?>/admin/gedung/filter">
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
                                <button type="submit" name="filter" value="true" class="btn btn-primary">TAMPILKAN</button>
                                <?php if (isset($_GET['filter'])) : ?>
                                    <a href="<?= base_url('admin/gedung/filter'); ?>" class="btn btn-default">RESET</a>
                                <?php endif; ?>
                            </form>
                            <br>
                            <?php if (isset($_GET['filter'])) : ?>
                                <p>Tanggal : <?= $tgl_awal; ?> sd <?= $tgl_akhir; ?></p>
                                <form action="<?= base_url('admin/gedung/laporan'); ?>" target="_blank">
                                    <button type="submit" value="true" class="btn btn-success">Cetak</button>
                                    <input type="hidden" id="tgl_awalcetak" name="tgl_awalcetak" value="<?= @$_GET['tgl_awal'] ?>">
                                    <input type="hidden" id="tgl_akhircetak" name="tgl_akhircetak" value="<?= @$_GET['tgl_akhir'] ?>">
                                </form>
                            <?php endif ?>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Kode</th>
                                            <th>Register</th>
                                            <th>Bertingkat</th>
                                            <th>Beton</th>
                                            <th>Luas</th>
                                            <th>Lokasi</th>
                                            <th>Tahun Peroleh</th>
                                            <th>Kondisi</th>
                                            <th>Status</th>
                                            <th>Asal-Usul</th>
                                            <th>Harga Gedung</th>
                                            <th>Tanggal Masuk</th>
                                    </thead>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($gedung as $gdg) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $gdg['nama_gedung'] ?></td>
                                                <td><?= $gdg['kode_gedung'] ?></td>
                                                <td><?= $gdg['register'] ?></td>
                                                <td><?= $gdg['tingkat'] ?></td>
                                                <td><?= $gdg['beton'] ?></td>
                                                <td><?= $gdg['luas'] ?></td>
                                                <td><?= $gdg['lokasi'] ?></td>
                                                <td><?= $gdg['tahun'] ?></td>
                                                <td><?= $gdg['kondisi'] ?></td>
                                                <td><?= $gdg['status'] ?></td>
                                                <td><?= $gdg['asal_usul'] ?></td>
                                                <td><?= "Rp." . number_format($gdg['harga'], 2, ",", "."); ?></td>
                                                <td><?= $gdg['tanggal_masuk'] ?></td>
                                            </tr>
                                        <?php endforeach; ?>
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
<!-- <script>
    $(document).ready(function() {
        setDateRangePicker(".tgl_awal", ".tgl_akhir")
    })
</script> -->