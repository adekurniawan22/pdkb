-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Feb 2024 pada 16.59
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
  `tanggal_kadaluarsa` date DEFAULT NULL,
  `sedang_dipinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_alat_kerja`
--

INSERT INTO `t_alat_kerja` (`id_alat_kerja`, `jenis`, `nama_alat_kerja`, `spesifikasi`, `jumlah`, `satuan`, `tanggal_kadaluarsa`, `sedang_dipinjam`) VALUES
(3, 'Isolasi', 'Tang', 'Untuk memegang, memotong, melepas, dan memasang bahan kerja', 166, 'Bh', NULL, 11),
(4, 'Metal', 'Bor Listrik', '500W, Kecepatan Variabel', 56, 'Pasang', NULL, 3),
(5, 'Metal', 'Tang Potong', 'Bahan Tahan Karat', 100, 'Pasang', NULL, 8),
(6, 'Metal', 'Kunci Inggris', 'Ukuran 10 inci', 15, 'Pasang', NULL, 0),
(7, 'Metal', 'Mesin Gerinda', '800W, Diskon 4 inch', 8, 'Pasang', NULL, 0),
(8, 'Metal', 'Palu', 'Kepala Logam, Pegangan Kayu', 20, 'Pasang', NULL, 0),
(9, 'Metal', 'Obeng', 'Untuk membuka atau mengencangkan baut atau sekrup pada berbagai benda', 10, 'Bh', NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_detail_histori_alat`
--

CREATE TABLE `t_detail_histori_alat` (
  `id_detail_histori_alat` int(11) NOT NULL,
  `id_histori_alat` int(11) NOT NULL,
  `id_alat_kerja` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_detail_histori_alat`
--

INSERT INTO `t_detail_histori_alat` (`id_detail_histori_alat`, `id_histori_alat`, `id_alat_kerja`, `jumlah`) VALUES
(1, 3, 3, 3),
(2, 3, 4, 2),
(3, 4, 6, 3),
(4, 4, 7, 3),
(5, 5, 6, 4),
(6, 5, 7, 1),
(7, 6, 6, 2),
(8, 6, 7, 3),
(9, 7, 6, 2),
(10, 7, 7, 3),
(11, 8, 6, 2),
(12, 9, 5, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_foto_jsa`
--

CREATE TABLE `t_foto_jsa` (
  `id_foto_jsa` int(11) NOT NULL,
  `id_jsa` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_foto_jsa`
--

INSERT INTO `t_foto_jsa` (`id_foto_jsa`, `id_jsa`, `foto`) VALUES
(17, 14, '580b57fcd9996e24bc43c4e7.png'),
(18, 14, '1738.jpg'),
(19, 14, '10535618_1465881587012156_6767017015814907459_o.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_histori_alat`
--

CREATE TABLE `t_histori_alat` (
  `id_histori_alat` int(11) NOT NULL,
  `penanggung_jawab` varchar(255) NOT NULL,
  `id_personil` int(11) NOT NULL,
  `tanggal_keluar` datetime NOT NULL,
  `tanggal_masuk` datetime NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` enum('keluar','masuk') NOT NULL,
  `tanda_tangan` varchar(255) NOT NULL,
  `sudah_disetujui` enum('0','1') NOT NULL,
  `id_atasan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_histori_alat`
--

INSERT INTO `t_histori_alat` (`id_histori_alat`, `penanggung_jawab`, `id_personil`, `tanggal_keluar`, `tanggal_masuk`, `keterangan`, `status`, `tanda_tangan`, `sudah_disetujui`, `id_atasan`) VALUES
(6, 'Ismail', 14, '2024-02-03 07:00:00', '2024-02-03 01:12:19', 'adfasdasd', 'masuk', 'signature_a23c92bdebcd381810dd5633d08d3ea7.png', '1', 12),
(9, 'Ade Kurniawan', 14, '2024-02-03 19:05:00', '0000-00-00 00:00:00', 'asdasdads', 'keluar', 'signature_09744cbad83e71040a17e9f59dd915d9.png', '1', NULL);

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
(1, 'Asistant Manager'),
(2, 'Team Leader'),
(3, 'Admin'),
(4, 'JTC');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jsa`
--

CREATE TABLE `t_jsa` (
  `id_jsa` int(11) NOT NULL,
  `id_personil` int(11) NOT NULL,
  `dasar_pelaksanaan` varchar(255) NOT NULL,
  `waktu_pelaksanaan` date NOT NULL,
  `lingkup_pekerjaan` varchar(255) NOT NULL,
  `hasil_pekerjaan` varchar(255) NOT NULL,
  `kesimpulan` varchar(255) NOT NULL,
  `sudah_disetujui` enum('0','1') NOT NULL,
  `id_atasan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_jsa`
--

INSERT INTO `t_jsa` (`id_jsa`, `id_personil`, `dasar_pelaksanaan`, `waktu_pelaksanaan`, `lingkup_pekerjaan`, `hasil_pekerjaan`, `kesimpulan`, `sudah_disetujui`, `id_atasan`) VALUES
(14, 14, 'Dasar Pelaksanaan', '2024-02-03', 'Lingkup Pekerjaan', 'Hasil Pekerjaan', 'Kesimpulan', '1', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_lampiran_laporan_pekerjaan`
--

CREATE TABLE `t_lampiran_laporan_pekerjaan` (
  `id_lampiran` int(11) NOT NULL,
  `id_laporan_pekerjaan` int(11) NOT NULL,
  `judul_lampiran` varchar(255) NOT NULL,
  `foto_sebelum` varchar(255) NOT NULL,
  `foto_proses` varchar(255) NOT NULL,
  `foto_setelah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_lampiran_laporan_pekerjaan`
--

INSERT INTO `t_lampiran_laporan_pekerjaan` (`id_lampiran`, `id_laporan_pekerjaan`, `judul_lampiran`, `foto_sebelum`, `foto_proses`, `foto_setelah`) VALUES
(38, 55, 'asd', '580b57fcd9996e24bc43c4e7.png', '580b57fcd9996e24bc43c4e71.png', '580b57fcd9996e24bc43c4e72.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_laporan_pekerjaan`
--

CREATE TABLE `t_laporan_pekerjaan` (
  `id_laporan_pekerjaan` int(11) NOT NULL,
  `id_personil` int(11) NOT NULL,
  `dasar_pelaksanaan` varchar(255) NOT NULL,
  `waktu_pelaksanaan` date NOT NULL,
  `lingkup_pekerjaan` varchar(255) NOT NULL,
  `hasil_pekerjaan` varchar(255) NOT NULL,
  `penutup` varchar(255) NOT NULL,
  `sudah_disetujui` enum('0','1') NOT NULL,
  `id_atasan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_laporan_pekerjaan`
--

INSERT INTO `t_laporan_pekerjaan` (`id_laporan_pekerjaan`, `id_personil`, `dasar_pelaksanaan`, `waktu_pelaksanaan`, `lingkup_pekerjaan`, `hasil_pekerjaan`, `penutup`, `sudah_disetujui`, `id_atasan`) VALUES
(55, 14, 'Dasar Pelaksanaan', '2024-02-03', 'Lingkup Pekerjaan', 'asdasdas', 'asdasdasddas', '1', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_personil`
--

CREATE TABLE `t_personil` (
  `id_personil` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status_aktif` enum('1','0') NOT NULL,
  `tanda_tangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_personil`
--

INSERT INTO `t_personil` (`id_personil`, `id_jabatan`, `nama`, `nip`, `email`, `no_hp`, `username`, `password`, `alamat`, `foto`, `status_aktif`, `tanda_tangan`) VALUES
(12, 1, 'Ismail Asistan Manager', '12345678910', 'asistantmanager@email.com', '081274747474', 'asman', '$2y$10$NLFDLVITX2ahLVt9p39Wl.s4Ivppt8d6VKfeIbLYOwF5PZVKbRURK', 'Jalan Dago, Nomor 43', 'default.jpg', '1', 'signature_46f9554efbc985cc7955844d23316dd5.png'),
(13, 2, 'Ismail Team Leader', '12345678911', 'teamleader@email.com', '081275757575', 'team_leader', '$2y$10$NZbK40eNc82WkijfpzgR.OqL6e5gNetUjPRI2OpmtZ4ubEmHnGcia', 'Jalan Cimahi, Nomor 55', 'default.jpg', '1', ''),
(14, 3, 'Ismail Admin', '12345678912', 'admin@email.com', '081276767676', 'admin', '$2y$10$6aQzA0qBJOPSPsfzIBJowuFTHdBB5t1weam8AB9gJNy2OPYxPZhue', 'Jalan Tubagus Ismail, Nomor 41', '580b57fcd9996e24bc43c4e71.png', '1', ''),
(15, 4, 'Ismail JTC', '12345678913', 'jtc@email.com', '081279797979', 'jtc', '$2y$10$PSpn2f8aeUp0y0pAaJHllelyNPIh0isJ.SGffGwUYBf48tdJxLAK2', 'Jalan Buahbatu, Nomo 23', 'default.jpg', '1', ''),
(41, 1, 'Ade Kurniawan', '12345678902', 'ade.kurniawan216@gmail.com', '083171027936', 'ade_22', '$2y$10$6QpGIiE33b6hnY.hRrAceuZ.aBg5aULA7/h5tfojLoWEEa8HKfViq', 'Jalan Jambi Palembang KM 27', '580b57fcd9996e24bc43c4e7.png', '1', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_rencana_operasi`
--

CREATE TABLE `t_rencana_operasi` (
  `id_rencana_operasi` int(11) NOT NULL,
  `nama_rencana` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `tanggal_dikerjakan` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_rencana_operasi`
--

INSERT INTO `t_rencana_operasi` (`id_rencana_operasi`, `nama_rencana`, `status`, `tanggal_dikerjakan`, `tanggal_selesai`) VALUES
(47, 'Rencana 1', '1', '2024-01-01', '2024-01-11'),
(48, 'wertewrew', '0', '2024-01-24', NULL);

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
(53, 41, 'Diklat', 'TRANSKIP_NILAI_ADE_KURNIAWAN2.pdf'),
(55, 41, 'Kompetensi', 'Sertifikat_Kompetensi_BNSP.pdf'),
(56, 41, 'Kompetensi', 'IJAZAH_ADE_KURNIAWAN.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_spki`
--

CREATE TABLE `t_spki` (
  `id_spki` int(11) NOT NULL,
  `id_personil` int(11) NOT NULL,
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
  `catatan` varchar(255) NOT NULL,
  `sudah_disetujui` enum('0','1') NOT NULL,
  `id_atasan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_spki`
--

INSERT INTO `t_spki` (`id_spki`, `id_personil`, `kepada`, `dari`, `macam_pekerjaan`, `lokasi_pekerjaan`, `mulai_pelaksanaan`, `selesai_pelaksanaan`, `pj`, `pengawas`, `pengawas_k3`, `pelaksana`, `alat_kerja`, `kendaraan`, `uraian_kerja`, `catatan`, `sudah_disetujui`, `id_atasan`) VALUES
(5, 14, 'TL PDKB RING UPT KALTIMRA edit', 'ASMAN PDKB UPT KALTIMRA deidt', 'JSA Anomali Tower Tension sddf', 'adsasdasdasd ededit', '2024-02-03', '2024-02-03', 'MOCH. AZIZ SHIDKI edit', 'Hernawan Agung P edit', 'asdasd edit', 'asdasd edit', 'adsasdas edit', 'Kendaraan Dinas edit', 'asdasd edit', 'asdasdasd edit', '1', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_temuan_jsa`
--

CREATE TABLE `t_temuan_jsa` (
  `id_temuan_jsa` int(11) NOT NULL,
  `id_jsa` int(11) NOT NULL,
  `temuan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_temuan_jsa`
--

INSERT INTO `t_temuan_jsa` (`id_temuan_jsa`, `id_jsa`, `temuan`, `keterangan`) VALUES
(24, 14, 'Temuan 1', 'Keterangan\nKeterangan\nKeterangan\nKeterangan\n'),
(25, 14, 'Temuan 2', 'Keterangan\nKeterangan\nKeterangan\nKeterangan\nKeterangan\n'),
(26, 14, 'Temuan 3', 'Keterangan\nKeterangan\n'),
(27, 14, 'Temuan 4', 'Keterangan'),
(28, 14, 'Temuan 5', 'Keterangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_tower_ers`
--

CREATE TABLE `t_tower_ers` (
  `id_tower_ers` int(11) NOT NULL,
  `nama_alat` int(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `spesifikasi` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `tahun_pengadaan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_alat_kerja`
--
ALTER TABLE `t_alat_kerja`
  ADD PRIMARY KEY (`id_alat_kerja`);

--
-- Indeks untuk tabel `t_detail_histori_alat`
--
ALTER TABLE `t_detail_histori_alat`
  ADD PRIMARY KEY (`id_detail_histori_alat`);

--
-- Indeks untuk tabel `t_foto_jsa`
--
ALTER TABLE `t_foto_jsa`
  ADD PRIMARY KEY (`id_foto_jsa`),
  ADD KEY `id_jsa` (`id_jsa`);

--
-- Indeks untuk tabel `t_histori_alat`
--
ALTER TABLE `t_histori_alat`
  ADD PRIMARY KEY (`id_histori_alat`);

--
-- Indeks untuk tabel `t_jabatan`
--
ALTER TABLE `t_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `t_jsa`
--
ALTER TABLE `t_jsa`
  ADD PRIMARY KEY (`id_jsa`);

--
-- Indeks untuk tabel `t_lampiran_laporan_pekerjaan`
--
ALTER TABLE `t_lampiran_laporan_pekerjaan`
  ADD PRIMARY KEY (`id_lampiran`),
  ADD KEY `t_lampiran_laporan_pekerjaan_ibfk_1` (`id_laporan_pekerjaan`);

--
-- Indeks untuk tabel `t_laporan_pekerjaan`
--
ALTER TABLE `t_laporan_pekerjaan`
  ADD PRIMARY KEY (`id_laporan_pekerjaan`);

--
-- Indeks untuk tabel `t_personil`
--
ALTER TABLE `t_personil`
  ADD PRIMARY KEY (`id_personil`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indeks untuk tabel `t_rencana_operasi`
--
ALTER TABLE `t_rencana_operasi`
  ADD PRIMARY KEY (`id_rencana_operasi`);

--
-- Indeks untuk tabel `t_sertifikat`
--
ALTER TABLE `t_sertifikat`
  ADD PRIMARY KEY (`id_sertifikat`),
  ADD KEY `t_sertifikat_ibfk_1` (`id_personil`);

--
-- Indeks untuk tabel `t_spki`
--
ALTER TABLE `t_spki`
  ADD PRIMARY KEY (`id_spki`);

--
-- Indeks untuk tabel `t_temuan_jsa`
--
ALTER TABLE `t_temuan_jsa`
  ADD PRIMARY KEY (`id_temuan_jsa`),
  ADD KEY `id_jsa` (`id_jsa`);

--
-- Indeks untuk tabel `t_tower_ers`
--
ALTER TABLE `t_tower_ers`
  ADD PRIMARY KEY (`id_tower_ers`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_alat_kerja`
--
ALTER TABLE `t_alat_kerja`
  MODIFY `id_alat_kerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `t_detail_histori_alat`
--
ALTER TABLE `t_detail_histori_alat`
  MODIFY `id_detail_histori_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `t_foto_jsa`
--
ALTER TABLE `t_foto_jsa`
  MODIFY `id_foto_jsa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `t_histori_alat`
--
ALTER TABLE `t_histori_alat`
  MODIFY `id_histori_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `t_jabatan`
--
ALTER TABLE `t_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `t_jsa`
--
ALTER TABLE `t_jsa`
  MODIFY `id_jsa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `t_lampiran_laporan_pekerjaan`
--
ALTER TABLE `t_lampiran_laporan_pekerjaan`
  MODIFY `id_lampiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `t_laporan_pekerjaan`
--
ALTER TABLE `t_laporan_pekerjaan`
  MODIFY `id_laporan_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `t_personil`
--
ALTER TABLE `t_personil`
  MODIFY `id_personil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `t_rencana_operasi`
--
ALTER TABLE `t_rencana_operasi`
  MODIFY `id_rencana_operasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `t_sertifikat`
--
ALTER TABLE `t_sertifikat`
  MODIFY `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `t_spki`
--
ALTER TABLE `t_spki`
  MODIFY `id_spki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `t_temuan_jsa`
--
ALTER TABLE `t_temuan_jsa`
  MODIFY `id_temuan_jsa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `t_tower_ers`
--
ALTER TABLE `t_tower_ers`
  MODIFY `id_tower_ers` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_foto_jsa`
--
ALTER TABLE `t_foto_jsa`
  ADD CONSTRAINT `t_foto_jsa_ibfk_1` FOREIGN KEY (`id_jsa`) REFERENCES `t_jsa` (`id_jsa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_lampiran_laporan_pekerjaan`
--
ALTER TABLE `t_lampiran_laporan_pekerjaan`
  ADD CONSTRAINT `t_lampiran_laporan_pekerjaan_ibfk_1` FOREIGN KEY (`id_laporan_pekerjaan`) REFERENCES `t_laporan_pekerjaan` (`id_laporan_pekerjaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_personil`
--
ALTER TABLE `t_personil`
  ADD CONSTRAINT `t_personil_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `t_jabatan` (`id_jabatan`);

--
-- Ketidakleluasaan untuk tabel `t_sertifikat`
--
ALTER TABLE `t_sertifikat`
  ADD CONSTRAINT `t_sertifikat_ibfk_1` FOREIGN KEY (`id_personil`) REFERENCES `t_personil` (`id_personil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_temuan_jsa`
--
ALTER TABLE `t_temuan_jsa`
  ADD CONSTRAINT `t_temuan_jsa_ibfk_1` FOREIGN KEY (`id_jsa`) REFERENCES `t_jsa` (`id_jsa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
