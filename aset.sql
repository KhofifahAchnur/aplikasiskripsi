-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2022 pada 04.58
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aset`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset`
--

CREATE TABLE `aset` (
  `id` int(11) NOT NULL,
  `perpindahan_id` int(11) DEFAULT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `register` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `ukuran` varchar(255) NOT NULL,
  `bahan` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `asal_usul` varchar(255) NOT NULL,
  `harga_brg` varchar(255) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `aset`
--

INSERT INTO `aset` (`id`, `perpindahan_id`, `nama_barang`, `kode_barang`, `register`, `merk`, `ukuran`, `bahan`, `tahun`, `kondisi`, `asal_usul`, `harga_brg`, `tanggal_masuk`) VALUES
(1, 20, 'AC Split', '2.2.5.001', '1', 'Sharp/-', '-', 'Electronik', '2012', 'Baik', 'Pembelian', '3950000', '2022-06-20'),
(2, 14, 'AC Unit', '2.2.5.002', '1', 'Sharp/-', '-', 'Plastik', '2008', 'Baik', 'Pembelian', '3500000', '2022-06-20'),
(3, 18, 'AC Unit', '2.2.5.003', '2', 'Sharp/-', '-', 'Plastik', '2011', 'Baik', 'Pembelian', '3500000', '2022-06-20'),
(4, 22, 'AC Unit', '2.2.5.004', '3', 'Sharp/-', '-', 'Besi', '2013', 'Baik', 'Hibah', '4500000', '2022-06-20'),
(5, 20, 'CPU', '2.2.5.005', '1', '-', '-', 'Besi', '2013', 'Baik', 'Pembelian', '3000000', '2022-06-20'),
(6, 19, 'Jam Elektronik', '2.2.5.006', '1', 'Maspion/-', '-', 'Besi, Plastik & Kaca', '2010', 'Baik', 'Pembelian', '100000', '2022-06-20'),
(7, 19, 'Jam Elektronik', '2.2.5.007', '2', 'Mirando/-', '-', 'Plastik dan Kaca', '2009', 'Baik', 'Pembelian', '45000', '2022-06-20'),
(8, 22, 'Kipas Angin ', '2.2.5.008', '1', 'Maspion/-', '-', 'Plastik', '2011', 'Baik', 'Pembelian', '450000', '2022-06-20'),
(9, 19, 'Kipas Angin ', '2.2.5.009', '2', 'Sanyo/-', '-', 'Plastik', '2008', 'Baik', 'Hibah', '400000', '2022-06-20'),
(10, 14, 'Scanner', '2.2.5.010', '1', 'Canon', '-', 'Plastik dan Kaca', '2008', 'Baik', 'Pembelian', '875000', '2022-06-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `nama_buku` varchar(255) NOT NULL,
  `kode_buku` varchar(255) NOT NULL,
  `register` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `spesifikasi` varchar(255) NOT NULL,
  `asal_usul` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `nama_buku`, `kode_buku`, `register`, `judul`, `spesifikasi`, `asal_usul`, `tahun`, `kondisi`, `harga`, `tanggal_masuk`) VALUES
(1, 'Agama Islam', '2.4.9.001', '1', 'Mutiara Akhlak dalam pendidikan Agama Islam kelas VII SMP/MTs/Drs Soepardjo., Ngadiyanto', '-', 'Pembelian', '2009', 'Kurang Baik', '34600', '2022-06-20'),
(2, 'Agama Islam', '2.4.9.002', '2', 'Mutiara Akhlak dalam pendidikan Agama Islam kelas VII SMP/MTs/Drs Soepardjo., Ngadiyanto', '-', 'Pembelian', '2009', 'Baik', '34600', '2022-06-20'),
(3, 'Agama Islam', '2.4.9.003', '3', 'Mutiara Akhlak dalam Pendidikan Agama Islam kelas IX SMP & MTs/H. Soepardjo., Ngadiyanto, S.Ag', '-', 'Pembelian', '2009', 'Baik', '32000', '2022-06-20'),
(4, 'Biologi, Antopologi', '2.4.9.004', '1', 'Sains Biologi 1 kelas VII untuk SMP/MTs/Daroji., Haryati', '-', 'Pembelian', '2009', 'Baik', '30700', '2022-06-20'),
(5, 'Biologi, Antopologi', '2.4.9.005', '2', 'Sains Biologi 1 kelas VII untuk SMP/MTs/Daroji., Haryati', '-', 'Pembelian', '2009', 'Baik', '30700', '2022-06-20'),
(6, 'Biologi, Antopologi', '2.4.9.006', '3', 'IPA Biologi kelas VII/Sri Lestari, S.Si., Wigati Hadi Omegawati, S.Si., Rohana Kusumawati, S.Si', '-', 'Hibah', '2011', 'Baik', '22500', '2022-06-20'),
(7, 'Biologi, Antopologi', '2.4.9.007', '4', 'IPA Biologi Eksplorasi Kelas VIII/Sri Lestari, S.Si., Wigati Hadi Omegawati, S.Si., Rohana Kusumawati, S.Si', '-', 'Hibah', '2011', 'Baik', '22500', '2022-06-20'),
(8, 'Buku Geografi, Biografi , Sejarah Lain-lain', '2.4.9.008', '1', 'Platinum Pembelajaran IPS Terpadu untuk kelas VII SMP dan MTs/Sardiman., Endang Mulyani., Dyah Respati Suryo', '-', 'Pembelian', '2010', 'Baik', '24000', '2022-06-20'),
(9, 'Buku Geografi, Biografi , Sejarah Lain-lain', '2.4.9.009', '2', 'Platinum Pembelajaran IPS Terpadu untuk kelas VII SMP dan MTs/Sardiman., Endang Mulyani., Dyah Respati Suryo', '-', 'Pembelian', '2010', 'Baik', '24000', '2022-06-20'),
(10, 'Buku Geografi, Biografi , Sejarah Lain-lain', '2.4.9.010', '3', 'Platinum Pembelajaran IPS Terpadu untuk kelas VIII SMP dan MTs/Sardiman., Muhsinatun Siasah., Endang Mulyani., Dyah Respati Suryo', '-', 'Pembelian', '2010', 'Baik', '25000', '2022-06-20'),
(11, 'Buku Matematika & Pengetahuan Alam Lain-lain', '2.4.9.011', '1', 'Belajar IPA kelas VIII SMP/MTs /Saeful Karim., Ida Kurniawati., Yuli Nurul Fauziah., Wahyu Sopandi', '-', 'Hibah', '2009', 'Baik', '20622', '2022-06-21'),
(12, 'Buku Matematika & Pengetahuan Alam Lain-lain', '2.4.9.012', '2', 'Belajar IPA kelas VIII SMP/MTs /Saeful Karim., Ida Kurniawati., Yuli Nurul Fauziah., Wahyu Sopandi', '-', 'Hibah', '2009', 'Baik', '20622', '2022-06-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gedung`
--

CREATE TABLE `gedung` (
  `id_gedung` int(11) NOT NULL,
  `nama_gedung` varchar(255) NOT NULL,
  `kode_gedung` varchar(255) NOT NULL,
  `register` varchar(255) NOT NULL,
  `tingkat` varchar(255) NOT NULL,
  `beton` varchar(255) NOT NULL,
  `luas` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `asal_usul` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gedung`
--

INSERT INTO `gedung` (`id_gedung`, `nama_gedung`, `kode_gedung`, `register`, `tingkat`, `beton`, `luas`, `lokasi`, `tahun`, `kondisi`, `status`, `asal_usul`, `harga`, `tanggal_masuk`) VALUES
(7, 'Bangunan Gedung Laboratorium Semi Permanen', '2.8.6.001', '1', 'Tidak Bertingkat', 'Beton', '126', 'jl. kuin utara Rt. 4 No. 6 kecamatan Banjarmasin Utara, Kota Banjarmasin', '2000', 'Baik', 'Hak Pakai', 'Pembelian', '58000000', '2022-06-20'),
(8, 'Bangunan Gedung Tempat Ibadah Semi Permanen', '2.8.6.002', '1', 'Tidak Bertingkat', 'Beton', '69', 'Jl. kuin utara Rt. 4 No. 6 kecamatan Banjarmasin Utara, Kota Banjarmasin', '1996', 'Baik', 'Hak Pakai', 'Pembelian', '13300000', '2022-06-20'),
(9, 'Bangunan Gedung Tempat Pendidikan Semi Permanen', '2.8.6.003', '1', 'Tidak Bertingkat', 'Beton', '126', 'Jl. kuin utara Rt. 4 No. 6 kecamatan Banjarmasin Utara, Kota Banjarmasin', '1994', 'Baik', 'Hak Pakai', 'Pembelian', '46400000', '2022-06-20'),
(10, 'Bangunan Gedung Tempat Pendidikan Semi Permanen', '2.8.6.004', '2', 'Tidak Bertingkat', 'Beton', '252', 'Jl. kuin utara Rt. 4 No. 6 kecamatan Banjarmasin Utara, Kota Banjarmasin', '1995', 'Baik', 'Hak Pakai', 'Pembelian', '38600000', '2022-06-20'),
(11, 'Bangunan Gedung Tempat Pendidikan Semi Permanen', '2.8.6.005', '3', 'Bertingkat', 'Beton', '252', 'Jl. kuin utara Rt. 4 No. 6 kecamatan Banjarmasin Utara, Kota Banjarmasin', '1997', 'Baik', 'Hak Pakai', 'Pembelian', '58000000', '2022-06-20'),
(12, 'Bangunan Kamar Mandi', '2.8.6.006', '1', 'Tidak Bertingkat', 'Beton', '21', 'Jl. kuin utara Rt. 4 No. 6 kecamatan Banjarmasin Utara, Kota Banjarmasin', '1987', 'Baik', 'Hak Pakai', 'Pembelian', '3100000', '2022-06-20'),
(13, 'Bangunan Kamar Mandi', '2.8.6.007', '2', 'Tidak Bertingkat', 'Beton', '21', 'Jl. kuin utara Rt. 4 No. 6 kecamatan Banjarmasin Utara, Kota Banjarmasin', '1988', 'Baik', 'Hak Pakai', 'Pembelian', '3500000', '2022-06-20'),
(14, 'Bangunan Kamar Mandi', '2.8.6.008', '3', 'Tidak Bertingkat', 'Beton', '21', 'Jl. kuin utara Rt. 4 No. 6 kecamatan Banjarmasin Utara, Kota Banjarmasin', '1988', 'Baik', 'Hak Pakai', 'Pembelian', '3500000', '2022-06-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `keterangan`, `hak_akses`) VALUES
(3, 'admin', 1),
(4, 'guru', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_kondisi`
--

CREATE TABLE `history_kondisi` (
  `id` int(11) NOT NULL,
  `aset_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kondisi` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_konfirmasi`
--

CREATE TABLE `history_konfirmasi` (
  `id_konfir` int(11) NOT NULL,
  `pengajuan_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tgl_konfir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_perpindahan`
--

CREATE TABLE `history_perpindahan` (
  `id` int(11) NOT NULL,
  `aset_id` int(11) NOT NULL,
  `lokasi_id` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `history_perpindahan`
--

INSERT INTO `history_perpindahan` (`id`, `aset_id`, `lokasi_id`, `tanggal`) VALUES
(1, 3, 18, '2022-06-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jalan`
--

CREATE TABLE `jalan` (
  `id_jalan` int(11) NOT NULL,
  `nama_aset` varchar(255) NOT NULL,
  `kode_aset` varchar(255) NOT NULL,
  `register` varchar(255) NOT NULL,
  `konstruksi` varchar(255) NOT NULL,
  `luas` varchar(255) NOT NULL,
  `tahun` varchar(128) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `asal_usul` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jalan`
--

INSERT INTO `jalan` (`id_jalan`, `nama_aset`, `kode_aset`, `register`, `konstruksi`, `luas`, `tahun`, `kondisi`, `status`, `asal_usul`, `harga`, `tanggal_masuk`) VALUES
(1, 'Jaringan Distribusi Tegangan 1 s/d 20 KVA', '2.6.8.001', '1', '-', '300', '2011', 'Baik', 'Hak Pakai', 'Pembelian', '4500000', '2022-06-20'),
(2, 'Jaringan Sambungan Kerumah Kapasitas Sedang', '2.6.8.002', '1', 'Beton', '82', '1988', 'Baik', 'Hak Pakai', 'Pembelian', '750000', '2022-06-20'),
(3, 'Jaringan Telepon Di atas Tanah Kapasitas Sedang', '2.6.8.003', '1', 'Beton', '-', '1990', 'Baik', 'Hak Pakai', 'Pembelian', '500000', '2022-06-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kondisi_buku`
--

CREATE TABLE `kondisi_buku` (
  `id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kondisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kondisi_gedung`
--

CREATE TABLE `kondisi_gedung` (
  `id` int(11) NOT NULL,
  `gedung_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kondisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `lokasi` varchar(128) NOT NULL,
  `penanggung_jawab_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id`, `lokasi`, `penanggung_jawab_id`) VALUES
(11, 'Gudang', 9),
(14, 'Ruang OSIS', 4),
(18, 'Ruang Lab Komputer', 6),
(19, 'Ruang Lab Bahasa', 7),
(20, 'Ruang Lab IPA', 8),
(22, 'Ruang BK', 12),
(24, 'SMPN 15 Banjarmasin', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeliharaan`
--

CREATE TABLE `pemeliharaan` (
  `id_pemeliharaan` int(11) NOT NULL,
  `gedung_id` int(11) NOT NULL,
  `penanggung_jawab_id` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `biaya` varchar(255) NOT NULL,
  `tgl_pemeliharaan` date NOT NULL,
  `tgl_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int(11) NOT NULL,
  `aset_id` int(11) NOT NULL,
  `lokasi_id` int(11) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `penanggung_jawab_id` int(255) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penanggung_jawab`
--

CREATE TABLE `penanggung_jawab` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penanggung_jawab`
--

INSERT INTO `penanggung_jawab` (`id`, `nama`, `nip`, `username`, `password`, `hak_akses`) VALUES
(4, 'Iwan Adi Pratama, S.Pd', '198002202009031000', 'IwanAPratama', '674f3c2c1a8a6f90461e8a66fb5550ba', 2),
(6, 'Sudiatmoko, S.Pd', '197008271994031000', 'Sudiatmoko', '674f3c2c1a8a6f90461e8a66fb5550ba', 2),
(7, 'Norhadiyah, S.Pd', '-', 'Norhadiyah', '674f3c2c1a8a6f90461e8a66fb5550ba', 2),
(8, 'Hj. Risnawati', '196802151995122000', 'Risnawati', '674f3c2c1a8a6f90461e8a66fb5550ba', 2),
(9, 'Dra. Hj. ST. RAHIMAH', '196202161986032000', 'Rahimah', '674f3c2c1a8a6f90461e8a66fb5550ba', 2),
(12, 'Dra. Hj. Rasuna', '196605311995122000', 'Rasuna', '674f3c2c1a8a6f90461e8a66fb5550ba', 2),
(13, 'Hj Netta Herawati', '-', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(15, 'tes', '0987654345678', 'll', 'd15e51c405ed3023e1f278a175f25e0f', 2),
(16, 'Hj . ST Rahimah', '0987654345678', 'sapras', '674f3c2c1a8a6f90461e8a66fb5550ba', 3),
(17, 'Makhruddin', '0987654345678', 'Makhruddin', '674f3c2c1a8a6f90461e8a66fb5550ba', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(11) NOT NULL,
  `aset` varchar(255) NOT NULL,
  `des` varchar(128) NOT NULL,
  `lokasi_id` int(11) NOT NULL,
  `penanggung_jawab_id` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penghapusan`
--

CREATE TABLE `penghapusan` (
  `id` int(11) NOT NULL,
  `aset_id` int(11) NOT NULL,
  `lokasi_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tgl_hapus` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penghapusan`
--

INSERT INTO `penghapusan` (`id`, `aset_id`, `lokasi_id`, `status`, `tgl_hapus`) VALUES
(1, 1, 20, 'Dihapus', '2022-06-01'),
(2, 1, 20, 'Dihapus', '2022-06-01'),
(3, 10, 14, 'Dihapus', '2022-06-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perawatan`
--

CREATE TABLE `perawatan` (
  `id_rawat` int(11) NOT NULL,
  `aset_id` int(255) NOT NULL,
  `lokasi_id` int(11) NOT NULL,
  `penanggung_jawab_id` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `biaya` varchar(255) NOT NULL,
  `tgl_rawat` date NOT NULL,
  `tgl_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanah`
--

CREATE TABLE `tanah` (
  `id_tanah` int(11) NOT NULL,
  `nama_tanah` varchar(255) NOT NULL,
  `kode_tanah` varchar(255) NOT NULL,
  `register` varchar(255) NOT NULL,
  `luas` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `hak` varchar(255) NOT NULL,
  `nomer` varchar(255) NOT NULL,
  `asal_usul` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tanah`
--

INSERT INTO `tanah` (`id_tanah`, `nama_tanah`, `kode_tanah`, `register`, `luas`, `tahun`, `lokasi`, `hak`, `nomer`, `asal_usul`, `harga`, `tanggal_masuk`) VALUES
(1, 'Tanah Bangunan Pendidikan dan Latihan (Sekolah)', '2.3.7.001', '1', '16168', '1984', 'Jl. kuin utara Rt. 4 No. 6 kecamatan Banjarmasin Utara, Kota Banjarmasin', 'Hak Pakai', '3/2/1994', 'Pembelian', '1035800000', '2022-06-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(3, 'Admin', 'nettaherawati.ac@gmail.com', 'default.jpg', '$2y$10$an1wkcbT1W6hf/dFTVC5G.ZQOeYnCbKVzQfzFaHmp76IFKMx.akFm', 1, 1, 1641350622),
(7, 'IwanA.Pratama', 'Iwanpratama@gmail.com', 'default.jpg', '$2y$10$KMlaZUw6dzY5k4otjkgsXuvZoNuifMZu48siXb1T/SqraUmZTL36W', 2, 1, 1643195282),
(8, 'Risnawati', 'risnawati@gmail.com', 'default.jpg', '$2y$10$atZvR97pF5H5QcqoxrS7j.XW/ndCnyYWC6sVVuh70zpnOkP7fXaQ.', 2, 1, 1643195388),
(9, 'Sudiatmoko', 'sudiatmoko@gmail.com', 'default.jpg', '$2y$10$Q1KLtL7WVMiNMjIowxlaN.P9NSOkWkdvyiWfv.xkLyOpyLfJTF5Fi', 2, 1, 1643195447),
(10, 'Rasuna', 'rasuna@gmail.com', 'default.jpg', '$2y$10$J/SVvthC1dx0evko5XW/mu/9N3EsQyT2Mh0rZQP8W/0albzGp3uHa', 2, 1, 1643195474);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`id_gedung`);

--
-- Indeks untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `history_kondisi`
--
ALTER TABLE `history_kondisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `history_konfirmasi`
--
ALTER TABLE `history_konfirmasi`
  ADD PRIMARY KEY (`id_konfir`);

--
-- Indeks untuk tabel `history_perpindahan`
--
ALTER TABLE `history_perpindahan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jalan`
--
ALTER TABLE `jalan`
  ADD PRIMARY KEY (`id_jalan`);

--
-- Indeks untuk tabel `kondisi_buku`
--
ALTER TABLE `kondisi_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kondisi_gedung`
--
ALTER TABLE `kondisi_gedung`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  ADD PRIMARY KEY (`id_pemeliharaan`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indeks untuk tabel `penanggung_jawab`
--
ALTER TABLE `penanggung_jawab`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penghapusan`
--
ALTER TABLE `penghapusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perawatan`
--
ALTER TABLE `perawatan`
  ADD PRIMARY KEY (`id_rawat`);

--
-- Indeks untuk tabel `tanah`
--
ALTER TABLE `tanah`
  ADD PRIMARY KEY (`id_tanah`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aset`
--
ALTER TABLE `aset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `gedung`
--
ALTER TABLE `gedung`
  MODIFY `id_gedung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `history_kondisi`
--
ALTER TABLE `history_kondisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `history_konfirmasi`
--
ALTER TABLE `history_konfirmasi`
  MODIFY `id_konfir` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `history_perpindahan`
--
ALTER TABLE `history_perpindahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jalan`
--
ALTER TABLE `jalan`
  MODIFY `id_jalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kondisi_buku`
--
ALTER TABLE `kondisi_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kondisi_gedung`
--
ALTER TABLE `kondisi_gedung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  MODIFY `id_pemeliharaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penanggung_jawab`
--
ALTER TABLE `penanggung_jawab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penghapusan`
--
ALTER TABLE `penghapusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `perawatan`
--
ALTER TABLE `perawatan`
  MODIFY `id_rawat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tanah`
--
ALTER TABLE `tanah`
  MODIFY `id_tanah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
