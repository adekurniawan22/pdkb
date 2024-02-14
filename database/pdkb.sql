-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Feb 2024 pada 15.04
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
(3, 'Isolasi', 'Tang', 'Untuk memegang, memotong, melepas, dan memasang bahan kerja', 166, 'Bh', NULL, 16),
(4, 'Metal', 'Bor Listrik', '500W, Kecepatan Variabel', 56, 'Pasang', NULL, 11),
(5, 'Metal', 'Tang Potong', 'Bahan Tahan Karat', 100, 'Pasang', NULL, 20),
(6, 'Metal', 'Kunci Inggris', 'Ukuran 10 inci', 15, 'Pasang', NULL, 0),
(7, 'Metal', 'Mesin Gerinda', '800W, Diskon 4 inch', 8, 'Pasang', NULL, 0),
(8, 'Metal', 'Palu', 'Kepala Logam, Pegangan Kayu', 20, 'Pasang', NULL, 0),
(9, 'Metal', 'Obeng', 'Untuk membuka atau mengencangkan baut atau sekrup pada berbagai benda', 10, 'Bh', NULL, 0),
(19, 'Isolasi', 'Tes', 'Tes', 13, 'Pasang', '2024-02-22', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_alat_tower_ers`
--

CREATE TABLE `t_alat_tower_ers` (
  `id_alat_tower_ers` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `nama_alat_tower_ers` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `spesifikasi` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `tahun_pengadaan` year(4) NOT NULL,
  `tanggal_kadaluarsa` date DEFAULT NULL,
  `sedang_dipinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_alat_tower_ers`
--

INSERT INTO `t_alat_tower_ers` (`id_alat_tower_ers`, `jenis`, `nama_alat_tower_ers`, `merk`, `spesifikasi`, `jumlah`, `satuan`, `tahun_pengadaan`, `tanggal_kadaluarsa`, `sedang_dipinjam`) VALUES
(1, 'Metal', 'Antena Parabola', 'XYZ', 'Frekuensi 2.4 GHz, Gain 24 dBi', 10, 'Pasang', '2023', NULL, 0),
(2, 'Metal', 'Kabel Koaksial RG-6', 'ABC', 'Panjang 50 meter, Impedansi 75 Ohm', 20, 'Pasang', '2022', NULL, 0),
(3, 'Metal', 'Booster Sinyal', 'DEF', 'Gain 20 dB, Frekuensi 800-2500 MHz', 5, 'Pasang', '2024', '2024-02-21', 0),
(4, 'APD', 'Baterai UPS', 'GHI', 'Kapasitas 100 Ah, Tegangan 12V', 20, 'Pasang', '2024', '2024-03-01', 5);

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
(21, 17, 3, 5),
(22, 17, 4, 5),
(23, 17, 5, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_detail_riwayat_gudang`
--

CREATE TABLE `t_detail_riwayat_gudang` (
  `id_detail_riwayat_gudang` int(11) NOT NULL,
  `id_riwayat_gudang` int(11) NOT NULL,
  `id_alat_tower_ers` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_detail_riwayat_gudang`
--

INSERT INTO `t_detail_riwayat_gudang` (`id_detail_riwayat_gudang`, `id_riwayat_gudang`, `id_alat_tower_ers`, `jumlah`) VALUES
(7, 6, 4, 5);

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
(32, 17, '19800101000514_IMG_5249.JPG'),
(33, 17, '19800101000514_IMG_52491.JPG'),
(34, 17, '19800101000525_IMG_5250.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_gardu_induk`
--

CREATE TABLE `t_gardu_induk` (
  `id_gardu_induk` int(11) NOT NULL,
  `jenis_anomali` varchar(255) NOT NULL,
  `gardu_induk` varchar(255) NOT NULL,
  `bay` varchar(255) NOT NULL,
  `jumlah_titik` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `klasifikasi` varchar(255) NOT NULL,
  `tanggal_eksekusi` date NOT NULL,
  `status_dikerjakan` enum('0','1') NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_personil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_gardu_induk`
--

INSERT INTO `t_gardu_induk` (`id_gardu_induk`, `jenis_anomali`, `gardu_induk`, `bay`, `jumlah_titik`, `keterangan`, `klasifikasi`, `tanggal_eksekusi`, `status_dikerjakan`, `foto`, `id_personil`) VALUES
(7, 'Tes', 'Palangkaraya', '- Trafo 1\r\n- Trafo\r\n- Pulang Pisau', 9, 'Pembebasan Konduktor Paralel Busbar A dan Busbar B (fasa R,S,T)', 'Tes', '2024-02-19', '0', '19800101000858_IMG_5203.JPG', 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_histori_alat`
--

CREATE TABLE `t_histori_alat` (
  `id_histori_alat` int(11) NOT NULL,
  `penanggung_jawab` varchar(255) NOT NULL,
  `id_personil` int(11) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `tanggal_masuk` date DEFAULT NULL,
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
(17, 'Jaka Raksabumi', 14, '2024-02-08', NULL, 'Peminjaman alat untuk pekerjaan rutin', 'keluar', 'signature_c804646545df4530852630ab07e76834.png', '1', 12);

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
-- Struktur dari tabel `t_jaringan`
--

CREATE TABLE `t_jaringan` (
  `id_jaringan` int(11) NOT NULL,
  `jenis_anomali` varchar(255) NOT NULL,
  `bay_line` varchar(255) NOT NULL,
  `no_tower` int(11) NOT NULL,
  `jumlah_titik` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `klasifikasi` varchar(255) NOT NULL,
  `tanggal_eksekusi` date NOT NULL,
  `status_dikerjakan` enum('0','1') NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_personil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_jaringan`
--

INSERT INTO `t_jaringan` (`id_jaringan`, `jenis_anomali`, `bay_line`, `no_tower`, `jumlah_titik`, `keterangan`, `klasifikasi`, `tanggal_eksekusi`, `status_dikerjakan`, `foto`, `id_personil`) VALUES
(6, 'Tes', '- Palangkaraya\r\n- Kasongan 2', 73, 2, 'Penggantian 2 String Isolator Breakdown Phasa R (Double Suspension)', 'Tes', '2024-03-04', '0', 'WhatsApp_Image_2023-06-29_at_12_23_01.jpg', 14);

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
(17, 14, 'TOWER T.189 TANJUNG - MUARA KOMAM', '2024-01-04', '- Konstruksi Tower\r\n- Jenis anomali\r\n- Kondisi Lingkungan', 'SUTT 150 KV Tower 189 Line Tanjung - Muara Komam', 'Pekerjaan pada Tower 189 Line Tanjung - Muara Komam, Tidak bisa dikerjakan secara PDKB\r\nkarena jarak aman untuk akses Hotman tidak terpenuhi dan akses menuju tower sulit karena\r\nharus melewati jurang dan sungai.', '1', 12);

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
(41, 58, 'PENGGANTIAN STRING SET ISOLATOR KOROSI, T. 08 KARANG JOANG - HARAPAN BARU II,\r\nFASA S', '19800101000258_IMG_5184.JPG', '19800101000409_IMG_5245.JPG', '19800101000433_IMG_5247.JPG');

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
(58, 14, 'PEMELIHARAAN STRING SET ISOLATOR KOROSI LINE KARANG JOANG - HARAPAN BARU T. 08', '2024-01-10', 'String Set Isolator', '1. String set Isolator korosi tower 08, Karang Joang - Harapan baru II, fasa S 100%', 'Demikian laporan ini kami buat untuk dipergunakan sebagaimana mestinya.', '1', 12);

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
(12, 1, 'Mochamad Aziz Shidki', '12345678910', 'asistantmanager@email.com', '081274747474', 'asman', '$2y$10$NLFDLVITX2ahLVt9p39Wl.s4Ivppt8d6VKfeIbLYOwF5PZVKbRURK', 'Jalan Dago, Nomor 43', 'logo_unikom_kuning.png', '1', 'signature_2a74a090f697decd0cdb88ac193e7f24.png'),
(13, 2, 'Baharudin', '12345678911', 'teamleader@email.com', '081275757575', 'team_leader', '$2y$10$NZbK40eNc82WkijfpzgR.OqL6e5gNetUjPRI2OpmtZ4ubEmHnGcia', 'Jalan Cimahi, Nomor 55', 'logo.jpg', '1', ''),
(14, 3, 'Ade Kurniawan', '12345678912', 'admin@email.com', '081276767676', 'admin', '$2y$10$6aQzA0qBJOPSPsfzIBJowuFTHdBB5t1weam8AB9gJNy2OPYxPZhue', 'Jalan Tubagus Ismail, Nomor 41', '580b57fcd9996e24bc43c4e71.png', '1', ''),
(15, 4, 'Ismail', '12345678913', 'jtc@email.com', '081279797979', 'jtc', '$2y$10$PSpn2f8aeUp0y0pAaJHllelyNPIh0isJ.SGffGwUYBf48tdJxLAK2', 'Jalan Buahbatu, Nomo 234', 'LogoAbell-removebg-preview.png', '1', ''),
(45, 1, 'Ade Kurniawan', '12345678918', 'ade.kurniawan216@gmail.com', '083171027936', 'ade22', '$2y$10$.df6Gu6/uWmafpkVp2Uyf.BX/YMfXhTTwXu4YlQTd.a2.DauC9qPC', 'Jalan Jambi Palembang KM 27', 'IMG_20220901_160825_151.jpg', '1', '');

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
(52, 'Rencana 1', '1', '2024-01-09', '2024-01-10'),
(53, 'Rencana 2', '1', '2024-02-14', '2024-02-09'),
(54, 'Rencana 3', '0', '2024-02-09', NULL),
(55, 'Rencana 4', '1', '2024-02-08', '2024-02-09'),
(56, 'Rencana 5', '0', '2024-03-20', NULL),
(57, 'Rencana 6', '0', '2024-04-09', NULL),
(58, 'Rencana 7', '0', '2024-04-15', NULL),
(59, 'Rencana 8', '0', '2024-05-06', NULL),
(60, 'Rencana 9', '0', '2024-06-01', NULL),
(61, 'Rencana 10', '0', '2024-06-17', NULL),
(62, 'Rencana 11', '0', '2024-07-16', NULL),
(63, 'Rencana 12', '0', '2024-08-21', NULL),
(64, 'Rencana 13', '0', '2024-09-18', NULL),
(65, 'Rencana 14', '0', '2024-10-17', NULL),
(66, 'Rencana 15', '0', '2024-11-13', NULL),
(67, 'Rencana 16', '0', '2024-12-08', NULL),
(68, 'Rencana 17', '0', '2024-12-26', NULL),
(69, 'Rencana 18', '0', '2024-12-18', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_riwayat_gudang`
--

CREATE TABLE `t_riwayat_gudang` (
  `id_riwayat_gudang` int(11) NOT NULL,
  `penanggung_jawab` varchar(255) NOT NULL,
  `id_personil` int(11) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` enum('keluar','masuk') NOT NULL,
  `tanda_tangan` varchar(255) NOT NULL,
  `sudah_disetujui` enum('0','1') NOT NULL,
  `id_atasan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_riwayat_gudang`
--

INSERT INTO `t_riwayat_gudang` (`id_riwayat_gudang`, `penanggung_jawab`, `id_personil`, `tanggal_keluar`, `tanggal_masuk`, `keterangan`, `status`, `tanda_tangan`, `sudah_disetujui`, `id_atasan`) VALUES
(6, 'Jarot', 14, '2024-02-07', NULL, 'Peminjaman untuk pekerjaan rutin', 'keluar', 'signature_61223617c303e3ed4ca4b96eca7c1268.png', '1', 12);

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
(9, 14, 'TL PDKB RING UPT KALTIMRA', 'ASMAN PDKB UPT KALTIMRA', 'JSA Anomali Tower Tension', 'SUTT 150 kV Line Longikis - Kuaro T.138, T.191,\r\nSUTT 150 kV Petung - Longikis T.127 A,\r\nSUTT 150 kV Tanjung - Muara komam  T.189, \r\nSUTT 150 kV Line Muara komam - Kuaro T.268,', '2024-02-03', '2024-02-05', 'MOCH. AZIZ SHIDKI', 'Hernawan Agung P', 'Zam Yudha Pangayoman\r\nIbnu Hubaiyah', 'Ariya Adam Abdullah\r\nI Kadek A\r\nMoch Zulkifliansyah', 'Measuring Stik Isolasi & APD', 'Kendaraan Dinas', 'JSA Anomali Tower Tension,\r\nSUTT 150 kV Line Longikis - Kuaro T.138, T.191,\r\nSUTT 150 kV Tanjung - Muara komam  T.189', 'Pekerjaan Non Rutin', '1', 12);

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
(43, 17, '1. Konstruksi tower', '1. Type SUTT : DD sudut +- 45 derajat in\r\nline\r\n2. Stringset Isolator : Double String Isolator\r\n,12 Keping\r\n3. Konduktor: Doubel ACSR 240\r\n(0,9Kg/m)\r\n4. Jarak Jumper to traves = 2 meter\r\n5. Total Beban = 6 ton\r\n6. Panjang Traves = 3,4 m\r\n7. Panjang string'),
(44, 17, '2. Pengukuran', '1. Perhitungan beban : 6 Ton'),
(45, 17, '3.Temuan anomali ', '1. Isolator Kaca 210KN,pecah 1 Keping\r\n(Keping ke 6 sisi Hot) Fasa S Line 1'),
(46, 17, '4.Kondisi Lingkungan', '1. Jalan Tanjung-Kuaro No.30, Muara\r\nLangon, Kec. Muara Komam,\r\nKabupaten Paser, Kalimantan Timur\r\n76253\r\n2. Halaman Tower : sedikit rimbun\r\n3. SUTT terletak 1800 meter dari posisi\r\nmobil\r\n4. Akses menuju tower jauh dan sulit\r\nterdapat rintangan jurang, s'),
(47, 17, '5.Kesimpulan', 'Tidak bisa dikerjakan secara PDKB karena\r\njarak aman untuk akses Hotman tidak\r\nterpenuhi dan akses menuju tower sulit\r\nkarena harus melewati jurang dan sungai.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_alat_kerja`
--
ALTER TABLE `t_alat_kerja`
  ADD PRIMARY KEY (`id_alat_kerja`);

--
-- Indeks untuk tabel `t_alat_tower_ers`
--
ALTER TABLE `t_alat_tower_ers`
  ADD PRIMARY KEY (`id_alat_tower_ers`);

--
-- Indeks untuk tabel `t_detail_histori_alat`
--
ALTER TABLE `t_detail_histori_alat`
  ADD PRIMARY KEY (`id_detail_histori_alat`),
  ADD KEY `id_histori_alat` (`id_histori_alat`);

--
-- Indeks untuk tabel `t_detail_riwayat_gudang`
--
ALTER TABLE `t_detail_riwayat_gudang`
  ADD PRIMARY KEY (`id_detail_riwayat_gudang`),
  ADD KEY `id_riwayat_gudang` (`id_riwayat_gudang`);

--
-- Indeks untuk tabel `t_foto_jsa`
--
ALTER TABLE `t_foto_jsa`
  ADD PRIMARY KEY (`id_foto_jsa`),
  ADD KEY `id_jsa` (`id_jsa`);

--
-- Indeks untuk tabel `t_gardu_induk`
--
ALTER TABLE `t_gardu_induk`
  ADD PRIMARY KEY (`id_gardu_induk`);

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
-- Indeks untuk tabel `t_jaringan`
--
ALTER TABLE `t_jaringan`
  ADD PRIMARY KEY (`id_jaringan`);

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
-- Indeks untuk tabel `t_riwayat_gudang`
--
ALTER TABLE `t_riwayat_gudang`
  ADD PRIMARY KEY (`id_riwayat_gudang`);

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
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_alat_kerja`
--
ALTER TABLE `t_alat_kerja`
  MODIFY `id_alat_kerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `t_alat_tower_ers`
--
ALTER TABLE `t_alat_tower_ers`
  MODIFY `id_alat_tower_ers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_detail_histori_alat`
--
ALTER TABLE `t_detail_histori_alat`
  MODIFY `id_detail_histori_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `t_detail_riwayat_gudang`
--
ALTER TABLE `t_detail_riwayat_gudang`
  MODIFY `id_detail_riwayat_gudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `t_foto_jsa`
--
ALTER TABLE `t_foto_jsa`
  MODIFY `id_foto_jsa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `t_gardu_induk`
--
ALTER TABLE `t_gardu_induk`
  MODIFY `id_gardu_induk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `t_histori_alat`
--
ALTER TABLE `t_histori_alat`
  MODIFY `id_histori_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `t_jabatan`
--
ALTER TABLE `t_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `t_jaringan`
--
ALTER TABLE `t_jaringan`
  MODIFY `id_jaringan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `t_jsa`
--
ALTER TABLE `t_jsa`
  MODIFY `id_jsa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `t_lampiran_laporan_pekerjaan`
--
ALTER TABLE `t_lampiran_laporan_pekerjaan`
  MODIFY `id_lampiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `t_laporan_pekerjaan`
--
ALTER TABLE `t_laporan_pekerjaan`
  MODIFY `id_laporan_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `t_personil`
--
ALTER TABLE `t_personil`
  MODIFY `id_personil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `t_rencana_operasi`
--
ALTER TABLE `t_rencana_operasi`
  MODIFY `id_rencana_operasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `t_riwayat_gudang`
--
ALTER TABLE `t_riwayat_gudang`
  MODIFY `id_riwayat_gudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `t_sertifikat`
--
ALTER TABLE `t_sertifikat`
  MODIFY `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `t_spki`
--
ALTER TABLE `t_spki`
  MODIFY `id_spki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `t_temuan_jsa`
--
ALTER TABLE `t_temuan_jsa`
  MODIFY `id_temuan_jsa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_detail_histori_alat`
--
ALTER TABLE `t_detail_histori_alat`
  ADD CONSTRAINT `t_detail_histori_alat_ibfk_1` FOREIGN KEY (`id_histori_alat`) REFERENCES `t_histori_alat` (`id_histori_alat`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_detail_riwayat_gudang`
--
ALTER TABLE `t_detail_riwayat_gudang`
  ADD CONSTRAINT `t_detail_riwayat_gudang_ibfk_1` FOREIGN KEY (`id_riwayat_gudang`) REFERENCES `t_riwayat_gudang` (`id_riwayat_gudang`) ON DELETE CASCADE;

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
