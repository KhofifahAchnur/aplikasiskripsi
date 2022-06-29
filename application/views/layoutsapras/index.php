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
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $jumlah_tanah ?></h3>
                            <h4><strong> Data Aset Tanah</strong></h4>
                        </div>
                        <div class="icon">
                            <i class="far fa-folder-open"></i>
                        </div>
                        <a href="<?= base_url('sapras/tanah') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $jumlah_aset ?></h3>
                            <h4><strong>Data Aset Peralatan & Mesin</strong></h4>
                        </div>
                        <div class="icon">
                            <i class="far fa-folder-open"></i>
                        </div>
                        <a href="<?= base_url('sapras/masteraset') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $jumlah_gedung?></h3>
                            <h4><strong>Data Aset Gedung & Bangunan</strong></h4>
                        </div>
                        <div class="icon">
                            <i class="far fa-folder-open"></i>
                        </div>
                        <a href="<?= base_url('sapras/gedung') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3><?= $jumlah_buku ?></h3>
                            <h4><strong>Data Aset Buku</strong></h4>
                        </div>
                        <div class="icon">
                            <i class="far fa-folder-open"></i>
                        </div>
                        <a href="<?= base_url('sapras/buku') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?= $jumlah_jalan?></h3>
                            <h4><strong>Data Aset Jalan, Irigasi & Jaringan</strong></h4>
                        </div>
                        <div class="icon">
                            <i class="far fa-folder-open"></i>
                        </div>
                        <a href="<?= base_url('sapras/jalan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="content-header">
        <!--  -->
            <!-- /.row -->
            <!-- <div class="card"> -->
         <!-- <div class="card-body shadow">
           <div class="row">
             <div class="d-flex no-block align-items-center">
               <div>
                 <!-- <img src="<?= base_url('Adminlte/dist/img/11.jpg'); ?>" width="1590" /> -->
               <!-- </div> -->
             </div>
           </div>
         </div>
       </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>