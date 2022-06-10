-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jun 2022 pada 11.58
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
(5, 18, 'AC ', '2.6.2.4.3', '2', 'Sharp', '-', 'Plastik', '2022', 'Baik', 'Pembelian', '3,500,000,00', '2022-01-27'),
(9, 19, 'Lemari Kaca', '2.6.1.4.12', '1', 'Maspion', '-', 'Kaca', '2022', 'Baik', 'Pembelian', '950.000', '2022-01-27'),
(13, 19, 'AC Split', '2.6.2.4.4', '1', 'Sharp', '-', 'Electronik', '2022', 'Kurang Baik', 'Hibah', '3,500,000,00', '2022-01-30'),
(16, 14, 'Kipas Angin ', '2.6.2.4.6', '1', 'Miyako/-', '-', 'Plastik dan besi', '2022', 'Baik', 'Hibah', '300.000', '2022-02-10'),
(17, 19, 'Kipas Angin ', '2.6.2.4.6', '2', 'Maspion', '-', 'Plastik', '2022', 'Baik', 'Pembelian', '450.000', '2022-02-10'),
(18, 18, 'Jam Elektronik', '2.6.2.2.3', '1', 'Maspion', '-', 'Besi, Plastik & Kaca', '2022', 'Baik', 'Pembelian', '100.000', '2022-02-10'),
(19, 22, 'Jam Elektronik', '2.6.2.2.3', '2', 'Nagoya', '-', 'Plastik', '2022', 'Baik', 'Pembelian', '45.000', '2022-02-10'),
(20, 20, 'Jam Elektronik', '2.6.2.2.3', '3', 'Mirando', '-', 'Plastik dan Kaca', '2022', 'Kurang Baik', 'Pembelian', '45.000', '2022-02-10'),
(21, 22, 'Scanner', '2.6.3.5.4', '1', 'Canon', '-', 'Plastik dan Kaca', '2022', 'Baik', 'Pembelian', '1.800.000,00', '2022-02-15'),
(22, 19, 'Scanner', '2.6.3.5.4', '2', 'Canon', '-', 'Plastik dan Kaca', '2022', 'Baik', 'Pembelian', '875.000', '2022-02-15'),
(23, 14, 'Sound System', '2.6.2.6.8', '1', 'Baretone ', '-', 'Plstik dan Besi', '2022', 'Kurang Baik', 'Pembelian', '3.100.000,00', '2022-02-15'),
(24, 20, 'Sound System', '2.6.2.6.8', '2', 'Baretone ', '-', 'Plastik dan Besi', '2022', 'Baik', 'Pembelian', '3.100.000,00', '2022-02-15'),
(25, 11, 'Kursi Tamu', '2.6.2.1.28', '1', 'Jepara', '-', 'Kayu', '2022', 'Baik', 'Pembelian', '2.000.000,00', '2022-02-17'),
(26, 20, 'Kursi Tamu', '2.6.2.1.28', '2', 'Jepara', '-', 'Kayu', '2022', 'Baik', 'Pembelian', '2.000.000,00', '2022-02-17'),
(28, 20, 'LCD', '2.9.8.6', '1', 'Maspion', '-', 'Electronik', '2022', 'Baik', 'Pembelian', '2.000.000,00', '2022-02-21');

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
  `harga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `nama_buku`, `kode_buku`, `register`, `judul`, `spesifikasi`, `asal_usul`, `tahun`, `kondisi`, `harga`) VALUES
(0, 'lolo', 'n', '56789567', 'Rumah sakit', 'k', 'ui', '2018', 'Baik', '1111111111111000000000000');

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
  `harga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gedung`
--

INSERT INTO `gedung` (`id_gedung`, `nama_gedung`, `kode_gedung`, `register`, `tingkat`, `beton`, `luas`, `lokasi`, `tahun`, `kondisi`, `status`, `asal_usul`, `harga`) VALUES
(3, 'tes', '09087', '56789567', 'Bertingkat', 'Beton', 'w', 'Ruang A', '2021', 'Rusak Berat', 'bb', 'b', '0000'),
(5, 'wahy', '8990', '56789567', 'Bertingkat', 'Tidak Beton', 'w', 'Ruang A', '2021', 'Baik', 'bb', 'ui', '22222');

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

--
-- Dumping data untuk tabel `history_kondisi`
--

INSERT INTO `history_kondisi` (`id`, `aset_id`, `tanggal`, `kondisi`) VALUES
(63, 5, '2022-02-10', 'Kurang Baik'),
(64, 17, '2022-02-12', 'Kurang Baik'),
(65, 22, '2022-02-15', 'Kurang Baik'),
(66, 23, '2022-02-15', 'Kurang Baik'),
(67, 5, '2022-02-17', 'Baik'),
(68, 17, '2022-02-17', 'Baik'),
(69, 22, '2022-02-17', 'Baik'),
(70, 20, '2022-02-17', 'Kurang Baik'),
(71, 13, '2022-02-17', 'Kurang Baik');

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
(87, 5, 18, '2022-01-27'),
(91, 9, 19, '2022-01-27'),
(99, 13, 19, '2022-01-30'),
(103, 16, 14, '2022-02-10'),
(104, 24, 14, '2022-02-10'),
(105, 22, 19, '2022-02-10'),
(106, 20, 20, '2022-02-10'),
(107, 17, 20, '2022-02-10'),
(108, 21, 22, '2022-02-15'),
(109, 19, 22, '2022-02-15'),
(110, 23, 18, '2022-02-15'),
(111, 18, 18, '2022-02-15'),
(112, 17, 19, '2022-02-17'),
(113, 24, 20, '2022-02-17'),
(114, 23, 14, '2022-02-17'),
(116, 28, 20, '2022-02-21'),
(117, 26, 20, '2022-06-06');

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
  `lokasi` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `asal_usul` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jalan`
