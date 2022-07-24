<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="<?= base_url() ?>assets/img/logo.png">
    <title><?= $title_pdf; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 12pt;
        }
    </style>

    <style>
        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }
    </style>

    <style>
        #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #008b8b;
            color: white;
        }
    </style>
</head>

<body>
    <img src="<?= base_url() ?>adminlte/dist/img/logo.png" style="position: absolute; width: 125px; height: 130px;">
    <table style="width: 103%;">
        <br>
        <br>
        <tr>
            <td align="center">
                <p>
                <h2>SMP NEGERI 15 BANJARMASIN</h2>
                Alamat : Jl. Kuin Uatara No. 6 RT. 04 RW. 01 Kota Banjarmasin Kecamatan Banjarmasin Utara-70127 No Telpon: 0511-3301006</p>
            </td>
        </tr>
    </table><br>
    <hr class="line-title">
    <p align="center">
        <strong>IDENTITAS ASET BUKU / KEPUSTAKAAN </strong>
    </p>
    <table id="customers" class="table table-bordered" style="margin-top: 20px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Gedung</th>
                <th>Kode Gedung</th>
                <th>Register</th>
                <th>Judul</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($buku as $brg) : ?>
                <tr>
                    <td align="center"><?= $i++; ?></td>
                    <td align="center"><?= $brg['nama_buku'] ?></td>
                    <td align="center"><?= $brg['kode_buku'] ?></td>
                    <td align="center"><?= $brg['register'] ?></td>
                    <td align="center"><?= $brg['judul'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>




    <p align="center">
        <strong>LAPORAN DATA KONDISI </strong>
    </p>
    <table id="customers" class="table table-bordered" style="margin-top: 20px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Buku</th>
                <th>Kode Buku</th>
                <th>Register</th>
                <th>Judul</th>
                <th>Kondisi</th>
                <th>Tanggal Masuk</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($kondisi_buku as $brg) : ?>
                <tr>
                    <td align="center"><?= $i++; ?></td>
                    <td align="center"><?= $brg['nama_buku'] ?></td>
                    <td align="center"><?= $brg['kode_buku'] ?></td>
                    <td align="center"><?= $brg['register'] ?></td>
                    <td align="center"><?= $brg['judul'] ?></td>
                    <td align="center"><?= $brg['kondisi'] ?></td>
                    <td align="center"><?= $brg['tanggal'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>

<!-- <div style="text-align: right;">Banjarmasin,<?php echo date('d/m/Y'); ?></div> -->
<table width="50%" align="right" border="0" style="margin-top: 20px;">
    <tr>
    <tr>
        <td width="70%"></td>
        <td align="center">Banjarmasin,<?php echo date('d/m/Y'); ?>
    </tr>
    </tr>
</table>
<table width="100%">
    <td width="85%" align="left">
        <table>
            <tr>
            <tr>

                <td align="center">Kepala Sekolah</small><br><br><br><br>Arbainah, M.Pd<br>NIP. 19660824 198902 2 001<br></td>
            </tr>
            </tr>
        </table>
    </td>
    <td width="14%" align="right">
        <table>
            <tr>
            <tr>
                <!-- <td></td> -->
                <td align="center">Pengurus Barang Pembantu</small><br><br><br><br>Hj. Netta Herawati, S.AP<br>NIP. 19650808 198602 2 004<br></td>
            </tr>
            </tr>
        </table>
    </td>
</table>

    <!-- <table width="50%" align="right" border="0" style="margin-top: 20px;">
        <tr>
        <tr>
            <td width="50%"></td>
            <td align="center">Banjarmasin,<?php echo date('d/m/Y'); ?><br>Mengetahui</small><br><br><br><br>Hj. Netta Herawati<br>______<br><strong>Kepala Tata Usaha</strong></td>
        </tr>
        </tr>
    </table> -->

</body>

</html>