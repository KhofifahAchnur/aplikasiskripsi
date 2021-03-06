<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan Pengajuan Pemeliharaan Aset Peralatan & Mesin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Pengajuan Pemeliharaan Aset Peralatan & Mesin</li>
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
                            <form action="<?= base_url(); ?>/admin/Pengajuan/filter">
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
                                        <select name="aset" id="aset" class="form-control select2">
                                            <option value="" selected disabled></option>
                                            <?php foreach ($aset as $a) : ?>
                                                <option value="<?= $a['aset']; ?>" <?= (@$_GET['aset'] == $a['aset']) ? 'Selected' : ''; ?>><?= $a['aset']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" name="filter" value="true" class="btn btn-primary">TAMPILKAN</button>
                                <?php if (isset($_GET['filter'])) : ?>
                                    <a href="<?= base_url('admin/pengajuan/filter'); ?>" class="btn btn-default">RESET</a>
                                <?php endif; ?>
                            </form>
                            <br>
                            <?php if (isset($_GET['filter'])) : ?>
                                <p>Tanggal : <?= $tgl_awal; ?> sd <?= $tgl_akhir; ?></p>

                                    <!-- Cetak Filter Tanggal & Nama -->
                                <?php if (isset($_GET['aset'])) : ?>
                                    <form action="<?= base_url('admin/Pengajuan/laporan'); ?>" target="_blank">
                                        <p>Nama aset : <?= $nm_aset; ?></p>
                                        <input type="hidden" id="tgl_awalcetak" name="tgl_awalcetak" value="<?= @$_GET['tgl_awal'] ?>">
                                        <input type="hidden" id="tgl_akhircetak" name="tgl_akhircetak" value="<?= @$_GET['tgl_akhir'] ?>">
                                        <input type="hidden" id="aset" name="aset" value="<?= @$_GET['aset'] ?>">
                                        <button type="submit" value="true" class="btn btn-success">Cetak</button>
                                    </form>
                                <?php else : ?>
                                
                                <form action="<?= base_url('admin/pengajuan/laporan'); ?>" target="_blank">
                                    <button type="submit" value="true" class="btn btn-success">Cetak</button>
                                    <input type="hidden" id="tgl_awalcetak" name="tgl_awalcetak" value="<?= @$_GET['tgl_awal'] ?>">
                                    <input type="hidden" id="tgl_akhircetak" name="tgl_akhircetak" value="<?= @$_GET['tgl_akhir'] ?>">
                                </form>
                                <?php endif ?>  
                            <?php else : ?>

                                <!-- Cetak Semua Data -->
                                <p>Cetak Semua Data</p>
                                <form action="<?= base_url('admin/Pengajuan/laporan'); ?>" target="_blank">
                                    <button type="submit" value="true" class="btn btn-success">Cetak</button>
                                </form>
                            <?php endif ?>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>Nama Aset</th>
                                        <th>Deskripsi</th>
                                        <th>Lokasi</th>
                                        <th>Penanggung Jawab</th>
                                        <th>Jenis Pengajuan</th>
                                        <th>Status</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th class="text-center">Aksi</th>
                                    </thead>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1;
                                    foreach ($pengajuan as $brg) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $brg['aset'] ?></td>
                                            <td><?= $brg['des'] ?></td>
                                            <td><?= $brg['lokasi'] ?></td>
                                            <td><?= $brg['nama'] ?></td>
                                            <td><?= $brg['jenis'] ?></td>
                                            <td><?= $brg['status'] ?></td>
                                            <td><?= $brg['tanggal'] ?></td>
                                            <td style="width: 100px;" class="text-center">
                                                <a href="<?= base_url(); ?>admin/pengajuan/edit/<?= $brg['id']; ?>" class="btn-secondary  btn-sm" title="edit"><i class="fas fa-fw fa-edit"></i></a> |
                                                <a href="<?= base_url(); ?>admin/pengajuan/hapus/<?= $brg['id']; ?>" class="btn-info  btn-sm" title="hapus" onclick="return confirm('Yakin ingin menghapus data?');"><i class="fas fa-trash-alt"></i></a>
                                                <a href="<?= base_url(); ?>admin/konfirmasi/tambah/<?= $brg['id']; ?>" class="badge badge-pill badge-dark">UBAH KONFIRMASI</a>
                                            </td>
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