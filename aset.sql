-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Agu 2022 pada 18.27
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
(1, 3, 'Printer', '2.2.5.001', '1', 'Canon/-', '-', 'Plastik dan Kaca', '2022', 'Baik', 'Pembelian', '875000', '2022-06-20'),
(2, 2, 'Printer', '2.2.5.002', '2', 'Canon/-', '-', 'Plastik dan Kaca', '2022', 'Baik', 'Pembelian', '875000', '2022-06-20'),
(3, 12, 'Jam Elektronik', '2.2.5.003', '1', 'Maspion/-', '-', 'Besi, Plastik & Kaca', '2022', 'Rusak Berat', 'Pembelian', '45000', '2022-06-20'),
(4, 11, 'Jam Elektronik', '2.2.5.004', '2', 'Mirando/-', '-', 'Plastik dan Kaca', '2022', 'Rusak Berat', 'Pembelian', '45000', '2022-06-20'),
(5, 2, 'Jam Elektronik', '2.2.5.005', '3', 'Mirando/-', '-', 'Plastik dan Kaca', '2022', 'Rusak Berat', 'Pembelian', '45000', '2022-06-20'),
(6, 5, 'AC Split', '2.2.5.006', '1', 'Sharp-/', '-', 'Electronik', '2022', 'Baik', 'Pembelian', '3950000', '2022-06-20'),
(7, 5, 'Microphone', '2.2.5.007', '1', 'Behringer XM8500', '-', 'Besi & Plastik', '2022', 'Kurang Baik', 'Pembelian', '500000', '2022-06-20'),
(8, 5, 'Kursi Tamu ', '2.2.5.008', '1', 'Jepara', '-', 'Kayu', '2022', 'Baik', 'Pembelian', '200000', '2022-06-28'),
(9, 5, 'Kursi Tamu', '2.2.5.009', '2', 'Jepara', '-', 'Kayu', '2022', 'Baik', 'Pembelian', '200000', '2022-06-28'),
(10, 2, 'Kipas Angin ', '2.2.5.010', '1', 'Miyako/-', '-', 'Plastik ', '2022', 'Baik', 'Pembelian', '350000', '2022-07-20');

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
(4, 'Biologi, Antopologi', '2.4.9.004', '1', 'Sains Biologi 1 kelas VII untuk SMP/MTs/Daroji., Haryati', '-', 'Pembelian', '2009', 'Kurang Baik', '30700', '2022-06-20'),
(5, 'Biologi, Antopologi', '2.4.9.005', '2', 'Sains Biologi 1 kelas VII untuk SMP/MTs/Daroji., Haryati', '-', 'Pembelian', '2009', 'Baik', '30700', '2022-06-20'),
(6, 'Biologi, Antopologi', '2.4.9.006', '3', 'IPA Biologi kelas VII/Sri Lestari, S.Si., Wigati Hadi Omegawati, S.Si., Rohana Kusumawati, S.Si', '-', 'Hibah', '2011', 'Baik', '22500', '2022-06-20'),
(7, 'Biologi, Antopologi', '2.4.9.007', '4', 'IPA Biologi Eksplorasi Kelas VIII/Sri Lestari, S.Si., Wigati Hadi Omegawati, S.Si., Rohana Kusumawati, S.Si', '-', 'Hibah', '2011', 'Baik', '22500', '2022-06-20'),
(8, 'Buku Geografi, Biografi , Sejarah Lain-lain', '2.4.9.008', '1', 'Platinum Pembelajaran IPS Terpadu untuk kelas VII SMP dan MTs/Sardiman., Endang Mulyani., Dyah Respati Suryo', '-', 'Pembelian', '2010', 'Rusak Berat', '24000', '2022-06-20'),
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
(1, 'Bangunan Gedung Laboratorium Semi Permanen', '2.8.6.001', '1', 'Tidak Bertingkat', 'Beton', '126', 'jl. kuin utara Rt. 4 No. 6 kecamatan Banjarmasin Utara, Kota Banjarmasin', '2000', 'Baik', 'Hak Pakai', 'Pembelian', '58000000', '2022-06-20'),
(2, 'Bangunan Gedung Tempat Ibadah Semi Permanen', '2.8.6.002', '1', 'Tidak Bertingkat', 'Beton', '69', 'Jl. kuin utara Rt. 4 No. 6 kecamatan Banjarmasin Utara, Kota Banjarmasin', '1996', 'Baik', 'Hak Pakai', 'Pembelian', '13300000', '2022-06-20'),
(3, 'Bangunan Gedung Tempat Pendidikan Semi Permanen', '2.8.6.003', '1', 'Tidak Bertingkat', 'Beton', '126', 'Jl. kuin utara Rt. 4 No. 6 kecamatan Banjarmasin Utara, Kota Banjarmasin', '1994', 'Baik', 'Hak Pakai', 'Pembelian', '46400000', '2022-06-20'),
(4, 'Bangunan Gedung Tempat Pendidikan Semi Permanen', '2.8.6.004', '2', 'Tidak Bertingkat', 'Beton', '252', 'Jl. kuin utara Rt. 4 No. 6 kecamatan Banjarmasin Utara, Kota Banjarmasin', '1995', 'Baik', 'Hak Pakai', 'Pembelian', '38600000', '2022-06-20'),
(5, 'Bangunan Gedung Tempat Pendidikan Semi Permanen', '2.8.6.005', '3', 'Bertingkat', 'Beton', '252', 'Jl. kuin utara Rt. 4 No. 6 kecamatan Banjarmasin Utara, Kota Banjarmasin', '1997', 'Baik', 'Hak Pakai', 'Pembelian', '58000000', '2022-06-20'),
(6, 'Bangunan Kamar Mandi', '2.8.6.006', '1', 'Tidak Bertingkat', 'Beton', '21', 'Jl. kuin utara Rt. 4 No. 6 kecamatan Banjarmasin Utara, Kota Banjarmasin', '1987', 'Baik', 'Hak Pakai', 'Pembelian', '3100000', '2022-06-20'),
(7, 'Bangunan Kamar Mandi', '2.8.6.007', '2', 'Tidak Bertingkat', 'Beton', '21', 'Jl. kuin utara Rt. 4 No. 6 kecamatan Banjarmasin Utara, Kota Banjarmasin', '1988', 'Baik', 'Hak Pakai', 'Pembelian', '3500000', '2022-06-20'),
(8, 'Bangunan Kamar Mandi', '2.8.6.008', '3', 'Tidak Bertingkat', 'Beton', '21', 'Jl. kuin utara Rt. 4 No. 6 kecamatan Banjarmasin Utara, Kota Banjarmasin', '1988', 'Baik', 'Hak Pakai', 'Pembelian', '3500000', '2022-06-20');

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
(1, 'admin', 1),
(2, 'guru', 2),
(3, 'sapras', 3);

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

