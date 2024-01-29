-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jan 2024 pada 21.27
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdkb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_alat_kerja`
--

CREATE TABLE `t_alat_kerja` (
  `id_alat_kerja` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `nama_alat_kerja` varchar(255) NOT NULL,
  `spesifikasi` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `sedang_dipinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_alat_kerja`
--

INSERT INTO `t_alat_kerja` (`id_alat_kerja`, `jenis`, `nama_alat_kerja`, `spesifikasi`, `jumlah`, `satuan`, `sedang_dipinjam`) VALUES
(1, 'Metal', 'Alat 1', 'Ini alat 1', 25, 'Pasang', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_histori_alat_kerja`
--

CREATE TABLE `t_histori_alat_kerja` (
  `id_histori_alat_kerja` int(11) NOT NULL,
  `id_alat_kerja` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `penanggung_jawab` varchar(255) NOT NULL,
  `tanggal_keluar` datetime NOT NULL,
  `tanggal_masuk` datetime NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jabatan`
--

CREATE TABLE `t_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_jabatan`
--

INSERT INTO `t_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Admin'),
(2, 'ASISTANT MANAGER PDKB'),
(3, 'TEAM LEADER PDKB'),
(4, 'JTC PDKB');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_personil`
--

CREATE TABLE `t_personil` (
  `id_personil` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status_aktif` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_personil`
--

INSERT INTO `t_personil` (`id_personil`, `id_jabatan`, `nama`, `nip`, `username`, `password`, `foto`, `status_aktif`) VALUES
(1, 1, 'Admin 1', '12312312', 'admin', '$2y$10$ozlPAIsSPhuc64jw6mXNtekXR16AYTYAX6wqnvo1d8oozgUIamzbK', '580b57fcd9996e24bc43c4e75.png', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_sertifikat`
--

CREATE TABLE `t_sertifikat` (
  `id_sertifikat` int(11) NOT NULL,
  `id_personil` int(11) NOT NULL,
  `jenis_sertifikat` varchar(255) NOT NULL,
  `nama_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_sertifikat`
--

INSERT INTO `t_sertifikat` (`id_sertifikat`, `id_personil`, `jenis_sertifikat`, `nama_file`) VALUES
(1, 3, 'Sertifikat Diklat', 'CV_ADE_KURNIAWAN.pdf'),
(2, 3, 'Sertifikat Diklat', 'CV_ADE_KURNIAWAN1.pdf'),
(3, 3, 'Sertifikat Kompetensi', 'CV_ADE_KURNIAWAN2.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_spki`
--

CREATE TABLE `t_spki` (
  `id_spki` int(11) NOT NULL,
  `kepada` varchar(255) NOT NULL,
  `dari` varchar(255) NOT NULL,
  `macam_pekerjaan` varchar(255) NOT NULL,
  `lokasi_pekerjaan` varchar(255) NOT NULL,
  `mulai_pelaksanaan` date NOT NULL,
  `selesai_pelaksanaan` date NOT NULL,
  `pj` varchar(255) NOT NULL,
  `pengawas` varchar(255) NOT NULL,
  `pengawas_k3` varchar(255) NOT NULL,
  `pelaksana` varchar(255) NOT NULL,
  `alat_kerja` varchar(255) NOT NULL,
  `kendaraan` varchar(255) NOT NULL,
  `uraian_kerja` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_spki`
--

INSERT INTO `t_spki` (`id_spki`, `kepada`, `dari`, `macam_pekerjaan`, `lokasi_pekerjaan`, `mulai_pelaksanaan`, `selesai_pelaksanaan`, `pj`, `pengawas`, `pengawas_k3`, `pelaksana`, `alat_kerja`, `kendaraan`, `uraian_kerja`, `catatan`) VALUES
(1, 'TL PDKB RING UPT KALTIMRA', 'ASMAN PDKB UPT KALTIMRA', 'JSA Anomali Tower Tension', 'SUTT 150 kV Line Longikis - Kuaro T.138, T.191,\r\nSUTT 150 kV Petung - Longikis T.127 A\r\nSUTT 150 kV Tanjung - Muara komam  T.189 \r\nSUTT 150 kV Line Muara komam - Kuaro T.268', '2024-01-03', '2024-01-05', 'MOCH. AZIZ SHIDKI', 'Hernawan Agung P', 'Zam Yudha Pangayoman\r\nIbnu Hubaiyah', 'Ariya Adam Abdullah\r\nI Kadek A\r\nMoch Zulkifliansyah', 'Measuring Stik Isolasi & APD', 'Kendaraan Dinas', 'JSA Anomali Tower Tension\r\nSUTT 150 kV Line Longikis - Kuaro T.138, T.191,\r\nSUTT 150 kV Tanjung - Muara komam  T.189', 'Pekerjaan Non Rutin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_alat_kerja`
--
ALTER TABLE `t_alat_kerja`
  ADD PRIMARY KEY (`id_alat_kerja`);

--
-- Indeks untuk tabel `t_jabatan`
--
ALTER TABLE `t_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `t_personil`
--
ALTER TABLE `t_personil`
  ADD PRIMARY KEY (`id_personil`);

--
-- Indeks untuk tabel `t_sertifikat`
--
ALTER TABLE `t_sertifikat`
  ADD PRIMARY KEY (`id_sertifikat`);

--
-- Indeks untuk tabel `t_spki`
--
ALTER TABLE `t_spki`
  ADD PRIMARY KEY (`id_spki`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_alat_kerja`
--
ALTER TABLE `t_alat_kerja`
  MODIFY `id_alat_kerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_jabatan`
--
ALTER TABLE `t_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `t_personil`
--
ALTER TABLE `t_personil`
  MODIFY `id_personil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `t_sertifikat`
--
ALTER TABLE `t_sertifikat`
  MODIFY `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `t_spki`
--
ALTER TABLE `t_spki`
  MODIFY `id_spki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
