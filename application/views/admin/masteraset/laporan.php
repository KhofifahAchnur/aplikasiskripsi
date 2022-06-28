<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="<?= base_url() ?>assets/img/logo.png">
    <title><?= $title_pdf; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        @page {
            margin: 0cm 0cm;
        }

        body {
            margin-top: 2cm;
            margin-left: 1cm;
            margin-right: 1cm;
            margin-bottom: 2cm;
        }

        table tr td,
        table tr th {
            font-size: 12pt;
            /* white-space: ; */
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
    <br>
    <br>
    <table style="width: 110%;">
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
        <strong>LAPORAN MASTER ASET PERALATAN & MESIN</strong>
    </p>
    <?php if ($this->session->userdata('hak_akses') == 1) : ?>
        <?php if ($tgl_awal) : ?>
            <p>Tanggal : <?= $tgl_awal; ?> sd <?= $tgl_akhir; ?></p>
            <?php if ($nama) : ?>
                <p>Filter By Nama Barang : <?= $nama; ?></p>
            <?php endif ?>
        <?php else : ?>
            <p>Tanggal : Semua Data</p>
        <?php endif ?>
    <?php endif ?>
    <table id="customers" class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kode Barang</th>
                <th>Register</th>
                <th>Merk</th>
                <th>Ukuran</th>
                <th>Bahan</th>
                <th>Tahun Peroleh</th>
                <th>Kondisi</th>
                <th>Asal-Usul</th>
                <th>Lokasi</th>
                <th>Tanggal Masuk</th>
                <th>Harga </th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($aset as $brg) : ?>
                <tr>
                    <td align="center"><?= $i++; ?></td>
                    <td align="center"><?= $brg['nama_barang'] ?></td>
                    <td align="center"><?= $brg['kode_barang'] ?></td>
                    <td align="center"><?= $brg['register'] ?></td>
                    <td align="center"><?= $brg['merk'] ?></td>
                    <td align="center"><?= $brg['ukuran'] ?></td>
                    <td align="center"><?= $brg['bahan'] ?></td>
                    <td align="center"><?= $brg['tahun'] ?></td>
                    <td align="center"><?= $brg['kondisi'] ?></td>
                    <td align="center"><?= $brg['asal_usul'] ?></td>
                    <td align="center"><?= $brg['lokasi'] ?></td>
                    <td align="center"><?= $brg['tanggal_masuk'] ?></td>
                    <td align="center"><?= "Rp." . number_format($brg['harga_brg'], 2, ",", "."); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="12" class="text-center">Total Harga Aset</th>
                <th colspan="2"><?= "Rp." . number_format($jumlah_kasmasuk, 2, ",", "."); ?></th>
            </tr>
        </tfoot>
    </table>
    <table width="50%" align="right" border="0" style="margin-top: 20px;">
        <tr>
        <tr>
            <td width="50%"></td>
            <td align="center">Banjarmasin,<?php echo date('d/m/Y'); ?><br>Mengetahui</small><br><br><br><br>Hj. Netta Herawati<br>______<br><strong>Kepala Tata Usaha</strong></td>
        </tr>
        </tr>
    </table>
    <!-- <table>
        <tr>
            <td colspan="3">
                <div style="float: right;">
                    <div style="text-align: end;">
                        <p>Hormat Kami</p>
                        <p>Kepala SDN Handil Bakti</p>

                        <p></p>
                        <p class="me-5">SURYA ABDI, S.Pd</p>
                        <p>NIP.19670505 198804 1 002</p>
                    </div>
                </div>
            </td>
        </tr>
    </table> -->

</body>

</html>