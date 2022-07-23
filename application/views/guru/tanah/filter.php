<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan Aset Tanah</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('guru/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Aset Tanah</li>
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
                            <form action="<?= base_url(); ?>/guru/tanah/filter">
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
                                    <a href="<?= base_url('guru/tanah/filter'); ?>" class="btn btn-default">RESET</a>
                                <?php endif; ?>
                            </form>
                            <br>
                            <?php if (isset($_GET['filter'])) : ?>
                                <p>Tanggal : <?= $tgl_awal; ?> sd <?= $tgl_akhir; ?></p>
                                <form action="<?= base_url('guru/tanah/laporan'); ?>" target="_blank">
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
                                            <th>Nama Tanah</th>
                                            <th>Kode Tanah</th>
                                            <th>Register</th>
                                            <th>Luas</th>
                                            <th>Tahun Peroleh</th>
                                            <th>Lokasi</th>
                                            <th>Hak</th>
                                            <th>Nomer</th>
                                            <th>Asal-Usul</th>
                                            <th>Harga Barang</th>
                                            <th>Tanggal Peroleh</th>
                                        </tr>
                                    </thead>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($tanah as $brg) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $brg['nama_tanah'] ?></td>
                                                <td><?= $brg['kode_tanah'] ?></td>
                                                <td><?= $brg['register'] ?></td>
                                                <td><?= $brg['luas'] ?></td>
                                                <td><?= $brg['tahun'] ?></td>
                                                <td><?= $brg['lokasi'] ?></td>
                                                <td><?= $brg['hak'] ?></td>
                                                <td><?= $brg['nomer'] ?></td>
                                                <td><?= $brg['asal_usul'] ?></td>
                                                <td><?= "Rp." . number_format($brg['harga'], 2, ",", "."); ?></td>
                                                <td><?= $brg['tanggal_masuk'] ?></td>
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