--
-- Dumping data untuk tabel `history_kondisi`
--

INSERT INTO `history_kondisi` (`id`, `aset_id`, `tanggal`, `kondisi`) VALUES
(1, 6, '2022-07-16', 'Kurang Baik'),
(2, 1, '2022-07-20', 'Kurang Baik'),
(3, 6, '2022-07-20', 'Baik'),
(4, 1, '2022-07-21', 'Baik'),
(5, 3, '2022-07-30', 'Kurang Baik'),
(6, 4, '2022-07-30', 'Kurang Baik'),
(7, 5, '2022-07-30', 'Kurang Baik'),
(8, 7, '2022-07-31', 'Kurang Baik'),
(9, 3, '2022-08-01', 'Rusak Berat'),
(10, 4, '2022-08-01', 'Rusak Berat'),
(11, 5, '2022-08-01', 'Rusak Berat');

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

--
-- Dumping data untuk tabel `history_konfirmasi`
--

INSERT INTO `history_konfirmasi` (`id_konfir`, `pengajuan_id`, `status`, `tgl_konfir`) VALUES
(1, 1, 'Disetujui', '2022-06-18'),
(2, 1, 'Tersedia', '2022-06-19'),
(3, 2, 'Disetujui', '2022-06-27'),
(4, 2, 'Tersedia', '2022-06-28'),
(5, 3, 'Disetujui', '2022-07-19'),
(6, 3, 'Tersedia', '2022-07-20'),
(7, 4, 'Disetujui', '2022-07-18'),
(8, 4, 'Tersedia', '2022-07-20'),
(9, 5, 'Disetujui', '2022-07-20'),
(10, 5, 'Tersedia', '2022-07-21'),
(11, 6, 'Disetujui', '2022-07-16'),
(12, 6, 'Tersedia', '2022-07-17'),
(13, 7, 'Disetujui', '2022-07-20'),
(14, 7, 'Tersedia', '2022-07-22'),
(15, 8, 'Disetujui', '2022-08-02'),
(16, 8, 'Tersedia', '2022-08-02');

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
(1, 3, 18, '2022-06-20'),
(2, 1, 3, '2022-06-20'),
(3, 2, 12, '2022-06-20'),
(4, 3, 12, '2022-06-20'),
(5, 4, 11, '2022-06-20'),
(6, 5, 2, '2022-06-20'),
(7, 6, 5, '2022-06-20'),
(8, 7, 2, '2022-06-20'),
(9, 8, 9, '2022-06-28'),
(10, 9, 9, '2022-06-28'),
(11, 10, 2, '2022-07-20'),
(12, 2, 2, '2022-07-23'),
(13, 7, 5, '2022-07-24'),
(14, 8, 5, '2022-07-24'),
(15, 9, 5, '2022-07-24');

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

