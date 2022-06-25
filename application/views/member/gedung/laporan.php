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
                Alamat : Jl. Kuin Uatara No. 6 RT. 04 RW. 01 Kota Banjarmasin Kecamatan Banjarmasin Utara-70127 No Telpon: 0511-3301006</p>
            </td>
        </tr>
    </table><br>
    <hr class="line-title">
    <p align="center">
        <strong>LAPORAN ASET GEDUNG & BANGUNAN</strong>
    </p>
    <p>Tanggal : <?= $tgl_awal; ?> sd <?= $tgl_akhir; ?></p>
    <table id="customers" class="table table-bordered" style="margin-top: 20px;">
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
                <th>Harga Barang</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($gedung as $gdg) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td align="center"><?= $gdg['nama_gedung'] ?></td>
                    <td align="center"><?= $gdg['kode_gedung'] ?></td>
                    <td align="center"><?= $gdg['register'] ?></td>
                    <td align="center"><?= $gdg['tingkat'] ?></td>
                    <td align="center"><?= $gdg['beton'] ?></td>
                    <td align="center"><?= $gdg['luas'] ?></td>
                    <td align="center"><?= $gdg['lokasi'] ?></td>
                    <td align="center"><?= $gdg['tahun'] ?></td>
                    <td align="center"><?= $gdg['kondisi'] ?></td>
                    <td align="center"><?= $gdg['status'] ?></td>
                    <td align="center"><?= $gdg['asal_usul'] ?></td>
                    <td align="center"><?= $gdg['harga'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <table width="50%" align="right" border="0" style="margin-top: 20px;">
        <tr>
        <tr>
            <td width="50%"></td>
            <td align="center">Banjarmasin,<?php echo date('d/m/Y'); ?><br>Mengetahui</small><br><br><br><br>Hj. Netta Herawati<br>______<br><strong>Kepala Tata Usaha</strong></td>
        </tr>
        </tr>
    </table>

</body>

</html>