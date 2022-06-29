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
            background-color: #4CAF50;
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
                Alamat : Jl. Kuin Uatara No. 6 RT. 04 RW. 01 Kota Banjarmasin Kecamatan Banjarmasin Utara-70127 No Telpon: 0511 3301006 </p>
            </td>
        </tr>
    </table><br>
    <hr class="line-title">
    <p align="center">
        <strong>LAPORAN PEMELIHARAAN ASET GEDUNG & BANGUNAN</strong>
    </p>
    <?php if ($this->session->userdata('hak_akses') == 1) : ?>
        <?php if ($tgl_awal) : ?>
            <p>Tanggal : <?= $tgl_awal; ?> sd <?= $tgl_akhir; ?></p>
            <?php if ($nama_gedung) : ?>
                <p>Filter By Nama Gedung : <?= $nama_gedung; ?></p>
            <?php endif ?>
        <?php else : ?>
            <p>Tanggal : Semua Data</p>
        <?php endif ?>
    <?php endif ?>
    <table id="customers" class="table table-bordered" style="margin-top: 20px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kode Barang</th>
                <th>Register</th>
                <th>Lokasi</th>
                <th>Penanggung Jawab</th>
                <th>Jenis Pemeliharaan</th>
                <th>Tanggal Pemeliharaan</th>
                <th>Tanggal Selesai </th>
                <th>Biaya</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($pemeliharaan as $pln) : ?>
                <tr>
                    <td align="center"><?= $i++; ?></td>
                    <td align="center"><?= $pln['nama_gedung'] ?></td>
                    <td align="center"><?= $pln['kode_gedung'] ?></td>
                    <td align="center"><?= $pln['register'] ?></td>
                    <td align="center"><?= $pln['lokasi'] ?></td>
                    <td align="center"><?= $pln['nama'] ?></td>
                    <td align="center"><?= $pln['jenis'] ?></td>
                    <td align="center"><?= $pln['tgl_pemeliharaan'] ?></td>
                    <td align="center"><?= $pln['tgl_selesai'] ?></td>
                    <td align="center"><?= "Rp." . number_format($pln['biaya'], 2, ",", "."); ?></td>
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
    <table width="20%" align="right" border="0" style="margin-top: 10px;">
        <tr>
        <tr>
            <td width="50%"></td>
            <td align="center">Banjarmasin,<?php echo date('d/m/Y'); ?><br>Mengetahui</small><br><br><br><br>Hj. Netta Herawati<br>______<br><strong>Kepala Tata Usaha</strong></td>
        </tr>
        </tr>
    </table>

</body>

</html>