--
-- Dumping data untuk tabel `kondisi_buku`
--

INSERT INTO `kondisi_buku` (`id`, `buku_id`, `tanggal`, `kondisi`) VALUES
(1, 1, '2022-07-30', 'Kurang Baik'),
(2, 4, '2022-07-30', 'Kurang Baik'),
(3, 8, '2022-07-13', 'Rusak Berat');

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

--
-- Dumping data untuk tabel `kondisi_gedung`
--

INSERT INTO `kondisi_gedung` (`id`, `gedung_id`, `tanggal`, `kondisi`) VALUES
(1, 6, '2022-07-15', 'Kurang Baik'),
(2, 6, '2022-07-17', 'Baik'),
(3, 3, '2022-07-18', 'Kurang Baik'),
(4, 3, '2022-07-22', 'Baik');

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
(1, 'Gudang', 10),
(2, 'Ruang OSIS', 7),
(3, 'Ruang Tata Usaha', 11),
(4, 'Ruang Bimbingan Konseling', 8),
(5, 'Ruang Lab IPA', 3),
(6, 'Ruang Lab Komputer', 2),
(7, 'Ruang Lab Bahasa', 5),
(8, 'Ruang Wakasek Kesiswaan', 6),
(9, 'SMPN 15 Banjarmasin', 1),
(10, 'Ruang UKS', 9),
(11, 'Ruang Perpustakaan', 4),
(12, 'Ruang Wakasek Sapras', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeliharaan`
--

CREATE TABLE `pemeliharaan` (
  `id_pemeliharaan` int(11) NOT NULL,
  `gedung_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `biaya` varchar(255) NOT NULL,
  `tgl_pemeliharaan` date NOT NULL,
  `tgl_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemeliharaan`
--

INSERT INTO `pemeliharaan` (`id_pemeliharaan`, `gedung_id`, `nama`, `jenis`, `biaya`, `tgl_pemeliharaan`, `tgl_selesai`) VALUES
(1, 6, 'Radian', 'Perbaikan Pintu Kamar Mandi', '100000', '2022-07-17', '2022-07-17'),
(2, 3, 'Supian', 'Perbaikan Lantai Keramik', '500000', '2022-07-21', '2022-07-22');

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

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `aset_id`, `lokasi_id`, `keperluan`, `penanggung_jawab_id`, `tgl_pinjam`, `tgl_kembali`) VALUES
(1, 2, 2, 'Memprint Raport ', 7, '2022-07-23', '2022-07-24'),
(2, 7, 5, 'Keperluan Untuk Rapat', 3, '2022-07-24', '2022-07-24'),
(3, 8, 5, 'Penambahan Kursi Untuk Rapat', 3, '2022-07-24', '2022-07-24'),
(4, 9, 5, 'Penambahan Kursi Untuk Rapat', 3, '2022-07-24', '2022-07-24');

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
(1, 'Hj. Netta Herawati, S.AP', '-', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(2, 'Sudiatmoko, S.Pd', '197008271994031000', 'Sudiatmoko', '674f3c2c1a8a6f90461e8a66fb5550ba', 2),
(3, 'Hj. Risnawati, S.Pd', '196802151995122000', 'Risnawati', '674f3c2c1a8a6f90461e8a66fb5550ba', 2),
(4, 'Maslian, S.Pd', '196302211984122006', 'Maslian', '674f3c2c1a8a6f90461e8a66fb5550ba', 2),
(5, 'Norhadiyah', '-', 'Norhadiyah', '674f3c2c1a8a6f90461e8a66fb5550ba', 2),
(6, 'M.Nasrullah, S.Pd', '197403082008011016', 'Nasrullah', '674f3c2c1a8a6f90461e8a66fb5550ba', 2),
(7, 'Iwan Adi Pratama, S.Pd', '198002202009031000', 'Iwan', '674f3c2c1a8a6f90461e8a66fb5550ba', 2),
(8, 'Dra. Hj. Rasuna', '196605311995122000', 'Rasuna', '674f3c2c1a8a6f90461e8a66fb5550ba', 2),
(9, 'Kartika Nursari', '-', 'Kartika', '674f3c2c1a8a6f90461e8a66fb5550ba', 2),
(10, 'Dra. Hj. ST. Rahimah', '196202161986032000', 'sapras', '674f3c2c1a8a6f90461e8a66fb5550ba', 3),
(11, 'Nurita', '-', 'Nurita', '674f3c2c1a8a6f90461e8a66fb5550ba', 2),
(12, 'Ahmad Sarwani, S.pd', '-', 'Sarwani', '674f3c2c1a8a6f90461e8a66fb5550ba', 2);

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

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `aset`, `des`, `lokasi_id`, `penanggung_jawab_id`, `jenis`, `status`, `tanggal`) VALUES
(1, 'AC', 'Untuk diruangan Lab IPA', 5, 3, 'Aset Baru', 'Tersedia', '2022-06-16'),
(2, 'Kursi', 'Penambahan kursi untuk acara pelatihan', 9, 1, 'Aset Baru', 'Tersedia', '2022-06-24'),
(3, 'Kipas Angin', '-', 2, 7, 'Aset Baru', 'Tersedia', '2022-07-16'),
(4, 'AC', 'Pemeliharaan AC', 5, 3, 'Pemeliharaan Mesin', 'Tersedia', '2022-07-16'),
(5, 'Printer', 'Perbaikan', 3, 11, 'Pemeliharaan Mesin', 'Tersedia', '2022-07-20'),
(6, 'Bangunan Kamar Mandi', 'Perbaikan Pintu', 0, 1, 'Pemeliharaan Bangunan', 'Tersedia', '2022-07-15'),
(7, 'Bangunan Gedung Tempat Pendidikan Semi Permanen', 'Perbaikan Lantai', 0, 1, 'Pemeliharaan Bangunan', 'Tersedia', '2022-07-18'),
(8, 'Bangunan Gedung Tempat Ibadah Semi Permanen', 'Perbaikan Kaca Jendela', 0, 1, 'Pemeliharaan Bangunan', 'Diproses', '2022-07-20');

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
(1, 3, 12, 'Dihapus', '2022-08-02'),
(2, 4, 11, 'Dihapus', '2022-08-02'),
(3, 5, 2, 'Dihapus', '2022-08-02');

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

