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
        <strong>LAPORAN IDENTITAS ASET PERALATAN & MESIN </strong>
    </p>
    <table id="customers" class="table table-bordered" style="margin-top: 20px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kode Barang</th>
                <th>Register</th>
                <th>Merk</th>
                <th>Kondisi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($barang as $brg) : ?>
                <tr>
                    <td align="center"><?= $i++; ?></td>
                    <td align="center"><?= $brg['nama_barang'] ?></td>
                    <td align="center"><?= $brg['kode_barang'] ?></td>
                    <td align="center"><?= $brg['register'] ?></td>
                    <td align="center"><?= $brg['merk'] ?></td>
                    <td align="center"><?= $brg['kondisi'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- <hr class="line-title"> -->
    <p align="center">
        <strong>LAPORAN PERPINDAHAN ASET PERALATAN & MESIN </strong>
    </p>
    <table id="customers" class="table table-bordered" style="margin-top: 20px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kode Barang</th>
                <th>Register</th>
                <th>Lokasi</th>
                <th>Nama Penanggung Jawab</th>
                <th>Tanggal Perpindahan</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($barang2 as $brg) : ?>
                <tr>
                    <td align="center"><?= $i++; ?></td>
                    <td align="center"><?= $brg['nama_barang'] ?></td>
                    <td align="center"><?= $brg['kode_barang'] ?></td>
                    <td align="center"><?= $brg['register'] ?></td>
                    <td align="center"><?= $brg['lokasi'] ?></td>
                    <td align="center"><?= $brg['nama'] ?></td>
                    <td align="center"><?= $brg['tanggal'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p align="center">
        <strong>LAPORAN PEMELIHARAAN ASET PERALATAN & MESIN</strong>
    </p>
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
                <th>Biaya</th>
                <th>Tanggal Perawatan</th>
                <th>Tanggal Selesai </th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($rawat as $rwt) : ?>
                <tr>
                    <td align="center"><?= $i++; ?></td>
                    <td align="center"><?= $rwt['nama_barang'] ?></td>
                    <td align="center"><?= $rwt['kode_barang'] ?></td>
                    <td align="center"><?= $rwt['register'] ?></td>
                    <td align="center"><?= $rwt['lokasi'] ?></td>
                    <td align="center"><?= $rwt['nama'] ?></td>
                    <td align="center"><?= $rwt['jenis'] ?></td>
                    <td align="center"><?= $rwt['biaya'] ?></td>
                    <td align="center"><?= $rwt['tgl_rawat'] ?></td>
                    <td align="center"><?= $rwt['tgl_selesai'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p align="center">
        <strong>LAPORAN DATA KONDISI ASET PERALATAN & MESIN </strong>
    </p>
    <table id="customers" class="table table-bordered" style="margin-top: 20px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kode Barang</th>
                <th>Register</th>
                <th>Kondisi</th>
                <th>Tanggal Masuk</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($kondisi as $kds) : ?>
                <tr>
                    <td align="center"><?= $i++; ?></td>
                    <td align="center"><?= $kds['nama_barang'] ?></td>
                    <td align="center"><?= $kds['kode_barang'] ?></td>
                    <td align="center"><?= $kds['register'] ?></td>
                    <td align="center"><?= $kds['kondisi'] ?></td>
                    <td align="center"><?= $kds['tanggal'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p align="center">
        <strong>LAPORAN DATA PEMINJAMAN ASET PERALATAN & MESIN </strong>
    </p>
    <table id="customers" class="table table-bordered" style="margin-top: 20px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kode Barang</th>
                <th>Register</th>
                <th>Lokasi</th>
                <th>Keperluan</th>
                <th>Penanggung Jawab</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Kembali </th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($pinjam as $pjm) : ?>
                <tr>
                    <td align="center"><?= $i++; ?></td>
                    <td align="center"><?= $pjm['nama_barang'] ?></td>
                    <td align="center"><?= $pjm['kode_barang'] ?></td>
                    <td align="center"><?= $pjm['register'] ?></td>
                    <td align="center"><?= $pjm['lokasi'] ?></td>
                    <td align="center"><?= $pjm['keperluan'] ?></td>
                    <td align="center"><?= $pjm['nama'] ?></td>
                    <td align="center"><?= $pjm['tgl_pinjam'] ?></td>
                    <td align="center"><?= $pjm['tgl_kembali'] ?></td>
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