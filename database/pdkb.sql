-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Apr 2024 pada 06.24
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
(20, 'Metal', 'Snacth Block', '2500 lbs', 10, 'Bh', '2024-02-16', 0),
(21, 'Metal', 'Chain Hoist', '1,5 ton', 4, 'Bh', NULL, 2),
(22, 'Metal', 'Tirfor', 'Tracelar', 6, 'Set', NULL, 1),
(23, 'Metal', 'Genset', 'Honda EU20i', 1, 'Bh', NULL, 2),
(24, 'Metal', 'Roll Kabel', '-', 6, 'Bh', NULL, 2),
(25, 'Metal', 'Inverter Welder', 'Lakoni', 1, 'Bh', NULL, 1),
(26, 'Metal', 'Gerinda Duduk', 'BOSCH', 1, 'Bh', NULL, 1),
(27, 'Metal', 'Magnetic Drill', 'WP-25N', 1, 'Bh', NULL, 1),
(28, 'Metal', 'Welding Mask', 'Rhino M500', 1, 'Bh', NULL, 1),
(29, 'Metal', 'Gerinda Baterai', 'NRT-PRO', 2, 'Bh', NULL, 1),
(30, 'Metal', 'Impact', 'JLD', 1, 'Bh', NULL, 1),
(31, 'Metal', 'Sling Baja', '-', 3, 'Bh', NULL, 2),
(32, 'Metal', 'Tongkat Tirfor', '-', 2, 'Set', NULL, 2),
(33, 'Isolasi', 'Tambang Offline', '-', 2, 'Set', NULL, 2),
(34, 'Isolasi', 'Toll set kecil', '-', 1, 'Set', NULL, 1),
(35, 'Isolasi', 'Terpal', '-', 2, 'Bh', NULL, 1),
(36, 'APD', 'Body hardness', 'SALA', 22, 'Bh', '2025-08-31', 4),
(37, 'APD', 'Lanyard', '-', 22, 'Bh', '2025-08-19', 0),
(38, 'APD', 'Hook Lanyard', '-', 36, 'Bh', '2025-08-31', 0),
(39, 'APD', 'Conductive Suite', 'Bennet', 2, 'Bh', '2028-08-19', 0),
(40, 'APD', 'Conductive Suite', 'Kararo', 6, 'Bh', '2025-08-19', 0),
(41, 'APD', 'Shock Absorber', '-', 9, 'Bh', '2030-02-19', 0),
(42, 'APD', 'Raycem', '-', 4, 'Bh', NULL, 0),
(43, 'APD', 'AV Tester', '-', 1, 'Bh', NULL, 0),
(44, 'APD', 'Karet Helm', '-', 1, 'Set', NULL, 0),
(45, 'APD', 'Contact Tester', '-', 1, 'Bh', NULL, 0),
(46, 'APD', 'Rope Tester', '-', 2, 'Bh', NULL, 0),
(47, 'APD', 'Rompi PK3', '-', 2, 'Bh', NULL, 0),
(48, 'APD', 'Rompi PP', '-', 2, 'Bh', NULL, 0),
(49, 'APD', 'Acton', '-', 1, 'Bh', NULL, 0),
(50, 'APD', 'Contain Hidrogen', '-', 2, 'Bh', NULL, 0),
(51, 'APD', 'Micro Tester', '-', 1, 'Bh', NULL, 0),
(52, 'APD', 'Isolometer', '-', 1, 'Bh', NULL, 0),
(53, 'APD', 'Electrolude DFL', '-', 2, 'Bh', NULL, 0),
(54, 'APD', 'Glass Restores Component', '\"A\" , \"B\"', 1, 'Bh', NULL, 0),
(55, 'APD', 'Silikon cloates', '-', 1, 'Bh', NULL, 0),
(56, 'APD', 'Tang Ampere', '-', 1, 'Bh', NULL, 0),
(57, 'Metal', 'H-Frame', 'Besar', 1, 'Bh', NULL, 0),
(58, 'Metal', 'H-Frame', 'Kecil', 1, 'Bh', NULL, 0),
(59, 'Metal', 'Hook Click', '-', 6, 'Bh', NULL, 0),
(60, 'Metal', 'Yoke Hook Click', '-', 3, 'Bh', NULL, 0),
(61, 'Metal', 'Genset', 'Honda, Mobile', 1, 'Bh', NULL, 0),
(62, 'Metal', 'Genset', 'Non Mobile', 1, 'Bh', NULL, 0),
(63, 'Metal', 'Capstan Hoist', '110 volt', 2, 'Bh', NULL, 0),
(64, 'Metal', 'Push Switch', '-', 2, 'Bh', NULL, 0),
(65, 'Metal', 'Snatch Block', '2500 lbs', 6, 'Bh', NULL, 0),
(66, 'Metal', 'Snatch Block', '1250 lbs', 13, 'Bh', NULL, 0),
(67, 'Metal', 'Came Long', 'Gsw', 2, 'Bh', NULL, 0),
(68, 'Metal', 'Came Long', 'Conductor', 6, 'Bh', NULL, 0),
(69, 'Metal', 'Pole Clamp', 'Kecil', 5, 'Bh', NULL, 0),
(70, 'Metal', 'Pole Clamp', 'Besar', 22, 'Bh', NULL, 0),
(71, 'Metal', 'Extension Tower Sadle', '-', 7, 'Bh', NULL, 0),
(72, 'Metal', 'Extension Pole Clamp', '-', 6, 'Bh', NULL, 0),
(73, 'Metal', 'Sackle', '6,5 Ton', 6, 'Bh', NULL, 0),
(74, 'Metal', 'Sackle', '4,75 Ton', 9, 'Bh', NULL, 0),
(75, 'Metal', 'Sackle', '3,25 Ton', 6, 'Bh', NULL, 0),
(76, 'Metal', 'Sackle', '2 Ton', 4, 'Bh', NULL, 0),
(77, 'Metal', 'Rantai Capstan Hoist', '-', 6, 'Bh', NULL, 0),
(78, 'Metal', 'Chain Binder', '-', 1, 'Bh', NULL, 0),
(79, 'Metal', 'Trunion', 'Kecil', 5, 'Bh', NULL, 0),
(80, 'Metal', 'Trunion', 'Besar', 4, 'Bh', NULL, 0),
(81, 'Metal', 'Plat siku tambahan', '-', 9, 'Bh', NULL, 0),
(82, 'Metal', 'Carabiner', 'Kecil', 30, 'Bh', NULL, 0),
(83, 'Metal', 'Carabiner', 'Besar', 4, 'Bh', NULL, 0),
(84, 'Metal', 'Screw Jack', 'Pendek', 10, 'Bh', NULL, 0),
(85, 'Metal', 'Screw Jack', 'Sedang', 4, 'Bh', NULL, 0),
(86, 'Metal', 'Screw Jack', 'Panjang', 2, 'Bh', NULL, 0),
(87, 'Metal', 'Snuck', '-', 1, 'Bh', NULL, 0),
(88, 'Metal', 'Chain Hoist', 'Kyoto 1,5 Ton', 2, 'Bh', NULL, 0),
(89, 'Metal', 'Chain Hoist', 'Kondo 3 Ton', 1, 'Bh', NULL, 0),
(90, 'Metal', 'Chain Hoist', 'Berg Steel 1,5 Ton', 2, 'Bh', NULL, 0),
(91, 'Metal', 'Chain Hoist', 'Berg Steel 3 Ton', 2, 'Bh', NULL, 0),
(92, 'Metal', 'Berg Steel', '6 Ton', 2, 'Bh', NULL, 0),
(93, 'Metal', 'Kunci Shock', 'Stenly', 3, 'Set', NULL, 0),
(94, 'Metal', 'Trafo', '220 v', 2, 'Bh', NULL, 0),
(95, 'Metal', 'Tower Sadle', '-', 7, 'Bh', NULL, 0),
(96, 'Metal', 'Pin Strain Pole', '-', 13, 'Bh', NULL, 0),
(97, 'Metal', 'Rachet Wrench', '-', 3, 'Bh', NULL, 0),
(98, 'Metal', 'Acc Rachet Wrench', '-', 5, 'Bh', NULL, 0),
(99, 'Metal', 'Acc Kunci Shock', '-', 5, 'Bh', NULL, 0),
(100, 'Metal', 'Cotter key Puller', '-', 5, 'Bh', NULL, 0),
(101, 'Metal', 'Bolt Socket Adjuster', 'Type C', 2, 'Bh', NULL, 0),
(102, 'Metal', 'Bolt Socket Adjuster', 'Type \"U\" kecil', 1, 'Bh', NULL, 0),
(103, 'Metal', 'Bolt Socket Adjuster', 'Type \"U\" Besar', 2, 'Bh', NULL, 0),
(104, 'Metal', 'Insulator Forks', '-', 2, 'Bh', NULL, 0),
(105, 'Metal', 'Acc Stick Screw Driver', '-', 1, 'Bh', NULL, 0),
(106, 'Metal', 'Pin Holder', 'Type A', 2, 'Bh', NULL, 0),
(107, 'Metal', 'Pin Holder', 'Type \"B\"', 2, 'Bh', NULL, 0),
(108, 'Metal', 'Flexibel Tool', '-', 1, 'Bh', NULL, 0),
(109, 'Metal', 'Cut Out Tool', '-', 1, 'Bh', NULL, 0),
(110, 'Metal', 'All Angle Tool', '-', 1, 'Bh', NULL, 0),
(111, 'Metal', 'Spiral Disconect Tool', '-', 1, 'Bh', NULL, 0),
(112, 'Metal', 'Bonding Clamp', ',-', 1, 'Bh', NULL, 0),
(113, 'Metal', 'Sapper Hook', '-', 2, 'Bh', NULL, 0),
(114, 'Metal', 'Mirror Tool', '-', 1, 'Bh', NULL, 0),
(115, 'Metal', 'Bolt Head Wrench', '-', 1, 'Bh', NULL, 0),
(116, 'Metal', 'Hack Saw Tool', '-', 1, 'Bh', NULL, 0),
(117, 'Metal', 'Locating Pin Tool', '-', 1, 'Bh', NULL, 0),
(118, 'Metal', 'Cotter Key Remover', '-', 3, 'Bh', NULL, 0),
(119, 'Metal', 'Hot Rodder Tool', '-', 4, 'Bh', NULL, 0),
(120, 'Metal', 'Pin Instaler Tool', '-', 1, 'Bh', NULL, 0),
(121, 'Metal', 'Strap Hoist', '-', 6, 'Bh', NULL, 0),
(122, 'Metal', 'Static Sunt', '-', 2, 'Bh', NULL, 0),
(123, 'Metal', 'Stang Stick Isolasi', '-', 5, 'Bh', NULL, 0),
(124, 'Metal', 'Kabel Role', '-', 5, 'Bh', NULL, 0),
(125, 'Metal', 'Rope Block', 'Tambang Offline', 6, 'Set', NULL, 0),
(126, 'Metal', 'Rope Block', 'Tambang Isolasi', 1, 'Set', NULL, 0),
(127, 'Metal', 'Rantai K3', '-', 1, 'Karung', NULL, 0),
(128, 'Metal', 'Terpal', 'Kuning', 3, 'Lembar   ', NULL, 0),
(129, 'Metal', 'Terpal', 'Biru', 1, 'Lembar   ', NULL, 0),
(130, 'Metal', 'Senso', '50 cm', 1, 'Bh', NULL, 0),
(131, 'APD', 'Conductive shoes', 'Royer', 10, 'Pasang', NULL, 0),
(132, 'APD', 'Offline Shoes', 'Royer', 7, 'Pasang', NULL, 0),
(133, 'Metal', 'Webbing Sling', '1 Ton, 1m', 6, 'Bh', NULL, 0),
(134, 'Metal', 'Webbing Sling', '1 Ton, 2 m', 5, 'Bh', NULL, 0),
(135, 'Metal', 'Webbing Sling', '2 Ton', 37, 'Bh', NULL, 0),
(136, 'Metal', 'Webbing Sling', '3 Ton', 22, 'Bh', NULL, 0),
(137, 'Metal', 'Webbing Sling', '5 Ton', 5, 'Bh', NULL, 0),
(138, 'Metal', 'Webbing Sling', '6 Ton', 6, 'Bh', NULL, 0),
(139, 'Metal', 'Tool Bag', 'Kotak', 11, 'Bh', NULL, 0),
(140, 'Metal', 'Tool Bag', 'Kuning', 10, 'Bh', NULL, 0),
(141, 'Metal', 'Metalic Cross Arm Yoke', '-', 1, 'Bh', NULL, 0),
(142, 'Metal', 'Hot End Yoke', '500 kv', 2, 'Bh', NULL, 0),
(143, 'Metal', 'Cold End Yoke', '500 kv', 2, 'Bh', NULL, 0),
(144, 'Metal', 'Strain Yoke', 'Hot', 2, 'Bh', NULL, 0),
(145, 'Metal', 'Strain Yoke', 'Cold', 2, 'Bh', NULL, 0),
(146, 'Metal', 'Two Pole Strain Carrier Yoke', '150 kv', 1, 'Bh', NULL, 0),
(147, 'Metal', 'Mast Base', '150 kv', 1, 'Bh', NULL, 0),
(148, 'Metal', 'Single Troly Wheel', '-', 1, 'Bh', NULL, 0),
(149, 'Metal', 'Double Troly Wheel', '-', 1, 'Bh', NULL, 0),
(150, 'Metal', 'Double Type Lever Lift', '-', 8, 'Bh', NULL, 0),
(151, 'Metal', 'Ladder Clamp', '-', 17, 'Bh', NULL, 0),
(152, 'Metal', 'Vertical Ladder Base', '-', 6, 'Bh', NULL, 0),
(153, 'Metal', 'Ladder Support', '-', 5, 'Bh', NULL, 0),
(154, 'Metal', 'Adjustable Ladder Hook', '-', 2, 'Bh', NULL, 0),
(155, 'Metal', 'Double Clamp Pole', '-', 6, 'Bh', NULL, 0),
(156, 'Metal', 'Adjustable Hook Assembly', '-', 3, 'Bh', NULL, 0),
(157, 'Metal', 'Middle Cradle Metalic Braket', '-', 3, 'Bh', NULL, 0),
(158, 'Metal', 'Cradle Clamp', '-', 3, 'Bh', NULL, 0),
(159, 'Metal', 'Wheel Tightener Assembly', '-', 6, 'Bh', NULL, 0),
(160, 'Metal', 'Sadle and Tightener', '-', 6, 'Bh', NULL, 0),
(161, 'Metal', 'By Pass Clamp', '-', 5, 'Bh', NULL, 0),
(162, 'Metal', 'Rachet Strap', '-', 4, 'Set', NULL, 0),
(163, 'Metal', 'Tambang Offline', '-', 4, 'Bh', NULL, 0),
(164, 'Metal', 'Tambang Polypropylene', '-', 1, 'Bh', NULL, 0),
(165, 'Metal', 'Tambang Isolasi', '-', 6, 'Bh', NULL, 0),
(166, 'Metal', 'Tong Tambang', '-', 6, 'Bh', NULL, 0),
(167, 'Metal', 'Gotongan', '-', 2, 'Bh', NULL, 0),
(168, 'Metal', 'Rak Stick', '-', 4, 'Bh', NULL, 0),
(169, 'Metal', 'Stick Tester', '-', 2, 'Set', NULL, 0),
(170, 'Metal', 'Tool Box', 'Hitam, merah', 1, 'Bh', NULL, 0),
(171, 'Metal', 'Pangging String', 'Isolasi , 1m', 6, 'Bh', NULL, 0),
(172, 'Metal', 'Pangging String', 'Non Isolasi', 8, 'Bh', NULL, 0),
(173, 'Metal', 'Kayu Balok, H - Frame', '-', 1, 'Bh', NULL, 0),
(174, 'APD', 'Kerucut Lalu lintas', '-', 2, 'Bh', NULL, 0),
(175, 'Isolasi', 'Strain Pole', '7 feet', 2, 'Bh', NULL, 0),
(176, 'Isolasi', 'Strain Pole', '6 feet', 2, 'Bh', NULL, 0),
(177, 'Isolasi', 'Universal Stick', '10 feet', 2, 'Bh', NULL, 0),
(178, 'Isolasi', 'Universal Stick', '12 feet', 2, 'Bh', NULL, 0),
(179, 'Isolasi', 'Universal stick', '14 feet', 2, 'Bh', NULL, 0);

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
(5, 'Metal', 'Chain Hoist', 'Kyoto', '1,5 ton', 4, 'Bh', '2015', '2028-06-16', 2),
(6, 'Metal', 'Webing sling', 'Fiber Tech', '2 Ton 2 meter', 10, 'Bh', '2015', NULL, 3),
(7, 'Metal', 'Came Long', 'Klein', '15000 Lbs', 10, 'Bh', '2015', NULL, 2);

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
(26, 20, 33, 2),
(27, 20, 34, 1),
(28, 20, 35, 1),
(29, 20, 21, 2),
(30, 20, 22, 1),
(31, 20, 23, 2),
(32, 20, 24, 2),
(33, 20, 25, 1),
(34, 20, 26, 1),
(35, 20, 27, 1),
(36, 20, 28, 1),
(37, 20, 29, 1),
(38, 20, 30, 1),
(39, 20, 31, 2),
(40, 20, 32, 2),
(41, 21, 36, 7),
(42, 21, 37, 7),
(43, 21, 38, 7),
(44, 21, 46, 1),
(45, 21, 47, 1),
(46, 21, 48, 1),
(47, 21, 35, 1),
(48, 21, 176, 2),
(49, 21, 178, 2),
(50, 21, 63, 1),
(51, 21, 65, 1),
(52, 21, 66, 3),
(53, 21, 75, 2),
(54, 21, 79, 3),
(55, 21, 82, 15),
(56, 21, 83, 2),
(57, 21, 85, 2),
(58, 21, 86, 2),
(59, 21, 87, 1),
(60, 21, 94, 1),
(61, 21, 96, 5),
(62, 21, 97, 2),
(63, 21, 100, 2),
(64, 21, 101, 1),
(65, 21, 104, 1),
(66, 21, 113, 1),
(67, 21, 124, 2),
(68, 21, 133, 2),
(69, 21, 134, 1),
(70, 21, 135, 1),
(71, 21, 165, 1),
(72, 21, 166, 3),
(73, 21, 169, 1),
(74, 21, 173, 1),
(75, 22, 36, 2),
(76, 23, 36, 2);

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
(8, 7, 5, 2),
(9, 7, 6, 2),
(10, 7, 7, 2),
(11, 8, 5, 1),
(12, 8, 6, 4),
(13, 8, 7, 5),
(14, 9, 6, 1);

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
(34, 17, '19800101000525_IMG_5250.JPG'),
(37, 18, '20210106041526_IMG_5296.JPG'),
(38, 19, '19800101000258_IMG_5184.JPG'),
(39, 20, 'WhatsApp_Image_2023-06-29_at_12_23_00.jpg');

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
(7, 'Tes', 'Palangkaraya', '- Trafo 1\r\n- Trafo\r\n- Pulang Pisau', 9, 'Pembebasan Konduktor Paralel Busbar A dan Busbar B (fasa R,S,T)', 'Tes', '2024-02-19', '1', '19800101000858_IMG_5203.JPG', 14);

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
(20, 'M.Iqbal A', 14, '2024-02-16', NULL, 'Perbaikan Konduktor dan Traves T.167-168 Tanjung Selor', 'keluar', 'signature_48921e6fd410f4a6e07cca937752fd2a.png', '1', 12),
(21, 'Rizkiyannur Adha', 14, '2024-02-23', '2024-04-18', 'Pekerjaan penggantian string set isolator T.18 dan 06 Manggarsari-Karangjoang', 'masuk', 'signature_28d8beca66dea21dd9b8f97e6c3bbbd1.png', '1', 12),
(22, 'Abdul', 15, '2024-04-18', NULL, 'Tes Peminjaman', 'keluar', 'signature_093ea66c31e13e57196da0a63fd44a5e.png', '1', NULL),
(23, 'Abdul', 15, '2024-04-18', NULL, 'Tes Peminjaman', 'keluar', 'signature_4e08c7a5e15a1b95c194392ff9078940.png', '0', NULL);

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
(1, 'Assistant Manager'),
(2, 'Team Leader PDKB SUTT/SUTET'),
(3, 'Team Leader PDKB GI/GITET'),
(4, 'Admin'),
(5, 'JTC PDKB SUTT/SUTET'),
(6, 'JTC PDKB GI/GITET');

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
(6, 'Tes', '- Palangkaraya\r\n- Kasongan 2', 73, 2, 'Penggantian 2 String Isolator Breakdown Phasa R (Double Suspension)', 'Tes', '2024-03-14', '1', 'WhatsApp_Image_2023-06-29_at_12_23_01.jpg', 14);

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
(17, 14, 'TOWER T.189 TANJUNG - MUARA KOMAM', '2024-01-04', '- Konstruksi Tower\r\n- Jenis anomali\r\n- Kondisi Lingkungan', 'SUTT 150 KV Tower 189 Line Tanjung - Muara Komam', 'Pekerjaan pada Tower 189 Line Tanjung - Muara Komam, Tidak bisa dikerjakan secara PDKB\r\nkarena jarak aman untuk akses Hotman tidak terpenuhi dan akses menuju tower sulit karena\r\nharus melewati jurang dan sungai.', '1', 12),
(18, 12, 'Ggsyyyghhhhw', '2024-02-15', 'Kskkwmmlalll', 'Jjsjkkwmm', 'Kkkkskkkkmk', '1', 12),
(19, 15, 'Magni dolorem incidi', '1974-03-24', 'Sint id aut in persp', 'Hic sed quia dolorem', 'Eiusmod ullam incidi', '1', 12),
(20, 15, 'In optio quis dolor', '1983-05-03', 'Dolor quisquam vel f', 'Quis dolor ab maiore', 'Repellendus Volupta', '0', NULL);

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
(41, 58, 'PENGGANTIAN STRING SET ISOLATOR KOROSI, T. 08 KARANG JOANG - HARAPAN BARU II,\r\nFASA S', '19800101000258_IMG_5184.JPG', '19800101000409_IMG_5245.JPG', '19800101000433_IMG_5247.JPG'),
(42, 59, 'tes', '19800101000258_IMG_51841.JPG', '19800101000409_IMG_52451.JPG', '19800101000433_IMG_52471.JPG'),
(43, 60, 'Eius voluptates prov', '19800101000258_IMG_51842.JPG', '19800101000858_IMG_5203.JPG', 'WhatsApp_Image_2023-06-29_at_12_23_00.jpg'),
(44, 61, 'Velit nostrud possim', '19800101001927_IMG_5278.JPG', 'WhatsApp_Image_2023-06-29_at_14_18_01.jpg', 'WhatsApp_Image_2023-06-29_at_12_23_01.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_laporan_pekerjaan`
--

CREATE TABLE `t_laporan_pekerjaan` (
  `id_laporan_pekerjaan` int(11) NOT NULL,
  `id_personil` int(11) NOT NULL,
  `judul_laporan` varchar(255) NOT NULL,
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

INSERT INTO `t_laporan_pekerjaan` (`id_laporan_pekerjaan`, `id_personil`, `judul_laporan`, `dasar_pelaksanaan`, `waktu_pelaksanaan`, `lingkup_pekerjaan`, `hasil_pekerjaan`, `penutup`, `sudah_disetujui`, `id_atasan`) VALUES
(58, 12, 'TES TES', 'PEMELIHARAAN STRING SET ISOLATOR KOROSI LINE KARANG JOANG - HARAPAN BARU T. 08', '2024-01-10', 'String Set Isolator', '1. String set Isolator korosi tower 08, Karang Joang - Harapan baru II, fasa S 100%', 'Demikian laporan ini kami buat untuk dipergunakan sebagaimana mestinya.', '1', 12),
(59, 14, 'tes judul tes tes', 'tes', '2024-03-10', 'tes', 'tes', 'tes', '0', NULL),
(60, 15, 'Aliqua Nulla cumque', 'Dicta nesciunt sed', '1970-05-15', 'Est fuga Dolor enim', 'Nam nihil veritatis', 'Elit nihil odio eli', '1', 12),
(61, 15, 'Saepe in velit et qu', 'Sint aut perferendis', '2000-02-25', 'Aut ratione adipisci', 'Ex proident accusam', 'Eius repudiandae com', '0', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_partnership`
--

CREATE TABLE `t_partnership` (
  `id_partnership` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_ultg` varchar(255) NOT NULL,
  `manajer` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `status_aktif` enum('0','1') NOT NULL,
  `tanda_tangan` varchar(255) NOT NULL,
  `id_personil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_partnership`
--

INSERT INTO `t_partnership` (`id_partnership`, `username`, `password`, `nama_ultg`, `manajer`, `nip`, `email`, `no_hp`, `status_aktif`, `tanda_tangan`, `id_personil`) VALUES
(5, 'tes', '$2y$10$cMGemN63dcUfJhBjAvF.L.ludFfCtNPzZXXELHYrAX7XEXrOln2Lm', 'ULTG Balikpapan', 'Ahmad Sobirin', '12345678918', 'tes@email.com', '123456789', '1', 'signature_738a2b4c51cc626773f8e721d7f7a813.png', 14);

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
(12, 1, 'Mochamad Aziz Shidki', '12345678910', 'asistantmanager@email.com', '081274747474', 'asman', '$2y$10$NLFDLVITX2ahLVt9p39Wl.s4Ivppt8d6VKfeIbLYOwF5PZVKbRURK', 'Jalan Dago, Nomor 43', 'default.jpg', '1', 'signature_1b5dcc53bb4b05eea49e07cc26d19163.png'),
(14, 4, 'Ariya Adam Abdullah', '9922324ZY', 'ariya.adam@pln.co.id', '082397770020', 'admin', '$2y$10$6aQzA0qBJOPSPsfzIBJowuFTHdBB5t1weam8AB9gJNy2OPYxPZhue', 'Kilo 7 Balikpapan', '580b57fcd9996e24bc43c4e7.png', '1', ''),
(15, 5, 'Zam Yudha P', '12345678913', 'jtc@email.com', '081279797979', 'jtc', '$2y$10$PSpn2f8aeUp0y0pAaJHllelyNPIh0isJ.SGffGwUYBf48tdJxLAK2', 'Jalan Buahbatu, Nomo 234', 'banner.jpg', '1', ''),
(46, 2, 'Daniel Pane', '4576766', 'ariyaadam311299@gmail.com', '0977767767565', 'danielp', '$2y$10$Air3pbieK63JQmaAgS5SVuNhig3q2vVH1l7ziVm5IVzVXAxFkwuFC', 'Dgcgfgfyfyftd', 'IMG_7460-removebg-preview.png', '1', ''),
(47, 3, 'Mukh. Iqbal Aulia', '1277377', 'iqbal@gmail.com', '083171027936', 'ade22', '$2y$10$tqKcVt3o7XXdsC15IxOSEuE/QsKWZUvJSpcYxrdPzZoo.owb.HNkm', 'Jalan Jambi Palembang KM 27', '580b57fcd9996e24bc43c4e7.png', '1', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_rencana_operasi`
--

CREATE TABLE `t_rencana_operasi` (
  `id_rencana_operasi` int(11) NOT NULL,
  `nama_rencana` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `tanggal_dikerjakan` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_rencana_operasi`
--

INSERT INTO `t_rencana_operasi` (`id_rencana_operasi`, `nama_rencana`, `keterangan`, `status`, `tanggal_dikerjakan`, `tanggal_selesai`) VALUES
(52, 'Rencana 1', 'Ketarangan', '1', '2024-01-09', '2024-01-10'),
(53, 'Rencana 2', 'Ketarangan', '1', '2024-02-14', '2024-02-09'),
(54, 'Rencana 3', 'Ketarangan', '0', '2024-02-09', NULL),
(55, 'Rencana 4', 'Ketarangan', '1', '2024-02-08', '2024-02-09'),
(56, 'Rencana 5', 'Ketarangan', '0', '2024-03-20', NULL),
(57, 'Rencana 6', 'Ketarangan', '0', '2024-04-09', NULL),
(58, 'Rencana 7', 'Ketarangan', '0', '2024-04-15', NULL),
(59, 'Rencana 8', 'Ketarangan', '0', '2024-05-06', NULL),
(60, 'Rencana 9', 'Ketarangan', '0', '2024-06-01', NULL),
(61, 'Rencana 10', 'Ketarangan', '1', '2024-06-17', '2024-02-16'),
(62, 'Rencana 11', 'Ketarangan', '0', '2024-07-16', NULL),
(63, 'Rencana 12', 'Ketarangan', '0', '2024-08-21', NULL),
(64, 'Rencana 13', 'Ketarangan', '0', '2024-09-18', NULL),
(65, 'Rencana 14', 'Ketarangan', '0', '2024-10-17', NULL),
(66, 'Rencana 15', 'Ketarangan', '0', '2024-11-13', NULL),
(67, 'Rencana 16', 'Ketarangan', '0', '2024-12-08', NULL),
(68, 'Rencana 17', 'Ketarangan', '0', '2024-12-26', NULL),
(69, 'Rencana 18', 'Ketarangan', '0', '2024-12-18', NULL),
(70, 'Tes tes', 'Tes tes', '0', '2024-02-15', NULL);

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
(7, 'Zulkifliansyah', 14, '2024-02-16', NULL, 'Pengencangan skur T.42 ERS ULTG Bontang', 'keluar', 'signature_44dbff6c18e9d1464fe93babf82d5304.png', '1', 12),
(8, 'Zam Yudha', 15, '2024-02-16', '2024-02-16', 'Gansol', 'masuk', 'signature_64b5cd7d1c2cbbf86300a9bd2bd2bbc2.png', '1', 12),
(9, 'Abdul', 15, '2024-04-18', NULL, 'Tes Peminjaman', 'keluar', 'signature_9408cc741665cf7c1e023fb352a9d060.png', '0', NULL);

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
(64, 14, 'Diklat', 'Sertifikat_Kompetensi_BNSP.pdf'),
(65, 14, 'Kompetensi', 'IJAZAH_ADE_KURNIAWAN.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_spki`
--

CREATE TABLE `t_spki` (
  `id_spki` int(11) NOT NULL,
  `id_personil` int(11) NOT NULL,
  `kepada` varchar(255) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `bulan` varchar(255) NOT NULL,
  `tahun` char(4) NOT NULL,
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

INSERT INTO `t_spki` (`id_spki`, `id_personil`, `kepada`, `nomor`, `bulan`, `tahun`, `dari`, `macam_pekerjaan`, `lokasi_pekerjaan`, `mulai_pelaksanaan`, `selesai_pelaksanaan`, `pj`, `pengawas`, `pengawas_k3`, `pelaksana`, `alat_kerja`, `kendaraan`, `uraian_kerja`, `catatan`, `sudah_disetujui`, `id_atasan`) VALUES
(9, 12, 'TL PDKB RING UPT KALTIMRA', '5', 'I', '2024', 'ASMAN PDKB UPT KALTIMRA', 'JSA Anomali Tower Tension', 'SUTT 150 kV Line Longikis - Kuaro T.138, T.191,\r\nSUTT 150 kV Petung - Longikis T.127 A,\r\nSUTT 150 kV Tanjung - Muara komam  T.189, \r\nSUTT 150 kV Line Muara komam - Kuaro T.268,', '2024-02-03', '2024-02-05', 'MOCH. AZIZ SHIDKI', 'Hernawan Agung P', 'Zam Yudha Pangayoman\r\nIbnu Hubaiyah', 'Ariya Adam Abdullah\r\nI Kadek A\r\nMoch Zulkifliansyah', 'Measuring Stik Isolasi & APD', 'Kendaraan Dinas', 'JSA Anomali Tower Tension,\r\nSUTT 150 kV Line Longikis - Kuaro T.138, T.191,\r\nSUTT 150 kV Tanjung - Muara komam  T.189', 'Pekerjaan Non Rutin', '1', 12),
(14, 14, 'TL PDKB RING UPT BALIKPAPAN', '17', 'II', '2024', 'ASMAN PDKB UPT BALIKPAPAN', 'JSA Pra Pekerjaan Perbaikan konduktor', 'Line Tanjung Redeb - Tanjung Selor, Tower 167 - 168', '2024-02-17', '2024-02-18', 'Moch. Aziz Shidki', 'ULTG Berau', 'ULTG Berau', 'Daniel Pane\r\nIbnu Hubaiyah\r\nHernawan Agung P\r\nI Kadek A.P', 'APD dan Peralatan Perbaikan Konduktor', 'Kendaraan Dinas', 'JSA Pra Pekerjaan Perbaikan konduktor\r\nLine Tanjung Redeb - Tanjung Selor, Tower 167 - 168', 'Pekerjaan Non Rutin', '1', 12),
(15, 14, 'TL PDKB RING UPT BALIKPAPAN', '18', 'II', '2024', 'ASMAN PDKB UPT BALIKPAPAN', 'Perbaikan Konduktor', 'Line Tanjung Redeb - Tanjung Selor Tower 167-168', '2024-02-18', '2024-02-23', 'Moch. Aziz Shidki', 'ULTG Berau', 'ULTG Berau', 'Daniel Pane\r\nIbnu Hubaiyah\r\nHernawan Agung\r\nI Kadek Adityanul Pranama', 'APD dan Peralatan Perbaikan Konduktor', 'Kendaraan Dinas', 'Perbaikan Konduktor Line Tanjung Redeb - Tanjung Selor Tower 167-168', 'Pekerjaan Non Rutin', '1', 12),
(16, 14, 'TEAM LEADER PDKB RING', '19', 'II', '2024', 'ASMAN PDKB UPT BALIKPAPAN', 'Climb Up Inspection', 'Line Karang Joang - Harapan Baru, T.51,57,59,60-75', '2024-02-20', '2024-02-22', 'Moch. Aziz Shidki', 'Moch. Zulkifliansyah', 'Zam Yudha P', 'Rizkiyannur Adha\r\nAriya Adam A', 'APD dan Perlengkapan Inspeksi', 'Kendaraan Dinas', 'Climb Up Inspection Line Karang Joang - Harapan Baru, T.51,57,59,60-75', 'Pekerjaan Non Rutin', '1', 12),
(17, 14, 'Team Leader PDKB GI', '20', 'II', '2024', 'Asman PDKB UPT Balikpapan', 'Job Safety Analysis', 'Gardu Induk Industri, Bay Line New Balikpapan 1, Potential Transformer', '2024-02-21', '2024-02-21', 'Moch. Aziz Shidki', 'Zam Yudha P', 'Rizkiyannur Adha', 'Ariya Adam A\r\nMoch. Zulkifliansyah', 'APD dan Alat Ukur', 'Kendaraan Dinas', 'Job Safety Analysis Gardu Induk Industri, Bay Line New Balikpapan 1, Potential Transformer.', 'Pekerjaan Non Rutin', '1', 12),
(18, 14, 'TEAM LEADER PDKB RING', '21', 'II', '2024', 'ASMAN PDKB UPT BALIKPAPAN', 'Penggantian Stringset Isolator', 'Line Manggarsari - Karang Joang (Arah Senipah) T.18 dan Line Karang Joang - Harapan Baru T.06', '2024-02-26', '2024-02-27', 'Moch. Aziz Shidki', 'Rizkiyannur Adha', 'Moch. Zulkiflianyah', 'Ariya Adam Abdullah\r\nZam Yudha P\r\nIbnu H\r\nHasta F\r\nDaniel Pane\r\nHernawan A.P\r\nIqbal A\r\nI Kadek A.P', 'APD dan Peralatan Penggantian Isolator Suspensiom PDKB', 'Kendaraan Dinas', 'Penggantian Stringset Isolator Line Manggarsari - Karang Joang (Arah Senipah) T.18 dan Line Karang Joang - Harapan Baru T.06', 'Pekerjaan Rutin', '1', 12),
(19, 14, 'TEAM LEADER PDKB GI', '22', 'II', '2024', 'ASMAN PDKB UPT BALIKPAPAN', 'Job Safety Analysis', 'JSA GI New Samarinda, Bay Line Muara Badak dan Tower 170 Line Karang Joang - Harapan Baru,', '2024-02-28', '2024-02-29', 'Moch. Aziz Shidki', 'Zam Yudha P', 'Ibnu Hubaiyah', 'Hasta Fiado\r\nHernawan Agung P', 'APD dan Alat Ukur', 'Kendaraan Dinas', 'JSA GI New Samarinda, Bay Line Muara Badak dan Tower 170 Line Karang Joang - Harapan Baru.', 'Pekerjaan Rutin', '1', 12),
(20, 14, 'TEAM LEADER PDKB RING', '23', 'II', '2024', 'ASMAN PDKB UPT BALIKPAPAN', 'Climb Up Inspection', 'CUI Karang Joang - Harapan Baru, Tower 73 - 90', '2024-02-28', '2024-02-29', 'Moch. Aziz Shidki', 'Daniel Pane', 'Moch. Zulkifliansyah', 'Ariya Adam\r\nI Kadek A.P\r\nMukhamat Iqbal\r\nRizkiyannur Adha', 'APD dan Peralatan Inspeksi', 'Kendaraan Dinas', 'CUI Karang Joang - Harapan Baru, Tower 73 - 90.', 'Pekerjaan Rutin', '1', 12),
(21, 14, 'TEAM LEADER PDKB RING', '24', 'III', '2024', 'ASMAN PDKB UPT BALIKPAPAN', 'Job Safety Analysis', 'Tower 55 Line Karang Joang - Harapan Baru', '2024-03-01', '2024-03-01', 'Moch. Aziz Shidki', 'Daniel Pane', 'Moch. Zulkifliansyah', 'Ariya Adam A', 'APD dan Peralatan JSA', 'Kendaraan Dinas', 'JSA Tower 55 Line Karang Joang - Harapan Baru', 'Pekerjaan Rutin', '1', 12),
(23, 14, 'Team Leader PDKB Jaringan', '25', 'III', '2024', 'ASMAN PDKB UPT Balikpapan', 'Penggantian ball isolator korosi', 'T. 55 Line Karang Joang - Harapan Baru 1 Fasa T', '2024-03-04', '2024-03-04', 'Moch. Aziz Shidki', 'Zam Yudha Pangayoman', 'Ibnu Hubaiyah', 'Daniel Pane\r\nAriya Adam \r\nMoch. Zulkifliansyah\r\nMukh. Iqbal \r\nI Kadek Adityanul\r\nHernawan Agung\r\nHasta Fiado\r\nRizkiyannur Adha', 'Sesuai IK 9.009/IK/TRS.00.003/Komisi - PDKB Pusat/2018 (Penggantian Isolator Suspension PDKB)', 'Kendaraan Dinas', 'Penggantian ball isolator korosi T. 55 Line Karang Joang - Harapan Baru 1 Fasa T', 'Pekerjaan non-rutin', '1', 12),
(25, 14, 'Team Leader PDKB GI', '26', 'III', '2024', 'ASMAN PDKB UPT Balikpapan', 'Perbaikan Hotspot pada Clamp CT', 'GI New Samarinda, bay line Muara Badak 2 Fasa S', '2024-03-05', '2024-03-05', 'Moch. Aziz Shidki', 'Zam Yudha Pangayoman', 'Ibnu Hubaiyah', 'Moch. Zulkifliansyah\r\nMukh. Iqbal \r\nHasta Fiado\r\nHernawan Agung\r\nHasta Fiado\r\nI kadek Adityanul\r\nDaniel Pane\r\nAriya Adam', 'Sesuai IK Perbaikan Hotspot PDKB\r\n8.003/IK/TRS.00.003/KOMISI - PDKB PUSAT/2018', 'Kendaraan Dinas', 'Perbaikan Hotspot pada Clamp CT GI New Samarinda, bay line Muara Badak 2\r\nFasa S', 'Pekerjaan non-rutin', '1', 12),
(26, 14, 'Team Leader PDKB GI', '27', 'III', '2024', 'ASMAN PRKB', 'Penggantian Strain Clamp GSW korosi', 'GI Harapan Baru', '2024-03-06', '2024-03-07', 'Moch. Aziz Shidki', 'Zam Yudha Pangayoman', 'Ibnu Hubaiyah', 'Moch. Zulkifliansyah\r\nHernawan Agung\r\nAriya Adam\r\nHasta Fiado\r\nI Kadek Adityanul\r\nDaniel Pane\r\nRizkiyannur Adha\r\nMukh. Iqbal', 'Sesuai IK 8.006/IK/TRS.00.003/KOMISI-PDKB PUSAT/2018', 'Kendaraan Dinas', 'Penggantian Strain Clamp GSW korosi GI Harapan Baru', 'Pekerjaan non-rutin', '1', 12),
(27, 14, 'Team Leader PDKB GI', '27', 'III', '2024', 'ASMAN PDKB', 'Penggantian Strain Clamp GSW Korosi', 'GI Harapan Baru', '2024-03-06', '2024-03-07', 'Moch. Aziz Shidki', 'Zam Yudha Pangayoman', 'Ibnu Hubaiyah', 'I kadek Adityanul\r\nDaniel Pane\r\nHernawan Agung\r\nRizkiyannur Adha\r\nAriya Adam\r\nMoch. Zulkifliansyah\r\nMukh. Iqbal\r\nHasta Fiado', 'Sesuai IK PDKB No. 8.006/IK/TRS.00.003/KOMISI-PDKB PUSAT/2018', 'Kendaraan Dinas', 'Penggantian Strain Clamp GSW Korosi GI Harapan Baru', 'Pekerjaan Rutin', '1', 12),
(28, 15, 'Iste est dolorem an', '12', 'VIII', '2024', 'Ullam omnis aliqua', 'Elit sit temporibu', 'Earum aliqua Deleni', '2019-01-02', '2023-08-06', 'Qui in praesentium p', 'Ad incididunt conseq', 'Aut veniam amet di', 'Vel nihil velit rati', 'Incidunt in quia al', 'Voluptates est ulla', 'Sed omnis error accu', 'Ut dolorem fugiat m', '1', 12),
(29, 15, 'Deserunt consequatur', '5', 'X', '2024', 'Assumenda ratione mo', 'Et voluptatem Eaque', 'Expedita adipisci ad', '2022-11-10', '1976-06-27', 'Vero est dolor sint', 'Sint cupidatat enim', 'Consequatur accusant', 'Officia dolor quibus', 'Sed consequatur nisi', 'Perferendis dolores', 'Aut est aut ea neque', 'Aut minus dolorum do', '0', NULL);

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
(47, 17, '5.Kesimpulan', 'Tidak bisa dikerjakan secara PDKB karena\r\njarak aman untuk akses Hotman tidak\r\nterpenuhi dan akses menuju tower sulit\r\nkarena harus melewati jurang dan sungai.'),
(48, 18, 'Lingkungan', 'Skkskkkskkm'),
(49, 18, 'Komdisi tower', 'Skkskkkskkm'),
(50, 18, 'Hasil Temuan 1', 'blablablablabalbalbalaa'),
(51, 19, 'Hic porro ad aut inv', 'Omnis quis eum enim '),
(52, 20, 'Corporis vel in reru', 'Facere voluptate ull');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_wo`
--

CREATE TABLE `t_wo` (
  `id_wo` int(11) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `tanggal_pelaporan` datetime NOT NULL,
  `sudah_disetujui` enum('0','1','2') NOT NULL,
  `id_partnership` int(11) NOT NULL,
  `id_atasan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_wo`
--

INSERT INTO `t_wo` (`id_wo`, `pekerjaan`, `tanggal_pelaporan`, `sudah_disetujui`, `id_partnership`, `id_atasan`) VALUES
(7, 'Pekerjaan 1', '2024-04-18 10:54:59', '2', 5, NULL),
(8, 'Pekerjaan 2', '2024-04-18 10:55:10', '1', 5, NULL),
(9, 'Pekerjaan 3', '2024-04-18 10:55:40', '0', 5, NULL);

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
  ADD KEY `id_histori_alat` (`id_histori_alat`),
  ADD KEY `id_alat_kerja` (`id_alat_kerja`);

--
-- Indeks untuk tabel `t_detail_riwayat_gudang`
--
ALTER TABLE `t_detail_riwayat_gudang`
  ADD PRIMARY KEY (`id_detail_riwayat_gudang`),
  ADD KEY `id_riwayat_gudang` (`id_riwayat_gudang`),
  ADD KEY `id_alat_tower_ers` (`id_alat_tower_ers`);

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
  ADD PRIMARY KEY (`id_gardu_induk`),
  ADD KEY `id_personil` (`id_personil`);

--
-- Indeks untuk tabel `t_histori_alat`
--
ALTER TABLE `t_histori_alat`
  ADD PRIMARY KEY (`id_histori_alat`),
  ADD KEY `id_atasan` (`id_atasan`),
  ADD KEY `id_personil` (`id_personil`);

--
-- Indeks untuk tabel `t_jabatan`
--
ALTER TABLE `t_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `t_jaringan`
--
ALTER TABLE `t_jaringan`
  ADD PRIMARY KEY (`id_jaringan`),
  ADD KEY `id_personil` (`id_personil`);

--
-- Indeks untuk tabel `t_jsa`
--
ALTER TABLE `t_jsa`
  ADD PRIMARY KEY (`id_jsa`),
  ADD KEY `id_atasan` (`id_atasan`),
  ADD KEY `id_personil` (`id_personil`);

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
  ADD PRIMARY KEY (`id_laporan_pekerjaan`),
  ADD KEY `id_atasan` (`id_atasan`),
  ADD KEY `id_personil` (`id_personil`);

--
-- Indeks untuk tabel `t_partnership`
--
ALTER TABLE `t_partnership`
  ADD PRIMARY KEY (`id_partnership`),
  ADD KEY `id_personil` (`id_personil`);

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
  ADD PRIMARY KEY (`id_riwayat_gudang`),
  ADD KEY `id_atasan` (`id_atasan`),
  ADD KEY `id_personil` (`id_personil`);

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
  ADD PRIMARY KEY (`id_spki`),
  ADD KEY `id_atasan` (`id_atasan`),
  ADD KEY `id_personil` (`id_personil`);

--
-- Indeks untuk tabel `t_temuan_jsa`
--
ALTER TABLE `t_temuan_jsa`
  ADD PRIMARY KEY (`id_temuan_jsa`),
  ADD KEY `id_jsa` (`id_jsa`);

--
-- Indeks untuk tabel `t_wo`
--
ALTER TABLE `t_wo`
  ADD PRIMARY KEY (`id_wo`),
  ADD KEY `id_atasan` (`id_atasan`),
  ADD KEY `id_partnership` (`id_partnership`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_alat_kerja`
--
ALTER TABLE `t_alat_kerja`
  MODIFY `id_alat_kerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT untuk tabel `t_alat_tower_ers`
--
ALTER TABLE `t_alat_tower_ers`
  MODIFY `id_alat_tower_ers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `t_detail_histori_alat`
--
ALTER TABLE `t_detail_histori_alat`
  MODIFY `id_detail_histori_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT untuk tabel `t_detail_riwayat_gudang`
--
ALTER TABLE `t_detail_riwayat_gudang`
  MODIFY `id_detail_riwayat_gudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `t_foto_jsa`
--
ALTER TABLE `t_foto_jsa`
  MODIFY `id_foto_jsa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `t_gardu_induk`
--
ALTER TABLE `t_gardu_induk`
  MODIFY `id_gardu_induk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `t_histori_alat`
--
ALTER TABLE `t_histori_alat`
  MODIFY `id_histori_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `t_jabatan`
--
ALTER TABLE `t_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `t_jaringan`
--
ALTER TABLE `t_jaringan`
  MODIFY `id_jaringan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `t_jsa`
--
ALTER TABLE `t_jsa`
  MODIFY `id_jsa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `t_lampiran_laporan_pekerjaan`
--
ALTER TABLE `t_lampiran_laporan_pekerjaan`
  MODIFY `id_lampiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `t_laporan_pekerjaan`
--
ALTER TABLE `t_laporan_pekerjaan`
  MODIFY `id_laporan_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `t_partnership`
--
ALTER TABLE `t_partnership`
  MODIFY `id_partnership` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `t_personil`
--
ALTER TABLE `t_personil`
  MODIFY `id_personil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `t_rencana_operasi`
--
ALTER TABLE `t_rencana_operasi`
  MODIFY `id_rencana_operasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `t_riwayat_gudang`
--
ALTER TABLE `t_riwayat_gudang`
  MODIFY `id_riwayat_gudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `t_sertifikat`
--
ALTER TABLE `t_sertifikat`
  MODIFY `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `t_spki`
--
ALTER TABLE `t_spki`
  MODIFY `id_spki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `t_temuan_jsa`
--
ALTER TABLE `t_temuan_jsa`
  MODIFY `id_temuan_jsa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `t_wo`
--
ALTER TABLE `t_wo`
  MODIFY `id_wo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_detail_histori_alat`
--
ALTER TABLE `t_detail_histori_alat`
  ADD CONSTRAINT `t_detail_histori_alat_ibfk_1` FOREIGN KEY (`id_histori_alat`) REFERENCES `t_histori_alat` (`id_histori_alat`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_detail_histori_alat_ibfk_2` FOREIGN KEY (`id_alat_kerja`) REFERENCES `t_alat_kerja` (`id_alat_kerja`);

--
-- Ketidakleluasaan untuk tabel `t_detail_riwayat_gudang`
--
ALTER TABLE `t_detail_riwayat_gudang`
  ADD CONSTRAINT `t_detail_riwayat_gudang_ibfk_1` FOREIGN KEY (`id_riwayat_gudang`) REFERENCES `t_riwayat_gudang` (`id_riwayat_gudang`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_detail_riwayat_gudang_ibfk_2` FOREIGN KEY (`id_alat_tower_ers`) REFERENCES `t_alat_tower_ers` (`id_alat_tower_ers`);

--
-- Ketidakleluasaan untuk tabel `t_foto_jsa`
--
ALTER TABLE `t_foto_jsa`
  ADD CONSTRAINT `t_foto_jsa_ibfk_1` FOREIGN KEY (`id_jsa`) REFERENCES `t_jsa` (`id_jsa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_gardu_induk`
--
ALTER TABLE `t_gardu_induk`
  ADD CONSTRAINT `t_gardu_induk_ibfk_1` FOREIGN KEY (`id_personil`) REFERENCES `t_personil` (`id_personil`);

--
-- Ketidakleluasaan untuk tabel `t_histori_alat`
--
ALTER TABLE `t_histori_alat`
  ADD CONSTRAINT `t_histori_alat_ibfk_1` FOREIGN KEY (`id_atasan`) REFERENCES `t_personil` (`id_personil`),
  ADD CONSTRAINT `t_histori_alat_ibfk_2` FOREIGN KEY (`id_personil`) REFERENCES `t_personil` (`id_personil`);

--
-- Ketidakleluasaan untuk tabel `t_jaringan`
--
ALTER TABLE `t_jaringan`
  ADD CONSTRAINT `t_jaringan_ibfk_1` FOREIGN KEY (`id_personil`) REFERENCES `t_personil` (`id_personil`);

--
-- Ketidakleluasaan untuk tabel `t_jsa`
--
ALTER TABLE `t_jsa`
  ADD CONSTRAINT `t_jsa_ibfk_1` FOREIGN KEY (`id_atasan`) REFERENCES `t_personil` (`id_personil`),
  ADD CONSTRAINT `t_jsa_ibfk_2` FOREIGN KEY (`id_personil`) REFERENCES `t_personil` (`id_personil`);

--
-- Ketidakleluasaan untuk tabel `t_lampiran_laporan_pekerjaan`
--
ALTER TABLE `t_lampiran_laporan_pekerjaan`
  ADD CONSTRAINT `t_lampiran_laporan_pekerjaan_ibfk_1` FOREIGN KEY (`id_laporan_pekerjaan`) REFERENCES `t_laporan_pekerjaan` (`id_laporan_pekerjaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_laporan_pekerjaan`
--
ALTER TABLE `t_laporan_pekerjaan`
  ADD CONSTRAINT `t_laporan_pekerjaan_ibfk_1` FOREIGN KEY (`id_atasan`) REFERENCES `t_personil` (`id_personil`),
  ADD CONSTRAINT `t_laporan_pekerjaan_ibfk_2` FOREIGN KEY (`id_personil`) REFERENCES `t_personil` (`id_personil`);

--
-- Ketidakleluasaan untuk tabel `t_partnership`
--
ALTER TABLE `t_partnership`
  ADD CONSTRAINT `t_partnership_ibfk_1` FOREIGN KEY (`id_personil`) REFERENCES `t_personil` (`id_personil`);

--
-- Ketidakleluasaan untuk tabel `t_personil`
--
ALTER TABLE `t_personil`
  ADD CONSTRAINT `t_personil_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `t_jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_riwayat_gudang`
--
ALTER TABLE `t_riwayat_gudang`
  ADD CONSTRAINT `t_riwayat_gudang_ibfk_1` FOREIGN KEY (`id_atasan`) REFERENCES `t_personil` (`id_personil`),
  ADD CONSTRAINT `t_riwayat_gudang_ibfk_2` FOREIGN KEY (`id_personil`) REFERENCES `t_personil` (`id_personil`);

--
-- Ketidakleluasaan untuk tabel `t_sertifikat`
--
ALTER TABLE `t_sertifikat`
  ADD CONSTRAINT `t_sertifikat_ibfk_1` FOREIGN KEY (`id_personil`) REFERENCES `t_personil` (`id_personil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_spki`
--
ALTER TABLE `t_spki`
  ADD CONSTRAINT `t_spki_ibfk_1` FOREIGN KEY (`id_atasan`) REFERENCES `t_personil` (`id_personil`),
  ADD CONSTRAINT `t_spki_ibfk_2` FOREIGN KEY (`id_personil`) REFERENCES `t_personil` (`id_personil`);

--
-- Ketidakleluasaan untuk tabel `t_temuan_jsa`
--
ALTER TABLE `t_temuan_jsa`
  ADD CONSTRAINT `t_temuan_jsa_ibfk_1` FOREIGN KEY (`id_jsa`) REFERENCES `t_jsa` (`id_jsa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_wo`
--
ALTER TABLE `t_wo`
  ADD CONSTRAINT `t_wo_ibfk_1` FOREIGN KEY (`id_atasan`) REFERENCES `t_personil` (`id_personil`),
  ADD CONSTRAINT `t_wo_ibfk_2` FOREIGN KEY (`id_partnership`) REFERENCES `t_partnership` (`id_partnership`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
