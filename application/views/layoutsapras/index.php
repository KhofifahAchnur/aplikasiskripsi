<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-4 col-12">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $jumlah_pbaru ?></h3>
                            <h4><strong> Data Penganjuan Aset Baru</strong></h4>
                        </div>
                        <div class="icon">
                            <i class="far fa-folder-open"></i>
                        </div>
                        <a href="<?= base_url('admin/pbaru') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-9">
                    <!-- small box -->
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3><?= $jumlah_pengajuan ?></h3>
                            <h4><strong>Data Pengajuan Pemeliharaan Peralatan & Mesin</strong></h4>
                        </div>
                        <div class="icon">
                            <i class="far fa-folder-open"></i>
                        </div>
                        <a href="<?= base_url('admin/pengajuan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-9">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $jumlah_pgedung?></h3>
                            <h4><strong>Data Pengajuan Pemeliharaan Gedung & Bangunan Aset </strong></h4>
                        </div>
                        <div class="icon">
                            <i class="far fa-folder-open"></i>
                        </div>
                        <a href="<?= base_url('admin/pgedung') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <!-- <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <!-- <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $jumlah_lokasi ?></h3>
                            <h4><strong>Data Lokasi Aset</strong></h4>
                        </div>
                        <div class="icon">
                            <i class="far fa-folder-open"></i>
                        </div>
                        <a href="<?= base_url('admin/lokasi') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div> -->
                <!-- </div> -->
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- <div class="card">
         <div class="card-body shadow">
           <div class="row">
             <div class="d-flex no-block align-items-center">
               <div>
                 <img src="<?= base_url('Adminlte/dist/img/11.jpg'); ?>" width="1590" />
               </div>
             </div>
           </div> -->
         </div>
       </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>