--
-- Dumping data untuk tabel `perawatan`
--

INSERT INTO `perawatan` (`id_rawat`, `aset_id`, `lokasi_id`, `penanggung_jawab_id`, `jenis`, `biaya`, `tgl_rawat`, `tgl_selesai`) VALUES
(1, 6, 5, 3, 'Service AC', '100000', '2022-07-20', '2022-07-20'),
(2, 1, 3, 11, 'Perbaikan Catridge  Printer', '150000', '2022-07-21', '2022-07-21');

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
  MODIFY `id_gedung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `history_kondisi`
--
ALTER TABLE `history_kondisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `history_konfirmasi`
--
ALTER TABLE `history_konfirmasi`
  MODIFY `id_konfir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `history_perpindahan`
--
ALTER TABLE `history_perpindahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `jalan`
--
ALTER TABLE `jalan`
  MODIFY `id_jalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kondisi_buku`
--
ALTER TABLE `kondisi_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kondisi_gedung`
--
ALTER TABLE `kondisi_gedung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  MODIFY `id_pemeliharaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `penanggung_jawab`
--
ALTER TABLE `penanggung_jawab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `penghapusan`
--
ALTER TABLE `penghapusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `perawatan`
--
ALTER TABLE `perawatan`
  MODIFY `id_rawat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