--

INSERT INTO `jalan` (`id_jalan`, `nama_aset`, `kode_aset`, `register`, `konstruksi`, `luas`, `lokasi`, `kondisi`, `status`, `asal_usul`, `harga`, `tanggal`) VALUES
(1, 'm', 'm', 'm', 'm', 'm', 'm', 'm', 'm', 'm', 'm', 'm');

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
(22, 'Ruang BK', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int(11) NOT NULL,
  `aset_id` int(11) NOT NULL,
  `perpindahan_id` int(11) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `penanggung_jawab` varchar(255) NOT NULL,
  `tgl_pinjam` varchar(255) NOT NULL,
  `tgl_kembali` varchar(255) NOT NULL
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
(13, 'Hj Netta Herawati', '-', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `biaya` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penghapusan`
--

CREATE TABLE `penghapusan` (
  `id_hapus` int(11) NOT NULL,
  `aset_id` int(11) NOT NULL,
  `perpindahan_id` int(11) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `jumlah_hapus` varchar(255) NOT NULL,
  `tgl_hapus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perawatan`
--

CREATE TABLE `perawatan` (
  `id_perawatan` int(11) NOT NULL,
  `aset_id` int(11) NOT NULL,
  `lokasi_id` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `biaya` varchar(255) NOT NULL,
  `tgl_rawat` date NOT NULL,
  `tgl_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perbaikan`
--

CREATE TABLE `perbaikan` (
  `id_perbaikan` int(11) NOT NULL,
  `nama_perbaikan` varchar(255) NOT NULL,
  `lokasi_aset` varchar(11) NOT NULL,
  `kerusakan` varchar(255) NOT NULL,
  `biaya` varchar(255) NOT NULL,
  `tgl_perbaikan` varchar(255) NOT NULL,
  `tgl_selesai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perbaikan`
--

INSERT INTO `perbaikan` (`id_perbaikan`, `nama_perbaikan`, `lokasi_aset`, `kerusakan`, `biaya`, `tgl_perbaikan`, `tgl_selesai`) VALUES
(1, 'n', ' j', 'n', 'm', 'm', 'm');

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
  `harga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tanah`
--

INSERT INTO `tanah` (`id_tanah`, `nama_tanah`, `kode_tanah`, `register`, `luas`, `tahun`, `lokasi`, `hak`, `nomer`, `asal_usul`, `harga`) VALUES
(3, 'AC', '09087', '56789567', 'w', '2012', 'Ruang A', 'w', 'w', 'Pembelian', 'w'),
(4, 'AC', '2.9.8.6', '56789567', 'w', '2017', 'Ruang A', 'w', 'w', 'b', 'n'),
(5, 'AC', '2.9.8.6', '56789567', 'w', '2012', 'Ruang OSIS', 'w', 'w', 'Pembelian', 'n'),
(6, 'AC', '2.9.8.6', '56789567', 'w', '2018', 'Ruang A', 'w', 'w', 'ui', 'mmmm'),
(7, 'z', '2.9.8.6', '56789567', 'w', '2012', 'Ruang A', 'w', 'w', 'w', '22222');

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
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id_hapus`);

--
-- Indeks untuk tabel `perawatan`
--
ALTER TABLE `perawatan`
  ADD PRIMARY KEY (`id_perawatan`);

--
-- Indeks untuk tabel `perbaikan`
--
ALTER TABLE `perbaikan`
  ADD PRIMARY KEY (`id_perbaikan`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `gedung`
--
ALTER TABLE `gedung`
  MODIFY `id_gedung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `history_kondisi`
--
ALTER TABLE `history_kondisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `history_perpindahan`
--
ALTER TABLE `history_perpindahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT untuk tabel `jalan`
--
ALTER TABLE `jalan`
  MODIFY `id_jalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penanggung_jawab`
--
ALTER TABLE `penanggung_jawab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penghapusan`
--
ALTER TABLE `penghapusan`
  MODIFY `id_hapus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `perawatan`
--
ALTER TABLE `perawatan`
  MODIFY `id_perawatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `perbaikan`
--
ALTER TABLE `perbaikan`
  MODIFY `id_perbaikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tanah`
--
ALTER TABLE `tanah`
  MODIFY `id_tanah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
